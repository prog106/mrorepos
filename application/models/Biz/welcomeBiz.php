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
                $return['ret'] = 'ERR';
                $return['msg'] = lang('check parameter');
                return $return;
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
                $return['ret'] = 'ERR';
                $return['msg'] = lang('check parameter');
                return $return;
            } else {
                $sql_prm[$v] = $prm[$v];
            }
        }
        $this->load->driver('cache');
        $memkey = sprintf("WelcomeDao::getList2(%s)", serialize($sql_prm));
        $return = $this->cache->memcached->get($memkey);
        if(empty($return)) {
            $return['ret'] = 'OK';
            $return['msg'] = $this->welcome->getList2($sql_prm);
            $this->cache->memcached->save($memkey, $return, 60*1);
        }
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
                $return['ret'] = 'ERR';
                $return['msg'] = lang('check parameter');
                return $return;
            } else {
                $sql_prm[$v] = $prm[$v];
            }
        }
        $res = $this->welcome->saveInfo($sql_prm);
        if(empty($res)) {
            $return['ret'] = 'ERR';
            $return['msg'] = lang('save failed');
            return $return;
        } else {
            $return['ret'] = 'OK';
            $return['msg'] = $res;
            return $return;
        }
    }

    public function getLogin($prm=array()) {
        $chkey = array('userid', 'userpassword');
        $sql_prm = array();
        foreach($chkey as $k => $v) {
            if(empty($prm[$v])) {
                $return['ret'] = 'ERR';
                $return['msg'] = lang('check parameter');
                return $return;
            } else {
                if($v == 'userpassword') {
                    $sql_prm[$v] = md5($prm[$v]);
                } else {
                    $sql_prm[$v] = $prm[$v];
                }
            }
        }
        $res = $this->welcome->getLogin($sql_prm);
        if(empty($res)) {
            $return['ret'] = 'ERR';
            $return['msg'] = lang('no match');
            return $return;
        } else {
            $return['ret'] = 'OK';
            $return['msg'] = $res;
            return $return;
        }
    }

    public function saveLogin($prm=array()) {
        $chkey = array('userid', 'userpassword');
        $sql_prm = array();
        foreach($chkey as $k => $v) {
            if(empty($prm[$v])) {
                $return['ret'] = 'ERR';
                $return['msg'] = lang('check parameter');
                return $return;
            } else {
                if($v == 'userpassword') {
                    $sql_prm[$v] = md5($prm[$v]);
                } else {
                    $sql_prm[$v] = $prm[$v];
                }
            }
        }
        $res = $this->welcome->saveLogin($sql_prm);
        if(empty($res)) {
            $return['ret'] = 'ERR';
            $return['msg'] = lang('save failed');
            return $return;
        } else {
            $return['ret'] = 'OK';
            $return['msg'] = $res;
            return $return;
        }
    }
}
