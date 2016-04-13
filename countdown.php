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
        font-size: 120px;
        position: absolute;
        top: 220px;
        left: 1050px;
        color: #ffffff;
        /* background-color: black; */
        width: 800px;
        height: 600px;
        display: block;
        text-align: center;
    }
    </style>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Permanent+Marker">
</head>
<body>
    <div class="container">
        <img src="countdown.png" alt="" />
        <div class="text">
            <span id="count">Nan</span> <br />
            codes in het spel
        </div>
    </div>

    <script>

    window.setInterval(function() {
        var xmlhttp = new XMLHttpRequest();
        var url = "num_balls.php";

        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var data = parseInt(xmlhttp.responseText);
                if (data)
                    document.getElementById("count").innerHTML = data;
            }
        }
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
    }, 1000);

    </script>
</body> 
</html>