<?php
session_start();
include '../config/functions.php';
header('Content-type: application/json');

if(isset($_POST['addNewAuthor'])){

    $authorName = strip_tags($_POST['authorName']);
    $authorAffiliation = strip_tags($_POST['authorAffiliation']);

    echo json_encode(addAuthor($conn, $authorName, $authorAffiliation));
}

if(isset($_POST['getAuthorList'])){

    echo json_encode(getAuthorList($conn));
}