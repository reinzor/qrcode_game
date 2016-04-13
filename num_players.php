<?php
$servername = "FILL_ME";
$username = "FILL_ME";
$password = "FILL_ME";
$databasename = "FILL_ME";

$conn = mysql_connect($servername, $username, $password);
if (!$conn) {
    die('Not connected : ' . mysql_error());
}

// make foo the current db
$db = mysql_select_db($databasename, $conn);
if (!$db) {
    die ('Can\'t use ' . $databasename . ' : ' . mysql_error());
}

$result = mysql_query("SELECT * FROM teams");
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
if (mysql_num_rows($result) > 0) {
    while ($row = mysql_fetch_assoc($result)) {
        // Perform query per team on balls table
        $num_balls = mysql_num_rows(mysql_query("SELECT id FROM balls WHERE team_id='". $row['id'] ."'"));

        echo $row['name'].' [Players = '.$row['num_players'].'] <br />';
    }
}