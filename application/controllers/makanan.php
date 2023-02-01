<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';



//nama : adam arnap
//nim  : 19.12.1311
//kls  : Si 06

class Makanan extends REST_Controller{
    //berfungsi sebagai fungsi yang di jalakan pertama kali pada kontroller makanan

    //declare constructor
    function __construct(){
        parent::__construct();
        $this->load->model('Makanan_model'); // untuk memanggil model "Makanan_model.php"
    }

    //function get/show data makanan
    function index_get(){ //berfungsi untuk menampilkan data makanan dari data abse ddenngan penghubung yaitu Makanan_model
        //call token_check
        // $this->token_check();



        //value parameter nama
        $nama = $this->get('nama');
        //call function getPengguna from model
        $data = $this->Makanan_model->getMakanan($nama);

        //respons 
        // $result = array(
        //     'status' => true,
        //     'message' => 'data found',
        //     'data' => array('pengguna' => $data)
        // );
        $result = $data;

        //show response
        $this->response($result, REST_Controller::HTTP_OK);
    }



    //function insert (POST)
    function index_post(){  //berfungsi untuk menambahkan menu makanan dengan penghubung makanan_model di function insert makanan
        //call token_check

        //validasi jika inputan kosong/format tidak sesuai
        $validasi_message = [];

        //jika id_makanan kosong
        if($this->post('id_makanan') == ''){
            array_push($validasi_message, 'Id Makanan tidak boleh kosong ya :) !!!');
        }

        //jika format id_makanan  tidak sesuai
        // if($this->post('id_makanan') != '' && !filter_var($this->post('id_makanan'), FILTER_VALIDATE_EMAIL ) ){
        //     array_push($validasi_message, 'id_makanan is invalid');
        // }


        //jika nama makanan kosong
        if($this->post('nama_makanan') == ''){
            array_push($validasi_message, 'nama makanan tidak boleh kosong ya :) !!!');
        }

        //jika harga kosong
        if($this->post('harga') == '' ){
            array_push($validasi_message, 'harga tidak boleh kosong ya :) !!!');
        }

        //jika gambar kosong
        if($this->post('gambar') == '' ){
            array_push($validasi_message, 'gambar tidak boleh kosong ya :) !!!');
        }

        //jika status kosong
        if($this->post('status') == '' ){
            array_push($validasi_message, 'status tidak boleh kosong ya :) !!!');
        }


        //show messsage
        if(count($validasi_message) > 0 ){
            $output = array(
            'status' => false,
            'message' => 'insert data failed, data not valid',
            'data' => $validasi_message
            );

            $this->response($output, REST_Controller::HTTP_OK);
            $this->output->_display();
            exit();
        }


        $data = array(
            'id_makanan' => $this->post('id_makanan'),
            'nama_makanan' => $this->post('nama_makanan'),
            'harga' => $this->post('harga'),
            'gambar' => $this->post('gambar'),
            'status' => $this->post('status')
        );

        //panggil function dari model
        $result = $this->Makanan_model->insertMakanan($data);

        //response
        if(empty($result)){
            $output = array(
                'status' => false,
            'message' => 'data already exists',
            'data' => null
            );
        }else{
            $output = array(
                'status' => true,
                'message' => 'insert data success',
                'data' => array('makanan' => $result)
            );
        }
        $this->response($output, REST_Controller::HTTP_OK);
    }




    //function for update (PUT) data makanan
    function index_put(){ //berfungsi untuk mengupdate makanan dengan makanan_model dari function updateMakanan
        //call token_check
        // $this->token_check();


        //get id_makanan
        $id_makanan = $this->put('id_makanan');

         //validasi jika inputan kosong/format tidak sesuai
         $validasi_message = [];

         //jika id_makanan kosong
         if($id_makanan == ''){
             array_push($validasi_message, 'id_makanan tidak boleh kosong ya :) !!!');
         }
 
         //jika format username (email) tidak sesuai
        //  if($username != '' && !filter_var($username, FILTER_VALIDATE_EMAIL ) ){
        //      array_push($validasi_message, 'Email is invalid');
        //  }
 
         //jika nama_makanan kosong
         if($this->put('nama_makanan') == ''){
             array_push($validasi_message, 'nama makanan tidak boleh kosong ya :) !!!');
         }
 
         //jika harga kosong
         if($this->put('harga') == '' ){
             array_push($validasi_message, 'harga tidak boleh kosong ya :) !!!');
         }
 
         //jika gambar kosong
         if($this->put('gambar') == '' ){
             array_push($validasi_message, 'gambar tidak boleh kosong ya :) !!!');
         }

         //jika status kosong
         if($this->put('status') == '' ){
            array_push($validasi_message, 'status tidak boleh kosong ya :) !!!');
        }
 
 
         //show messsage
         if(count($validasi_message) > 0 ){
             $output = array(
             'status' => false,
             'message' => 'insert data failed, data not valid',
             'data' => $validasi_message
             );
 
             $this->response($output, REST_Controller::HTTP_OK);
             $this->output->_display();
             exit();
         }

        //data yang akan diupdate
        $data = array(
            'nama_makanan' => $this->put('nama_makanan'),
            'harga' => $this->put('harga'),
            'gambar' => $this->put('gambar'),
            'status' => $this->put('status')
        );

        //call updateMakanan dari model
        $result = $this->Makanan_model->updateMakanan($data, $id_makanan);

        //response
        $output = array(
            'status' => true,
            'message' => 'update data success',
            'data' => array(
                'makanan' => $result
            )
            );

            $this->response($output, REST_Controller::HTTP_OK);
    }




    //function delete (DELETE) data
    function index_delete(){ //berfungsi untuk menghapus makanan dari makanan_model dengan funuction deleteMakanan
        //call token_check
        // $this->token_check();


        //get id_makanan
        $id_makanan = $this->delete('id_makanan');

        //validasi inputan jika kosong
        $validasi_message = [];

         //jika id_makanan kosong
         if($id_makanan == ''){
            array_push($validasi_message, 'id_makanan tidak boleh kosong ya :) !!!');
        }

        //jika format username (email) tidak sesuai
        // if($username != '' && !filter_var($username, FILTER_VALIDATE_EMAIL ) ){
        //     array_push($validasi_message, 'Email is invalid');
        // }

        //show messsage
        if(count($validasi_message) > 0 ){
            $output = array(
            'status' => false,
            'message' => 'delete data failed, data is invalid',
            'data' => $validasi_message
            );

            $this->response($output, REST_Controller::HTTP_OK);
            $this->output->_display();
            exit();
        }

        //panggil deleteMakanan dari model
        $result = $this->Makanan_model->deleteMakanan($id_makanan);

        //cek result
        if(empty($result)){
            $output = array(
                'status' => false,
                'message' => 'id_makanan not found',
                'data' => null
            );
        }else{
            $output = array(
                'status' => true,
                'message' => 'delete data success',
                'data' => array(
                    'makanan' => $result
                )
                );
        }

        $this->response($output, REST_Controller::HTTP_OK);

    }



}