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

    // xmlrpc server
    public function serv() {
        $this->load->library('xmlrpc');
        $this->load->library('xmlrpcs');

        $config['functions']['testserv'] = array('function' => 'Welcome.testserv');
        $config['object'] = $this;

        $this->xmlrpcs->initialize($config);
        $this->xmlrpcs->serve();
    }

    // xmlrpc server method
    public function testserv($request) {
        $prm = $request->output_parameters();
        $response = array(
            array(
                'ret' => 'S000',
                'msg' => $prm[0].$prm[1].' : No Message. Return Code Check, Please!',
            ),
        'struct');
        return $this->xmlrpc->send_response($response);
    }

    // 각종 샘플 모음
    public function index() {
        // status detail information
        if(ENVIRONMENT === 'development') $this->output->enable_profiler(true);

        // xmlrpc test
        $this->load->library('xmlrpc');

        $xmlurl = site_url('welcome/serv');
        $this->xmlrpc->server($xmlurl, 80);
        $this->xmlrpc->method('testserv');

        $request = array('parameter 1', 'parameter 2');
        $this->xmlrpc->request($request);

        if(!$this->xmlrpc->send_request()) {
            $data['rpcret'] = $this->xmlrpc->display_error();
        } else {
            $data['rpcret'] = $this->xmlrpc->display_response();
        }

        // memcached test
        $this->load->driver('cache');
        $times = $this->cache->memcached->get('times');
        if(empty($times)) {
            $this->cache->memcached->save('times', date('Y-m-d H:i:s'), 60*1); // sec
            $times = $this->cache->memcached->get('times');
        }
        $data['memcache_time'] = $times;

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
        $res = $this->model->getOne(10);
        if($res['ret'] != 'OK') {
            exit($res['msg']);
        }
        $data['one'] = $res['msg'];

        // 현재시간
        $data['ec'] = date('Y-m-d H:i:s');

        $data['tmp'] = 'welcome/uploads'; // template
        $this->load->view('common/body',$data);
    }

    public function memreset() {
        $this->load->driver('cache');
        $this->cache->memcached->delete('times');
        redirect('/welcome/', 'refresh');
    }

    public function memallreset() {
        $this->load->driver('cache');
        $this->cache->memcached->clean();
        redirect('/welcome/', 'refresh');
    }

    // mro test 시나리오 - main
    public function mro() {
        $data['tmp'] = 'mro/index';
        $this->load->view('mro/body',$data);
    }

    // mro test 시나리오 - search
    public function search() {
        $data['tmp'] = 'mro/search';
        $this->load->view('mro/body',$data);
    }

    // mro test 시나리오 - order
    public function order() {
        $data['tmp'] = 'mro/order';
        $this->load->view('mro/body',$data);
    }

    // mro test 시나리오 - orderlist
    public function orderlist() {
        $data['tmp'] = 'mro/orderlist';
        $this->load->view('mro/body',$data);
    }

    // mro test 시나리오 - cart 
    public function cart() {
        $data['tmp'] = 'mro/cart';
        $this->load->view('mro/body',$data);
    }

    // 회원가입
    public function exsignin() {
        if(empty($this->input->is_ajax_request())) {
            $return = array('ret' => 'ERR', 'msg' => lang('wrong connect'));
            exit(json_encode($return));
        }

        $prm['userid'] = $this->input->post('signin_id', true);
        $prm['userpassword'] = $this->input->post('signin_pw', true);

        $res = $this->model->saveLogin($prm);
        if($res['ret'] != 'OK') {
            exit(json_encode($res));
        }
        $return = array('ret' => 'OK', 'msg' => lang('singin complete'));
        echo json_encode($return);
    }

    // language cookie
    public function languages() {
        $langs = $this->input->post('langs', true);
        $cookie_array = array(
            'name' => 'languages',
            'value' => $langs,
            'expire' => time() + (60*60*24*265*100),
            'path' => '/',
        );
        setcookie($cookie_array['name'], $cookie_array['value'], $cookie_array['expire'], $cookie_array['path']);
        $return = array('ret' => 'OK', 'msg' => lang('language changed'));
        echo json_encode($return);
    }

    // login
    public function login() {
        $prm['userid'] = $this->input->post('login_id', true);
        $prm['userpassword'] = $this->input->post('login_pw', true);
        $returl = $this->input->post('returl', true);

        $res = $this->model->getLogin($prm);
        if($res['ret'] != 'OK') {
            alertmsg(lang('no match'));
            redirect((empty($returl)?'/':$returl), 'refresh');
        }
        $info = $res['msg'];

        // cookie setting
        $savecookie = $info['srl'].','.$info['userid'];
        $cookie_array = array(
            'name' => 'mro',
            'value' => $this->encrypt->encode($savecookie),
            'expire' => '0',//time() + 60 * 1,
            'path' => '/',
        );
        $res = setcookie($cookie_array['name'], $cookie_array['value'], $cookie_array['expire'], $cookie_array['path']);
        if(empty($res)) {
            alertmsg(lang('error'));
        }
        redirect((empty($returl)?'/':$returl), 'refresh');
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
            alertmsg(lang('error'));
        }
        redirect((empty($returl)?'/':$returl), 'refresh');
    }

    // 신규 등록
    public function exadd() {
        if(empty($this->input->is_ajax_request())) {
            $return = array('ret' => 'ERR', 'msg' => lang('wrong connect'));
            exit(json_encode($return));
        }

        $prm['comments'] = $this->input->post('comments', true);
        $prm['photo'] = $this->input->post('upimg1_tmp', true);

        $res = $this->model->saveInfo($prm);
        if($res['ret'] != 'OK') {
            exit(json_encode($res));
        }

        $return = array('ret' => 'OK', 'msg' => lang('success'));
        echo json_encode($return);
    }
}
