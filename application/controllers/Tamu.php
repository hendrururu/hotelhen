<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tamu extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function detailkamar()
		{
			$this->db->where('id', $_GET['id']);
			$tipe_kamar = $this->db->get('Tipe_room')->result();
			$data=[];
			foreach ($tipe_kamar as $key=> $kamar) {
			$this->db->where('id_tipekamar', $kamar->id);
			$fasilitaskamar = $this->db->get('F_kamar')->result();
			$data[$key]=array (
				'Info_kamar'=> $kamar,
				'F_kamar'=>$fasilitaskamar);
			} 
			$this->load->view('Tamu/dfkamar', ['data'=> $data]);
		}
public function booking()
{
	$data['user']=$_SESSION['user'];

	$this->db->where('id', $_GET['id']);
	$tipe_kamar = $this->db->get('Tipe_room')->result();
	$dataKamar=[];
	foreach ($tipe_kamar as $key=> $kamar) {
	$this->db->where('id_tipekamar', $kamar->id);
	$fasilitaskamar = $this->db->get('F_kamar')->result();
	$data[$key]=array (
	'Info_kamar'=> $kamar,
	'F_kamar'=>$fasilitaskamar);
			}
			$this->db->select('*');
			$this->db->from('Tipe_room');
			$this->db->where('id', $_GET['id']);
			$data['Byid'] = $this->db->get()->result();
			$data['kamar']=$dataKamar;
			$allroom = $this->db->get('Tipe_room')->result();
			$data['alltipe']=$allroom;
			$this->load->view('Tamu/booking', ['data'=> $data]);
			
}


	public function Pilihankamar()
		{
			$tipe_kamar = $this->db->get('Tipe_room')->result();
			$data=[];
			foreach ($tipe_kamar as $key=> $kamar) {
			$this->db->where('id_tipekamar', $kamar->id);
			$fasilitaskamar = $this->db->get('F_kamar')->result();
			$data[$key]=array (
				'Info_kamar'=> $kamar,
				'F_kamar'=>$fasilitaskamar);
			} 
			$this->load->view('Tamu/fasilitaskamar', ['data'=> $data]);
		}
		public function ref()
		{
			$this->db->where('nama_pemesan', $_SESSION['user']->nama);
			$this->db->select('*');
			$this->db->from('pemesanan');
			$this->db->join('Tipe_room', 'Tipe_room.id = pemesanan.id_kamar');
			$yourbooked = $this->db->get()->result();
			$data['booklah']=$yourbooked;
			$this->load->view('Tamu/koderef', ['data'=>$data]);
		}
		public function gobook()
		{
			
			$this->db->where('id', $_POST['id_kamar']);
			$tipe_kamar = $this->db->get('Tipe_room')->result();
			$total_harga= $_POST['jml_kamar']*$tipe_kamar[0]->harga;


			$data= array(
				'nama_pemesan' => $_POST['nama_pemesan'] , 
				'email' => $_POST['email'] ,
				'no_hp' => $_POST['no_hp'] ,
				'nama_tamu' => $_POST['nama_tamu'] ,
				'id_kamar' => $_POST['id_kamar'] ,
				'tgl_cekin' => $_POST['tgl_cekin'] ,
				'tgl_cekout' => $_POST['tgl_cekout'] ,
				'jml_kamar' => $_POST['jml_kamar'] ,
				'Harga' => $total_harga ,
				'PayBay' => $_POST['PayBay'] ,
				'PayEnd' => 0,
				'Status_Kamar' => 0,
				'RefPB' =>  date ('mdy').date('His'),
				
			);
			$this->db->insert('pemesanan', $data);
			redirect('Tamu/ref');
		}
}
