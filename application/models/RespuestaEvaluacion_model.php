<?php
class RespuestaEvaluacion_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    public function insertar_respuestaevaluacion($id_evaluacion)
    {
		date_default_timezone_set("Europe/London");
		
		$objTimeZone = new DateTimeZone("Europe/London");
		$date = new DateTime();
		$date->setTimezone($objTimeZone);
		
		$datos = array(
			'id_evaluacion' => $id_evaluacion,
			'fecha_creacion' => $date->format('Y-m-d H:i:s')
		);
		
		// Insertandolo en la base de datos
		$this->db->db_debug = FALSE;
		$this->db->insert('tbl_respuesta_evaluacion', $datos);
		$id = $this->db->insert_id();
		$err = $this->db->error();
        $this->db->db_debug = TRUE;
        
        return $id;
    }
	
	public function obtener_respuesta_evaluacion($id_evaluacion)
	{
		$condicion = array(
			'id_evaluacion' => $id_evaluacion
		);
		
		$this->db->select('*');
        $this->db->from('tbl_respuesta_evaluacion');
		$this->db->where($condicion);
		$query = $this->db->get()->result_array();
		
		return $query;
	}
	
	public function eliminar_respuesta_evaluacion($id_respuesta_evaluacion)
	{
		$this->db->db_debug = FALSE;
		$this->db->delete('tbl_respuesta_evaluacion', array('id_respuesta_evaluacion' => $id_respuesta_evaluacion));
		$err = $this->db->error();
        $this->db->db_debug = TRUE;
	}
}