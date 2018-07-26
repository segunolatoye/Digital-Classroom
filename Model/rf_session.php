<?php
/**
 * Created by PhpStorm.
 * User: Arif
 * Date: 4/11/2018
 * Time: 9:28 PM
 */


include_once "Dbconnection.php";

class rf_session
{
    public function allSession(){
        $db = new DbConnection();
        $conn=$db->dbConnect();

        $query = "SELECT * FROM `session`";

        $statement=$conn->query($query);

        $statement->execute();
        $rs = $statement->fetchAll(pdo::FETCH_OBJ);
        return $rs;
    }
}