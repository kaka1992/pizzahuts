 <script language="javascript">
  function check()
  {
	if (form1.cfm_pwd.value.length ==0)
	form1.cfm_pwd.blur();
	else
	if (form1.pwd.value.length<6)
	{
		alert("密码不能少于6个字符");
		form1.pwd.focus();
	}
	else if (form1.pwd.value.length>10)
	{	
		alert("密码不能多于10个字符"); 
		form1.pwd.value="";
		form1.pwd.focus();
	}
	  
}

function cmp()
{
	if (form1.cfm_pwd.value.length ==0)
	form1.cfm_pwd.blur();
	else
	if (form1.cfm_pwd.value.length<6)
	{
		alert("密码不能少于6个字符");
		form1.cfm_pwd.focus();
	}
	else
	if  (form1.cfm_pwd.value.length>10)
	{	
		alert("密码不能多于10个字符"); 
		form1.cfm_pwd.value="";
		form1.cfm_pwd.focus();
	}
else
	if(form1.pwd.value!=form1.cfm_pwd.value)
	{
		alert("两次密码不同,请重新输入");
		form1.cfm_pwd.value="";
		form1.cfm_pwd.focus();
	}
}

</script>