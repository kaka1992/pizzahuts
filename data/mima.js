 <script language="javascript">
  function check()
  {
	if (form1.cfm_pwd.value.length ==0)
	form1.cfm_pwd.blur();
	else
	if (form1.pwd.value.length<6)
	{
		alert("���벻������6���ַ�");
		form1.pwd.focus();
	}
	else if (form1.pwd.value.length>10)
	{	
		alert("���벻�ܶ���10���ַ�"); 
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
		alert("���벻������6���ַ�");
		form1.cfm_pwd.focus();
	}
	else
	if  (form1.cfm_pwd.value.length>10)
	{	
		alert("���벻�ܶ���10���ַ�"); 
		form1.cfm_pwd.value="";
		form1.cfm_pwd.focus();
	}
else
	if(form1.pwd.value!=form1.cfm_pwd.value)
	{
		alert("�������벻ͬ,����������");
		form1.cfm_pwd.value="";
		form1.cfm_pwd.focus();
	}
}

</script>