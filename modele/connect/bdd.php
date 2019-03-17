<?php

class bdd
{
    private $dbh;
    public function _connect ()
    {
          try {
            $this->dbh =new PDO('mysql:host='.HOSTNAME.'; dbname='.DBNAME.'; charset=utf8', USERNAME, PASSWORD);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function queryDisplay ($query, array $values=array())
    {
        try {
            $sth = $this->dbh->prepare($query);
            $sth->execute($values);
            $result = $sth->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
        catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    public function queryArray ($query)
    {
        try {
            $sth = $this->dbh->prepare($query);
            $sth->execute();
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        catch (PDOException $e) {
            print $e->getMessage();
        }
    }


}
?>


