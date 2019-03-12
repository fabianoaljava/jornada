<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TipoInformacao extends CI_Controller {

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
		$this->load->model('model_tipoinformacao');
		$this->load->model('model_default');		
    }	 
	 

	public function index()
	{
		$data['js'] = 'tipoinformacao';
		
		$data['title'] = 'Painel Consolidação | Tipo Informação';							
		$this->functions->load_site('_site', 'tipoinformacao/list', $data);
	
	}
	
	public function table_result()
	{

		$this->model_default->get_data_table('tipo_informacao', array('tipo_informacao, SHA1(id)'));
	
	}	

	public function edit($id)
	{
		
		$data['js'] = 'tipoinformacao';
		$data['css'] = '';
		$data['sitetitle'] = 'Painel Consolidação | Tipo Informação > Editar';
			
		$result = $this->model_default->get_row('tipo_informacao', $id, true);	
		
		if (sizeof($result) == 0) exit("Registro não encontrado");	
		
		$data = array_merge($data, $result);
									
		$this->functions->load_site('_site', 'tipoinformacao/edit', $data);
	
	}	
	
	
	public function create()
	{
		
		$data['js'] = 'tipoinformacao';
		$data['css'] = '';
		$data['sitetitle'] = 'Painel Consolidação | Tipo Informação > Criar';
													
		$this->functions->load_site('_site', 'tipoinformacao/create', $data);
	
	}		
	
	
	public function insert()
	{
		
		$result = $this->model_tipoinformacao->insert_registry();
		
		
		if ($result == 1) {
		
			$data = "";
			$data .= '{';
			$data .= '"code": "200",';
			$data .= '"redirect": "' . ROOTPATH . 'tipoinformacao",';						
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
		
		$result = $this->model_tipoinformacao->update_registry();
		
		
		if ($result == 1) {
		
			$data = "";
			$data .= '{';
			$data .= '"code": "200",';
			$data .= '"redirect": "' . ROOTPATH . 'tipoinformacao",';			
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
	
		$result = $this->model_tipoinformacao->delete_registry($id);
		if ($result == 1) {
			header("Location: " . ROOTPATH . "tipoinformacao");	
		} else {
			header("Location: " . ROOTPATH . "tipoinformacao");	
		}
		
	}
	


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */