<?php
defined('BASEPATH') OR exit('No direct script access allowed');


////////////////////////////////////TIPO: Pagina Admin ////////////////////////
class EliminarSeccion extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('Seccion_model');
        $this->load->library('session');
    }
    
	public function index($id_seccion)
	{
		/////////////////////////// Redireccion seguridad ////////////////////////
		if (!$this->session->userdata('id_usuario'))
		{
			redirect('/login/index');
		}
		
		$this->Seccion_model->eliminar_seccion($id_seccion);
		
		$this->session->set_userdata('resultado_operacion','exito');
		$this->session->set_userdata('mensaje_operacion','Seccion eliminado con exito');
		
		redirect('/miespacio/index');
	}
}
