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
            //'Main' => 'demobuyer/index',
            //'Search' => 'demobuyer/search',
            'Approval' => 'demobuyer/approval',
            'OrderList' => 'demobuyer/orderlist',
        );
        $this->categories = array(
            '기계요소' => array(
                '베어링' => array(
                    '베어링' => array(
                        '볼베어링',
                        '롤러베어링',
                        '유니토베어링',
                        '스트러스베어링',
                        '기타베어링',
                    ),
                    '베어링부품' => array(
                        '베어링아답터',
                        '기타베어링부품군',
                    ),
                ),
            ),
            '사무용품' => array(
                '필기류' => array(
                    '볼펜' => array(
                        '볼펜',
                        '만년필',
                    ),
                    '연필' => array(
                        '4B',
                        '2B',
                        '2H'
                    ),
                ),
                '기타' => array(
                    '자' => array(
                        '플라스틱자',
                        '줄자',
                    ),
                    '칼' => array(
                        '커터칼',
                        '칼날',
                    ),
                    '가위' => array(
                        '일반가위',
                        '안전가위',
                    ),
                ),
            ),
        );
        $this->searchlist = array(
            array('/static/img/ballbearing.png', 'PD100100159', 'BALL BUSH LM60UU', 'LM60UU', 'THK', 'EA', '90000'),
            array('/static/img/sphbearing.png', 'PD100100111', '베어링', '6004ZZ', 'KBC', 'EA', '100000'),
            array('/static/img/splitbearing.png', 'PD100100134', 'BEARING', 'AXK4565', 'FAG', 'EA', '110000'),
            array('/static/img/jointbearing.png', 'PD100100134', 'BEARING', 'AXK4565', 'FAG', 'EA', '110000'),
            array('/static/img/slewingbearing.png', 'PD100100156', '베어링', '유니트, UC205', 'KBC', 'EA', '120000'),
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
            array('MR15020000006', 'PD100100159', '2015-02-11', '2015-02-16', '', 'BALL BUSH LM60UU', 'LM60UU', 'THK', 'EA', '90000', '5', '신규주문', '총무팀'),
            array('MR15020000005', 'PD100100111', '2015-02-11', '2015-02-16', '', '베어링', '6004ZZ', 'KBC', 'EA', '100000', '10', '신규주문', '총무팀'),
            array('MR15020000001', 'PD100100159', '2015-02-06', '2015-02-11', '', 'ADAPTAR', '1209K(H209)', 'NTN', 'EA', '230000', '45', '신규주문', '영업3팀'),
            array('MR15020000002', 'PD100100121', '2015-02-11', '2015-02-13', '', '베어링', '6308ZZ, NSKC3', 'SKF', 'EA', '150000', '20', '확정주문', '영업3팀'),
            array('MR15020000005', 'PD100100134', '2015-02-09', '2015-02-11', '2015-02-11', 'BEARING', 'AXK4565', 'FAG', 'EA', '110000', '3', '출하', '총무팀'),
            array('MS15020000007', 'PD100100134', '2015-02-09', '2015-02-11', '2015-02-15', 'BEARING', 'AXK4565', 'FAG', 'EA', '110000', '2', '출하', '총무팀'),
            array('MR15020000003', 'PD100100197', '2015-02-10', '2015-02-19', '2015-02-20', 'BEARING', '511130', 'FAG', 'EA', '130000', '1', '출하', '총무팀'),
            array('MR15020000004', 'PD100100156', '2015-02-08', '2015-02-13', '2015-02-15', '베어링', '유니트, UC205', 'KBC', 'EA', '120000', '100', '입고완료', '총무팀'),
        );
    }

    // demobuyer test 시나리오 - login
    public function idxlogin() {
        $data['tmp'] = 'demobuyer/login';
        $this->load->view('demobuyer/body',$data);
    }

    // demobuyer test 시나리오 - main
    public function index() {
        $data['categories'] = $this->categories;
        $data['topmenu'] = $this->topmenu;
        $data['leftmenu'] = $this->leftmenu;
        $data['tmp'] = 'demobuyer/index';
        $this->load->view('demobuyer/body',$data);
    }

    // demobuyer test 시나리오 - search
    public function search() {
        $data['categories'] = $this->categories;
        $data['topmenu'] = $this->topmenu;
        $data['leftmenu'] = $this->leftmenu;
        $data['searchlist'] = $this->searchlist;
        $data['tmp'] = 'demobuyer/search';
        $this->load->view('demobuyer/body',$data);
    }

    // demobuyer test 시나리오 - order
    public function order() {
        $data['categories'] = $this->categories;
        $data['order'] = $this->order;
        $data['topmenu'] = $this->topmenu;
        $data['leftmenu'] = $this->leftmenu;
        $data['tmp'] = 'demobuyer/orderlist';
        $this->load->view('demobuyer/body',$data);
    }

    // demobuyer test 시나리오 - orderlist
    public function orderlist() {
        $data['categories'] = $this->categories;
        $data['orderlist'] = $this->orderlist;
        $data['topmenu'] = $this->topmenu;
        $data['leftmenu'] = $this->leftmenu;
        $data['tmp'] = 'demobuyer/orderlist';
        $this->load->view('demobuyer/body',$data);
    }

    // demobuyer test 시나리오 - cart 
    public function cart() {
        $data['categories'] = $this->categories;
        $data['topmenu'] = $this->topmenu;
        $data['leftmenu'] = $this->leftmenu;
        $data['cartlist'] = $this->cartlist;
        $data['tmp'] = 'demobuyer/cart';
        $this->load->view('demobuyer/body',$data);
    }

    // demobuyer test 시나리오 - mypage
    public function mypage() {
        $data['categories'] = $this->categories;
        $data['topmenu'] = $this->topmenu;
        $data['leftmenu'] = $this->leftmenu;
        $data['tmp'] = 'demobuyer/mypage';
        $this->load->view('demobuyer/body',$data);
    }

    // demobuyer test 시나리오 - customer 
    public function customer() {
        $data['categories'] = $this->categories;
        $data['topmenu'] = $this->topmenu;
        $data['leftmenu'] = $this->leftmenu;
        $data['tmp'] = 'demobuyer/customer';
        $this->load->view('demobuyer/body',$data);
    }

    // demobuyer test 시나리오 - approval
    public function approval() {
        $data['categories'] = $this->categories;
        $data['topmenu'] = $this->topmenu;
        $data['leftmenu'] = $this->leftmenu;
        $data['orderlist'] = $this->orderlist;
        $data['tmp'] = 'demobuyer/approval';
        $this->load->view('demobuyer/body',$data);
    }
}
