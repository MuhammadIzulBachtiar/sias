<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

class Operator extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model('Mainmodel','m');
	}

	// dashboard
	function index()
	{
		$this->load->view('operator/header');
		$this->load->view('operator/dashboard');
		$this->load->view('operator/footer');
	}

	function carilama($i)
	{
		$kata = str_replace('%20', ' ', $i);
		$cek  = $this->db->where(array('password' => $kata))->where('id',$this->session->userdata('id_admin'))->get('pegawai');
		if ($cek->num_rows() > 0) {
			echo '0';
            // echo $cek->num_rows();
		} else {
			echo '1';
            // echo $cek->num_rows();
		}
	}

// user
	function cariusername($i)
	{
		$kata = str_replace('%20', ' ', $i);
		$cek  = $this->db->where(array('username' => $kata))->get('pegawai');
		if ($cek->num_rows() > 0) {
			echo '1';
            // echo $cek->num_rows();
		} else {
			echo '0';
            // echo $cek->num_rows();
		}
	}

	function gantiPass()
	{
		$this->m->update('pegawai',['id'=>$this->session->userdata('id_admin')],['password'=>$this->input->post('password')]);
		$this->session->set_flashdata('success', 'Password berhasil di ganti');
		redirect($this->agent->referrer());
	}

	function gantiUser()
	{
		$this->m->update('pegawai',['id'=>$this->session->userdata('id_admin')],['username'=>$this->input->post('username')]);
		$this->session->set_flashdata('success', 'Username berhasil di ganti');
		redirect($this->agent->referrer());
	}

	//pegawai
	function pegawai()
	{
		$data['pegawai'] = $this->m->get_table('pegawai');
		$this->load->view('operator/header', $data);
		$this->load->view('operator/pegawai');
		$this->load->view('operator/footer');
	}

	function carinip($i)
	{
		$kata = str_replace('%20', ' ', $i);
		$cek  = $this->db->where(array('nip' => $kata))->get('pegawai');
		if ($cek->num_rows() > 0) {
			echo '1';  
		} else {
			echo '0';
		}
	}

	function tambahpegawai()
	{
		$this->m->insert('pegawai',[
			'nip'		=>	$this->input->post('nip'),
			'nama'		=>	$this->input->post('nama'),
			'password'	=>	$this->input->post('password'),
			'username'	=>	$this->input->post('username'),
			'akses'		=>	$this->input->post('akses'),
			'jabatan'   =>  $this->input->post('jabatan'),
		]);
		$this->session->set_flashdata('success', 'Pegawai berhasil di tambahkan!');
		redirect($this->agent->referrer());
	}

	function updatepegawai($id)
	{
		$this->m->update('pegawai',['id_pegawai'=>$id],[
			'nip'		=>	$this->input->post('nip'),
			'nama'		=>	$this->input->post('nama'),
			'password'	=>	$this->input->post('password'),
			'username'	=>	$this->input->post('username'),
			'akses'		=>	$this->input->post('akses'),
			'jabatan'   =>  $this->input->post('jabatan'),
		]);
		$this->session->set_flashdata('success', 'Pegawai berhasil di ubah!');
		redirect($this->agent->referrer());
	}

	function delpegawai($di)
	{
		$this->m->drop('pegawai',['id_pegawai'=>$di]);
		$this->session->set_flashdata('success', 'Pegawai berhasil di hapus!');
		redirect($this->agent->referrer());	
	}

	function soft_delete($di){
		$this->m->soft_delete('pegawai',$di);
		$this->session->set_flashdata('success', 'Pegawai berhasil di hapus!');
		redirect($this->agent->referrer());
	}

	// undangan	
	function undangan()
	{
		$data['masuk'] = $this->db->query("SELECT * FROM masuk WHERE kategori='Undangan'");
		$this->load->view('operator/header', $data);
		$this->load->view('operator/undangan');
		$this->load->view('operator/footer');
	}
	
	// Surat masuk	
	function suratmasuk()
	{
		$data['masuk'] = $this->db->query("SELECT * FROM masuk ORDER BY id_smasuk DESC");
		//$data['masuk'] = $this->m->get_table('masuk');
		$this->load->view('operator/header', $data);
		$this->load->view('operator/surat_masuk');
		$this->load->view('operator/footer');
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
		$this->load->view('operator/header', $data);
		$this->load->view('operator/detail_suratmasuk');
		$this->load->view('operator/footer');		
	}
	
	// Surat Keluar
	function suratkeluar()
	{
		$data['keluar'] = $this->db->query("SELECT * FROM keluar ORDER BY id_skeluar DESC");
		$this->load->view('operator/header', $data);
		$this->load->view('operator/surat_keluar');
		$this->load->view('operator/footer');
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
        $config['allowed_types']='gif|jpg|png|jpeg|pdf|doc|docx'; //type file yang boleh di upload
        $judul = "Surat_".$this->input->post('no_surat');
        $config['file_name'] = $judul;
        
        $this->load->library('upload',$config); 

        	$data = array(
        		'no_surat'			=> $this->input->post('no_surat'),
        		'ditujukan'			=> $this->input->post('ditujukan'),
        		'kategori'			=> $this->input->post('kategori'),
        		'tgl_keluar'		=> $this->input->post('tgl_keluar'),
				'tgl_catat'		    => $this->input->post('tgl_catat'),
        		'perihal'			=> $this->input->post('perihal'),
        		'keterangan'		=> $this->input->post('keterangan'),
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
	        $config['allowed_types']='gif|jpg|png|jpeg|pdf|doc|docx'; //type file yang boleh di upload
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
	        		'tgl_catat'		    => $this->input->post('tgl_catat'),
	        		'ditujukan'			=> $this->input->post('ditujukan'),
	        		'kategori'			=> $this->input->post('kategori'),
	        		'tgl_keluar'			=> $this->input->post('tgl_keluar'),
	        		'perihal'			=> $this->input->post('perihal'),
	        		'keterangan'			=> $this->input->post('keterangan'),
	        		
	        		'foto'			=> $foto
	        	);
	        	$this->m->update('keluar',['id_skeluar'=>$id],$data);
	        	$this->session->set_flashdata('success', 'Data berhasil di rubah');
	        	redirect($this->agent->referrer());
	        }else{
	        	$this->session->set_flashdata('error', $this->upload->display_errors());
	        	redirect($this->agent->referrer());
	        }
	    }else{

	    	$data = array(
	    		'no_surat'			=> $this->input->post('no_surat'),
	    		'tgl_catat'		    => $this->input->post('tgl_catat'),
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
		$data['lama'] = $this->m->get_where('keluar', ['id_skeluar' => $id])->result();
		$this->load->view('operator/header', $data);
		$this->load->view('operator/detail_suratkeluar');
		$this->load->view('operator/footer');		
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
	function laman_disposisi($id)
	{
		$data['lama'] = $this->m->get_where('masuk', ['id_smasuk' => $id])->result();
		$this->load->view('operator/header', $data);
		$this->load->view('operator/add_disposisi');
		$this->load->view('operator/footer');		
	}

	function monitoring_disposisi(){
		$data['disposisi'] = $this->db->query("SELECT * FROM disposisi ORDER BY id_disposisi DESC");
		//$data['disposisi'] = $this->m->get_table('disposisi');
		$this->load->view('operator/header', $data);
		$this->load->view('operator/monitoring_disposisi');
		$this->load->view('operator/footer'); 
	}
	
	function daftardisposisi()
	{
		$data['disposisi'] = $this->db->query("SELECT * FROM disposisi ORDER BY id_disposisi DESC");
		//$data['disposisi'] = $this->m->get_table('disposisi');
		$this->load->view('operator/header', $data);
		$this->load->view('operator/daftar_disposisi');
		$this->load->view('operator/footer'); 
	}
	
	function detaildisposisi($id)
	{
		$data['list'] 	 = $this->m->get_where('disposisi',['id_disposisi'=>$id])->row();
		$this->load->view('operator/header', $data);
		$this->load->view('operator/detail_disposisi');
		$this->load->view('operator/footer');
	}

	
	function add_disposisi()
	{
		$this->m->insert('disposisi',[
			'no_surat'	=>	$this->input->post('no_surat'),
			'dari'	=>	$this->input->post('dari'),
			'tgl_surat' => $this->input->post('tgl_surat'),
			'tgl_diterima'	=>	$this->input->post('tgl_diterima'),
			'perihal'	=>	$this->input->post('perihal'),
			'sifat'	=>	$this->input->post('sifat'),
			'diteruskan'	=>	$this->input->post('diteruskan'),
			'catatan'	=>	$this->input->post('catatan'),
			'ditujukan'	=>	$this->input->post('ditujukan'),
			
			
		]);

		$this->session->set_flashdata('success', 'Disposisi berhasil di tambahkan');
		redirect($this->agent->referrer());
	}
	
	function disposisi()
	{
		$data['disposisi'] = $this->m->get_table('disposisi');
		$this->load->view('operator/header', $data);
		$this->load->view('operator/tambah_disposisi');
		$this->load->view('operator/footer');
	}
	
	function getsuratmasuk(){
		$nomer_surat = $this->input->post('nomer');
		$validasi_disposisi =  $this->db->query("SELECT * FROM disposisi WHERE no_surat = '$nomer_surat'")->num_rows();
		if ($validasi_disposisi > 0) {
			$hasil = array("hasil" => "ada");
		}else{
			$validasi = $this->db->query("SELECT * FROM masuk WHERE no_surat = '$nomer_surat'")->row_array();
			$hasil = array("surat_dari" => $validasi['pengirim'], "tgl_diterima" => $validasi['tgl_masuk'], "tgl_surat" => $validasi['tgl_surat'], "ditujukan" => $validasi['ditujukan'], "perihal" => $validasi['perihal']);	
		}

		echo json_encode($hasil);
	}
	

	function update_disposisi($id)
	{
		$list  = $this->m->get_where('disposisi', ['id_disposisi' => $id])->result();

		$this->m->update('disposisi',['id_disposisi'=>$id],[
			'no_surat'	=>	$this->input->post('no_surat'),
			'dari'	=>	$this->input->post('dari'),
			'tgl_surat' => $this->input->post('tgl_surat'),
			'tgl_diterima'	=>	$this->input->post('tgl_diterima'),
			'perihal'	=>	$this->input->post('perihal'),
			'sifat'	=>	$this->input->post('sifat'),
			'diteruskan'	=>	$this->input->post('diteruskan'),
			'catatan'	=>	$this->input->post('catatan'),
			'ditujukan'	=>	$this->input->post('ditujukan'),
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

	function monitoringsurat()
	{
		$data['keluar'] = $this->m->get_table('keluar');
		$this->load->view('operator/header', $data);
		$this->load->view('operator/monitoring_surat');
		$this->load->view('operator/footer');
		
	}

	// rekapitulasi surat
	function rekapitulasisurat()
	{
		$this->load->view('operator/header');
		$this->load->view('operator/rekapitulasi_surat');
		$this->load->view('operator/footer');
		
	}

	function hasil_rekap()
	{
		$data['masuk']  = $this->db->where("tgl_masuk BETWEEN '".$this->input->post('dari')."' and '".$this->input->post('sampai')."' ")->get('masuk');
		$data['keluar']  = $this->db->where("tgl_catat BETWEEN '".$this->input->post('dari')."' and '".$this->input->post('sampai')."' ")->get('keluar');
		$data['disposisi']  = $this->db->where("tgl_diterima BETWEEN '".$this->input->post('dari')."' and '".$this->input->post('sampai')."' ")->get('disposisi');
		$data['undangan']  = $this->db->where("tgl_masuk BETWEEN '".$this->input->post('dari')."' and '".$this->input->post('sampai')."' and kategori='Undangan'")->get('masuk');
		//$data['total_undangan']  = $this->db->where("kategori='Undangan' and  tgl_masuk BETWEEN '".$this->input->post('dari')."' and '".$this->input->post('sampai')."' and ' ")->get('masuk');
		//$data['total_undangan'] = $this->db->query("SELECT COUNT(*) FROM  masuk WHERE kategori='Undangan' AND tgl_masuk BETWEEN '2022-06-1' AND '2022-06-30';");
		$data['dari'] = $this->input->post('dari');
		$data['sampai'] = $this->input->post('sampai');
		$this->load->view('operator/header', $data);
		$this->load->view('operator/hasil_rekap');
		$this->load->view('operator/footer');		
	}

	function cetak_exportsm(){
		$dari = $this->uri->segment(3);
		$sampai = $this->uri->segment(4);
		$data['masuk']  = $this->db->where("tgl_masuk BETWEEN '".$dari."' and '".$sampai."' ")->get('masuk');
		$data['dari'] = $dari;
		$data['sampai'] = $sampai;
		$this->load->view('operator/export_excelsm', $data);
	}

	function cetak_exportsk(){
		$dari = $this->uri->segment(3);
		$sampai = $this->uri->segment(4);
		$data['keluar']  = $this->db->where("tgl_catat BETWEEN '".$dari."' and '".$sampai."' ")->get('keluar');
		//$data['disposisi']  = $this->db->where("tgl_diterima BETWEEN '".$dari."' and '".$sampai."' ")->get('disposisi');
		$data['dari'] = $dari;
		$data['sampai'] = $sampai;
		$this->load->view('operator/export_excelsk', $data);
	}

	function cetak_exportds(){
		$dari = $this->uri->segment(3);
		$sampai = $this->uri->segment(4);
		$data['disposisi']  = $this->db->where("tgl_diterima BETWEEN '".$this->input->post('dari')."' and '".$this->input->post('sampai')."' ")->get('disposisi');
		//$data['disposisi']  = $this->db->where("tgl_diterima BETWEEN '".$dari."' and '".$sampai."' ")->get('disposisi');
		$data['dari'] = $dari;
		$data['sampai'] = $sampai;
		$this->load->view('operator/export_excelds', $data);
	}

	function cetak_export_undangan(){
		$dari = $this->uri->segment(3);
		$sampai = $this->uri->segment(4);
		$data['undangan']  = $this->db->where("tgl_masuk BETWEEN '".$dari."' and '".$sampai."' and kategori='Undangan'")->get('masuk');
		$data['dari'] = $dari;
		$data['sampai'] = $sampai;
		$this->load->view('operator/export_excel_undangan', $data);
	}


	function buatsurat()
	{
		$data['sub'] = "Surat";
		$this->load->view('operator/header', $data);
		$this->load->view('operator/buat_surat');
		$this->load->view('operator/footer');		
	}


	function permohonan()
	{
		$data['sub'] = "Permohonan";
		$this->load->view('operator/header', $data);
		$this->load->view('operator/undangan');
		$this->load->view('operator/footer');		
	}

	public function buat_laporan()
	{
		$data['sub'] = "Laporan";
		$this->load->view('operator/header', $data);
		$this->load->view('operator/surat_laporan');
		$this->load->view('operator/footer');
	}

	public function pemberitahuan()
	{
		$data['sub'] = "Pemberitahuan";
		$this->load->view('operator/header', $data);
		$this->load->view('operator/undangan');
		$this->load->view('operator/footer');			
	}


	public function himbauan()
	{
		$data['sub'] = "Himbauan";
		$this->load->view('operator/header', $data);
		$this->load->view('operator/undangan');
		$this->load->view('operator/footer');			
	}

	function cetak_surat(){
		$kode = $this->input->post('nomor');
		$validasi_Data = $this->db->query("SELECT * FROM keluar ORDER BY id_skeluar DESC");
		if ($validasi_Data->num_rows() > 0) {
			$datasurat = $validasi_Data->row();
			$nomer = substr($datasurat->no_surat, 0, 3);
			$addlist = $nomer;
			$no_surat = $addlist."/".$kode."/SEKRET";
		}else{

			$no_surat = "101/".$kode."/SEKRET";
		 }
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
    				"nomor" => $no_surat,
    				"sifat" => $this->input->post('sifat'),
    				"lampiran" => $this->input->post('lampiran'),
    				"perihal" => $this->input->post('perihal'),
    				"isi_surat" => $this->input->post('isi_surat'),
    				"tembusan" => $text_tembusan
    			);
    	$datakeluar =  array(
			    		"no_surat"=>$no_surat,
			    		"kode_surat"=> $this->input->post('nomor'),
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
    	$this->load->view('operator/cetak_print', $data);
    }

   
	
}