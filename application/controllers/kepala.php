<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kepala extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Mainmodel','m');
	}
	 
	function index()
	{
		$data['title'] = "APS | Kepala-Dashboard";
		$this->load->view('kepala/header',$data);
		$this->load->view('kepala/dashboard');
		$this->load->view('kepala/footer');
	}
	function suratmasuk()
	{
		$data['title']   = "APS | Surat Masuk";
		$data['masuk'] = $this->db->query("SELECT * FROM masuk ORDER BY id_smasuk DESC");
		//$data['masuk'] = $this->m->get_table('masuk');
		$this->load->view('kepala/header', $data);
		$this->load->view('kepala/daftar_suratmasuk');
		$this->load->view('kepala/footer'); 
	}

	function detailsuratmasuk($id)
	{
		
		$data['title']= "APS | Surat Masuk Detail";
		$data['lama'] = $this->m->get_where('masuk', ['id_smasuk' => $id])->result();
		$this->load->view('kepala/header', $data);
		$this->load->view('kepala/detail_suratmasuk');
		$this->load->view('kepala/footer');		
	}

	function suratkeluar()
	{
		$data['title']   = "APS | Surat Keluar";
		//$data['keluar'] = $this->m->get_table('keluar');
		$data['keluar'] = $this->db->query("SELECT * FROM keluar ORDER BY id_skeluar DESC");
		$this->load->view('kepala/header', $data);
		$this->load->view('kepala/daftar_suratkeluar');
		$this->load->view('kepala/footer');
	}

	function detailsuratkeluar($id)
	{
		$data['title']= "APS | Surat Keluar Detail";
		$data['lama'] = $this->m->get_where('keluar', ['id_skeluar' => $id])->result();
		$this->load->view('kepala/header', $data);
		$this->load->view('kepala/detail_suratkeluar');
		$this->load->view('kepala/footer');		
	}

	function disposisi()
	{
		$data['title']   = "APS | Disposisi Surat";
		//$data['disposisi'] = $this->m->get_table('disposisi');
		$data['disposisi'] = $this->db->query("SELECT * FROM disposisi ORDER BY id_disposisi DESC");
		$this->load->view('kepala/header', $data);
		$this->load->view('kepala/daftar_disposisi');
		$this->load->view('kepala/footer');
	}

	function daftardisposisi()
	{
		$data['title']   = "APS | Disposisi Surat";
		$data['disposisi'] = $this->m->get_table('disposisi');
		$this->load->view('kepala/header', $data);
		$this->load->view('kepala/daftar_disposisi');
		$this->load->view('kepala/footer'); 
		
	}

	function getsuratmasuk(){
		$nomer_surat = $this->input->post('nomer');
		$validasi_disposisi =  $this->db->query("SELECT * FROM disposisi WHERE no_surat = '$nomer_surat'")->num_rows();
		if ($validasi_disposisi > 0) {
			$hasil = array("hasil" => "ada");
		}else{
			$validasi = $this->db->query("SELECT * FROM masuk WHERE no_surat = '$nomer_surat'")->row_array();
			$hasil = array("surat_dari" => $validasi['pengirim'], "tgl_diterima" => $validasi['tgl_masuk'], "perihal" => $validasi['perihal']);	
		}

		echo json_encode($hasil);
	}



	function detaildisposisi($id)
	{
		$data['title']   = "APS | Detail Disposisi Surat";
		$data['list'] 	 = $this->m->get_where('disposisi',['id_disposisi'=>$id])->row();
		$this->load->view('kepala/header', $data);
		$this->load->view('kepala/detail_disposisi');
		$this->load->view('kepala/footer');
	}

	function add_disposisi()
	{
		$this->m->insert('disposisi',[
			'no_surat'	=>	$this->input->post('no_surat'),
			'dari'	=>	$this->input->post('dari'),
			'tgl_diterima'	=>	$this->input->post('tgl_diterima'),
			'perihal'	=>	$this->input->post('perihal'),
			'sifat'	=>	$this->input->post('sifat'),
			'diteruskan'	=>	$this->input->post('diteruskan'),
			'dgn_hormat'	=>	$this->input->post('dgn_hormat'),
			'catatan'	=>	$this->input->post('catatan'),
			
		]);

		$this->session->set_flashdata('success', 'Disposisi berhasil di tambahkan');
		redirect($this->agent->referrer());
	}

	function update_disposisi($id)
	{
		$list  = $this->m->get_where('disposisi', ['id_disposisi' => $id])->result();

		$this->m->update('disposisi',['id_disposisi'=>$id],[
			'no_surat'	=>	$this->input->post('no_surat'),
			'dari'	=>	$this->input->post('dari'),
			'tgl_diterima'	=>	$this->input->post('tgl_diterima'),
			'perihal'	=>	$this->input->post('perihal'),
			'sifat'	=>	$this->input->post('sifat'),
			'diteruskan'	=>	$this->input->post('diteruskan'),
			'dgn_hormat'	=>	$this->input->post('dgn_hormat'),
			'catatan'	=>	$this->input->post('catatan'),
		]);
		$this->session->set_flashdata('success', 'Disposisi berhasil di ubah!');
		redirect($this->agent->referrer());
	}

	function del_disposisi($di)
	{
		$this->m->drop('disposisi',['id_disposisi'=>$di]);
		$this->session->set_flashdata('success', 'Disposisi berhasil di hapus!');
		redirect($this->agent->referrer());	
	}



	function rekapitulasisurat()
	{
		$data['title']   = "APS | Laporan Rekapitulasi";
		$this->load->view('kepala/header', $data);
		$this->load->view('kepala/rekapitulasi_surat');
		$this->load->view('kepala/footer');	
	}

	function hasilrekap()
	{
		$data['masuk']  = $this->db->where("tgl_masuk BETWEEN '".$this->input->post('dari')."' and '".$this->input->post('sampai')."' ")->get('masuk')->num_rows();
		$data['keluar']  = $this->db->where("tgl_keluar BETWEEN '".$this->input->post('dari')."' and '".$this->input->post('sampai')."' ")->get('keluar')->num_rows();
		$data['disposisi']  = $this->db->where("tgl_diterima BETWEEN '".$this->input->post('dari')."' and '".$this->input->post('sampai')."' ")->get('disposisi')->num_rows();
		$data['title']   = "Arsip | Laporan Rekapitulasi";
		$this->load->view('kepala/header', $data);
		$this->load->view('kepala/hasil_rekap');
		$this->load->view('kepala/footer');	
	}
	
}
