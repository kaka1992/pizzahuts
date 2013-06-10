<?php
/**
 * DEMO
 * @author zhuli 
 */
 class productsDao extends Dao {
	 
 	public function insert($name,$type,$pic_url,$discount,$description,$price,$comments='"None"') {
		$sql = sprintf("INSERT INTO `webauth`.`products`(`name`,`type`,`createdate`,`lastdate`,`pic_url`,`discount`,`score`,`comments`,`scorepeople`,`description`,`price`)VALUES(%s,%s,NOW(),NOW(),%s,%s,0,%s,0,%s,%s);", '"'.$name.'"', $type, '"'.$pic_url.'"', $discount, $comments,'"'.$description.'"',$price);

		$result = $this->dao->db->query($sql);
	}
	
	public function selectbyid($id) {
		$sql = sprintf('select * from `webauth`.`products` where `id` = %s;',$id);
		$result = $this->dao->db->query($sql);
		return $this->dao->db->fetch_assoc($result);
	}
	
	public function selectfull() {
		$sql = sprintf('select * from `webauth`.`products` order by score DESC limit 9;');
		$result = $this->dao->db->query($sql);
		return $result;
	}
	
	public function selectbytypenum($type) {
		$typedao = InitPHP::getDao('type','');
		$result = $typedao->selectbyname($type);
		if($result == '0' ){
			$id='-1';
		}
		else{
			$typeid = $this->dao->db->fetch_assoc($result);
			$id = $typeid['id'];
		}
		$sql = sprintf('select * from `webauth`.`products` where `type` = %s;',$id);
		$result = $this->dao->db->query($sql);
		$i = 0;
		while ($row = $this->dao->db->fetch_assoc($result)) {
			$i=$i+1;
		}
		return $i;
	}
	
	public function selectbytypelimit($type,$pagenumber,$sort) {
		$typedao = InitPHP::getDao('type','');
		$result = $typedao->selectbyname($type);
		if($result == '0' ){
			$id='-1';
		}
		else{
			$typeid = $this->dao->db->fetch_assoc($result);
			$id = $typeid['id'];
		}
		$sql = sprintf('select * from `webauth`.`products` where `type` = %s  order by `%s` desc  limit %s,9;',$id,$sort,($pagenumber-1)*9);
		$result = $this->dao->db->query($sql);
		$i = 0;
		while ($row = $this->dao->db->fetch_assoc($result)) {
			$temp[] = $row;
			$i=$i+1;
		}
		return array($temp, $i);
	}
	
	public function selectall($sort) {
		return $this->dao->db->get_all('`webauth`.`products`',200,0,array(),$sort);
	}
	
	public function deletebyid($id) {
		$this->dao->db->delete($id, '`webauth`.`products`', 'id');
	}
	
	public function updatebyid($id,$change) {
		$this->dao->db->update($id, $change, '`webauth`.`products`','id');
	}
	
 }