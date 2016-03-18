<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of problemas
 * class problemas_model
 * @author Leo
 */
class Problemas extends CI_Controller{
   
    public function __construct() {
        parent::__construct();
        if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
            redirect('mapos/login');
            }
            $this->load->helper(array('codegen_helper','form'));
            $this->load->model('problemas_model','',TRUE);
            $this->load->model('areas_model','',TRUE);
            
            $this->data['menuAtendimento'] = 'Atendimento';
    }
    
    function index() {
        $this->gerenciar();
    }
    
    function gerenciar(){

        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'vCliente')){
           $this->session->set_flashdata('error','Você não tem permissão para visualizar problemas.');
           redirect(base_url());
        }
        $this->load->library('table');
        $this->load->library('pagination');
        
   
        $config['base_url'] = base_url().'index.php/problemas/gerenciar/';
        $config['total_rows'] = $this->problemas_model->count('problemas');
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
        
	$this->data['results'] = $this->problemas_model->get('problemas','prob_id,problema,prob_area,prob_sla,prob_tipo_1,prob_tipo_2,prob_tipo_3,prob_alimenta_banco_solucao,prob_descricao','',$config['per_page'],$this->uri->segment(3));
       	
       	$this->data['view'] = 'problemas/visualizar';
       	$this->load->view('tema/topo',$this->data);
    }
    
    public function visualizar(){

        $this->data['custom_error'] = '';
        $this->data['result'] = $this->problemas_model->getById($this->uri->segment(3));
        $this->data['view'] = 'problemas/visualizar';
        $this->load->view('tema/topo', $this->data);

    }
    
    function adicionar() {
          
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'aCliente')){
           $this->session->set_flashdata('error','Você não tem permissão para adicionar areas.');
           redirect(base_url());
        }
        $this->load->model('problemas_model','',TRUE);
        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('problemas') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            
            $data = array(
                'problema'    => strtoupper($this->input->post('problema')),
                'prob_area'  => $this->input->post('area'),
                'prob_alimenta_banco_solucao' => 1
            );
            if ($this->problemas_model->add('problemas', $data) == TRUE) {
                $this->session->set_flashdata('success','Novo Problema adicionado com sucesso!');
                redirect(base_url() . 'index.php/problemas/adicionar');
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $this->data['slas'] = $this->problemas_model->getSla();
        $this->data['areas'] = $this->areas_model->getDropdownAreas();
        $this->data['view'] = 'problemas/adicionarProblemas';
        //var_dump($_POST) or die();
        $this->load->view('tema/topo', $this->data);
    }
    
    function editar() {
        
        if(!$this->permission->checkPermission($this->session->userdata('permissao'),'eCliente')){
           $this->session->set_flashdata('error','Você não tem permissão para editar as areas.');
           redirect(base_url());
        }
        
        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('atendimento') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            
            if(!$this->input->post('areaatende') == FALSE){
                
            }
            
            $data = array(
                'sistema'    => strtoupper($this->input->post('nomeArea')),
                'sis_email'  => $this->input->post('email'),
                'sis_screen' => $this->input->post('screen_name'),
                'sis_status' => $this->input->post('status'),
                'sis_atende' => $sis_atende
            );

            if ($this->areas_model->edit('problemas', $data, 'sis_id', $this->input->post('sis_id')) == TRUE) {
                $this->session->set_flashdata('success','&Aacute;rea editada com sucesso!');
                //redirect(base_url() . 'index.php/clientes/editar/'.$this->input->post('idClientes'));
                redirect(base_url() . 'index.php/areas/areas');
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro</p></div>';
            }
        }


        $this->data['result'] = $this->areas_model->getById($this->uri->segment(3));
        $this->data['perfil'] = $this->areas_model->getPerfilAbertuira();
        $this->data['view'] = 'areas/editarArea';
        $this->load->view('tema/topo', $this->data);

    }
    
    
}
