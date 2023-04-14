<?php
$conn = new mysqli("localhost", "root", "", "klcdoe");
if ($conn) {

    $sql = "SELECT * FROM posts ORDER BY created_at ASC;
    -- DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $resp= "id: " . $row["category_id"] ."<br>". "Title: " . $row["title"] . "<br>". "Body:- ".$row["body"] . "<br>" . $row['author'] . "<br>" . $row['created_at'] . "<br><br>"; 

        header('content-type: application/json'); 
        
        $response["response"]=$resp; 
        echo json_encode($response);    
    }
    } else {
        echo "0 results";
    }
} else {
    echo "Failed to connect!";
}

mysqli_close($conn)

// header('content-type: application/json');
  
// $response["response"]=$resp;
// echo json_encode($response);
?>