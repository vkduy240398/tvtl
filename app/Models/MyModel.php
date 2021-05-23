<?php
namespace App\Models;
use CodeIgniter\Model;
class MyModel extends Model {

    function __construct(){
        $this->db  = \Config\Database::connect('default');
    }
	public function select_array($data= '*',$where = NULL,$order ='id desc'){
       $builder = $this->db->table($this->table);
       if ($data !='') {
           $builder->select($data);
       }
        if ($where != null) {
         $builder->where($where);
         }
        if ($order != null) {
          $builder->orderBy($order);
        }
        $query   = $builder->get();
        return $query->getResult('array');
    }
    public function add($data=NULL){
        $builder = $this->db->table($this->table);
        if ($data !=NULL) {
            $result = $builder->insert($data);
        }
        // echo $this->db->getLastQuery();die;
        $insertID = $this->db->insertID();
        if ($result) {
            return array(
                'type' => 'success',
                'insertID' => $insertID
            );
        }
    }
    public function edit($data = NULL,$where = NULL){
        $builder = $this->db->table($this->table);
        if ($data != NULL && $where != NULL) {
            $result = $builder->update($data,$where);
        }
        //   echo $this->db->getLastQuery();die;
        if ($result) {
            return array(
                'type' => 'success',
            );
        }
    }

    public function find_one($where = NULL){
        $builder = $this->db->table($this->table);
        if ($where !=NULL) {
            $builder->where($where);
        }
        $result = $builder->get();
        return $result->getRowArray();
    }
    public function find_one_row($data = '*',$where){
        $builder = $this->db->table($this->table);
        if ($data !='') {
            $builder->select($data);
        }
        $builder->where($where);
        $result = $builder->get();
        return $result->getRowArray();
    }
    public function select_row_array($data = '*'){
        $builder = $this->db->table($this->table);
        $builder->select($data);
        $result = $builder->get();
        return $result->getRowArray();
    }
    public function select_row_array_where($data = '*',$where = NULL){
        $builder = $this->db->table($this->table);
        $builder->select($data);
        if ($where !=NULL) {
            $builder->where($where);
        }
        $result = $builder->get();
        return $result->getRowArray();
    }
    public function delete_where($where = NULL){
        $builder = $this->db->table($this->table);
        $result = $builder->delete($where);
        return $result;
    }
    public function where_not_in($arr){
        $builder = $this->db->table($this->table);
        $builder->whereNotIn('id',$arr);
        $result = $builder->get()->getResultArray();
        return $result;
    }
    public function select_max($field,$where = NULL){
        $builder = $this->db->table($this->table);
        if ($where != NULL) {
            $builder->where($where);
        }
        $builder->selectMax($field);
        $query   = $builder->get();
        return $query->getRowArray();
    }
  
    
}
