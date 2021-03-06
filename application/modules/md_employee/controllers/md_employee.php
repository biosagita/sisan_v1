<?php
class md_employee extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_employee');
		$this->load->model('md_Status/mo_Status');		
	
		
	}
	function index() {
		$this->fnemployee();
	}
	function fnemployee()	{
		$this->load->view('vw_employee');
	}
	// ======================================== 'Datagrid User Section'
	function fnemployeeData() {
	
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');		
		//$vemployeeKeyword=$this->input->post('#search')	;	
		$vcityKeyword=$this->input->post('cityKeyword');
		$vkecKeyword=$this->input->post('kecKeyword');
		$vEmpId=$this->input->post('empIdKeyword');
		$vstatusKeyword=$this->input->post('statusKeyword');
		$vSort=$this->input->post('sort');
		$vOrder=$this->input->post('order');
		if(!$vPage) {
			$vPage=1;
		}
		if(!$vRows) {
			$vRows=20;
		}
		if(!$vcustomerKeyword) {
			$vcustomerKeyword='';
		}
		if(!$vSort) {
		
		$vSort='f_emp_id';
		
		}
		if(!$vOrder) {
			$vOrder='DESC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->mo_employee->fnemployeeCount($vcityKeyword,$vkecKeyword,$vstatusKeyword,$vEmpId);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_employee->fnemployeeData($vcityKeyword,$vkecKeyword,$vstatusKeyword,$vEmpId,$vOffset,$vRows,$vSort,$vOrder);		
		echo json_encode($vResult);
	}	
	function fnemployeeProfileData($pemployeeId) {
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');		
		//$vemployeeKeyword=$this->input->post('#search')	;	

		
		$vSort=$this->input->post('sort');
		$vOrder=$this->input->post('order');
		if(!$vPage) {
			$vPage=1;
		}
		if(!$vRows) {
			$vRows=1;
		}
		if(!$vcustomerKeyword) {
			$vcustomerKeyword='';
		}
		if(!$vSort) {
		
		$vSort='f_emp_id';
		
		}
		if(!$vOrder) {
			$vOrder='Asc';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->mo_employee->fnemployeeCount($vempCompBranchKeyword,$vstatusKeyword,$vempSegmentKeyword,$vempPositionKeyword,$vempGroupAttKeyword,$vEmpId);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_employee->fnemployeeProfileData($pemployeeId,$vOffset,$vRows,$vSort,$vOrder);		
		echo json_encode($vResult);
	}	
	function fnemployeeDataFilter($pCompBranchCode,$pStatusCode) {
		$vResult=array();
		$vResult["rows"]=$this->mo_employee->fnemployeeDataFilter($pCompBranchCode,$pStatusCode);
		echo json_encode($vResult);
	}		
	function fnemployeeAdd() {
		$this->load->view('employee_add_main');
	}

	function fnemployee_educationsAdd($pemployeeId) {
		$vData['vemployeeId'] = $pemployeeId;
		$this->load->view('employee_educations_add_main',$vData);
	}	
	function fnemployee_familyAdd($pemployeeId) {
		$vData['vemployeeId'] = $pemployeeId;
		$this->load->view('employee_family_add_main',$vData);
	}	
	function fnemployee_coursesAdd($pemployeeId) {
		$vData['vemployeeId'] = $pemployeeId;
		$this->load->view('employee_courses_add_main',$vData);
	}			
	function fnemployee_experienceAdd($pemployeeId) {
		$vData['vemployeeId'] = $pemployeeId;
		$this->load->view('employee_experience_add_main',$vData);
	}			
	
	function fnemployeeImport() {
		$this->load->view('employee_import_main');
	}
		
	
	function fnemployeeCreate() {
		$vData = array(
         		
			'vf_emp_id'=>$this->input->post('f_emp_id'),
       		
			'vf_emp_code'=>$this->input->post('f_emp_code'),
 
			'vf_emp_initial'=>$this->input->post('f_emp_initial'),
  
			'vf_emp_name'=>$this->input->post('f_emp_name'),
       		
			'vf_emp_gender'=>$this->input->post('f_emp_gender'),

			'vf_emp_birthplace'=>$this->input->post('f_emp_birthplace'),
       		
			'vf_emp_birthdate'=>$this->input->post('f_emp_birthdate'),
       		
			'vf_emp_address1'=>$this->input->post('f_emp_address1'),
       		
			'vf_emp_rt'=>$this->input->post('f_emp_rt'),
       		
			'vf_emp_rw'=>$this->input->post('f_emp_rw'),
       		
			'vf_city_id'=>$this->input->post('f_city_id'),

			'vf_kec_id'=>$this->input->post('f_kec_id'),
       		       		
			'vf_emp_home_phone'=>$this->input->post('f_emp_home_phone'),
       		
			'vf_emp_mobile_phone'=>$this->input->post('f_emp_mobile_phone'),
       		
			'vf_emp_pin_bb'=>$this->input->post('f_emp_pin_bb'),
       		
			'vf_emp_email'=>$this->input->post('f_emp_email'),
       		
			'vf_comp_branch_id'=>$this->input->post('f_comp_branch_id'),

			'vf_dept_id'=>$this->input->post('f_dept_id'),
       		
			'vf_status_id'=>$this->input->post('f_status_id'),

			'vf_emp_organisation'=>$this->input->post('f_emp_organisation'),
       		
		);
		
		
	$this->mo_employee->fnCreateemployee($vData);
	}
	function fnemployeeEdit($pemployeeId) {
		$vData['vemployeeId'] = $pemployeeId;
		$this->load->view('employee_add_main',$vData);
	}
	function fnemployee_educationsEdit($vemployee_educationsId	) {
		$vData['vemployee_educationsId'] = $vemployee_educationsId	;
		$this->load->view('employee_educations_add_main',$vData);
	}
	function fnemployee_familyEdit($vemployee_familyId	) {
		$vData['vemployee_familyId'] = $vemployee_familyId	;
		$this->load->view('employee_family_add_main',$vData);
	}
	function fnemployee_coursesEdit($vemployee_coursesId	) {
		$vData['vemployee_coursesId'] = $vemployee_coursesId	;
		$this->load->view('employee_courses_add_main',$vData);
	}		
	function fnemployee_experienceEdit($vemployee_experienceId	) {
		$vData['vemployee_experienceId'] = $vemployee_experienceId	;
		$this->load->view('employee_experience_add_main',$vData);
	}		

	function fnemployeeRow($pemployeeId) {
		$this->mo_employee->fnemployeeRow($pemployeeId);
	}
	
	function fnemployeeDelete() {
		$vDelemployeeId = intval($_POST['Id']);
		$this->mo_employee->fnemployeeDelete($vDelemployeeId);
	}
	
	function fnemployeeUpdate($pemployeeId) {
		$vData = array(
		
         		
       		
			'vf_emp_code'=>$this->input->post('f_emp_code'),
 
			'vf_emp_initial'=>$this->input->post('f_emp_initial'),
  
			'vf_emp_name'=>$this->input->post('f_emp_name'),
       		
			'vf_emp_gender'=>$this->input->post('f_emp_gender'),

			'vf_emp_birthplace'=>$this->input->post('f_emp_birthplace'),
       		
			'vf_emp_birthdate'=>$this->input->post('f_emp_birthdate'),
       		
			'vf_emp_address1'=>$this->input->post('f_emp_address1'),
       		
			'vf_emp_rt'=>$this->input->post('f_emp_rt'),
       		
			'vf_emp_rw'=>$this->input->post('f_emp_rw'),
       		
			'vf_city_id'=>$this->input->post('f_city_id'),

			'vf_kec_id'=>$this->input->post('f_kec_id'),
       		       		
			'vf_emp_home_phone'=>$this->input->post('f_emp_home_phone'),
       		
			'vf_emp_mobile_phone'=>$this->input->post('f_emp_mobile_phone'),
       		
			'vf_emp_pin_bb'=>$this->input->post('f_emp_pin_bb'),
       		
			'vf_emp_email'=>$this->input->post('f_emp_email'),
       		
			'vf_comp_branch_id'=>$this->input->post('f_comp_branch_id'),

			'vf_dept_id'=>$this->input->post('f_dept_id'),
       		
			'vf_status_id'=>$this->input->post('f_status_id'),

			'vf_emp_organisation'=>$this->input->post('f_emp_organisation'),

		);
		$this->mo_employee->fnUpdateemployee($pemployeeId,$vData);
	}
	

	function fnemployeeImportProcess() {	
				
		$this->mo_employee->fnemployeeImportProcess();
	}
	function fnemployeeUpload($pemployeeId) {
		$vData['vemployeeId'] = $pemployeeId;	
		$this->load->view('employee_upload_main',$vData);
	}
	function fnemployee_attachment_file_Upload($pemployeeId) {
		$vData['vemployeeId'] = $pemployeeId;	
		$this->load->view('employee_attachment_file_upload_main',$vData);
	}
	
	function fnemployeeUploadProcess($pemployeeId) {
		$cvar_basedir = 'public/upload/photo/'.$pemployeeId;		
		mkdir($cvar_basedir,'0777');			
		chmod($cvar_basedir,0777);			
		
		$cvar_filename = str_replace(array(' ',"_"),'-',$_FILES['f_file']['name']);
		$cvar_config_upload['upload_path'] = './'.$cvar_basedir; // <=== harus ada
		$cvar_config_upload['allowed_types'] = 'gif|jpg|tiff|png'; // <=== harus ada
		$cvar_config_upload['max_size']	= '7168'; // <=== max upload size = 7MB
		$this->load->library('upload',$cvar_config_upload);
		
		if($this->upload->do_upload('f_file')) {
			$vdatas = array(
				'vf_emp_photo'=>$cvar_filename,				
			);		
		$this->mo_employee->fnemployeeUploadProcess($pemployeeId,$vdatas);
		} else {
			echo json_encode(array('msg'=>$this->upload->display_errors('','')));
		}

		
	}

	function cfn_download_polfile($cpar_fileurl,$cpar_filename) {
		$cvar_fileurl = base_url().str_replace('_','/',$cpar_fileurl);
		$cpar_file = file_get_contents($cvar_fileurl);
		force_download($cpar_filename,$cpar_file);
	}
	function fnemployeeComboData() {
		$vVarQuery = $this->input->post('q');
		if(!$vVarQuery) {
			$vVarQuery='';
		}
		$this->mo_employee->fnemployeeComboData($vVarQuery);
	}	
	
//===========Print Report================================================

	function fnEmployeeAbsenDataPrint($vcityKeyword,$vkecKeyword,$vstatusKeyword){

			$pdf_filename = tempnam(sys_get_temp_dir(), "Relawan_");
		   $pdf_file= "Relawan";
   
			$sts_scty=FALSE;
			$direct_download=TRUE;
		
		   $data_header=array('title'=>'PDF',);   
		   
         $data_master['data_master'] = $this->mo_employee->fnemployeeDataPrint($vcityKeyword,$vkecKeyword,$vstatusKeyword);        		   
		   $output=$this->load->view('absent_employee_pdf',$data_master,true);   
			$scty="";
		   generate_pdf($output,$pdf_file,$direct_download,$sts_scty,$scty);
         //echo $output;	
   }		
	function fnEmployeeDataPrint($vcityKeyword,$vkecKeyword,$vstatusKeyword){

			$pdf_filename = tempnam(sys_get_temp_dir(), "Absen_Relawan_");
		   $pdf_file= "Absen_Relawan";
   
			$sts_scty=FALSE;
			$direct_download=TRUE;
		
		   $data_header=array('title'=>'PDF',);   
		   
         $data_master['data_master'] = $this->mo_employee->fnemployeeDataPrint($vcityKeyword,$vkecKeyword,$vstatusKeyword);        		   
		   $output=$this->load->view('employee_pdf',$data_master,true);   
			$scty="";
		   generate_pdf($output,$pdf_file,$direct_download,$sts_scty,$scty);
         //echo $output;	
   }	
	function fnEmployeeDataPrintExcel($vcityKeyword,$vkecKeyword,$vstatusKeyword){

			$pdf_filename = tempnam(sys_get_temp_dir(), "Relawan_");
		   $pdf_file= "Relawan";
   
			$sts_scty=FALSE;
			$direct_download=TRUE;
		
		   $data_header=array('title'=>'PDF',);   
		   
         $data_master['data_master'] = $this->mo_employee->fnemployeeDataPrint($vcityKeyword,$vkecKeyword,$vstatusKeyword);        		   
		   $output=$this->load->view('employee_excel',$data_master,true);   
			$scty="";
		   //generate_pdf($output,$pdf_file,$direct_download,$sts_scty,$scty);
         echo $output;	
   }	      
}
?>

	   