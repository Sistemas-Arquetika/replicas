<?php 

//librerias
require 'vendor/autoload.php';
include('conexion.php');

use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Font;


$spreadsheet = new Spreadsheet();
$spreadsheet->getProperties()->setCreator("Arquetika")->setTitle("Consolidado");

//crea una hoja nueva(Balance Standard)
$balance = new Worksheet($spreadsheet, 'Balance');

$spreadsheet->addSheet($balance, 0);


$spreadsheet->getDefaultStyle()->getFont()->setName('Arial');
//$spreadsheet->getDefaultStyle()->getFont()->setSize(8);

$balance->getColumnDimension('B')->setAutoSize(true);
$balance->getColumnDimension('C')->setAutoSize(true);

$query = ("SELECT label,total FROM balancesheetstandard;");
$queryData = mysqli_query($conn,$query);

$i=2;
$col = 'B';
$col1 = 'C';  
while($data = mysqli_fetch_array($queryData)){  

        $balance->setCellValue($col.$i,$data['label'])->getStyle('B')->getFont()->setBold(true)->setSize(8);
        $balance->setCellValue($col1.$i,$data['total'])->getStyle('C')->getFont()->setSize(8);
        $i++;

} 

//crea una nueva hoja(Profit and Loss) 
$resultados = new Worksheet($spreadsheet, 'E. Resultados');
$spreadsheet->addSheet($resultados, 1);

$spreadsheet->getDefaultStyle()->getFont()->setName('Arial');
//$spreadsheet->getDefaultStyle()->getFont()->setSize(8);

$resultados->getColumnDimension('B')->setAutoSize(true);
$resultados->getColumnDimension('C')->setAutoSize(true);

$query = ("SELECT label,amount FROM profitandlossstandard;");
$queryData = mysqli_query($conn,$query);

$i=2;
$col = 'B';
$col1 = 'C';  
while($data = mysqli_fetch_array($queryData)){  

        $resultados->setCellValue($col.$i,$data['label'])->getStyle('B')->getFont()->setBold(true)->setSize(8);
        $resultados->setCellValue($col1.$i,$data['amount'])->getStyle('C')->getFont()->setSize(8);
        $i++;

} 

//crea una nueva hoja(Bloque A) 
$bloque = new Worksheet($spreadsheet, 'Job Bloque A');
$spreadsheet->addSheet($bloque, 2);
$bloque->getTabColor()->setRGB('FF0000');

$spreadsheet->getDefaultStyle()->getFont()->setName('Arial');
$spreadsheet->getDefaultStyle()->getFont()->setSize(8);
//cambia a negrita pero lo hace con todo el texto
//$spreadsheet->getDefaultStyle()->getFont()->setBold(true);


$bloque->getColumnDimension('A')->setAutoSize(true);
$bloque->getColumnDimension('B')->setAutoSize(true);
/*$bloque->getColumnDimension('C')->setAutoSize(true);
$bloque->getColumnDimension('D')->setAutoSize(true);
$bloque->getColumnDimension('E')->setAutoSize(true);
$bloque->getColumnDimension('F')->setAutoSize(true);
$bloque->getColumnDimension('H')->setAutoSize(true);*/


$query = ("SELECT label,est_cost,act_cost,_diff_,est_revenue,act_revenue,diff2 FROM jobestimatesvsactualsdetailaranda_bloque_a;");
$queryData = mysqli_query($conn,$query);

$i=8;

$col1 = 'B';
$col2 = 'C';
$col3 = 'D';
$col4 = 'E';
$col5 = 'F';
$col6 = 'G';
$col7 = 'H';

while($data = mysqli_fetch_array($queryData)){  

        $bloque->setCellValue($col1.$i,$data['label']);
        $bloque->setCellValue($col2.$i,$data['est_cost'])->getStyle('B')->getFont()->setBold(true);
        $bloque->setCellValue($col3.$i,$data['act_cost']);
        /*$bloque->setCellValue($col4.$i,$data['_diff_']);
        $bloque->setCellValue($col5.$i,$data['est_revenue']);
        $bloque->setCellValue($col6.$i,$data['act_revenue']);
        $bloque->setCellValue($col7.$i,$data['diff2']);*/
        $i++;

} 

