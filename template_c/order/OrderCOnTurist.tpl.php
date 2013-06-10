<?php  if (!defined("IS_INITPHP")) exit("Access Denied!");  /* INITPHP Version 1.0 ,Create on 2013-06-09 10:19:09, compiled from D:\xampp\htdocs\test/template/order/OrderCOnTurist.htm */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="data/css/mode.css" type="text/css" rel="stylesheet">
<link href="data/css/orderConfirm.css" type="text/css" rel="stylesheet">

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
<table width="840" border="0" align="center" cellspacing="0" bgcolor="FFFFEE">
  <tr bgcolor="#FFFFCC">
    <td height="60" colspan="4" align="center" valign="middle" class="tishi"><p class="info"><span class="navig"><span class="info"><span class="confirm">please input your infomation</span></span></span></p></td>
  </tr>
  <form name="info" action="index.php?c=submit&a=createorder" method="post">
  <tr>
    <td height="132" colspan="4" bgcolor="#EAE1F0"><table width="100%" height="122" border="0" align="center" cellspacing="5">
      <tr>
        <td height="37" align="right"><span class="info">address  </span></td>
        <td><span class="info">
          <input type="text" maxlength="50" name="address" />
        </span></td>
      </tr>
      <tr>
        <td height="33" align="right"><span class="info">telephone </span></td>
        <td><span class="info">
          <input type="text" maxlength="10" name="telephone"/>
        </span></td>
      </tr>
      <tr>
        <td height="32" align="right"><span class="info">message </span></td>
        <td><span class="info">
          <input type="text" maxlength="50" name="message"/>
        </span></td>
      </tr>
    </table></td>
  </tr>
  
  <tr  >
    <td width="292" class="navig">My order</td>
    <td width="174" class="navig">Unit-price</td>
    <td width="154" class="navig">No</td>
    <td width="187" class="navig"> Sum</td>
  </tr>
<?php $sum=0; ?>
<?php for ($i=0;$i<count($id);$i++) { ?>
<?php echo  '<tr bgcolor="BBE5FA">'; ?>
<?php echo    '<td height="30" class="tishi">'.$name[$i].'</td>'; ?>
<?php echo '<input name="name[]" type="hidden" value="'.$name[$i].'"/>'; ?>
<?php echo '<input name="id[]" type="hidden" value="'.$id[$i].'"/>'; ?>
<?php echo '<input name="price[]" type="hidden" value="'.$price[$i].'"/>'; ?>
<?php echo '<input name="num[]" type="hidden" value="'.$num[$i].'"/>'; ?>
<?php echo    '<td height="30" class="tishi">'.$price[$i].'</td>'; ?>
<?php echo    '<td height="30" class="tishi">'.$num[$i].'</td>'; ?>
<?php echo    '<td height="30" class="tishi">'.$num[$i]*$price[$i].'</td>'; ?>
<?php $sum=$sum+$num[$i]*$price[$i]; ?>
<?php echo  '</tr>'; ?>
<?php } ?>
  <tr>
    <td colspan="4" align="right" valign="middle" class="e">Total￥:<?php echo $sum; ?></td>
  </tr>
  <tr>
    <td colspan="4" align="right" valign="middle">
    <input type="submit" value="Confirm" />
    </td>
  </tr>
  <tr>
    <td colspan="4" align="right" valign="middle" ><a href="index.php?c=index&a=run" class="back">Back</a></td>
  </tr>
  </form>
</table>
<p>&nbsp;</p>
</body>
</html>
