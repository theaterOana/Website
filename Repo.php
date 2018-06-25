<?php

class Repo
{

    private $servername = "www90.totaalholding.nl:3306";
    private $username = "theate1q_VoorLeden";
    private $password = "(V+$?%!~f}UX";

public function __construct()
{


    try
    {



    }

    catch
    (PDOException $e)
    {

    }

}

public function getAllLeden(){
    try{
    $conn = new PDO("mysql:host=$this->servername;dbname=theate1q_spelers", $this->username, $this->password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt =$conn->prepare("SELECT * FROM `Leden` ");
    $stmt->execute();
    $result = $stmt->fetchAll();

    echo json_encode($result);
    }
    catch (PDOException $e){
    }
}
}