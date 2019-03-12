<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Model_Consolidado extends CI_Model {

	var $data_culto = '';
	var $horario_culto = '';
	var $culto_id = '';
	var $nome = '';
	var $sexo = '';
	var $estado_civil = '';
	var $idade = '';
	var $data_nasc = '';
	var $endereco = '';
	var $municipio_id = '';
	var $bairro_id = '';
	var $telefone = '';
	var $celular1 = '';
	var $celular2 = '';
	var $whatsapp = '';
	var $email = '';
	var $decisao = '';
	var $batizado = '';
	var $convidante	= '';
	var $tel_convidante	= '';
	var $gc_id = '';
	var $observacao	= '';
	var $data_cadastro = '';
	var $status	= '';



    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
		$this->load->model('model_default');
		
    }
       
	
	
    function insert_registry()
    {
	
		$this->data_culto  =  ($_POST['data_culto'] == '')?date('Y-m-d'):date('Y-m-d',strtotime(str_replace("/","-",$_POST['data_culto'])));		
		$this->nome  = $_POST['nome'];
				
		$this->sexo  = $_POST['sexo'];
		$this->nome  = $_POST['nome'];
		$this->estado_civil  = $_POST['estado_civil'];
		$this->data_nasc  =  ($_POST['data_nasc'] == '')?'':date('Y-m-d',strtotime(str_replace("/","-",$_POST['data_nasc'])));
		
		$this->endereco  = $_POST['endereco'];		

		$this->municipio_id  = $_POST['municipio_id'];
		$this->bairro_id  = $_POST['bairro_id'];
		$this->culto_id  = $_POST['culto_id'];
			
		
		$this->telefone  = $_POST['telefone'];
		$this->celular1  = $_POST['celular1'];
		$this->celular2  = $_POST['celular2'];
		$this->whatsapp  = (isset($_POST['whatsapp']))?$_POST['whatsapp']:0;

		$this->email  = $_POST['email'];

		$this->decisao  = (isset($_POST['decisao']))?$_POST['decisao']:0; 
		$this->batizado  =  (isset($_POST['batizado']))?$_POST['batizado']:0;
		
		$this->gc_id  = $_POST['gc_id'];
				
		$this->convidante  = $_POST['convidante'];
		$this->tel_convidante  = $_POST['tel_convidante'];
		$this->observacao  = $_POST['observacao'];
		$this->status  = $_POST['status'];
						

		$this->data_cadastro  = date("Y-m-d H:i:s");	
		$this->user_cadastro  = $_SESSION['s_login'];
		$this->status  = $_POST['status'];		
		
		
		$_SESSION['s_default_data_culto'] = $_POST['data_culto'];
		$_SESSION['s_default_culto_id'] = $_POST['culto_id'];
		
		$result = $this->db->insert('consolidado', $this);
		//$result = 1;
		
		if ($result == 1) {
			if (isset($_POST['coordenador_id'])) {

				//inserir coordenador
				
				$consolidado = $this->model_default->get_simple_table_array('consolidado', 'id', 'data_culto = \'' . $this->data_culto . '\' AND nome =\'' . $this->nome . '\' AND user_cadastro = \'' . $this->user_cadastro . '\'');
				
				$designar->usuario_id = isset($_POST['consolidador_id'])?$_POST['consolidador_id']:0;
				$designar->consolidado_id = $consolidado['id'];
				$designar->coordenador_id = $_POST['coordenador_id'];
				$designar->data = date("Y-m-d H:i:s");
				$designar->observacao = ''; //colocar novo campo depois
				
				$result = $this->db->insert('usuario_consolidado', $designar);
			}
		}
		//Gravar no Log
        return $result;
				
				
    }

    function update_registry()
    {

		$this->data_culto  =  ($_POST['data_culto'] == '')?date('Y-m-d'):date('Y-m-d',strtotime(str_replace("/","-",$_POST['data_culto'])));		
		$this->nome  = $_POST['nome'];
				
		$this->sexo  = $_POST['sexo'];
		$this->nome  = $_POST['nome'];
		$this->estado_civil  = $_POST['estado_civil'];
		$this->data_nasc  =  ($_POST['data_nasc'] == '')?date('Y-m-d'):date('Y-m-d',strtotime(str_replace("/","-",$_POST['data_nasc'])));
		
		$this->endereco  = $_POST['endereco'];		

		$this->municipio_id  = $_POST['municipio_id'];
		$this->bairro_id  = $_POST['bairro_id'];
		$this->culto_id  = $_POST['culto_id'];
			
		
		$this->telefone  = $_POST['telefone'];
		$this->celular1  = $_POST['celular1'];
		$this->celular2  = $_POST['celular2'];
		$this->whatsapp  = $_POST['whatsapp'];

		$this->email  = $_POST['email'];

		$this->decisao  = $_POST['decisao'];
		$this->batizado  = $_POST['batizado'];
		
		$this->gc_id  = $_POST['gc_id'];
		
		$this->convidante  = $_POST['convidante'];
		$this->tel_convidante  = $_POST['tel_convidante'];
		$this->observacao  = $_POST['observacao'];
		$this->status  = $_POST['status'];
						

		//Gravar no Log
		return $this->db->update('consolidado', $this, array('id' => $_POST['id']));
		
		
    }
	
	function delete_registry($id) {
    	$this->db->where("SHA1(id)", $id);
	    $this->db->delete("consolidado");
  	}
	
	
	function insert_historico() {

		
		$hist['consolidado_id'] = $_POST['consolidado_id'];
		$hist['tipoinformacao_id'] = $_POST['tipoinformacao_id'];
		$hist['descricao'] = $_POST['descricao'];
		$hist['receptividade'] =  $_POST['receptividade'];
		$hist['usuario_id'] =  $_SESSION['s_usuario_id'];
		
		$hist['data'] = ($_POST['data'] == '')?date("Y-m-d H:i"):date('Y-m-d H:i',strtotime(str_replace("/","-",$_POST['data'])));
//		$hist['data'] = date("Y-m-d H:i");	
			
		
		//Gravar no Log
        return $this->db->insert('consolidado_historico', $hist);
	}
	
	
	function designar() {
								
		$cons['consolidado_id'] = $this->model_default->get_data_value('id', 'SELECT id FROM consolidado WHERE sha1(id) = \'' . $_POST['consolidado_id'] . '\'');		
		
		
		$cons['usuario_id'] = $_POST['consolidador_id'];
		$cons['coordenador_id'] = $_SESSION['s_usuario_id'];		
		$cons['observacao'] = $_POST['consonotes'];
		
		$cons['data'] = date("Y-m-d H:i");
			
		
		//Gravar no Log
        return $this->db->insert('usuario_consolidado', $cons);
	}

}