<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require_once('assets/dompdf/autoload.inc.php');
use Dompdf\Dompdf;
use Dompdf\Options;
class Mypdf{
    protected function ci()
    {
        return get_instance();
    }


    public function generate($view, $data = array(), $filename = 'Laporan', $paper = 'A4', $orientation = 'landscape')
    {
        $options = new Options();
        $options->set('isRemoteEnabled', TRUE);
      $dompdf = new Dompdf($options);
      $html = $this->ci()->load->view($view, $data, TRUE);
      $dompdf->loadHtmlFile($html);
      $dompdf->setBasePath('../../..');
      $dompdf->setPaper($paper, $orientation);
      //render
      $dompdf->render();
      $dompdf->stream($filename . ".pdf", array("Attachment" => FALSE));
    }
}