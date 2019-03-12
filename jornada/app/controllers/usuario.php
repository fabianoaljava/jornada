<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Controller {

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
		$this->load->model('model_usuario');
		$this->load->model('model_default');		
    }	 
	 

	public function index()
	{
		$data['js'] = 'usuario';
		
		$data['title'] = 'Painel Consolidação | Usuários';							
		$this->functions->load_site('_site', 'usuario/list', $data);
	
	}
	
	public function table_result()
	{

		$this->model_default->get_data_table('usuario', array('foto, nome, email, gc_id, nivel_id, status, SHA1(id)'), '', 'SELECT IF(foto = \'\', CONCAT(\'http://www.gravatar.com/avatar/\',  md5( lower( trim( email ) ) ) , \'?d=' . urlencode(THEMEPATH . '/image/avatar/avatar.jpg') . '&s=150\'), foto) as foto, nome, email, gc_id, nivel_id, status, SHA1(id) FROM usuario');
	
	}	

	public function edit($id)
	{
		
		$data['js'] = 'usuario';
		$data['css'] = '';
		$data['sitetitle'] = 'Painel Consolidação | Usuários > Editar';
			
		$result = $this->model_default->get_row('usuario', $id, true);	
		
		if (sizeof($result) == 0) exit("Registro não encontrado");	
		
		$result['data_nasc'] =  ($result['data_nasc']!='0000-00-00')?date('d/m/Y',strtotime($result['data_nasc'])):'';
		$result['data_batismo'] =  ($result['data_batismo']!='0000-00-00')?date('d/m/Y',strtotime($result['data_batismo'])):'';	

		$data['niveis'] = $this->model_default->get_table('nivel', array('*'), '1=1');		
		$data['municipios'] = $this->model_default->get_table('municipio', array('*'), '1=1');
		$data['bairros'] = $this->model_default->get_table('bairro', array('*'), 'municipio_id = ' . $result['municipio_id']);
		
		$data['gcs'] = $this->model_default->get_table('gc', array('*'), '1=1');		
		
		$data = array_merge($data, $result);
									
		$this->functions->load_site('_site', 'usuario/edit', $data);
	
	}	
	
	
	public function create()
	{
		
		$data['js'] = 'usuario';
		$data['css'] = '';
		$data['sitetitle'] = 'Painel Consolidação | Usuários > Criar';

		$data['niveis'] = $this->model_default->get_table('nivel', array('*'), '1=1');
		$data['municipios'] = $this->model_default->get_table('municipio', array('*'), '1=1');	
		
		$data['gcs'] = $this->model_default->get_table('gc', array('*'), '1=1');		
													
		$this->functions->load_site('_site', 'usuario/create', $data);
	
	}		
	
	
	public function insert()
	{
		
		$result = $this->model_usuario->insert_registry();
		
		
		if ($result == 1) {
		
			$data = "";
			$data .= '{';
			$data .= '"code": "200",';
			$data .= '"redirect": "' . ROOTPATH . '/usuario",';						
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
		
		$result = $this->model_usuario->update_registry();
		
		
		if ($result == 1) {
		
			$data = "";
			$data .= '{';
			$data .= '"code": "200",';
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
	
		$result = $this->model_usuario->delete_registry($id);
		if ($result == 1) {
			header("Location: " . ROOTPATH . "/usuario");	
		} else {
			header("Location: " . ROOTPATH . "/usuario");	
		}
		
	}
	
	
	public function upload_file()
	{
		
		
		
		$uploadpath = UPLOADPATH . "userfiles/" . sha1($_SESSION['s_usuario_id']) . '/tmp/';
		
		if (! is_dir($uploadpath) ) {
			mkdir($uploadpath, 0777, true);	
		}
		
		
		$config['upload_path'] = $uploadpath;
        $config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = 'user.jpg';
		$file_element_name = 'filenewphoto';
//		$config['overwrite'] = TRUE;		

        $this->load->library('upload', $config);
		
		

        if ( !$this->upload->do_upload($file_element_name) )
		{
			
			$error = 'Erro ao enviar arquivo.';
			$msg = '';
			echo "{";
			echo "error: '" . $error . "',\n";
			echo "msg: '" . $msg . "'\n";
			echo "}";
				
		} else {
			
			
			$upload_data =$this->upload->data();
			$error = '';
			$msg = 'Arquivo enviado com sucesso!';
			
                    $config2['image_library'] = 'gd2';
                    $config2['source_image'] = $this->upload->upload_path.$this->upload->file_name;		
			
					$config2['maintain_ratio'] = TRUE;
					$config2['width'] = 500;
					$config2['height'] = 500;
					$config2['overwrite'] = FALSE;
					
                    $this->load->library('image_lib',$config2); 
					$this->image_lib->initialize($config2);

                    if ( $this->image_lib->resize()){						
						
						echo "{";
						echo "error: '" . $error . "',\n";
						echo "msg: '" . $msg . "',\n";
						echo "dst: '" .  'uploads/userfiles/' . sha1($_SESSION['s_usuario_id']) . '/' . $upload_data['file_name'] . "',\n";											
						echo "path: '" . ROOTPATH . 'uploads/userfiles/' . sha1($_SESSION['s_usuario_id']) . '/tmp/' . $upload_data['file_name'] . "',\n";	
						echo "preferedname: '" . $upload_data['file_name'] . "'\n";								
						echo "}";						
						
					} else {
						
									
						$error = 'Erro ao criar miniatura.' . $this->image_lib->display_errors();
						$msg = '';
						echo "{";
						echo "error: '" . $error . "',\n";
						echo "msg: '" . $msg . "'\n";
						echo "}";						
					}
					
			
	
		}
		

		
		

/*			$error = '';
			$msg = 'Arquivo enviado com sucesso!';
			echo "{";
			echo "error: '" . $error . "',\n";
			echo "msg: '" . $msg . "',\n";
			echo "path: ''\n";								
			echo "}";		*/	

		

	}
	
	
	public function crop()
	{
		
		
		$uploadpath = UPLOADPATH . "userfiles/" . sha1($_SESSION['s_usuario_id']);
		
		$file_name = $_POST['preferedname'];	
		
		$src = $_POST['src'];
		
		
		///fixar os tamanhos das imagens de acordo com o preferedname... exibir erro quando imagem tiver tamanho diferente ou então redimensionar para tamanho correto.
		
		


		$targ_w = $targ_h = 150;
		$jpeg_quality = 100;
		
		
		$img_r = imagecreatefromjpeg($src);
		
		$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

		
		imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
		$targ_w,$targ_h,$_POST['w'],$_POST['h']);
		
		imagejpeg($dst_r, $uploadpath . '/' . $file_name);			
			
					

	
		$data = "";
		$data .= '{';
		$data .= '"code": "200",';
		$data .= '"redirect": "",';		
		$data .= '"text": "Enviado com sucesso!"';					
		$data .= '}';
		
		echo $data;
		
		
	}	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */