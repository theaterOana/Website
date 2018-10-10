<?php

class Repo
{

    private $servername = "www90.totaalholding.nl:3306";
    private $username = "theate1q_VoorLeden";
    private $password = "(V+$?%!~f}UX";

    public function __construct()
    {


        try {


        } catch
        (PDOException $e) {

        }

    }

    public function getAllLeden()
    {
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=theate1q_spelers", $this->username, $this->password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM `Leden2018` ");
            $stmt->execute();
            $result = $stmt->fetchAll();

            return json_encode($result);
        } catch (PDOException $e) {
            return null;
        }

    }

    public function checkPasswordFor($username, $password)
    {

        $hash = $this->getPasswordForUser($username);

        $pass = password_verify($password, $hash);

        $active = $this->isActive($username);
        return ($pass && $active);
    }

    public function isActive($UserName)
    {

        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=theate1q_spelers", $this->username, $this->password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT Active FROM `Leden2018` WHERE UserName LIKE :UserName");
            $stmt->bindValue(":UserName", $UserName);
            $stmt->execute();
            $result = $stmt->fetchAll();

            return ($result[0]["Active"]);
        } catch (PDOException $e) {
            echo('<div class="frame"><p>Error tijdens het ophalen van status</p></div>');
        }

    }

    public function getPasswordForUser($username)
    {
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=theate1q_spelers", $this->username, $this->password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT Wachtwoord FROM `Leden2018` WHERE UserName LIKE :UserName");
            $stmt->bindValue(":UserName", $username);
            $stmt->execute();
            $result = $stmt->fetchAll();
//            print_r( $result[0]["Wachtwoord"]);
            return $result[0]["Wachtwoord"];
        } catch (PDOException $e) {
            echo('<div class="frame"><p>Error tijdens het ophalen van wachtwoord</p></div>');
        }
    }

    public function Register($Voornaam, $Famielienaam, $Wachtwoord, $UserName)
    {
        try {
            $Wachtwoord = password_hash($Wachtwoord, PASSWORD_DEFAULT);
            $conn = new PDO("mysql:host=$this->servername;dbname=theate1q_spelers", $this->username, $this->password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("INSERT INTO `Leden2018`(`Voornaam`, `Familienaam`, `Wachtwoord`, `Active`, `UserName`) VALUES (:Voornaam,:Familienaam,:Wachtwoord,false ,:Username)");
            $stmt->bindValue(":Voornaam", $Voornaam);
            $stmt->bindValue(":Familienaam", $Famielienaam);
            $stmt->bindValue(":Wachtwoord", $Wachtwoord);
            $stmt->bindValue(":Username", $UserName);
            $stmt->execute();
            $result = $stmt->fetchAll();

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
