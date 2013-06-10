<?php
/**
 * DEMO
 * @author zhuli 
 */
class myorderController extends Controller {
	
	public $initphp_list = array('test','detail', 'getAc|get', 'postAc|post', 'putAc|put', 'delAc|del'); //Action白名单
	
	public function run() {
		session_start();
		$cookie = $this->getUtil('cookie');
		$session = $this->getUtil('session');
		$username = $cookie->get('username');
		if(md5($session->get($username)) != $md5uuid && $session->get($cookie->get('username')) == NULL){
			$this->controller->redirect('index.php?c=index&a=run', $time = 0);
		}
		$uid = $this->getuserDao()->selectbyaccount($username);
		$uid = $uid['id'];
		$data = $this->getordersDao()->selectbyu_id($uid);
		$this->view->assign('data',$data);
		$this->view->set_tpl('order/ShowOrder');
		$this->view->get_tpl(); //可以得到已经设置的模板数组
		$this->view->display(); //模板显示
	}

	public function detail() {
		$oid = $this->controller->get_gp('oid', $type = 'G',  $isfliter = false);
		
		$data = $this->getordersDao()->selectbyid($oid);
		$pdata = $this->getordersDao()->selectbyoppid($oid);
		if($data == '0'){
			echo "this product doesn't exit!";
			$this->controller->redirect('index.php?c=myorder&a=run', $time = 1);
		}
		$this->view->assign('data',$data);
		$this->view->assign('pdata',$pdata);

		$this->view->set_tpl('order/OrderDetails');
		$this->view->get_tpl(); //可以得到已经设置的模板数组
		$this->view->display(); //模板显
	}


	
	private function getuserDao() {
		return InitPHP::getDao('user','');
	}
	
	private function getordersDao() {
		return InitPHP::getDao('orders','');
	}
	
} 
?>