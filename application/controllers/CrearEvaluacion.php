<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CrearEvaluacion extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('Profesor_model');
		$this->load->model('Evaluacion_model');
		$this->load->model('Profesor_Materia_model');
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
		
		/////////////////////////// Variablesa utilizar //////////////////////////
		$id_usuario = $this->session->userdata('id_usuario');
		$id_profesor = $id_profesor;
		
		/////////////////////////// Obtener datos de la DB ///////////////////////
		$profesor_datos = $this->Profesor_model->obtener_datos_profesor($id_usuario, $id_profesor);
		$materias_impartidas = $this->Profesor_Materia_model->obtener_materia_porprofesor($id_profesor);
		
		/////////////////////////// Despliegue ///////////////////////////////////
        $this->smarty->assign(array(
            'base_url' => base_url(),
			'resultado_operacion' => $resultado_operacion,
			'mensaje_operacion' => $mensaje_operacion,
			'profesor' => $profesor_datos,
			'materias_impartidas' => $materias_impartidas
        ));
        $this->smarty->view('crear_evaluacion_profesor.php');
    }
	
	public function procesar()
	{
		/////////////////////////// Variables utilizadas /////////////////////////
		$valido = true;
		
		/////////////////////////// Captura de datos /////////////////////////////
		$id_usuario = $this->session->userdata('id_usuario');
		$id_profesor = $this->input->post('id_profesor');
		$id_materia = $this->input->post('materia_evaluar');
		$nombre_evaluacion = $this->input->post('nombre_evaluacion');
		
		/////////////////////////// Validacion de datos //////////////////////////
		if (empty($nombre_evaluacion))
		{
			$valido = false;
			$this->session->set_userdata('resultado_operacion','error');
			$this->session->set_userdata('mensaje_operacion','Rellene todos los campos por favor');
		}
		
		/////////////////////////// Ejecucion de logica //////////////////////////
		if ($valido)
		{
			$this->Evaluacion_model->insertar_evaluacion($id_usuario, $id_profesor, $id_materia, $nombre_evaluacion);
			$this->session->set_userdata('resultado_operacion','exito');
			$this->session->set_userdata('mensaje_operacion','La creacion ha sido realizada con exito');
		}
		
		redirect('/crearevaluacion/index/' . $id_profesor);
	}
}
