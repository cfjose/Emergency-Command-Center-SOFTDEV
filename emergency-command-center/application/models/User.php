<?php

/**
 * Created by PhpStorm.
 * User: chamb
 * Date: 12/4/2016
 * Time: 4:20 PM
 */
class User extends CI_Model
{
    public function signup($data){
        $this->db->select('*');
        $this->db->from('auth_user');
        $this->db->where('username', $data['username']);
        $this->db->where('password', MD5($data['password']));
        $this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows == 0){
            $this->db->insert('auth_user', $data);

            if($this->db->affected_rows() > 0){
                return true;
            }
        }else{
            return false;
        }
    }

    public function login($data){

        $this->db->select('*');
        $this->db->from('auth_user');
        $this->db->where('username', $data['username']);
        $this->db->where('password', MD5($data['password']));
        $this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows == 0){
            return true;
        }else{
            return false;
        }
    }

    public function read_user_information($data){

        $this->db->select('*');
        $this->db->from('auth_user');
        $this->db->where('username', $data['username']);
        $this->db->limit(1);

        $query = $this->db->get();

        if($query->num_rows == 0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function get_camp_location(){
        $this->load->database('campcoord', TRUE);

        $this->db->select('lat, lng');
        $this->db->from('markers_camp');

        $query = $this->db->get();

        if($query->num_rows == 0){
            return $query->result();
        }else{
            return false;
        }
    }
}