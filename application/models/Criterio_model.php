<?php
class Criterio_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    public function insertar_criterio($id_seccion, $nombre_criterio, $min, $max)
    {
		date_default_timezone_set("Europe/London");
		
		$objTimeZone = new DateTimeZone("Europe/London");
		$date = new DateTime();
		$date->setTimezone($objTimeZone);
		
		$datos = array(
			'id_seccion_evaluacion' => $id_seccion,
			'nombre_criterio' => $nombre_criterio,
			'fecha_creacion' => $date->format('Y-m-d H:i:s'),
			'minimo' => $min,
			'maximo' => $max
		);
		
		// Insertandolo en la base de datos
		$this->db->db_debug = FALSE;
		$this->db->insert('tbl_criterio_seccion', $datos);
		$err = $this->db->error();
        $this->db->db_debug = TRUE;
        
        // Ver codigo de error
        if ($err['code'] == 0)
        {
            return true;
        }
        return false;
    }
	
	public function obtener_datos_criterio($id_seccion, $id_criterio)
	{
		$datos = array(
			'id_criterio_seccion' => $id_criterio,
			'id_seccion_evaluacion' => $id_seccion
		);
		
		$this->db->select('*');
        $this->db->from('tbl_criterio_seccion');
		$this->db->where($datos);
		$query = $this->db->get()->result_array();
		
		return $query[0];
	}
	
	public function obtener_criterio_seccion($id_seccion)
	{
		$condicion = array(
			'id_seccion_evaluacion' => $id_seccion
		);
		
		$this->db->select('*');
        $this->db->from('tbl_criterio_seccion');
		$this->db->where($condicion);
		$query = $this->db->get()->result_array();
		
		return $query;
	}
	
	public function modificar_datos_criterio($id_evaluacion, $id_criterio, $id_seccion, $nombre_criterio, $min, $max)
	{
		$datos = array(
			'nombre_criterio' => $nombre_criterio,
			'minimo' => $min,
			'maximo' => $max,
			'id_seccion_evaluacion' => $id_seccion
		);
		
		$condicion = array(
			'id_criterio_seccion' => $id_criterio
		);
		
		// Realizar update
        $this->db->db_debug = FALSE;
        $this->db->where($condicion);
        $this->db->update('tbl_criterio_seccion', $datos);
        $err = $this->db->error();
        $this->db->db_debug = TRUE;
		
		// Ver codigo de error
        if ($err['code'] == 0)
        {
            return true;
        }
        return false;
	}
	
	public function eliminar_criterio($id_criterio_seccion)
	{
		$this->db->delete('tbl_criterio_seccion', array('id_criterio_seccion' => $id_criterio_seccion));
	}
}