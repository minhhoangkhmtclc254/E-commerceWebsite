<?php
declare(strict_types = 1);
function signup_inputs() {
    if(isset($_SESSION["signup_data"]["userName"]) && !isset($_SESSION["errors_signup"]["username_taken"])) {
        echo '
        <div class="form-outline form-white mb-4">
            <label class="form-label" for="typeEmailX">Email</label>
            <input type="email" id="typeEmailX" name="userName" class="form-control form-control-lg" placeholder="Email" value="' . $_SESSION["signup_data"]["userName"] . '" />
        </div>
        ';
    }
    else {
        echo '
        <div class="form-outline form-white mb-4">
            <label class="form-label" for="typeEmailX">Email</label>
            <input type="email" id="typeEmailX" name="userName" class="form-control form-control-lg" placeholder="Email" />
        </div>
        ';
    }
    echo '
    <div class="form-outline form-white mb-4">
        <label class="form-label" for="typePasswordX">Password</label>
        <input type="password" id="typePasswordX" name="userPassword" class="form-control form-control-lg" placeholder="Password" />
    </div>
    ';
}
function check_signup_errors() {
    if(isset($_SESSION["errors_signup"])) {
        $errors = $_SESSION["errors_signup"];
        echo "<br>";
        foreach($errors as $error) {
            echo '<p class="form-error">' . $error . '</p>';
        }
        unset($_SESSION["errors_signup"]);
    }
    else if(isset($_GET["signup"]) && $_GET["signup"] === "success") {
        echo "<br>";
        echo '<p class="form-error">Signup success!</p>';
    }
}