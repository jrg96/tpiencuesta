<?php
class Usuario_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    public function insertar_usuario($usuario, $password)
    {
		$password_md5 = md5($password);
		$datos = array(
			'email' => $usuario,
			'password' => $password_md5
		);
		
		// Insertandolo en la base de datos
		$this->db->db_debug = FALSE;
		$this->db->insert('tbl_usuario', $datos);
		$err = $this->db->error();
        $this->db->db_debug = TRUE;
        
        // Ver codigo de error
        if ($err['code'] == 0)
        {
            return true;
        }
        return false;
    }
	
	public function usuario_ya_existe($email)
	{
		$this->db->select('*');
        $this->db->from('tbl_usuario');
		$this->db->where('email', $email);
		$query = $this->db->get()->result_array();
		$coincidencias = count($query);
		
		if ($coincidencias == 0)
		{
			return false;
		}
		return true;
	}
	
	public function comprobar_credenciales($email, $password)
	{
		$password_md5 = md5($password);
		$datos = array(
			'email' => $email,
			'password' => $password_md5
		);
		
		// Realizando consulta
		$this->db->select('*');
        $this->db->from('tbl_usuario');
		$this->db->where($datos);
		$query = $this->db->get()->result_array();
		$coincidencias = count($query);
		
		if ($coincidencias > 0)
		{
			return true;
		}
		return false;
	}
	
	public function obtener_usuario($email)
	{
		$this->db->select('*');
        $this->db->from('tbl_usuario');
		$this->db->where('email', $email);
		$query = $this->db->get()->result_array();
		
		return $query[0];
	}
}