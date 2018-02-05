


<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

    class M_login extends CI_Model {

        public function __construct() {

            parent::__construct();

        }

        public function ambilPengguna($email, $password, $status) {
                $this->db->select('*');
                $this->db->from('users');
                $this->db->join('skpd', 'users.id_skpd = skpd.id_skpd');
                $this->db->where('email', $email);
                $this->db->where('password', $password);
                $this->db->where('status', $status);
                $query = $this->db->get();
            return $query;
          }

          public function dataPengguna($email) {
            $this->db->select('email');
               $this->db->select('nama');
               $this->db->where('email', $email);
               $query = $this->db->get('user');
                return $query->row();
          }

          public function datasetting() {
            $this->db->select('*');
                $this->db->from('app_setting');
               $query = $this->db->get();
                return $query->row();
          }
    }  

?>