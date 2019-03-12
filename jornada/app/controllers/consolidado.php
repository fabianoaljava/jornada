<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consolidado extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	 
	
	 
	public function __construct()
    {
        parent::__construct();
		$this->load->library('functions');		
		$this->load->model('model_consolidado');
		$this->load->model('model_default');		
    }	 
	 

	public function index()
	{
		$data['js'] = 'consolidado';
		

		
		$data['title'] = 'Painel Consolidação | Consolidado';							
		$this->functions->load_site('_site', 'consolidado/list', $data);
	
	}
	
	public function table_result()
	{
		
		$nivel_id = (isset($_SESSION['s_nivel_id']))?$_SESSION['s_nivel_id']:99;
		
		$conditions = '';
		
/*		if ($nivel_id == 5) {
			$conditions = ' WHERE (user_cadastro = \'' . $_SESSION['s_login'] . '\' or usuario_consolidado.usuario_id = \'' . $_SESSION['s_login'] . '\')';
		} elseif ($nivel_id == 3) {
			$conditions = ' WHERE gc_id = \'' . $_SESSION['s_gc_id'] . '\'';
		}*/
		
		$conditions = ' WHERE (user_cadastro = \'' . $_SESSION['s_login'] . '\' or usuario_consolidado.usuario_id = \'' . $_SESSION['s_usuario_id'] . '\')';

		
		$this->model_default->get_data_table('consolidado, municipio, bairro, culto', array('nome, email, data_culto, nome_culto, nome_municipio, nome_bairro, status, shaid'),'', 'SELECT nome, email, data_culto, nome_culto, nome_municipio, nome_bairro, status, SHA1(consolidado.id) shaid FROM consolidado LEFT JOIN municipio ON municipio_id = municipio.id LEFT JOIN bairro on bairro_id = bairro.id LEFT JOIN culto ON culto_id = culto.id LEFT JOIN usuario_consolidado ON consolidado.id = consolidado_id ' . $conditions . ' ORDER BY data_culto DESC');
		
		
		
	
	}	
	
	public function view($id)
	{
		
		$data['js'] = 'consolidado';
		$data['css'] = '';
		$data['sitetitle'] = 'Painel IBL | Consolidado > Visualizar';
			
		$result = $this->model_default->get_row('consolidado', $id, true);	
		
		if (sizeof($result) == 0) exit("Registro não encontrado");	
		
		$result['data_nasc'] =  ($result['data_nasc'] == '0000-00-00')?'':date('d/m/Y',strtotime($result['data_nasc']));
		$result['data_culto'] =  ($result['data_culto'] == '0000-00-00')?'':date('d/m/Y',strtotime($result['data_culto']));		
		
		$data['cultos'] = $this->model_default->get_table('culto', array('*'), '1=1');
		
		$data['municipio'] = $this->model_default->get_simple_table_array('municipio', 'nome_municipio', 'id=' . $result['municipio_id'], 'nome_municipio'); 
		
		$data['bairro'] = $this->model_default->get_simple_table_array('bairro', 'nome_bairro', 'id=' . $result['bairro_id'] . ' AND municipio_id = ' . $result['municipio_id'], 'nome_bairro'); 
		
		$data['gc'] = $this->model_default->get_simple_table_array('gc', 'nome_gc', 'id=' . $result['gc_id']); 
		
		$data['gcs'] = $this->model_default->get_table('gc', array('*'), '1=1');
		
		$data['tipos_informacao'] = $this->model_default->get_table('tipo_informacao', array('*'), '1=1');		
		

		
		$data['consolidado_historico'] = $this->model_default->get_table('consolidado_historico, usuario',array('nome, foto, tipoinformacao_id, email, descricao, receptividade, data, consolidado_historico.consolidado_id'), 'usuario_id = usuario.id  AND sha1(consolidado_historico.consolidado_id)= \'' . $id . '\'', 'data DESC' );
		
		$data['consolidadores'] = $this->model_default->get_table('usuario_consolidado, usuario',array('DISTINCT nome, foto, email, gc_id'), 'usuario_id = usuario.id  AND sha1(usuario_consolidado.consolidado_id)= \'' . $id . '\'', 'nome DESC' );
		
		if ($_SESSION['s_nivel_id'] <= 4) {
			$data['usuarios'] = $this->model_default->get_table('usuario', array('id, nome'), '1=1', 'nome');
		}

//		$data['contatos_realizados'] = array_unique($data['contatos_realizados']);
		
		$data = array_merge($data, $result);
									
		$this->functions->load_site('_site', 'consolidado/view', $data);
	
	}	

	public function edit($id)
	{
		
		$data['js'] = 'consolidado';
		$data['css'] = '';
		$data['sitetitle'] = 'Painel IBL | Consolidado > Editar';
			
		$result = $this->model_default->get_row('consolidado', $id, true);	
		
		if (sizeof($result) == 0) exit("Registro não encontrado");	
		
		$result['data_nasc'] =  ($result['data_nasc'] == '0000-00-00')?'':date('d/m/Y',strtotime($result['data_nasc']));
		$result['data_culto'] =  ($result['data_culto'] == '0000-00-00')?'':date('d/m/Y',strtotime($result['data_culto']));		
		
		$data['cultos'] = $this->model_default->get_table('culto', array('*'), '1=1');
		$data['municipios'] = $this->model_default->get_table('municipio', array('*'), '1=1');
		$data['bairros'] = $this->model_default->get_table('bairro', array('*'), 'municipio_id = ' . $result['municipio_id']);
		
		
		$data['gcs'] = $this->model_default->get_table('gc', array('*'), '1=1');
		
		$data = array_merge($data, $result);
									
		$this->functions->load_site('_site', 'consolidado/edit', $data);
	
	}	
	
	
	public function create()
	{
		
		$data['js'] = 'consolidado';
		$data['css'] = '';
		$data['sitetitle'] = 'Painel IBL | Consolidado > Criar';
		
		$data['cultos'] = $this->model_default->get_table('culto', array('*'), '1=1');
		$data['municipios'] = $this->model_default->get_table('municipio', array('*'), '1=1');
		//$data['bairros'] = $this->model_default->get_table('bairro', array('*'), '1=1');		
		
		$data['gcs'] = $this->model_default->get_table('gc', array('*'), '1=1');	
		
		$data['consolidadores'] = $this->model_default->get_table('usuario', array('id, nome'), '1=1', 'nome');
		
		$data['coordenadores'] = $this->model_default->get_table('usuario', array('id, nome'), 'nivel_id = 4', 'nome');	
													
		$this->functions->load_site('_site', 'consolidado/create', $data);
	
	}		
	
	
	public function insert()
	{
		
		$result = $this->model_consolidado->insert_registry();
		
		
		
		if ($result == 1) {
		
			$data = "";
			$data .= '{';
			$data .= '"code": "200",';
			$data .= '"redirect": "' . ROOTPATH . 'consolidado/create",';						
			$data .= '"text": "Formulário enviado com sucesso!"';
			$data .= '}';
		
			echo $data;
			
		} else {
			
			$data = "";
			$data .= '{';
			$data .= '"code": "500",';
			$data .= '"text": "Ocorreu um erro ao enviar formulário. Por favor, tente novamente mais tarde. Se o problema persistir, entre em contato com o administrador."';
			$data .= '}';
			
			echo $data;			
			
		}
	
	}		
	
	public function update()
	{
		
		$result = $this->model_consolidado->update_registry();		
		
		
		
		if ($result == 1) {
		
			$data = "";
			$data .= '{';
			$data .= '"code": "200",';
			$data .= '"redirect": "' . ROOTPATH . 'consolidado",';			
			$data .= '"text": "Formulário enviado com sucesso!"';
			$data .= '}';
		
			echo $data;
			
		} else {
			
			$data = "";
			$data .= '{';
			$data .= '"code": "500",';
			$data .= '"text": "Ocorreu um erro ao enviar formulário. Por favor, tente novamente mais tarde. Se o problema persistir, entre em contato com o administrador."';
			$data .= '}';	
			
			echo $data;		
			
		}
	
	}	
	
	
	public function del($id)
	{	
	
		$nivel_id = (isset($_SESSION['s_nivel_id']))?$_SESSION['s_nivel_id']:99; 
		
		if ($nivel_id != 1) {
			header("Location: " . ROOTPATH . "negado" );	
		} else {
	
			$result = $this->model_consolidado->delete_registry($id);
			if ($result == 1) {
				header("Location: " . ROOTPATH . "consolidado");	
			} else {
				header("Location: " . ROOTPATH . "consolidado");	
			}
		}
	}
	

	public function insert_historico()
	{
		

		$result = $this->model_consolidado->insert_historico();
		
		
		if ($result == 1) {
		
			$data = "";
			$data .= '{';
			$data .= '"code": "200",';
			$data .= '"redirect": "' . ROOTPATH . 'consolidado/view/' . sha1($_POST['consolidado_id']) . '",';						
			$data .= '"text": "Informação registrada com sucesso!"';
			$data .= '}';
		
			echo $data;
			
		} else {
			
			$data = "";
			$data .= '{';
			$data .= '"code": "500",';
			$data .= '"text": "Ocorreu um erro ao enviar as informações. Por favor, tente novamente mais tarde. Se o problema persistir, entre em contato com o administrador."';
			$data .= '}';	
			
			echo $data;		
			
		}
		
	
	}	
	
	
	public function designar()
	{
		
		
		$result = $this->model_consolidado->designar();
		
		
		if ($result == 1) {
		
			$data = "";
			$data .= '{';
			$data .= '"code": "200",';
			$data .= '"text": "Consolidador designado com sucesso!"';
			$data .= '}';
		
			echo $data;
			
		} else {
			
			$data = "";
			$data .= '{';
			$data .= '"code": "500",';
			$data .= '"text": "Ocorreu um erro ao enviar as informações. Por favor, tente novamente mais tarde. Se o problema persistir, entre em contato com o administrador."';
			$data .= '}';	
			
			echo $data;		
			
		}
		
	
	}			

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */