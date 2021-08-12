<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <link rel = "icon" href ="FAV4.PNG" type = "image/x-icon">
    <title>FUSION-Login/Signup</title>
    <style type="text/css">
        body
        {
            background-image: url('bg1.png');
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            font-family: 'Montserrat', sans-serif;
            height: 100vh;
            margin: -20px 0 50px;
        }
        * {
            box-sizing: border-box;
        }


        h1 {
            font-weight: bold;
            margin: 0;
        }

        p {
            font-size: 14px;
            font-weight: 100;
            line-height: 20px;
            letter-spacing: 0.5px;
            margin: 20px 0 30px;
        }


        #bttn {
            border-radius: 20px;
            border: 1px solid #0a2a43;
            background-color: #0a2a43;
            color: #FFFFFF;
            font-size: 12px;
            font-weight: bold;
            padding: 12px 45px;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;
        }

        #bttn:active {
            transform: scale(0.95);
        }

        #bttn:focus {
            outline: none;
        }

        #bttn.ghost {
            background-color: transparent;
            border-color: #FFFFFF;
        }

        #bttn1 {
            border-radius: 20px;
            border: 1px solid #0a2a43;
            background-color: #0a2a43;
            color: #FFFFFF;
            font-size: 12px;
            font-weight: bold;
            padding: 12px 45px;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;
        }

        #bttn1:active {
            transform: scale(0.95);
        }

        #bttn1:focus {
            outline: none;
        }

        #bttn1.ghost {
            background-color: transparent;
            border-color: #FFFFFF;
        }
        button {
            border-radius: 20px;
            border: 1px solid #0a2a43;
            background-color: #0a2a43;
            color: #FFFFFF;
            font-size: 12px;
            font-weight: bold;
            padding: 12px 45px;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;
        }

        button:active {
            transform: scale(0.95);
        }

        button:focus {
            outline: none;
        }

        button.ghost {
            background-color: transparent;
            border-color: #FFFFFF;
        }

        form {
            background-color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 50px;
            height: 100%;
            text-align: center;
        }

        input {
            background-color: #eee;
            border: none;
            padding: 12px 15px;
            margin: 8px 0;
            width: 100%;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 14px 28px rgba(0,0,0,0.25),
            0 10px 10px rgba(0,0,0,0.22);
            position: relative;
            overflow: hidden;
            width: 768px;
            max-width: 100%;
            min-height: 480px;
        }

        .form-container {
            position: absolute;
            top: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }

        .sign-in-container {
            left: 0;
            width: 50%;
            z-index: 2;
        }

        .container.right-panel-active .sign-in-container {
            transform: translateX(100%);
        }

        .sign-up-container {
            left: 0;
            width: 50%;
            opacity: 0;
            z-index: 1;
        }

        .container.right-panel-active .sign-up-container {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
            animation: show ;
            animation-duration: 0.6s;
        }

        .overlay-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: transform 0.6s ease-in-out;
            z-index: 100;
        }

        .container.right-panel-active .overlay-container{
            transform: translateX(-100%);
        }

        .overlay {
            background: #0a2a43;
            background: -webkit-linear-gradient(to right, #0a2a43, #082236);
            background: linear-gradient(to right, #0a2a43, #082236);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 0 0;
            color: #FFFFFF;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .container.right-panel-active .overlay {
            transform: translateX(50%);
        }

        .overlay-panel {
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 40px;
            text-align: center;
            top: 0;
            height: 100%;
            width: 50%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
            transition-duration: 0.6s;
            transition-timing-function: ease-in-out;
        }

        .overlay-left {
            transform: translateX(-20%);
        }

        .container.right-panel-active .overlay-left {
            transform: translateX(0);
        }

        .overlay-right {
            right: 0;
            transform: translateX(0);
        }

        .container.right-panel-active .overlay-right {
            transform: translateX(20%);
        }



    </style>
</head>
<body>
<div class="container" id="container">

    <div class="form-container sign-up-container">

        <form id="form1" onsubmit="return signup()" method="post">
            <?php include('error.php'); ?>
            <h1>Sign Up</h1>
            <input type="text" name="name"  placeholder="Name" id="name">
            <input type="email" name="email" placeholder="Email" id="semail">
            <input type="password" name="password" placeholder="Password" id="spass">
            <input type="password" name="password1" placeholder="Password" id="spass1">
            <input type="submit" name="submit" id="bttn">
        </form>

    </div>

    <div class="form-container sign-in-container">

        <form id="form2" onsubmit="return login()" method="post">
            <?php include('error.php'); ?>
            <h1>Log In</h1>
            <input type="email" name="email" placeholder="Email" id ="email" >
            <input type="password" name="password" placeholder="Password" id="pass">
            <input type="submit" name="submit1" id="bttn1">
        </form>

    </div>

    <div class="overlay-container">

        <div class="overlay">

            <div class="overlay-panel overlay-left">

                <button class="ghost" id="signIn">Log In</button>

            </div>

            <div class="overlay-panel overlay-right">

                <button class="ghost" id="signUp">Sign Up</button>

            </div>

        </div>

    </div>

</div>

<script type="text/javascript">

    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });
    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });

    function login()
    {
        var email = document.forms["form2"]["email"];
        var pass = document.forms["form2"]["pass"];
        if (email.value=="")
        {
            window.alert("Please enter your email");
            email.focus();
            return false;
        }
        if (pass.value=="")
        {
            window.alert("Please enter your password");
            pass.focus();
            return false;
        }
    }
    function signup()
    {
        var sname1 = document.forms["form1"]["name"];
        var semail = document.forms["form1"]["semail"];
        var spass = document.forms["form1"]["spass"];
        var spass1 = document.forms["form1"]["spass1"];

        if (semail.value=="")
        {
            window.alert("Please enter your email");
            semail.focus();
            return false;
        }
        if (sname1.value=="")
        {
            window.alert("Please enter your name");
            sname1.focus();
            return false;
        }
        if (spass.value=="")
        {
            window.alert("Please enter your password");
            spass.focus();
            return false;
        }
        var lowerCaseLetters = /[a-z]/g;
        var upperCaseLetters = /[A-Z]/g;
        var numbers = /[0-9]/g;
        if (!spass.value.match(lowerCaseLetters))
        {
            window.alert("Use lower case letters in the password");
            return false;
        }
        if (!spass.value.match(upperCaseLetters))
        {
            window.alert("Use upper case letters in the password");
            return false;
        }
        if (!spass.value.match(numbers))
        {
            window.alert("Use numbers in the password");
            return false;
        }
        if(spass.value.length<=8)
        {
            window.alert("Password should be greater than 8 digits");
            return false;
        }
        if (!spass.value.match(spass1))
        {
            window.alert("The passwords dont match");
            return false;
        }
        else
        {
            return true;
        }
    }

</script>

</body>

</html>
