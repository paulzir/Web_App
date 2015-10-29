<?php
$link = @mysqli_connect("localhost","root","");

if (!$link) {
    echo '<p>Error connecting to the database <br>';  
    echo 'Please try again.</p>';
    exit(); 
}

$results = @mysqli_select_db($link, 'dbase');

if (!$results) {
    echo '<p>Error selecting database table <br>';  
    echo 'Please try again.</p>';
    exit(); 
}
?>
