<?php 
require_once ("classes/Query.php");
require_once ("classes/qualification.php");
class QualificationQuery extends Query {
	var $_rowCount = 0;
	function QualificationQuery () {
		$this->Query();
	}
	function getRowCount() {
		return $this->_rowCount;
	}
	function fetchQualification() {
		$array = $this->_conn->fetchRow();
		if ($array == false) {
			return false;
		}
		return $this->_mkObj($array);
	}
	function _mkObj($array) {
		$obj = new Qualification();
		$obj->setQualification_id($array["qualification_id"]);
		$obj->setDoctor_id($array["doctor_id"]);
		$obj->setDegree($array["degree"]);
		$obj->setYear($array["year"]);
		$obj->setUniversity($array["university"]);
		return $obj;
	}
	function selectAll($last,$count) {
		$sql = $this->mkSQL("select * from qualification limit %N, %N",$last, $count);
		if (!$this->_query($sql, "Error in selecting from table qualification")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectQualification_id($qualification_id) {
		$sql = $this->mkSQL("select * from qualification where qualification_id  = %N",
				$qualification_id
			);
		if (!$this->_query($sql, "Error in selecting from table qualification")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectDoctor_id($doctor_id) {
		$sql = $this->mkSQL("select * from qualification where doctor_id  = %N",
				$doctor_id
			);
		if (!$this->_query($sql, "Error in selecting from table qualification")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectDegree($degree) {
		$sql = $this->mkSQL("select * from qualification where degree  = %Q",
				$degree
			);
		if (!$this->_query($sql, "Error in selecting from table qualification")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectYear($year) {
		$sql = $this->mkSQL("select * from qualification where year  = %N",
				$year
			);
		if (!$this->_query($sql, "Error in selecting from table qualification")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function selectUniversity($university) {
		$sql = $this->mkSQL("select * from qualification where university  = %Q",
				$university
			);
		if (!$this->_query($sql, "Error in selecting from table qualification")) {
			 return false;
		}
		$this->_rowCount = $this->_conn->numRows();
		return true;
	}
	function insert($qualification) {
		$sql = $this->mkSQL("insert into qualification values (%N, %N, %Q, %N, %Q)",
				$qualification->getQualification_id(),$qualification->getDoctor_id(),$qualification->getDegree(),$qualification->getYear(),$qualification->getUniversity()
			);
		$ret = $this->_query($sql,"Insert failed on qualification table");
	}
	function updateQualification_id($qualification) {
		$sql = $this->mkSQL("update qualification
				set doctor_id = %N, degree = %Q, year = %N, university = %Q where qualification_id = %N ",
				$qualification->getDoctor_id(),$qualification->getDegree(),$qualification->getYear(),$qualification->getUniversity(),$qualification->get(),$qualification->getQualification_id()
			);
		$ret = $this->_query($sql,"Update using column qualification_id failed on qualification table");
	}
	function updateDoctor_id($qualification) {
		$sql = $this->mkSQL("update qualification
				set qualification_id = %N, degree = %Q, year = %N, university = %Q where doctor_id = %N ",
				$qualification->getQualification_id(),$qualification->getDegree(),$qualification->getYear(),$qualification->getUniversity(),$qualification->get(),$qualification->getDoctor_id()
			);
		$ret = $this->_query($sql,"Update using column doctor_id failed on qualification table");
	}
	function updateDegree($qualification) {
		$sql = $this->mkSQL("update qualification
				set qualification_id = %N, doctor_id = %N, year = %N, university = %Q where degree = %Q ",
				$qualification->getQualification_id(),$qualification->getDoctor_id(),$qualification->getYear(),$qualification->getUniversity(),$qualification->get(),$qualification->getDegree()
			);
		$ret = $this->_query($sql,"Update using column degree failed on qualification table");
	}
	function updateYear($qualification) {
		$sql = $this->mkSQL("update qualification
				set qualification_id = %N, doctor_id = %N, degree = %Q, university = %Q where year = %N ",
				$qualification->getQualification_id(),$qualification->getDoctor_id(),$qualification->getDegree(),$qualification->getUniversity(),$qualification->get(),$qualification->getYear()
			);
		$ret = $this->_query($sql,"Update using column year failed on qualification table");
	}
	function updateUniversity($qualification) {
		$sql = $this->mkSQL("update qualification
				set qualification_id = %N, doctor_id = %N, degree = %Q, year = %N where university = %Q ",
				$qualification->getQualification_id(),$qualification->getDoctor_id(),$qualification->getDegree(),$qualification->getYear(),$qualification->get(),$qualification->getUniversity()
			);
		$ret = $this->_query($sql,"Update using column university failed on qualification table");
	}
	function deleteQualification_id($qualification) {
		$sql = $this->mkSQL("delete from qualification where qualification_id = %Q ",
				$qualification->getQualification_id()
			);
		$ret = $this->_query($sql,"Delete using column qualification_id failed on qualification table");
	}
	function deleteDoctor_id($qualification) {
		$sql = $this->mkSQL("delete from qualification where doctor_id = %Q ",
				$qualification->getDoctor_id()
			);
		$ret = $this->_query($sql,"Delete using column doctor_id failed on qualification table");
	}
	function deleteDegree($qualification) {
		$sql = $this->mkSQL("delete from qualification where degree = %Q ",
				$qualification->getDegree()
			);
		$ret = $this->_query($sql,"Delete using column degree failed on qualification table");
	}
	function deleteYear($qualification) {
		$sql = $this->mkSQL("delete from qualification where year = %Q ",
				$qualification->getYear()
			);
		$ret = $this->_query($sql,"Delete using column year failed on qualification table");
	}
	function deleteUniversity($qualification) {
		$sql = $this->mkSQL("delete from qualification where university = %Q ",
				$qualification->getUniversity()
			);
		$ret = $this->_query($sql,"Delete using column university failed on qualification table");
	}
}
?>