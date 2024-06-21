<?php
require_once '../vendor/autoload.php';
require_once '../models/matricula.model.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Crear una nueva hoja de cálculo
$spreadsheet = new Spreadsheet();

// Obtener la primera hoja activa
$sheet = $spreadsheet->getActiveSheet();

// Agregar el título 'Reporte de usuarios' que abarca todas las columnas desde A hasta F
// Fusionar las celdas de la fila 2 desde la columna A hasta la F
$sheet->mergeCells('A2:F2');
$sheet->setCellValue('A2', 'Reporte de Matriculas');

// Alinear el título al centro
$sheet->getStyle('A2:F2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

// Establecer el tamaño de fuente a 16px y aplicar negrita
$sheet->getStyle('A2:F2')->getFont()->setSize(16);
$sheet->getStyle('A2:F2')->getFont()->setBold(true);

// Establecer los datos de la tabla
$sheet->setCellValue('A4', 'Codigo');
$sheet->setCellValue('B4', 'Nombre');
$sheet->setCellValue('C4', 'Telefono');
$sheet->setCellValue('D4', 'Grado');
$sheet->setCellValue('E4', 'Seccion');
$sheet->setCellValue('F4', 'Turno');
$sheet->setCellValue('G4', 'Anio');
$sheet->setCellValue('H4', 'Dirección');
$sheet->setCellValue('I4', 'Tutor');
$sheet->setCellValue('J4', 'Cedula del Tutor');

// Cambiar color de fondo de la primera fila a #0F172A y color de texto a blanco
$sheet->getStyle('A4:J4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('0F172A'); // Color de fondo
    $sheet->getStyle('A4:J4')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE); // Color de texto

// Hacer que la primera fila esté en negritas
$sheet->getStyle('A4:J4')->getFont()->setBold(true);

// Centrar el texto en todas las celdas de la columna
$alignmentCenter = \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER;

foreach($sheet->getRowIterator() as $row) {
    foreach($row->getCellIterator() as $cell) {
        $cellCoordinate = $cell->getCoordinate();
        $sheet->getStyle($cellCoordinate)->getAlignment()->setHorizontal($alignmentCenter);
    }
}

// Consulta a la base de datos
$objMatricula = new Matricula;
$allMatriculas = $objMatricula->read();
$numRows = mysqli_num_rows($allMatriculas);

// Contador para las filas
$rowCount = 5;
for ($i = 0; $i < $numRows; $i++) { 
    $matricula = mysqli_fetch_assoc($allMatriculas);    
    $sheet->setCellValue('A'.$rowCount, $matricula['Cod_Matricula']);
    $sheet->setCellValue('B'.$rowCount, $matricula['Pri_Nombre']. ' '. $matricula['Seg_Nombre']. ' '. $matricula['Pri_Apellido']. ' '. $matricula['Seg_Apellido']);
    $sheet->setCellValue('C'.$rowCount, $matricula['Telefono']);
    $sheet->setCellValue('D'.$rowCount, $matricula['Grado']);
    $sheet->setCellValue('E'.$rowCount, $matricula['Seccion']);
    $sheet->setCellValue('F'.$rowCount, $matricula['Turno']);
    $sheet->setCellValue('G'.$rowCount, $matricula['Anio']);
    $sheet->setCellValue('H'.$rowCount, $matricula['Direccion']);
    $sheet->setCellValue('I'.$rowCount, $matricula['Tutor_Pri_Nombre']. ' '. $matricula['Tutor_Seg_Nombre']. ' '. $matricula['Tutor_Pri_Apellido']. ' '. $matricula['Tutor_Seg_Apellido']);
    $sheet->setCellValue('J'.$rowCount, $matricula['Tutor_Cedula']);

    $rowCount++;
}

// Ajustar el ancho de las columnas
$columnsWidths = [
    'A' => 10, // Ancho para la columna A
    'B' => 40, // Ancho para la columna B
    'C' => 15, // Ancho para la columna C
    'D' => 9, // Ancho para la columna D
    'E' => 8, // Ancho para la columna E
    'F' => 15, // Ancho para la columna F
    'G' => 8, // Ancho para la columna G
    'H' => 30, // Ancho para la columna H
    'I' => 40, // Ancho para la columna I
    'J' => 20, // Ancho para la columna J
];

foreach ($columnsWidths as $column => $width) {
    $sheet->getColumnDimension($column)->setWidth($width);
}

// Aplicar el estilo de borde a cada celda individualmente
for ($row = 4; $row <= $rowCount; $row++) { // Comienza desde la fila 4
    for ($col = 1; $col <= 10; $col++) { // Itera sobre las columnas A-F
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
header('Content-Disposition: attachment; filename="matriculas.xlsx"');
header('Cache-Control: max-age=0');


readfile($tempFile);
unlink($tempFile);

// Salir del script
exit;
