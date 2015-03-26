<?php
$serverList = array('localhost', '127.0.0.1');

//echo $_SERVER['HTTP_HOST'];

if (in_array($_SERVER['HTTP_HOST'], $serverList)) {
	$db = new PDO("mysql:host=localhost;dbname=********", "root", "");
} else {
	$db = new PDO("mysql:host=***********;dbname=********", "*********", "*********");
}


$QuestionNumber = $_POST['nextQuestionNumber'];

$sqlString = "SELECT * FROM questions WHERE QuestionNumber = $QuestionNumber";

$stmt = $db -> prepare($sqlString);

$stmt -> execute(array(1));

$count = $stmt -> rowCount();
//echo '{"select":{"rows":'. $count .'}}';

$result = $stmt -> fetchAll(PDO::FETCH_OBJ);

echo json_encode($result);
?>