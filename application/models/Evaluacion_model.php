<?php
class Evaluacion_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    public function insertar_evaluacion($id_usuario, $id_profesor, $id_materia, $nombre_evaluacion)
    {
		date_default_timezone_set("Europe/London");
		
		$objTimeZone = new DateTimeZone("Europe/London");
		$date = new DateTime();
		$date->setTimezone($objTimeZone);
		
		$datos = array(
			'id_usuario' => $id_usuario,
			'id_profesor' => $id_profesor,
			'id_materia' => $id_materia,
			'nombre_evaluacion' => $nombre_evaluacion,
			'fecha_creacion' => $date->format('Y-m-d H:i:s')
		);
		
		// Insertandolo en la base de datos
		$this->db->db_debug = FALSE;
		$this->db->insert('tbl_evaluacion', $datos);
		$err = $this->db->error();
        $this->db->db_debug = TRUE;
        
        // Ver codigo de error
        if ($err['code'] == 0)
        {
            return true;
        }
        return false;
    }
	
	public function obtener_evaluacion_porprofesor($id_usuario, $id_profesor)
	{
		$condicion = array(
			'tbl_evaluacion.id_usuario' => $id_usuario,
			'tbl_evaluacion.id_profesor' => $id_profesor
		);
		
		$this->db->select('*');
        $this->db->from('tbl_evaluacion');
		$this->db->join('tbl_materia', 'tbl_evaluacion.id_materia = tbl_materia.id_materia');
		$this->db->where($condicion);
		$query = $this->db->get()->result_array();
		
		return $query;
	}
	
	public function obtener_datos_evaluacion($id_usuario, $id_evaluacion)
	{
		$condicion = array(
			'tbl_evaluacion.id_usuario' => $id_usuario,
			'tbl_evaluacion.id_evaluacion' => $id_evaluacion
		);
		
		$this->db->select('*');
        $this->db->from('tbl_evaluacion');
		$this->db->where($condicion);
		$query = $this->db->get()->result_array();
		
		return $query[0];
	}
	
	public function obtener_datos_evaluacion2($id_evaluacion)
	{
		$condicion = array(
			'tbl_evaluacion.id_evaluacion' => $id_evaluacion
		);
		
		$this->db->select('*');
        $this->db->from('tbl_evaluacion');
		$this->db->where($condicion);
		$query = $this->db->get()->result_array();
		
		return $query[0];
	}
	
	public function modificar_datos_evaluacion($id_usuario, $id_evaluacion, $id_profesor, $id_materia, $nombre_evaluacion)
	{
		$datos = array(
			'id_materia' => $id_materia,
			'nombre_evaluacion' => $nombre_evaluacion
		);
		
		$condicion = array(
			'id_usuario' => $id_usuario,
			'id_evaluacion' => $id_evaluacion,
			'id_profesor' => $id_profesor
		);
		
		// Realizar update
        $this->db->db_debug = FALSE;
        $this->db->where($condicion);
        $this->db->update('tbl_evaluacion', $datos);
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