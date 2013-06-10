<?php
/**
 * DEMO
 * @author zhuli 
 */
 class ordersDao extends Dao {
	 
 	public function insert($u_id,$address,$telephone,$totalprice,$totalcount,$text,$branch) {
		$sql = sprintf("select id from orders order by id desc");
		$tr = $this->dao->db->query($sql);
		$result = $this->dao->db->fetch_assoc($tr);
		$id = $result["id"] + 1;
		$sql = "INSERT INTO `webauth`.`orders` (`id`, `createtime`, `u_id`, `address`, `telephone`, `totalprice`, `totalcount`, `arrivetime`, `text`, `totaltime`, `branch_id`, `statuse`) VALUES ('".$id."', '".date("Y-m-d H:i:s")."', '".$u_id."', '".$address."', '".$telephone."', '".$totalprice."', '".$totalcount."', '".date("Y-m-d H:i:s")."', '".$text."', '00:00:00', '".$branch."', '0');";
		$result = $this->dao->db->query($sql);
		return $id;
	}
	
	public function selectbyid($id) {
		$sql = sprintf('select * from `webauth`.`orders` join `webauth`.`user` on `webauth`.`orders`.`u_id`=`webauth`.`user`.`id` where `webauth`.`orders`.`id` = %s;',$id);
		$tr = $this->dao->db->query($sql);
		if($this->dao->db->num_rows($tr) == 0){
			return '0';
		}
		return $this->dao->db->fetch_assoc($tr);
	}
	
	public function selectbyoppid($id) {
		$sql = sprintf('select * from `webauth`.`orderpacpro` where `webauth`.`orderpacpro`.`opid` = %s;',$id);
		$tr = $this->dao->db->query($sql);
		$i = 0;
		while ($row = $this->dao->db->fetch_assoc($tr)) {
			$temp[] = $row;
			$i=$i+1;
		}
		return array($temp, $i);
	}
	
	public function selectbyu_id($u_id) {
		$sql = sprintf('select * from `webauth`.`orders` where `u_id` = %s;',$u_id);
		$result = $this->dao->db->query($sql);
		$i = 0;
		while ($row = $this->dao->db->fetch_assoc($result)) {
			$temp[] = $row;
			$i=$i+1;
		}
		return array($temp, $i);
	}
	
	public function selectall() {
		return $this->dao->db->get_all('`webauth`.`orders`',200);
	}
	
	public function updatebyid($id,$change) {
		$this->dao->db->update($id, $change, '`webauth`.`orders`','id');
	}
	
 }