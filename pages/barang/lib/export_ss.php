<?php

session_start();

if (!isset($_SESSION['login'])) {
    header('Location: ../../auth/login.php');
    exit;
}

require '../../../vendor/autoload.php';
require '../../../config/app.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$activeWorksheet = $spreadsheet->getActiveSheet();
$activeWorksheet->mergeCells('A1:E1');
$activeWorksheet->setCellValue('A1', 'Daftar Barang')->getStyle('A1')->getAlignment()->setHorizontal('center');
$activeWorksheet->setCellValue('A2', 'No')->getColumnDimension('A')->setAutoSize(true);
$activeWorksheet->setCellValue('B2', 'Nama Barang')->getColumnDimension('B')->setAutoSize(true);
$activeWorksheet->setCellValue('C2', 'Jumlah')->getColumnDimension('C')->setAutoSize(true);
$activeWorksheet->setCellValue('D2', 'Harga')->getColumnDimension('D')->setAutoSize(true);
$activeWorksheet->setCellValue('E2', 'Tanggal')->getColumnDimension('E')->setAutoSize(true);

$no = 1;
$start = 3;
$daftar_barang = select("SELECT * FROM tb_barang");
foreach ($daftar_barang as $barang) {
    $activeWorksheet->setCellValue('A' . $start, $no++)->getStyle('A' . $start)->getAlignment()->setHorizontal('center');
    $activeWorksheet->setCellValue('B' . $start, $barang['nama_brg']);
    $activeWorksheet->setCellValue('C' . $start, $barang['jumlah_brg'])->getStyle('C' . $start)->getAlignment()->setHorizontal('center');
    $activeWorksheet->setCellValue('D' . $start, 'Rp ' . number_format($barang['harga_brg'], 2, ',', '.'));
    $activeWorksheet->setCellValue('E' . $start, date('d/m/Y | H:i:s', strtotime($barang['tanggal_brg'])));
    $start++;
}

$activeWorksheet->setTitle('Barang');
$activeWorksheet->getStyle('A1:E'.$start)->getAlignment()->setVertical('center');
$styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['argb' => 'FF000000'],
        ],
    ],
];

$activeWorksheet->getStyle('A1:E'.$start-1)->applyFromArray($styleArray);

$writer = new Xlsx($spreadsheet);
$writer->save('../../../export/daftar_barang_'. date('Ymd').'.xlsx');
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename='.'daftar_barang_'.date('Ymd').'.xlsx');
header('Content-Length: ' . filesize('../../../export/daftar_barang_'. date('Ymd').'.xlsx'));
header('Cache-Control: max-age=0');
readfile('../../../export/daftar_barang_'. date('Ymd').'.xlsx');
unlink('../../../export/daftar_barang_'. date('Ymd').'.xlsx');
exit;