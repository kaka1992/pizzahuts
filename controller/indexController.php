<?php
/**
 * DEMO
 * @author zhuli 
 */
class indexController extends Controller {
	
	public $initphp_list = array('test', 'getAc|get', 'postAc|post', 'putAc|put', 'delAc|del'); //Action白名单

	public function run() {
		//
		$cookie = $this->getUtil('cookie');
		$session = $this->getUtil('session'); 

		$md5uuid = $this->controller->get_gp('m', $type = 'G',  $isfliter = false);
		$username = $this->controller->get_gp('u', $type = 'G',  $isfliter = false);
		$number = $this->controller->get_gp('number', $type = 'G',  $isfliter = false);
		$fname = $this->controller->get_gp('fname', $type = 'G',  $isfliter = false);
		$sort = $this->controller->get_gp('sort', $type = 'G',  $isfliter = false);
		$type = $this->controller->get_gp('type', $type = 'G',  $isfliter = false);
		
		if($username == NULL)
			$username = $cookie->get('username');
		if($number=='')
			$number='1';
		if($sort=='')
			$sort='id';
		if($type == '')
			$type = 'pizza';
		if(md5($session->get($username)) != $md5uuid && $session->get($cookie->get('username')) == NULL){
			$this->view->assign('loginname', 'Login');
			$this->view->assign('loginurl', 'index.php?c=login&a=run');
			$cookie->set('username','-1',time()+3600,'/','127.0.0.1');
		}else{
			$cookie->set('username',$username,time()+3600,'/','127.0.0.1');
			$this->view->assign('loginname', $username);
			$this->view->assign('loginurl', 'index.php?c=user&a=run&username='.$username);
		}
		//echo $type;
		if($type != 'search')
		{
			$resultnum = $this->getproductsDao()->selectbytypenum($type);
			$result = $this->getproductsDao()->selectbytypelimit($type,$number,$sort);
		}
		else
		{
			$resultnum = 0;
			if($fname == '')
				$fname = $_POST["fname"];
			$rs = $this->getproductsDao()->selectall($sort);
			$rsnum = $rs[1];
			for($i = 0; $i < $rsnum; $i++)
			{
				if(!(strripos($rs[0][$i]["name"],$fname)===false))
				{
					$result[0][$resultnum] = $rs[0][$i];
					$resultnum++;
				}
			}
			$resultnum = $resultnum - 9*($number-1);
			$result[1] = $resultnum;
			$result[0] = array_slice($result[0],9*($number-1));
		}
		
		$datanum = ceil($resultnum/9);
		$this->view->assign('number', $number);
		$this->view->assign('datanum', $datanum);
		$this->view->assign('data', $result);
		$this->view->assign('type', $type);
		$this->view->assign('fname', $fname);
		$this->view->set_tpl('home/pizza_head','F');
		$this->view->set_tpl('home/pizza_end','L');
		$this->view->set_tpl('home/pizza_tableOne');
		$this->view->set_tpl('home/pizza_tableTwoHead');
		$this->view->set_tpl('home/pizza_tableTwoBody');
		$this->view->set_tpl('home/pizza_tableTwoEnd');
		$this->view->get_tpl(); //可以得到已经设置的模板数组
		$this->view->display(); //模板显示
	}
	
	public function test() {
		$tr = $this->getproductsDao()->selectbyid('10');
		print_r($tr);
		$num = $this->dao->db->num_rows($tr);
		echo $num;
		$ta = $this->dao->db->fetch_assoc($tr);
		print_r($tr);
		$typedao = InitPHP::getDao('type','');
		$ty = $typedao->selectbyname('di');
		print_r($ty);
		$typeid = $this->dao->db->fetch_assoc($ty);
	}
	
	private function getproductsDao() {
		return InitPHP::getDao('products','');
	}
} 
?>