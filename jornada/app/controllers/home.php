<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$params['allowanonymous'] = true;
		$this->load->library('functions', $params);		
    }	 

	
	public function index($alias = '')
	{
		$data['sitetitle'] = 'Dia D Casar | Em breve';
		$data['couplename'] = $alias;
		$this->functions->load_site('templates\vow\_default', 'templates\vow\index', $data);
	}		
	
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */