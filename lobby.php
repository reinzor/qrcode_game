<html>
<head>
    <style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Permanent Marker';
    }

    .container {
        width: 1920px;
        height: 1080px;
        margin: 0;
        padding: 0;
        position: relative;
    }

    img {
        width: 100%;
    }





    .text {
        font-size: 32px;
        position: absolute;
        top: 5px;
        color: #265DAC;
        /* background-color: black; */
        width: 100%;
        display: block;
        text-align: center;
    }
    </style>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Permanent+Marker">
</head>
<body>
    <div class="container">
        <img src="lobby.png" alt="" />
        <div class="text">
            <span id="np">Unknown</span> <br />
        </div>
    </div>

    <script>

    window.setInterval(function() {
        var xmlhttp = new XMLHttpRequest();
        var url = "num_players.php";

        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var data = xmlhttp.responseText;
                if (data)
                    document.getElementById("np").innerHTML = data;
            }
        }
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
    }, 1000);

    </script>
</body> 
</html>