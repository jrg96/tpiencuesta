<?php
class Profesor_Materia_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    public function insertar_detalle_materia_profesor($id_profesor, $id_materia)
    {
		$datos = array(
			'id_profesor' => $id_profesor,
			'id_materia' => $id_materia
		);
		
		// Insertandolo en la base de datos
		$this->db->db_debug = FALSE;
		$this->db->insert('tbl_detalle_materia_profesor', $datos);
		$err = $this->db->error();
        $this->db->db_debug = TRUE;
        
        // Ver codigo de error
        if ($err['code'] == 0)
        {
            return true;
        }
        return false;
    }
	
	public function obtener_materia_porprofesor($id_profesor)
	{
		$this->db->select('*');
        $this->db->from('tbl_detalle_materia_profesor');
		$this->db->join('tbl_materia', 'tbl_detalle_materia_profesor.id_materia = tbl_materia.id_materia');
		$this->db->where('id_profesor', $id_profesor);
		$query = $this->db->get()->result_array();
		
		return $query;
	}
	
	public function existe_relacion_profesor_materia($id_profesor, $id_materia)
	{
		$datos = array(
			'id_profesor' => $id_profesor,
			'id_materia' => $id_materia
		);
		
		$this->db->select('*');
        $this->db->from('tbl_detalle_materia_profesor');
		$this->db->where($datos);
		$query = $this->db->get()->result_array();
		$coincidencias = count($query);
		
		if ($coincidencias > 0)
		{
			return true;
		}
		return false;
	}
	
	public function eliminar_profesor_materia($id_detalle_materia_profesor)
	{
		$this->db->delete('tbl_detalle_materia_profesor', array('id_detalle_materia_profesor' => $id_detalle_materia_profesor));
	}
}