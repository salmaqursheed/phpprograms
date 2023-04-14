<?php
    $conn = new mysqli('localhost', 'root', '');
    mysqli_select_db($conn, 'klcdoe');
    if (isset($_GET["email"]) && $_GET["email"] != '' &&isset($_GET['password']) && $_GET['password'] != '')
    {
        $email = $_GET["email"];
        $password = $_GET['password'];
        echo  $email;
        echo  $password;
  
        $getData = "SELECT * FROM Student_information WHERE email='" .$email."'
        and password='".$password."'";
  
        $result = mysqli_query($conn,$getData);
  
        $userId="";
        while( $r = mysqli_fetch_row($result))
        {
            $userId=$r[0];
        }
  
        if ($result->num_rows> 0)
        {
  
            $resp["status"] = "1";

            
            $resp["userid"] = $userId;
            $resp["message"] = "Login successfully";
        }
        else{
            
            $resp["status"] = "-2";
            $resp["message"] = "Enter correct email or password";
            
        }
        
  
    }
    else
    {
  
        $resp["status"] = "-2";
        $resp["message"] = "Enter Correct email.";
  
  
    }
  
    header('content-type: application/json');
  
    $response["response"]=$resp;
    echo json_encode($response);

  
    @mysqli_close($conn);
  
?>

