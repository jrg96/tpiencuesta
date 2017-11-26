<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditarMateria extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('Materia_model');
        $this->load->library('session');
    }
    
    public function index($id_materia)
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
		$id_materia = $id_materia;
		
		/////////////////////////// Validacion ///////////////////////////////////
		if (!$this->Materia_model->puede_editar_materia($id_usuario, $id_materia))
		{
			$this->session->set_userdata('resultado_operacion','error');
			$this->session->set_userdata('mensaje_operacion','No tiene permiso para editar materia respectiva');
			redirect('/miespacio/index');
		}
		
		/////////////////////////// Obtener datos DB /////////////////////////////
		$materia_datos = $this->Materia_model->obtener_datos_materia($id_usuario, $id_materia);
		
		/////////////////////////// Despliegue ///////////////////////////////////
        $this->smarty->assign(array(
            'base_url' => base_url(),
			'resultado_operacion' => $resultado_operacion,
			'mensaje_operacion' => $mensaje_operacion,
			'materia' => $materia_datos
        ));
        $this->smarty->view('editar_materia.php');
    }
	
	public function procesar()
	{
		/////////////////////////// Variables utilizadas /////////////////////////
		$valido = true;
		$id_usuario = $this->session->userdata('id_usuario');
		
		/////////////////////////// Captura de datos /////////////////////////////
		$id_materia = $this->input->post('id_materia');
		$codigo_materia = $this->input->post('codigo_materia');
		$nombre_materia = $this->input->post('nombre_materia');
		
		/////////////////////////// Validacion de datos //////////////////////////
		if (empty($id_usuario) || empty($id_materia) || empty($nombre_materia) || empty($codigo_materia))
		{
			$valido = false;
			$this->session->set_userdata('resultado_operacion','error');
			$this->session->set_userdata('mensaje_operacion','No puede haber datose en blanco');
		}
		
		/////////////////////////// Ejecucion de logica //////////////////////////
		if ($valido)
		{
			$this->Materia_model->modificar_datos_materia($id_usuario, $id_materia, $codigo_materia, $nombre_materia);
			$this->session->set_userdata('resultado_operacion','exito');
			$this->session->set_userdata('mensaje_operacion','La edicion ha sido realizada con exito');
		}
		
		redirect('/editarmateria/index/' . $id_materia);
	}
}
