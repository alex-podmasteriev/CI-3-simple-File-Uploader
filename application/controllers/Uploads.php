<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uploads extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $data = [ 'dir' => '/resources/uploads', 'input_name' => 'uploads' ];

        $this->load->library( 'Uploader', $data );

        $this->load->library('Lister', $data );

    }

    public function index() {


        $images = $this->lister->getFileList( );

        $this->load->view( 'uploads', [ 'images' => $images ] );
    }

    public function save(){

        $this->uploader->save();
    }


}

