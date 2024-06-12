<?php
require_once '../vendor/autoload.php';
require_once '../models/tutor.model.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Crear una nueva hoja de cálculo
$spreadsheet = new Spreadsheet();

// Obtener la primera hoja activa
$sheet = $spreadsheet->getActiveSheet();

// Agregar el título 'Reporte de usuarios' que abarca todas las columnas desde A hasta F
// Fusionar las celdas de la fila 2 desde la columna A hasta la F
$sheet->mergeCells('A2:F2');
$sheet->setCellValue('A2', 'Reporte de Tutores');

// Alinear el título al centro
$sheet->getStyle('A2:F2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

// Establecer el tamaño de fuente a 16px y aplicar negrita
$sheet->getStyle('A2:F2')->getFont()->setSize(16);
$sheet->getStyle('A2:F2')->getFont()->setBold(true);

// Establecer los datos de la tabla
$sheet->setCellValue('A4', 'ID');
$sheet->setCellValue('B4', 'Nombre Completo');
$sheet->setCellValue('C4', 'Cedula');
$sheet->setCellValue('D4', 'Telefono');
$sheet->setCellValue('E4', 'Direccion');
$sheet->setCellValue('F4', 'Correo Electronico');

// Cambiar color de fondo de la primera fila a #0F172A y color de texto a blanco
$sheet->getStyle('A4:F4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('0F172A'); // Color de fondo
    $sheet->getStyle('A4:F4')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE); // Color de texto

// Hacer que la primera fila esté en negritas
$sheet->getStyle('A4:F4')->getFont()->setBold(true);

// Centrar el texto en todas las celdas de la columna
$alignmentCenter = \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER;

foreach($sheet->getRowIterator() as $row) {
    foreach($row->getCellIterator() as $cell) {
        $cellCoordinate = $cell->getCoordinate();
        $sheet->getStyle($cellCoordinate)->getAlignment()->setHorizontal($alignmentCenter);
    }
}

// Consulta a la base de datos
$objTutor = new Tutor;
$allTutores = $objTutor->read();
$numRows = mysqli_num_rows($allTutores);

// Contador para las filas
$rowCount = 5;
for ($i = 0; $i < $numRows; $i++) { 
    $tutor = mysqli_fetch_assoc($allTutores);
    $sheet->setCellValue('A'.$rowCount, $tutor['ID_Tutor']);
    $sheet->setCellValue('B'.$rowCount, $tutor['Pri_Nombre']. ' '. $tutor['Pri_Nombre']. ' '. $tutor['Pri_Apellido']. ' '. $tutor['Seg_Apellido']);
    $sheet->setCellValue('C'.$rowCount, $tutor['Cedula']);
    $sheet->setCellValue('D'.$rowCount, $tutor['Telefono']);
    $sheet->setCellValue('E'.$rowCount, $tutor['Direccion']);
    $sheet->setCellValue('F'.$rowCount, $tutor['Correo_Electronico']);

    $rowCount++;
}

// Ajustar el ancho de las columnas
$columnsWidths = [
    'A' => 7, // Ancho para la columna A
    'B' => 40, // Ancho para la columna B
    'C' => 15, // Ancho para la columna C
    'D' => 15, // Ancho para la columna D
    'E' => 40, // Ancho para la columna E
    'F' => 40, // Ancho para la columna F
];

foreach ($columnsWidths as $column => $width) {
    $sheet->getColumnDimension($column)->setWidth($width);
}

// Aplicar el estilo de borde a cada celda individualmente
for ($row = 4; $row <= $rowCount; $row++) { // Comienza desde la fila 4
    for ($col = 1; $col <= 6; $col++) { // Itera sobre las columnas A-F
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
header('Content-Disposition: attachment; filename="tutores.xlsx"');
header('Cache-Control: max-age=0');


readfile($tempFile);
unlink($tempFile);

// Salir del script
exit;
