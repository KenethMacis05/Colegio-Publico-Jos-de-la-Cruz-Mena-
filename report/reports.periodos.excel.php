<?php
require_once '../vendor/autoload.php';
require_once '../models/periodoescolar.model.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Crear una nueva hoja de cálculo
$spreadsheet = new Spreadsheet();

// Obtener la primera hoja activa
$sheet = $spreadsheet->getActiveSheet();

// Agregar el título 'Reporte de usuarios' que abarca todas las columnas desde A hasta F
// Fusionar las celdas de la fila 2 desde la columna A hasta la F
$sheet->mergeCells('A2:E2');
$sheet->setCellValue('A2', 'Reporte de Periodo Escolar');

// Alinear el título al centro
$sheet->getStyle('A2:E2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

// Establecer el tamaño de fuente a 16px y aplicar negrita
$sheet->getStyle('A2:E2')->getFont()->setSize(16);
$sheet->getStyle('A2:E2')->getFont()->setBold(true);

// Establecer los datos de la tabla
$sheet->setCellValue('A4', 'ID');
$sheet->setCellValue('B4', 'Añio');
$sheet->setCellValue('C4', 'Fecha de Inicio');
$sheet->setCellValue('D4', 'Fecha de Cumminación');
$sheet->setCellValue('E4', 'Estado');

// Cambiar color de fondo de la primera fila a #0F172A y color de texto a blanco
$sheet->getStyle('A4:E4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('0F172A'); // Color de fondo
    $sheet->getStyle('A4:E4')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE); // Color de texto

// Hacer que la primera fila esté en negritas
$sheet->getStyle('A4:E4')->getFont()->setBold(true);

// Centrar el texto en todas las celdas de la columna
$alignmentCenter = \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER;

foreach($sheet->getRowIterator() as $row) {
    foreach($row->getCellIterator() as $cell) {
        $cellCoordinate = $cell->getCoordinate();
        $sheet->getStyle($cellCoordinate)->getAlignment()->setHorizontal($alignmentCenter);
    }
}

// Consulta a la base de datos
$objPeriodo = new PeriodoEscolar;
$allPeriodo = $objPeriodo->read();
$numRows = mysqli_num_rows($allPeriodo);

// Contador para las filas
$rowCount = 5;
for ($i = 0; $i < $numRows; $i++) { 
    $periodo = mysqli_fetch_assoc($allPeriodo);
    $sheet->setCellValue('A'.$rowCount, $periodo['ID_Anio_Lectivo']);
    $sheet->setCellValue('B'.$rowCount, $periodo['Anio']);
    $sheet->setCellValue('C'.$rowCount, $periodo['Fecha_Inicio']);
    $sheet->setCellValue('D'.$rowCount, $periodo['Fecha_Final']);
    $sheet->setCellValue('E'.$rowCount, $periodo['Estado']);    

    $rowCount++;
}

// Ajustar el ancho de las columnas
$columnsWidths = [
    'A' => 10, // Ancho para la columna A
    'B' => 10, // Ancho para la columna B
    'C' => 20, // Ancho para la columna C
    'D' => 20, // Ancho para la columna D
    'E' => 10, // Ancho para la columna E    
];

foreach ($columnsWidths as $column => $width) {
    $sheet->getColumnDimension($column)->setWidth($width);
}

// Aplicar el estilo de borde a cada celda individualmente
for ($row = 4; $row <= $rowCount; $row++) { // Comienza desde la fila 4
    for ($col = 1; $col <= 5; $col++) { // Itera sobre las columnas A-E
        $cell = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($col). $row;
        
        // Obtener el objeto de estilo para la celda actual
        $style = $sheet->getStyle($cell);
        
        // Aplicar el borde a todos los lados de la celda
        $style->getBorders()->getAllBorders()
            ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);            
    }
}

// Crear un objeto Writer para exportar la hoja de cálculo como XLSX
$writer = new Xlsx($spreadsheet);

// Escribir la hoja de cálculo en un archivo temporal
$tempFile = tempnam(sys_get_temp_dir(), 'PHP');
$writer->save($tempFile);

// Preparar las cabeceras para la descarga
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="periodosEscolares.xlsx"');
header('Cache-Control: max-age=0');


readfile($tempFile);
unlink($tempFile);

// Salir del script
exit;
