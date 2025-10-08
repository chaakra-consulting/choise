<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaction extends CI_Controller {

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
		$params = array('server_key' => '', 'production' => false);
		$this->load->library('veritrans');
		$this->veritrans->config($params);
		$this->load->helper('url');
		
    }

    public function index()
    {
    	$this->load->view('transaction');
    }

    public function process()
    {
    	$order_id = $this->input->post('order_id');
    	$action = $this->input->post('action');
    	switch ($action) {
		    case 'status':
		        $this->status($order_id);
		        break;
		    case 'approve':
		        $this->approve($order_id);
		        break;
		    case 'expire':
		        $this->expire($order_id);
		        break;
		   	case 'cancel':
		        $this->cancel($order_id);
		        break;
		}

    }

	public function status($order_id)
	{
		echo 'test get status </br>';
		print_r ($this->veritrans->status($order_id) );
	}

	public function cancel($order_id)
	{
		echo 'test cancel trx </br>';
		echo $this->veritrans->cancel($order_id);
	}

	public function approve($order_id)
	{
		echo 'test get approve </br>';
		print_r ($this->veritrans->approve($order_id) );
	}

	public function expire($order_id)
	{
		echo 'test get expire </br>';
		print_r ($this->veritrans->expire($order_id) );
	}

	public function create_transaction()
	{
		$order_id = $this->input->post('order_id');
		$amount = $this->input->post('amount');
		$coupon_code = $this->input->post('coupon_code');
		$coupon_discount = $this->input->post('coupon_discount');

		$this->db->where('order_id', $order_id);
		$pendaftar = $this->db->get('tb_pendaftar_pelatihan')->row_array();

		if (!$pendaftar) {
			echo json_encode(['success' => false, 'message' => 'Pendaftar tidak ditemukan']);
			return;
		}

		if ($coupon_code && $coupon_discount > 0) {
			$kupon = $this->m_kupon->get_kupon_by_kode($coupon_code);
			$this->session->set_userdata('applied_coupon', [
				'id_kupon' => $kupon['id_kupon'],
				'kode_kupon' => $coupon_code,
				'diskon' => $coupon_discount
			]);
		}

		$transaction_details = [
			'order_id' => $order_id,
			'gross_amount' => $amount
		];

		$customer_details = [
			'first_name' 	=> $pendaftar['nama_pendaftar_pelatihan'],
			'email' 		=> $pendaftar['email_pendaftar'],
			'phone' 		=> $pendaftar['no_telp']
		];

		$transaction = [
			'transaction_details' => $transaction_details,
			'customer_details' => $customer_details
		];

		try {
			$snap_token = $this->midtrans->getSnapToken($transaction);
			echo json_encode(['success' => true, 'snap_token' => $snap_token]);
		} catch (Exception $e) {
			echo json_encode(['success' => false, 'message' => $e->getMessage()]);
		}
	}
}
