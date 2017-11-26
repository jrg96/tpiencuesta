<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditarSeccion extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('Evaluacion_model');
		$this->load->model('Seccion_model');
        $this->load->library('session');
    }
    
    public function index($id_evaluacion, $id_seccion)
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
		
		/////////////////////////// Obtener datos DB /////////////////////////////
		$evaluacion_datos = $this->Evaluacion_model->obtener_datos_evaluacion($id_usuario, $id_evaluacion);
		$seccion_datos = $this->Seccion_model->obtener_datos_seccion($id_evaluacion, $id_seccion);
		
		/////////////////////////// Despliegue ///////////////////////////////////
        $this->smarty->assign(array(
            'base_url' => base_url(),
			'resultado_operacion' => $resultado_operacion,
			'mensaje_operacion' => $mensaje_operacion,
			'evaluacion' => $evaluacion_datos,
			'seccion' => $seccion_datos
        ));
        $this->smarty->view('editar_seccion.php');
    }
	
	public function procesar()
	{
		/////////////////////////// Variables utilizadas /////////////////////////
		$valido = true;
		$id_usuario = $this->session->userdata('id_usuario');
		
		/////////////////////////// Captura de datos /////////////////////////////
		$id_evaluacion = $this->input->post('id_evaluacion');
		$id_seccion = $this->input->post('id_seccion');
		$nombre_seccion = $this->input->post('nombre_seccion');
		
		/////////////////////////// Validacion de datos //////////////////////////
		if (empty($id_evaluacion) || empty($id_seccion) || empty($nombre_seccion))
		{
			$valido = false;
			$this->session->set_userdata('resultado_operacion','error');
			$this->session->set_userdata('mensaje_operacion','No puede haber datose en blanco');
		}
		
		/////////////////////////// Ejecucion de logica //////////////////////////
		if ($valido)
		{
			$this->Seccion_model->modificar_datos_seccion($id_evaluacion, $id_seccion, $nombre_seccion);
			$this->session->set_userdata('resultado_operacion','exito');
			$this->session->set_userdata('mensaje_operacion','La edicion ha sido realizada con exito');
		}
		
		redirect('/editarseccion/index/' . $id_evaluacion . '/' . $id_seccion);
	}
}
