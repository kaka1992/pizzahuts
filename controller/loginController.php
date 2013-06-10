<?php
/**
 * DEMO
 * @author zhuli 
 */
class loginController extends Controller {
	
	public $initphp_list = array('test','check|post', 'getAc|get', 'postAc|post', 'putAc|put', 'delAc|del'); //Action白名单
	
	public function run() {
		session_start();
		$this->view->set_tpl('login/login');
		$this->view->get_tpl(); //可以得到已经设置的模板数组
		$this->view->display(); //模板显示
	}

	public function check() {
		session_start();
		$session = $this->getUtil('session'); 
		$Username = $this->controller->get_gp('Username', $type = 'P',  $isfliter = false);
		$Password = $this->controller->get_gp('Password', $type = 'P',  $isfliter = false);
		if($this->getuserDao()->ismyuser($Username,$Password)){
			$uuid = $session->guid();
			$_SESSION[$Username] = $uuid;
			$this->controller->redirect('index.php?c=index&a=run&m='.md5($uuid).'&u='.$Username.'', $time = 0);
			//$this->controller->redirect('page1.php?m='.$uuid.'&u='.$Username.'', $time = 0);
		}
		echo 4;
	}

	public function map($address){
		$url='http://api.map.baidu.com/geocoder/v2/?address='.$address.'&output=json&ak=B173f0e4ff797cb526c932ed7565a5b7';  
		$html = file_get_contents($url);  
		$result =  json_decode($html);

		echo $result->{'result'}->{'location'}->{'lng'}; 
		return $result;
	}

	public function test(){
		$url='http://api.map.baidu.com/geocoder/v2/?address=天通苑&output=json&ak=B173f0e4ff797cb526c932ed7565a5b7';  
		$html = file_get_contents($url);  
		$result =  json_decode($html);
		echo $result->{'result'}->{'location'}->{'lng'};
		echo '  ';
		echo $result->{'result'}->{'location'}->{'lat'}; 
	}
	
	private function getuserDao() {
		return InitPHP::getDao('user','');
	}
	
} 
?>