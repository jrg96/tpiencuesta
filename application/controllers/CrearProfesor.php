<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CrearProfesor extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('Profesor_model');
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
        $this->smarty->view('crear_profesor.php');
    }
	
	public function procesar()
	{
		/////////////////////////// Variables utilizadas /////////////////////////
		$valido = true;
		
		/////////////////////////// Captura de datos /////////////////////////////
		$id_usuario = $this->session->userdata('id_usuario');
		$nombre_profesor = $this->input->post('nombre_profesor');
		$carrera_profesor = $this->input->post('carrera_profesor');
		
		/////////////////////////// Validacion de datos //////////////////////////
		if (empty($id_usuario) || empty($nombre_profesor) || empty($carrera_profesor))
		{
			$valido = false;
			$this->session->set_userdata('resultado_operacion','error');
			$this->session->set_userdata('mensaje_operacion','Rellene todos los campos por favor');
		}
		
		/////////////////////////// Ejecucion de logica //////////////////////////
		if ($valido)
		{
			$this->Profesor_model->insertar_profesor($id_usuario, $nombre_profesor, $carrera_profesor);
			$this->session->set_userdata('resultado_operacion','exito');
			$this->session->set_userdata('mensaje_operacion','La creacion ha sido realizada con exito');
		}
		
		redirect('/crearprofesor/index');
	}
}
