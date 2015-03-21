<?php 

//Connects to database 
 mysql_connect("mysql8.000webhost.com", "a6233463_hberry", "F4cn5VPs") or die(mysql_error()); 
 mysql_select_db("a6233463_userdb") or die(mysql_error()); 

//Checks if there is a login cookie
 if(isset($_COOKIE['ID_my_site']))

{

$username = $_COOKIE['ID_my_site'];
$pass = $_COOKIE['Key_my_site'];
$check = mysql_query("SELECT * FROM login WHERE username = '$username'")or die(mysql_error());

while($info = mysql_fetch_array( $check ))
{ 

//if the cookie has the wrong password, user is taken to the login page
if ($pass != $info['password'])
{
header("Location: login.php");
} 

//otherwise they are shown the main area
else
{
echo " <p>";
}
}
}
else
//if the cookie does not exist, they are taken to the login screen 
{
header("Location: login.php");
}
?>