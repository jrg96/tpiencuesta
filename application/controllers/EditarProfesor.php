<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditarProfesor extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
		$this->load->model('Profesor_model');
		$this->load->model('Profesor_Materia_model');
		$this->load->model('Materia_model');
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
		
		/////////////////////////// Variables a utilizar /////////////////////////
		$id_usuario = $this->session->userdata('id_usuario');
		$id_profesor = $id_profesor;
		
		/////////////////////////// Validacion ///////////////////////////////////
		if (!$this->Profesor_model->puede_editar_profesor($id_usuario, $id_profesor))
		{
			$this->session->set_userdata('resultado_operacion','error');
			$this->session->set_userdata('mensaje_operacion','No tiene permiso para editar al profesor respectivo');
			redirect('/miespacio/index');
		}
		
		/////////////////////////// Obtener datos DB /////////////////////////////
		$profesor_datos = $this->Profesor_model->obtener_datos_profesor($id_usuario, $id_profesor);
		$materias = $this->Materia_model->obtener_materia_porusuario($id_usuario);
		$materias_impartidas = $this->Profesor_Materia_model->obtener_materia_porprofesor($id_profesor);
		
		/////////////////////////// Despliegue ///////////////////////////////////
        $this->smarty->assign(array(
            'base_url' => base_url(),
			'resultado_operacion' => $resultado_operacion,
			'mensaje_operacion' => $mensaje_operacion,
			'profesor' => $profesor_datos,
			'materias' => $materias,
			'materias_impartidas' => $materias_impartidas
        ));
        $this->smarty->view('editar_profesor.php');
    }
	
	public function procesar()
	{
		/////////////////////////// Variables utilizadas /////////////////////////
		$valido = true;
		$id_usuario = $this->session->userdata('id_usuario');
		
		/////////////////////////// Captura de datos /////////////////////////////
		$id_profesor = $this->input->post('id_profesor');
		$nombre_profesor = $this->input->post('nombre_profesor');
		$carrera_profesor = $this->input->post('carrera_profesor');
		
		/////////////////////////// Validacion de datos //////////////////////////
		if (empty($id_usuario) || empty($id_profesor) || empty($nombre_profesor) || empty($carrera_profesor))
		{
			$valido = false;
			$this->session->set_userdata('resultado_operacion','error');
			$this->session->set_userdata('mensaje_operacion','No puede haber datose en blanco');
		}
		
		/////////////////////////// Ejecucion de logica //////////////////////////
		if ($valido)
		{
			$this->Profesor_model->modificar_datos_profesor($id_usuario, $id_profesor, $nombre_profesor, $carrera_profesor);
			$this->session->set_userdata('resultado_operacion','exito');
			$this->session->set_userdata('mensaje_operacion','La edicion ha sido realizada con exito');
		}
		
		redirect('/editarprofesor/index/' . $id_profesor);
	}
	
	public function procesarmateria()
	{
		/////////////////////////// Variables utilizadas /////////////////////////
		$valido = true;
		$id_usuario = $this->session->userdata('id_usuario');
		
		/////////////////////////// Captura de datos /////////////////////////////
		$id_profesor = $this->input->post('id_profesor');
		$id_materia = $this->input->post('materia_agregar');
		
		/////////////////////////// Validacion de datos //////////////////////////
		if ($this->Profesor_Materia_model->existe_relacion_profesor_materia($id_profesor, $id_materia))
		{
			$valido = false;
			$this->session->set_userdata('resultado_operacion','error');
			$this->session->set_userdata('mensaje_operacion','Profesor ya tiene asignada esa materia');
		}
		
		/////////////////////////// Ejecucion de logica //////////////////////////
		if ($valido)
		{
			$this->Profesor_Materia_model->insertar_detalle_materia_profesor($id_profesor, $id_materia);
			$this->session->set_userdata('resultado_operacion','exito');
			$this->session->set_userdata('mensaje_operacion','Se le ha asignado la materia al profesor exitosamente');
		}
		
		redirect('/editarprofesor/index/' . $id_profesor);
	}
	
}
