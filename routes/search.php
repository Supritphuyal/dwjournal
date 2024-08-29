<?php
/**
 * Created by IntelliJ IDEA.
 * User: awalesushil
 * Date: 10/23/2018
 * Time: 12:41 PM
 */

session_start();
include '../config/functions.php';
header('Content-type: application/json');

if(isset($_POST['getKeywordList'])){

    $searchQuery = $_POST['searchQuery'];

    echo json_encode(getUniqueKeywords($conn, $searchQuery));
}

if(isset($_POST['getTitleList'])){

    $searchQuery = $_POST['searchQuery'];

    echo json_encode(getTitleList($conn, $searchQuery));
}

if(isset($_POST['getAuthorsList'])){

    $searchQuery = $_POST['searchQuery'];

    echo json_encode(getAuthorsList($conn, $searchQuery));
}

if(isset($_POST['getConcatenatedList'])){

    $searchQuery = $_POST['searchQuery'];
    $authors = getAuthorsList($conn, $searchQuery);
    $titles = getTitleList($conn, $searchQuery);
    $keywords = getUniqueKeywords($conn, $searchQuery);

    $allSuggestions = [];

    foreach ($authors as $author) {
        array_push($allSuggestions, $author['name']);
    }
    foreach ($titles as $title) {
        array_push($allSuggestions, $title['title']);
    }
    foreach ($keywords as $keyword) {
        array_push($allSuggestions, $keyword['keyword']);
    }

    echo json_encode($allSuggestions);
}