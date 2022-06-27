<?php
defined('BASEPATH') OR exit ('No direct script access allowed ');

class Staff extends CI_Controller{

	function __construct(){
		parent ::__construct();
		$this->load->model('Mainmodel','m');
	}

// dashboard
	function index()
	{
		$this->load->view('staff/header');
		$this->load->view('staff/dashboard');
		$this->load->view('staff/footer');
	}

// surat undangan
function undangan()
{
	$data['masuk'] = $this->db->query("SELECT * FROM masuk WHERE kategori='Undangan'");;
	$this->load->view('staff/header', $data);
	$this->load->view('staff/undangan');
	$this->load->view('staff/footer');
}

// surat masuk
	function suratmasuk()
	{
		$data['masuk'] = $this->m->get_table('masuk');
		$this->load->view('staff/header', $data);
		$this->load->view('staff/surat_masuk');
		$this->load->view('staff/footer');
	}

	function carinosurat($i)
	{
		$kata = str_replace('%20', ' ', $i);
		$cek  = $this->db->where(array('no_surat' => $kata))->get('masuk');
		if ($cek->num_rows() > 0) {
			echo '1';
            // echo $cek->num_rows();
		} else {
			echo '0';
            // echo $cek->num_rows();
		}
	}

	function addmasuk()
	{
		$config['upload_path']="upload/masuk/"; //path folder file upload
        $config['allowed_types']='gif|jpg|png|jpeg|pdf|doc|docx'; //type file yang boleh di upload
        $judul = "Surat_".$this->input->post('no_surat');
        $config['file_name'] = $judul;
        
        $this->load->library('upload',$config); 


        	$data = array(
        		'no_surat'			=> $this->input->post('no_surat'),
        		'kategori' 			=> $this->input->post('kategori'),
        		'pengirim'			=> $this->input->post('pengirim'),
        		'perihal'			=> $this->input->post('perihal'),
        		'tgl_masuk'			=> $this->input->post('tgl_masuk'),
				'tgl_surat'			=> $this->input->post('tgl_surat'),
        		'ditujukan'			=> $this->input->post('ditujukan'),
				'Keterangan'		=> $this->input->post('Keterangan'),
        		'foto'				=> $foto
        	);
        	$this->m->insert('masuk',$data);
        	$this->session->set_flashdata('success', 'Surat masuk berhasil di tambahkan');
        	redirect($this->agent->referrer());
    }

    function updatemasuk($id)
    {
    	$lama  = $this->m->get_where('masuk', ['id_smasuk' => $id])->result();

    	if(!empty($_FILES['foto']['name'])){
			$config['upload_path']="upload/masuk/"; //path folder file upload
	        $config['allowed_types']='gif|jpg|png|jpeg|pdf|doc|docx'; //type file yang boleh di upload
	        $judul = "Surat_".$this->input->post('no_surat');
	        $config['file_name'] = $judul;

	        $this->load->library('upload',$config); 

	        if($this->upload->do_upload("foto")){ 
	        	if (file_exists("upload/masuk/".$lama[0]->foto)) {	
	        		unlink('upload/masuk/'.$lama[0]->foto);
	        	}
	        	$data = array('upload_data' => $this->upload->data()); 
	        	$foto= $data['upload_data']['file_name']; 

	        	$data = array(
	        		'no_surat'			=> $this->input->post('no_surat'),
	        		'kategori' 			=> $this->input->post('kategori'),
	        		'pengirim'			=> $this->input->post('pengirim'),
	        		'perihal'			=> $this->input->post('perihal'),
	        		'tgl_masuk'			=> $this->input->post('tgl_masuk'),
					'tgl_surat'			=> $this->input->post('tgl_surat'),
	        		'ditujukan'			=> $this->input->post('ditujukan'),
					'Keterangan'		=> $this->input->post('Keterangan'),
	        		'foto'			=> $foto
	        	);
	        	$this->m->update('masuk',['id_smasuk'=>$id],$data);
	        	$this->session->set_flashdata('success', 'Data berhasil di rubah');
	        	redirect($this->agent->referrer());
	        }else{
	        	$this->session->set_flashdata('error', $this->upload->display_errors());
	        	redirect($this->agent->referrer());
	        }
	    }else{

	    	$data = array(
	    		'no_surat'			=> $this->input->post('no_surat'),
	    		'pengirim'			=> $this->input->post('pengirim'),
	    		'kategori' 			=> $this->input->post('kategori'),
	    		'perihal'			=> $this->input->post('perihal'),
	    		'tgl_masuk'			=> $this->input->post('tgl_masuk'),
				'tgl_surat'			=> $this->input->post('tgl_surat'),
	    		'ditujukan'			=> $this->input->post('ditujukan'),
				'Keterangan'		=> $this->input->post('Keterangan'),
	    	);
	    	$this->m->update('masuk',['id_smasuk'=>$id],$data);
	    	$this->session->set_flashdata('success', 'Data berhasil di rubah');
	    	redirect($this->agent->referrer());
	    }
	}

