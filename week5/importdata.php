<?php

include 'config.php';
$query = '';
$filename = file('D:\xampp\htdocs\Assignments\week5\UserAuthOOPMYSQL\users.sql'); // pls change to your file path else code won't work.
foreach ($filename as $row) {

    //loop through file row
    $row_start = substr(trim($row), 0, 2);
    $row_end = substr(trim($row), -1, 1);

    if (empty($row) || $row_start == '--' || $row_start == '/*' || $row_start == '//') {
        continue;
    }
    //query for file data
    $query = $query . $row;
    if ($row_end == ';') {
        mysqli_query($conn, $query) or die('<div class="sql-import-error"> query error <b>' . $query . '</b></div>');
        $query = '';
    }
}
echo "\n Data imported successfully into Students table";
$conn->close();

?>