//crea una nueva hoja(Bloque B) 
$bloque = new Worksheet($spreadsheet, 'Job Bloque B');
$spreadsheet->addSheet($bloque, 3);
$bloque->getTabColor()->setRGB('FF0000');

$spreadsheet->getDefaultStyle()->getFont()->setName('Arial');
$spreadsheet->getDefaultStyle()->getFont()->setSize(8);

$bloque->getColumnDimension('A')->setAutoSize(true);
$bloque->getColumnDimension('B')->setAutoSize(true);
$bloque->getColumnDimension('C')->setAutoSize(true);
$bloque->getColumnDimension('D')->setAutoSize(true);
$bloque->getColumnDimension('E')->setAutoSize(true);
$bloque->getColumnDimension('F')->setAutoSize(true);
$bloque->getColumnDimension('H')->setAutoSize(true);

$query = ("SELECT label,est_cost,act_cost,_diff_,est_revenue,act_revenue,diff2 FROM jobestimatesvsactualsdetailaranda_bloque_b;");
$queryData = mysqli_query($conn,$query);

$i=8;

$col1 = 'B';
$col2 = 'C';
$col3 = 'D';
$col4 = 'E';
$col5 = 'F';
$col6 = 'G';
$col7 = 'H';

while($data = mysqli_fetch_array($queryData)){  

        $bloque->setCellValue($col1.$i,$data['label']);
        $bloque->setCellValue($col2.$i,$data['est_cost'])->getStyle('B')->getFont()->setBold(true);
        $bloque->setCellValue($col3.$i,$data['act_cost']);
        $bloque->setCellValue($col4.$i,$data['_diff_']);
        $bloque->setCellValue($col5.$i,$data['est_revenue']);
        $bloque->setCellValue($col6.$i,$data['act_revenue']);
        $bloque->setCellValue($col7.$i,$data['diff2']);
        $i++;

} 

//crea una nueva hoja(Bloque C) 
$bloque = new Worksheet($spreadsheet, 'Job Bloque C');
$spreadsheet->addSheet($bloque, 4);
$bloque->getTabColor()->setRGB('FF0000');

$spreadsheet->getDefaultStyle()->getFont()->setName('Arial');
$spreadsheet->getDefaultStyle()->getFont()->setSize(8);

$bloque->getColumnDimension('A')->setAutoSize(true);
$bloque->getColumnDimension('B')->setAutoSize(true);
$bloque->getColumnDimension('C')->setAutoSize(true);
$bloque->getColumnDimension('D')->setAutoSize(true);
$bloque->getColumnDimension('E')->setAutoSize(true);
$bloque->getColumnDimension('F')->setAutoSize(true);
$bloque->getColumnDimension('H')->setAutoSize(true);

$query = ("SELECT label,est_cost,act_cost,_diff_,est_revenue,act_revenue,diff2 FROM jobestimatesvsactualsdetailaranda_bloque_c;");
$queryData = mysqli_query($conn,$query);

$i=8;

$col1 = 'B';
$col2 = 'C';
$col3 = 'D';
$col4 = 'E';
$col5 = 'F';
$col6 = 'G';
$col7 = 'H';

while($data = mysqli_fetch_array($queryData)){  

        $bloque->setCellValue($col1.$i,$data['label']);
        $bloque->setCellValue($col2.$i,$data['est_cost'])->getStyle('B')->getFont()->setBold(true);
        $bloque->setCellValue($col3.$i,$data['act_cost']);
        $bloque->setCellValue($col4.$i,$data['_diff_']);
        $bloque->setCellValue($col5.$i,$data['est_revenue']);
        $bloque->setCellValue($col6.$i,$data['act_revenue']);
        $bloque->setCellValue($col7.$i,$data['diff2']);
        $i++;

} 

