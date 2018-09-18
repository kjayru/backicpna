<?php require_once('start.php');

use Maatwebsite\Excel\Classes\PHPExcel;

use Controllers\Registros;
use Controllers\Home;
home::estoy();

$objPHPExcel = new PHPExcel();

$objPHPExcel->getProperties()->setCreator("HAVAS WORLD WIDE")
							 ->setLastModifiedBy("DESARROLLO")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("REGISTROS");

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'NOMBRES')
            ->setCellValue('B1', 'APELLIDOS')
            ->setCellValue('C1', 'TIPO DOCUMENTO')
            ->setCellValue('D1', 'NUMERO DE DOCUMENTO')
            ->setCellValue('E1', 'CELULAR')
			->setCellValue('F1', 'CORREO')
			->setCellValue('G1', 'SEDE')
            ->setCellValue('H1', 'PROGRAMA')
            ->setCellValue('I1', 'PUBLICIDAD')
            ->setCellValue('J1', 'UTM_SOURCE')
            ->setCellValue('K1', 'UTM_MEDIUM')
            ->setCellValue('L1', 'UTM_CAMPAIGN')
            ->setCellValue('M1', 'UTM_TERM')
            ->setCellValue('N1','UTM_CONTENT')
            ->setCellValue('O1','GCLID')
            ->setCellValue('P1','FECHA');
			
$registros = Registros::getAdultos();

foreach($registros as $key => $resultado){
	$k = $key+2;  
	$objPHPExcel->getActiveSheet()->setCellValue('A' . $k, $resultado->nombres )
	                              ->setCellValue('B' . $k,  $resultado->apellidos)
	                              ->setCellValue('C' . $k,  $resultado->tipodocumento)
	                              ->setCellValue('D' . $k,  $resultado->numerodocumento)
	                              ->setCellValue('E' . $k,  $resultado->celular)
								  ->setCellValue('F' . $k,  $resultado->correo)
                                  ->setCellValue('G' . $k,  $resultado->sedes)
                                  ->setCellValue('H' . $k,  $resultado->programa)
	                              ->setCellValue('I' . $k,  $resultado->pauta)
								  ->setCellValue('J' . $k,  $resultado->utm_source)
                                  ->setCellValue('K' . $k,  $resultado->utm_medium)
                                  ->setCellValue('L' . $k,  $resultado->utm_campaign)
	                              ->setCellValue('M' . $k,  $resultado->utm_term)
								  ->setCellValue('N' . $k,  $resultado->utm_content)
                                  ->setCellValue('O' . $k,  $resultado->gclid)
                                  ->setCellValue('P' . $k,  $resultado->fecha);                                                                
}


$objPHPExcel->getActiveSheet()->setTitle('Registros Programa Adultos');
$objPHPExcel->setActiveSheetIndex(0);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="registros-adultos-'.uniqid().'.xlsx"');
header('Cache-Control: max-age=0');
header('Cache-Control: max-age=1');

header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); 
header ('Cache-Control: cache, must-revalidate'); 
header ('Pragma: public'); 

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');




    