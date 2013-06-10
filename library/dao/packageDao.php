<?php
/**
 * DEMO
 * @author zhuli 
 */
 class packageDao extends Dao {
	 
 	public function insert($o_id,$p_id,$count) {
		$sql = "INSERT INTO `webauth`.`package` (`oid`, `p_id`, `count`) VALUES ('".$o_id."', '".$p_id."', '".$count."');";
		$result = $this->dao->db->query($sql);
	}
	
	public function deletebypid($p_id) {
		$sql =sprintf('DELETE FROM `webauth`.`package` WHERE `p_id`=%s;',$p_id);
		$result = $this->dao->db->query($sql);
	}
 }