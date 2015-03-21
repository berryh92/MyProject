<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>

<?php

//Connects to database 
 mysql_connect("mysql8.000webhost.com", "a6233463_hberry", "F4cn5VPs") or die(mysql_error()); 
 mysql_select_db("a6233463_userdb") or die(mysql_error());

// Was the form submitted?
if ($_POST["ResetPasswordForm"])
{
	// Gather the post data
	$email = mysql_real_escape_string($_POST["email"]);
	$password = md5(mysql_real_escape_string($_POST["password"]));
	$confirmpassword = md5(mysql_real_escape_string($_POST["confirmpassword"]));
	$q = $_POST["q"];

	// Use the same salt from the forgot.php file
	$salt = "PiuwrO1#O0rl@+luH1!froe*l?8oEb!iu)_1Xaspi*(sw(^&.laBr~u3i!c?es-l651";

	// Generate the reset key
	$resetkey = md5($salt . $email);

	// Does the new reset key match the old one?
	if ($resetkey == $q)
	{
		if ($password == $confirmpassword)
		{
			// Update the user's password
			mysql_query("UPDATE `login` SET `password` = '$password' WHERE `email` = '$email'");
			echo "Your password has been successfully reset. You may now login with the new password you have chosen";
		}
		else
			echo "Your passwords do not match.";
	 }
	else
		echo "Your password reset key is invalid.";
}

?>

<link href="styles.css" rel="stylesheet" type="text/css" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reset Password.</title>

<style>

*, html {
margin: 0;
padding: 30;
}
html, body {
height: 100%;
position: relative;
}

* html div.column {
height: 100%;
}

div.column {
min-height: 100%;
}
div#content {
margin-left: 250px;
background-color: #FFFF99;
}
div#sidebar {
position: absolute;
top: 0;
left: 0;
width: 203px;
background-color: #99FFFF;
}

body {
    margin: 0;
    text-align: center;
}

div.centre
{
  width: auto;
  display: block;
  margin-left: 02%;
  margin-right: auto;
}

#top, #bottom, #left, #right {
	background: #ff0081;
	position: fixed;
	}
	
#left, #right {
	top: 0; bottom: 0;
	width: 3px;
	}
	
#left {
left: 0;
	}

#right {
right: 0;
	}
		
#top, #bottom {
	left: 0; right: 0;
	height: 3px;
	}
	
#top {
top: 0;
	}
	
#bottom {
bottom: 0;
	}

img {
    opacity: 1.0;
    filter: alpha(opacity=40);
}

img:hover {
    opacity: 0.4;
    filter: alpha(opacity=100);
}

h2 {
    color:black;
    font-family:papyrus;
    font-size:250%;

}

p  {
    color:black;
    font-family:verdana;
    font-size:100%;
}

div.transbox {
    width: 600px;
    height: 190px;
	position: absolute;
    margin: 50px 50px;
    background-color: #ffffff;
    border: 1px solid black;
    opacity: 0.6;
    filter: alpha(opacity=60); /*For IE8 and earlier */

div.transbox p {
    margin: 40px 40px;
    font-weight: bold;
    color: #000000;
	
#slideshow { 
    margin: 50px auto; 
    position: relative; 
    width: 240px; 
    height: 240px; 
    padding: 10px; 
    box-shadow: 0 0 20px rgba(0,0,0,0.4); 
}

</style>
<!--
body {
	font: 100%/1.4 Verdana, Arial, Helvetica, sans-serif;
	background-color: #C6BBDF;
	margin: 0;
	padding: 0;
	color: #000;
}

/* ~~ Element/tag selectors ~~ */
	padding: 0;
	margin: 0;
}
h1, h2, h3, h4, h5, h6, p {
	margin-top: 0;
	padding-right: 15px;
	padding-left: 15px;
}
a img {
	border: none;
}

a:link {
	color: #FFFFFF;
	text-decoration: underline;
}
a:visited {
	color: #4E5869;
	text-decoration: underline;
}
a:hover, a:active, a:focus { /*This group of selectors will give a keyboard navigator the same hover experience as the person using a mouse. */
	text-decoration: none;
}

/* ~~ This container surrounds all other divs giving them their percentage-based width. ~~ */
.container {
	width: 80%;
	max-width: 1260px;
	min-width: 780px;
	background-color: #FFF;
	margin: 0 auto;
}

.header {
	background-color: #6F7D94;
}

content ul, .content ol { 
	padding: 0 15px 15px 40px;
}

ul.nav {
	list-style: none; /* This removes the list marker. */
	border-top: 1px solid #666; /*This creates the top border for the links - all others are placed using a bottom border on the LI. */
	margin-bottom: 15px; /*This creates the space between the navigation on the content below. */
}
ul.nav li {
	border-bottom: 1px solid #666; /*This creates the button separation */
}
ul.nav a, ul.nav a:visited { /*Grouping these selectors makes sure that your links retain their button look even after being visited. */
	padding: 5px 5px 5px 15px;
	display: block; /*This gives the link block properties causing it to fill the whole LI containing it. This causes the entire area to react to a mouse click. */
	text-decoration: none;
	background-color: #8090AB;
	color: #000;
}
ul.nav a:hover, ul.nav a:active, ul.nav a:focus { /*This changes the background and text color for both mouse and keyboard navigators. */
	background-color: #6F7D94;
	color: #FFF;
}

