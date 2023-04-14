 <?php
$conn=new mysqli("localhost","root","","KLCDOE");
$course = $_GET['course'];
$sql = "SELECT * FROM faculty WHERE Dept = '$course'";
$result = mysqli_query($conn,$sql);
if ($result->num_rows>0){
    while ($row = $result->fetch_assoc()) {
        $resp['results']= " " .$row["eid"].", " . $row["ename"] . ",".$row["ephone"] . "," . $row['email'] . ""; 
        header('content-type: application/json'); 
        
        $response["response"]=$resp; 
        echo json_encode($response);
    }
    // header('content-type: application/json'); 
    
    // $response["response"]=$resp; 
    // echo json_encode($response);    
}  
?>
