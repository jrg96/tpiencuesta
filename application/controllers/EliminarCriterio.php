<?php
defined('BASEPATH') OR exit('No direct script access allowed');


////////////////////////////////////TIPO: Pagina Admin ////////////////////////
class EliminarCriterio extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('Criterio_model');
        $this->load->library('session');
    }
    
	public function index($id_criterio_seccion)
	{
		/////////////////////////// Redireccion seguridad ////////////////////////
		if (!$this->session->userdata('id_usuario'))
		{
			redirect('/login/index');
		}
		
		$this->Criterio_model->eliminar_criterio($id_criterio_seccion);
		
		$this->session->set_userdata('resultado_operacion','exito');
		$this->session->set_userdata('mensaje_operacion','Criterio eliminado con exito');
		
		redirect('/miespacio/index');
	}
}
