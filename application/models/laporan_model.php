<?php 
defined('BASEPATH') OR exit('No direct script access allowed');



//nama : adam arnap
//nim  :19.12.1311
//kelas  : si 06


class Laporan_model extends CI_Model{


    //deklarasi constructor
    function __construct(){
        parent::__construct();
        //akses database
        $this->load->database();
    }


    public function getLaporan(){
            $data = $this->db->get('detail_penjualan');
            return $data->result_array();
        }
        
    
}