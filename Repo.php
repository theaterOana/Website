<?php

class Repo
{

    private $servername = "www90.totaalholding.nl";
    private $username = "theate1q_VoorLeden";
    private $password = "(V+$?%!~f}UX";
    private $conn;

public function __construct()
{

    try
    {

        $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    }

    catch
    (PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }

}

public function getAllLeden(){
    $sql = "SELECT * FROM `Leden`";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table><tr><th>ID</th><th>Name</th></tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["id"]."</td><td>".$row["Voornaam"]." ".$row["Familienaam"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
}
}