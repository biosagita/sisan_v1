<?php
class md_tiket extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_tiket');
	}
	function index() {
		$data['layanan'] = $this->mo_tiket->get_layanan();
		$this->load->view('index', $data);
	}
	function do_tiket()	{
		$status = array(
			'success' => 'ok'
		);

		$id_layanan = !empty($_POST['id_layanan']) ? $_POST['id_layanan'] : 0;

		$status['res'] = $this->mo_tiket->insert_tiket($id_layanan);

		echo json_encode($status);
	}
}