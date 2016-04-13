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
$team_code = $_GET['team_code'];

$team = NULL;
if ($team_code)
{
    $result = mysql_query("SELECT * FROM teams WHERE code='".$team_code."'");
    if ($result && mysql_num_rows($result) == 1) 
    {
        $team = mysql_fetch_assoc($result);
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
    if(!isset($_COOKIE['team_code'])) {
        if (is_null($team))
        {
            echo "<script>alert('Ongeldig team id!')</script>";
        }
        elseif ($team['num_players'] >= 13)
        {
            echo '<script>alert("Het maximaal aantal players voor team '.$team['name'].' is al geregistreerd!");</script>';
        }
        else
        {
            $new_num_players = $team['num_players']+1;
            if (!mysql_query("UPDATE teams SET num_players=".$new_num_players." WHERE code='".$team['code']."'") === TRUE)
            {
                echo '<script>alert("Error");</script>';
            }            
            else
            {
                setcookie("team_code", $team['code'], time()+3600);  /* expire in 1 hour */
                echo '<script>alert("Jouw apparaat is nu geregistreerd voor team '.$team['name'].'!");</script>';
            }  
        }
    } else {
        echo '<script>alert("Jouw apparaat is al geregistreerd voor een team!");</script>';
    }
    ?>
</body>
</html>