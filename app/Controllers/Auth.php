<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Auth extends Controller
{
    public function __construct(){
        helper(['url', 'form']);
    }
    public function index()
    {
        return view('auth/login');
    }
    public function register()
    {
        return view('auth/register');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function verifyemail()
{
    $db = \Config\Database::connect();
    $builder = $db->table('patients');

    if($this->request->getGet('token'))
    {
        $token = $this->request->getGet('token');
        $builder->where('verify_token', $token);
        $query = $builder->get();

        if ($query->getNumRows() > 0)
        {
            $row = $query->getRow();

            if ($row->verify_status == "0")
            {
                $builder->set('verify_status', '1');
                $builder->where('verify_token', $row->verify_token);
                $builder->update();

                if($db->affectedRows() > 0)
                {
                    session()->setFlashdata('status', 'Your account has been verified successfully');
                    return redirect()->to('auth/login');
                }
                else
                {
                    session()->setFlashdata('status', 'Verification failed');
                    return redirect()->to('auth/login');
                }
            }
            else
            {
                session()->setFlashdata('status', 'Email already verified. Please login');
                return redirect()->to('auth/login');
            }
        }
        else
        {
            session()->setFlashdata('status', 'This token does not exist');
            return redirect()->to('auth/login');
        }
    }
    else
    {
        session()->setFlashdata('status', 'Not Allowed');
        return redirect()->to('auth/login');
    }
}


    
    

    public function sendemail_verify($name,$email,$verify_token)
    {
        $mail = new PHPMailer(true);
        $mail->isSMTP();     
        $mail->SMTPAuth = true;
                                               //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through                                 //Enable SMTP authentication
        $mail->Username   = 'vanessa.cyrilla@strathmore.edu';                     //SMTP username
        $mail->Password   = 'nnii axds nimt yiiz';   
                                    //SMTP password
        $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('vanessa.cyrilla@strathmore.edu',$name);
        $mail->addAddress($email);
        
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Email Verification from Salama Sasa';

        $email_template = "
        <h2>You have Registered with Salama Sasa</h2>
        <h5>Verify your email address to Login with the below given link</h5>
        <br/><br/>
        <a href= 'http://localhost:8080/auth/verifyemail?token=$verify_token'> Click Me</a>
        ";

        $mail->Body    = $email_template;
        $mail->send();
       // echo 'Message has been sent';
    } 
    public function save()
    {
     //Validating requests was alr comment
     //   $validation = $this-> validate ([
     //       'name'=>'required',
     //       'email'=>'required|valid_email|is_unique[users.email]',
     //       'password'=>'required|min_length[8]',
     //       'cpassword'=>'required|min_length[8]|matches[password]'
     // ]); was alr comment

        $validation= $this-> validate([
            'name'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'Your full name is required'
                ]
                ],
                'email'=>[
                    'rules'=>'required|valid_email|is_unique[patients.email]',
                    'errors'=>[
                        'required'=>'Email is required',
                        'valid_email'=>'You must enter a valid email',
                        'is_unique'=>'Email already taken'
                    ]
                    ],  
                 'password'=>[
                    'rules'=>'required|min_length[8]|max_length[12]|regex_match[/[^a-zA-Z0-9]/]',
                    'errors'=>[
                        'required'=>'Password is required',
                        'min_length'=>'Password must have at least 8 characters',
                        'max_length'=>'Password must not exceed 12 characters',
                        'regex_match'=>'Password must contain a special character'
                    ]
                    ],
                    'cpassword'=>[
                        'rules'=>'required|matches[password]',
                        'errors'=>[
                            'required'=>'Confirm password is required',
                            'matches'=>'Confirm password must match password'
                        ]
                    ]
                    ]);

        if(!$validation){
            return view ('auth/register', ['validation'=> $this->validator]);
        }else{
            $name= $this->request->getPost('name');
            $email= $this->request->getPost('email');
            $password= $this->request->getPost('password');
            $verify_token= md5(rand());

            $values = [
                'name'=> $name,
                'email'=>$email,
                'password'=>$password,
                'verify_token'=>$verify_token
            ];

            $patientsModel = new \App\Models\PatientsModel();
            $query = $patientsModel->insert($values);
            if(!$query){
                return redirect()->back()->with('fail', 'Something went wrong');
                //return redirect()->to('register')->with('fail', 'Something went wrong')
            }else{
                $this->sendemail_verify("$name", "$email", "$verify_token");
                $_SESSION['status'] = "Registration Successful. Please verify";
                  return redirect()->to('register')->with('success', 'You are now registered successfully. Verify email.');

        
            }
        }
    }
        function check(){

            $validation = $this->validate([
                'email'=>[
                    'rules'=>'required|valid_email|is_not_unique[patients.email]',
                    'errors'=>[
                        'required'=>'Email is required',
                        'valid_email'=>'Enter a valid email address',
                        'is_not_unique'=>'This email is not registered'
                    ]
                    ],
                    'password'=>[
                    'rules'=>'required|min_length[8]|max_length[12]',
                    'errors'=>[
                        'required'=>'Password is required',
                        'min_length'=>'Password must have at least 8 characters',
                        'max_length'=>'Password must not exceed 12 characters'
                    ]
                    ]
                ]);

            if(!$validation){
                return view ('auth/login',['validation'=> $this->validator]); 
            }else {
               
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');
                $patientsModel = new \App\Models\PatientsModel();
                $patient_info = $patientsModel-> where('email', $email)->first();
                if ($password != $patient_info['password']) 
                {
                    session()->setFlashdata('fail', 'Incorrect password');
                    return redirect()->to('/auth')->withInput();
                }else{
                    $patient_id = $patient_info['patientID'];
                    session()->set('loggedPatient', $patient_id);
                    return redirect()->to('/dashboard');
                 
               } 
            }
         }
       function logout(){
        if(session()->has('loggedPatient')){
            session()->remove('loggedPatient');
            return redirect()->to('/auth?access=out')->with('fail', 'You are logged out!');
        }
       }
     }


                
            
            
        
        
        
    