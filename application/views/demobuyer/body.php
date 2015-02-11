<?
/**
 * description : Demo Version Common template
 * author : Sookwon Lee <prog106@inkomaro.com>
 */

// header
$this->load->view('demobuyer/head');
// container
if(isset($tmp)) $this->load->view($tmp);
// footer
$this->load->view('demobuyer/footer');
?>
