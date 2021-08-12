<?php
?>
<!DOCTYPE html>
<html>
<head>
    <title>FUSION-Homepage</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script src="https://quotesondesign.com/api/3.0/api-3.0.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel = "icon" href ="FAV4.PNG" type = "image/x-icon">
    <script>
        $(document).ready(function() {
            var calendar = $('#calendar').fullCalendar({
                editable:true,
                header:{
                    left:'prev,next today',
                    center:'title',
                    right:'month,agendaWeek,agendaDay'
                },
                events: 'load.php',
                selectable:true,
                selectHelper:true,
                select: function(start, end, allDay)
                {
                    var title = prompt("Enter Event Title");
                    if(title)
                    {
                        var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                        var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                        $.ajax({
                            url:"insert.php",
                            type:"POST",
                            data:{title:title, start:start, end:end},
                            success:function()
                            {
                                calendar.fullCalendar('refetchEvents');
                                alert("Added Successfully");
                            }
                        })
                    }
                },
                editable:true,
                eventResize:function(event)
                {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        url:"update.php",
                        type:"POST",
                        data:{title:title, start:start, end:end, id:id},
                        success:function(){
                            calendar.fullCalendar('refetchEvents');
                            alert('Event Update');
                        }
                    })
                },

                eventDrop:function(event)
                {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        url:"update.php",
                        type:"POST",
                        data:{title:title, start:start, end:end, id:id},
                        success:function()
                        {
                            calendar.fullCalendar('refetchEvents');
                            alert("Event Updated");
                        }
                    });
                },

                eventClick:function(event)
                {
                    if(confirm("Are you sure you want to remove it?"))
                    {
                        var id = event.id;
                        $.ajax({
                            url:"delete.php",
                            type:"POST",
                            data:{id:id},
                            success:function()
                            {
                                calendar.fullCalendar('refetchEvents');
                                alert("Event Removed");
                            }
                        })
                    }
                },

            });
        });
    </script>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display: swap')

        html
        {
        scroll-behavior: smooth;
        }
        *
        {
            margin: 0;
            padding: 0;
            font-family: "Times New Roman", Times, serif;
        }
        header
        {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: 0.6s;
            padding: 40px 100px;
            z-index: 100000;
        }
        header.sticky
        {
            padding: 5px 100px;
            background-color: #fff;
        }
        header .logo
        {
            position: relative;
            font-weight: 700;
            color: #fff;
            text-decoration: none;
            font-size: 2em;
            text-transform: uppercase;
            letter-spacing: 2px;
            transition: 0.6s;
        }
        header ul
        {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        header ul li
        {
            position: relative;
            list-style: none;
        }

        header ul li a
        {
            position: relative;
            margin: 0 15px;
            text-decoration: none;
            color: #fff;
            letter-spacing: 2px;

            transition: 0.6s;

        }

        .barli
        {
            transition: all 0.3s;
            perspective: 200px;
            target-position:front;
        }

        .barli:hover
        {
            transform: scale(0.8);
            perspective: 200px;
        }

        header.sticky .logo
        {
            color: #000;
        }
        header.sticky ul li a
        {
            color: #000;
        }

        #parallax
        {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            background-size: cover;
        }

        #parallax:before
        {
            content: '';
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 100px;
            background: linear-gradient(to top, #0a2a43, transparent);
            z-index: 10000;
        }

        #parallax:after
        {
            content: '';
            position: absolute;
            top: 0;
            left:0;
            width: 100%;
            height: 100%;
            background: #0a2a43;
            z-index: 10000;
            mix-blend-mode: color;
        }

        #parallax img
        {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            pointer-events: none;
        }
        #Link
        {
            width: 100%;
            height: 500px;
            border-style: solid;
            border-color: #fff;
            border-radius: 50px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            padding-left: 150px;
        }
        #video1
        {
            display: flex;
            justify-content: center;
        }
        #video1 iframe
        {
            justify-content: center;
            align-items: center;

            text-align: center;
            outline: 50px;
            outline-color: #fff;
            outline-style: dashed;
            outline-width: thick;

        }
        #text
        {
            position: relative;
            color: #fff;
            font-size: 12em;
            z-index: 1;
            font-family: "Times New Roman", Times, serif;
            font-weight: bold;
        }

        #road
        {
            z-index: 2;
        }
        .DN
        {
            color: white;
            font-size: 50px;
            text-align: center;
            justify-content: center;
            align-items: center;
        }
        .li
        {
            transition: all 0.3s;
            perspective: 200px;

        }

        .li:hover
        {
            transform: scale(0.8);
            perspective: 200px;
        }

        a
        {
            target-position:front;
            target-new: window;
            target-name:new;
        }
        body
        {
            background-color: #0a2a43;
        }
        #calendar
        {
            color: white;
        }
        #link2
        {
            width: 100%;

            border-style: solid;
            border-color: #fff;
            border-radius: 50px
        }
        header
        {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: 0.6s;
            padding: 40px 100px;
            z-index: 100000;
        }
        header.sticky
        {
            padding: 5px 100px;
            background-color: #fff;
        }
        header .logo
        {
            position: relative;
            font-weight: 700;
            color: #fff;
            text-decoration: none;
            font-size: 2em;
            text-transform: uppercase;
            letter-spacing: 2px;
            transition: 0.6s;
        }
        header ul
        {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        header ul li
        {
            position: relative;
            list-style: none;
        }

        header ul li a
        {
            position: relative;
            margin: 0 15px;
            text-decoration: none;
            color: #fff;
            letter-spacing: 2px;
            transition: 0.6s;

        }

        .barli
        {
            transition: all 0.3s;
            perspective: 200px;
            target-position:front;
        }

        .barli:hover
        {
            transform: scale(0.8);
            perspective: 200px;
        }

        header.sticky .logo
        {
            color: #000;
        }
        header.sticky ul li a
        {
            color: #000;
        }
        footer
        {
            top: 0;
            left: 0;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: 0.6s;
            padding: 40px 100px;
            z-index: 100000;
            background-color: white;
            height: 20px;
        }

        footer ul
        {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            color: black;
        }

        footer ul li
        {
            position: relative;
            list-style: none;
            color: black;
        }

        footer ul li a
        {
            position: relative;
            margin: 0 15px;
            text-decoration: none;
            letter-spacing: 2px;
            transition: 0.6s;
            color: black;

        }

        .barli1
        {
            transition: all 0.3s;
            perspective: 200px;
            target-position:front;
            color: black;
        }

        .barli1:hover
        {
            transform: scale(0.8);
            perspective: 200px;
            color: black;
        }

        footer.sticky .logo
        {
            color: #000;
        }
        footer.sticky ul li a
        {
            color: #000;
        }
        #link3
        {
            width: 100%;
            border-style: solid;
            border-color: #fff;
            border-radius: 50px
        }
        .eminp
        {
            background-color: #eee;
            border: none;
            padding: 12px 15px;
            margin: 8px 0;
            width: 40%;
        }
        .bttn {
            border-radius: 20px;
            border: 1px solid #0a2a43;
            background-color: white;
            color: black;
            font-size: 12px;
            font-weight: bold;
            padding: 12px 45px;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;
        }

        .bttn:active {
            transform: scale(0.95);
        }

        .bttn:focus {
            outline: none;
        }

        .bttn.ghost {
            background-color: transparent;
            border-color: #FFFFFF;
        }
        #link4
        {
            width: 100%;

            border-style: solid;
            border-color: #fff;
            border-radius: 50px
        }

    </style>
</head>
<body>
<header>
    <a href="#" class ="logo" >FUSION</a>
    <ul>
        <li><a href="#" class="barli"><i class="fa fa-2x fa-home" aria-hidden="true"></i></a></li>
        <li><a href="#calendar" class="barli"><i class="fa fa-2x 10x fa-calendar" aria-hidden="true" ></i></a></li>
        <li><a href="#qq" class="barli"><i class="fa fa-2x fa-quote-right" aria-hidden="true"></i></a></li>
        <li><a href="#ee" class="barli"><i class="fa fa-2x fa-envelope" aria-hidden="true"></i></a></li>
        <li ><a href="http://localhost/fullcalendar/login.php" class="barli"><i class="fa fa-2x fa-sign-out" aria-hidden="true" style="color: crimson;"></i></a></li>
    </ul>
</header>
<section id="parallax">
    <img src="bg.jpg" id="bg">
    <img src="moon.png" id="moon">
    <img src="mountain.png" id="mountain">
    <img src="road.png" id="road">
    <h2 id="text"></h2>
</section>

<br><br><br><br>
<div id="link4" style="text-align: center">
    <div class="quote-wrapper">
        <div class="quote-heading">
            <h1 style="color: white;text-align: center;"  class="DN" id="qq">Quote Generator</h1>
            <br>
        </div>

        <div class="quote-body">
            <div class="icon-quote">
        <span class="icon">
          <i class="fas fa-quote-left" style="color: white"></i>
        </span>
                <span class="quote" style="color: white">I'm not a great programmer; I'm just a good programmer with great habits.</span>
                <span class="icon">
          <i class="fas fa-quote-right" style="color: white"></i>
        </span>
            </div>
            <div class="author" style="color: #fff;">Kent Beck</div>

            <div class="quote-buttons">

                <div class="btn">
                    <button id="quote-btn" class="bttn">New Quote</button>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br><br>
<section id="video1" style="align-items: center;">
    <iframe width="1000" height="500" src="https://www.youtube.com/embed/XAJw2n5ryno" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</section>
<br><br><br><br>


<div id="Link">

    <h1 style="color: white;margin-left: -150px;" class="DN" >Informative Sites</h1>
    <br><br><br><br>
    <a href="https://gadgets.ndtv.com/news" target="_blank" >
        <img src="tech.png" id="ps5" class="li" style="height: 300px;width: 500px; border-color: black;border-width: 40px;padding-left: 50px;padding-bottom: 100px" >
    </a>
    <a href="https://www.google.com/search?q=corona+news&oq=corona+news&aqs=chrome..69i57j0l7.2696j0j4&sourceid=chrome&ie=UTF-8" target="_blank" >
        <img src="corona1-01.png" id="corona" class="li" style="height: 300px;width: 500px; border-color: black;border-width: 40px;padding-left: 120px;padding-bottom: 100px">
    </a>
    <a href="https://www.udemy.com" target="_blank" >
        <img src="study-01.png" id="udemy" class="li" style="height: 300px;width: 500px; border-color: black;border-width: 40px;padding-left: 120px;padding-bottom: 100px">
    </a>

</div>

<br><br><br><br>

<div id="link3" style="text-align: center">
    <h1 style="color: white;text-align: center;"  class="DN" id="ee"> E-mail</h1>
    <form method="post">
        <input  placeholder="Subject" type="text" class="eminp" name="name1" >
        <br>
        <select class="eminp" name="mail1">
            <?php
            $conn1 = mysqli_connect('localhost', 'root', '', 'cal');
            if(!$conn1)
            {
                die("Connection failed" . mysqli_connect_error());
            }
            $sqlfetch ="SELECT email FROM users";
            $resultSet = $conn1->query($sqlfetch);
            while ($rows = $resultSet->fetch_assoc())
            {
                $email1 = $rows['email'];
                echo "<option value = '$email1''>$email1</option>";
            }
            ?>
        </select>
        <br>
        <input  type="text" placeholder="comment" class="eminp" name="comment1">
        <br>
        <input type="submit" name="sub1" class="bttn">
    </form>
    <?php
    if(isset($_POST['sub1']))
    {
        $to = $_POST['mail1'];
        $subject = $_POST['name1'];
        $message= $_POST['comment1'];
        $headers="From: sendfileacc2002@gmail.com";
       if(mail($to, $subject, $message, $headers)){
        echo "Message Sent";
        }
       else{
           echo "fail";
       }
    }
    ?>
    <br><br>
</div>
<br><br><br><br>
<div id="link2">
    <h1 style="color: white;text-align: center;" class="DN">Calender</h1>
    <br>
<div class="container">
    <div id="calendar"></div>
</div>
</div>
<br><br><br><br>
<footer style="background-color: white">
    <ul>
        <li class="barli1" style="color: black"><a href="http://localhost/fullcalendar/feed.php" ><i class="fa fa-2x fa-2x fa-comments" aria-hidden="true"></i></a></li>
        <li class="barli1" style="color: black"><a href="aboutus.html" ><i class="fa fa-2x fa-2x fa-info-circle" aria-hidden="true"></i></a></li>
        <li class="barli1" style="color: black"><a href="https://github.com/Abhitay" ><i class="fa fa-2x fa-2x fa-github" aria-hidden="true"></i></a></li>
        <li class="barli1" style="color: black"><a href="https://www.linkedin.com/in/abhitay-shinde-65078214a/?trk=people_directory&originalSubdomain=in" ><i class="fa fa-2x fa-2x fa-linkedin-square" aria-hidden="true"></i></a></li>
    </ul>

</footer>
<script type="text/javascript">
    //comment
    /*multiline
    comment*/
    var dt = new Date();
    document.getElementById("text").innerHTML = dt.toLocaleDateString('en-GB');

    let bg = document.getElementById("bg");
    let moon = document.getElementById("moon");
    let mountain = document.getElementById("mountain");
    let road = document.getElementById("road");
    let text = document.getElementById("text");
    window.addEventListener('scroll', function(){
        var value = window.scrollY;
        bg.style.top = value * 0.5 + 'px';
        moon.style.left = -value * 0.5 + 'px';
        mountain.style.top = -value * 0.15 + 'px';
        road.style.top = value * 0.15 + 'px';
        text.style.top = value * 1 + 'px';

        window.addEventListener("scroll", function(){
            var header = document.querySelector("header")
            header.classList.toggle("sticky", window.scrollY)
        })

    })
    const quotes = [{
        quote: `I'm not a great programmer; I'm just a good programmer with great habits.`,
        author: `Kent Beck`
    }, {
        quote: `Talk is cheap. Show me the code.`,
        author: `Linus Torvalds`
    }, {
        quote: `Programs must be written for people to read, and only incidentally for machines to execute.`,
        author: `Harold Abelson`
    }, {
        quote: `Truth can only be found in one place: the code.`,
        author: `Robert C`
    }, {
        quote: `Give a man a program, frustrate him for a day. Teach a man to program, frustrate him for a lifetime.`,
        author: `Muhammad Waseem`
    }, {
        quote: `How you look at it is pretty much how you'll see it`,
        author: `Steve Jobs`
    }, {
        quote: `The most disastrous thing that you can ever learn is your first programming language.`,
        author: `Alan Kay`
    }, {
        quote: `The most important property of a program is whether it accomplishes the intention of its user.`,
        author: `C.A.R. Hoare`
    }, {
        quote: `I am committed to push my branch to the master.`,
        author: `Halgurd Hussein`
    }, {
        quote: `Coding is not just code, that is a live thing to serve everyone!`,
        author: `Ming Song`
    } ]
    const quoteBtn = document.getElementById('quote-btn');
    const quote = document.querySelector('.quote');
    const author = document.querySelector('.author');
    quoteBtn.addEventListener('click', () => {
        let random = Math.floor(Math.random() * quotes.length);
        quote.innerHTML = quotes[random].quote;
        author.innerHTML = quotes[random].author;
    })
</script>
</body>
</html>