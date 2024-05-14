<?php
declare(strict_types = 1);
function output_username() {
    if(isset($_SESSION["user_id"])) {
        echo $_SESSION["user_userName"];
    }
    else {
        echo "You are not logged in";
    }
}
function login_inputs() {
    if(isset($_SESSION["login_data"]["userName"]) && !isset($_SESSION["errors_login"]["username_taken"])) {
        echo '
        <div class="form-outline form-white mb-4">
            <label class="form-label" for="userName">Email</label>
            <input type="email" id="userName" name="userName" class="form-control form-control-lg" placeholder="Email" value="' . $_SESSION["login_data"]["userName"] . '" />
            <span id="email_error"></span>
        </div>
        ';
    }
    else {
        echo '
        <div class="form-outline form-white mb-4">
            <label class="form-label" for="userName">Email</label>
            <input type="email" id="userName" name="userName" class="form-control form-control-lg" placeholder="Email" />
            <span id="email_error"></span>
        </div>
        ';
    }
    echo '
    <div class="form-outline form-white mb-4">
        <label class="form-label" for="userPassword">Password</label>
        <input type="password" id="userPassword" name="userPassword" class="form-control form-control-lg" placeholder="Password" />
        <span id="password_error"></span>
    </div>
    ';
}
function check_login_errors() {
    if(isset($_SESSION["errors_login"])) {
        $errors = $_SESSION["errors_login"];
        echo "<br>";
        foreach($errors as $error) {
            echo '<p class="form-error">' . $error . '</p>';
        }
        unset($_SESSION["errors_login"]);
    }
    else if(isset($_GET["login"]) && $_GET["login"] === "success") {
        echo "<br>";
        echo '<p class="form-error">Login success!</p>';
    }
}