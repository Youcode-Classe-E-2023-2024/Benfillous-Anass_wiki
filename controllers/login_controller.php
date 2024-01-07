<?php

if (isset($_POST['login'])) {
    extract($_POST);
    $userChecker = User::user_checker($email, $db);
    if ($userChecker) {
        if (password_verify(trim($password), $userChecker["password"])) {
            $authentication = new Authentication();
            $authentication->login($userChecker["user_id"]);
        } else
            throw new Exception("password_incorrect");
    } else {
        throw new Exception("User_doesnt_exist");
    }
}