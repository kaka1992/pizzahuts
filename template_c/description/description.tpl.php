<?php  if (!defined("IS_INITPHP")) exit("Access Denied!");  /* INITPHP Version 1.0 ,Create on 2013-06-09 10:01:02, compiled from D:\xampp\htdocs\test/template/description/description.htm */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META NAME="Generator" CONTENT="EditPlus">
<META NAME="Author" CONTENT="">
<META NAME="Keywords" CONTENT="">
<META NAME="Description" CONTENT="">
<script src="data/js/order.js"></script>
<script>
function add(id,name,num,price)
{
	addcart(id,name,num,price);
	cart.value = 'cart(' + get_num() + ')';
}
</script> 
<title>无标题文档</title>
<link href="data/css/mode.css" type="text/css" rel="stylesheet">

<style type="text/css">
.logo1 {
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-size: 24px;
	color: #FFF;
	font-style: italic;
}
.title1 {color: #FFF;
	font-style: italic;
}
.commenr {
	color: #036;
	font-family: "Lucida Console", Monaco, monospace;
	font-size: 24px;
}
.navigation {
	font-size: 24px;
	font-family: "Lucida Console", Monaco, monospace;
}
.navigation {
	color: #C93;
}
#decrib {
	font-size: 24px;
	font-family: "Lucida Console", Monaco, monospace;
}
</style>
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
    <td width="63" align="center" valign="middle" bgcolor="#FF0000"><a href="index.php?c=register&a=run"class="title1">Register </a></td>
  </tr>
</table>
<table width="798"  height="78"border="0" align="center">
  <tr>
    <td width="158" height="42" align="left" valign="top"><a href="index.php?c=index&a=run&number=1&type=setmeal"><img src="data/images/u12_normal.jpg" width="158" height="72" /></a></td>
    <td width="164" height="42" align="left" valign="top"><a href="index.php?c=index&a=run&number=1&type=pizza"><img src="data/images/u4_normal.jpg" width="164" height="72" /></a></td>
    <td width="164" height="42" align="left"valign="top" ><a href="index.php?c=index&a=run&number=1&type=noddle"><img src="data/images/u167_normal.jpg" width="164" height="72" /></a></td>
    <td width="164" height="42" align="left" valign="top"><a href="index.php?c=index&a=run&number=1&type=dissert"><img src="data/images/u180_normal.jpg" width="164" height="72" /></a></td>
    <td width="157" height="42" align="left" valign="top"><a href="index.php?c=index&a=run&number=1&type=snacks"><img src="data/images/u178_normal.jpg" width="160" height="72" /></a></td>
  </tr>
</table>
<table width="840" height="50" border="0" align="center" cellspacing="0" cellpadding="10">
  <tr>
    <td height="10" bgcolor="#FF0000" class="title2" width="70%">please choose the foods you want </td>
    <td height="10" bgcolor="#FF0000" ><a href="index.php?c=index&a=run&number=<?php echo $number.'&type='.$type.'&fname='.$fname; ?>" class = 'title1'>Sort By ID</a>
  	</td>
    <td height="10" bgcolor="#FF0000" ><a href="index.php?c=index&a=run&number=<?php echo $number.'&type='.$type.'&fname='.$fname.'&sort=score'; ?>" class = 'title1'>Sort By Score</a>
  	</td>
    <td height="10" bgcolor="#FF0000" ><a href="index.php?c=submit&a=run" ><script>  document.write('<input type="button" name="cart" value="cart(' + get_num() + ')">');  </script></a>
  	</td>
  </tr>
  <tr>
    <td  colspan="4"></td>
   

        
        
<table width="840" height="643" border="0" align="center" cellspacing="5" bgcolor="FFFFEE">
  <tr>
    <td width="459" height="265" rowspan="3" align="left" valign="top">
    <?php echo '<img src="'.$data['pic_url'].'" width="398" height="280" alt="sweat" /></td>'; ?>
    <td width="362" height="110" align="right"><p id="name" align="left"><span id="decrib"><span class="commenr">name</span><br /><?php echo $data['name'];?>
    </span><br />
    </p></td>
  </tr>
  <tr>
    <td height="110" align="left">
    <p><span class="commenr">description</span><br />
    <?php echo $data['description'];?>
      <br />
    </p></td>
  </tr>
  <tr>
    <td height="89" align="right" valign="top"><p>
    <?php echo '<td><input type="button" onclick="add(' ?><?php echo $data['id'].",'".$data['name']."',1,".$data['price'].');" value="order"/></td>'; ?>
      
    </td>
  </tr>
  <tr>
  
    <tr >
    <td height="31" colspan="2"><table width="100%" height="35" border="0" align="center" cellspacing="3" bgcolor="#EEFFFF">
      <tr>
        <td width="20%" height="29" align="leftr" valign="middle" class="navigation" >username</td>
        <td width="62%" align="cleft" valign="middle" class="logo1"> <span class="navigation"> comments</span></td>
        <td width="18%" align="center" valign="middle" class="navigation">createtime</td>
        </tr>
     
<?php for ($i = 0;$i<$commentdata[1];$i++) { ?> 
<?php echo      '<tr>'; ?> 
<?php echo        '<td height="30">'.$commentdata[0][$i]["name"].'</td>'; ?> 
<?php echo        '<td>'.$commentdata[0][$i]["text"].'</td>'; ?> 
<?php echo        '<td>'.$commentdata[0][$i]["createtime"].'</td>'; ?> 
<?php echo      '</tr>'; ?> 
<?php } ?> 
    </table></td> 
  </tr>
  <tr>
  
    <td height="273" colspan="2">
    <form name="commment" 
   method=post action="index.php?c=description&a=commit">
       <p><span class="logo1"><span class="commenr">Create Comments</span></span><br />
         <br />
         <textarea name="content" cols="80" rows="9" wrap="virtual" ></textarea>
         <?php echo '<input type="hidden" name="id" value="'.$data["id"].'">'; ?>
         <?php echo '<input type="hidden" name="uid" value="'.$loginname.'">'; ?>
         <input type="submit" value="Submit" name="commentButton"/>
       </p>
    </form></td>
  </tr>
  
</table>

<br />
<a href="index.php?c=submit&a=run" ><script>  document.write('<input type="button" name="cart" value="cart(' + get_num() + ')">');  </script></a>
</body>
</html>