//crea una nueva hoja(Bloque D) 
$bloque = new Worksheet($spreadsheet, 'Job Bloque D');
$spreadsheet->addSheet($bloque, 5);
$bloque->getTabColor()->setRGB('FF0000');

$spreadsheet->getDefaultStyle()->getFont()->setName('Arial');
$spreadsheet->getDefaultStyle()->getFont()->setSize(8);

$bloque->getColumnDimension('A')->setAutoSize(true);
$bloque->getColumnDimension('B')->setAutoSize(true);
$bloque->getColumnDimension('C')->setAutoSize(true);
$bloque->getColumnDimension('D')->setAutoSize(true);
$bloque->getColumnDimension('E')->setAutoSize(true);
$bloque->getColumnDimension('F')->setAutoSize(true);
$bloque->getColumnDimension('H')->setAutoSize(true);

$query = ("SELECT label,est_cost,act_cost,_diff_,est_revenue,act_revenue,diff2 FROM jobestimatesvsactualsdetailaranda_bloque_d;");
$queryData = mysqli_query($conn,$query);

$i=8;

$col1 = 'B';
$col2 = 'C';
$col3 = 'D';
$col4 = 'E';
$col5 = 'F';
$col6 = 'G';
$col7 = 'H';

while($data = mysqli_fetch_array($queryData)){  

        $bloque->setCellValue($col1.$i,$data['label']);
        $bloque->setCellValue($col2.$i,$data['est_cost'])->getStyle('B')->getFont()->setBold(true);
        $bloque->setCellValue($col3.$i,$data['act_cost']);
        $bloque->setCellValue($col4.$i,$data['_diff_']);
        $bloque->setCellValue($col5.$i,$data['est_revenue']);
        $bloque->setCellValue($col6.$i,$data['act_revenue']);
        $bloque->setCellValue($col7.$i,$data['diff2']);
        $i++;

} 

//crea una nueva hoja(Bloque E) 
$bloque = new Worksheet($spreadsheet, 'Job Bloque E');
$spreadsheet->addSheet($bloque, 6);
$bloque->getTabColor()->setRGB('FF0000');

$spreadsheet->getDefaultStyle()->getFont()->setName('Arial');
$spreadsheet->getDefaultStyle()->getFont()->setSize(8);

$bloque->getColumnDimension('A')->setAutoSize(true);
$bloque->getColumnDimension('B')->setAutoSize(true);
$bloque->getColumnDimension('C')->setAutoSize(true);
$bloque->getColumnDimension('D')->setAutoSize(true);
$bloque->getColumnDimension('E')->setAutoSize(true);
$bloque->getColumnDimension('F')->setAutoSize(true);
$bloque->getColumnDimension('H')->setAutoSize(true);

$query = ("SELECT label,est_cost,act_cost,_diff_,est_revenue,act_revenue,diff2 FROM jobestimatesvsactualsdetailaranda_bloque_e;");
$queryData = mysqli_query($conn,$query);

$i=8;

$col1 = 'B';
$col2 = 'C';
$col3 = 'D';
$col4 = 'E';
$col5 = 'F';
$col6 = 'G';
$col7 = 'H';

while($data = mysqli_fetch_array($queryData)){  

        $bloque->setCellValue($col1.$i,$data['label']);
        $bloque->setCellValue($col2.$i,$data['est_cost'])->getStyle('B')->getFont()->setBold(true);
        $bloque->setCellValue($col3.$i,$data['act_cost']);
        $bloque->setCellValue($col4.$i,$data['_diff_']);
        $bloque->setCellValue($col5.$i,$data['est_revenue']);
        $bloque->setCellValue($col6.$i,$data['act_revenue']);
        $bloque->setCellValue($col7.$i,$data['diff2']);
        $i++;

} 

//crea una nueva hoja(Bloque F) 
$bloque = new Worksheet($spreadsheet, 'Job Bloque F 31-32');
$spreadsheet->addSheet($bloque, 7);
$bloque->getTabColor()->setRGB('FF0000');

