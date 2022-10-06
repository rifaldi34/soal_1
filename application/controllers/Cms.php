<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cms extends CI_Controller {

    public function __construct()
    {
			parent::__construct();
		
		if(!$this->session->has_userdata('ID')){
			redirect(base_url(''));
			exit;
		}
    }

	public function index()
	{
		// =========data header ============
		$data_header['sidebar_active'] = 'dashboard';
		// =========data header ============

		$this->load->view('template/header_cms', $data_header);
		$this->load->view('cms/dashboard');
		$this->load->view('template/footer_cms');
	}

	public function customer(){
		// =========data header ============
		$data_header['sidebar_active'] = 'customer';
		// =========data header ============

		$this->load->view('template/header_cms', $data_header);
		$this->load->view('cms/customer');
		$this->load->view('template/footer_cms');	
	}

	public function insertCustomer(){
		header('Content-Type: application/json; charset=utf-8');

		$data_input = $this->input->post('value');
		$data_input['CUSTOMER_ID'] = $this->lib_general->generateID(10, 'g_customer', 'CUSTOMER_ID');
		$data_input['CREATED'] = date('Y-m-d H:i:s');

		$this->db->trans_begin();

		$this->m_cms->insertGeneralData('g_customer', $data_input);

		if ($this->db->trans_status() !== FALSE)
		{
			$this->db->trans_commit();
			echo json_encode(array(
				'code' => 200,
				'title' => 'Berhasil',
				'desc' => 'Data Customer Berhasil Input',
			));
			return;
		}
		else
		{
			$this->db->trans_rollback();
			echo json_encode(array(
				'code' => 500,
				'title' => 'GAGAL',
				'desc' => 'Data Customer GAGAL Input',
			));
			return;
		}


	}

	public function getCustomer(){
		header('Content-Type: application/json; charset=utf-8');
		$customer_id = $this->input->get('customer_id');
		$data = $this->m_cms->getSingularData('g_customer', 'CUSTOMER_ID', $customer_id)->row();
		echo json_encode($data);
	}

	public function editCustomer(){
		header('Content-Type: application/json; charset=utf-8');

		$data_input = $this->input->post('value');
		$customer_id = $data_input['CUSTOMER_ID'];
		$data_input['UPDATED'] = date('Y-m-d H:i:s');

		$this->db->trans_begin();

		$this->m_cms->updateSingularData('g_customer', $data_input, 'CUSTOMER_ID', $customer_id);

		if ($this->db->trans_status() !== FALSE)
		{
			$this->db->trans_commit();
			echo json_encode(array(
				'code' => 200,
				'title' => 'Berhasil',
				'desc' => 'Data Customer Berhasil Edit',
			));
			return;
		}
		else
		{
			$this->db->trans_rollback();
			echo json_encode(array(
				'code' => 500,
				'title' => 'GAGAL',
				'desc' => 'Data Customer GAGAL Edit',
			));
			return;
		}
	}

	public function deleteCustomer(){
		header('Content-Type: application/json; charset=utf-8');

		$customer_id = $this->input->post('customer_id');

		$this->db->trans_begin();

		$this->m_cms->deleteSingularData('g_customer', 'CUSTOMER_ID', $customer_id);

		if ($this->db->trans_status() !== FALSE)
		{
			$this->db->trans_commit();
			echo json_encode(array(
				'code' => 200,
				'title' => 'Berhasil',
				'desc' => 'Data Customer Berhasil hapus',
			));
			return;
		}
		else
		{
			$this->db->trans_rollback();
			echo json_encode(array(
				'code' => 500,
				'title' => 'GAGAL',
				'desc' => 'Data Customer GAGAL hapus',
			));
			return;
		}
	}

	public function service_category(){
		// =========data header ============
		$data_header['sidebar_active'] = 'service_category';
		// =========data header ============

		$this->load->view('template/header_cms', $data_header);
		$this->load->view('cms/service_category');
		$this->load->view('template/footer_cms');	
	}

	public function getServiceCatList(){
		header('Content-Type: application/json; charset=utf-8');

        $this->db->select('*')
            ->from('g_service_category')
            ->order_by('CATEGORY_NAME', 'ASC');
        $data = $this->db->get()->result_array();
		echo json_encode($data);
	}

	public function getCatTypeList(){
		$category_id = $this->input->get('category_id');
		header('Content-Type: application/json; charset=utf-8');
        $this->db->select('*')
            ->from('g_service_type')
            ->where('CATEGORY_ID', $category_id)
            ->order_by('TYPE_ID', 'ASC');
        $data = $this->db->get()->result_array();
		echo json_encode($data);
	}

	public function getCustomerList(){
		header('Content-Type: application/json; charset=utf-8');
        $this->db->select('*')
            ->from('g_customer')
            ->order_by('CUSTOMER_NAME', 'ASC');
        $data = $this->db->get()->result_array();
		echo json_encode($data);
	}

	public function insertServiceCategory(){
		header('Content-Type: application/json; charset=utf-8');
		$data_input = $this->input->post('value');
		$data_input['CATEGORY_ID'] = $this->lib_general->generateID(10, 'g_service_category', 'CATEGORY_ID');
		$data_input['CREATED'] = date('Y-m-d H:i:s');

		$this->db->trans_begin();

		$this->m_cms->insertGeneralData('g_service_category', $data_input);

		if ($this->db->trans_status() !== FALSE)
		{
			$this->db->trans_commit();
			echo json_encode(array(
				'code' => 200,
				'title' => 'Berhasil',
				'desc' => 'Data Kategori Servis Berhasil Input',
			));
			return;
		}
		else
		{
			$this->db->trans_rollback();
			echo json_encode(array(
				'code' => 500,
				'title' => 'GAGAL',
				'desc' => 'Data Kategori Servis GAGAL Input',
			));
			return;
		}
	}

	public function insertServiceType(){
		header('Content-Type: application/json; charset=utf-8');
		$data_input = $this->input->post('value');
		$data_input['TYPE_ID'] = $this->lib_general->generateID(10, 'g_service_type', 'TYPE_ID');
		$data_input['CREATED'] = date('Y-m-d H:i:s');

		$this->db->trans_begin();

		$this->m_cms->insertGeneralData('g_service_type', $data_input);

		if ($this->db->trans_status() !== FALSE)
		{
			$this->db->trans_commit();
			echo json_encode(array(
				'code' => 200,
				'title' => 'Berhasil',
				'desc' => 'Data Tipe Servis Berhasil Input',
			));
			return;
		}
		else
		{
			$this->db->trans_rollback();
			echo json_encode(array(
				'code' => 500,
				'title' => 'GAGAL',
				'desc' => 'Data Tipe Servis GAGAL Input',
			));
			return;
		}
	}

	public function getServiceCategory(){
		header('Content-Type: application/json; charset=utf-8');
		$category_id = $this->input->get('category_id');
		$data = $this->m_cms->getSingularData('g_service_category', 'CATEGORY_ID', $category_id)->row();
		echo json_encode($data);
	}

	public function getServiceType(){
		header('Content-Type: application/json; charset=utf-8');
		$type_id = $this->input->get('type_id');
		$data = $this->m_cms->getSingularData('v_g_service_type', 'TYPE_ID', $type_id)->row();
		echo json_encode($data);
	}

	public function editServiceCategory(){
		header('Content-Type: application/json; charset=utf-8');

		$data_input = $this->input->post('value');
		$category_id = $data_input['CATEGORY_ID'];
		$data_input['UPDATED'] = date('Y-m-d H:i:s');

		$this->db->trans_begin();

		$this->m_cms->updateSingularData('g_service_category', $data_input, 'CATEGORY_ID', $category_id);

		if ($this->db->trans_status() !== FALSE)
		{
			$this->db->trans_commit();
			echo json_encode(array(
				'code' => 200,
				'title' => 'Berhasil',
				'desc' => 'Data Kategori Servis Berhasil Edit',
			));
			return;
		}
		else
		{
			$this->db->trans_rollback();
			echo json_encode(array(
				'code' => 500,
				'title' => 'GAGAL',
				'desc' => 'Data Kategori Servis GAGAL Edit',
			));
			return;
		}
	}

	public function editServiceType(){
		header('Content-Type: application/json; charset=utf-8');

		$data_input = $this->input->post('value');
		$type_id = $data_input['TYPE_ID'];
		$data_input['UPDATED'] = date('Y-m-d H:i:s');

		$this->db->trans_begin();

		$this->m_cms->updateSingularData('g_service_type', $data_input, 'TYPE_ID', $type_id);

		if ($this->db->trans_status() !== FALSE)
		{
			$this->db->trans_commit();
			echo json_encode(array(
				'code' => 200,
				'title' => 'Berhasil',
				'desc' => 'Data Tipe Servis Berhasil Edit',
			));
			return;
		}
		else
		{
			$this->db->trans_rollback();
			echo json_encode(array(
				'code' => 500,
				'title' => 'GAGAL',
				'desc' => 'Data Tipe Servis GAGAL Edit',
			));
			return;
		}
	}


	public function deleteServiceCategory(){
		header('Content-Type: application/json; charset=utf-8');

		$category_id = $this->input->post('category_id');

		$this->db->trans_begin();

		//check apakah sudah ada type
		$data_check = $this->m_cms->getSingularData('v_g_service_type', 'CATEGORY_ID', $category_id);
		if ($data_check->num_rows() > 0) {
			$this->db->trans_rollback();
			echo json_encode(array(
				'code' => 500,
				'title' => 'GAGAL',
				'desc' => 'Data Kategori Servis GAGAL hapus karena sudah ada type',
			));
			return;
		}

		$this->m_cms->deleteSingularData('g_service_category', 'CATEGORY_ID', $category_id);

		if ($this->db->trans_status() !== FALSE)
		{
			$this->db->trans_commit();
			echo json_encode(array(
				'code' => 200,
				'title' => 'Berhasil',
				'desc' => 'Data Kategori Servis Berhasil hapus',
			));
			return;
		}
		else
		{
			$this->db->trans_rollback();
			echo json_encode(array(
				'code' => 500,
				'title' => 'GAGAL',
				'desc' => 'Data Kategori Servis GAGAL hapus',
			));
			return;
		}
	}

	public function deleteServiceType(){
		header('Content-Type: application/json; charset=utf-8');

		$type_id = $this->input->post('type_id');

		$this->db->trans_begin();

		$data_check = $this->m_cms->getSingularData('v_g_service_booking', 'TYPE_ID', $type_id);
		if ($data_check->num_rows() > 0) {
			$this->db->trans_rollback();
			echo json_encode(array(
				'code' => 500,
				'title' => 'GAGAL',
				'desc' => 'Data Tipe Servis GAGAL hapus karena sudah ada booking',
			));
			return;
		}

		$this->m_cms->deleteSingularData('g_service_type', 'TYPE_ID', $type_id);

		if ($this->db->trans_status() !== FALSE)
		{
			$this->db->trans_commit();
			echo json_encode(array(
				'code' => 200,
				'title' => 'Berhasil',
				'desc' => 'Data Tipe Servis Berhasil hapus',
			));
			return;
		}
		else
		{
			$this->db->trans_rollback();
			echo json_encode(array(
				'code' => 500,
				'title' => 'GAGAL',
				'desc' => 'Data Tipe Servis GAGAL hapus',
			));
			return;
		}
	}

	public function service_booking(){
		// =========data header ============
		$data_header['sidebar_active'] = 'service_booking';
		// =========data header ============

		$this->load->view('template/header_cms', $data_header);
		$this->load->view('cms/service_booking');
		$this->load->view('template/footer_cms');	
	}

	public function insertBooking(){
		header('Content-Type: application/json; charset=utf-8');
		$data_input = $this->input->post('value');
		$data_input['BOOKING_ID'] = $this->lib_general->generateID(10, 'g_service_booking', 'BOOKING_ID');
		$data_input['CREATED'] = date('Y-m-d H:i:s');
		$data_input['STATUS'] = 'BOOKED';

		$this->db->trans_begin();

		$this->m_cms->insertGeneralData('g_service_booking', $data_input);

		if ($this->db->trans_status() !== FALSE)
		{
			$this->db->trans_commit();
			echo json_encode(array(
				'code' => 200,
				'title' => 'Berhasil',
				'desc' => 'Data Booking Berhasil Input',
			));
			return;
		}
		else
		{
			$this->db->trans_rollback();
			echo json_encode(array(
				'code' => 500,
				'title' => 'GAGAL',
				'desc' => 'Data Booking GAGAL Input',
			));
			return;
		}
	}

	public function getBooking(){
		header('Content-Type: application/json; charset=utf-8');
		$booking_id = $this->input->get('booking_id');
		$data = $this->m_cms->getSingularData('v_g_service_booking', 'BOOKING_ID', $booking_id)->row();
		echo json_encode($data);
	}

	public function editBooking(){
		header('Content-Type: application/json; charset=utf-8');

		$data_input = $this->input->post('value');
		$booking_id = $data_input['BOOKING_ID'];
		$data_input['UPDATED'] = date('Y-m-d H:i:s');

		$this->db->trans_begin();

		$data_check = $this->m_cms->getSingularData('g_service_booking', 'BOOKING_ID', $booking_id);
		if ($data_check->row()->STATUS == 'DONE') {
			$this->db->trans_rollback();
			echo json_encode(array(
				'code' => 500,
				'title' => 'GAGAL',
				'desc' => 'Tidak bisa ubah karena sudah done',
			));
			return;
		}

		$this->m_cms->updateSingularData('g_service_booking', $data_input, 'BOOKING_ID', $booking_id);

		if ($this->db->trans_status() !== FALSE)
		{
			$this->db->trans_commit();
			echo json_encode(array(
				'code' => 200,
				'title' => 'Berhasil',
				'desc' => 'Data Booking Berhasil Edit',
			));
			return;
		}
		else
		{
			$this->db->trans_rollback();
			echo json_encode(array(
				'code' => 500,
				'title' => 'GAGAL',
				'desc' => 'Data Booking GAGAL Edit',
			));
			return;
		}
	}

	public function deleteBooking(){
		header('Content-Type: application/json; charset=utf-8');

		$booking_id = $this->input->post('booking_id');

		$this->db->trans_begin();

		$data_check = $this->m_cms->getSingularData('g_service_booking', 'BOOKING_ID', $booking_id);
		if ($data_check->row()->STATUS == 'DONE') {
			$this->db->trans_rollback();
			echo json_encode(array(
				'code' => 500,
				'title' => 'GAGAL',
				'desc' => 'Tidak bisa Hapus karena sudah done',
			));
			return;
		}

		$this->m_cms->deleteSingularData('g_service_booking', 'BOOKING_ID', $booking_id);

		if ($this->db->trans_status() !== FALSE)
		{
			$this->db->trans_commit();
			echo json_encode(array(
				'code' => 200,
				'title' => 'Berhasil',
				'desc' => 'Data Booking Berhasil hapus',
			));
			return;
		}
		else
		{
			$this->db->trans_rollback();
			echo json_encode(array(
				'code' => 500,
				'title' => 'GAGAL',
				'desc' => 'Data Booking GAGAL hapus',
			));
			return;
		}
	}

	public function doneBooking(){
		header('Content-Type: application/json; charset=utf-8');

		$booking_id = $this->input->post('booking_id');

		$this->db->trans_begin();

		$data_input['UPDATED'] = date('Y-m-d H:i:s');
		$data_input['STATUS'] = 'DONE';
		$this->m_cms->updateSingularData('g_service_booking', $data_input, 'BOOKING_ID', $booking_id);

		if ($this->db->trans_status() !== FALSE)
		{
			$this->db->trans_commit();
			echo json_encode(array(
				'code' => 200,
				'title' => 'Berhasil',
				'desc' => 'Data Booking Berhasil Dikerjakan',
			));
			return;
		}
		else
		{
			$this->db->trans_rollback();
			echo json_encode(array(
				'code' => 500,
				'title' => 'GAGAL',
				'desc' => 'Data Booking GAGAL Dikerjakan',
			));
			return;
		}
	}




}
