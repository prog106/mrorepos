<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @ description : INCOMARO Demo Version Buyer Controller.
 * @ author : Sookwon Lee <prog106@inkomaro.com>
 */
class Demobuyer extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->topmenu = array(
            'Home' => 'demobuyer/index',
            'My Page' => 'demobuyer/mypage',
            'Customer Center' => 'demobuyer/customer',
            'Cart' => 'demobuyer/cart',
        );
        $this->leftmenu = array(
            'Main' => 'demobuyer/index',
            'Search' => 'demobuyer/search',
            'OrderList' => 'demobuyer/orderlist',
            'Approval' => 'demobuyer/approval',
        );
        $this->searchlist = array(
            array('/static/img/ballbearing.png', 'B112345', 'Ball bearing', '1mm', 'PT Inkomaro', 'EA', '130000'),
            array('/static/img/sphbearing.png', 'B334568', 'Spherical bearing', '1mm', 'PT Inkomaro', 'EA', '160000'),
            array('/static/img/splitbearing.png', 'B213457', 'Split bearing', '1mm', 'PT Inkomaro', 'EA', '170000'),
            array('/static/img/jointbearing.png', 'B354323', 'Joint bearing', '1mm', 'PT Inkomaro', 'EA', '140000'),
            array('/static/img/slewingbearing.png', 'B539732', 'Slewing bearing', '1mm', 'PT Inkomaro', 'EA', '120000'),
        );
        $this->cartlist = array(
            array('/static/img/ballbearing.png', 'B112345', 'Ball bearing', '1mm', 'PT Inkomaro', 'EA', '130000', '20'),
            array('/static/img/jointbearing.png', 'B354323', 'Joint bearing', '1mm', 'PT Inkomaro', 'EA', '140000', '10'),
            array('/static/img/slewingbearing.png', 'B539732', 'Slewing bearing', '1mm', 'PT Inkomaro', 'EA', '120000', '50'),
        );
        $this->order = array(
            array('/static/img/ballbearing.png', 'B112345', 'Ball bearing', '1mm', 'PT Inkomaro', 'EA', '130000', '20', 130000*20),
            array('/static/img/jointbearing.png', 'B354323', 'Joint bearing', '1mm', 'PT Inkomaro', 'EA', '140000', '10', 140000*10),
            array('/static/img/slewingbearing.png', 'B539732', 'Slewing bearing', '1mm', 'PT Inkomaro', 'EA', '120000', '50', 120000*50),
        );
        $this->orderlist = array(
            array('2015-02-10', '2015-02-11',
                array(
                    array('/static/img/ballbearing.png', 'B112345', 'Ball bearing', '1mm', 'PT Inkomaro', 'EA', '130000', '10', 130000*10, 'Ready', '', '2015-02-10'),
                    array('/static/img/jointbearing.png', 'B354323', 'Joint bearing', '1mm', 'PT Inkomaro', 'EA', '140000', '10', 140000*10, 'Ready', '', '2015-02-10'),
                    array('/static/img/slewingbearing.png', 'B539732', 'Slewing bearing', '1mm', 'PT Inkomaro', 'EA', '120000', '50', 120000*50, 'Ready', '', '2015-02-10'),
                    array('/static/img/ballbearing.png', 'B112345', 'Ball bearing', '1mm', 'PT Inkomaro', 'EA', '130000', '10', 130000*10, 'Complete', '2015-02-11', '2015-02-10'),
                ), '515, sealul Bldg, 18 Teheran-ro33-gil, Gangnam-gu, Seoul, Korea', 'admin@inkomaro.com', '10000000'
            ),
            array('2015-01-10', '2015-01-11',
                array(
                    array('/static/img/ballbearing.png', 'B112345', 'Ball bearing', '1mm', 'PT Inkomaro', 'EA', '130000', '20', 130000*20, 'Complete', '2015-01-11', '2015-01-10'),
                    array('/static/img/jointbearing.png', 'B354323', 'Joint bearing', '1mm', 'PT Inkomaro', 'EA', '140000', '10', 140000*10, 'Complete', '2015-01-11', '2015-01-10'),
                    array('/static/img/slewingbearing.png', 'B539732', 'Slewing bearing', '1mm', 'PT Inkomaro', 'EA', '120000', '50', 120000*50, 'Complete', '2015-01-11', '2015-01-10'),
                ), '515, sealul Bldg, 18 Teheran-ro33-gil, Gangnam-gu, Seoul, Korea', 'admin@inkomaro.com', '10000000'
            ),
        );
        $this->approvallist = array(
            array('2015-02-10', '2015-02-11',
                array(
                    array('/static/img/ballbearing.png', 'B112345', 'Ball bearing', '1mm', 'PT Inkomaro', 'EA', '130000', '20', 130000*20, 'Pre-Approval'),
                    array('/static/img/jointbearing.png', 'B354323', 'Joint bearing', '1mm', 'PT Inkomaro', 'EA', '140000', '10', 140000*10, 'Pre-Approval'),
                    array('/static/img/slewingbearing.png', 'B539732', 'Slewing bearing', '1mm', 'PT Inkomaro', 'EA', '120000', '50', 120000*50, 'Pre-Approval'),
                ), '515, sealul Bldg, 18 Teheran-ro33-gil, Gangnam-gu, Seoul, Korea', 'admin@inkomaro.com', '10000000'
            ),
        );
    }

    // demobuyer test 시나리오 - login
    public function idxlogin() {
        $data['tmp'] = 'demobuyer/login';
        $this->load->view('demobuyer/body',$data);
    }

    // demobuyer test 시나리오 - main
    public function index() {
        $data['topmenu'] = $this->topmenu;
        $data['leftmenu'] = $this->leftmenu;
        $data['tmp'] = 'demobuyer/index';
        $this->load->view('demobuyer/body',$data);
    }

    // demobuyer test 시나리오 - search
    public function search() {
        $data['topmenu'] = $this->topmenu;
        $data['leftmenu'] = $this->leftmenu;
        $data['searchlist'] = $this->searchlist;
        $data['tmp'] = 'demobuyer/search';
        $this->load->view('demobuyer/body',$data);
    }

    // demobuyer test 시나리오 - order
    public function order() {
        $data['order'] = $this->order;
        $data['topmenu'] = $this->topmenu;
        $data['leftmenu'] = $this->leftmenu;
        $data['tmp'] = 'demobuyer/orderlist';
        $this->load->view('demobuyer/body',$data);
    }

    // demobuyer test 시나리오 - orderlist
    public function orderlist() {
        $data['orderlist'] = $this->orderlist;
        $data['topmenu'] = $this->topmenu;
        $data['leftmenu'] = $this->leftmenu;
        $data['tmp'] = 'demobuyer/orderlist';
        $this->load->view('demobuyer/body',$data);
    }

    // demobuyer test 시나리오 - cart 
    public function cart() {
        $data['topmenu'] = $this->topmenu;
        $data['leftmenu'] = $this->leftmenu;
        $data['cartlist'] = $this->cartlist;
        $data['tmp'] = 'demobuyer/cart';
        $this->load->view('demobuyer/body',$data);
    }

    // demobuyer test 시나리오 - mypage
    public function mypage() {
        $data['topmenu'] = $this->topmenu;
        $data['leftmenu'] = $this->leftmenu;
        $data['tmp'] = 'demobuyer/mypage';
        $this->load->view('demobuyer/body',$data);
    }

    // demobuyer test 시나리오 - customer 
    public function customer() {
        $data['topmenu'] = $this->topmenu;
        $data['leftmenu'] = $this->leftmenu;
        $data['tmp'] = 'demobuyer/customer';
        $this->load->view('demobuyer/body',$data);
    }

    // demobuyer test 시나리오 - approval
    public function approval() {
        $data['topmenu'] = $this->topmenu;
        $data['leftmenu'] = $this->leftmenu;
        $data['approvallist'] = $this->approvallist;
        $data['tmp'] = 'demobuyer/approval';
        $this->load->view('demobuyer/body',$data);
    }
}