/* ~~The footer ~~ */
.footer {
	padding: 10px 0;
	background-color: #6F7D94;
	position: relative;
	clear: both; /*This clear property forces the .container to understand where the columns end and contain them. */
}

/* ~~miscellaneous float/clear classes~~ */
.fltrt {  /*This class can be used to float an element right. */
	float: right;
	margin-left: 8px;
}
.fltlft { /*This class can be used to float an element left. */
	float: left;
	margin-right: 8px;
}
.clearfloat { 
	clear:both;
	height:0;
	font-size: 1px;
	line-height: 0px;
}
body,td,th {
	font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
}
-->
<!--[if lte IE 7]>
<style>
.content { margin-right: -1px; } /*This 1px negative margin can be placed on any of the columns in this layout with the same corrective effect. */
ul.nav a { zoom: 1; }  /*The zoom property gives IE the hasLayout trigger it needs to correct extra whitespace between the links. */
</style>
<![endif]-->

<meta name="google-translate-customization" content="e6d13f48b4352bb5-f08d3373b31c17a6-g7407ad622769509b-12"></meta>
</head>

<body bgcolor="#DEE9F3">

<div id="left"></div>
<div id="right"></div>
<div id="top"></div>
<div id="bottom"></div>

<div class="header">
<!-- end .header -->
<img src="http://i1291.photobucket.com/albums/b548/xIonaChan3/sitelogo_zps70ab8146.png" width="128" height="129" alt="" />
<img src="http://i1291.photobucket.com/albums/b548/xIonaChan3/sitebanner_zpscab905c1.jpg" width="739" height="100" alt="RR logo" />
<!-- end .header -->
<!-- end .header --><!-- end .header -->
</div>
  
  <div class="sidebar1">
    
	  <h2 class="header"><strong><u>Raving Researchers</u></strong></h2>
    <!-- end .sidebar1 --></div>

<p>
</p>

<br/>
<br/>
<br/>
<br/>

Enter the required details into the form below, to reset your password:

<br/>
<br/>

<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
E-mail Address: <input type="email" name="email" maxlength=“35” required /><br />

New Password: <input type="password" name="password" size="20" required /><br />
Confirm Password: <input type="password" name="confirmpassword" size="20" required /><br />

<input type="hidden" name="q" value="<?php echo $_GET["q"]; ?>" /><input type="submit" name="ResetPasswordForm" value=" Reset Password " />
</form>

	
<div class="centre">
    <table bgcolor="#b6b0ba" align="center">
  <tr>
    <td>
	
</div>
	</td>		
    </tr>
  <tr>
</div>


  </tr>
</table>

<div id="sidebar" class="column">
<a href="http://www.freecounterstat.com" target="_Blank" title="free hit counter"><font face="georgia" size="3" color="black"><b>Hits:</b></font></a><br/>
<script type="text/javascript" src="http://counter2.allfreecounter.com/private/counter.js?c=274cd4127cfcb6814d04c5f92219a4f8"></script>
<p></p>
<font face="georgia" size="2">- - - - - -</font>
<div id="google_translate_element"></div>
<script type="text/javascript">
    function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
    }
</script>
<p></p>
<font face="georgia" size="2">- - - - - -</font>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<font face="georgia" size="2">- - - - - -</font>
<p></p>
 <ul class="nav">
      <p></p>
 <ul class="nav">
      <a href="index.htm"><p align="left"><font face="georgia" color="F47E8F" size="3"><b>Home</b></font></p></p></a>
	  <p></p>
      <a href="about_us.htm"><p align="left"><font face="georgia" color="1891E0" size="3"><b>About Us</b></p></font></a>
	  <p></p>
<a href="add.php"><p align="left"><font face="georgia" color="F47E8F" size="3"><b>Register</b></p></font></a>
<p></p>
      <a href="login.php"><p align="left"><font face="georgia" color="1891E0" size="3"><b>Login</b></p></font></a>
	  <p></p>
<a href="logout.php"><p align="left"><font face="georgia" color="F47E8F" size="3"><b>Logout</b></p></font></a>
<p></p>
<a href="members.php"><p align="left"><font face="georgia" color="1891E0" size="3"><b>Members</b></p></font></a>
	  <p></p>
<a href="file_uploader.php"><p align="left"><font face="georgia" color="F47E8F" size="3"><b>Upload Files</b></p></font></a>
	  <p></p>
</div>

    <!-- end .content -->
  <div class="footer">
    <!-- end .footer --></div>
<!-- end .container -->

</body>
</html>