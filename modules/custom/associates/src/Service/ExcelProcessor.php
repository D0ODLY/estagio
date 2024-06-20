<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Caminho para o ficheiro Excel de entrada
$inputFileName = 'input.xlsx';

// Carregar o ficheiro Excel de entrada
$spreadsheet = IOFactory::load($inputFileName);

// Selecionar a primeira folha
$sheet = $spreadsheet->getActiveSheet();

// Ler os dados da folha
$data = $sheet->toArray();

// Transformar os dados (Exemplo: inverter linhas e colunas)
$transformedData = array_map(null, ...$data);

// Criar um novo Spreadsheet
$newSpreadsheet = new Spreadsheet();
$newSheet = $newSpreadsheet->getActiveSheet();

// Escrever os dados transformados na nova folha
$newSheet->fromArray($transformedData);

// Guardar o novo ficheiro Excel
$outputFileName = 'output.xlsx';
$writer = IOFactory::createWriter($newSpreadsheet, 'Xlsx');
$writer->save($outputFileName);

echo "Ficheiro transformado guardado como $outputFileName";
?>
