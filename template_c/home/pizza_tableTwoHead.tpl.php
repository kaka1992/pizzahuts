<?php  if (!defined("IS_INITPHP")) exit("Access Denied!");  /* INITPHP Version 1.0 ,Create on 2013-06-09 10:21:10, compiled from D:\xampp\htdocs\test/template/home/pizza_tableTwoHead.htm */ ?>
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
    <td  colspan="4"><table width="700" height="330" border="0" cellspacing="5">
      <tr>
        <td width="700"><table width="100%" height="310" border="0" cellspacing="5">