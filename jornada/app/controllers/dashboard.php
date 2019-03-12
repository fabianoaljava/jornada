<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


//if (session_status() == PHP_SESSION_NONE) {
if (session_id() === "") {
    session_start();
}
class Dashboard extends CI_Controller {

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
		$this->load->model('model_default');		
    }		 

	 

	public function index()
	{								

	

		// Exibir SLA de contato 36horas
		
		// Exibir Ranking de consolidadores
		// Consolidados - Fichas - Aguardando Contato - Contatos Realizados - Ver (Link para Pàgina do Consolidador)
		
		
		$data['title'] = 'Painel Jornada | Dashboard';	

		$nivel_id = $_SESSION['s_nivel_id'];
		$gc_id = $_SESSION['s_gc_id'];		
		
			
		if ($nivel_id <= 2) { //Administrador e Pastor

			$data['total_consolidando'] = $this->model_default->get_data_value('TOTAL_CONSOLIDANDO', 
					'SELECT COUNT(1) TOTAL_CONSOLIDANDO
						FROM consolidado 
						LEFT JOIN consolidado_historico ON consolidado_historico.consolidado_id = consolidado.id AND receptividade <= -3
							WHERE consolidado.status NOT IN (0, 4, 6, 7)
						AND consolidado_historico.id IS NULL');	
						
						
			$data['total_aguardando'] = $this->model_default->get_data_value('TOTAL_AGUARDANDO', 
					'SELECT count(1) TOTAL_AGUARDANDO
							FROM consolidado 
						WHERE consolidado.status NOT IN (0, 4, 6, 7)
						AND consolidado.id NOT IN (        
							SELECT distinct consolidado.id
								FROM consolidado INNER JOIN consolidado_historico ON consolidado.id = consolidado_historico.consolidado_id
								WHERE consolidado.status = 1 AND ((consolidado_historico.data >= DATE_SUB(NOW(), INTERVAL 7 DAY) AND receptividade != 0) 
									OR receptividade <= -3)
						)');	
			
			
			$data['total_contactado'] = $this->model_default->get_data_value('TOTAL_CONTACTADO', 
					'SELECT COUNT(1) TOTAL_CONTACTADO
						FROM consolidado 
							INNER JOIN consolidado_historico ON consolidado.id = consolidado_historico.consolidado_id
							WHERE consolidado.status != 0 AND ((consolidado_historico.data >= DATE_SUB(NOW(), INTERVAL 7 DAY) 
							AND receptividade != 0) OR receptividade <= -3)
					');
				
				$data['consolidadores'] = $this->model_default->get_table('usuario', array('id, nome'), '1=1');
				$data['js'] = 'dash_coordenador';
				
				$this->functions->load_site('_site', 'dashboard/coordenador', $data);		


		
		} elseif ($nivel_id == 3) { //Lider GC
		
					$data['total_consolidando'] = $this->model_default->get_data_value('TOTAL_CONSOLIDANDO', 
					'SELECT COUNT(1) TOTAL_CONSOLIDANDO
						FROM consolidado 
						LEFT JOIN consolidado_historico ON consolidado_historico.consolidado_id = consolidado.id AND receptividade <= -3
							WHERE consolidado.status NOT IN (0, 4, 6, 7)
							AND consolidado.gc_id = ' . $gc_id . '
						AND consolidado_historico.id IS NULL');	
						
					$data['total_aguardando'] = $this->model_default->get_data_value('TOTAL_AGUARDANDO', 
							'SELECT count(1) TOTAL_AGUARDANDO
									FROM consolidado 
								WHERE consolidado.status NOT IN (0, 4, 6, 7) 
								AND consolidado.gc_id = ' . $gc_id . '
								AND consolidado.id NOT IN (        
									SELECT distinct consolidado.id
										FROM consolidado INNER JOIN consolidado_historico ON consolidado.id = consolidado_historico.consolidado_id
										WHERE consolidado.status = 1 AND ((consolidado_historico.data >= DATE_SUB(NOW(), INTERVAL 7 DAY) AND receptividade != 0) 
											OR receptividade <= -3)
								)');	
					
					
					$data['total_contactado'] = $this->model_default->get_data_value('TOTAL_CONTACTADO', 
							'SELECT COUNT(1) TOTAL_CONTACTADO
								FROM consolidado 
									INNER JOIN consolidado_historico ON consolidado.id = consolidado_historico.consolidado_id
									WHERE consolidado.status != 0
									AND consolidado.gc_id = ' . $gc_id . '
									AND ((consolidado_historico.data >= DATE_SUB(NOW(), INTERVAL 7 DAY) 
									AND receptividade != 0) OR receptividade <= -3)
							');
						
					$data['consolidadores'] = $this->model_default->get_table('usuario', array('id, nome'), '1=1', 'nome');
					$data['js'] = 'dash_coordenador';
					
					$this->functions->load_site('_site', 'dashboard/coordenador', $data);							
		
		} elseif ($nivel_id == 4) { //Coordenador
		
		
					$data['total_consolidando'] = $this->model_default->get_data_value('TOTAL_CONSOLIDANDO', 
					'SELECT COUNT(1) TOTAL_CONSOLIDANDO
						FROM consolidado 
						LEFT JOIN consolidado_historico ON consolidado_historico.consolidado_id = consolidado.id AND receptividade <= -3
							WHERE consolidado.status NOT IN (0, 4, 6, 7)
								AND (user_cadastro = \'' . $_SESSION['s_login'] . '\' OR
									consolidado.id IN 
										(SELECT distinct consolidado_id 
												FROM usuario_consolidado 
											WHERE usuario_id = ' . $_SESSION['s_usuario_id'] . ' 
											OR coordenador_id = ' . $_SESSION['s_usuario_id'] . ' ))
						AND consolidado_historico.id IS NULL');	
						
					$data['total_aguardando'] = $this->model_default->get_data_value('TOTAL_AGUARDANDO', 
							'SELECT count(1) TOTAL_AGUARDANDO
									FROM consolidado 
								WHERE consolidado.status NOT IN (0, 4, 6, 7) 
								AND (user_cadastro = \'' . $_SESSION['s_login'] . '\' OR
									consolidado.id IN 
										(SELECT distinct consolidado_id 
												FROM usuario_consolidado 
											WHERE usuario_id = ' . $_SESSION['s_usuario_id'] . ' 
											OR coordenador_id = ' . $_SESSION['s_usuario_id'] . ' ))
								AND consolidado.id NOT IN (        
									SELECT distinct consolidado.id
										FROM consolidado INNER JOIN consolidado_historico ON consolidado.id = consolidado_historico.consolidado_id
										WHERE consolidado.status = 1 AND ((consolidado_historico.data >= DATE_SUB(NOW(), INTERVAL 7 DAY) AND receptividade != 0) 
											OR receptividade <= -3)
								)');	
					
					
					$data['total_contactado'] = $this->model_default->get_data_value('TOTAL_CONTACTADO', 
							'SELECT COUNT(1) TOTAL_CONTACTADO
								FROM consolidado 
									INNER JOIN consolidado_historico ON consolidado.id = consolidado_historico.consolidado_id
									WHERE consolidado.status != 0
									AND (user_cadastro = \'' . $_SESSION['s_login'] . '\' OR
									consolidado.id IN 
										(SELECT distinct consolidado_id 
												FROM usuario_consolidado 
											WHERE usuario_id = ' . $_SESSION['s_usuario_id'] . ' 
											OR coordenador_id = ' . $_SESSION['s_usuario_id'] . ' ))
									AND ((consolidado_historico.data >= DATE_SUB(NOW(), INTERVAL 7 DAY) 
									AND receptividade != 0) OR receptividade <= -3)
							');	
						
					$data['consolidadores'] = $this->model_default->get_table('usuario', array('id, nome'), '1=1', 'nome');
					$data['js'] = 'dash_coordenador';
					$data['css'] = 'null';					
					
					$this->functions->load_site('_site', 'dashboard/coordenador', $data);
					
												
		
		} elseif ($nivel_id > 4) { //Consolidador
		
					$data['total_consolidando'] = $this->model_default->get_data_value('TOTAL_CONSOLIDANDO', 
					'SELECT COUNT(1) TOTAL_CONSOLIDANDO
						FROM consolidado 
						LEFT JOIN consolidado_historico ON consolidado_historico.consolidado_id = consolidado.id AND receptividade <= -3
							WHERE consolidado.status = 1
								AND (user_cadastro = \'' . $_SESSION['s_login'] . '\' OR
									consolidado.id IN 
										(SELECT distinct consolidado_id 
												FROM usuario_consolidado 
											WHERE usuario_id = ' . $_SESSION['s_usuario_id'] . ' 
											OR coordenador_id = ' . $_SESSION['s_usuario_id'] . ' ))
						AND consolidado_historico.id IS NULL');	
						
					$data['total_aguardando'] = $this->model_default->get_data_value('TOTAL_AGUARDANDO', 
							'SELECT count(1) TOTAL_AGUARDANDO
									FROM consolidado 
								WHERE consolidado.status = 1 
								AND (user_cadastro = \'' . $_SESSION['s_login'] . '\' OR
									consolidado.id IN 
										(SELECT distinct consolidado_id 
												FROM usuario_consolidado 
											WHERE usuario_id = ' . $_SESSION['s_usuario_id'] . ' 
											OR coordenador_id = ' . $_SESSION['s_usuario_id'] . ' ))
								AND consolidado.id NOT IN (        
									SELECT distinct consolidado.id
										FROM consolidado INNER JOIN consolidado_historico ON consolidado.id = consolidado_historico.consolidado_id
										WHERE consolidado.status = 1 AND ((consolidado_historico.data >= DATE_SUB(NOW(), INTERVAL 7 DAY) AND receptividade != 0) 
											OR receptividade <= -3)
								)');	
					
					
					$data['total_contactado'] = $this->model_default->get_data_value('TOTAL_CONTACTADO', 
							'SELECT COUNT(1) TOTAL_CONTACTADO
								FROM consolidado 
									INNER JOIN consolidado_historico ON consolidado.id = consolidado_historico.consolidado_id
									WHERE consolidado.status != 0
									AND (user_cadastro = \'' . $_SESSION['s_login'] . '\' OR
									consolidado.id IN 
										(SELECT distinct consolidado_id 
												FROM usuario_consolidado 
											WHERE usuario_id = ' . $_SESSION['s_usuario_id'] . ' 
											OR coordenador_id = ' . $_SESSION['s_usuario_id'] . ' ))
									AND ((consolidado_historico.data >= DATE_SUB(NOW(), INTERVAL 7 DAY) 
									AND receptividade != 0) OR receptividade <= -3)
							');	
							
				$data['js'] = 'dash_consolidador';
				$data['css'] = 'null';
				
				$this->functions->load_site('_site', 'dashboard/consolidador', $data);							
		}
		
		
		/*
		if ($nivel_id > 4) {
			
				
				$data['total_consolidando'] = $this->model_default->get_data_value('TOTAL_CONSOLIDANDO', 'SELECT COUNT(1) TOTAL_CONSOLIDANDO FROM consolidado LEFT JOIN usuario_consolidado ON consolidado_id = consolidado.id WHERE usuario_id = ' . $_SESSION['s_usuario_id'] . ' OR user_cadastro = \'' . $_SESSION['s_login'] . '\'');		
				
				
				$data['total_aguardando'] = $this->model_default->get_data_value('TOTAL_AGUARDANDO', 'SELECT COUNT(1) TOTAL_AGUARDANDO FROM consolidado LEFT JOIN usuario_consolidado ON consolidado_id = consolidado.id WHERE (usuario_id = ' . $_SESSION['s_usuario_id'] . ' OR user_cadastro = \'' . $_SESSION['s_login'] . '\') AND id NOT IN ( SELECT consolidado_id FROM consolidado_historico WHERE usuario_id = ' . $_SESSION['s_usuario_id'] . ' )');		
		
				
				$data['total_contactado'] = $this->model_default->get_data_value('TOTAL_CONTACTADO', 'SELECT COUNT(1) TOTAL_CONTACTADO FROM consolidado LEFT JOIN usuario_consolidado ON consolidado_id = consolidado.id  WHERE (usuario_id = ' . $_SESSION['s_usuario_id'] . ' OR user_cadastro = \'' . $_SESSION['s_login'] . '\') AND id IN ( SELECT consolidado_id FROM consolidado_historico WHERE usuario_id = ' . $_SESSION['s_usuario_id'] . ' )');
				
				
				$data['js'] = 'dash_consolidador';
				
				$this->functions->load_site('_site', 'dashboard/consolidador', $data);
		} else {
			
				$data['total_consolidando'] = $this->model_default->get_data_value('TOTAL_CONSOLIDANDO', 'SELECT COUNT(1) TOTAL_CONSOLIDANDO FROM consolidado LEFT JOIN usuario_consolidado ON consolidado_id = consolidado.id WHERE usuario_id = ' . $_SESSION['s_usuario_id'] . ' OR user_cadastro = \'' . $_SESSION['s_login'] . '\'');		
				
				
				$data['total_aguardando'] = $this->model_default->get_data_value('TOTAL_AGUARDANDO', 'SELECT COUNT(1) TOTAL_AGUARDANDO FROM consolidado 
			LEFT JOIN usuario_consolidado ON consolidado_id = consolidado.id 
			WHERE (usuario_id = ' . $_SESSION['s_usuario_id'] . ' OR user_cadastro = \'' . $_SESSION['s_login'] . '\') AND id NOT IN (
				SELECT consolidado_id FROM consolidado_historico WHERE usuario_id = ' . $_SESSION['s_usuario_id'] . ' )');		
		
				
				$data['total_contactado'] = $this->model_default->get_data_value('TOTAL_CONTACTADO', 'SELECT COUNT(1) TOTAL_CONTACTADO FROM consolidado 
			LEFT JOIN usuario_consolidado ON consolidado_id = consolidado.id 
			WHERE (usuario_id = ' . $_SESSION['s_usuario_id'] . ' OR user_cadastro = \'' . $_SESSION['s_login'] . '\') AND id IN (
				SELECT consolidado_id FROM consolidado_historico WHERE usuario_id = ' . $_SESSION['s_usuario_id'] . ' )');
				
				
				$data['consolidadores'] = $this->model_default->get_table('usuario', array('id, nome'), '1=1');
				
				$data['js'] = 'dash_coordenador';	
				
				
				$this->functions->load_site('_site', 'dashboard/coordenador', $data);			
				
		}
		
			*/
		
		


		
		
	}
	
	
	
	public function pendente()
	{
		
		$nivel_id = $_SESSION['s_nivel_id'];
		$gc_id = $_SESSION['s_gc_id'];
		
		// ##### Aguardando contato:
		// Para o Consolidador é:
		// 			usuario_consolidado com usuario_id = id 
		//			consolidado com user_cadastro = login
		//			nao exisistir no conceito "Receberam Contato"
		// Para o Coordenador é:
		// 			usuario_consolidado com coordenador_id = id ou usuario_id = id
		//			consolidado com user_cadastro = login
		//			nao exisistir no conceito "Receberam Contato"
		// Para o Lider GC é:
		//			consolidado.gc_id = usuario.gc_id
		// 			usuario_consolidado com coordenador_id = id ou usuario_id = id
		//			consolidado com user_cadastro = login
		//			nao exisistir no conceito "Receberam Contato"		
		// Para o Administrador é:
		//			nao exisistir no conceito "Receberam Contato"
		// Query Básica 
		/*
		SELECT max(data_culto) data_culto, max(culto.nome_culto) nome_culto, consolidado.nome nome, TIMESTAMPDIFF(YEAR,data_nasc,CURDATE())  idade, decisao, count(consolidado_historico.id) contatos_realizados, max(consolidado_historico.data) ultimo_contato, max(usuario_consolidado.data) encaminhado_data
	FROM consolidado 
		LEFT JOIN consolidado_historico ON consolidado.id = consolidado_historico.consolidado_id
		LEFT JOIN usuario_consolidado ON usuario_consolidado.consolidado_id = consolidado.id
		LEFT JOIN culto ON culto.id = culto_id
 WHERE consolidado.status = 1 
	AND consolidado.id NOT IN (        
        SELECT distinct consolidado.id
			FROM consolidado INNER JOIN consolidado_historico ON consolidado.id = consolidado_historico.consolidado_id
 			WHERE consolidado.status = 1 AND ((consolidado_historico.data >= DATE_SUB(NOW(), INTERVAL 7 DAY) AND receptividade != 0) OR receptividade <= -3)
		)
GROUP BY consolidado.nome, idade, decisao
ORDER BY data_culto DESC, decisao ASC		
		

		
		//1 = Administrador
		//2 = Pastor
		//3 = Lider GC
		//4 = Coordenador
		//5 = Consolidador
		
		*/
		
		
				
		if ($nivel_id <= 2) { //1 = Administrador //2 = Pastor
			
			$this->model_default->get_data_table('consolidado, consolidado_historico, usuario_consolidado, culto', 
				array('data_culto, nome_culto, nome, idade, decisao, nome_status, progresso, sexo, 
						nome_estado, bairro, cidade, contatos_realizados, ultimo_contato, encaminhado_data, shaid'),'', 
						'SELECT max(data_culto) data_culto, max(culto.nome_culto) nome_culto, 
						consolidado.nome nome, TIMESTAMPDIFF(YEAR,data_nasc,CURDATE())  idade, 
						decisao, nome_status, progresso, sexo, nome_estado, nome_bairro bairro, nome_municipio cidade,
						count(consolidado_historico.id) contatos_realizados, 
						max(consolidado_historico.data) ultimo_contato, max(usuario_consolidado.data) encaminhado_data, 
						sha1(consolidado.id) shaid
							FROM consolidado 
								LEFT JOIN consolidado_historico ON consolidado.id = consolidado_historico.consolidado_id
								LEFT JOIN usuario_consolidado ON usuario_consolidado.consolidado_id = consolidado.id
								LEFT JOIN culto ON culto.id = culto_id
								LEFT JOIN consolidado_status ON status = consolidado_status.id
								LEFT JOIN estadocivil ON estado_civil = estadocivil.id
								LEFT JOIN bairro ON bairro_id = bairro.id
								LEFT JOIN municipio ON bairro.municipio_id = municipio.id
							WHERE consolidado.status NOT IN (0, 4, 6, 7)
								AND consolidado.id NOT IN (        
								SELECT distinct consolidado.id
									FROM consolidado INNER JOIN consolidado_historico ON consolidado.id = consolidado_historico.consolidado_id
									WHERE consolidado.status = 1 AND ((consolidado_historico.data >= DATE_SUB(NOW(), INTERVAL 7 DAY) AND receptividade != 0) 
									OR receptividade <= -3)
								)
							GROUP BY consolidado.nome, idade, decisao
							ORDER BY data_culto DESC, decisao ASC');
										
		} elseif ($nivel_id ==  3) { //3 = Lider GC
		//			consolidado.gc_id = usuario.gc_id
		// 			usuario_consolidado com coordenador_id = id ou usuario_id = id
		//			consolidado com user_cadastro = login

			$this->model_default->get_data_table('consolidado, consolidado_historico, usuario_consolidado, culto', 
				array('data_culto, nome_culto, nome, idade, decisao, nome_status, progresso, sexo, 
						nome_estado, bairro, cidade, contatos_realizados, ultimo_contato, encaminhado_data, shaid'),'', 
						'SELECT max(data_culto) data_culto, max(culto.nome_culto) nome_culto, 
						consolidado.nome nome, TIMESTAMPDIFF(YEAR,data_nasc,CURDATE())  idade, 
						decisao, nome_status, progresso, sexo, nome_estado, nome_bairro bairro, nome_municipio cidade,
						count(consolidado_historico.id) contatos_realizados, 
						max(consolidado_historico.data) ultimo_contato, max(usuario_consolidado.data) encaminhado_data, 
						sha1(consolidado.id) shaid
							FROM consolidado 
								LEFT JOIN consolidado_historico ON consolidado.id = consolidado_historico.consolidado_id
								LEFT JOIN usuario_consolidado ON usuario_consolidado.consolidado_id = consolidado.id
								LEFT JOIN culto ON culto.id = culto_id
								LEFT JOIN consolidado_status ON status = consolidado_status.id
								LEFT JOIN estadocivil ON estado_civil = estadocivil.id
								LEFT JOIN bairro ON bairro_id = bairro.id
								LEFT JOIN municipio ON bairro.municipio_id = municipio.id								
							WHERE consolidado.status NOT IN (0, 4, 6, 7) 
								AND consolidado.id NOT IN (        
								SELECT distinct consolidado.id
									FROM consolidado INNER JOIN consolidado_historico ON consolidado.id = consolidado_historico.consolidado_id
									WHERE consolidado.status = 1 AND ((consolidado_historico.data >= DATE_SUB(NOW(), INTERVAL 7 DAY) AND receptividade != 0) 
									OR receptividade <= -3)
								)
								AND (consolidado.gc_id = ' . $gc_id . '
								OR (coordenador_id = ' . $_SESSION['s_usuario_id'] . ' OR usuario_consolidado.usuario_id = ' . $_SESSION['s_usuario_id'] . ' 
									OR user_cadastro = \'' . $_SESSION['s_login'] . '\'))
							GROUP BY consolidado.nome, idade, decisao
							ORDER BY data_culto DESC, decisao ASC');		
					
					

					
								
		} elseif ($nivel_id >= 4) { //4 = Coordenador //5 = Consolidador

			$this->model_default->get_data_table('consolidado, consolidado_historico, usuario_consolidado, culto', 
				array('data_culto, nome_culto, nome, idade, decisao, nome_status, progresso, sexo, 
						nome_estado, bairro, cidade, contatos_realizados, ultimo_contato, encaminhado_data, shaid'),'', 
						'SELECT max(data_culto) data_culto, max(culto.nome_culto) nome_culto, 
						consolidado.nome nome, TIMESTAMPDIFF(YEAR,data_nasc,CURDATE())  idade, 
						decisao, nome_status, progresso, sexo, nome_estado, nome_bairro bairro, nome_municipio cidade,
						count(consolidado_historico.id) contatos_realizados, 
						max(consolidado_historico.data) ultimo_contato, max(usuario_consolidado.data) encaminhado_data, 
						sha1(consolidado.id) shaid
							FROM consolidado 
								LEFT JOIN consolidado_historico ON consolidado.id = consolidado_historico.consolidado_id
								LEFT JOIN usuario_consolidado ON usuario_consolidado.consolidado_id = consolidado.id
								LEFT JOIN culto ON culto.id = culto_id
								LEFT JOIN consolidado_status ON status = consolidado_status.id
								LEFT JOIN estadocivil ON estado_civil = estadocivil.id
								LEFT JOIN bairro ON bairro_id = bairro.id
								LEFT JOIN municipio ON bairro.municipio_id = municipio.id								
							WHERE consolidado.status NOT IN (0, 2, 4, 6, 7)
								AND (coordenador_id = ' . $_SESSION['s_usuario_id'] . ' OR usuario_consolidado.usuario_id = ' . $_SESSION['s_usuario_id'] . ' 
									OR user_cadastro = \'' . $_SESSION['s_login'] . '\')
							GROUP BY consolidado.nome, idade, decisao
							ORDER BY data_culto DESC, decisao ASC');
		
		}
		
		
	
	}
	
	
	public function em_consolidacao()
	{
		
		$nivel_id = $_SESSION['s_nivel_id'];
		$gc_id = $_SESSION['s_gc_id'];	
		
		
		if ($nivel_id <= 2) { //1 = Administrador //2 = Pastor
		
		} elseif ($nivel_id ==  3) { //3 = Lider GC
		//			consolidado.gc_id = usuario.gc_id
		// 			usuario_consolidado com coordenador_id = id ou usuario_id = id
		//			consolidado com user_cadastro = login
				
		} elseif ($nivel_id == 4) { //4 = Coordenador 
		
			$this->model_default->get_data_table('consolidado, usuario_consolidado, culto', array('data_culto, nome_culto, nome, idade, decisao, nome_status, progresso, sexo, nome_estado, bairro, cidade, shaid'),'', 								
						'SELECT distinct data_culto, nome_culto, consolidado.nome, 
						TIMESTAMPDIFF(YEAR,consolidado.data_nasc,CURDATE()) idade, decisao, 
						nome_status, progresso, sexo, nome_estado, nome_bairro bairro, nome_municipio cidade, sha1(consolidado.id) shaid 
							FROM consolidado 
									LEFT JOIN consolidado_historico ON consolidado.id = consolidado_historico.consolidado_id
									LEFT JOIN usuario_consolidado ON usuario_consolidado.consolidado_id = consolidado.id
									LEFT JOIN culto ON culto.id = culto_id
									LEFT JOIN consolidado_status ON status = consolidado_status.id
									LEFT JOIN estadocivil ON estado_civil = estadocivil.id
									LEFT JOIN bairro ON bairro_id = bairro.id
									LEFT JOIN municipio ON bairro.municipio_id = municipio.id
								WHERE consolidado.status in (8, 1, 3, 2, 5)
								AND (user_cadastro = \'' . $_SESSION['s_login'] . '\' OR usuario_consolidado.coordenador_id = ' . $_SESSION['s_usuario_id'] . '
								OR usuario_consolidado.usuario_id = ' . $_SESSION['s_usuario_id'] . ')
								AND usuario_consolidado.usuario_id IS NOT NULL
								GROUP BY consolidado.nome, idade, decisao
								ORDER BY data_culto DESC, decisao ASC');
								
		} elseif ($nivel_id >= 5) { //5 = Consolidador
		
			$this->model_default->get_data_table('consolidado, usuario_consolidado, culto', array('data_culto, nome_culto, nome, idade, decisao, nome_status, progresso, sexo, nome_estado, bairro, cidade, shaid'),'', 								
						'SELECT distinct data_culto, nome_culto, consolidado.nome, 
						TIMESTAMPDIFF(YEAR,consolidado.data_nasc,CURDATE()) idade, decisao, 
						nome_status, progresso, sexo, nome_estado, nome_bairro bairro, nome_municipio cidade, sha1(consolidado.id) shaid 
							FROM consolidado 
									LEFT JOIN consolidado_historico ON consolidado.id = consolidado_historico.consolidado_id
									LEFT JOIN usuario_consolidado ON usuario_consolidado.consolidado_id = consolidado.id
									LEFT JOIN culto ON culto.id = culto_id
									LEFT JOIN consolidado_status ON status = consolidado_status.id
									LEFT JOIN estadocivil ON estado_civil = estadocivil.id
									LEFT JOIN bairro ON bairro_id = bairro.id
									LEFT JOIN municipio ON bairro.municipio_id = municipio.id
								WHERE consolidado.status = 2
								AND (user_cadastro = \'' . $_SESSION['s_login'] . '\' OR usuario_consolidado.coordenador_id = ' . $_SESSION['s_usuario_id'] . '
								OR usuario_consolidado.usuario_id = ' . $_SESSION['s_usuario_id'] . ')
								AND usuario_consolidado.usuario_id IS NOT NULL
								GROUP BY consolidado.nome, idade, decisao
								ORDER BY data_culto DESC, decisao ASC');				
							
		}
							
	
	}
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function receberam_contato()
	{
		
		$nivel_id = $_SESSION['s_nivel_id'];
		$gc_id = $_SESSION['s_gc_id'];
		
		//##### Receberam contato:
		//		consolidado = inativo 
		//		consolidado_historico com receptividade <= -3
		//		consolidado_historico com receptividade != 0 nos ultimos 7 dias
		/*
		Query Básica:

		SELECT max(data_culto) data_culto, max(culto.nome_culto) nome_culto, consolidado.nome nome, TIMESTAMPDIFF(YEAR,data_nasc,CURDATE())  idade, decisao, count(consolidado_historico.id) contatos_realizados, max(consolidado_historico.data) ultimo_contato, max(usuario_consolidado.data) encaminhado_data, sha1(consolidado.id) shaid
FROM consolidado INNER JOIN consolidado_historico ON consolidado.id = consolidado_historico.consolidado_id
LEFT JOIN usuario_consolidado ON usuario_consolidado.consolidado_id = consolidado.id
LEFT JOIN culto ON culto.id = culto_id
 WHERE consolidado.status = 1 AND ((consolidado_historico.data >= DATE_SUB(NOW(), INTERVAL 7 DAY) AND receptividade != 0) OR receptividade <= -3)
GROUP BY consolidado.nome, idade, decisao
ORDER BY data_culto DESC, decisao ASC

			
		

		
		//1 = Administrador
		//2 = Pastor
		//3 = Lider GC
		//4 = Coordenador
		//5 = Consolidador
		
		*/
		
		
				
		if ($nivel_id <= 2) { //1 = Administrador //2 = Pastor
			
			$this->model_default->get_data_table('consolidado, consolidado_historico, usuario_consolidado, culto', 
				array('data_culto, nome_culto, nome, idade, decisao, nome_status, progresso, sexo, 
						nome_estado, bairro, cidade, contatos_realizados, ultimo_contato, encaminhado_data, shaid'),'', 
						'SELECT max(data_culto) data_culto, max(culto.nome_culto) nome_culto, consolidado.nome nome, 
							TIMESTAMPDIFF(YEAR,data_nasc,CURDATE())  idade, decisao, nome_status, progresso, sexo, 
							nome_estado, nome_bairro bairro, nome_municipio cidade, count(consolidado_historico.id) contatos_realizados, 
							max(consolidado_historico.data) ultimo_contato, max(usuario_consolidado.data) encaminhado_data, sha1(consolidado.id) shaid
						FROM consolidado 
							INNER JOIN consolidado_historico ON consolidado.id = consolidado_historico.consolidado_id
							LEFT JOIN usuario_consolidado ON usuario_consolidado.consolidado_id = consolidado.id
							LEFT JOIN culto ON culto.id = culto_id
							LEFT JOIN consolidado_status ON status = consolidado_status.id
							LEFT JOIN estadocivil ON estado_civil = estadocivil.id
							LEFT JOIN bairro ON bairro_id = bairro.id
							LEFT JOIN municipio ON bairro.municipio_id = municipio.id
						WHERE consolidado.status NOT IN (0, 4, 6, 7) AND 
						((consolidado_historico.data >= DATE_SUB(NOW(), INTERVAL 7 DAY) AND receptividade != 0) 
							OR receptividade <= -3)
						GROUP BY consolidado.nome, idade, decisao
						ORDER BY data_culto DESC, decisao ASC');
										
		} elseif ($nivel_id ==  3) { //3 = Lider GC
		//			consolidado.gc_id = usuario.gc_id
		// 			usuario_consolidado com coordenador_id = id ou usuario_id = id
		//			consolidado com user_cadastro = login

			$this->model_default->get_data_table('consolidado, consolidado_historico, usuario_consolidado, culto', 
				array('data_culto, nome_culto, nome, idade, decisao, nome_status, progresso, sexo, 
						nome_estado, bairro, cidade, contatos_realizados, ultimo_contato, encaminhado_data, shaid'),'', 				
						'SELECT max(data_culto) data_culto, max(culto.nome_culto) nome_culto, consolidado.nome nome, 
							TIMESTAMPDIFF(YEAR,data_nasc,CURDATE())  idade, decisao, nome_status, progresso, sexo, 
							nome_estado, nome_bairro bairro, nome_municipio cidade,count(consolidado_historico.id) contatos_realizados, 
							max(consolidado_historico.data) ultimo_contato, max(usuario_consolidado.data) encaminhado_data, sha1(consolidado.id) shaid
						FROM consolidado 
							INNER JOIN consolidado_historico ON consolidado.id = consolidado_historico.consolidado_id
							LEFT JOIN usuario_consolidado ON usuario_consolidado.consolidado_id = consolidado.id
							LEFT JOIN culto ON culto.id = culto_id
							LEFT JOIN consolidado_status ON status = consolidado_status.id
							LEFT JOIN estadocivil ON estado_civil = estadocivil.id
							LEFT JOIN bairro ON bairro_id = bairro.id
							LEFT JOIN municipio ON bairro.municipio_id = municipio.id							
						WHERE consolidado.status NOT IN (0, 4, 6, 7) AND 
						((consolidado_historico.data >= DATE_SUB(NOW(), INTERVAL 7 DAY) AND receptividade != 0) 
							OR receptividade <= -3)
						AND (consolidado.gc_id = ' . $gc_id . '
								OR (coordenador_id = ' . $_SESSION['s_usuario_id'] . ' OR usuario_consolidado.usuario_id = ' . $_SESSION['s_usuario_id'] . ' 
									OR user_cadastro = \'' . $_SESSION['s_login'] . '\'))
									
						GROUP BY consolidado.nome, idade, decisao
						ORDER BY data_culto DESC, decisao ASC'
						);		
										
					
								
		} elseif ($nivel_id >= 4) { //4 = Coordenador //5 = Consolidador

			$this->model_default->get_data_table('consolidado, consolidado_historico, usuario_consolidado, culto', 
				array('data_culto, nome_culto, nome, idade, decisao, nome_status, progresso, sexo, 
						nome_estado, bairro, cidade, contatos_realizados, ultimo_contato, encaminhado_data, shaid'),'', 
						'SELECT max(data_culto) data_culto, max(culto.nome_culto) nome_culto, consolidado.nome nome, 
							TIMESTAMPDIFF(YEAR,data_nasc,CURDATE())  idade, decisao, nome_status, progresso, sexo, 
							nome_estado, nome_bairro bairro, nome_municipio cidade,count(consolidado_historico.id) contatos_realizados, 
							max(consolidado_historico.data) ultimo_contato, max(usuario_consolidado.data) encaminhado_data, sha1(consolidado.id) shaid
						FROM consolidado 
							INNER JOIN consolidado_historico ON consolidado.id = consolidado_historico.consolidado_id
							LEFT JOIN usuario_consolidado ON usuario_consolidado.consolidado_id = consolidado.id
							LEFT JOIN culto ON culto.id = culto_id
							LEFT JOIN consolidado_status ON status = consolidado_status.id
							LEFT JOIN estadocivil ON estado_civil = estadocivil.id
							LEFT JOIN bairro ON bairro_id = bairro.id
							LEFT JOIN municipio ON bairro.municipio_id = municipio.id							
						WHERE consolidado.status NOT IN (0, 4, 6, 7) AND 
						((consolidado_historico.data >= DATE_SUB(NOW(), INTERVAL 7 DAY) AND receptividade != 0) 
							OR receptividade <= -3)
						AND (coordenador_id = ' . $_SESSION['s_usuario_id'] . ' OR usuario_consolidado.usuario_id = ' . $_SESSION['s_usuario_id'] . ' 
									OR user_cadastro = \'' . $_SESSION['s_login'] . '\')
									
						GROUP BY consolidado.nome, idade, decisao
						ORDER BY data_culto DESC, decisao ASC');
		
		}
		
	
	}		
	
	public function sem_consolidador()
	{
		
		$nivel_id = $_SESSION['s_nivel_id'];
		$gc_id = $_SESSION['s_gc_id'];	
		
		// #### Sem consolidador
		// Para o Coordenador é:
		//		consolidado.user_cadastro = login
		//		consolidado = ativo
		//		Não existir em usuario_consolidado onde usuario = ativo
		// Para o Lider GC é:
		//		consolidado.gc_id = session gc_id
		//		consolidado = ativo
		//		Não existir em usuario_consolidado onde usuario = ativo		
		// Para o Administeador é:
		// Não existir em usuario_consolidado
		
		
		if ($nivel_id <= 2) {
			$this->model_default->get_data_table('consolidado, usuario_consolidado, culto', array('data_culto, nome_culto, nome, idade, decisao, data_cadastro, shaid'),'', 								
					'SELECT data_culto, nome_culto, consolidado.nome, 
					TIMESTAMPDIFF(YEAR,consolidado.data_nasc,CURDATE()) idade, decisao, 
					consolidado.data_cadastro, sha1(consolidado.id) shaid 
						FROM consolidado 
							LEFT JOIN culto ON culto_id = culto.id 
							LEFT JOIN usuario_consolidado ON usuario_consolidado.consolidado_id = consolidado.id 
							LEFT JOIN usuario ON usuario_consolidado.usuario_id = usuario.id AND usuario.status = 1
							LEFT JOIN consolidado_historico ON consolidado_historico.consolidado_id = consolidado.id AND receptividade <= -3
						WHERE consolidado.status NOT IN (0, 4, 6, 7)
							AND (usuario_consolidado.consolidado_id IS NULL
								OR usuario.id IS NULL)
							AND consolidado_historico.id IS NULL
					ORDER BY data_culto, decisao DESC');
			
		} elseif ($nivel_id == 3) {
		
		
			$this->model_default->get_data_table('consolidado, usuario_consolidado, culto', array('data_culto, nome_culto, nome, idade, decisao, data_cadastro, shaid'),'', 								
					'SELECT data_culto, nome_culto, consolidado.nome, 
					TIMESTAMPDIFF(YEAR,consolidado.data_nasc,CURDATE()) idade, decisao, 
					consolidado.data_cadastro, sha1(consolidado.id) shaid 
						FROM consolidado 
							LEFT JOIN culto ON culto_id = culto.id 
							LEFT JOIN usuario_consolidado ON usuario_consolidado.consolidado_id = consolidado.id 
							LEFT JOIN usuario ON usuario_consolidado.usuario_id = usuario.id AND usuario.status = 1
							LEFT JOIN consolidado_historico ON consolidado_historico.consolidado_id = consolidado.id AND receptividade <= -3
						WHERE consolidado.status NOT IN (0, 4, 6, 7)
							AND (consolidado.gc_id = ' . $gc_id . ' 
								OR user_cadastro = \'' . $_SESSION['s_login'] . '\')
							AND (usuario_consolidado.consolidado_id IS NULL
								OR usuario.id IS NULL)
							AND consolidado_historico.id IS NULL
					ORDER BY data_culto, decisao DESC');
			
		} elseif ($nivel_id >= 4) {
		
					$this->model_default->get_data_table('consolidado, usuario_consolidado, culto', array('data_culto, nome_culto, nome, idade, decisao, sexo,nome_estado, nome_bairro, nome_municipio, shaid'),'', 								
					'SELECT 
							data_culto, nome_culto, consolidado.nome, 
								TIMESTAMPDIFF(YEAR,consolidado.data_nasc,CURDATE()) idade, decisao, sexo, nome_estado, nome_bairro, nome_municipio,
								sha1(consolidado.id) shaid 
							FROM consolidado
								LEFT JOIN usuario_consolidado ON consolidado.id = usuario_consolidado.consolidado_id
								LEFT JOIN culto ON culto_id = culto.id 	
								LEFT JOIN estadocivil ON estado_civil = estadocivil.id
								LEFT JOIN bairro ON bairro_id = bairro.id
								LEFT JOIN municipio ON bairro.municipio_id = municipio.id								
							WHERE consolidado.status NOT IN (0, 4, 6, 7)
								AND (user_cadastro = \'' . $_SESSION['s_login'] . '\' OR usuario_consolidado.coordenador_id = ' . $_SESSION['s_usuario_id'] . ')
							GROUP BY data_culto, nome_culto, consolidado.nome, 
								consolidado.data_nasc, decisao, sexo, nome_estado, nome_bairro, nome_municipio,
								sha1(consolidado.id) 
							HAVING 
								MAX(usuario_consolidado.usuario_id) = 0
						UNION
						SELECT distinct data_culto, nome_culto, consolidado.nome, 
								TIMESTAMPDIFF(YEAR,consolidado.data_nasc,CURDATE()) idade, decisao, sexo, nome_estado, nome_bairro, nome_municipio,
								sha1(consolidado.id) shaid 
							FROM consolidado
								LEFT JOIN usuario_consolidado ON consolidado.id = usuario_consolidado.consolidado_id
								LEFT JOIN culto ON culto_id = culto.id 
								LEFT JOIN estadocivil ON estado_civil = estadocivil.id
								LEFT JOIN bairro ON bairro_id = bairro.id
								LEFT JOIN municipio ON bairro.municipio_id = municipio.id								
							WHERE usuario_consolidado.usuario_id IS NULL
								AND consolidado.status NOT IN (0, 4, 6, 7)
								AND user_cadastro = \'' . $_SESSION['s_login'] . '\'
						ORDER BY data_culto DESC, decisao, nome ASC');	
		}
	
	}		
	
	
			
	


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */