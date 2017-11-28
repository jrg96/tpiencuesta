<?php
defined('BASEPATH') OR exit('No direct script access allowed');


////////////////////////////////////TIPO: Pagina Admin ////////////////////////
class EliminarMateria extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('Materia_model');
        $this->load->library('session');
    }
    
	public function index($id_materia)
	{
		/////////////////////////// Redireccion seguridad ////////////////////////
		if (!$this->session->userdata('id_usuario'))
		{
			redirect('/login/index');
		}
		
		$this->Materia_model->eliminar_materia($id_materia);
		
		$this->session->set_userdata('resultado_operacion','exito');
		$this->session->set_userdata('mensaje_operacion','Materia eliminado con exito');
		
		redirect('/miespacio/index');
	}
}
