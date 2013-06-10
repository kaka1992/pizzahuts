function addcart(id,name,num,price)
{
	price = parseFloat(price).toFixed(2);
	var str="";
	str=get_cookie("shoppingcart");
	if(str.length>0)
	{
		arr=str.split("^");
		count=arr.length;
		comp="id,"+id;
		newstr="";
		flag=0;
		for(i=0;i<arr.length-1;i++)
		{
			pro=arr[i].split("|");
			if(comp==pro[0])
			{
				flag=1;
				pro_num=pro[2].split(",");
				pro_num[1]=parseInt(pro_num[1])+1;
				pro[2]=pro_num[0]+","+pro_num[1];
				arr[i]=pro[0]+"|"+pro[1]+"|"+pro[2]+"|"+pro[3];
			}
		}
		if(flag==0)
		{
			newstr="id,"+id+"|name,"+name+"|num,"+num+"|price,"+price+"^";
		}
		returnstr="";
		for(i=0;i<arr.length-1;i++)
		{
			returnstr=returnstr+arr[i]+"^";
		}
		returnstr=returnstr+newstr+";";
		add_cookie(returnstr);
	}
	else
	{
		add_cookie("id,"+id+"|name,"+name+"|num,"+num+"|price,"+price+"^;");
	}
}

function add_cookie(str)
{//写入cookie
	document.cookie="shoppingcart="+str;
	//location.href="cart.php";
}
function get_num()
{
	var str=get_cookie("shoppingcart");
	var arr=str.split("^");
	return arr.length-1;
}

function read_cookie()
{//读取购物车数据
	var str=get_cookie("shoppingcart");
	var arr=str.split("^");
	var all_money=0;
	var all_num=0;
	var id = new Array();
	var name = new Array();
	var num = new Array();
	var price = new Array();
	document.write('<table border="0" align="center" valign="top" cellpadding="5">');
	document.write('<tr><td>name</td><td>num</td><td>price</td><td>total</td><td>&nbsp;</td></tr>');
	for(i=0;i<arr.length-1;i++)
	{
		pro=arr[i].split("|");
		id_temp=pro[0].split(",");
		id[i]=id_temp[1];
		name_temp=pro[1].split(",");
		name[i]=name_temp[1];
		num_temp=pro[2].split(",");
		num[i]=num_temp[1];
		price_temp=pro[3].split(",");
		price[i]=price_temp[1];
		money=parseFloat(num[i]*price[i]);
		all_money=all_money+money;
		all_num=all_num+num[i];
		document.write('<tr><td>'+name[i]+'</td>');
		document.write('<td><input type="text" value="'+num[i]+'"name="num'+i+'" size=2 onblur="javascript:change_cookie('+id[i]+',this.value)"></td>');
		document.write('<td>'+money.toFixed(2)+'</td>');
		document.write('<td align="right"><button onclick="javascript:delete_cookie('+id[i]+')">Delete</button></td></tr>');
		document.write('<input type="hidden" name="id[]" value="'+id[i]+'"/>');
		document.write('<input type="hidden" name="num[]" value="'+num[i]+'"/>');
		 
	}
	document.write("</table><center>总金额："+all_money.toFixed(2)+"</center>");
	document.write('<input type="hidden" name="all_money" value="'+all_money.toFixed(2)+'"/>');
	document.write('<input type="hidden" name="sum" value="'+get_num()+'"/>');
}

function delete_cookie(id)
{//删除某个产品
	str=get_cookie("shoppingcart");
	arr=str.split("^");
	count=arr.length;
	comp="id,"+id;
	returnstr="";
	for(i=0;i<arr.length-1;i++)
	{
		pro=arr[i].split("|");
		if(comp!=pro[0])
		{
			returnstr=returnstr+arr[i]+"^";
		}
	}
	add_cookie(returnstr); 
	location.href="read.html"
 //alert(str);
}

function change_cookie(id,num)
{//更改数量
 //alert(num);
	num=parseInt(num);
 //alert(num);
	if(num==0)
	{
		alert("数量不能小于等于0");
		location.href="read.html"
	}
	else
	{//alert("数量大于等于0了");
		var str="";
		str=get_cookie("shoppingcart");
		if(str.length>0)
		{
			arr=str.split("^");
			count=arr.length;
			comp="id,"+id;
			newstr="";
			flag=0;
			for(i=0;i<arr.length-1;i++)
			{
				pro=arr[i].split("|");
				if(comp==pro[0])
				{
					flag=1;
					pro_num=pro[2].split(",");
					pro_num[1]=num;
					pro[2]=pro_num[0]+","+pro_num[1];
					arr[i]=pro[0]+"|"+pro[1]+"|"+pro[2]+"|"+pro[3];
				}
			}
			if(flag==0)
			{
				newstr="id,"+id+"|name,"+name+"|num,"+num+"|price,"+price+"^";
			}
			returnstr="";
			for(i=0;i<arr.length-1;i++)
			{
				returnstr=returnstr+arr[i]+"^";
			}
			returnstr=returnstr+newstr+";";
			add_cookie(returnstr);
			location.href="read.html"
		}
		else
		{
			add_cookie("id,"+id+"|name,"+name+"|num,"+num+"|price,"+price+"^;");
			location.href="read.html"
		} 
	}
}
 
function get_cookie(Name)
{
	var search = Name + "="
	var returnvalue = "";
	if (document.cookie.length > 0) 
	{
		offset = document.cookie.indexOf(search)
		if (offset != -1) 
		{
			offset += search.length
			end = document.cookie.indexOf(";", offset);
			if (end == -1)
			end = document.cookie.length;
			returnvalue=unescape(document.cookie.substring(offset, end))
		}
	}
	return returnvalue;
}