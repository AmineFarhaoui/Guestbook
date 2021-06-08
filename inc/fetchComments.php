<?php

    require 'functions.php';
    require 'dbh.inc.php';

    //echo fetchComments();

    $comment = fetchComments();

    if ($comment == 'ERROR') {
        echo json_encode(['status' => 'ERROR']);
    }
    else {
        json_decode($comment);
    }

    // if (fetchComments() !== false) {
    //     //header("location: ../browse.php?error=emptyInputs");
    //     echo json_encode(['status'=>'EMPTY']);
    //     return;
    // }