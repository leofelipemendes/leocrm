<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Atendimento extends CI_Controller {
    

    function __construct() {
        parent::__construct();
//            if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
//            redirect('mapos/login');
//            }
            $this->load->helper(array('codegen_helper'));
            $this->load->model('atendimento_model','',TRUE);
            $this->data['menuAtendimento'] = 'Atendimento';
	}	
	
	function index(){
            //$this->data['menuAtendimento'] = 'Atendimento';
            $this->data['view'] = 'atendimento/atendimento';
            $this->load->view('tema/topo',$this->data);
	}
        
        function areas() {
            
            $this->load->library('table');
            $this->load->library('pagination');
            
            
        $config['base_url'] = base_url().'index.php/atendimento/areas';
        $config['total_rows'] = $this->atendimento_model->count('sistemas');
        $config['per_page'] = 10;
        $config['next_link'] = 'Próxima';
        $config['prev_link'] = 'Anterior';
        $config['full_tag_open'] = '<div class="pagination alternate"><ul>';
        $config['full_tag_close'] = '</ul></div>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a style="color: #2D335B"><b>';
        $config['cur_tag_close'] = '</b></a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['first_link'] = 'Primeira';
        $config['last_link'] = 'Última';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
       
            $this->pagination->initialize($config); 
            $this->data['results'] = $this->atendimento_model->get('sistemas','sis_id,sistema,sis_status,sis_email,sis_atende,sis_screen','',$config['per_page'],$this->uri->segment(3));
            $this->data['view'] = 'atendimento/areas';
            $this->load->view('tema/topo',$this->data);            
        }

}

