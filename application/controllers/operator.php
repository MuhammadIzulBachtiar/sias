<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

class Operator extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model('Mainmodel','m');
	}

	function index()
	{
		$data['title'] = "APS | Operator-Dashboard";
		$this->load->view('operator/header',$data);
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

	function pegawai()
	{
		$data['title']   = "APS - Kelola Pegawai";
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
			'nip'	=>	$this->input->post('nip'),
			'nama'	=>	$this->input->post('nama'),
			'jabatan'	=>	$this->input->post('jabatan'),
			'pangkat'	=>	$this->input->post('pangkat'),
			'password'	=>	$this->input->post('password'),
			'username'	=>	$this->input->post('username'),
			'akses'	=>	$this->input->post('akses'),
		]);
		$this->session->set_flashdata('success', 'Pegawai berhasil di tambahkan!');
		redirect($this->agent->referrer());
	}

	function updatepegawai($id)
	{
		$this->m->update('pegawai',['id_pegawai'=>$id],[
			'nip'	=>	$this->input->post('nip'),
			'nama'	=>	$this->input->post('nama'),
			'jabatan'	=>	$this->input->post('jabatan'),
			'pangkat'	=>	$this->input->post('pangkat'),
			'password'	=>	$this->input->post('password'),
			'username'	=>	$this->input->post('username'),
			'akses'	=>	$this->input->post('akses'),
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

	
	function suratmasuk()
	{
		$data['title']   = "APS - Kelola Surat Masuk";
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
        $config['allowed_types']='gif|jpg|png|jpeg'; //type file yang boleh di upload
        $judul = "Surat_".$this->input->post('no_surat');
        $config['file_name'] = $judul;
        
        $this->load->library('upload',$config); 

        if($this->upload->do_upload("foto")){ 
        	$data = array('upload_data' => $this->upload->data()); 
        	$foto= $data['upload_data']['file_name']; 

        	$data = array(
        		'no_surat'			=> $this->input->post('no_surat'),
        		'kode_surat'		=> $this->input->post('kode_surat'),
        		'kategori' 			=> $this->input->post('kategori'),
        		'pengirim'			=> $this->input->post('pengirim'),
        		'perihal'			=> $this->input->post('perihal'),
        		'tgl_masuk'			=> $this->input->post('tgl_masuk'),
        		'ditujukan'			=> $this->input->post('ditujukan'),
        		'keterangan'			=> $this->input->post('keterangan'),
        		'foto'			=> $foto
        	);
        	$this->m->insert('masuk',$data);
        	$this->session->set_flashdata('success', 'Surat masuk berhasil di tambahkan');
        	redirect($this->agent->referrer());
        }else{
        	$this->session->set_flashdata('error', $this->upload->display_errors());
        	redirect($this->agent->referrer());
        }
    }

    function updatemasuk($id)
    {
    	$lama  = $this->m->get_where('masuk', ['id_smasuk' => $id])->result();

    	if(!empty($_FILES['foto']['name'])){
			$config['upload_path']="upload/masuk/"; //path folder file upload
	        $config['allowed_types']='gif|jpg|png|jpeg'; //type file yang boleh di upload
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
	        		'kode_surat'			=> $this->input->post('kode_surat'),
	        		'kategori' 			=> $this->input->post('kategori'),
	        		'pengirim'			=> $this->input->post('pengirim'),
	        		'perihal'			=> $this->input->post('perihal'),
	        		'tgl_masuk'			=> $this->input->post('tgl_masuk'),
	        		'ditujukan'			=> $this->input->post('ditujukan'),
	        		'keterangan'			=> $this->input->post('keterangan'),
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
	    		'kode_surat'			=> $this->input->post('kode_surat'),
	    		'pengirim'			=> $this->input->post('pengirim'),
	    		'kategori' 			=> $this->input->post('kategori'),
	    		'perihal'			=> $this->input->post('perihal'),
	    		'tgl_masuk'			=> $this->input->post('tgl_masuk'),
	    		'ditujukan'			=> $this->input->post('ditujukan'),
	    		'keterangan'			=> $this->input->post('keterangan'),
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
		$data['title']= "APS | Surat Masuk Detail";
		$data['lama'] = $this->m->get_where('masuk', ['id_smasuk' => $id])->result();
		$this->load->view('operator/header', $data);
		$this->load->view('operator/detail_suratmasuk');
		$this->load->view('operator/footer');		
	}
	
	function suratkeluar()
	{
		$data['title']   = "APS| Manage Surat Keluar";
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
        $config['allowed_types']='gif|jpg|png|jpeg'; //type file yang boleh di upload
        $judul = "Surat_".$this->input->post('no_surat');
        $config['file_name'] = $judul;
        
        $this->load->library('upload',$config); 

        if($this->upload->do_upload("foto")){ 
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
        	$this->m->insert('keluar',$data);
        	$this->session->set_flashdata('success', 'Surat keluar berhasil di tambahkan');
        	redirect($this->agent->referrer());
        }else{
        	$this->session->set_flashdata('error', $this->upload->display_errors());
        	redirect($this->agent->referrer());
        }
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
		$data['title']= "APS| Surat Keluar Detail";
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
	
	
	function monitoring_disposisi(){
		$data['title']   = "APS | Disposisi Surat";
		$data['disposisi'] = $this->db->query("SELECT * FROM disposisi ORDER BY id_disposisi DESC");
		//$data['disposisi'] = $this->m->get_table('disposisi');
		$this->load->view('operator/header', $data);
		$this->load->view('operator/monitoring_disposisi');
		$this->load->view('operator/footer'); 
	}
	
	function daftardisposisi()
	{
		$data['title']   = "APS | Disposisi Surat";
		$data['disposisi'] = $this->db->query("SELECT * FROM disposisi ORDER BY id_disposisi DESC");
		//$data['disposisi'] = $this->m->get_table('disposisi');
		$this->load->view('operator/header', $data);
		$this->load->view('operator/daftar_disposisi');
		$this->load->view('operator/footer'); 
	}
	
	function detaildisposisi($id)
	{
		$data['title']   = "APS | Detail Disposisi Surat";
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
			'dgn_hormat'	=>	$this->input->post('dgn_hormat'),
			'catatan'	=>	$this->input->post('catatan'),
			'teruntuk' => $this->input->post('teruntuk'),
			'tujuan' => $this->input->post('tujuan'),
			'tanggapan'=>0,
			
			
		]);

		$this->session->set_flashdata('success', 'Disposisi berhasil di tambahkan');
		redirect($this->agent->referrer());
	}
	
	function disposisi()
	{
		$data['title']   = "APS | Disposisi Surat";
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
			$hasil = array("surat_dari" => $validasi['pengirim'], "tgl_diterima" => $validasi['tgl_masuk'], "perihal" => $validasi['perihal']);	
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

	function monitoringsurat()
	{
		$data['title']   = "APS - Monitoring Surat";
		$data['keluar'] = $this->m->get_table('keluar');
		$this->load->view('operator/header', $data);
		$this->load->view('operator/monitoring_surat');
		$this->load->view('operator/footer');
		
	}

	function rekapitulasisurat()
	{
		$data['title']   = "APS - Rekapitulasi Surat";
		$this->load->view('operator/header', $data);
		$this->load->view('operator/rekapitulasi_surat');
		$this->load->view('operator/footer');
		
	}

	function hasil_rekap()
	{
		$data['masuk']  = $this->db->where("tgl_masuk BETWEEN '".$this->input->post('dari')."' and '".$this->input->post('sampai')."' ")->get('masuk');
		$data['keluar']  = $this->db->where("tgl_keluar BETWEEN '".$this->input->post('dari')."' and '".$this->input->post('sampai')."' ")->get('keluar');
		$data['disposisi']  = $this->db->where("tgl_diterima BETWEEN '".$this->input->post('dari')."' and '".$this->input->post('sampai')."' ")->get('disposisi');
		$data['title']   = "APS - Rekapitulasi Surat";
		$data['dari'] = $this->input->post('dari');
		$data['sampai'] = $this->input->post('sampai');
		$this->load->view('operator/header', $data);
		$this->load->view('operator/hasil_rekap');
		$this->load->view('operator/footer');
			
	}

	function buatsurat()
	{
		$data['title']   = "APS | Buat Surat";
		$data['sub'] = "Surat";
		$this->load->view('operator/header', $data);
		$this->load->view('operator/buat_surat');
		$this->load->view('operator/footer');		
	}


	function permohonan()
	{
		$data['title']   = "APS | Buat Permohonan";
		$data['sub'] = "Permohonan";
		$this->load->view('operator/header', $data);
		$this->load->view('operator/undangan');
		$this->load->view('operator/footer');		
	}

	public function buat_laporan()
	{
		$data['title']   = "APS | Buat Laporan";
		$data['sub'] = "Laporan";
		$this->load->view('operator/header', $data);
		$this->load->view('operator/surat_laporan');
		$this->load->view('operator/footer');
	}

	public function pemberitahuan()
	{
	
		$data['title']   = "APS | Buat Pemberitahuan";
		$data['sub'] = "Pemberitahuan";
		$this->load->view('operator/header', $data);
		$this->load->view('operator/undangan');
		$this->load->view('operator/footer');			
	}


	public function himbauan()
	{
	
		$data['title']   = "APS | Buat Himbauan";
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

    function cetak_export(){
		$dari = $this->uri->segment(3);
		$sampai = $this->uri->segment(4);
		$data['masuk']  = $this->db->where("tgl_masuk BETWEEN '".$dari."' and '".$sampai."' ")->get('masuk');
		$data['keluar']  = $this->db->where("tgl_keluar BETWEEN '".$dari."' and '".$sampai."' ")->get('keluar');
		$data['disposisi']  = $this->db->where("tgl_diterima BETWEEN '".$dari."' and '".$sampai."' ")->get('disposisi');
		$data['dari'] = $dari;
		$data['sampai'] = $sampai;
		$this->load->view('operator/export_excel', $data);
	}
	
}
