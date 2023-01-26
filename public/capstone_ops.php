<?php

    session_start();
    
    $conn = new mysqli('localhost', 'u134858705_cimbalistad', 'groupieDJC1', 'u134858705_soundtrak');
    
    if($_GET["action"] == "login") {
        $username = $_GET["username"];
        $password = $_GET["password"];
        
        $sql = "SELECT * FROM capstone_users WHERE username='".$username."'";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            
            if(password_verify($_GET["password"], $row["password"])) {
                echo("yes");
            }
            else {
                echo "no";
            }
        }
        else
            echo "no";
    }
    else if($_GET["action"] == "register") {
        $username = $_GET["username"];
        $password = password_hash($_GET["password"], PASSWORD_DEFAULT);
        $email = $_GET["email"];
        
        
        $sql = "SELECT * FROM capstone_users WHERE USERNAME='".$username."'";
        $result = $conn->query($sql);
            
        if ($result->num_rows <= 0) {
            $sql = "INSERT INTO capstone_users (username, password, email) VALUES ('$username', '$password', '$email')";
                
            $result = $conn->query($sql);
        
            if($result)
            echo "yes";
        }
        else {
            echo "usernameTaken";
        }
    }
?>