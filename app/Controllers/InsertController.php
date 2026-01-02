<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "../../database/config.php";
session_start();

function insertFaculty() {
    global $conn;
    $firstName = mysqli_real_escape_string($conn, $_REQUEST['firstName']);
    $middleName = mysqli_real_escape_string($conn, $_REQUEST['middleName']);
    $lastName = mysqli_real_escape_string($conn, $_REQUEST['lastName']);
    $advisory_class = mysqli_real_escape_string($conn, $_REQUEST['advisory_class']);
    $subject_id = mysqli_real_escape_string($conn, $_REQUEST['subject_id']);
    $sex = mysqli_real_escape_string($conn, $_REQUEST['sex']);
    $bday = mysqli_real_escape_string($conn, $_REQUEST['bday']);
    $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
    $contact_num = mysqli_real_escape_string($conn, $_REQUEST['contact_num']);
    $motherName = mysqli_real_escape_string($conn, $_REQUEST['stdnt_motherName']);
    $motherContactNum = mysqli_real_escape_string($conn, $_REQUEST['motherContactNum']);
    $fatherName = mysqli_real_escape_string($conn, $_REQUEST['stdnt_fatherName']);
    $fatherContactNum = mysqli_real_escape_string($conn, $_REQUEST['fatherContactNum']);
    $strand = mysqli_real_escape_string($conn, $_REQUEST['strand']);
    $username = mysqli_real_escape_string($conn, $_REQUEST['username']);
    $password = mysqli_real_escape_string($conn, $_REQUEST['password']);

    $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
    $access_level = 2;
    $randomID = rand(1,99999);

    if (empty($middleName)) $middleName = "N/A";
    if (empty($motherName)) $motherName = "N/A";
    if (empty($fatherName)) $fatherName = "N/A";
    if (empty($motherContactNum)) $motherContactNum = "N/A";
    if (empty($fatherContactNum)) $fatherContactNum = "N/A";

    $user_systemStatus = "Offline";
    $stdnt_strand = "FACULTY";
    $stdnt_section = "FACULTY";
    $stdnt_lrn ="FACULTY";

    $sql = "INSERT INTO users (`account_id`, `lastName`, `firstName`, `middleName`, `sex`, `bday`, `motherName`, `motherContactNum`, `fatherName`, `fatherContactNum`, `advisory_class`, `subject_id`, `email`, `contact_num`, `strand`, `stdnt_strand`, `stdnt_section`, `stdnt_lrn`, `access_level`, `username`, `password`, `user_systemStatus`)
        VALUES ('$randomID', '$lastName', '$firstName', '$middleName', '$sex', '$bday', '$motherName', '$motherContactNum', '$fatherName', '$fatherContactNum', '$advisory_class', '$subject_id', '$email', '$contact_num', '$strand', '$stdnt_strand', '$stdnt_section', '$stdnt_lrn', '$access_level', '$username', '$encrypted_password', '$user_systemStatus')";

    if (mysqli_query($conn, $sql)) {	
        header('Location: ../Views/admin/teacher.php');
        exit;
    } else {
        echo "Error: Could not execute $sql. ".mysqli_error($conn);
    }

    mysqli_close($conn);
}

function insertStudent() {
    global $conn;
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName'] ?? '');
    $middleName = mysqli_real_escape_string($conn, $_POST['middleName'] ?? '');
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName'] ?? '');
    $sex = mysqli_real_escape_string($conn, $_POST['sex'] ?? '');
    $stdnt_strand = mysqli_real_escape_string($conn, $_POST['stdnt_strand'] ?? '');
    $stdnt_section = mysqli_real_escape_string($conn, $_POST['stdnt_section'] ?? '');
    $subjectsTaken = $_POST['subjectsTaken'] ?? [];
    $stdnt_lrn = mysqli_real_escape_string($conn, $_POST['stdnt_lrn'] ?? '');
    $bday = mysqli_real_escape_string($conn, $_POST['bday'] ?? '');
    $email = mysqli_real_escape_string($conn, $_POST['email'] ?? '');
    $contact_num = mysqli_real_escape_string($conn, $_POST['contact_num'] ?? '');
    $motherName = mysqli_real_escape_string($conn, $_POST['motherName'] ?? '');
    $motherContactNum = mysqli_real_escape_string($conn, $_POST['motherContactNum'] ?? '');
    $fatherName = mysqli_real_escape_string($conn, $_POST['fatherName'] ?? '');
    $fatherContactNum = mysqli_real_escape_string($conn, $_POST['fatherContactNum'] ?? '');
    $username = mysqli_real_escape_string($conn, $_POST['username'] ?? '');
    $password = mysqli_real_escape_string($conn, $_POST['password'] ?? '');

    // The hash of the password that
    // can be stored in the database
    $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
    $access_level = 0;
    $randomID = rand(1,99999);

    if (empty($middleName)) $middleName = "N/A";
    if (empty($motherName)) $motherName = "N/A";
    if (empty($fatherName)) $fatherName = "N/A";
    if (empty($motherContactNum)) $motherContactNum = "N/A";
    if (empty($fatherContactNum)) $fatherContactNum = "N/A";

    $user_systemStatus = "Offline";
    $strand = "STUDENT";
    $advisory_class = "STUDENT";
    $subject_id = "STUDENT";

    if (!is_array($subjectsTaken)) {
        $subjectsTaken = [$subjectsTaken];
    }
    $subjectsTaken = array_filter($subjectsTaken, function($v) { return $v !== '' && $v !== null; });
    $subjectsTakenStr = implode(',', array_map('intval', $subjectsTaken));

    $sql = "INSERT INTO users (`account_id`, `lastName`, `firstName`, `middleName`, `sex`, `stdnt_strand`, `stdnt_section`, `subjectsTaken`, `stdnt_lrn`, `bday`, `email`, `contact_num`, `motherName`, `motherContactNum`, `fatherName`, `fatherContactNum`, `strand`, `advisory_class`, `subject_id`, `access_level`, `username`, `password`, `user_systemStatus`)
        VALUES ('$randomID', '$lastName', '$firstName', '$middleName', '$sex', '$stdnt_strand', '$stdnt_section', '$subjectsTakenStr', '$stdnt_lrn' , '$bday', '$email', '$contact_num', '$motherName', '$motherContactNum', '$fatherName', '$fatherContactNum', '$strand', '$advisory_class', '$subject_id', '$access_level', '$username', '$encrypted_password', '$user_systemStatus')";

    if (mysqli_query($conn, $sql)) {
        header('Location: ../Views/admin/section.php');
        exit;
    } else {
        echo "Error: Could not execute query. ".mysqli_error($conn);
    }

    mysqli_close($conn);
}

// Only call the function if POST and action is set
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'insertFaculty') {
        insertFaculty();
    } elseif ($_POST['action'] === 'insertStudent') {
        insertStudent();
    }
}

?>