<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Model_Bairro extends CI_Model {

	var $nome_bairro   = '';
	var $municipio_id   = '';	



    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
		$this->load->model('model_default');
		
    }
       
	
	
    function insert_registry()
    {

		$this->nome_bairro  = $_POST['nome_bairro'];
		$this->municipio_id = $_POST['municipio_id'];				
        return $this->db->insert('bairro', $this);
    }

    function update_registry()
    {
				
		$this->nome_bairro = $_POST['nome_bairro'];		
		$this->municipio_id = $_POST['municipio_id'];		
		//Gravar no Log
		return $this->db->update('bairro', $this, array('id' => $_POST['id']));
		
		
    }
	
	function delete_registry($id) {
    	$this->db->where("SHA1(id)", $id);
	    $this->db->delete("bairro");
  	}

}