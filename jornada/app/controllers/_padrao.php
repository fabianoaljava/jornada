<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agenda extends CI_Controller {

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
	 
	var $template_id = 0;
	
	 
	public function __construct()
    {
        parent::__construct();
		$this->load->library('functions');		
		$this->load->model('model_default');
		
//		$this->load->model('model_padrao');		
    }	 
	 

	public function index()
	{
		$data['sitetitle'] = 'Dia D Casar | ';								
		$this->functions->load_site('_site', 'padrao', $data);
	}
	

	public function search()
	{
		
		
		
		// List of events
		 $json = array();
		
		 // Query that retrieves events
		//$result = $this->model_default->get_table('padrao', array('id', 'item title', 'dateend start', 'dateend end', '"" url', 'true allDay'), 'ourday_id = \''.$_SESSION['ourdayid'] . '\' ', 'ordering, dateend');
		

		
		 // sending the encoded result to success page
		 //echo json_encode($result);
 
 
 		
	}	
	
	public function insert()
	{

	}		
	
	public function update()
	{

	}	
	
	public function del($id)
	{	
	
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */