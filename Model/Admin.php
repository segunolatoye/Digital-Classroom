<?php
/**
 * Created by PhpStorm.
 * User: Fardin
 * Date: 5/8/2018
 * Time: 1:18 PM
 */

include_once "Dbconnection.php";

class Admin{

    public function getAllById($id){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="SELECT * FROM `admin` WHERE id=? AND status=0";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$id);
        $prepared->execute();
        $result=$prepared->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function updateAdminProfile($ad,$id){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="UPDATE `admin` SET `name`=? WHERE id=?";
        $prepare=$conn->prepare($sql);
        $prepare->bindParam(1,$ad);
        $prepare->bindParam(2,$id);
        $prepare->execute();
    }

}