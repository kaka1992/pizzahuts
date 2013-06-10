<?php  if (!defined("IS_INITPHP")) exit("Access Denied!");  /* INITPHP Version 1.0 ,Create on 2013-06-09 10:21:16, compiled from D:\xampp\htdocs\test/template/order/read.htm */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>cart</title>
  <link href="data/css/test1.css" type="text/css" rel="stylesheet">
     <link href="data/css/mode.css" type="text/css" rel="stylesheet">
</head>

<body>

<table width="840" height="40" border="0" align="center" cellspacing="0">
  <tr>
    <td width="352" height="35" align="left" valign="middle" bgcolor="#FF0000"> <a  class="logo1" href="index.php?c=index&a=run">Pizzahuts</a></td>
    <td width="285" align="center" valign="middle" bgcolor="#FF0000"><form action="index.php?c=index&a=run&type=search" method="POST" target="_blank">
      <span class="title1">search </span>
      <input name="fname" type="text" value="<?php echo $fname; ?>"/>
      <span class="title1">
        <input type="image" src="data/images/search.png" alt="Submit" align="middle" />
        </span>
    </form></td>
    <td width="72" align="center" valign="middle" bgcolor="#FF0000" ><a class="title1" href="index.php?c=myorder&a=run"> My order</a> </td>
    <td width="58" align="center" valign="middle" bgcolor="#FF0000" ><a class="title1" href=<?php echo $loginurl;?>><?php echo $loginname;?></a></td>
    <td width="63" align="center" valign="middle" bgcolor="#FF0000"><a href="index.php?c=register&a=run"class="title1">Register </a><br /></td>
  </tr>
</table>


<table width="813"  height="75"border="0" align="center" cellspacing="0">
  <tr>
    <td width="158" height="75" align="left" valign="top"><a href="index.php?c=index&a=run&number=1&type=setmeal"><img src="data/images/u12_normal.jpg" width="167" height="72" /></a></td>
    <td width="164" height="75" align="left" valign="top"><a href="index.php?c=index&a=run&number=1&type=pizza"><img src="data/images/u4_normal.jpg" width="164" height="72" /></a></td>
    <td width="164" height="75" align="left"valign="top" ><a href="index.php?c=index&a=run&number=1&type=noddle"><img src="data/images/u167_normal.jpg" width="164" height="72" /></a></td>
    <td width="164" height="75" align="left" valign="top"><a href="index.php?c=index&a=run&number=1&type=dissert"><img src="data/images/u180_normal.jpg" width="164" height="72" /></a></td>
    <td width="153" height="75" align="left" valign="top"><a href="index.php?c=index&a=run&number=1&type=snacks"><img src="data/images/u178_normal.jpg" width="154" height="72" /></a></td>
  </tr>
</table>

<table width="833"  height="43"border="0" align="center" cellspacing="0" bgcolor="FFFFEE">
<tr>
<td width="831" height="43" align="center">&nbsp;</td>
</tr>
<tr>
<td height="43" align="center"><h3>You have ordered the following products.</h3>
</td></tr>

<tr>
<td>
	<script src="data/js/order.js"></script>
    <form action="index.php?c=submit&a=check" method="post">
    <table width="700" border="0" cellpadding="5" align="center">
  <tr bgcolor="#EEEECC">
    <th align="center" valign="middle" scope="col">Products Name</th>
    <th align="center" valign="middle" scope="col">Number</th>
    <th align="center" valign="middle" scope="col">Total Price</th>
    <th align="center" valign="middle" scope="col">Delete</th>
  </tr>
		<script>
            read_cookie();
        </script>
       <tr align="right" bgcolor="#EEEECC">
       <td height="50"  colspan="3">&nbsp;</td>
       <td height="50" align="center"> <input type="submit" value="Order"/></td></tr>
    </table>
   </form>
  </td></tr></table>  
</body>
</html>