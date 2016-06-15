<?php
class mo_tiket extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	function get_layanan() {
		$this->db->select("*");
		$res = $this->db->get('layanan')->result_array();
		
		return $res;
	}

	function insert_tiket($id_layanan) {
		$now = date('Y-m-d H:i:s');
		list($tanggal, $waktu) = explode(' ', $now);
		$tick_tanggal = str_replace('-', '', $tanggal);
		$tick_waktu = $now;

		$data_insert = array(
			'tick_tanggal'		=> $tick_tanggal,
			'tick_waktu'		=> $tick_waktu,
			'tick_id_layanan'	=> $id_layanan,
			'tick_status'		=> 0,
		);

		$res = $this->db->insert('ticket_print', $data_insert);

		return $res;
	}
}