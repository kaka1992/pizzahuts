<?php
/**
 * DEMO
 * @author zhuli 
 */
 class typeDao extends Dao {
	 
 	public function insert($name) {
		$sql = sprintf("INSERT INTO `webauth`.`type`(`name`)VALUES(%s);", $name);
		$result = $this->dao->db->query($sql);
	}
	
	public function selectbyname($name) {
		$sql = sprintf('select * from `webauth`.`type` where `name` = %s%s%s;','"',$name,'"');
		$result = $this->dao->db->query($sql);
		if($this->dao->db->num_rows($result) == 0){
			return '0';
		}
		return $result;
	}
	
	public function selectall() {
		return $this->dao->db->get_all('`webauth`.`products`');
	}
	
 }