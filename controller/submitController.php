<?php
/**
 * DEMO
 * @author zhuli 
 */
class submitController extends Controller {
	
	public $initphp_list = array('createorder','usercheck','tor','check|post', 'getAc|get', 'postAc|post', 'putAc|put', 'delAc|del'); //Action白名单
	
	public function run() {
		session_start();
		$cookie = $this->getUtil('cookie');
		$session = $this->getUtil('session');
		echo $cookie->get('username');
		$this->view->set_tpl('order/read');
		$this->view->get_tpl(); //可以得到已经设置的模板数组
		$this->view->display(); //模板显示
	}

	public function check() {
		session_start();
		$cookie = $this->getUtil('cookie');
		$session = $this->getUtil('session');
		$md5uuid = $this->controller->get_gp('m', $type = 'G',  $isfliter = false);
		$username = $this->controller->get_gp('u', $type = 'G',  $isfliter = false);
		if($username == NULL)
			$username = $cookie->get('username');
		if(md5($session->get($username)) != $md5uuid && $session->get($cookie->get('username')) == NULL){
			$this->tor();
		}
		else{
			$this->usercheck($username);
		}
		

	}

	private function tor(){
		$id = $this->controller->get_gp('id', $type = 'P',  $isfliter = false);
		$num = $this->controller->get_gp('num', $type = 'P',  $isfliter = false);
		$name = $this->controller->get_gp('name', $type = 'P',  $isfliter = false);
		$price = $this->controller->get_gp('price', $type = 'P',  $isfliter = false);
		$this->view->assign('id',$id);
		$this->view->assign('num',$num);
		$this->view->assign('name',$name);
		$this->view->assign('price',$price);
		$this->view->set_tpl('order/OrderCOnTurist');
		$this->view->get_tpl(); //可以得到已经设置的模板数组
		$this->view->display(); //模板显示
	}

	public function createorder(){

		$telephone = $this->controller->get_gp('telephone', $type = 'P',  $isfliter = false);
		$address = $this->controller->get_gp('address', $type = 'P',  $isfliter = false);
		$message = $this->controller->get_gp('message', $type = 'P',  $isfliter = false);
		$id = $this->controller->get_gp('id', $type = 'P',  $isfliter = false);
		$num = $this->controller->get_gp('num', $type = 'P',  $isfliter = false);
		$name = $this->controller->get_gp('name', $type = 'P',  $isfliter = false);
		$price = $this->controller->get_gp('price', $type = 'P',  $isfliter = false);
		$totalprice=0;
		$totalcount=0;
		for($i=0;$i<count($id);$i++){
			$totalprice=$totalprice+$num[$i]*$price[$i];
			$totalcount=$totalcount+$num[$i];
		}
		
		$dixy = $this->map($address);
		$branchs = $this->getbranchDao()->selectall();
		$branchdistance = 1000000;
		for($i=0;$i<$branchs[1];$i++){
			$temp = ($branchs[0][0]['lng'] - $dixy->{'result'}->{'location'}->{'lng'})^2 + ($branchs[0][0]['lat'] - $dixy->{'result'}->{'location'}->{'lat'})^2;
			if($temp<$branchdistance){
				$branchdistance = $temp;
				$branch = $branchs[0][$i]['id'];
			}
				
		}
		
		$o_id = $this->getordersDao()->insert('-1',$address,$telephone,$totalprice,$totalcount,$message,$branch);
		echo 'hello'.$o_id;
		for($i=0;$i<count($id);$i++){
			$this->getpackageDao()->insert($o_id,$id[$i],$num[$i]);	
		}
		echo 'hello';
		$this->orderresult('-1',$address,$telephone,$totalprice,$totalcount,$message,$branch,$id,$name,$num,$price);
		echo 'hello';
	}

	private function usercheck($username){
		$id = $this->getuserDao()->selectbyaccount($username);
		$uid = $id['id'];
		$address = $id['address'];
		$telephone = $id['telephone'];
		$pid = $this->controller->get_gp('id', $type = 'P',  $isfliter = false);
		$num = $this->controller->get_gp('num', $type = 'P',  $isfliter = false);
		$name = $this->controller->get_gp('name', $type = 'P',  $isfliter = false);
		$price = $this->controller->get_gp('price', $type = 'P',  $isfliter = false);
		$totalprice=0;
		$totalcount=0;
		for($i=0;$i<count($pid);$i++){
			$totalprice=$totalprice+$num[$i]*$price[$i];
			$totalcount=$totalcount+$num[$i];
		}
		
		$dixy = $this->map($address);
		$branchs = $this->getbranchDao()->selectall();
		$branchdistance = 1000000;
		for($i=0;$i<$branchs[1];$i++){
			$temp = ($branchs[0][0]['lng'] - $dixy->{'result'}->{'location'}->{'lng'})^2 + ($branchs[0][0]['lat'] - $dixy->{'result'}->{'location'}->{'lat'})^2;
			if($temp<$branchdistance){
				$branchdistance = $temp;
				$branch = $branchs[0][$i]['id'];
			}
				
		}
		$o_id = $this->getordersDao()->insert($uid,$address,$telephone,$totalprice,$totalcount,$message,$branch);
		for($i=0;$i<count($pid);$i++){
			$this->getpackageDao()->insert($o_id,$pid[$i],$num[$i]);	
		}
		$this->orderresult($username,$address,$telephone,$totalprice,$totalcount,$message,$branch,$pid,$name,$num,$price);
	}

	public function map($address){
		$url='http://api.map.baidu.com/geocoder/v2/?address='.$address.'&output=json&ak=B173f0e4ff797cb526c932ed7565a5b7';  
		$html = file_get_contents($url);  
		$result =  json_decode($html);

		//echo $result->{'result'}->{'location'}->{'lng'}; 
		return $result;
	}
	
	private function orderresult($username,$address,$telephone,$totalprice,$totalcount,$message,$branch,$id,$name,$num,$price){
		$this->view->assign('id',$id);
		$this->view->assign('num',$num);
		$this->view->assign('name',$name);
		$this->view->assign('price',$price);
		$this->view->assign('username',$username);
		$this->view->assign('address',$address);
		$this->view->assign('telephone',$telephone);
		$this->view->assign('totalprice',$totalprice);
		$this->view->assign('totalcount',$totalcount);
		$this->view->assign('message',$message);
		$this->view->assign('branch',$branch);
		$this->view->set_tpl('order/orderConfirm');
		$this->view->get_tpl(); //可以得到已经设置的模板数组
		
		$this->view->display(); //模板显示
	}
	
	private function getuserDao() {
		return InitPHP::getDao('user','');
	}
	
	private function getordersDao() {
		return InitPHP::getDao('orders','');
	}

	private function getbranchDao() {
		return InitPHP::getDao('branch','');
	}

	private function getpackageDao() {
		return InitPHP::getDao('package','');
	}
	
} 
?>