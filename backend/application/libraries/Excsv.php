<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/**
 * CodeIgniter CSV Export Import Class
 *
 * This library will help to export CSV file to a table or import CSV file into
 * an associative array
 * 
 * This library treats the first row of a CSV file
 * as a column header row by default
 * 
 *
 * @package         CodeIgniter
 * @subpackage      Libraries
 * @category        Libraries
 * @author          Eddy Subratha
 */

class Excsv {

    public function export_to_file($query = '', $filename = '', $headers = FALSE)
    {
        header('Content-Type: application/csv');
        header('Content-Disposition: attachement; filename="'.$filename.'"');
        $array      = array();        
        $line      = array();

        if($headers)
        {
            foreach ($query->list_fields() as $name) {
                $line[] = $name;
            }            
        }        
        $array[] = $line;        

        foreach ($query->result_array() as $row) {
            $line = array();
            foreach ($row as $item) {
                $line[] = $item;
            }
            $array[] = $line;
        } 

        ob_start();
        $f = fopen('php://output', 'w') or show_error("Can't open php://output");
        $n = 0;        
        foreach ($array as $line) {
            $n++;
            if ( ! fputcsv($f, $line)) {
                show_error("Can't write line $n: $line");
            }
        }
        fclose($f) or show_error("Can't close php://output");
        $str = ob_get_contents();
        ob_end_clean(); 
        echo $str;
    }

}

/* End of file Excsv.php */