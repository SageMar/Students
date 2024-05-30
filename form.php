<?php
$path = $_SERVER['DOCUMENT_ROOT'].'/../config.php';
require_once $path;

try {
    // instantiate the PDO database Object
    $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    echo 'connect';
} catch (PDOException $e){
    // terminate if it can't connect to database
    die($e->getMessage());
}

$sql = "INSERT INTO student (last, first) VALUES (:last, :first)";

$statement = $dbh->prepare($sql);
$statement->bindParam(':last', $last);
$statement->bindParam(':first', $first);

$statement->bindParam(':SID', $SID);
$statement->bindParam(':Birthdate', $Birthdate);

$statement->bindParam(':GPA', $GPA);
$statement->bindParam(':Advisor', $Advisor);




?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h1> New students</h1>
<form>

<label for="sid"> ID:</label>
<input type="text" sid="id" name="sid" required>


<label for="last">Last Name:</label>
<input type="text" id="last" name="last" required>

<label for="first">First Name:</label>
<input type="text" id="first" name="first" required>

<label for="birthdate">Birthdate:</label>
<input type="date" id="birthdate" name="birthdate" required>

<input type="text" id="gpa" name="gpa" required>

<label for="advisor">Advisor:</label>
<input type="text" id="advisor" name="advisor" required>
<br>

</form>

</body>
</html>


