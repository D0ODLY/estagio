<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

try {
    // Carregar o arquivo Excel existente
    $inputFileName = '/Applications/XAMPP/xamppfiles/htdocs/projetophp/associados.xlsx'; // Caminho para o arquivo de entrada
    $spreadsheet = IOFactory::load($inputFileName);

    // Obter a primeira planilha
    $sheet = $spreadsheet->getActiveSheet();

    // Ler os dados do arquivo de entrada
    $data = [];
    foreach ($sheet->getRowIterator() as $row) {
        $rowData = [];
        $cellIterator = $row->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(false); 
        foreach ($cellIterator as $cell) {
            $rowData[] = $cell->getValue();
        }
        $data[] = $rowData;
    }

    
    $newSpreadsheet = new Spreadsheet();
    $newSheet = $newSpreadsheet->getActiveSheet();

    
    foreach ($data as $rowIndex => $rowData) {
        foreach ($rowData as $colIndex => $cellValue) {
            
            $columnLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($colIndex);
    
            
            $newSheet->setCellValue($columnLetter . ($rowIndex + 1), $cellValue);
        }
    }
    

    $outputFileName = 'output_associados.xlsx';
    $writer = new Xlsx($newSpreadsheet);
    $writer->save($outputFileName);

    echo "Arquivo 'output_associados.xlsx' criado com exito!";
} catch (Exception $e) {
    echo 'Erro ao processar o arquivo: ', $e->getMessage();
}
?>
