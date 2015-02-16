<?php
/**
 * @ description : sample code
 * @ author : Sookwon Lee <prog106@inkomaro.com>
 */
class WelcomeDao extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->db1 = $this->load->database('inkocore', TRUE);
        $this->db2 = $this->load->database('inkomaro', TRUE);
    }

    public function getList1($sql_prm) {
        $sql = "SELECT * FROM test WHERE view_flag=?";
        $sql .= " ORDER BY id DESC";
        $res = $this->db2->query($sql, $sql_prm);
        if($res->num_rows() > 0)
            return $res->result_array();
        else
            return array();
    }

    public function getList2($sql_prm) {
        $sql = "SELECT * FROM test";
        $res = $this->db2->query($sql, $sql_prm);
        if($res->num_rows() > 0)
            return $res->result_array();
        else
            return array();
    }

    public function getOne($srl) {
        $sql = "SELECT * FROM test WHERE id = ? LIMIT 1";
        $res = $this->db2->query($sql, array($srl));
        return $res->row_array();
    }

    public function saveInfo($sql_prm) {
        $sql_prm['regdate'] = date('Y-m-d H:i:s');
        $sql_prm['view_flag'] = 'Y';
        $this->db2->insert('test', $sql_prm);
        return $this->db2->affected_rows();
    }

    public function getLogin($sql_prm) {
        $sql = "SELECT srl, userid FROM users WHERE userid = ? AND userpassword = ? LIMIT 1";
        $res = $this->db1->query($sql, $sql_prm);
        if($res->num_rows() == 1) {
            return $res->row_array();
        } else {
            return array();
        }
    }

    public function saveLogin($sql_prm) {
        $this->db1->insert('users', $sql_prm);
        return $this->db1->affected_rows();
    }

    public function updateTrans() {
        $this->db1->trans_begin();

        // $data['status'] = $status;
        // $this->db1->insert('table', $data);
        // $sql = "UPDATE table SET status = ? WHERE id = ?";
        // $sql_param = array($status, $id);
        // $this->db1->query($sql, $sql_param);

        if($this->db1->trans_status() === FALSE) {
            // 실패
            $this->db1->trans_rollback();
        } else {
            // 성공
            $this->db1->trans_commit();
        }
    }
}
