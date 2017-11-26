<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MostrarEstadisticasEvaluacion extends CI_Controller {
	
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
		
		/////////////////////////// Variables a utilizar /////////////////////////
		$id_usuario = $this->session->userdata('id_usuario');
		$id_evaluacion = $id_evaluacion;
		
		/////////////////////////// Obtener datos DB /////////////////////////////
		$evaluacion_datos = $this->Evaluacion_model->obtener_datos_evaluacion($id_usuario, $id_evaluacion);
		$secciones = $this->Seccion_model->obtener_seccion_evaluacion($id_evaluacion);
		$arr_secciones_criterios = array();
		
		$id_grafico = 0;
		foreach ($secciones as $seccion)
		{
			$arr_seccion_interno = array();
			$arr_criterios_final = array();
			$criterios_seccion = $this->Criterio_model->obtener_criterio_seccion($seccion['id_seccion_evaluacion']);
			
			foreach($criterios_seccion as $criterio)
			{
				$arr_criterio_interno = array();
				$arr_valores = array();
				$arr_cuenta = array();
				
				for ($i = intval($criterio['minimo']); $i <= intval($criterio['maximo']); $i++)
				{
					$valor = $i;
					$id_criterio = $criterio['id_criterio_seccion'];
					$id_seccion = $seccion['id_seccion_evaluacion'];
					
					array_push($arr_valores, $i);
					$cuenta = $this->RespuestaCriterio_model->contar_criterio($id_seccion, $id_criterio, $valor);
					array_push($arr_cuenta, $cuenta);
				}
				
				$arr_criterio_interno['criterio'] = $criterio;
				$arr_criterio_interno['valores'] = join(',', $arr_valores);
				$arr_criterio_interno['cuenta'] = join(',', $arr_cuenta);
				$arr_criterio_interno['id_grafico'] = $id_grafico;
				array_push($arr_criterios_final, $arr_criterio_interno);
				
				$id_grafico++;
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
        $this->smarty->view('mostrar_estadisticas_evaluacion.php');
    }
}
