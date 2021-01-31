<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasubag extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Mainmodel','m');
	}

	function index()
	{
		$data['title'] = "APS | Kasubag-Dashboard";
		$this->load->view('kasubag/header',$data);
		$this->load->view('kasubag/dashboard');
		$this->load->view('kasubag/footer');
	}

	function suratmasuk()
	{
		$data['title']   = "APS | Manage Surat Masuk";
		//$data['masuk'] = $this->m->get_table('masuk');
		$data['masuk'] = $this->db->query("SELECT * FROM masuk ORDER BY id_smasuk DESC");
		$this->load->view('kasubag/header', $data);
		$this->load->view('kasubag/daftar_suratmasuk');
		$this->load->view('kasubag/footer');
	}

	function detailsuratmasuk($id)
	{
		
		$data['title']= "Arsip | Surat Masuk Detail";
		$data['lama'] = $this->m->get_where('masuk', ['id_smasuk' => $id])->result();
		$this->load->view('kasubag/header', $data);
		$this->load->view('kasubag/detail_suratmasuk');
		$this->load->view('kasubag/footer');		
	}

	function suratkeluar()
	{
		$data['title']   = "APS | Manage Surat Keluar";
		//$data['keluar'] = $this->m->get_table('keluar');
		$data['keluar'] = $this->db->query("SELECT * FROM keluar ORDER BY id_skeluar DESC");
		$this->load->view('kasubag/header', $data);
		$this->load->view('kasubag/daftar_suratkeluar');
		$this->load->view('kasubag/footer');
	}


	function detailsuratkeluar($id)
	{
		$data['title']= "APS | Surat Keluar Detail";
		$data['lama'] = $this->m->get_where('keluar', ['id_skeluar' => $id])->result();
		$this->load->view('kasubag/header', $data);
		$this->load->view('kasubag/detail_suratkeluar');
		$this->load->view('kasubag/footer');		
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

	function disposisi()
	{
		$data['title']   = "APS | Disposisi Surat";
		$data['list'] = $this->db->query("SELECT * FROM disposisi ORDER BY id_disposisi DESC");
		//$data['list'] 	 = $this->m->get_table('disposisi');
		$this->load->view('kasubag/header', $data);
		$this->load->view('kasubag/disposisi');
		$this->load->view('kasubag/footer');
	}

	function detaildisposisi($id)
	{
		$data['title']   = "APS | Detail Disposisi Surat";
		$data['list'] 	 = $this->m->get_where('disposisi',['id_disposisi'=>$id])->row();
		$value = array(
					'v_read' => '1'
				);
		$this->m->update('disposisi',['id_disposisi'=>$id],$value);
		$this->load->view('kasubag/header', $data);
		$this->load->view('kasubag/detail_disposisi');
		$this->load->view('kasubag/footer');
	} 

	function update_disposisi($id) 
	{
		$list  = $this->m->get_where('disposisi', ['id_disposisi' => $id])->result();

		$this->m->update('disposisi',['id_disposisi'=>$id],[
			'no_surat'	=>	$this->input->post('no_surat'),
			'dari'	=>	$this->input->post('dari'),
			'tgl_surat' =>$this->input->post('tgl_surat'),
			'tgl_diterima'	=>	$this->input->post('tgl_diterima'),
			'perihal'	=>	$this->input->post('perihal'),
			'sifat'	=>	$this->input->post('sifat'),
			'diteruskan'	=>	$this->input->post('diteruskan'),
			'dgn_hormat'	=>	$this->input->post('dgn_hormat'),
			'catatan'	=>	$this->input->post('catatan'),
			'teruntuk' => $this->input->post('teruntuk'),
			'tujuan' => $this->input->post('tujuan'),
			'tanggapan' => 0,
		]);
		$this->session->set_flashdata('success', 'Tanggapan berhasil ditambah!');
		redirect($this->agent->referrer());
	} 

	function rekapitulasisurat()
	{
		$data['title']   = "APS | Rekapitulasi Surat";
		$this->load->view('kasubag/header', $data);
		$this->load->view('kasubag/rekapitulasi_surat');
		$this->load->view('kasubag/footer');	
	}

	function hasilrekap()
	{
		$data['masuk']  = $this->db->where("tgl_masuk BETWEEN '".$this->input->post('dari')."' and '".$this->input->post('sampai')."' ")->get('masuk');
		$data['keluar']  = $this->db->where("tgl_keluar BETWEEN '".$this->input->post('dari')."' and '".$this->input->post('sampai')."' ")->get('keluar');
		$data['disposisi']  = $this->db->where("tgl_diterima BETWEEN '".$this->input->post('dari')."' and '".$this->input->post('sampai')."' ")->get('disposisi');
		
		$data['dari'] = $this->input->post('dari');
		$data['sampai'] = $this->input->post('sampai');
		$data['title']   = "APS | Rekapitulasi Surat";
		$this->load->view('kasubag/header', $data);
		$this->load->view('kasubag/hasil_rekap');
		$this->load->view('kasubag/footer');	
	}
}

/* End of file kasubag.php */
/* Location: ./application/controllers/kasubag.php */