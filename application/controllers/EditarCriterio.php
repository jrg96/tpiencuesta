<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditarCriterio extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('Evaluacion_model');
		$this->load->model('Seccion_model');
		$this->load->model('Criterio_model');
        $this->load->library('session');
    }
    
    public function index($id_evaluacion, $id_seccion, $id_criterio)
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
		$id_seccion = $id_seccion;
		$id_criterio = $id_criterio;
		
		/////////////////////////// Obtener datos DB /////////////////////////////
		$evaluacion_datos = $this->Evaluacion_model->obtener_datos_evaluacion($id_usuario, $id_evaluacion);
		$seccion_datos = $this->Seccion_model->obtener_datos_seccion($id_evaluacion, $id_seccion);
		$criterio_datos = $this->Criterio_model->obtener_datos_criterio($id_seccion, $id_criterio);
		$secciones = $this->Seccion_model->obtener_seccion_evaluacion($id_evaluacion);
		
		/////////////////////////// Despliegue ///////////////////////////////////
        $this->smarty->assign(array(
            'base_url' => base_url(),
			'resultado_operacion' => $resultado_operacion,
			'mensaje_operacion' => $mensaje_operacion,
			'evaluacion' => $evaluacion_datos,
			'seccion_especifica' => $seccion_datos,
			'criterio' => $criterio_datos,
			'secciones' => $secciones
        ));
        $this->smarty->view('editar_criterio.php');
    }
	
	public function procesar()
	{
		/////////////////////////// Variables utilizadas /////////////////////////
		$valido = true;
		$id_usuario = $this->session->userdata('id_usuario');
		
		/////////////////////////// Captura de datos /////////////////////////////
		$id_evaluacion = $this->input->post('id_evaluacion');
		$id_seccion = $this->input->post('id_seccion');
		$id_criterio = $this->input->post('id_criterio');
		$min = $this->input->post('minimo');
		$max = $this->input->post('maximo');
		$nombre_criterio = $this->input->post('nombre_criterio');
		$seccion_agregar = $this->input->post('seccion_agregar');
		
		/////////////////////////// Validacion de datos //////////////////////////
		if (empty($id_evaluacion) || empty($nombre_criterio) || (empty($min) && $min != "0") || empty($max) || empty($id_seccion))
		{
			$valido = false;
			$this->session->set_userdata('resultado_operacion','error');
			$this->session->set_userdata('mensaje_operacion','No puede haber datose en blanco');
		}
		
		/////////////////////////// Ejecucion de logica //////////////////////////
		if ($valido)
		{
			$this->Criterio_model->modificar_datos_criterio($id_evaluacion, $id_criterio, $id_seccion, $nombre_criterio, $min, $max);
			$this->session->set_userdata('resultado_operacion','exito');
			$this->session->set_userdata('mensaje_operacion','La edicion ha sido realizada con exito');
		}
		
		redirect('/editarcriterio/index/' . $id_evaluacion . '/' . $id_seccion . '/' . $id_criterio);
	}
}
