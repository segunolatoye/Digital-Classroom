<?php
include_once "Dbconnection.php";
/**
 * Created by PhpStorm.
 * User: SUKKUR
 * Date: 5/1/2018
 * Time: 3:06 PM
 */

class adminNotice
{
    public function insertnoyice($id,$notice){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="INSERT INTO `admin_notice`(`uploader_id`, `title`, `notice`) VALUES (?,?,?)";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$id);
        $prepared->bindParam(2,$notice['title']);
        $prepared->bindParam(3,$notice['notice']);
        $prepared->execute();
    }
    public function shownotice(){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="SELECT * FROM `admin_notice` ORDER BY id DESC";
        $prepared=$conn->prepare($sql);
        $prepared->execute();
        $result=$prepared->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
}