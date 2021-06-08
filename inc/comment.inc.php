<?php

        require 'functions.php';
        require 'dbh.inc.php';

        $firstname = $_GET['firstname'];
        $lastname = $_GET['lastname'];
        $email = $_GET['email'];
        $comment = $_GET['message'];

        if (emptyInput($firstname, $lastname, $comment) !== false) {
            //header("location: ../browse.php?error=emptyInputs");
            echo json_encode(['status'=>'EMPTY']);
            return ;
        }

        if (invalidEmail($email) !== false) {
            //header("location: ../browse.php?error=emptyInputs");
            echo json_encode(['status'=>'invalidEmail']);
            return ;
        }

        $comment = createComment($firstname, $lastname, $email, $comment);

        if($comment == 'OK') {
            echo json_encode(['status'=>'OK']);
            //echo "Comment has been submitted";
            return ;
        }
        else {
            echo json_encode(['status'=>'ERROR']);
            return ;
        }


        // if (invalidName($firstname)) !== false {
        //     header("location: ../index.php?error=invalidfirstname");
        //     exit();
        // }