<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Welcome extends CI_Controller {
    /**
     * @ description : INCOMARO Sample Controller.
     * @ author : Sookwon Lee <prog106@inkomaro.com>
     */
    public function __construct() {
        parent::__construct();
        // status detail information
        // if(ENVIRONMENT !== 'release') $this->output->enable_profiler(true);

        $this->load->model('Biz/welcomeBiz', 'model');
        $this->load->helper(array('form', 'url'));
        $this->output->enable_profiler(true);
    }

    // 각종 샘플 모음
    public function index() {
        // 리스트1
        //debug(sc('S100'));
        //debug(sc('S100','msg'));
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

    // 회원가입
    public function exsignin() {
        if(empty($this->input->is_ajax_request())) {
            exit(json_encode(sc('E000')));
        }

        $prm['userid'] = $this->input->post('signin_id', true);
        $prm['userpassword'] = $this->input->post('signin_pw', true);

        $res = $this->model->saveLogin($prm);
        if($res['ret'] != 'OK') {
            exit(json_encode($res));
        }
        $return = array('ret' => 'OK', 'msg' => sc('S900','msg'));
        echo json_encode($return);
    }

    // login
    public function login() {
        $prm['userid'] = $this->input->post('login_id', true);
        $prm['userpassword'] = $this->input->post('login_pw', true);
        $returl = $this->input->post('returl', true);
        $returl = (empty($returl)) ? '/' : $returl;

        $res = $this->model->getLogin($prm);
        if($res['ret'] != 'OK') {
            alertmsg(sc('E900'));
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
            alertmsg(sc('E930'));
        }
        redirect($returl, 'refresh');
    }

    // logout
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
            alertmsg(sc('E920'));
        }
        redirect($returl, 'refresh');
    }

    // 신규 등록
    public function exadd() {
        if(empty($this->input->is_ajax_request())) {
            exit(json_encode(sc('E000')));
        }

        $prm['comments'] = $this->input->post('comments', true);
        $prm['photo'] = $this->input->post('upimg1_tmp', true);

        $res = $this->model->saveInfo($prm);
        if($res['ret'] != 'OK') {
            exit(json_encode($res));
        }

        $return = array('ret' => 'OK', 'msg' => sc('S100','msg'));
        echo json_encode($return);
    }
}
