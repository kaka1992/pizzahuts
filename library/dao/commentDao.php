<?php
/**
 * DEMO
 * @author zhuli 
 */
 class commentDao extends Dao {
	 
 	public function insert($u_id,$p_id,$text) {
		$sql = sprintf("INSERT INTO `webauth`.`comment`(`createtime`,`u_id`,`p_id`,`text`)VALUES(NOW(),%s,%s,%s);", $u_id, $p_id, '"'.$text.'"');
		$result = $this->dao->db->query($sql);
	}
	
	public function selectbytypelimit($type,$pagenumber) {
		$typedao = InitPHP::getDao('type','');
		$result = $typedao->selectbyname($type);
		if($result == '0' ){
			$id='-1';
		}
		else{
			$typeid = $this->dao->db->fetch_assoc($result);
			$id = $typeid['id'];
		}
		$sql = sprintf('select * from `webauth`.`products` where `type` = %s limit %s,9;',$id,($pagenumber-1)*9);
		$result = $this->dao->db->query($sql);
		$i = 0;
		while ($row = $this->dao->db->fetch_assoc($result)) {
			$temp[] = $row;
			$i=$i+1;
		}
		return array($temp, $i);
	}
	
	public function selectfull($id) {
		$sql = sprintf('SELECT * FROM `webauth`.`comment` left join  `webauth`.`user` on `webauth`.`comment`.`u_id` = `webauth`.`user`.`id` where `webauth`.`comment`.`p_id`=%s order by `webauth`.`comment`.`createTime` DESC limit 8;',$id);
		$result = $this->dao->db->query($sql);
		$i = 0;
		while ($row = $this->dao->db->fetch_assoc($result)) {
			$temp[] = $row;
			$i=$i+1;
		}
		return array($temp, $i);
	}
	
	public function selectall() {
		return $this->dao->db->get_all('`webauth`.`comment`');
	}
	
	public function deletebypid($pid){
		$sql =sprintf('DELETE FROM `webauth`.`comment` WHERE `p_id`=%s;',$pid);
		$result = $this->dao->db->query($sql);
	}

 }