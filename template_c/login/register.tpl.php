<?php  if (!defined("IS_INITPHP")) exit("Access Denied!");  /* INITPHP Version 1.0 ,Create on 2013-06-09 10:20:22, compiled from D:\xampp\htdocs\test/template/login/register.htm */ ?>
<html>
<head>
    <title>Register</title>
    <link href="data/css/test1.css" type="text/css" rel="stylesheet">
     <link href="data/css/mode.css" type="text/css" rel="stylesheet">
 <script language="javascript">
  function check()
  {
	 if (form1.Password.value.length ==0)
	form1.Password.blur();
	else
	if (form1.Password.value.length<6)
	{
		alert("密码不能少于6个字符");
		form1.Password.value="";
	
	}
	else if (form1.Password.value.length>10)
	{	
		alert("密码不能多于10个字符"); 
		form1.Password.value="";
		
	}
	  
}

function cmp()
{
	if (form1.cfm_Password.value.length ==0)
	form1.cfm_Password.blur();
	else
	if (form1.cfm_Password.value.length<6)
	{
		alert("密码不能少于6个字符");
		form1.cfm_Password.value="";
		
	}
	else
	if  (form1.cfm_Password.value.length>10)
	{	
		alert("密码不能多于10个字符"); 
		form1.cfm_Password.value="";
		
	}
else
	if(form1.Password.value!=form1.cfm_Password.value)
	{
		alert("两次密码不同,请重新输入");
		form1.cfm_Password.value="";
		
	}
}

</script>
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
<div class="content">
		<div id="tab">
			<table cellpadding="10">
				<tr>
					<td bgcolor = #d0d0d0><a href="index.php?c=login&a=run"><span>Login</span></a></td>
					<td>Register</td>
				</tr>
			</table>
		</div>
		<div id="register_form_div">
	    <form name="form1" method=post action="index.php?c=register&a=regist">
	        <table>
	            <tr><td>&nbsp;</td></tr> 				
	            
	            <tr><td>Choose your username:</td></tr>
	            <tr><td><input type=text name=Username size=35></td></tr>
	            <tr><td>Creat a password:</td></tr>
	            <tr><td><input type=password  name="Password" onBlur="check()"  size=35></td></tr>
	            <tr><td>Confirm your password:</td></tr>
	            <tr><td><input type=password  name="cfm_Password" onBlur="cmp()" size=35></td></tr> 
                <tr><td>Default phone number:</td></tr>
	            <tr><td><input type=text  name=phoneNumber size=35></td></tr> 
                <tr><td>Default address:</td></tr>
	            <tr><td><input type=text  name=address size=35></td></tr> 
	            <tr><td>&nbsp;</td></tr>
	            <tr><td> <input type=submit value=Create ></input></td></tr>
	            <tr><td>&nbsp; </td></tr>
	        </table>
	    </form>
	  </div>
  </div>
</body>
</html>