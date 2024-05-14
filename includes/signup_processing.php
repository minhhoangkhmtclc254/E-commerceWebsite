<?php
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $userName = $_POST["userName"];
    $userPassword = $_POST["userPassword"];
    try {
        require_once "dbh.inc.php";
        require_once "signup_model.inc.php";
        require_once "signup_contr.inc.php";
        $errors = [];
        if(is_input_empty($userName, $userPassword)) {
            $errors["empty_input"] = "Fill in all fields!";
        }
        if(is_username_invalid($userName)) {
            $errors["invalid_username"] = "Invalid username!";
        }
        if(is_username_taken($pdo, $userName)) {
            $errors["username_taken"] = "Username already taken!";
        }
        if(is_password_invalid($userPassword)) {
            $errors["invalid_password"] = "Invalid password!";
        }
        require_once "config_session.inc.php";
        if($errors) {
            $_SESSION["errors_signup"] = $errors;

            $signupData = [
                "userName" => $userName
            ];
            $_SESSION["signup_data"] = $signupData;
            header("Location: ../signup.php");
            die();
        }
        create_user($pdo, $userName, $userPassword);
        // header("Location: ../index.php?signup=success");
        header("Location: ../login.php?signup=success");
        $pdo = null;
        $stmt = null;
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}
else {
    header("Location: ../index.php");
    die();
}