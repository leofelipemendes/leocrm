<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Atendimento extends CI_Controller {
    

    function __construct() {
        parent::__construct();
//            if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
//            redirect('mapos/login');
//            }
            $this->load->helper(array('codegen_helper'));
            $this->load->model('atendimento_model','',TRUE);
            $this->data['menuAtendimento'] = 'atendimento';
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
            $this->data['results'] = $this->atendimento_model->getAreas($config['per_page'],$this->uri->segment(3));
            $this->data['view'] = 'atendimento/areas';
            $this->load->view('tema/topo',$this->data);            
        }
        
        public function visualizar(){

        $this->data['custom_error'] = '';
        $this->data['result'] = $this->atendimento_model->getById($this->uri->segment(3));
        $this->data['view'] = 'atendimento/visualizar';
        $this->load->view('tema/topo', $this->data);

        
    }
    
    function editar() {
       
        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('atendimento') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $data = array(
                'sistema' => strtoupper($this->input->post('nomeArea')),
                'sis_email' => $this->input->post('email')
            );

            if ($this->atendimento_model->edit('sistemas', $data, 'sis_id', $this->input->post('sis_id')) == TRUE) {
                $this->session->set_flashdata('success','&Aacute;rea editada com sucesso!');
                //redirect(base_url() . 'index.php/clientes/editar/'.$this->input->post('idClientes'));
                redirect(base_url() . 'index.php/atendimento/areas');
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro</p></div>';
            }
        }


        $this->data['result'] = $this->atendimento_model->getById($this->uri->segment(3));
        $this->data['view'] = 'atendimento/editarArea';
        $this->load->view('tema/topo', $this->data);

    }

}

