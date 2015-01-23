<?
class WelcomeDao extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->db1 = $this->load->database('prog106', TRUE);
        $this->db2 = $this->load->database('inkomaro', TRUE);
    }
    public function getList1() {
        $sql = "SELECT * FROM baba WHERE view_flag='Y'";
        $res = $this->db1->query($sql);
        if($res->num_rows() > 0)
            return $res->result_array();
        else
            return array();
    }
    public function getList2() {
        $sql = "SELECT * FROM test";
        $res = $this->db2->query($sql);
        if($res->num_rows() > 0)
            return $res->result_array();
        else
            return array();
    }
    public function getOne($srl) {
        $sql = "SELECT * FROM baba WHERE id = ? LIMIT 1";
        $res = $this->db1->query($sql, array($srl));
        return $res->row_array();
    }
}
