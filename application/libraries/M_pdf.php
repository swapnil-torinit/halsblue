<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
 //include_once APPPATH.'/third_party/mpdf57/mpdf.php';
 include_once APPPATH.'/third_party/MPDF57NEW/mpdf.php';
 
class M_pdf {
 
    public $param;
    public $pdf;
 
    public function __construct($param = '"en-GB-x","A4","","",10,10,10,10,6,3')
    {
        $this->param =$param;
        $this->pdf = new mPDF($this->param);
    }
}
