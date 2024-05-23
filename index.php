<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// this use allows us to use different document roots on each user's site
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

$sql = "SELECT * FROM students";
$statement = $dbh->prepare($sql);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Students</title>
</head>
<body>
<h1>Student List</h1>
<a href = "form.php">Add new student here</a>
<ol>
    <?php
    foreach($result as $row) {
        echo "<li>" . $row['last'] . ", " .  $row['first'] . "</li>";
    }
    $path = $_SERVER['DOCUMENT_ROOT'].'/form.php';
    $sql = "INSERT INTO student (last, first) VALUES (:last, :first)";

    $statement = $dbh->prepare($sql);
    $last = ""
    $first = ""

    ?>
</ol>

</body>
</html>

