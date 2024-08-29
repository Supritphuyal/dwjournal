<?php
session_start();
include '../config/functions.php';

if (isset($_POST['login'])) {

    $username = strip_tags($_POST['username']);
    $password = md5($_POST['password']);

    $stmt=$conn->prepare('SELECT * FROM users WHERE username=? AND password=? ');
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $result=$stmt->get_result();

    if ($result->num_rows > 0) {

        $user = mysqli_fetch_all($result,MYSQLI_ASSOC);

        $_SESSION["username"] = $user[0]['username'];
        $_SESSION["role"] = $user[0]['role'];
        $_SESSION["user_id"] = $user[0]['id'];

        $_SESSION["message"] = "Successfully logged in!";
        $_SESSION["messageType"] = "success";

        redirect("../admin/dashboard");
    } else {
        $_SESSION["message"] = "Incorrect username/password";
        $_SESSION["messageType"] = "error";
        redirect("../admin/login");
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    redirect("../admin/login");
}
?>
