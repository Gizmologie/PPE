<?php
require_once 'bdd.php';

class user
{
    private $username;
    private $statut;
    private $email;

    public function getStatutById ($id)
    {
        $bdd = new bdd();
        $bdd->_connect();
        $this->statut = $bdd->queryDisplay('SELECT statut FROM user WHERE id="'.$id.'"');
        return $this->statut;
    }

    public function getAllDataById ($id)
    {
        $bdd = new bdd();
        $bdd->_connect();
        $value = $bdd->queryArray('SELECT username, email, statut FROM user WHERE id="'.$id.'"');
        return $value;
    }


}
?>