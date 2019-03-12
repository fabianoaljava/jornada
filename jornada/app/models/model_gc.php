<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Model_Gc extends CI_Model {

	var $nome_gc   = '';
	var $municipio_id= '';
	var $bairro_id= '';
	var $endereco= '';
	var $horario= '';
	var $lideres= '';



    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
		$this->load->model('model_default');
		
    }
       
	
	
    function insert_registry()
    {

		$this->nome_gc  = $_POST['nome_gc'];
		$this->municipio_id  = $_POST['municipio_id'];
		$this->bairro_id  = $_POST['bairro_id'];
		$this->endereco  = $_POST['endereco'];
		$this->horario  = $_POST['horario'];
		$this->lideres  = $_POST['lideres'];						
					
        return $this->db->insert('gc', $this);
    }

    function update_registry()
    {
				
		$this->nome_gc = $_POST['nome_gc'];	
		$this->municipio_id  = $_POST['municipio_id'];
		$this->bairro_id  = $_POST['bairro_id'];	
		$this->endereco  = $_POST['endereco'];
		$this->horario  = $_POST['horario'];
		$this->lideres  = $_POST['lideres'];		
		//Gravar no Log
		return $this->db->update('gc', $this, array('id' => $_POST['id']));
		
		
    }
	
	function delete_registry($id) {
    	$this->db->where("SHA1(id)", $id);
	    $this->db->delete("gc");
  	}

}