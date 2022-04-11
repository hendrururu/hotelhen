<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
          // $this->logincheck();
    }
    public function logincheck($value='')
    {
        if (!empty($_SESSION['user'])) {
            $this->level();
            
        }
        else {
            
        }
    }
    public function login()
	{
		$this->load->view('Auth/login');
	}
	public function cekusers()
	{
		$username=$_POST['username'];
		$password=$_POST['password'];

		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$login=$this->db->get('users')->result();
		if(empty($login)) {
			redirect('Auth/login');
		}
		$_SESSION['user']=$login[0];	
        $this->level();
	}
    public function register()
    {
        $this->load->view('Auth/register');
    }
    public function addusers()
    {
       $data = $_POST;
       $data += array(
        'level' => 'tamu'
);

$this->db->insert('users', $data);
redirect ('Auth/login');
    }
    public function level()
    {
        if ($_SESSION['user']->level=="tamu"){
			redirect('Tamu/Pilihankamar');
		}
        if ($_SESSION['user']->level=="resepsionis"){
			redirect('Tamu/Fasilitas_Hotel');
		}
        if ($_SESSION['user']->level=="admin"){
			redirect('Tamu/Fasilitas_Hotel');
		}
    }
}
