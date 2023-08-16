<?php
    require  "../model/review.php";

    session_start();
    $host = "localhost";
    $db = "movie_review";
    $username = "root";
    $password = "";
    try{
    $conn = new mysqli($host, $username, $password, $db);
        
        if ($conn->connect_errno) {
            exit("Konekcija neuspesna: " . $conn->connect_errno);
        }

        $id = $_GET['id'];

        $res = review::getReview($id, $conn);

        while($data = $res->fetch_assoc()){
            echo json_encode($data['id']."|".$data['title']."|".$data['content']."|".$data['grade']);
        }

        
    } catch(Exception $e){
        echo $e->getMessage() . "<br/>";
            while($e = $e->getPrevious()) {
                echo 'Previous exception: '.$e->getMessage() . "<br/>";
            }
    }
?>