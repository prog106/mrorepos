<?php
class WelcomeBiz extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->model('Dao/welcomeDao','welcome');
    }

    public function getList1($prm=array()) {
        $chkey = array('view_flag');
        $sql_prm = array();
        foreach($chkey as $k => $v) {
            if(empty($prm[$v])) {
                return Errcode::code('X201');
            } else {
                $sql_prm[$v] = $prm[$v];
            }
        }
        return $this->welcome->getList1($sql_prm);
    }

    public function getList2($prm=array()) {
        $chkey = array();
        $sql_prm = array();
        foreach($chkey as $k => $v) {
            if(empty($prm[$v])) {
                return Errcode::code('X201');
            } else {
                $sql_prm[$v] = $prm[$v];
            }
        }
        return $this->welcome->getList2($sql_prm);
    }

    public function getOne($prm=null) {
        if(empty($prm) || (int)$prm !== $prm) return Errocde::code('X201');
        return $this->welcome->getOne($prm);
    }
    
    public function saveInfo($prm=array()) {
        $chkey = array('comments', 'photo');
        $sql_prm = array();
        foreach($chkey as $k => $v) {
            if(empty($prm[$v])) {
                return Errcode::code('X201');
            } else {
                $sql_prm[$v] = $prm[$v];
            }
        }
        return $this->welcome->saveInfo($sql_prm);
    }
}
