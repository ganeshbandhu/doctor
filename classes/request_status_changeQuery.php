<?php 
require_once ("classes/Query.php");
require_once ("classes/request_status_change.php");
class Request_status_changeQuery extends Query {
	var $_rowCount = 0;
	function Request_status_changeQuery () {
		$this->Query();
	}
	function getRowCount() {
		return $this->_rowCount;
	}
	function fetchRequest_status_change() {
		$array = $this->_conn->fetchRow();
		if ($array == false) {
			return false;
		}
		return $this->_mkObj($array);
	}
	function _mkObj($array) {
		$obj = new Request_status_change();
		$obj->setStatus_Change_id($array["Status_Change_id"]);
		$obj->setStatus_from($array["Status_from"]);
		$obj->setStatus_to($array["Status_to"]);
		$obj->setActor($array["Actor"]);
		return $obj;
	}
	function selectAll($last,$count) {
		$sql = $this->mkSQL("select * from request_status_change limit %N, %N",$last, $count);
		return array_map(array($this, '_mkObj'), $this->exec($sql));
	}
	function selectStatus_Change_id($Status_Change_id) {
		$sql = $this->mkSQL("select * from request_status_change where Status_Change_id  = %N",
				$Status_Change_id
			);
		$result= $this->exec($sql);
		$this->_rowCount = $this->_conn->numRows();
		return $this->_mkObj($result[0]);
	}
	function selectStatus_from($Status_from) {
		$sql = $this->mkSQL("select * from request_status_change where Status_from  = %Q",
				$Status_from
			);
		$result= $this->exec($sql);
		$this->_rowCount = $this->_conn->numRows();
		return $this->_mkObj($result[0]);
	}
	function selectStatus_to($Status_to) {
		$sql = $this->mkSQL("select * from request_status_change where Status_to  = %Q",
				$Status_to
			);
		$result= $this->exec($sql);
		$this->_rowCount = $this->_conn->numRows();
		return $this->_mkObj($result[0]);
	}
	function selectActor($Actor) {
		$sql = $this->mkSQL("select * from request_status_change where Actor  = %Q",
				$Actor
			);
		$result= $this->exec($sql);
		$this->_rowCount = $this->_conn->numRows();
		return $this->_mkObj($result[0]);
	}
	function insert($request_status_change) {
		$sql = $this->mkSQL("insert into request_status_change values (%N, %Q, %Q, %Q)",
				$request_status_change->getStatus_Change_id(),$request_status_change->getStatus_from(),$request_status_change->getStatus_to(),$request_status_change->getActor()
			);
		$ret = $this->_query($sql,"Insert failed on request_status_change table");
	}
	function updateStatus_Change_id($request_status_change) {
		$sql = $this->mkSQL("update request_status_change
				set Status_from = %Q, Status_to = %Q, Actor = %Q where Status_Change_id = %N ",
				$request_status_change->getStatus_from(),$request_status_change->getStatus_to(),$request_status_change->getActor(),$request_status_change->get(),$request_status_change->getStatus_Change_id()
			);
		$ret = $this->_query($sql,"Update using column Status_Change_id failed on request_status_change table");
	}
	function updateStatus_from($request_status_change) {
		$sql = $this->mkSQL("update request_status_change
				set Status_Change_id = %N, Status_to = %Q, Actor = %Q where Status_from = %Q ",
				$request_status_change->getStatus_Change_id(),$request_status_change->getStatus_to(),$request_status_change->getActor(),$request_status_change->get(),$request_status_change->getStatus_from()
			);
		$ret = $this->_query($sql,"Update using column Status_from failed on request_status_change table");
	}
	function updateStatus_to($request_status_change) {
		$sql = $this->mkSQL("update request_status_change
				set Status_Change_id = %N, Status_from = %Q, Actor = %Q where Status_to = %Q ",
				$request_status_change->getStatus_Change_id(),$request_status_change->getStatus_from(),$request_status_change->getActor(),$request_status_change->get(),$request_status_change->getStatus_to()
			);
		$ret = $this->_query($sql,"Update using column Status_to failed on request_status_change table");
	}
	function updateActor($request_status_change) {
		$sql = $this->mkSQL("update request_status_change
				set Status_Change_id = %N, Status_from = %Q, Status_to = %Q where Actor = %Q ",
				$request_status_change->getStatus_Change_id(),$request_status_change->getStatus_from(),$request_status_change->getStatus_to(),$request_status_change->get(),$request_status_change->getActor()
			);
		$ret = $this->_query($sql,"Update using column Actor failed on request_status_change table");
	}
	function deleteStatus_Change_id($request_status_change) {
		$sql = $this->mkSQL("delete from request_status_change where Status_Change_id = %Q ",
				$request_status_change->getStatus_Change_id()
			);
		$ret = $this->_query($sql,"Delete using column Status_Change_id failed on request_status_change table");
	}
	function deleteStatus_from($request_status_change) {
		$sql = $this->mkSQL("delete from request_status_change where Status_from = %Q ",
				$request_status_change->getStatus_from()
			);
		$ret = $this->_query($sql,"Delete using column Status_from failed on request_status_change table");
	}
	function deleteStatus_to($request_status_change) {
		$sql = $this->mkSQL("delete from request_status_change where Status_to = %Q ",
				$request_status_change->getStatus_to()
			);
		$ret = $this->_query($sql,"Delete using column Status_to failed on request_status_change table");
	}
	function deleteActor($request_status_change) {
		$sql = $this->mkSQL("delete from request_status_change where Actor = %Q ",
				$request_status_change->getActor()
			);
		$ret = $this->_query($sql,"Delete using column Actor failed on request_status_change table");
	}
}
?>