	function delmasuk($id)
	{
		$lama  = $this->m->get_where('masuk', ['id_smasuk' => $id])->result();
		if (file_exists("upload/masuk/".$lama[0]->foto)) {	
			unlink('upload/masuk/'.$lama[0]->foto);
		}

		$this->m->drop('masuk',['id_smasuk'=>$id]);
		$this->session->set_flashdata('success', 'Surat masuk berhasil di hapus');
		redirect($this->agent->referrer());
	}

	function detailsuratmasuk($id)
	{
		$data['lama'] = $this->m->get_where('masuk', ['id_smasuk' => $id])->result();
		$this->load->view('staff/header', $data);
		$this->load->view('staff/detail_suratmasuk');
		$this->load->view('staff/footer');		
	}

	function suratkeluar()
	{
		$data['title']   = "APS | Manage Surat Keluar";
		$data['keluar'] = $this->db->query("SELECT * FROM keluar ORDER BY id_skeluar DESC");
		$this->load->view('staff/header', $data);
		$this->load->view('staff/surat_keluar');
		$this->load->view('staff/footer');
	}

	function carinosurat_keluar($i)
	{
		$kata = str_replace('%20', ' ', $i);
		$cek  = $this->db->where(array('no_surat' => $kata))->get('keluar');
		if ($cek->num_rows() > 0) {
			echo '1';
            // echo $cek->num_rows();
		} else {
			echo '0';
            // echo $cek->num_rows();
		}
	}


	function addkeluar($value='')
	{
		$config['upload_path']="upload/keluar/"; //path folder file upload
        $config['allowed_types']='gif|jpg|png|jpeg'; //type file yang boleh di upload
        $judul = "Surat_".$this->input->post('no_surat');
        $config['file_name'] = $judul;
        
        $this->load->library('upload',$config); 

        	$data = array(
        		'no_surat'			=> $this->input->post('no_surat'),
        		'kode_surat'			=> $this->input->post('kode_surat'),
        		'ditujukan'			=> $this->input->post('ditujukan'),
        		'kategori'			=> $this->input->post('kategori'),
        		'tgl_keluar'			=> $this->input->post('tgl_keluar'),
        		'perihal'			=> $this->input->post('perihal'),
        		'keterangan'			=> $this->input->post('keterangan'),
        		
        		'foto'			=> $foto
        	);
        	$this->m->insert('keluar',$data);
        	$this->session->set_flashdata('success', 'Surat keluar berhasil di tambahkan');
        	redirect($this->agent->referrer());
    }

    function updatekeluar($id)
    {
    	
    	$lama  = $this->m->get_where('keluar', ['id_skeluar' => $id])->result();

    	if(!empty($_FILES['foto']['name'])){
			$config['upload_path']="upload/keluar/"; //path folder file upload
	        $config['allowed_types']='gif|jpg|png|jpeg'; //type file yang boleh di upload
	        $judul = "Surat_".$this->input->post('no_surat');
	        $config['file_name'] = $judul;

	        $this->load->library('upload',$config); 

	        if($this->upload->do_upload("foto")){ 
	        	if (file_exists("upload/keluar/".$lama[0]->foto)) {	
	        		unlink('upload/keluar/'.$lama[0]->foto);
	        	}
	        	$data = array('upload_data' => $this->upload->data()); 
	        	$foto= $data['upload_data']['file_name']; 

	        	$data = array(
	        		'no_surat'			=> $this->input->post('no_surat'),
	        		'kode_surat'			=> $this->input->post('kode_surat'),
	        		'ditujukan'			=> $this->input->post('ditujukan'),
	        		'kategori'			=> $this->input->post('kategori'),
	        		'tgl_keluar'			=> $this->input->post('tgl_keluar'),
	        		'perihal'			=> $this->input->post('perihal'),
	        		'keterangan'			=> $this->input->post('keterangan'),
	        		
	        		'foto'			=> $foto
	        	);
	        	$this->m->update('keluar',['id'=>$id],$data);
	        	$this->session->set_flashdata('success', 'Data berhasil di rubah');
	        	redirect($this->agent->referrer());
	        }else{
	        	$this->session->set_flashdata('error', $this->upload->display_errors());
	        	redirect($this->agent->referrer());
	        }
	    }else{

	    	$data = array(
	    		'no_surat'			=> $this->input->post('no_surat'),
	    		'kode_surat'			=> $this->input->post('kode_surat'),
	    		'ditujukan'			=> $this->input->post('ditujukan'),
	    		'kategori'			=> $this->input->post('kategori'),
	    		'tgl_keluar'			=> $this->input->post('tgl_keluar'),
	    		'perihal'			=> $this->input->post('perihal'),
	    		'keterangan'			=> $this->input->post('keterangan'),
	    		
	    	);
	    	$this->m->update('keluar',['id_skeluar'=>$id],$data);
	    	$this->session->set_flashdata('success', 'Data berhasil di rubah');
	    	redirect($this->agent->referrer());
	    }

	}

