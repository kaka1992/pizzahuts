<?php
/**
 * DEMO
 * @author zhuli 
 */
class productlistController extends Controller {
	
	public $initphp_list = array('test', 'getAc|get', 'postAc|post', 'putAc|put', 'delAc|del'); //Action白名单

	public function run() {
		$this->getTestDao()->test();
	}
	
	public function test() {
		$result = $this->getproductsDao()->selectfull();
	}
	
	private function getTestDao() {
		return InitPHP::getDao('testa','');
	}
	
	private function getproductsDao() {
		return InitPHP::getDao('products','');
	}
	
	public function getAc() {
		echo "只能是HTTP GET请求的时候才能访问到";
	}
	
	public function postAc() {
		echo "只能是HTTP POST请求的时候才能访问到";
	}
	
	public function putAc() {
		echo "只能是HTTP PUT请求的时候才能访问到";
	}
	
	public function delAc() {
		echo "只能是HTTP DEL请求的时候才能访问到";
	}
	
} 