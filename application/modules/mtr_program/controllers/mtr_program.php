<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mtr_program extends CI_Controller {

	private $datauser;

    public function __construct() {
        parent::__construct();

        $this->load->library(array('session'));
        $this->load->helper('url');
        $this->load->model('m_login');
        $this->load->database();
        $this->datauser = $this->session->userdata('data_user');

        }

	public function index()
	{
		if($this->session->userdata('isLogin') == FALSE) {

                redirect('login/login_form');
            } else {
                $this->load->model('m_login');
                $user = $this->session->userdata('data_user');
                //setting view
                $data = array();
                $data['title'] = 'Master Data Program <small> </small>';
                $data['pengguna'] = $user;
                $data['level'] = $this->session->userdata('level'); 
                
                $this->load->view('mtr_program/index', $data);
                }
	}

    public function data_mtr_program(){
        $this->load->library( 'datatables');
        $user = $this->session->userdata('data_user');
        $role = $user->role;
        if ($role == "1"){
            $this->datatables->select('skpd.nama_skpd as skpd, kode, nama_program, blj_pegawai, blj_barang, blj_modal, (blj_pegawai+blj_barang+blj_modal) as total');
            $this->datatables->from('mtr_program');
            $this->datatables->join('skpd', 'mtr_program.id_skpd = skpd.id_skpd');
            return print_r($this->datatables->generate());
        } else {
            $skpd = $user->id_skpd;
             $this->datatables->select('skpd.nama_skpd as skpd, kode, nama_program, blj_pegawai, blj_barang, blj_modal, (blj_pegawai+blj_barang+blj_modal) as total');
            $this->datatables->from('mtr_program');
            $this->datatables->join('skpd', 'mtr_program.id_skpd = skpd.id_skpd');
             $this->datatables->where('mtr_program.id_skpd', $skpd);
            return print_r($this->datatables->generate());

        }

    }
}
