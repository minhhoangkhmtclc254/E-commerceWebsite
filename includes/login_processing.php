<?php
if($_SERVER["REQUEST_METHOD"] === "POST") {
    $userName = $_POST["userName"];
    $userPassword = $_POST["userPassword"];
    try {
        require_once "dbh.inc.php";
        require_once "login_model.inc.php";
        require_once "login_contr.inc.php";
        $errors = [];
        if(is_input_empty($userName, $userPassword)) {
            $errors["empty_input"] = "Fill in all fields!";
        }
        $result = get_user($pdo, $userName);
        if(is_username_wrong($result)) {
            $errors["login_incorrect"] = "Incorrect login information!";
        }
        if(!is_username_wrong($result) && is_password_wrong($userPassword, $result["userPassword"])) {
            $errors["login_incorrect"] = "Incorrect login information!";
        }

        require_once "config_session.inc.php";
        if($errors) {
            $_SESSION["errors_login"] = $errors;

            $loginData = [
                "userName" => $userName
            ];
            $_SESSION["login_data"] = $loginData;
            header("Location: ../login.php");
            die();
        }
        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $result["id"];
        session_id($sessionId);

        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_userName"] = htmlspecialchars($result["userName"]);
        $_SESSION["last_regeneration"] = time();
        header("Location: ../index.php?login=success");
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