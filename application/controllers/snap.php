<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Snap extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
    {
        parent::__construct();
        $params = array('server_key' => 'SB-Mid-server-av3DlyJtjVQi2lptQdGtLPhP', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');	
    }

    public function index()
    {
    	$this->load->view('checkout_snap');
    }

    public function token()
    {
		$nominal = $this->input->post('nominal');
		$judul = $this->input->post('judul');


		
		// Required
		$transaction_details = array(
		  'order_id' => rand(),
		  'gross_amount' => $nominal, // no decimal allowed for creditcard
		);

		// Optional
		$item1_details = array(
		  'id' => 'a1',
		  'price' => $nominal,
		  'quantity' => 1,
		  'name' => "Memberikan donasi kegiatan ".$judul
		);

		// Optional
		// $item2_details = array(
		//   'id' => 'a2',
		//   'price' => 20000,
		//   'quantity' => 2,
		//   'name' => "Orange"
		// );

		// Optional
		$item_details = array ($item1_details);

		// // Optional
		// $billing_address = array(
		//   'first_name'    => "Andri",
		//   'last_name'     => "Litani",
		//   'address'       => "Mangga 20",
		//   'city'          => "Jakarta",
		//   'postal_code'   => "16602",
		//   'phone'         => "081122334455",
		//   'country_code'  => 'IDN'
		// );

		// // Optional
		// $shipping_address = array(
		//   'first_name'    => "Obet",
		//   'last_name'     => "Supriadi",
		//   'address'       => "Manggis 90",
		//   'city'          => "Jakarta",
		//   'postal_code'   => "16601",
		//   'phone'         => "08113366345",
		//   'country_code'  => 'IDN'
		// );
	

		// Optional
		$customer_details = array(
		  'first_name'    => $judul,

		  
		);

		// Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        // ser save_card true to enable oneclick or 2click
        // $credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit' => 'minute', 
            'duration'  => 15
        );
        
        $transaction_data = array(
            'transaction_details'=> $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry

        );

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
    }

	public function finish()
	{
		// Gunakan tanda panah (->) untuk mendeklarasikan array
		$result = json_decode($this->input->post('result_data'), true);
		echo"<pre>";
		echo var_dump($result);
		echo"<pre>";
		$nominal = $this->input->post('nominal');
		$judul = $this->input->post('judul');
		$alluser_id = $this->input->post('alluser_id');
		$id_penggalangan = $this->input->post('id_penggalangan');
		// Pastikan untuk mengganti nilai-nilai di dalam array dengan data yang benar
		$data = [
			'nama_kegiatan' => $judul,
			'order_id' => $result['order_id'],
			'tanggal' => $result['transaction_time'],
			'tipe_pembayaran' => $result['payment_type'],
			'metode_pembayaran' => $result['va_numbers'][0]['va_number'],
			'bank' => $result['va_numbers'][0]['bank'],
			'pdf_url' => $result['pdf_url'],
			'status' => $result['status_code'],
			'jumlah_donasi' => $nominal,
			'id_alluser' => $alluser_id,
			'id_penggalangan' => $id_penggalangan,
		];
	
		// Ganti "$simpan->" menjadi "$this->db->"
		$simpan = $this->db->insert('transaksi', $data);
	
		if ($simpan) {
			redirect('AuthMahasiswa/histori_donasi');
		} else {
			redirect('AuthMahasiswa/galangdana');
		}
	}
	

}
