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
        $prm['view_flag'] = 'Y';
        $data['list1'] = $this->model->getList1($prm);
        $data['list2'] = $this->model->getList2();
        $data['one'] = $this->model->getOne(14);
        $data['ec'] = date('Y-m-d H:i:s');

        $data['tmp'] = 'welcome/uploads'; // template
        $this->load->view('common/body',$data);
    }

    public function exindex() {
        if(empty($this->input->is_ajax_request())) {
            echo Errcode::axcode('X000');
            die;
        }
        $return['ret'] = 'OK';
        echo json_encode($return);
    }

    public function exadd() {
        if(empty($this->input->is_ajax_request())) {
            echo Errcode::axcode('X000');
            die;
        }
        $prm['comments'] = $this->input->post('comments', true);
        $prm['photo'] = $this->input->post('upimg1_tmp', true);

        $result = $this->model->saveInfo($prm);
        if($result === 'F' || empty($result)) {
            echo Errcode::axcode('X100');
            die;
        }
        $return['ret'] = 'OK';
        echo json_encode($return);
    }
}
