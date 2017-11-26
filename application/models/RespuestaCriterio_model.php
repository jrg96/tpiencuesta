<?php
class RespuestaCriterio_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    public function insertar_respuestacriterio($id_respuesta_evaluacion, $id_seccion, $id_criterio, $valor)
    {
		$datos = array(
			'id_respuesta_evaluacion' => $id_respuesta_evaluacion,
			'id_seccion_evaluacion' => $id_seccion,
			'id_criterio_seccion' => $id_criterio,
			'valor' => $valor
		);
		
		// Insertandolo en la base de datos
		$this->db->db_debug = FALSE;
		$this->db->insert('tbl_respuesta_criterio', $datos);
		$id = $this->db->insert_id();
		$err = $this->db->error();
        $this->db->db_debug = TRUE;
        
        return $id;
    }
	
	public function eliminar_respuesta_criterio($id_respuesta_evaluacion)
	{
		$this->db->db_debug = FALSE;
		$this->db->delete('tbl_respuesta_criterio', array('id_respuesta_evaluacion' => $id_respuesta_evaluacion));
		$err = $this->db->error();
        $this->db->db_debug = TRUE;
	}
	
	public function contar_criterio($id_seccion, $id_criterio, $valor)
	{
		$condicion = array(
			'id_seccion_evaluacion' => $id_seccion,
			'id_criterio_seccion' => $id_criterio,
			'valor' => $valor
		);
		
		$this->db->select('*');
        $this->db->from('tbl_respuesta_criterio');
		$this->db->where($condicion);
		$query = $this->db->get()->result_array();
		
		return count($query);
	}
}