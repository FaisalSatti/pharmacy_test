<?php
/**
 * Html2Pdf Library - example
 *
 * HTML => PDF converter
 * distributed under the OSL-3.0 License
 *
 * @package   Html2pdf
 * @author    Laurent MINGUET <webmaster@html2pdf.fr>
 * @copyright 2017 Laurent MINGUET
 */
require_once dirname(__FILE__).'/html2pdf-master/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {
    ob_start();
    include './pages/invoice.php';
    // include '../../../../create/daily-report.php';
    $content = ob_get_clean();

    $content;
    
    // $content = fopen("../../../../create/daily-report.php","r");
    // $fSize = filesize("../../../../create/daily-report.php");
    // // $read = fread($content,$fSize);
    // $read = file_get_contents("../../../../create/daily-report.php");
    // echo $read;
    $dir = dirname(__FILE__)."/../uploads/project/project_name";
    // if(!file_exists($dir))
    // {
    //    // echo 1;die;
    //     mkdir($dir);
    // }

    $html2pdf = new Html2Pdf('P', 'A4', 'fr');
    $html2pdf->setTestIsImage(false);
    // $html2pdf->setFallbackImage('./res/off.png');
    $html2pdf->writeHTML($content);
  //  $html2pdf->output('test.pdf');
    $now = date('d-M-Y H_i_s'); 
    if(isset($_REQUEST['action']) && $_REQUEST['action']=='view')
    {        
     	// $html2pdf->output($dir."/rfi_".$rfi_id."_".$now.".pdf");
    }
    else
    {
    	$html2pdf->output("view.pdf");
        // $html2pdf->output($dir."/rfi_".$rfi_id."_".$now.".pdf",'FD');
    }
} catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}
