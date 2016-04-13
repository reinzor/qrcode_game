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

// Find the code in the database
$code = $_GET['code'];
$team_code = $_COOKIE["team_code"];

$team = NULL;
if ($team_code)
{
    $result = mysql_query("SELECT * FROM teams WHERE code='".$team_code."'");
    if ($result && mysql_num_rows($result) == 1) 
    {
        $team = mysql_fetch_assoc($result);
    }
}


$ball = NULL;
if ($code)
{
    $result = mysql_query("SELECT * FROM balls WHERE code='".$code."'");
    if ($result && mysql_num_rows($result) == 1) 
    {
        $ball = mysql_fetch_assoc($result);
    }
}

?>

<html>
<head>
<title>
    Eindspel Baas van Horst aan de Maas 2015
</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
    <?php
    if (is_null($ball))
    { 
    ?>
    <script>alert('Ongeldige code!')</script>
    <?php
    }
    elseif ($ball['team_id'] != -1)
    {
        echo '<script>alert("Deze code is al gebruikt");</script>';
    }
    elseif ($team)
    {
        // Update the db
        if (!mysql_query("UPDATE balls SET team_id='".$team['id']."' WHERE id=".$ball['id']) === TRUE)
        {
            echo "<script>alert('Error: " . $sql . " - " . $conn->error . "');</script>";  
        }  
        else
        {
            echo "<script>alert('Goed bezig; +1 voor team: " . $team['name'] . "');</script>";  
        }
    }
    else
    {
        echo '<script>alert("Jouw apparaat is niet geregistreerd!");</script>';
    }
    ?>
</body>
</html>