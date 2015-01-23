<?
class WelcomeBiz extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->model('Dao/welcomeDao','welcome');
    }
    public function getList1() {
        return $this->welcome->getList1();
    }
    public function getList2() {
        return $this->welcome->getList2();
    }
    public function getOne($srl) {
        if(empty($srl)) return array();
        return $this->welcome->getOne($srl);
    }
}
