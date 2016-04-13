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

$result = mysql_query("SELECT id FROM balls WHERE team_id='-1'");
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
echo mysql_num_rows($result);