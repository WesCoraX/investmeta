<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Campanhas extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        if(!$this->ion_auth->logged_in())
        {
            redirect('auth/login');
        }
        $this->load->model('Campanha');
    } 

    /*
     * Listing of campanhas
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('campanha/index?');
        $config['total_rows'] = $this->Campanha->get_all_campanhas_count();
        $this->pagination->initialize($config);

        $data['campanhas'] = $this->Campanha->get_all_campanhas($params);
        
        $data['_view'] = 'campanhas/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new campanha
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'cam_investimento' => $this->input->post('cam_investimento'),
				'cam_objetivo' => $this->input->post('cam_objetivo'),
				'cam_nome' => $this->input->post('cam_nome'),
				'cam_inicio' => $this->input->post('cam_inicio'),
				'cam_fim' => $this->input->post('cam_fim'),
				'cam_user' => $_SESSION ['user_id'],
            );
            
            $campanha_id = $this->Campanha->add_campanha($params);
            redirect('campanhas/index');
        }
        else
        {            
            $data['_view'] = 'campanhas/add';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Editing a campanha
     */
    function edit($cam_id)
    {   
        // check if the campanha exists before trying to edit it
        $data['campanha'] = $this->Campanha->get_campanha($cam_id);
        
        if(isset($data['campanha']['cam_id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
                    'cam_investimento' => $this->input->post('cam_investimento'),
                    'cam_objetivo' => $this->input->post('cam_objetivo'),
                    'cam_nome' => $this->input->post('cam_nome'),
                    'cam_inicio' => data_banco($this->input->post('cam_inicio')),
                    'cam_fim' => data_linda($this->input->post('cam_fim')),
                    'cam_user' => $_SESSION ['user_id'],
                );

                $this->Campanha->update_campanha($cam_id,$params);            
                redirect('campanhas/index');
            }
            else
            {
                $data['_view'] = 'campanhas/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The campanha you are trying to edit does not exist.');
    } 

    /*
     * Deleting campanha
     */
    function remove($cam_id)
    {
        $campanha = $this->Campanha->get_campanha($cam_id);

        // check if the campanha exists before trying to delete it
        if(isset($campanha['cam_id']))
        {
            $this->Campanha->delete_campanha($cam_id);
            redirect('campanhas/index');
        }
        else
            show_error('The campanha you are trying to delete does not exist.');
    }
    
}
