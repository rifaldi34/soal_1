<?php

    class Datatables extends CI_Controller
    {
        public function __construct()
        {  
            parent::__construct();
            $this->load->model('M_datatables');
        }

        public function index()
        {
            echo "Index";
        }



        function view_data_customer()
        {
            if(!$this->session->has_userdata('ID')){
                redirect(base_url(''));
                exit;
            }
            //Pastikan hanya admin yang bisa akses function ini
            $tables = "g_customer";
            $search = array('REC_ID','CUSTOMER_NAME','CUSTOMER_EMAIL','CUSTOMER_PHONE', 'CUSTOMER_ADDRESS', 'CREATED');
            // jika memakai IS NULL pada where sql
            $isWhere = null;

            header('Content-Type: application/json');
            echo $this->M_datatables->get_tables($tables,$search,$isWhere);
        }

        function view_data_service_category()
        {
            if(!$this->session->has_userdata('ID')){
                redirect(base_url(''));
                exit;
            }
            //Pastikan hanya admin yang bisa akses function ini
            $tables = "g_service_category";
            $search = array('REC_ID','CATEGORY_ID','CATEGORY_NAME','CREATED', 'UPDATED');
            // jika memakai IS NULL pada where sql
            $isWhere = null;

            header('Content-Type: application/json');
            echo $this->M_datatables->get_tables($tables,$search,$isWhere);
        }

        function view_data_service_type()
        {
            if(!$this->session->has_userdata('ID')){
                redirect(base_url(''));
                exit;
            }
            //Pastikan hanya admin yang bisa akses function ini
            $tables = "v_g_service_type";
            $search = array('REC_ID','CATEGORY_ID','CATEGORY_NAME','TYPE_ID','TYPE_NAME', 'CREATED', 'UPDATED');
            // jika memakai IS NULL pada where sql
            $isWhere = null;

            header('Content-Type: application/json');
            echo $this->M_datatables->get_tables($tables,$search,$isWhere);
        }

        function view_data_booking()
        {
            if(!$this->session->has_userdata('ID')){
                redirect(base_url(''));
                exit;
            }
            //Pastikan hanya admin yang bisa akses function ini
            $tables = "v_g_service_booking";
            $search = array('REC_ID','CATEGORY_NAME','TYPE_ID','TYPE_NAME', 'CREATED', 'UPDATED', 'CUSTOMER_ID', 'CUSTOMER_NAME', 'CUSTOMER_EMAIL', 'CUSTOMER_PHONE', 'CUSTOMER_ADDRESS', 'BOOKING_TARGET_DATE', 'STATUS');
            // jika memakai IS NULL pada where sql
            $isWhere = null;

            header('Content-Type: application/json');
            echo $this->M_datatables->get_tables($tables,$search,$isWhere);
        }

        function view_data_booking_today()
        {
            if(!$this->session->has_userdata('ID')){
                redirect(base_url(''));
                exit;
            }
            //Pastikan hanya admin yang bisa akses function ini
            $tables = "v_g_service_booking";
            $search = array('REC_ID','CATEGORY_NAME','TYPE_ID','TYPE_NAME', 'CREATED', 'UPDATED', 'CUSTOMER_ID', 'CUSTOMER_NAME', 'CUSTOMER_EMAIL', 'CUSTOMER_PHONE', 'CUSTOMER_ADDRESS', 'BOOKING_TARGET_DATE', 'STATUS');
            // jika memakai IS NULL pada where sql
            $today_date = date('Y-m-d');
            $isWhere = "date(BOOKING_TARGET_DATE) = date('$today_date')";

            header('Content-Type: application/json');
            echo $this->M_datatables->get_tables($tables,$search,$isWhere);
        }

    }
?>