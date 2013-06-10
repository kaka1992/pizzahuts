<?php  if (!defined("IS_INITPHP")) exit("Access Denied!");  /* INITPHP Version 1.0 ,Create on 2013-06-09 08:48:13, compiled from D:\xampp\htdocs\test/template/order/OrderDetails.htm */ ?>
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

<table width="840" border="0" align="center" cellpadding="20">
<tr>
<td align="center" valign="top" bgcolor="#FFFFEE">
  	<table width="700" cellpadding="10" align="center" frame="below">
    <tr>
    <td colspan="6">
        <table width="700" cellpadding="20" align="center" frame="below">
        <tr>
        <td width="50%" align="right" valign="middle" scope="col"><strong>Order Id:</strong></td>
        <td align="left" valign="middle" scope="col">125</td>
        </tr>
        </table></td>
    </tr>
  <tr>
    <td align="left" valign="middle" scope="col"><strong>User Name:</strong></td>
    <td align="left" valign="middle" scope="col"><?php echo $data['name'];?></td>
    <td align="left" valign="middle"><strong>Create Time:</strong></td>
    <td align="left" valign="middle"><?php echo $data['createtime'];?></td>
    <td align="left" valign="middle" scope="col"><strong>Branch:</strong></td>
    <td align="left" valign="middle" scope="col"><?php echo $data['branch_id'];?></td>
  </tr>
  <tr>
    <td align="left" valign="middle"><strong>Phone Number:</strong></td>
    <td align="left" valign="middle"><?php echo $data['telephone'];?></td>
    <td align="left" valign="middle"><strong>Address:</strong></td>
    <td align="left" valign="middle"><?php echo $data['address'];?></td>
    <td align="left" valign="middle"><strong>Status:</strong></td>
    <td align="left" valign="middle"><?php if ($data['statuse']==0) { ?>Wating<?php } elseif  ($data['statuse']==1) { ?>Serving<?php } else { ?>Finished<?php } ?></td>
  </tr>
       <!--添加的部分-->
      <tr>
    <td align="left" valign="middle"><strong>Plus Infomation:</strong></td>
    <td align="left" valign="middle" colspan="5"><?php echo $data['text'];?></td>
  </tr>

  <!--添加的部分-->
</table>
</td>
</tr>
  <tr>
  <td align="center" valign="top" bgcolor="#FFFFEE">
  	<table width="700" border="0" cellpadding="5" align="center">
  <tr>
    <th align="center" valign="middle" scope="col">Products Name</th>
    <th align="center" valign="middle" scope="col">Number</th>
    <th align="center" valign="middle" scope="col">Price</th>
    <th align="center" valign="middle" scope="col">Total Price</th>
  </tr>
 <?php for ($i=0;$i<$pdata[1];$i++) { ?>
 <?php echo '<tr>'; ?>
 <?php echo   '<td align="center" valign="middle">'.$pdata[0][$i]['name'].'</td>'; ?>
 <?php echo   '<td align="center" valign="middle">'.$pdata[0][$i]['count'].'</td>'; ?>
 <?php echo   '<td align="center" valign="middle">'.$pdata[0][$i]['price'].'</td>'; ?>
 <?php echo   '<td align="center" valign="middle">'.$data["totalprice"].'</td>'; ?>
 <?php echo ' </tr>'; ?>
  <?php } ?>
</table>
</td>

  </tr>
  <tr>
  	<td bgcolor="#FFFFEE">
        <table width="700" cellpadding="20" align="center">
        <tr>
        <td width="50%" align="right" valign="middle" scope="col"><strong>Total Amount:</strong></td>
        <td align="left" valign="middle" scope="col"><?php echo $data["totalcount"]; ?></td>
        </tr>
        </table>
    </td>
  </tr>
</table>
</body>
</html>