	function detailsuratkeluar($id)
	{
		$data['title']= "APS | Surat Keluar Detail";
		$data['lama'] = $this->m->get_where('keluar', ['id_skeluar' => $id])->result();
		$this->load->view('staff/header', $data);
		$this->load->view('staff/detail_suratkeluar');
		$this->load->view('staff/footer');		
	}


	function delkeluar($id)
	{
		$lama  = $this->m->get_where('keluar', ['id_skeluar' => $id])->result();
		if (file_exists("upload/keluar/".$lama[0]->foto)) {	
			unlink('upload/keluar/'.$lama[0]->foto);
		}

		$this->m->drop('keluar',['id_skeluar'=>$id]);
		$this->session->set_flashdata('success', 'Surat keluar berhasil di hapus');
		redirect($this->agent->referrer());
	}

// disposisi
	function disposisi()
	{
		$data['title']   = "APS | Disposisi Surat";
		$data['list'] = $this->db->query("SELECT * FROM disposisi ORDER BY id_disposisi DESC");
		//$data['list'] 	 = $this->m->get_table('disposisi');
		$this->load->view('staff/header', $data);
		$this->load->view('staff/disposisi');
		$this->load->view('staff/footer');
	}
	

	function detail($id)
	{
		$data['title']   = "APS | Detail Disposisi Surat";
		$data['list'] 	 = $this->m->get_where('disposisi',['id_disposisi'=>$id])->row();
		$this->load->view('staff/header', $data);
		$this->load->view('staff/detail');
		$this->load->view('staff/footer');
	}

	function tugas()
	{
		$data['title']   = "APS | Monitoring Tugas";
		$data['keluar'] = $this->m->get_table('keluar');
		$this->load->view('staff/header', $data);
		$this->load->view('staff/tugas');
		$this->load->view('staff/footer');
	}

// rekap
	function rekapitulasisurat()
	{
		$this->load->view('staff/header');
		$this->load->view('staff/rekapitulasi_surat');
		$this->load->view('staff/footer');
		
	}

	function rekap()
	{
		$data['masuk']  = $this->db->where("tgl_masuk BETWEEN '".$this->input->post('dari')."' and '".$this->input->post('sampai')."' ")->get('masuk');
		$data['keluar']  = $this->db->where("tgl_catat BETWEEN '".$this->input->post('dari')."' and '".$this->input->post('sampai')."' ")->get('keluar');
		$data['disposisi']  = $this->db->where("tgl_diterima BETWEEN '".$this->input->post('dari')."' and '".$this->input->post('sampai')."' ")->get('disposisi');
		$data['undangan']  = $this->db->where("tgl_masuk BETWEEN '".$this->input->post('dari')."' and '".$this->input->post('sampai')."' and kategori='Undangan'")->get('masuk');
		//$data['total_undangan']  = $this->db->where("kategori='Undangan' and  tgl_masuk BETWEEN '".$this->input->post('dari')."' and '".$this->input->post('sampai')."' and ' ")->get('masuk');
		//$data['total_undangan'] = $this->db->query("SELECT COUNT(*) FROM  masuk WHERE kategori='Undangan' AND tgl_masuk BETWEEN '2022-06-1' AND '2022-06-30';");
		$data['dari'] = $this->input->post('dari');
		$data['sampai'] = $this->input->post('sampai');
		$this->load->view('staff/header', $data);
		$this->load->view('staff/rekap');
		$this->load->view('staff/footer');		
	}

	function cetak_exportsm(){
		$dari = $this->uri->segment(3);
		$sampai = $this->uri->segment(4);
		$data['masuk']  = $this->db->where("tgl_masuk BETWEEN '".$dari."' and '".$sampai."' ")->get('masuk');
		$data['dari'] = $dari;
		$data['sampai'] = $sampai;
		$this->load->view('staff/export_excelsm', $data);
	}

	function cetak_exportsk(){
		$dari = $this->uri->segment(3);
		$sampai = $this->uri->segment(4);
		$data['keluar']  = $this->db->where("tgl_catat BETWEEN '".$dari."' and '".$sampai."' ")->get('keluar');
		//$data['disposisi']  = $this->db->where("tgl_diterima BETWEEN '".$dari."' and '".$sampai."' ")->get('disposisi');
		$data['dari'] = $dari;
		$data['sampai'] = $sampai;
		$this->load->view('staff/export_excelsk', $data);
	}

