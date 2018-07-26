<?php
/**
 * Created by PhpStorm.
 * User: Arif
 * Date: 4/11/2018
 * Time: 9:28 PM
 */


include_once "Dbconnection.php";

class rf_batch
{
    public function allBatch(){
        $db = new DbConnection();
        $conn=$db->dbConnect();

        $query = "SELECT * FROM `batch`";

        $statement=$conn->prepare($query);

        $statement->execute();
        $rs = $statement->fetchAll(pdo::FETCH_OBJ);
        return $rs;
    }

    public function BatchIDByName($name){
        $db = new DbConnection();
        $conn=$db->dbConnect();

        $query = "SELECT * FROM `batch` WHERE batch_name='$name'";

        $statement=$conn->prepare($query);

        $statement->execute();
        $rs = $statement->fetch(pdo::FETCH_OBJ);
        return $rs;
    }
}