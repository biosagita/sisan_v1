<?php
class mo_com extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fncomCount() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get(t_com)->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	
	function fncomData($pcomKeyword,$pOffset,$pRows,$pSort,$pOrder) {
		
		$this->db->like(array("f_com_id"=>$pcomKeyword));
		
		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
	
		$vResult = $this->db->get(t_com)->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
           
			$vArrayTemp['f_com_id'] = $vRow->f_com_id;		
           
			$vArrayTemp['f_com'] = $vRow->f_com;		
           
			$vArrayTemp['f_baudrate'] = $vRow->f_baudrate;		
           
			$vArrayTemp['f_com_status'] = $vRow->f_com_status;		
           
			$vArrayTemp['f_remark'] = $vRow->f_remark;		
           	
		array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	
	
	
	function fnCreatecom($pData) {
		$vData = array(
	
           
			'f_com'=>$pData['vf_com'],					
           
			'f_baudrate'=>$pData['vf_baudrate'],					
           
			'f_com_status'=>$pData['vf_com_status'],					
           
			'f_remark'=>$pData['vf_remark'],					
           
		);
		$vResult = $this->db->insert('t_com',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fncomDelete($pDelcomId) {
		
		$vResult = $this->db->where('f_com_id',$pDelcomId)->delete('t_com');
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fncomRow($pcomId) {
	
		$this->db->where('f_com_id',$pcomId);
		
		$vResult = $this->db->get(t_com)->result();
		$vRow = $vResult[0];
           
			$vArrayTemp['f_com_id'] = $vRow->f_com_id;
           
			$vArrayTemp['f_com'] = $vRow->f_com;
           
			$vArrayTemp['f_baudrate'] = $vRow->f_baudrate;
           
			$vArrayTemp['f_com_status'] = $vRow->f_com_status;
           
			$vArrayTemp['f_remark'] = $vRow->f_remark;
           		
		
		echo json_encode($vArrayTemp);
		
	}	

	function fnUpdatecom($pcomId,$pData) {
		$vData = array(
           
			'f_com'=>$pData['vf_com'],					
           
			'f_baudrate'=>$pData['vf_baudrate'],					
           
			'f_com_status'=>$pData['vf_com_status'],					
           
			'f_remark'=>$pData['vf_remark'],					
           			
		);
	
		$vResult = $this->db->where('f_com_id',$pcomId)->update('t_com',$vData);
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	function fncomComboData($pVarQuery) {
		$this->db->select('f_com_id,f_com');
		$vResult = $this->db->get('t_com')->result();
		$vcomDataJson = array();
		foreach($vResult as $vRow):
			array_push($vcomDataJson,$vRow);
		endforeach;
		echo json_encode($vcomDataJson);
	}
	
}
?>

