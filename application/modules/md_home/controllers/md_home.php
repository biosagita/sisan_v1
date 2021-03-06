<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class md_home extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('mo_home');
	}
	function index() {
		$vLoginStatus=$this->session->userdata('sStatus');
		if($vLoginStatus==FALSE) {
			// Kondisi Belum Login
			$this->BelumLogin();
		} else {
			// Kondisi Telah Login
			$this->TelahLogin();
		}
	}
	function BelumLogin() {
		$this->load->view('vw_home_log');
	}
	
	function TelahLogin() {
		$vLogin['cLoginId']=$this->session->userdata('sId');
		$vLogin['cLoginName']=$this->session->userdata('sName');
		$vLogin['cLoginPassword']=$this->session->userdata('sPassword');
		$vLogin['cLoginSegment']=$this->session->userdata('sSegments');
		$vLogin['cLoginRoles']=$this->session->userdata('sRoles');
		$vLogin['cLoginStatus']=$this->session->userdata('sStatus');
		$vLoginRole=$this->session->userdata('sRoles');
		$vData['cHasil']=$this->mo_home->getModules($vLoginRole);
		$vData['layanan']=$this->mo_home->getlayanan();
		$vData['defaultforward']=$this->mo_home->getdefaultforward();
		$this->load->view('vw_home_1');
		$this->load->view('vw_home_2');
		// Choose one of 2 item below this, the old one's or the new one's?
		// $this->load->view('oldwestview');
		if ($this->session->userdata('sRoleCode')=='Counter'){ 
		$this->load->view('vw_counter');		
		$this->load->view('vw_home_3_menu_counter',$vData);		
		
		}
		else{
		$this->load->view('vw_home_4',$vLogin);		
		$this->load->view('vw_home_3',$vData);		
		}
		
		$this->load->view('vw_home_5');
	}
	function ProsesLogin() {
		$dataloket = $this->mo_home->getnamaloket();

	if (strpos($this->input->post('txtUsername'),'admin') !== false) {
    $admin='1';
	}
	else {
    $admin='0';		
		}

		if(($this->input->post('id_loket') =='') && ( $this->input->post('counter') =='')){
			$this->ProsesLogout();
		}
					
		if(($this->input->post('id_loket') !='') && ( $this->input->post('counter') =='1') && ($admin == 0)){
		// Proses Login
		$vPostLoginName=$this->input->post('txtUsername');
		$vPostLoginPass=$this->input->post('txtPassword');
		$vAuth1=$this->mo_home->Auth1($vPostLoginName,$vPostLoginPass,$this->input->post('id_loket'));
		if($vAuth1) {
			$vSessId = $vAuth1->logId;
			$vSessName = $vAuth1->logName;
			$vSessPass = $vAuth1->logPass;
			$vSessEmpId = $vAuth1->EmpId;			
			$vSessEmpName = $vAuth1->EmpName;
			$vSessBranchId = $vAuth1->BranchId;			
			$vBranchStatus = $vAuth1->BranchStatus;
			$vRoleDataLimit = $vAuth1->RoleDatalimit;
			$vRoleCategory = $vAuth1->RoleCategory;
			$vSessBranchCode = $vAuth1->BranchCode;			
			$vIdGroupLayanan = $vAuth1->id_group_layanan;			
			$vLoket = $this->input->post('id_loket');
			$vNamaLoket = !empty($dataloket[$vLoket]) ? $dataloket[$vLoket] : '-';			
			$vRoleCode = $vAuth1->f_role_code;			
			$vStatusRegVisitor = 	$vAuth1->status_reg;		
			$vAuth2 = $this->mo_home->Auth2($vSessId);
			$vSessSegments = implode(",",$vAuth2);
			
			$vAuth3 = $this->mo_home->Auth3($vSessId);
			$vSessRoles = implode(",",$vAuth3);
			$vSessStatus = TRUE;
			$vLoginArray=array('sId'=>$vSessId,'sName'=>$vSessName,'sPassword'=>$vSessPass,'sEmpId'=>$vSessEmpId,'sEmpName'=>$vSessEmpName,'sBranchId'=>$vSessBranchId,'sBranchCode'=>$vSessBranchCode,'sSegments'=>$vSessSegments,'sRoles'=>$vSessRoles,'sStatus'=>$vSessStatus,'sBranchStatus'=>$vBranchStatus,'sRoleDataLimit'=>$vRoleDataLimit,'sRoleCategory'=>$vRoleCategory,'sIdGroupLayanan'=>$vIdGroupLayanan,'sIdLoket'=>$vLoket,'sNamaLoket'=>$vNamaLoket,'sRoleCode'=>$vRoleCode,'sRegVisitor'=>$vStatusRegVisitor);
			$this->session->set_userdata($vLoginArray);
			redirect(base_url(),'refresh');
		} else {
			$this->ProsesLogout();
		}
		}
		
		if(($this->input->post('id_loket') =='') && ( $this->input->post('counter') =='0') && ($admin == 1)){
		// Proses Login
		$vPostLoginName=$this->input->post('txtUsername');
		$vPostLoginPass=$this->input->post('txtPassword');
		$vAuth1=$this->mo_home->Auth1($vPostLoginName,$vPostLoginPass);
		if($vAuth1) {
			$vSessId = $vAuth1->logId;
			$vSessName = $vAuth1->logName;
			$vSessPass = $vAuth1->logPass;
			$vSessEmpId = $vAuth1->EmpId;			
			$vSessEmpName = $vAuth1->EmpName;
			$vSessBranchId = $vAuth1->BranchId;			
			$vBranchStatus = $vAuth1->BranchStatus;
			$vRoleDataLimit = $vAuth1->RoleDatalimit;
			$vRoleCategory = $vAuth1->RoleCategory;
			$vSessBranchCode = $vAuth1->BranchCode;			
			$vIdGroupLayanan = $vAuth1->id_group_layanan;			
			$vLoket = $this->input->post('id_loket');			
			$vNamaLoket = !empty($dataloket[$vLoket]) ? $dataloket[$vLoket] : '-';
			$vRoleCode = $vAuth1->f_role_code;			
			$vStatusRegVisitor = 	$vAuth1->status_reg;		
			$vAuth2 = $this->mo_home->Auth2($vSessId);
			$vSessSegments = implode(",",$vAuth2);
			
			$vAuth3 = $this->mo_home->Auth3($vSessId);
			$vSessRoles = implode(",",$vAuth3);
			$vSessStatus = TRUE;
			$vLoginArray=array('sId'=>$vSessId,'sName'=>$vSessName,'sPassword'=>$vSessPass,'sEmpId'=>$vSessEmpId,'sEmpName'=>$vSessEmpName,'sBranchId'=>$vSessBranchId,'sBranchCode'=>$vSessBranchCode,'sSegments'=>$vSessSegments,'sRoles'=>$vSessRoles,'sStatus'=>$vSessStatus,'sBranchStatus'=>$vBranchStatus,'sRoleDataLimit'=>$vRoleDataLimit,'sRoleCategory'=>$vRoleCategory,'sIdGroupLayanan'=>$vIdGroupLayanan,'sIdLoket'=>$vLoket,'sNamaLoket'=>$vNamaLoket,'sRoleCode'=>$vRoleCode,'sRegVisitor'=>$vStatusRegVisitor);
			$this->session->set_userdata($vLoginArray);
			redirect(base_url(),'refresh');
		} else {
			$this->ProsesLogout();
		}
		}
		
		else{
			$this->ProsesLogout();			
			}
	}
	/*
	function ProsesLogin() {
		// Proses Login
		$vPostLoginName=$this->input->post('txtUsername');
		$vPostLoginPass=$this->input->post('txtPassword');
		$vArrayAuthId=$this->mo_home->LoginAuth1($vPostLoginName,$vPostLoginPass);
		$vAuthId=$vArrayAuthId->f_user_id;
		$_SESSION['userNm']  	= $vArrayAuthId->f_user_login; 
		$_SESSION['Group_Code'] = $vArrayAuthId->f_user_type_code;    
		$_SESSION['password'] 	= $vArrayAuthId->f_user_password; 
		if($vAuthId) {
			$vArrayAuthAs=$this->mo_home->LoginAuth2($vAuthId);
			$vAuthAs=$vArrayAuthAs->f_role_id;
			$vLoginArray=array('sId'=>$vAuthId,'sName'=>$vPostLoginName,'sAs'=>$vAuthAs,'sStatus'=>TRUE);
			$this->session->set_userdata($vLoginArray);
			redirect(base_url(),'refresh');
		} else {
			$this->ProsesLogout();
		}
	}
	*/



	function ProsesLogout() {
		
		$this->mo_home->log_logout($this->session->userdata('sId'));

		// Proses Logout
		$this->session->unset_userdata();
		$this->session->sess_destroy();
		redirect(base_url(),'refresh');
	}

	function do_insert_addtype() {
		$status = array(
			'err_msg' => '',
			'adty_id' => '',
			'res' => array(),
			'detail' => $_POST,
		);

		$data_insert = array(
			'adty_trans_id' => $_POST['adty_trans_id'],
			'adty_type_id' => $_POST['adty_type_id'],
			'adty_type_info' => $_POST['adty_type_info'],
			'adty_note' => $_POST['adty_note'],
			'adty_entrydate' => date('Y-m-d H:i:s'),
		);

		$status['res'] = $this->db->insert('additional_type', $data_insert);
		$status['adty_id'] = $this->db->insert_id();

		echo json_encode($status);
	}

	function do_delete_addtype() {
		$status = array(
			'err_msg' => '',
			'res' => array(),
		);

		if(empty($_POST['adty_id'])){
			$status['err_msg'] = 'id is empty';
			echo json_encode($status);
			exit();
		}

		$status['res'] = $this->db->where('adty_id = "'.$_POST['adty_id'].'"')->delete('additional_type');

		echo json_encode($status);
	}

	function do_select_addtype() {
		$status = array(
			'err_msg' => '',
			'res' => array(),
			'detail' => array(),
		);

		if(!isset($_POST['adty_trans_id'])){
			$status['err_msg'] = 'transaction id is empty';
			echo json_encode($status);
			exit();
		}

		$status['res'] = $this->db->where('adty_trans_id = "'.$_POST['adty_trans_id'].'"')->get('additional_type')->result_array();
		foreach ($status['res'] as $key => $val) {
			$status['detail'][$key] = $val;
		}

		echo json_encode($status);
	}

	function do_calc_estimation() {
		$status = array(
			'err_msg' => '',
			'estimation' => 0,
		);

		$Loket= $this->session->userdata('sIdLoket');
		$currentDate=date('Ymd');

		$q = 'SELECT pl.id_group_layanan, pl.id_group_loket FROM loket lo JOIN prioritas_layanan pl ON (lo.id_group_loket = pl.id_group_loket) WHERE lo.id_loket = ' . $Loket;
		$query = $this->db->query($q);
		$listlayanan = array();
		$grouploket = '';
		foreach ($query->result() as $vRow)
		{
		   $listlayanan[] = $vRow->id_group_layanan;
		   $grouploket = $vRow->id_group_loket;
		}

		$q = 'SELECT SUM(lyn.estimasi) as total_estimasi FROM transaksi tr JOIN layanan lyn ON (tr.id_layanan=lyn.id_layanan) JOIN group_layanan gl ON (tr.id_group_layanan = gl.id_group_layanan) JOIN prioritas_layanan pl ON (tr.id_group_layanan = pl.id_group_layanan) WHERE pl.id_group_loket = ('.$grouploket.') AND tr.id_group_layanan IN ('.join(',', $listlayanan).') AND tr.status_transaksi = 0 AND tr.tanggal_transaksi = "'.$currentDate.'" GROUP BY tr.tanggal_transaksi';
		$query = $this->db->query($q);

		foreach ($query->result() as $vRow)
		{
			$status['estimation'] = $vRow->total_estimasi;
		}

		echo json_encode($status);
	}
}