<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MostrarEvaluacion extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('Evaluacion_model');
		$this->load->model('Seccion_model');
		$this->load->model('Criterio_model');
		$this->load->model('RespuestaEvaluacion_model');
		$this->load->model('RespuestaCriterio_model');
        $this->load->library('session');
    }
    
    public function index($id_evaluacion)
    {
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
		
		/////////////////////////// Variables a utilizar /////////////////////////
		$id_evaluacion = $id_evaluacion;
		
		/////////////////////////// Obtener datos DB /////////////////////////////
		$evaluacion_datos = $this->Evaluacion_model->obtener_datos_evaluacion2($id_evaluacion);
		$secciones = $this->Seccion_model->obtener_seccion_evaluacion($id_evaluacion);
		$arr_secciones_criterios = array();
		
		foreach ($secciones as $seccion)
		{
			$arr_seccion_interno = array();
			$arr_criterios_final = array();
			$criterios_seccion = $this->Criterio_model->obtener_criterio_seccion($seccion['id_seccion_evaluacion']);
			
			foreach($criterios_seccion as $criterio)
			{
				$arr_criterio_interno = array();
				$arr_valores = array();
				
				for ($i = intval($criterio['minimo']); $i <= intval($criterio['maximo']); $i++)
				{
					array_push($arr_valores, $i);
				}
				
				$arr_criterio_interno['criterio'] = $criterio;
				$arr_criterio_interno['valores'] = $arr_valores;
				array_push($arr_criterios_final, $arr_criterio_interno);
			}
			$arr_seccion_interno['seccion'] = $seccion;
			$arr_seccion_interno['criterios'] = $arr_criterios_final;
			array_push($arr_secciones_criterios, $arr_seccion_interno);
		}
		
		/////////////////////////// Despliegue ///////////////////////////////////
        $this->smarty->assign(array(
            'base_url' => base_url(),
			'resultado_operacion' => $resultado_operacion,
			'mensaje_operacion' => $mensaje_operacion,
			'evaluacion' => $evaluacion_datos,
			'datos_desplegar' => $arr_secciones_criterios
        ));
        $this->smarty->view('mostrar_evaluacion.php');
    }
	
	public function procesar()
	{
		/////////////////////////// Capturando datos ////////////////////////////
		$id_evaluacion = $this->input->post('id_evaluacion');
		
		/////////////////////////// Logica de ejecucion /////////////////////////
		// Obtener todas los nombres de los campos
		$nombres_campos = array_keys($this->input->post());
		
		// Crear respuesta evaluacion
		$id_respuesta_evaluacion = $this->RespuestaEvaluacion_model->insertar_respuestaevaluacion($id_evaluacion);
		
		for ($i = 1; $i < count($nombres_campos); $i++)
		{
			$valor = $this->input->post($nombres_campos[$i]);
			$partes = explode('_', $nombres_campos[$i]);
			echo var_dump($partes);
			$id_evaluacion = $id_evaluacion;
			$id_seccion = $partes[1];
			$id_criterio = $partes[2];
			
			$this->RespuestaCriterio_model->insertar_respuestacriterio($id_respuesta_evaluacion, $id_seccion, $id_criterio, $valor);
		}
		
		$this->session->set_userdata('resultado_operacion','exito');
		$this->session->set_userdata('mensaje_operacion','La creacion ha sido realizada con exito');
		
		redirect('/mostrarevaluacion/index/' . $id_evaluacion);
	}
}
