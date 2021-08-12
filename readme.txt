FWD Mini Project 
By 
Name: Abhitay Shinde 
Roll Number: C096
Division: C

-To view the project open login.php

-For Database import cal.sql file in http://localhost/phpmyadmin/.

-For email feature make changes to

	1. C:\xampp\php\php.ini 
		SMTP = smtp.gmail.com
		smtp_port = 587
		sendmail_from = enter email
		sendmail_path = "\"C:\xampp\sendmail\sendmail.exe\" -t"

	2. C:\xampp\sendmail\sendmail.ini
		smtp_server = smtp.gmail.com
		smtp_port = 587 
		auth_username = enter email 
		auth_password = enter password

	3. Index.php
		Go to line 618, then replace 'sendfileacc2002@gmail.com' to the email added in 1 and 2