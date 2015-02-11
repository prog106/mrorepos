<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mro extends CI_Controller {
    /**
     * @ description : INCOMARO Sample Controller.
     * @ author : Sookwon Lee <prog106@inkomaro.com>
     */
    public function __construct() {
        parent::__construct();
        $this->topmenu = array(
            'Home' => 'mro/index',
            'My Page' => 'mro/mypage',
            'Customer Center' => 'mro/customer',
            'Cart' => 'mro/cart',
        );
        $this->leftmenu = array(
            'Main' => 'mro/index',
            'Search' => 'mro/search',
            'OrderList' => 'mro/orderlist',
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
            array('2015-01-10', '2015-01-11',
                array(
                    array('/static/img/ballbearing.png', 'B112345', 'Ball bearing', '1mm', 'PT Inkomaro', 'EA', '130000', '20', 130000*20),
                    array('/static/img/jointbearing.png', 'B354323', 'Joint bearing', '1mm', 'PT Inkomaro', 'EA', '140000', '10', 140000*10),
                    array('/static/img/slewingbearing.png', 'B539732', 'Slewing bearing', '1mm', 'PT Inkomaro', 'EA', '120000', '50', 120000*50),
                ), '515, sealul Bldg, 18 Teheran-ro33-gil, Gangnam-gu, Seoul, Korea', 'admin@inkomaro.com', '10000000'
            ),
            array('2015-02-10', '2015-02-11',
                array(
                    array('/static/img/ballbearing.png', 'B112345', 'Ball bearing', '1mm', 'PT Inkomaro', 'EA', '130000', '20', 130000*20),
                    array('/static/img/jointbearing.png', 'B354323', 'Joint bearing', '1mm', 'PT Inkomaro', 'EA', '140000', '10', 140000*10),
                    array('/static/img/slewingbearing.png', 'B539732', 'Slewing bearing', '1mm', 'PT Inkomaro', 'EA', '120000', '50', 120000*50),
                ), '515, sealul Bldg, 18 Teheran-ro33-gil, Gangnam-gu, Seoul, Korea', 'admin@inkomaro.com', '10000000'
            ),
        );
                
    }

    // mro test 시나리오 - login
    public function idxlogin() {
        $data['tmp'] = 'mro/login';
        $this->load->view('mro/body',$data);
    }

    // mro test 시나리오 - main
    public function index() {
        $data['topmenu'] = $this->topmenu;
        $data['leftmenu'] = $this->leftmenu;
        $data['tmp'] = 'mro/index';
        $this->load->view('mro/body',$data);
    }

    // mro test 시나리오 - search
    public function search() {
        $data['topmenu'] = $this->topmenu;
        $data['leftmenu'] = $this->leftmenu;
        $data['searchlist'] = $this->searchlist;
        $data['tmp'] = 'mro/search';
        $this->load->view('mro/body',$data);
    }

    // mro test 시나리오 - order
    public function order() {
        $data['order'] = $this->order;
        $data['topmenu'] = $this->topmenu;
        $data['leftmenu'] = $this->leftmenu;
        $data['tmp'] = 'mro/orderlist';
        $this->load->view('mro/body',$data);
    }

    // mro test 시나리오 - orderlist
    public function orderlist() {
        $data['orderlist'] = $this->orderlist;
        $data['topmenu'] = $this->topmenu;
        $data['leftmenu'] = $this->leftmenu;
        $data['tmp'] = 'mro/orderlist';
        $this->load->view('mro/body',$data);
    }

    // mro test 시나리오 - cart 
    public function cart() {
        $data['topmenu'] = $this->topmenu;
        $data['leftmenu'] = $this->leftmenu;
        $data['cartlist'] = $this->cartlist;
        $data['tmp'] = 'mro/cart';
        $this->load->view('mro/body',$data);
    }

    // mro test 시나리오 - mypage
    public function mypage() {
        $data['topmenu'] = $this->topmenu;
        $data['leftmenu'] = $this->leftmenu;
        $data['tmp'] = 'mro/mypage';
        $this->load->view('mro/body',$data);
    }

    // mro test 시나리오 - customer 
    public function customer() {
        $data['topmenu'] = $this->topmenu;
        $data['leftmenu'] = $this->leftmenu;
        $data['tmp'] = 'mro/customer';
        $this->load->view('mro/body',$data);
    }
}
