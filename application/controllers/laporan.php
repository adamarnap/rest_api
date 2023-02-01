<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';



//nama : adam arnap
//nim  : 19.12.1311
//kls  : Si 06

class Laporan extends REST_Controller{
    //berfungsi sebagai fungsi yang di jalakan pertama kali pada kontroller laporan

    //declare constructor
    function __construct(){
        parent::__construct();
        $this->load->model('Laporan_model'); // untuk memanggil model "laporan_model.php"
    }

    //function get/show data laporan
    function index_get(){ //berfungsi untuk menampilkan data laporan dari data abse ddenngan penghubung yaitu laporan_model
 
        $data = $this->Laporan_model->getLaporan();

        $result = $data;

        //show response
        $this->response($result, REST_Controller::HTTP_OK);
    }



}