	function cetak_exportds(){
		$dari = $this->uri->segment(3);
		$sampai = $this->uri->segment(4);
		$data['disposisi']  = $this->db->where("tgl_diterima BETWEEN '".$this->input->post('dari')."' and '".$this->input->post('sampai')."' ")->get('disposisi');
		//$data['disposisi']  = $this->db->where("tgl_diterima BETWEEN '".$dari."' and '".$sampai."' ")->get('disposisi');
		$data['dari'] = $dari;
		$data['sampai'] = $sampai;
		$this->load->view('staff/export_excelds', $data);
	}

	function cetak_export_undangan(){
		$dari = $this->uri->segment(3);
		$sampai = $this->uri->segment(4);
		$data['undangan']  = $this->db->where("tgl_masuk BETWEEN '".$dari."' and '".$sampai."' and kategori='Undangan'")->get('masuk');
		$data['dari'] = $dari;
		$data['sampai'] = $sampai;
		$this->load->view('staff/export_excel_undangan', $data);
	}


	function buatsurat()
	{
		$data['title']   = "APS | Buat Surat";
		$data['sub'] = "Surat";
		$this->load->view('staff/header', $data);
		$this->load->view('staff/buat_surat');
		$this->load->view('staff/footer');		
	}


	function permohonan() 
	{
		$data['title']   = "APS | Buat Permohonan";
		$data['sub'] = "Permohonan";
		$this->load->view('staff/header', $data);
		$this->load->view('staff/undangan');
		$this->load->view('staff/footer');		
	}

	public function buat_laporan()
	{
		$data['title']   = "APS | Buat Laporan";
		$data['sub'] = "Laporan";
		$this->load->view('staff/header', $data);
		$this->load->view('staff/surat_laporan');
		$this->load->view('staff/footer');
	}

	public function pemberitahuan()
	{
	
		$data['title']   = "APS | Buat Pemberitahuan";
		$data['sub'] = "Pemberitahuan";
		$this->load->view('staff/header', $data);
		$this->load->view('staff/undangan');
		$this->load->view('staff/footer');			
	}


	public function himbauan()
	{
	
		$data['title']   = "APS | Buat Himbauan";
		$data['sub'] = "Himbauan";
		$this->load->view('staff/header', $data);
		$this->load->view('staff/undangan');
		$this->load->view('staff/footer');			
	}

	function cetak_surat(){
		$kepada = $this->input->post('kepada');
		if ($kepada == "Lain-lain") {
			$text_kepada = $this->input->post('text_lainkepada');
		}else{
			$text_kepada = $kepada;
		}

		$tembusan = $this->input->post('tembusan');
		if ($tembusan == "Lain-lain") {
			$text_tembusan = $this->input->post('text_laintembusan');
		}else{
			$text_tembusan = $tembusan;
		}
    	$data = array(
    				"tempat_tanggal" => $this->input->post('tempat_tanggal'),
    				"kepada" => $text_kepada,
    				"nomor" => $this->input->post('nomor'),
    				"sifat" => $this->input->post('sifat'),
    				"lampiran" => $this->input->post('lampiran'),
    				"perihal" => $this->input->post('perihal'),
    				"isi_surat" => $this->input->post('isi_surat'),
    				"tembusan" => $text_tembusan
    			);
    	$datakeluar =  array(
			    		"no_surat"=>$this->input->post('nomor'),
			    		"kode_surat"=>$this->input->post('nomor'),
			    		"tgl_keluar"=>date('Y-m-d'),
			    		"ditujukan"=> $text_kepada,
			    		"perihal"=>$this->input->post('perihal'),
			    		"keterangan"=>$this->input->post('isi_surat'),
			    		"kategori"=>$this->input->post('kategori'),
			    		"foto"=>'-',
			    		
			    		"id_pegawai"=>'0',
			    		"lampiran"=> $this->input->post('lampiran'),
			    		"sifat"=>$this->input->post('sifat')
    				);
    	$this->m->insert('keluar',$datakeluar);
    	$this->load->view('staff/cetak_print', $data);
    }

    function cetak_export(){
		$dari = $this->uri->segment(3);
		$sampai = $this->uri->segment(4);
		$data['masuk']  = $this->db->where("tgl_masuk BETWEEN '".$dari."' and '".$sampai."' ")->get('masuk');
		$data['keluar']  = $this->db->where("tgl_keluar BETWEEN '".$dari."' and '".$sampai."' ")->get('keluar');
		$data['disposisi']  = $this->db->where("tgl_diterima BETWEEN '".$dari."' and '".$sampai."' ")->get('disposisi');
		$data['dari'] = $dari;
		$data['sampai'] = $sampai;
		$this->load->view('staff/export_excel', $data);
	}
}