<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Welcome extends CI_Controller {
    /**
     * description : INCOMARO Sample Controller.
     * author : Sookwon Lee <prog106@inkomaro.com>
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('Biz/welcomeBiz', 'model');
        $this->load->helper(array('form', 'url'));
    }

    public function index() {
        // 리스트1
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
