<html>
<head>
    <link rel = "icon" href ="FAV4.PNG" type = "image/x-icon">
    <title>FUSION-Feedback</title>
    <style type="text/css">
        input{
            background-color: #eee;
            border: none;
            padding: 12px 15px;
            margin: 8px 0;
            width: 750px;
            height: 100px;
            border-radius: 25px;
            font-size: 30px;
            color: black;
        }
        #centr{

            margin-top: 13vh;
            z-index: 10000;
        }
        form{
            text-align: center;
        }
        h1{
            font-size: 70px;
        }
        #bgg{
            height: 250px;
            background-color: #eee;
            border: none;
            padding: 12px 15px;
            margin: 8px 0;
            width: 750px;

            border-radius: 25px;
            font-size: 30px;
            color: black;
        }

    </style>
</head>
<body style="background-image: url('bgfb.jpg');background-size: 99%;">
<div id="centr">

    <form method="post">
        <h1>Feedback Form</h1>
        <input type="text" placeholder="Name" name="name">
        <br><br>
        <input type="text" placeholder="Email" name="email">
        <br><br>
        <input type="text" placeholder="Feedback" name="feedback" id="bgg">
        <br><br>
        <input type="submit" name="submit">
    </form>
</div>

<?php
$conn = mysqli_connect('localhost', 'root', '', 'cal');
if(!$conn)
{
    die("Connection failed" . mysqli_connect_error());
}
if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $feed = $_POST['feedback'];
    $sql_query = "INSERT INTO feedback (name,email,feedback) 
    VALUES ('$name','$email','$feed')";
    mysqli_query($conn, $sql_query);
    mysqli_close($conn);
}
?>
</body>
</html>
