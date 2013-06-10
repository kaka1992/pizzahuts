<?php
/**
 * DEMO
 * @author zhuli 
 */
 class branchDao extends Dao {
	public function selectall() {
		return $this->dao->db->get_all('`webauth`.`branch`');
	}

 }