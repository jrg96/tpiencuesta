<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditarContenidoEvaluacion extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('Evaluacion_model');
		$this->load->model('Seccion_model');
		$this->load->model('Criterio_model');
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
		
		/////////////////////////// Variables a utilizar //////////////////////////
		$id_usuario = $this->session->userdata('id_usuario');
		$id_evaluacion = $id_evaluacion;
		
		/////////////////////////// Obtener datos de la DB ////////////////////////
		$evaluacion_datos = $this->Evaluacion_model->obtener_datos_evaluacion($id_usuario, $id_evaluacion);
		$secciones = $this->Seccion_model->obtener_seccion_evaluacion($id_evaluacion);
		$arr_secciones_criterios = array();
		
		foreach ($secciones as $seccion)
		{
			$arr_seccion_interno = array();
			$criterios_seccion = $this->Criterio_model->obtener_criterio_seccion($seccion['id_seccion_evaluacion']);
			$arr_seccion_interno['seccion'] = $seccion;
			$arr_seccion_interno['criterios'] = $criterios_seccion;
			array_push($arr_secciones_criterios, $arr_seccion_interno);
		}
		
		/////////////////////////// Despliegue ////////////////////////////////////
        $this->smarty->assign(array(
            'base_url' => base_url(),
			'resultado_operacion' => $resultado_operacion,
            'mensaje_operacion' => $mensaje_operacion,
			'evaluacion' => $evaluacion_datos,
			'secciones' => $secciones,
			'datos_desplegar' => $arr_secciones_criterios
        ));
        $this->smarty->view('editar_contenido_evaluacion.php');
    }
	
	public function procesarseccion()
	{
		/////////////////////////// Variables utilizadas /////////////////////////
		$valido = true;
		
		/////////////////////////// Captura de datos /////////////////////////////
		$id_evaluacion = $this->input->post('id_evaluacion');
		$nombre_seccion = $this->input->post('nombre_seccion');
		
		/////////////////////////// Validacion de datos //////////////////////////
		if (empty($id_evaluacion) || empty($nombre_seccion))
		{
			$valido = false;
			$this->session->set_userdata('resultado_operacion','error');
			$this->session->set_userdata('mensaje_operacion','Rellene todos los campos por favor');
		}
		
		/////////////////////////// Ejecucion de logica //////////////////////////
		if ($valido)
		{
			$this->Seccion_model->insertar_seccion($id_evaluacion, $nombre_seccion);
			$this->session->set_userdata('resultado_operacion','exito');
			$this->session->set_userdata('mensaje_operacion','La creacion ha sido realizada con exito');
		}
		
		redirect('/editarcontenidoevaluacion/index/' . $id_evaluacion);
	}
	
	public function procesarcriterio()
	{
		/////////////////////////// Variables utilizadas /////////////////////////
		$valido = true;
		
		/////////////////////////// Captura de datos /////////////////////////////
		$id_evaluacion = $this->input->post('id_evaluacion');
		$nombre_criterio = $this->input->post('nombre_criterio');
		$min = $this->input->post('minimo');
		$max = $this->input->post('maximo');
		$id_seccion = $this->input->post('seccion_agregar');
		
		/////////////////////////// Validacion de datos //////////////////////////
		if (empty($id_evaluacion) || empty($nombre_criterio) || (empty($min) && $min != "0") || empty($max) || empty($id_seccion))
		{
			$valido = false;
			$this->session->set_userdata('resultado_operacion','error');
			$this->session->set_userdata('mensaje_operacion','Rellene todos los campos por favor');
		}
		
		if (intval($min) >= intval($max))
		{
			$valido = false;
			$this->session->set_userdata('resultado_operacion','error');
			$this->session->set_userdata('mensaje_operacion','el campo minimo debe tener un numero menor que el maximo');
		}
		
		/////////////////////////// Ejecucion de logica //////////////////////////
		if ($valido)
		{
			$this->Criterio_model->insertar_criterio($id_seccion, $nombre_criterio, $min, $max);
			$this->session->set_userdata('resultado_operacion','exito');
			$this->session->set_userdata('mensaje_operacion','La creacion ha sido realizada con exito');
		}
		
		redirect('/editarcontenidoevaluacion/index/' . $id_evaluacion);
	}
}
