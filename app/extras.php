$query_run = mysqli_query($con, $query);
        if($query_run)
        {
            sendemail_verify("$name", "$email", "$verify_token");

            $_SESSION['status'] = "Registration Successful. Please verify";
            header("Location: register.php")
        }
        else
        {
            $_SESSION['status'] ="Registration Failed";
            header("Location: register.php");
        }
        