$spreadsheet->getDefaultStyle()->getFont()->setName('Arial');
$spreadsheet->getDefaultStyle()->getFont()->setSize(8);

$bloque->getColumnDimension('A')->setAutoSize(true);
$bloque->getColumnDimension('B')->setAutoSize(true);
$bloque->getColumnDimension('C')->setAutoSize(true);
$bloque->getColumnDimension('D')->setAutoSize(true);
$bloque->getColumnDimension('E')->setAutoSize(true);
$bloque->getColumnDimension('F')->setAutoSize(true);
$bloque->getColumnDimension('H')->setAutoSize(true);

$query = ("SELECT label,est_cost,act_cost,_diff_,est_revenue,act_revenue,diff2 FROM jobestimatesvsactualsdetailaranda_bloque_f;");
$queryData = mysqli_query($conn,$query);

$i=8;

$col1 = 'B';
$col2 = 'C';
$col3 = 'D';
$col4 = 'E';
$col5 = 'F';
$col6 = 'G';
$col7 = 'H';

while($data = mysqli_fetch_array($queryData)){  

        $bloque->setCellValue($col1.$i,$data['label']);
        $bloque->setCellValue($col2.$i,$data['est_cost'])->getStyle('B')->getFont()->setBold(true);
        $bloque->setCellValue($col3.$i,$data['act_cost']);
        $bloque->setCellValue($col4.$i,$data['_diff_']);
        $bloque->setCellValue($col5.$i,$data['est_revenue']);
        $bloque->setCellValue($col6.$i,$data['act_revenue']);
        $bloque->setCellValue($col7.$i,$data['diff2']);
        $i++;

} 

//crea una nueva hoja(Bloque F1) 
$bloque = new Worksheet($spreadsheet, 'Job Bloque F 33-34');
$spreadsheet->addSheet($bloque, 8);
$bloque->getTabColor()->setRGB('FF0000');

$spreadsheet->getDefaultStyle()->getFont()->setName('Arial');
$spreadsheet->getDefaultStyle()->getFont()->setSize(8);

$bloque->getColumnDimension('A')->setAutoSize(true);
$bloque->getColumnDimension('B')->setAutoSize(true);
$bloque->getColumnDimension('C')->setAutoSize(true);
$bloque->getColumnDimension('D')->setAutoSize(true);
$bloque->getColumnDimension('E')->setAutoSize(true);
$bloque->getColumnDimension('F')->setAutoSize(true);
$bloque->getColumnDimension('H')->setAutoSize(true);

$query = ("SELECT label,est_cost,act_cost,_diff_,est_revenue,act_revenue,diff2 FROM jobestimatesvsactualsdetailaranda_bloque_f1;");
$queryData = mysqli_query($conn,$query);

$i=8;

$col1 = 'B';
$col2 = 'C';
$col3 = 'D';
$col4 = 'E';
$col5 = 'F';
$col6 = 'G';
$col7 = 'H';

while($data = mysqli_fetch_array($queryData)){  

        $bloque->setCellValue($col1.$i,$data['label']);
        $bloque->setCellValue($col2.$i,$data['est_cost'])->getStyle('B')->getFont()->setBold(true);
        $bloque->setCellValue($col3.$i,$data['act_cost']);
        $bloque->setCellValue($col4.$i,$data['_diff_']);
        $bloque->setCellValue($col5.$i,$data['est_revenue']);
        $bloque->setCellValue($col6.$i,$data['act_revenue']);
        $bloque->setCellValue($col7.$i,$data['diff2']);
        $i++;

} 

//Quitar ultima hoja(verificar porque sale)
$sheetIndex = $spreadsheet->getIndex(
        $spreadsheet->getSheetByName('Worksheet')
    );
    $spreadsheet->removeSheetByIndex($sheetIndex);

    
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="MiConsolidado.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');

/*libero el recurso*/   
mysqli_close($conn) 





?>