<?php
class Seccion_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    public function insertar_seccion($id_evaluacion, $nombre_seccion)
    {
		date_default_timezone_set("Europe/London");
		
		$objTimeZone = new DateTimeZone("Europe/London");
		$date = new DateTime();
		$date->setTimezone($objTimeZone);
		
		$datos = array(
			'id_evaluacion' => $id_evaluacion,
			'nombre_seccion' => $nombre_seccion,
			'fecha_creacion' => $date->format('Y-m-d H:i:s')
		);
		
		// Insertandolo en la base de datos
		$this->db->db_debug = FALSE;
		$this->db->insert('tbl_seccion_evaluacion', $datos);
		$err = $this->db->error();
        $this->db->db_debug = TRUE;
        
        // Ver codigo de error
        if ($err['code'] == 0)
        {
            return true;
        }
        return false;
    }
	
	public function obtener_datos_seccion($id_evaluacion, $id_seccion)
	{
		$datos = array(
			'id_evaluacion' => $id_evaluacion,
			'id_seccion_evaluacion' => $id_seccion
		);
		
		$this->db->select('*');
        $this->db->from('tbl_seccion_evaluacion');
		$this->db->where($datos);
		$query = $this->db->get()->result_array();
		
		return $query[0];
	}
	
	public function obtener_seccion_evaluacion($id_evaluacion)
	{
		$condicion = array(
			'id_evaluacion' => $id_evaluacion
		);
		
		$this->db->select('*');
        $this->db->from('tbl_seccion_evaluacion');
		$this->db->where($condicion);
		$query = $this->db->get()->result_array();
		
		return $query;
	}
	
	public function modificar_datos_seccion($id_evaluacion, $id_seccion, $nombre_seccion)
	{
		$datos = array(
			'nombre_seccion' => $nombre_seccion
		);
		
		$condicion = array(
			'id_evaluacion' => $id_evaluacion,
			'id_seccion_evaluacion' => $id_seccion
		);
		
		// Realizar update
        $this->db->db_debug = FALSE;
        $this->db->where($condicion);
        $this->db->update('tbl_seccion_evaluacion', $datos);
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