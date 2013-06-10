<?php
/**
 * DEMO
 * @author zhuli 
 */
class administorController extends Controller {
	
	public $initphp_list = array('changestatuse','test','dealdelete','dealadd','deallogin','login','orderdetail','add','delete','show', 'getAc|get', 'postAc|post', 'putAc|put', 'delAc|del'); //Action白名单
	
	public function run() {
		session_start();
		$cookie = $this->getUtil('cookie');
		$session = $this->getUtil('session');
		
		
		$md5uuid = $this->controller->get_gp('m', $type = 'G',  $isfliter = false);
		$username = $this->controller->get_gp('u', $type = 'G',  $isfliter = false);
		
		if($username == NULL)
			$username = $cookie->get('adminname');
		if(md5($session->get($username)) != $md5uuid && $session->get($cookie->get('adminname')) == NULL){
			$this->controller->redirect('index.php?c=administor&a=login', $time = 0);
		}
		
		$cookie->set('adminname',$username,time()+3600,'/','127.0.0.1');
		
		$this->view->set_tpl('administor/Administration');
		$this->view->get_tpl(); //可以得到已经设置的模板数组
		$this->view->display(); //模板显示
	}

	public function changestatuse() {
		$this->check();
		$name = $this->controller->get_gp('Status1', $type = 'P',  $isfliter = false);
		$id = $this->controller->get_gp('id', $type = 'P',  $isfliter = false);
		if($name=='Waiting')
			$name = 0;
		else if($name=='Serving')
			$name = 1;
		else
			$name = 2;
		$this->getordersDao()->updatebyid($id,array('statuse'=>$name));
		$this->controller->redirect('index.php?c=administor&a=show', $time = 0);
	}

	public function show() {
		$this->check();
		
		$data = $this->getordersDao()->selectall();
		$this->view->assign('data',$data);
		$this->view->set_tpl('administor/ShowOrder');
		$this->view->get_tpl(); //可以得到已经设置的模板数组
		$this->view->display(); //模板显示
	}

	public function add() {
		$this->check();
		
		$this->view->set_tpl('administor/AddProducts');
		$this->view->get_tpl(); //可以得到已经设置的模板数组
		$this->view->display(); //模板显示
	}
	
	public function dealadd() {
		$this->check();
		
		$upload = $this->getLibrary('upload');
		
		$name = $this->controller->get_gp('name', $type = 'P',  $isfliter = false);
		$price = $this->controller->get_gp('price', $type = 'P',  $isfliter = false);
		$discount = $this->controller->get_gp('discount', $type = 'P',  $isfliter = false);
		$description = $this->controller->get_gp('description', $type = 'P',  $isfliter = false);
		$type = $this->controller->get_gp('type', $type = 'P',  $isfliter = false);
		$uuid = $function = $this->getLibrary('function')->trade_no();
		$uuid = $uuid.'.jpg';
		echo $_FILES['picture_url']['tmp_name'];
		echo $_FILES['picture_url']['name'];
		//$this->uploadfile($_FILE['picture_url']['name'],'d:/',$_FILE['picture_url']['tmp_name']);
		$pic_url = 'data/images/'.$uuid;
		
		$this->getproductsnDao()->insert($name,$type,$pic_url,$discount,$description,$price);
		echo 'ok';
		$this->controller->redirect('index.php?c=administor&a=add', $time = 2);
	}
	
	public function login() {
		$this->view->set_tpl('administor/AdministrationLogin');
		$this->view->get_tpl(); //可以得到已经设置的模板数组
		$this->view->display(); //模板显示
	}
	
