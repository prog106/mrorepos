<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Uploads extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->upload_root = $_SERVER['DOCUMENT_ROOT'];
        $this->upload_path = "/static/uploads/".date('Ym', time());
        $imgconfig['upload_path'] = $this->upload_root.$this->upload_path;
        if(!is_dir($imgconfig['upload_path'])) mkdir($imgconfig['upload_path'],0777,TRUE);

        $imgconfig['allowed_types'] = "png|jpg|gif|jpeg";
        $imgconfig['max_size'] = "100"; // 100k
        $imgconfig['encrypt_name'] = TRUE;
        $this->load->library('upload', $imgconfig);
    }
    public function index() {
        echo 1;
    }
    public function doimage() {
        if(empty($_POST['timestamp']) || $_POST['token'] != md5('verified'.$_POST['timestamp'])) {
            $return = array('ret' => 'Invalid', 'msg' => 'Retry please!');
        } else {
            if(!$this->upload->do_upload('Filedata')) {
                $msg = $this->upload->display_errors();
                $return = array('ret' => 'ERR', 'msg' => $msg);
            } else {
                $result = $this->upload->data();
                $file_name = $this->upload_path."/".$result['file_name'];
                $return = array('ret' => 'OK', 'msg' => $file_name);
            }
        }
        echo json_encode($return);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
