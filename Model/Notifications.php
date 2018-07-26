<?php
include_once "Dbconnection.php";

class Notifications{


    public function store($notify_id,$message,$batch_id,$dpt_id){

        $obj=new DbConnection();
        $DBH=$obj->dbConnect();

        $sql= "INSERT INTO `Notifications`(`notify_id`, `message`,`as_batch`, `as_department`) VALUES (?,?,?,?)";
        $conn = $DBH->prepare($sql);
        $conn->bindParam(1,$notify_id);
        $conn->bindParam(2,$message);
        $conn->bindParam(3,$batch_id);
        $conn->bindParam(4,$dpt_id);
        $conn->execute();

    }

    public function showNotificationsforAll($batch_id,$dpt_id){
        $obj=new DbConnection();
        $DBH=$obj->dbConnect();

        $sql = "SELECT * FROM `notifications` WHERE `as_batch`='$batch_id' AND `as_department`='$dpt_id' AND `status` =0 ORDER BY id DESC";
        $conn =$DBH->prepare($sql);
        $conn->execute();
        $all = $conn->fetchAll(PDO::FETCH_OBJ);
        return $all;
    }

    public function updateNotification($id){
        $obj=new DbConnection();
        $DBH=$obj->dbConnect();

        $sql = "UPDATE `notifications` SET `status`=1 WHERE `id`='$id'";
        $conn = $DBH->prepare($sql);
        $conn->execute();
    }
    function get_time_ago($timestamp)
    {
        date_default_timezone_set('Asia/Dhaka');
        $time_ago = strtotime($timestamp);

        $current_time = time();
        $time_difference = $current_time - $time_ago;
        $seconds = $time_difference;
        $minutes      = round($seconds / 60 );           // value 60 is seconds
        $hours           = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec
        $days          = round($seconds / 86400);          //86400 = 24 * 60 * 60;
        $weeks          = round($seconds / 604800);          // 7*24*60*60;
        $months          = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60
        $years          = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60
        if($seconds <= 60)
        {
            return "Just Now";
        }
        else if($minutes <=60)
        {
            if($minutes==1)
            {
                return "one minute ago";
            }
            else
            {
                return "$minutes minutes ago";
            }
        }
        else if($hours <=24)
        {
            if($hours==1)
            {
                return "an hour ago";
            }
            else
            {
                return "$hours hrs ago";
            }
        }
        else if($days <= 7)
        {
            if($days==1)
            {
                return "yesterday";
            }
            else
            {
                return "$days days ago";
            }
        }
        else if($weeks <= 4.3) //4.3 == 52/12
        {
            if($weeks==1)
            {
                return "a week ago";
            }
            else
            {
                return "$weeks weeks ago";
            }
        }
        else if($months <=12)
        {
            if($months==1)
            {
                return "a month ago";
            }
            else
            {
                return "$months months ago";
            }
        }
        else
        {
            if($years==1)
            {
                return "one year ago";
            }
            else
            {
                return "$years years ago";
            }
        }
    }

}