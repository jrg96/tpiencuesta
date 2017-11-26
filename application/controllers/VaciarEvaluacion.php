<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VaciarEvaluacion extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('RespuestaEvaluacion_model');
		$this->load->model('RespuestaCriterio_model');
        $this->load->library('session');
    }
    
    public function index($id_evaluacion)
    {
		// Obtener todas las respuestas a esa evaluacion
		$respuestas = $this->RespuestaEvaluacion_model->obtener_respuesta_evaluacion($id_evaluacion);
		
		foreach ($respuestas as $respuesta)
		{
			$this->RespuestaCriterio_model->eliminar_respuesta_criterio($respuesta['id_respuesta_evaluacion']);
			$this->RespuestaEvaluacion_model->eliminar_respuesta_evaluacion($respuesta['id_respuesta_evaluacion']);
		}
		
		$this->session->set_userdata('resultado_operacion','exito');
			$this->session->set_userdata('mensaje_operacion','Evaluacion vaciada con exito');
		redirect('/editarevaluacion/index/' . $id_evaluacion);
    }
}
