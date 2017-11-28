<?php
defined('BASEPATH') OR exit('No direct script access allowed');


////////////////////////////////////TIPO: Pagina Admin ////////////////////////
class EliminarProfesor extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('Profesor_model');
        $this->load->library('session');
    }
    
	public function index($id_profesor)
	{
		/////////////////////////// Redireccion seguridad ////////////////////////
		if (!$this->session->userdata('id_usuario'))
		{
			redirect('/login/index');
		}
		
		$this->Profesor_model->eliminar_profesor($id_profesor);
		
		$this->session->set_userdata('resultado_operacion','exito');
		$this->session->set_userdata('mensaje_operacion','Usuario eliminado con exito');
		
		redirect('/miespacio/index');
	}
}
