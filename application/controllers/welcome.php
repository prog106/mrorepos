<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /**
     * INCOMARO Sample Controller.
     * prog106@inkomaro.com
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('Biz/welcomeBiz', 'model');
        $this->load->helper(array('form', 'url'));
    }
    public function index() {
        $data['list1'] = $this->model->getList1();
        $data['list2'] = $this->model->getList2();
        $data['one'] = $this->model->getOne(14);
        $data['ec'] = date('Y-m-d H:i:s');

        $data['page'] = 'welcome/uploads'; // template
        $this->load->view('common/body',$data);
    }
}
