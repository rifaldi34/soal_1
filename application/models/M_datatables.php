<?php
/**
 * Models     : Datatables serverside based php
 * Modified   : Fauzan Falah
 * Website    : https://www.codekop.com/
 * 
 * 
 * 
 * 
 */
    class M_Datatables extends CI_Model
    {
        function __construct()
        {
            parent::__construct();
        }
 
        function get_tables($tables,$cari,$iswhere)
        {
            // Ambil data yang di ketik user pada textbox pencarian
            $search = $this->db->escape_str($_POST['search']['value']);// htmlspecialchars($_POST['search']['value']);
            // Ambil data limit per page
            $limit = preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['length']}");
            // Ambil data start
            $start =preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['start']}"); 
            
            $query = $tables;

            

            
            if(!empty($iswhere)){
                $sql = $this->db->query("SELECT COUNT(*) AS COUNT FROM ".$query." WHERE ".$iswhere);
            }else{
                $sql = $this->db->query("SELECT COUNT(*) AS COUNT FROM ".$query);
            }
            $sql_count = $sql->row()->COUNT;

            if ($search != '') {
                $cari = implode(" LIKE '%".$search."%' OR ", $cari)." LIKE '%".$search."%'";
            }else{
                $cari = 'TRUE';
            }

            $cari2 = '';
            $i = 1;
            foreach ($_POST['columns'] as $koloms){
                if (strlen($koloms['search']['value']) > 0) {
                    if ($i > 1) {
                        $gunakan_or = ' OR ';
                    }
                    $cari2 = $cari2.' '.@$gunakan_or.$koloms['data']." LIKE '%".$koloms['search']['value']."%' ";

                    $gunakan_cari2 = true;
                    $i++;
                }
            }
            
            if (@$gunakan_cari2 == true) {
                $cari = ' ('.$cari.') AND '.$cari2.' ';
            }
            

            
            // Untuk mengambil nama field yg menjadi acuan untuk sorting
            $order_field = $_POST['order'][0]['column']; 

            // Untuk menentukan order by "ASC" atau "DESC"
            $order_ascdesc = $_POST['order'][0]['dir'];

            if ($_POST['columns'][$order_field]['data'] == null) {
                $order = '';
            } else{
                $order = " ORDER BY ".$_POST['columns'][$order_field]['data']." ".$order_ascdesc;
            }

            if(!empty($iswhere)){
                $sql_data = $this->db->query("SELECT * FROM ".$query." WHERE $iswhere AND ".$cari.$order." LIMIT ".$limit." OFFSET ".$start);
            }else{
                $sql_data = $this->db->query("SELECT * FROM ".$query." WHERE ".$cari.$order." LIMIT ".$limit." OFFSET ".$start);
            }

            if(isset($search))
            {
                if(!empty($iswhere)){
                    $sql_cari =  $this->db->query("SELECT COUNT(*) AS COUNT FROM ".$query." WHERE $iswhere AND (".$cari.")");
                }else{
                    $sql_cari =  $this->db->query("SELECT COUNT(*) AS COUNT FROM ".$query." WHERE (".$cari.")");
                }
                $sql_filter_count = $sql_cari->row()->COUNT;

            }else{
                if(!empty($iswhere)){
                    $sql_filter = $this->db->query("SELECT COUNT(*) AS COUNT FROM ".$query."WHERE ".$iswhere);
                }else{
                    $sql_filter = $this->db->query("SELECT COUNT(*) AS COUNT FROM ".$query);
                }
                $sql_filter_count = $sql_filter->row()->COUNT;
            }

            $data = $sql_data->result_array();

            $callback = array(    
                'draw' => $_POST['draw'], // Ini dari datatablenya    
                'recordsTotal' => $sql_count,    
                'recordsFiltered'=>$sql_filter_count,    
                'data'=>$data
            );
            return json_encode($callback); // Convert array $callback ke json
        }


    }

?>