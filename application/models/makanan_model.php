<?php 
defined('BASEPATH') OR exit('No direct script access allowed');



//nama : adam arnap
//nim  :19.12.1311
//kelas  : si 06


class Makanan_model extends CI_Model{


    //deklarasi constructor
    function __construct(){
        parent::__construct();
        //akses database
        $this->load->database();
    }

    //function untuk tampilkan data makanan (GET) dan mencari dengan nama
    public function getMakanan($nama){
        if($nama==''){
            //show all data
            $data = $this->db->get('makanan');
        }else{
            //using like
            $this->db->like('nama_makanan', $nama);
            $data = $this->db->get('makanan');
        }

        return $data->result_array();
    }


    //function untuk menambahkan data makanan ke tabel makanan
    public function insertMakanan($data){ 
        //cek apakah id yang diinputkan sudah ada/belum
        $this->db->where('id_makanan', $data['id_makanan']);
        $check_data = $this->db->get('makanan');
        $result = $check_data->result_array();

        if(empty($result)){
            //jika username belum ada, maka data akan ditambahkan ke tabel
            $this->db->insert('makanan', $data);
        }else{
            $data = array();
        }
        return $data;
    }

    //function update data makanan dengasn melihat id makanan
    public function updateMakanan($data, $id_makanan){
        //update data dimana id_makanan memenuhi syarat
        $this->db->where('id_makanan', $id_makanan);
        $this->db->update('makanan', $data);

        $result = $this->db->get_where('makanan', array('id_makanan' =>$id_makanan ));

        return $result->row_array();
    }


    //function menghapus  data di tabel makanan dengan melihat id makanan
    public function deleteMakanan($id_makanan){
        $result = $this->db->get_where('makanan', array('id_makanan' => $id_makanan ));
        //delete data
        $this->db->where('id_makanan', $id_makanan);
        $this->db->delete('makanan');

        return $result->row_array();
    }

}