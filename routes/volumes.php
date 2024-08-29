<?php
session_start();
include '../config/functions.php';

if (isset($_GET['changeStatus'])){

    $volume = strip_tags($_GET['v']);
    $enabled = strip_tags($_GET['e']);

    if ($enabled) {
        $enabled = 0;
    } else {
        $enabled = 1;
    }

    if(updateStatus($conn, $enabled, $volume)) {

        $_SESSION["message"] = "Status changed successfully.";
        $_SESSION["messageType"] = "success";

        redirect("../admin/volumes");
    }
}

if (isset($_POST['addVolume'])){

    $volumeNumber = strip_tags($_POST['volumeNumber']);
    $publishDate = date("Y-m-d H:i:s", strtotime(strip_tags($_POST['volumeDate'])));

    if(!isset($volumeNumber)) {
        $_SESSION["message"] = "Volume name field is empty.";
        $_SESSION["messageType"] = "warning";

        redirect("../admin/volumes");
        return;
    }

    if(!isset($publishDate)) {
        $_SESSION["message"] = "Publish date field is empty.";
        $_SESSION["messageType"] = "warning";

        redirect("../admin/volumes");
        return;
    }

    if(volumeNumberExists($conn, $volumeNumber)) {

        $_SESSION["message"] = "Volume number already exists.";
        $_SESSION["messageType"] = "error";

        redirect("../admin/volumes");

        return;
    }

    if(addNewVolume($conn, $volumeNumber, $publishDate)) {

        $_SESSION["message"] = "New volume added successfully.";
        $_SESSION["messageType"] = "success";

        redirect("../admin/volumes");
    } else {
        $_SESSION["message"] = "Some error occurred.";
        $_SESSION["messageType"] = "error";

        redirect("../admin/volumes");
    }
}

if (isset($_POST['deleteModal'])){
    $volume = strip_tags($_POST['volumeIdToDelete']);

    if(deleteVolume($conn, $volume)) {
        $_SESSION["message"] = "Volume deleted.";
        $_SESSION["messageType"] = "success";

        redirect("../admin/volumes");
    } else {
        $_SESSION["message"] = "Some error occurred.";
        $_SESSION["messageType"] = "success";

        redirect("../admin/volumes");
    }
}

if (isset($_POST['editVolume'])) {

    $volume = strip_tags($_POST['volumeToEdit']);
    $volumeNumber = strip_tags($_POST['volumeNumber']);
    $publishDate = date("Y-m-d H:i:s", strtotime(strip_tags($_POST['volumeDate'])));

    if(!isset($volumeNumber)) {
        $_SESSION["message"] = "Volume name field is empty.";
        $_SESSION["messageType"] = "warning";

        redirect("../admin/volumes");
        return;
    }

    if(!isset($publishDate)) {
        $_SESSION["message"] = "Publish date field is empty.";
        $_SESSION["messageType"] = "warning";

        redirect("../admin/volumes");
        return;
    }

    if(volumeNumberExists($conn, $volumeNumber)) {

        $_SESSION["message"] = "Volume number already exists.";
        $_SESSION["messageType"] = "error";

        redirect("../admin/volumes");

        return;
    }

    if(updateVolume($conn, $volumeNumber, $publishDate)) {

        $_SESSION["message"] = "Volume updated successfully.";
        $_SESSION["messageType"] = "success";

        redirect("../admin/volumes");
    } else {
        $_SESSION["message"] = "Some error occurred.";
        $_SESSION["messageType"] = "error";

        redirect("../admin/volumes");
    }

}

redirect("../admin/volumes");
