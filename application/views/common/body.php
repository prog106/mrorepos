<?
/**
 * description : common template
 * author : Sookwon Lee <prog106@inkomaro.com>
 */

// header
$this->load->view('common/head');
// container
if(isset($tmp)) $this->load->view($tmp);
// footer
$this->load->view('common/footer');
?>
