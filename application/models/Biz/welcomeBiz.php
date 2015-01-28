<?php
/**
 * @ description : sample code
 * @ author : Sookwon Lee <prog106@inkomaro.com>
 */
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
                return Errcode::code('E201');
            } else {
                $sql_prm[$v] = $prm[$v];
            }
        }
        $return['ret'] = 'OK';
        $return['msg'] = $this->welcome->getList1($sql_prm);
        return $return;
    }

    public function getList2($prm=array()) {
        $chkey = array();
        $sql_prm = array();
        foreach($chkey as $k => $v) {
            if(empty($prm[$v])) {
                return Errcode::code('E201');
            } else {
                $sql_prm[$v] = $prm[$v];
            }
        }
        $return['ret'] = 'OK';
        $return['msg'] = $this->welcome->getList2($sql_prm);
        return $return;
    }

    public function getOne($prm=null) {
        if(empty($prm) || (int)$prm !== $prm) return Errocde::code('X201');
        $return['ret'] = 'OK';
        $return['msg'] = $this->welcome->getOne($prm);
        return $return;
    }
    
    public function saveInfo($prm=array()) {
        $chkey = array('comments', 'photo');
        $sql_prm = array();
        foreach($chkey as $k => $v) {
            if(empty($prm[$v])) {
                return Errcode::code('E201');
            } else {
                $sql_prm[$v] = $prm[$v];
            }
        }
        $res = $this->welcome->saveInfo($sql_prm);
        if(empty($res)) {
            return Errcode::code('E100');
        } else {
            $return['ret'] = 'OK';
            $return['msg'] = $res;
            return $return;
        }
    }
}
