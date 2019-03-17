<?php

class userControlleur
{
    public function login ()
    {
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $bdd = new bdd();
        $bdd->_connect();
        $value = $bdd->queryDisplay('SELECT password FROM user WHERE username=:username', array ('username'=>$username));
        $checkPassword = $value['password'];

        if  (password_verify ( $password , $checkPassword))
        {
            $value = $bdd->queryDisplay('SELECT id FROM user WHERE username=:username', array('username'=>$username));
            $_SESSION['id'] = $value['id'];
            echo $_SESSION['id'];
            header ('refresh:0;url=?page=userpage');
        }
        else
        {
            echo "mot de passe erroné";
            echo "<script type='text/javascript'>document.location.replace('/ppetest/view/login.php');</script>";
        }
    }

    public function register ()
    {
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $hashed = password_hash($password,PASSWORD_BCRYPT);

        $bdd = new bdd();
        $bdd->_connect();
        $check = $bdd->queryDisplay('SELECT username FROM user WHERE username=:username', array(':username'=>$username));

        if ($check['username'] != $username) {
            $bdd->queryDisplay('INSERT INTO user (username, password, email, statut) VALUES (:username,:hashed,:email,"user")', array(':username'=>$username, ':hashed'=>$hashed, ':email'=>$email));
        }
        header ('refresh:0;url=?page=accueil');
    }
}