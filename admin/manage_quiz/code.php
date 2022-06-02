<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "uniquedeveloper");

// require 'vendor/autoload.php';
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;



if(isset($_POST['save_excel_data']))
{
    $fileName = $_FILES['import_file']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['xls','csv','xlsx'];
    $cat = $_POST['selected_course'];
    $sub = 2;
    if($cat=="java"){
        $sub=2;
    }
    if($cat=="python"){
        $sub=4;
    }
    if($cat=="DSU"){
        $sub=15;
    }

    if(in_array($file_ext, $allowed_ext))
    {
        $inputFileNamePath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        $count = "0";
        foreach($data as $row)
        {
            if($count > 0)
            {
                $question = $row['0'];
                $opt1= $row['1'];
                $opt2 = $row['2'];
                $opt3 = $row['3'];
                $opt4 = $row['4'];
                $answer = $row['5'];
                $answer = $answer-1;

                $studentQuery = "INSERT INTO question_test (question,opt1,opt2,opt3,opt4,answer,course_id) VALUES ('$question','$opt1','$opt2','$opt3','$opt4',$answer,$cat)";
                $result = mysqli_query($conn, $studentQuery);
                $msg = true;
            }
            else
            {
                $count = "1";
            }
        }

        if(isset($msg))
        {
            $_SESSION['message'] = "Successfully Imported";
            header('Location: manage_quiz.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Imported";
            header('Location: manage_quiz.php');
            exit(0);
        }
    }
    else
    {
        $_SESSION['message'] = "Invalid File";
        header('Location: manage_quiz.php');
        exit(0);
    }
}
?>