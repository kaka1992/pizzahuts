<?php
/**
 * DEMO
 * @author zhuli 
 */
 class testaDao extends Dao {
 	public function test() {
		print_r($this->dao->db->get_all('products'));
	}
 }