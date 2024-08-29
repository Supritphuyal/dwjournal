<?php
session_start();
include '../config/functions.php';

function addPaperAuthors($conn, $authors, $paper) {
    $result = '';
    foreach ($authors as $author) {
        if(addPaperAuthor($conn, $author, $paper)) {
            $result = true;
        } else {
            $result = false;
        }
    }
    return $result;
}

function addPaperKeywords($conn, $keywords, $paper) {
    $result = '';
    foreach ($keywords as $keyword) {
        if(addPaperKeyword($conn, $keyword, $paper)) {
            $result = true;
        } else {
            $result = false;
        }
    }
    return $result;
}

if (isset($_POST['uploadPaper'])) {

    $title = strip_tags($_POST['paperTitle']);
    $volume = strip_tags($_POST['paperVolume']);
    $authors = $_POST['authors'];
    $keywords = explode(",", $_POST['paperKeywords']);
    $abstract = $_POST['paperAbstract'];
    $references = $_POST['paperReferences'];

    if(!isset($title)) {
        $_SESSION["message"] = "Title field is empty.";
        $_SESSION["messageType"] = "warning";

        redirect("../admin/dashboard");
        return;
    }

    if(!isset($volume)) {
        $_SESSION["message"] = "Volume field is empty.";
        $_SESSION["messageType"] = "warning";

        redirect("../admin/dashboard");
        return;
    }

    if(!isset($keywords)) {
        $_SESSION["message"] = "Keywords field is empty.";
        $_SESSION["messageType"] = "warning";

        redirect("../admin/dashboard");
        return;
    }

    if(!isset($abstract)) {
        $_SESSION["message"] = "Abstract field is empty.";
        $_SESSION["messageType"] = "warning";

        redirect("../admin/dashboard");
        return;
    }

    if(!isset($references)) {
        $_SESSION["message"] = "References field is empty.";
        $_SESSION["messageType"] = "warning";

        redirect("../admin/dashboard");
        return;
    }

    if  ($_FILES['paper']['size']  ==  0)  {
        $_SESSION["message"] = "No file selected.";
        $_SESSION["messageType"] = "error";

        redirect("../admin/dashboard");
        return;
    }

    $allowedFileTypes  =  array("application/pdf");

    $temp = explode(".", $_FILES["paper"]["name"]);
    $extension = end($temp);

    if  (!in_array($_FILES['paper']['type'],  $allowedFileTypes)) {
        $_SESSION["message"] = $extension . " file not permitted.";
        $_SESSION["messageType"] = "error";

        redirect("../admin/dashboard");
        return;
    }

    $fileName = getFormattedName($title) . "." . $extension;
    //$fileName = md5(microtime()).'.'.$extension;

    if (file_exists("../pdf/" . $fileName)) {
        $_SESSION["message"] = "A paper with the same name already exists.";
        $_SESSION["messageType"] = "error";

        redirect("../admin/dashboard");
        return;
    }

    if  (!is_uploaded_file($_FILES['paper']['tmp_name']))   {
        $_SESSION["message"] = "Paper upload failed.";
        $_SESSION["messageType"] = "error";

        redirect("../admin/dashboard");
        return;
    }

    $uploadDir  =  "../pdf/";

    if (move_uploaded_file($_FILES['paper']['tmp_name'],  $uploadDir  .  $fileName)) {

        if(addNewPaper($conn, $title, $volume, $abstract, $references, $fileName)) {

            $paper = getLatestPaper($conn);

            if (addPaperAuthors($conn, $authors, $paper[0]['id'])) {

                if (addPaperKeywords($conn, $keywords, $paper[0]['id'])){
                    $_SESSION["message"] = "Paper successfully uploaded.";
                    $_SESSION["messageType"] = "success";

                    redirect("../admin/dashboard");
                } else {
                    $_SESSION["messageType"] = "error";

                    $_SESSION["message"] = "Paper upload failed.";
                    redirect("../admin/dashboard");
                }
            }
        }
    }
}

if (isset($_POST['deleteModal'])){
    $paper = strip_tags($_POST['paperIdToDelete']);

    if(deletePaper($conn, $paper)) {
        $_SESSION["message"] = "Paper deleted.";
        $_SESSION["messageType"] = "success";

        redirect("../admin/papers");
    } else {
        $_SESSION["message"] = "Some error occurred.";
        $_SESSION["messageType"] = "success";

        redirect("../admin/papers");
    }
}

redirect("../admin/papers");
