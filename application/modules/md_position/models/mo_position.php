<?php
class mo_position extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fnpositionCount() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get(t_position)->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	
	function fnpositionData($ppositionKeyword,$pOffset,$pRows,$pSort,$pOrder) {
		
		$this->db->like(array("f_position_name"=>$ppositionKeyword));
		
		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
	
		$vResult = $this->db->get(t_position)->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
           
			$vArrayTemp['f_position_id'] = $vRow->f_position_id;		
           
			$vArrayTemp['f_position_name'] = $vRow->f_position_name;		
           
			$vArrayTemp['f_position_remark'] = $vRow->f_position_remark;		
           	
		array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	
	
	
	function fnCreateposition($pData) {
		$vData = array(
	
		   
           
			'f_position_name'=>$pData['vf_position_name'],					
           
			'f_position_remark'=>$pData['vf_position_remark'],					
           
		);
		$vResult = $this->db->insert('t_position',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnpositionDelete($pDelpositionId) {
		
		$vResult = $this->db->where('f_position_id',$pDelpositionId)->delete('t_position');
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnpositionRow($ppositionId) {
	
		$this->db->where('f_position_id',$ppositionId);
		
		$vResult = $this->db->get(t_position)->result();
		$vRow = $vResult[0];
           
			$vArrayTemp['f_position_id'] = $vRow->f_position_id;
           
			$vArrayTemp['f_position_name'] = $vRow->f_position_name;
           
			$vArrayTemp['f_position_remark'] = $vRow->f_position_remark;
           		
		
		echo json_encode($vArrayTemp);
		
	}	

	function fnUpdateposition($ppositionId,$pData) {
		$vData = array(
		
		   
           
			'f_position_name'=>$pData['vf_position_name'],					
           
			'f_position_remark'=>$pData['vf_position_remark'],					
           			
		);
	
		$vResult = $this->db->where('f_position_id',$ppositionId)->update('t_position',$vData);
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	function fnpositionComboData($pVarQuery) {
		$this->db->select('f_position_id,f_position_name');
		$vResult = $this->db->get('t_position')->result();
		$vpositionDataJson = array();
		foreach($vResult as $vRow):
			array_push($vpositionDataJson,$vRow);
		endforeach;
		echo json_encode($vpositionDataJson);
	}	
	
}
?>

