<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Welcome extends CI_Controller {
    /**
     * @ description : INCOMARO Sample Controller.
     * @ author : Sookwon Lee <prog106@inkomaro.com>
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('Biz/welcomeBiz', 'model');
        $this->load->helper(array('form', 'url'));
    }

    public function index() {
        // 리스트1
        $data['logininfo'] = $this->encrypt->decode($this->input->cookie('mro', true));
        $prm['view_flag'] = 'Y';
        $res = $this->model->getList1($prm);
        if($res['ret'] != 'OK') {
            exit($res['msg']);
        }
        $data['list1'] = $res['msg'];

        // 리스트2
        $res = $this->model->getList2();
        if($res['ret'] != 'OK') {
            exit($res['msg']);
        }
        $data['list2'] = $res['msg'];

        // 1개
        $res = $this->model->getOne(14);
        if($res['ret'] != 'OK') {
            exit($res['msg']);
        }
        $data['one'] = $res['msg'];

        $data['ec'] = date('Y-m-d H:i:s');

        $data['tmp'] = 'welcome/uploads'; // template
        $this->load->view('common/body',$data);
    }

    public function exsignin() {
        if(empty($this->input->is_ajax_request())) {
            exit(json_encode(Errcode::code('X000')));
        }

        $prm['userid'] = $this->input->post('signin_id', true);
        $prm['userpassword'] = $this->input->post('signin_pw', true);

        $res = $this->model->saveLogin($prm);
        if($res['ret'] != 'OK') {
            exit(json_encode($res));
        }
        $return = array('ret' => 'OK', 'msg' => '회원가입 완료');
        echo json_encode($return);
    }

    public function login() {
        $prm['userid'] = $this->input->post('login_id', true);
        $prm['userpassword'] = $this->input->post('login_pw', true);
        $returl = $this->input->post('returl', true);

        $res = $this->model->getLogin($prm);
        if($res['ret'] != 'OK') {
            util::alertmsg(Errcode::code('E900'));
            redirect($returl, 'refresh');
        }
        $info = $res['msg'];

        // cookie setting
        $savecookie = $info['srl'].','.$info['userid'];
        $cookie_array = array(
            'name' => 'mro',
            'value' => $this->encrypt->encode($savecookie),
            'expire' => '0',//time(),
            'path' => '/',
        );
        $res = setcookie($cookie_array['name'], $cookie_array['value'], $cookie_array['expire'], $cookie_array['path']);
        if(empty($res)) {
            util::alertmsg(Errcode::code('E930'));
        }
        redirect($returl, 'refresh');
    }

    public function logout() {
        $returl = $this->input->post('returl', true);

        $cookie_array = array(
            'name' => 'mro',
            'value' => null,
            'expire' => null,
            'path' => '/',
        );
        setcookie($cookie_array['name'], $cookie_array['value'], $cookie_array['expire'], $cookie_array['path']);
        if(empty($this->input->cookie('mro', true))) {
            util::alertmsg(Errcode::code('E920'));
        }
        redirect($returl, 'refresh');
    }

    public function exadd() {
        if(empty($this->input->is_ajax_request())) {
            exit(json_encode(Errcode::code('X000')));
        }

        $prm['comments'] = $this->input->post('comments', true);
        $prm['photo'] = $this->input->post('upimg1_tmp', true);

        $res = $this->model->saveInfo($prm);
        if($res['ret'] != 'OK') {
            exit(json_encode($res));
        }

        $return['ret'] = 'OK';
        $return['msg'] = 'success';
        echo json_encode($return);
    }
}
