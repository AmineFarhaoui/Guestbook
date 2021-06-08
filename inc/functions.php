<?php

    function emptyInput($firstname, $lastname, $comment) {
        if (empty($firstname) || empty($lastname) || empty($comment)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function invalidEmail($email) {
        if(!empty($email)) {
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $result = true;
            }
            else {
                $result = false;
            }
        }
        else {
            $result = false;
        }
        return $result;
    }

    function createComment($firstname, $lastname, $email, $comment) {
        require 'dbh.inc.php';
        
        $sql = "INSERT INTO posts (fisrstName, lastName, emailAddress, message) VALUES ('$firstname', '$lastname', '$email', '$comment')";
        
        if (mysqli_query($conn, $sql)) {
            return 'OK';
        }
        else {
            return 'ERROR';
        }
        
    }

    function fetchComments() {
        require 'dbh.inc.php';

        $sql = 'SELECT * FROM posts';
        $result = mysqli_query($conn, $sql);
        $fetched = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $fetched = array_reverse($fetched);

        if (mysqli_num_rows($result) < 0) {
            return 'ERROR';
        }
        else {
            echo json_encode($fetched);
            return;
        }
        //exit();
    }
