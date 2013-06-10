<?php
/**
 * DEMO
 * @author zhuli 
 */
class descriptionController extends Controller {
	
	public $initphp_list = array('test|get','commit|post', 'getAc|get', 'postAc|post', 'putAc|put', 'delAc|del'); //Action白名单
	
	public function run() {
		$cookie = $this->getUtil('cookie');
		$session = $this->getUtil('session'); 
		
		$username = $this->controller->get_gp('u', $type = 'G',  $isfliter = false);
		$id = $this->controller->get_gp('id', $type = 'G',  $isfliter = true);
		$result = $this->getproductsDao()->selectbyid($id);
		if($username == NULL)
			$username = $cookie->get('username');
			
		if($session->get($cookie->get('username')) == NULL){
			$this->view->assign('loginname', '-1');
			$this->view->assign('loginurl', 'index.php?c=login&a=run');
			$cookie->set('username','-1',time()+3600,'/','127.0.0.1');
		}else{
			$cookie->set('username',$username,time()+3600,'/','127.0.0.1');
			$this->view->assign('loginname', $username);
			$this->view->assign('loginurl', 'index.php?c=user&a=run&username='.$username);
		}
		$commentdata = $this->getcommentDao()->selectfull($id);
		$this->view->assign('data', $result);
		$this->view->assign('commentdata', $commentdata);
		$this->view->set_tpl('description/description');
		$this->view->get_tpl(); //可以得到已经设置的模板数组
		$this->view->display(); //模板显示
	}
	
	public function commit() {
		$text = $this->controller->get_gp('content', $type = 'P',  $isfliter = true);
		$id = $this->controller->get_gp('id', $type = 'P',  $isfliter = true);
		$name = $this->controller->get_gp('uid', $type = 'P',  $isfliter = true);
		$uid = $this->getuserDao()->selectbyaccount($name);
		
		$this->getcommentDao()->insert($uid['id'],$id,$text);
		$this->controller->redirect('index.php?c=index&a=run', $time = 0);
	}
	
	public function test() {
		$commentdata = $this->getcommentDao()->selectfull('1');
		print_r($commentdata);
	}

	private function getproductsDao() {
		return InitPHP::getDao('products','');
	}
	
	private function getcommentDao() {
		return InitPHP::getDao('comment','');
	}
	
	private function getuserDao() {
		return InitPHP::getDao('user','');
	}
	
} 