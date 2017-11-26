<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CrearMateria extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('Materia_model');
        $this->load->library('session');
    }
    
    public function index()
    {
		/////////////////////////// Redireccion seguridad ////////////////////////
		if (!$this->session->userdata('id_usuario'))
		{
			redirect('/login/index');
		}
		
		/////////////////////////// Mensajes de la aplicacion ////////////////////
		$resultado_operacion = 'ninguna';
        $mensaje_operacion = 'm';
        
        if ($this->session->userdata('resultado_operacion'))
        {
            $resultado_operacion = $this->session->userdata('resultado_operacion');
            $mensaje_operacion = $this->session->userdata('mensaje_operacion');
            
            $this->session->unset_userdata('resultado_operacion');
            $this->session->unset_userdata('mensaje_operacion');
        }
		
		/////////////////////////// Despliegue ////////////////////////////////////
        $this->smarty->assign(array(
            'base_url' => base_url(),
			'resultado_operacion' => $resultado_operacion,
			'mensaje_operacion' => $mensaje_operacion
        ));
        $this->smarty->view('crear_materia.php');
    }
	
	public function procesar()
	{
		/////////////////////////// Variables utilizadas /////////////////////////
		$valido = true;
		
		/////////////////////////// Captura de datos /////////////////////////////
		$id_usuario = $this->session->userdata('id_usuario');
		$codigo_materia = $this->input->post('codigo_materia');
		$nombre_materia = $this->input->post('nombre_materia');
		
		/////////////////////////// Validacion de datos //////////////////////////
		if (empty($id_usuario) || empty($codigo_materia) || empty($nombre_materia))
		{
			$valido = false;
			$this->session->set_userdata('resultado_operacion','error');
			$this->session->set_userdata('mensaje_operacion','Rellene todos los campos por favor');
		}
		
		/////////////////////////// Ejecucion de logica //////////////////////////
		if ($valido)
		{
			$this->Materia_model->insertar_materia($id_usuario, $codigo_materia, $nombre_materia);
			$this->session->set_userdata('resultado_operacion','exito');
			$this->session->set_userdata('mensaje_operacion','La creacion ha sido realizada con exito');
		}
		
		redirect('/crearmateria/index');
	}
}
