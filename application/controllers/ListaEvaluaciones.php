<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ListaEvaluaciones extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('Profesor_model');
		$this->load->model('Evaluacion_model');
        $this->load->library('session');
    }
    
    public function index($id_profesor)
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
		
		/////////////////////////// Variables a utilizar //////////////////////////
		$id_usuario = $this->session->userdata('id_usuario');
		$id_profesor = $id_profesor;
		
		/////////////////////////// Obtener datos DB //////////////////////////////
		$id_usuario = $this->session->userdata('id_usuario');
		$id_profesor = $id_profesor;
		$profesor_datos = $this->Profesor_model->obtener_datos_profesor($id_usuario, $id_profesor);
		$evaluaciones = $this->Evaluacion_model->obtener_evaluacion_porprofesor($id_usuario, $id_profesor);
		
		/////////////////////////// Despliegue ////////////////////////////////////
        $this->smarty->assign(array(
            'base_url' => base_url(),
			'resultado_operacion' => $resultado_operacion,
            'mensaje_operacion' => $mensaje_operacion,
			'profesor' => $profesor_datos,
			'evaluaciones' => $evaluaciones
        ));
        $this->smarty->view('lista_evaluaciones_profesor.php');
    }
}
