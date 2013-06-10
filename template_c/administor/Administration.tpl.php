<?php  if (!defined("IS_INITPHP")) exit("Access Denied!");  /* INITPHP Version 1.0 ,Create on 2013-06-09 10:22:07, compiled from D:\xampp\htdocs\test/template/administor/Administration.htm */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<style type="text/css">
.logo {	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size: 24px;
	color: #FFF;
	font-style: italic;
}
.title1 {	color: #FFF;
	font-style: italic;
}
.title2 {
	font-size: 20px;
	font-family: Arial, Helvetica, sans-serif;
	font-style: italic;
	text-align: justify;
	color: #FFF;
	font-weight: bold;
}


<!--
/* 
Credits: BitRepository.com
*/

html, body {
background-color: white; 

color: #2B3956;
font-family: Verdana, Arial, Sans-Serif;
font-size: 11px;
text-align: left;
}
/* Pagination DIV */
#pg
{
width: 400px;
background-color: #FFFFFF;

text-align: center;
font-size: 10px;

margin-bottom: 5px;

padding: 10px;
}

/* Pagination Link */

#pg a {
font-size: 10px;
text-decoration: none;
color: #000000;
border: 1px solid #83A0C1;
padding: 3px;
-moz-border-radius: 3px;
}

#pg a:hover {
font-size: 10px;
text-decoration: none;
color: #000000;
border: 1px solid #000000;
background-color: white;
padding: 3px;
-moz-border-radius: 3px;
}

/* Pagination Current Page */

#pg a.current {
font-size: 10px;
text-decoration: none;
font-weight: bold;
color: white;
border: 1px solid #0D62C3;
background-color: #0D62C3;
padding: 3px;
-moz-border-radius: 3px;
}

/* Pagination Disabled Page */

#pg span.disabled {
font-size: 10px;
text-decoration: none;
color: #C6C7C7;
border: 1px solid #C6C7C7;
background-color: white;
padding: 3px;
-moz-border-radius: 3px;
}
-->
a:link {color: #000000; text-decoration: none}		/* 未访问的链接 */
a:visited {color: #000000; text-decoration: none}	/* 已访问的链接 */
.title1 a:link {color: #FFFFFF; text-decoration: none}		/* 未访问的链接 */
.title1 a:visited {color: #FFFFFF; text-decoration: none}	/* 已访问的链接 */
.logo a:link {color: #FFFFFF; text-decoration: none}		/* 未访问的链接 */
.logo a:visited {color: #FFFFFF; text-decoration: none}	/* 已访问的链接 */

a:hover {color: #0000FF; text-decoration: none}	/* 鼠标移动到链接上 */
a:active {color: #FF00FF; text-decoration: none}

</style>
</head>

<body>
<table width="840" height="40" border="0" align="center" cellspacing="0">
  <tr>
    <td width="413" height="35" align="left" valign="middle" bgcolor="#FF0000" class="logo"> <a href="index.php?c=index&a=run">Pizzahuts</a> &nbsp;<a href="index.php?c=administor&a=run">Administration</a></td>
    <td width="220" align="center" valign="middle" bgcolor="#FF0000" class="title1"><a href="index.php?c=administor&a=show">Show Orders</a></td>
    <td width="220" align="center" valign="middle" bgcolor="#FF0000" class="title1"><a href="index.php?c=administor&a=add">Add Products</a></td>
    <td width="220" align="center" valign="middle" bgcolor="#FF0000" class="title1"><a href="index.php?c=administor&a=delete"> Delete Products </a></td>
  </tr>
</table>
<table width="840" border="0" align="center">
  <tr>
    <td height="100" align="center" bgcolor="#FFFFEE"><h1><a href="index.php?c=administor&a=show">Show Orders</a></h1></td>
  </tr>
  <tr>
    <td height="100" align="center" bgcolor="#FFFFEE"><h1><a href="index.php?c=administor&a=add">Add Products</a></h1></td>
  </tr>
  <tr>
    <td height="100" align="center" bgcolor="#FFFFEE"><h1><a href="index.php?c=administor&a=delete"> Delete Products </a></h1></td>
  </tr>
</table>
</body>
</html>