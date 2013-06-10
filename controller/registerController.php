<?php
/**
 * DEMO
 * @author zhuli 
 */
class registerController extends Controller {
	
	public $initphp_list = array('regist', 'getAc|get', 'postAc|post', 'putAc|put', 'delAc|del'); //Action白名单
	
	public function run() {
		$this->view->set_tpl('login/register');
		$this->view->get_tpl(); //可以得到已经设置的模板数组
		$this->view->display(); //模板显示
	}
	
	public function regist() {
		$session = $this->getUtil('session'); 
		$Username = $this->controller->get_gp('Username', $type = 'P',  $isfliter = true);
		$Password = $this->controller->get_gp('Password', $type = 'P',  $isfliter = true);
		$cfm_Password = $this->controller->get_gp('cfm_Password', $type = 'P',  $isfliter = true);
		$phoneNumber = $this->controller->get_gp('phoneNumber', $type = 'P',  $isfliter = true);
		$address = $this->controller->get_gp('address', $type = 'P',  $isfliter = true);
		if($Password != $cfm_Password || $Password == '' || $Username == '')
			$this->controller->redirect('index.php?c=register&a=run', $time = 0);
		$result = $this->getuserDao()->insert($Username,$Username,$Password,$phoneNumber,$address);
		if($result == '0'){
			echo '3';
			return;
		}
		$uuid = $session->guid();
		$session->set($Username,$uuid);
		$this->controller->redirect('index.php?c=index&a=run&m='.md5($uuid).'&u='.$Username, $time = 0);
	}
	

	private function getuserDao() {
		return InitPHP::getDao('user','');
	}
	
} 