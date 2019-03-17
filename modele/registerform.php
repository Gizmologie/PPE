<?php
    require_once 'connect/bdd.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $hashed = password_hash($password,PASSWORD_BCRYPT);

    $bdd = new bdd();
    $bdd->_connect();
    $check = $bdd->queryDisplay('SELECT username FROM user WHERE username=:username', array(':username'=>$username));

    if ($check['username'] != $username) {
        $value = $bdd->queryDisplay('INSERT INTO user (username, password, email, statut) VALUES ("' . $username . '","' . $hashed . '","' . $email . '", "user")');
    }
    echo "<script type='text/javascript'>document.location.replace('?page=accueil');</script>"; // la commande header ne fonctionnant pas

?>