<?php
class Materia_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    public function insertar_materia($id_usuario, $codigo_materia, $nombre_materia)
    {
		$datos = array(
			'id_usuario' => $id_usuario,
			'codigo_materia' => $codigo_materia,
			'nombre_materia' => $nombre_materia
		);
		
		// Insertandolo en la base de datos
		$this->db->db_debug = FALSE;
		$this->db->insert('tbl_materia', $datos);
		$err = $this->db->error();
        $this->db->db_debug = TRUE;
        
        // Ver codigo de error
        if ($err['code'] == 0)
        {
            return true;
        }
        return false;
    }
	
	public function obtener_materia_porusuario($id_usuario)
	{
		$this->db->select('*');
        $this->db->from('tbl_materia');
		$this->db->where('id_usuario', $id_usuario);
		$query = $this->db->get()->result_array();
		
		return $query;
	}
	
	public function puede_editar_materia($id_usuario, $id_materia)
	{
		$datos = array(
			'id_usuario' => $id_usuario,
			'id_materia' => $id_materia
		);
		
		$this->db->select('*');
        $this->db->from('tbl_materia');
		$this->db->where($datos);
		$query = $this->db->get()->result_array();
		$coincidencias = count($query);
		
		if ($coincidencias > 0)
		{
			return true;
		}
		return false;
	}
	
	public function obtener_datos_materia($id_usuario, $id_materia)
	{
		$datos = array(
			'id_usuario' => $id_usuario,
			'id_materia' => $id_materia
		);
		
		$this->db->select('*');
        $this->db->from('tbl_materia');
		$this->db->where($datos);
		$query = $this->db->get()->result_array();
		
		return $query[0];
	}
	
	public function modificar_datos_materia($id_usuario, $id_materia, $codigo_materia, $nombre_materia)
	{
		$datos = array(
			'codigo_materia' => $codigo_materia,
			'nombre_materia' => $nombre_materia
		);
		
		$condicion = array(
			'id_usuario' => $id_usuario,
			'id_materia' => $id_materia
		);
		
		// Realizar update
        $this->db->db_debug = FALSE;
        $this->db->where($condicion);
        $this->db->update('tbl_materia', $datos);
        $err = $this->db->error();
        $this->db->db_debug = TRUE;
		
		// Ver codigo de error
        if ($err['code'] == 0)
        {
            return true;
        }
        return false;
	}
}