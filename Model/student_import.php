<?php
/**
 * Created by PhpStorm.
 * User: Arif
 * Date: 4/11/2018
 * Time: 9:28 PM
 */

use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Common\Type;
require_once '../vendor/box/spout/src/Spout/Autoloader/autoload.php';

include_once "Dbconnection.php";

class student_import
{
    public  function insert_std_details($data){
        $db = new DbConnection();
        $conn=$db->dbConnect();

        $query = "INSERT INTO `students_master`(`department_id`, `session_id`, `batch_id`) VALUES (?,?,?)";

        $statement=$conn->prepare($query);

        $statement->bindParam(1,$data['department']);
        $statement->bindParam(2,$data['session']);
        $statement->bindParam(3,$data['batch']);

        $statement->execute();
    }

    public  function last_id_of_std_batch(){
        $db = new DbConnection();
        $conn=$db->dbConnect();

        $query = "SELECT id FROM `students_master`  ORDER by id DESC LIMIT 1 ";

        $statement=$conn->prepare($query);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }

    public  function all_std_master(){
        $db = new DbConnection();
        $conn=$db->dbConnect();

        $query = "SELECT department.dpt_name,session.session_name,batch.batch_name FROM department,session,batch,students_master WHERE students_master.department_id=department.id AND students_master.session_id=session.id AND students_master.batch_id=batch.id";

        $statement=$conn->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function insert($xl_file,$info,$id)
    {
        // Get File extension eg. 'xlsx' to check file is excel sheet
        $pathinfo = pathinfo($xl_file["file"]["name"]);

        // check file has extension xlsx, xls and also check
        // file is not empty
        if (($pathinfo['extension'] == 'xlsx' || $pathinfo['extension'] == 'xls')
            && $xl_file['file']['size'] > 0 ) {

            // Temporary file name
            $inputFileName = $xl_file['file']['tmp_name'];

            // Read excel file by using ReadFactory object.
            $reader = ReaderFactory::create(Type::XLSX);

            // Open file
            $reader->open($inputFileName);
            $count = 1;

            // Number of sheet in excel file
            foreach ($reader->getSheetIterator() as $sheet) {

                // Number of Rows in Excel sheet
                foreach ($sheet->getRowIterator() as $row) {

                    // It reads data after header. In the my excel sheet,
                    // header is in the first row.
                    if ($count > 1) {

                        // Data of excel sheet
                        $data['name'] = $row[0];
                        $data['student_id'] = $row[1];
                        $data['email'] = $row[2];

                        //Here, You can insert data into database.
                       /* echo "<pre>";
                        var_dump($data);
                        print_r($info);*/
                        $pass=md5(123);

                        $db = new DbConnection();
                        $conn=$db->dbConnect();

                        $query = "INSERT INTO `students_details`(`std_master_id`,`name`, `student_id`, `email`, `pass`, `session_id`, `dpt_id`, `batch_id`) VALUES (?,?,?,?,?,?,?,?)";

                        $statement=$conn->prepare($query);

                        $statement->bindParam(1,$id);
                        $statement->bindParam(2,$data['name']);
                        $statement->bindParam(3,$data['student_id']);
                        $statement->bindParam(4,$data['email']);
                        $statement->bindParam(5,$pass);
                        $statement->bindParam(6,$info['session']);
                        $statement->bindParam(7,$info['department']);
                        $statement->bindParam(8,$info['batch']);

                        $statement->execute();

                    }
                    $count++;
                }
            }
            // Close excel file
            $reader->close();

        } else {

            echo "Please Select Valid Excel File";
        }
    }
}