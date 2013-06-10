<?php
/**
 * DEMO
 * @author zhuli 
 */
 class adminDao extends Dao {
	 
 	public function insert($account,$name,$password,$telephone,$address) {
		if($this->selectbyaccount($account) != '0')
			return '0';
		$sql = sprintf("INSERT INTO `webauth`.`administator` (`account`,`name`,`password`,`createdate`,`telephone`,`address`) VALUES(%s,%s,%s,NOW(),%s,%s);", '"'.$account.'"','"'.$name.'"','"'.md5($password).'"','"'.$telephone.'"','"'.$address.'"');
		$result = $this->dao->db->query($sql);
	}
	
	public function selectbyaccount($name) {
		$sql = sprintf('select * from `webauth`.`administator` where `account` = %s%s%s;','"',$name,'"');
		$result = $this->dao->db->query($sql);
		if($this->dao->db->num_rows($result) == 0){
			return '0';
		}
		return $this->dao->db->fetch_assoc($result);
	}
	
	public function selectall() {
		return $this->dao->db->get_all('`webauth`.`administator`');
	}
	
	public function ismyuser($user,$pwd) {
		$result = $this->selectbyaccount($user);
		if($result == '0')
			return false;
		$row = $result;
		if($pwd == $row['password'])
			return true;
		return false;
	}
	
 }