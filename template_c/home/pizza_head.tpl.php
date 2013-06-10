<?php  if (!defined("IS_INITPHP")) exit("Access Denied!");  /* INITPHP Version 1.0 ,Create on 2013-06-09 10:21:10, compiled from D:\xampp\htdocs\test/template/home/pizza_head.htm */ ?>
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
</head>

<body>