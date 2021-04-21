<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(dirname(__FILE__) . '/dompdf/autoload.inc.php');

use Dompdf\Dompdf;

class Mypdf
{
    protected $ci;
    public function __construct($value='')
    {
        $this->ci =& get_instance();
    }
    public function generate($view, $data = array(), $filename= 'Laporan', $paper='A4', $orientation='portrait')
    {
        $dompdf = new Dompdf();
        $html = $this->ci->load->view($view, $data, TRUE);
        $dompdf->set_option('enable_remote', TRUE);
        $dompdf->loadhtml($html);
        $dompdf->setPaper($paper, $orientation);

        $dompdf->render();
        $dompdf->stream($filename.".pdf", array("Attachment" => FALSE));
    }
      public function generateHTML($view, $data = array(), $filename= 'Laporan', $paper='A4', $orientation='landscape')
    {
        $dompdf = new Dompdf();
        $html = $this->ci->load->view($view, $data, TRUE);
        $dompdf->loadhtmlfile($view);
        $dompdf->setPaper($paper, $orientation);

        $dompdf->render();
        $dompdf->stream($filename.".pdf", array("Attachment" => FALSE));
    }
}
?>