<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_general {

    public function __construct()
    {

        $this->CI = &get_instance();
    }


    public function generateID($length, $table = null, $table_column = null)
    {
        if ($table == null || $table_column == null) {
            $randomSalt = md5(uniqid(random_int(PHP_INT_MIN, PHP_INT_MAX), true));
            $salt = substr($randomSalt, 0, $length);

            return $salt;
        }else{
            for ($i=0; $i < 100 ; $i++) { 
                $randomSalt = md5(uniqid(random_int(PHP_INT_MIN, PHP_INT_MAX), true));
                $salt = substr($randomSalt, 0, $length);

                $query_check_dupe = $this->CI->db->query("SELECT COUNT(*) AS JUMLAH FROM $table WHERE $table_column = '$salt'");

                if ($query_check_dupe->row()->JUMLAH == 0) {
                    return $salt;
                }
                
            }
            echo "<h3>SUDAH BUAT 100 RANDOM ID NAMUN TIDAK ADA YANG BEDA DENGAN DATABASE, MUNGKIN ADA KESALAHAN ATAU DATANYA TERLALU BANYAK.</h3>";
            exit;
        }
        
    }
    
}

?>