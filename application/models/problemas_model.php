<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of problemas_model
 *
 * @author Leo
 */
class problemas_model extends CI_Model{
    
     function __construct() {
        parent::__construct();
    }
    
    function get($table,$fields,$where='',$perpage=0,$start=0,$one=false,$array='array'){
        
        $this->db->select('problemas.*,sistemas.*,sla_solucao.*,prob_tipo_1.*,prob_tipo_2.*,prob_tipo_3.*');
        //$this->db->select($fields);
        $this->db->from($table);
        $this->db->join('sistemas','problemas.prob_area = sistemas.sis_id','LEFT');
        $this->db->join('sla_solucao','sla_solucao.slas_cod = problemas.prob_sla','LEFT');
        $this->db->join('prob_tipo_1','prob_tipo_1.probt1_cod = problemas.prob_tipo_1','LEFT');
        $this->db->join('prob_tipo_2','prob_tipo_2.probt2_cod = problemas.prob_tipo_2','LEFT');
        $this->db->join('prob_tipo_3','prob_tipo_3.probt3_cod = problemas.prob_tipo_3','LEFT');
        $this->db->order_by('problema','asc');
        $this->db->limit($perpage,$start);
        if($where){
            $this->db->where($where);
        }
        
        $query = $this->db->get();
        
        $result =  !$one  ? $query->result() : $query->row();
        return $result;
    }
    
    function count($table) {
        return $this->db->count_all($table);
    }
    
     function getById($id){
        $this->db->where('prob_id',$id);
        $this->db->limit(1);
        return $this->db->get('problemas')->row();
    }
    
     function add($table,$data){
        $this->db->insert($table, $data);         
        if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;       
    }
    
    function edit($table,$data,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->update($table, $data);

        if ($this->db->affected_rows() >= 0)
		{
			return TRUE;
		}
		
		return FALSE;       
    }
    
    function getSla(){
        $this->db->select('slas_cod,slas_desc');
        $this->db->from('sla_solucao');
        $this->db->order_by('slas_tempo');
        $query = $this->db->get();
        
        $result = $query->result();
        return $result;
    }
}
