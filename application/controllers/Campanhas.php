<?php
class Campanhas extends CI_Controller {
	function __construct() {
		parent::__construct();

		if (!$this->ion_auth->logged_in()) {
			redirect('auth/login');
		}
		
		$this->load->model('Campanha');
		$this->load->helper('data');
		$this->user_id 		= $this->session->user_id;
	} 


	function index() {
		$params['limit'] 		= RECORDS_PER_PAGE; 
		$params['offset'] 		= ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

		$config 			= $this->config->item('pagination');
		$config['base_url'] 		= site_url('campanha/index?');
		$config['total_rows'] 		= $this->Campanha->get_all_campanhas_count();
		$this->pagination->initialize($config);

		$data['campanhas'] 		= $this->Campanha->get_all_campanhas($params,$this->user_id);
		$data['_view'] 			= 'campanhas/index';
		$this->load->view('layouts/main',$data);
	}


	function add() {
		$this->load->library('form_validation');

		$investment = $this->input->post('cam_investimento');
		$this->form_validation->set_rules('cam_investimento','Initial application','required|numeric|greater_than[0]');
		$this->form_validation->set_rules('cam_objetivo','Goal',"required|numeric|greater_than[$investment]");
		$this->form_validation->set_rules('cam_nome','Campaign name','required|max_length[255]');
		$this->form_validation->set_rules('cam_inicio','Start','required');
		$this->form_validation->set_rules('cam_fim','End','required|callback_valid_period');

		if($this->form_validation->run()) {   
			$params = array(
			                'cam_investimento' 	=> $this->input->post('cam_investimento'),
			                'cam_objetivo' 		=> $this->input->post('cam_objetivo'),
			                'cam_nome' 		=> $this->input->post('cam_nome'),
			                'cam_inicio' 		=> data_mysql($this->input->post('cam_inicio')),
			                'cam_fim' 		=> data_mysql($this->input->post('cam_fim')),
			                'cam_user' 		=> $this->user_id,
			                );

			$campanha_id 		= $this->Campanha->add_campanha($params);
			redirect('campanhas/index');
		} else {            
			$data['_view'] 		= 'campanhas/add';
			$this->load->view('layouts/main',$data);
		}
	}  


	function edit($cam_id) {   
      		  // check if the campanha exists before trying to edit it
		$data['campanha'] 	= $this->Campanha->get_campanha($cam_id);

		if(isset($data['campanha']['cam_id'])) {
			$this->load->library('form_validation');

			$investment = $this->input->post('cam_investimento');
			$this->form_validation->set_rules('cam_investimento','Initial application','required|numeric|greater_than[0]');
			$this->form_validation->set_rules('cam_objetivo','Goal',"required|numeric|greater_than[$investment]");
			$this->form_validation->set_rules('cam_nome','Campaign name','required|max_length[255]');
			$this->form_validation->set_rules('cam_inicio','Start','required');
			$this->form_validation->set_rules('cam_fim','End','required|callback_valid_period');

			if($this->form_validation->run()) {   
				$params = array(
				                'cam_investimento' 	=> $this->input->post('cam_investimento'),
				                'cam_objetivo' 		=> $this->input->post('cam_objetivo'),
				                'cam_nome' 		=> $this->input->post('cam_nome'),
				                'cam_inicio' 		=> data_mysql($this->input->post('cam_inicio')),
				                'cam_fim' 		=> data_mysql($this->input->post('cam_fim')),
				                );

				$this->Campanha->update_campanha($cam_id,$params);            
				redirect('campanhas/index');
			} else {
				$data['_view'] 	= 'campanhas/edit';
				$this->load->view('layouts/main',$data);
			}
		} else {
			show_error('The campanha you are trying to edit does not exist.');
		}
	} 


	function remove($cam_id) {
		$campanha 		= $this->Campanha->get_campanha($cam_id);

      		  // check if the campanha exists before trying to delete it
		if(isset($campanha['cam_id'])) {
			$this->Campanha->delete_campanha($cam_id);
			redirect('campanhas/index');
		} else {
			show_error('The campanha you are trying to delete does not exist.');
		}
	}

	function get_camp_time($id = 0){
		if ($id != 0) {
			$campaign = $this->Campanha->get_campanha($id);

			echo 'Campaign <strong>'.$campaign['cam_nome'].'</strong> from <strong>'.data_port($campaign['cam_inicio']).'</strong> to <strong>'.data_port($campaign['cam_fim']).'</strong>';
		}
	}

	// =====================================================================
	// ADDED
	// =====================================================================
	
	// DATE VALIDATION
	function valid_period() {
		$cam_start 			= strtotime(data_mysql($this->input->post('cam_inicio')));
		$cam_end 			= strtotime(data_mysql($this->input->post('cam_fim')));
		if ($cam_start >= $cam_end) {
			$this->form_validation->set_message('valid_period', 'The end of campaign can not be lesser of begin campaign '.$this->input->post('cam_inicio'));
			return false;
		}
		return true;	
	}
}
