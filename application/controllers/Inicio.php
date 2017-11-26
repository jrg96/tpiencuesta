<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }
    
    public function index()
    {
		/////////////////////////// Redireccion por logueo ///////////////////////
		if ($this->session->userdata('id_usuario'))
		{
			redirect('/miespacio/index');
		}
		
        $this->smarty->assign(array(
            'base_url' => base_url()
        ));
        $this->smarty->view('inicio.php');
    }
}