	public function deallogin() {
		session_start();
		$cookie = $this->getUtil('cookie');
		$session = $this->getUtil('session');
		
		$name = $this->controller->get_gp('name', $type = 'P',  $isfliter = false);
		$pwd = $this->controller->get_gp('pwd', $type = 'P',  $isfliter = false);
		if($this->getadminDao()->ismyuser($name,$pwd)) {
			$uuid = $session->guid();
			$_SESSION[$name] = $uuid;
			$this->controller->redirect('index.php?c=administor&a=run&m='.md5($uuid).'&u='.$name.'', $time = 0);
		}
		else{
			$this->controller->redirect('index.php?c=administor&a=login', $time = 0);
		}
	}
	
	public function orderdetail() {
		$this->check();
		
		$id = $this->controller->get_gp('id', $type = 'P',  $isfliter = false);
		if($id==NULL){
			echo 'no id input!';
			$this->controller->redirect('index.php?c=administor&a=show', $time = 1);
		}
		$data = $this->getordersDao()->selectbyid($id);
		$pdata = $this->getordersDao()->selectbyoppid($id);
		if($data == '0'){
			echo "this product doesn't exit!";
			$this->controller->redirect('index.php?c=administor&a=show', $time = 1);
		}
		$this->view->assign('data',$data);
		$this->view->assign('pdata',$pdata);
		$this->view->set_tpl('administor/OrderDetails');
		$this->view->get_tpl(); //可以得到已经设置的模板数组
		$this->view->display(); //模板显示
	}
	
	public function test(){
		$data = $this->getordersDao()->selectbyoppid('1');
		print_r($data);
	}
	
	public function delete() {
		$this->check();
		
		$this->view->set_tpl('administor/DeleteProducts');
		$this->view->get_tpl(); //可以得到已经设置的模板数组
		$this->view->display(); //模板显示
	}

	public function dealdelete() {
		$this->check();
		
		$id = $this->controller->get_gp('id', $type = 'P',  $isfliter = false);
		$name = $this->getproductsnDao()->selectbyid($id);
		if($name == '0'){
			echo "the data is not exist!";
			$this->controller->redirect('index.php?c=administor&a=delete', $time = 1);
		}
		else{
			//$this->getordersDao()->
			$this->getpackageDao()->deletebypid($id);
			$this->getcommentDao()->deletebypid($id);
			$this->getproductsnDao()->deletebyid($id);
			echo "ok!";
			$this->controller->redirect('index.php?c=administor&a=delete', $time = 1);
		}
	}

	private function getuserDao() {
		return InitPHP::getDao('user','');
	}
	
	private function check() {
		session_start();
		$cookie = $this->getUtil('cookie');
		$session = $this->getUtil('session');
		$md5uuid = $this->controller->get_gp('m', $type = 'G',  $isfliter = false);
		$username = $this->controller->get_gp('u', $type = 'G',  $isfliter = false);
		
		if($username == NULL)
			$username = $cookie->get('adminname');
		if(md5($session->get($username)) != $md5uuid && $session->get($cookie->get('adminname')) == NULL){
			$this->controller->redirect('index.php?c=administor&a=login', $time = 0);
		}
	}
	
	private function getadminDao() {
		return InitPHP::getDao('admin','');
	}
	
	private function getordersDao() {
		return InitPHP::getDao('orders','');
	}
	
	private function getpackageDao() {
		return InitPHP::getDao('package','');
	}
	
	private function getproductsnDao() {
		return InitPHP::getDao('products','');
	}
	
	private function getcommentDao() {
		return InitPHP::getDao('comment','');
	}
	
	private function uploadfile($origin, $dest, $tmp_name)
	{
	  $origin = strtolower(basename($origin));
	  $fulldest = $dest.$origin;
	  $filename = $origin;
	  for ($i=1; file_exists($fulldest); $i++)
	  {
		$fileext = (strpos($origin,'.')===false?'':'.'.substr(strrchr($origin, "."), 1));
		$filename = substr($origin, 0, strlen($origin)-strlen($fileext)).'['.$i.']'.$fileext;
		$fulldest = $dest.$newfilename;
	  }
	 
	  if (move_uploaded_file($tmp_name, $fulldest))
		return $filename;
	  return false;
	}
	
} 
?>