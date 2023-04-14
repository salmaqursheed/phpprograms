<?php
$conn = new mysqli('10.46.238.226', 'root', '','klcdoe');
if($conn){

    $Studentid = $_GET["id"];
    $NewPassword = $_GET["New"];
    $RepeatPassword = $_GET["Repeat"];  
    
    if ($NewPassword == $RepeatPassword){
        $sql_1 = "UPDATE studnet_data SET Student_password = '".$NewPassword. "' WHERE Student_id ='".$Studentid."'";
        mysqli_query($conn,$sql_1);
        echo "Password change Sucessfully"; 

        $resp["status"] = "2";
        $resp["message"] = "Password change Sucessfully";
    }
    else{
        $resp["status"] = "1";
        $resp["message"] = "Password Not Matching";
    }

}
else{
    echo "DataBase Not connected";
}

header('content-type: application/json');
  
$response["response"]=$resp;
echo json_encode($response);


?>