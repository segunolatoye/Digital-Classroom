<?php
/**
 * Created by PhpStorm.
 * User: Arif
 * Date: 4/11/2018
 * Time: 9:28 PM
 */

include_once "Dbconnection.php";

class rf_department
{
    public function allDpt(){
        $db = new DbConnection();
        $conn=$db->dbConnect();

        $query = "SELECT * FROM `department`";

        $statement=$conn->query($query);

        $statement->execute();
        $rs = $statement->fetchAll(pdo::FETCH_ASSOC);
        return $rs;
    }
    public function DptIDByName($name){
        $db = new DbConnection();
        $conn=$db->dbConnect();

        $query = "SELECT * FROM `department` WHERE dpt_name='$name'";

        $statement=$conn->prepare($query);

        $statement->execute();
        $rs = $statement->fetch(pdo::FETCH_OBJ);
        return $rs;
    }
}