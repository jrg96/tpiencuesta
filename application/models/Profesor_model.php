<?php
class Profesor_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    public function insertar_profesor($id_usuario, $nombre_profesor, $carrera_profesor)
    {
		$datos = array(
			'id_usuario' => $id_usuario,
			'nombre_profesor' => $nombre_profesor,
			'carrera_profesor' => $carrera_profesor
		);
		
		// Insertandolo en la base de datos
		$this->db->db_debug = FALSE;
		$this->db->insert('tbl_profesor', $datos);
		$err = $this->db->error();
        $this->db->db_debug = TRUE;
        
        // Ver codigo de error
        if ($err['code'] == 0)
        {
            return true;
        }
        return false;
    }
	
	public function obtener_profesor_porusuario($id_usuario)
	{
		$this->db->select('*');
        $this->db->from('tbl_profesor');
		$this->db->where('id_usuario', $id_usuario);
		$query = $this->db->get()->result_array();
		
		return $query;
	}
	
	public function puede_editar_profesor($id_usuario, $id_profesor)
	{
		$datos = array(
			'id_usuario' => $id_usuario,
			'id_profesor' => $id_profesor
		);
		
		$this->db->select('*');
        $this->db->from('tbl_profesor');
		$this->db->where($datos);
		$query = $this->db->get()->result_array();
		$coincidencias = count($query);
		
		if ($coincidencias > 0)
		{
			return true;
		}
		return false;
	}
	
	public function obtener_datos_profesor($id_usuario, $id_profesor)
	{
		$datos = array(
			'id_usuario' => $id_usuario,
			'id_profesor' => $id_profesor
		);
		
		$this->db->select('*');
        $this->db->from('tbl_profesor');
		$this->db->where($datos);
		$query = $this->db->get()->result_array();
		
		return $query[0];
	}
	
	public function modificar_datos_profesor($id_usuario, $id_profesor, $nombre_profesor, $carrera_profesor)
	{
		$datos = array(
			'nombre_profesor' => $nombre_profesor,
			'carrera_profesor' => $carrera_profesor
		);
		
		$condicion = array(
			'id_usuario' => $id_usuario,
			'id_profesor' => $id_profesor
		);
		
		// Realizar update
        $this->db->db_debug = FALSE;
        $this->db->where($condicion);
        $this->db->update('tbl_profesor', $datos);
        $err = $this->db->error();
        $this->db->db_debug = TRUE;
		
		// Ver codigo de error
        if ($err['code'] == 0)
        {
            return true;
        }
        return false;
	}
	
	public function eliminar_profesor($id_profesor)
	{
		$this->db->delete('tbl_profesor', array('id_profesor' => $id_profesor));
	}
}