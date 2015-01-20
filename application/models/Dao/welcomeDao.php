<?
class WelcomeDao extends CI_Model {
    public function __construct() {
        parent::__construct();
        //$db1 = $this->load->database('inkomaro', TRUE);
        $this->db1 = $this->load->database('prog106', TRUE);
        $this->db2 = $this->load->database('inkomaro', TRUE);
    }
    public function getList1() {
        $sql = "SELECT * FROM baba";
        $return1 = $this->db1->query($sql);
        return $return1->result_array();
    }
    public function getList2() {
        $sql = "SELECT * FROM test";
        $return1 = $this->db2->query($sql);
        return $return1->result_array();
    }
}
