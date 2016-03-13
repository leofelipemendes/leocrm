<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of atendimento_model
 *
 * @author Leo
 */
class Areas_model extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
    
    function get($table,$fields,$where='',$perpage=0,$start=0,$one=false,$array='array'){
        
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->order_by('sistema','asc');
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
        $this->db->where('sis_id',$id);
        $this->db->limit(1);
        return $this->db->get('sistemas')->row();
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
    
    function getAreas($perpage=0,$start=0) {
        $this->db->select('sistemas.*,configusercall.conf_name');
        $this->db->from('sistemas');
        $this->db->join('configusercall','sistemas.sis_screen = configusercall.conf_cod');
        $this->db->order_by('sistema','asc');
        $this->db->limit($perpage,$start);
        
        $query = $this->db->get();
        
        $result = $query->result();
        return $result;
        
    }
    
    function getDropdownAreas() {
        $this->db->select('sis_id,sistema');
        $this->db->from('sistemas');
        $this->db->order_by('sistema');
        $query = $this->db->get();
        
        $result = $query->result();
        return $result;
    }
    
    function getPerfilAbertuira() {
        $this->db->select('conf_cod,conf_name');
        $this->db->from('configusercall');
        $this->db->order_by('conf_name');
        $query = $this->db->get();
        
        $result = $query->result();
        return $result;
        
    }

}
