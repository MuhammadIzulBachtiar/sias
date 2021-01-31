<?php
 defined('BASEPATH') OR exit('No direct script access allowed');

 class Mainmodel extends CI_Model {

 	function login()
 	{
 		$username = $this->input->post('username');
 		$password = $this->input->post('password');

 		$cek = $this->db->where(array('username'=> $username,'password'=> $password))->get('pegawai');
 		if ($cek->num_rows() > 0 ) {
 			$cek = $this->db->where(array('username'=> $username,'password'=> $password))->get('pegawai')->result();
 			if ($cek[0]->akses=="Operator") {
 				$array = array(
 					'operator' => $cek[0]->id_pegawai,
 				);
 				$this->session->set_userdata( $array );
 				return 'operator';
 			}elseif ($cek[0]->akses=="Staff") {
 				$array = array(
 					'staff' => $cek[0]->id_pegawai,
 				);
 				$this->session->set_userdata( $array );
 				return 'staff';
 			}elseif ($cek[0]->akses=="Kasubag") {
 				$array = array(
 					'kasubag' => $cek[0]->id_pegawai,
 				);
 				$this->session->set_userdata( $array );
 				return 'kasubag';
 			}else{
 				$array = array(
 					'kepala' => $cek[0]->id_pegawai,
 				);
 				$this->session->set_userdata( $array );
 				return 'kepala';
 			}
 		}else{
 			return false;
 		}
 	}	

 	function get_table($table){
 		return $this->db->get($table);
 	}
 	function get_where($table,array $where)
 	{
 		return $this->db->where($where)->get($table);
 	}
 	function drop($table,array $where){
 		return $this->db->where($where)->delete($table);
 	}

 	function insert($table,array $data){
 		return $this->db->insert($table,$data);
 	}
 	function update($table,array $where,array $data){
 		return $this->db->where($where)->update($table,$data);
 	}

    function get_all_paginate($table,$order_by,$num, $offset) {
        $this->db->order_by($order_by, "ASC");
        $query = $this->db->where('type','3')->where('id !=',$this->session->userdata('id_siswa'))->get($table, $num, $offset);
        return $query->result();
    }
    function pegawai($table){
    	$this->db->where('soft_delete', '0');
    	return $this->db->get($table);
    }

    function soft_delete($table, $id_pegawai){
    	return $this->db->query("UPDATE `pegawai` SET soft_delete = '1' WHERE id_pegawai = '$id_pegawai'");
    }
 }

 /* End of file Mainmodel.php */
/* Location: ./application/models/Mainmodel.php */