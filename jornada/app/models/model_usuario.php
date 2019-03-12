<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Model_Usuario extends CI_Model {

	var $login   = '';
	//var $senha   = '';
	var $nome = '';
	var $email   = '';
	var $telefone_residencial   = '';
	var $telefone_comercial   = '';
	var $celular1   = '';
	var $celular2   = '';
	var $data_nasc   = '';
	var $data_batismo   = '';
	var $endereco   = '';
	var $municipio_id   = '';
	var $bairro_id   = '';
	var $sexo   = '';
	var $estado_civil   = '';
	var $foto   = '';
	var $status   = '';
	var $nivel_id   = '';
	var $sobre   = '';
	var $data_cadastro   = '';


    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
		$this->load->model('model_default');
		
    }
       
	
	
    function insert_registry()
    {

		$this->login  = $_POST['username'];		
		$this->senha  = md5($_POST['password']);		
		$this->nome  = $_POST['nome'];
		$this->email  = $_POST['email'];
		$this->telefone_residencial  = $_POST['telefone_residencial'];
		$this->telefone_comercial  = $_POST['telefone_comercial'];
		$this->celular1  = $_POST['celular1'];
		$this->celular2  = $_POST['celular2'];
		$this->data_nasc  =  ($_POST['data_nasc'] == '')?date('Y-m-d'):date('Y-m-d',strtotime(str_replace("/","-",$_POST['data_nasc'])));
		$this->data_batismo  =  ($_POST['data_batismo'] == '')?date('Y-m-d'):date('Y-m-d',strtotime(str_replace("/","-",$_POST['data_batismo'])));
		$this->endereco  = $_POST['endereco'];
		$this->municipio_id  = $_POST['municipio_id'];
		$this->bairro_id  = $_POST['bairro_id'];
		$this->sexo  = $_POST['sexo'];
		$this->estado_civil  = $_POST['estado_civil'];
		$this->foto  = $_POST['foto'];
		
		$this->gc_id  = $_POST['gc_id'];
		
		$this->nivel_id  = $_POST['nivel_id'];
		$this->sobre  = $_POST['sobre'];		
		$this->data_cadastro  = date("Y-m-d H:i:s");	
		
		$this->status  = $_POST['status'];		

        return $this->db->insert('usuario', $this);
    }

    function update_registry()
    {
		
		
		if ($_POST['newpassword'] != '') {
			$this->senha  = md5($_POST['newpassword']);			
		} else {
			//$this->senha  = $_POST['password'];	
		}
		
		$this->login  = $_POST['username'];		
		//$this->senha  = sha1($_POST['password']);		
		$this->nome  = $_POST['nome'];
		$this->email  = $_POST['email'];
		$this->telefone_residencial  = $_POST['telefone_residencial'];
		$this->telefone_comercial  = $_POST['telefone_comercial'];
		$this->celular1  = $_POST['celular1'];
		$this->celular2  = $_POST['celular2'];
		$this->data_nasc  =  ($_POST['data_nasc'] == '')?date('Y-m-d'):date('Y-m-d',strtotime(str_replace("/","-",$_POST['data_nasc'])));
		$this->data_batismo  =  ($_POST['data_batismo'] == '')?date('Y-m-d'):date('Y-m-d',strtotime(str_replace("/","-",$_POST['data_batismo'])));
		$this->endereco  = $_POST['endereco'];
		$this->municipio_id  = $_POST['municipio_id'];
		$this->bairro_id  = $_POST['bairro_id'];
		$this->sexo  = $_POST['sexo'];
		$this->estado_civil  = $_POST['estado_civil'];
		$this->foto  = $_POST['foto'];
		
		$this->gc_id  = $_POST['gc_id'];		
		
		$this->nivel_id  = $_POST['nivel_id'];
		$this->sobre  = $_POST['sobre'];		
		$this->data_cadastro  = date("Y-m-d H:i:s");	
		
		$this->status  = $_POST['status'];						

		//Gravar no Log
		return $this->db->update('usuario', $this, array('id' => $_POST['id']));
		
		
    }
	
	function delete_registry($id) {
    	$this->db->where("SHA1(id)", $id);
	    $this->db->delete("usuario");
  	}

}