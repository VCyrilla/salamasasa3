<?php 
namespace App\Controllers;

use App\Models\DoctorsModel;
class DoctorController extends BaseController
{
    public function index()
    {
        $doctor = new DoctorsModel();
        $data['doctor'] = $doctor->where('role', 'doctor') ->findAll();
        return view('doctor/index', $data);
    }

    public function create()
    {
        return view ('doctor/create');
    }

    public function store()
    {
        $doctor = new DoctorsModel();
        $data =[
            'name'=> $this->request->getPost('name'),
            'email'=> $this->request->getPost('email'),
            'specialisation'=> $this->request->getPost('specialisation'),
            'role'=> 'doctor'

        ];

        $doctor->save($data);
        return redirect()->to('doctor')->with('status', 'Doctor Added Successfully');
    }

    public function edit($userID)
    {
        $doctor = new DoctorsModel();
        $data['doctor'] =$doctor->find($userID);
        return view('doctor/edit', $data);
    }

    public function update($userID)
    {
        $doctor = new DoctorsModel();
        $doctor->find($userID);
        $data =[
            'name'=> $this->request->getPost('name'),
            'email'=> $this->request->getPost('email'),
            'specialisation'=> $this->request->getPost('specialisation'),
            'role'=> 'doctor'

        ];
        $doctor->update($userID, $data);
        return redirect()->to(base_url('doctor'))->with('status', 'Doctor updated successfully');
    }

    public function delete($userID)
    {
        $doctor= new DoctorsModel();
        $doctor->delete($userID);
        return redirect()->to(base_url('doctor'))->with('status', 'Doctor deleted successfully');

    }
}
