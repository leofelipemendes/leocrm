<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of problemas
 *
 * @author Leo
 */
class Problemas extends CI_Controller{
   
    public function __construct() {
        parent::__construct();
        if((!$this->session->userdata('session_id')) || (!$this->session->userdata('logado'))){
            redirect('mapos/login');
            }
            $this->load->helper(array('codegen_helper'));
            $this->load->model('problemas_model','',TRUE);
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
    
    function adicionar() {
        echo 'teste';
    }
    
}
