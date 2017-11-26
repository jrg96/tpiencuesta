<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MiEspacio extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('Usuario_model');
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
		
		/////////////////////////// Obtener datos DB //////////////////////////////
		$id_usuario = $this->session->userdata('id_usuario');
		$profesores = $this->Profesor_model->obtener_profesor_porusuario($id_usuario);
		
		/////////////////////////// Despliegue ////////////////////////////////////
        $this->smarty->assign(array(
            'base_url' => base_url(),
			'resultado_operacion' => $resultado_operacion,
            'mensaje_operacion' => $mensaje_operacion,
			'profesores' => $profesores
        ));
        $this->smarty->view('espacio_usuario.php');
    }
	
	public function procesar()
	{
		/////////////////////////// Variables utilizadas /////////////////////////
		$valido = true;
		$usuario_data = null;
		
		/////////////////////////// Captura datos ////////////////////////////////
		$email = $this->input->post('txtEmail');
		$pwd = $this->input->post('txtContrasenia');
		
		/////////////////////////// Validacion datos /////////////////////////////
		if (!$this->Usuario_model->comprobar_credenciales($email, $pwd))
		{
			$valido = false;
			$this->session->set_userdata('resultado_operacion','error');
			$this->session->set_userdata('mensaje_operacion','Credenciales no validos');
		}
		
		/////////////////////////// Ejecucion de logica //////////////////////////
		if ($valido)
		{
			$usuario_data = $this->Usuario_model->obtener_usuario($email);
			//$this->session->set_userdata('id_usuario', $usuario_data['id_usuario']);
		}
		else
		{
			redirect('/login/index');
		}
	}
}
