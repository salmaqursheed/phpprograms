<?php

$conn=new mysqli("localhost","root","","klcdoe");

$title=$_GET['title'];

if($conn){
    $sql="SELECT * FROM posts WHERE title LIKE '%$title%'";
    $result=$conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc() ){
            $resp="id: " . $row["category_id"] ."<br>". "Title: " . $row["title"] . "<br>". "Body:- ".$row["body"] . "<br>" . $row['author'] . "<br>" . $row['created_at'] . "<br><br>"; 
           
            header('content-type: application/json'); 
 
            $response["response"]=$resp; 
            echo json_encode($response); 
        }
    }
}else{
    echo "Fiald to connect!";
}

?>