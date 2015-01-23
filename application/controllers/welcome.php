<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -  
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('Dao/welcomeDao', 'model');
        $this->load->helper(array('form', 'url'));
    }
    public function index()
    {
        //debug($this->model->getList1());
        //debug($this->model->getList2());
        //debug(date('Y-m-d H:i:s'));
        $data['ec'] = date('Y-m-d H:i:s');
        $data['list'] = array('1' => 'a', '2' => 'b');

        $data['page'] = 'welcome/uploads';
        $this->load->view('common/body',$data);
        //$this->load->view('common/head');
        //$this->load->view('welcome/message');
        //$this->load->view('welcome/uploads');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
