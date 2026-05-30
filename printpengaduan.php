<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/vendor/autoload.php';

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\SimpleType\Jc;



$nama     = $_GET['nama'] ?? '-';
$nip      = $_GET['nip'] ?? '-';
$keluhan  = $_GET['keluhan'] ?? '-';
$status   = $_GET['status'] ?? 'Belum';



$statusText  = 'BELUM DIPROSES';
$statusColor = '808080';
$keterangan  = 'Pengaduan telah diterima dan sedang menunggu tindak lanjut dari admin.';

if ($status == 'Diproses') {

    $statusText  = 'SEDANG DIPROSES';
    $statusColor = '0A2A66';

    $keterangan  =
        'Pengaduan sedang diproses oleh pihak terkait untuk dilakukan pemeriksaan lebih lanjut.';
}

if ($status == 'Disetujui') {

    $statusText  = 'PENGADUAN DITERIMA';
    $statusColor = '16A34A';

    $keterangan  =
        'Pengaduan telah diterima dan disetujui untuk dilakukan tindakan penanganan.';
}

if ($status == 'Ditolak') {

    $statusText  = 'PENGADUAN DITOLAK';
    $statusColor = 'DC2626';

    $keterangan  =
        'Pengaduan ditolak karena data atau informasi yang diberikan tidak memenuhi ketentuan.';
}



$phpWord = new PhpWord();

$phpWord->setDefaultFontName('Times New Roman');
$phpWord->setDefaultFontSize(11);

$section = $phpWord->addSection([
    'marginTop'    => 700,
    'marginBottom' => 700,
    'marginLeft'   => 900,
    'marginRight'  => 900
]);



$kopTable = $section->addTable([
    'alignment' => Jc::CENTER,
    'borderSize' => 0,
    'borderColor' => 'FFFFFF',
    'cellMargin' => 0
]);

$kopTable->addRow();



$cellLogo = $kopTable->addCell(1400, [
    'borderSize' => 0,
    'borderColor' => 'FFFFFF',
    'valign' => 'center'
]);

$logoPath = __DIR__ . '/images/logobina.png';

if (file_exists($logoPath)) {

    $cellLogo->addImage($logoPath, [
        'width' => 72,
        'height' => 90,
        'alignment' => Jc::CENTER
    ]);
}



$cellText = $kopTable->addCell(8600, [
    'borderSize' => 0,
    'borderColor' => 'FFFFFF',
    'valign' => 'center'
]);

$cellText->addText(
    'PEMERINTAH PROVINSI JAWA TIMUR',
    [
        'size' => 12,
        'name' => 'Times New Roman'
    ],
    [
        'alignment' => Jc::CENTER,
        'spaceAfter' => 0
    ]
);

$cellText->addText(
    'DINAS PEKERJAAN UMUM BINA MARGA',
    [
        'bold' => true,
        'size' => 20,
        'name' => 'Times New Roman'
    ],
    [
        'alignment' => Jc::CENTER,
        'spaceAfter' => 0
    ]
);

$cellText->addText(
    'Jalan Gayung Kebonsari Nomor 167, Gayungsari, Gayungan, Surabaya, Jawa Timur',
    [
        'size' => 11,
        'name' => 'Times New Roman'
    ],
    [
        'alignment' => Jc::CENTER,
        'spaceAfter' => 0
    ]
);

$cellText->addText(
    '60235',
    [
        'size' => 11,
        'name' => 'Times New Roman'
    ],
    [
        'alignment' => Jc::CENTER,
        'spaceAfter' => 0
    ]
);

$cellText->addText(
    'Telepon (031) 8280919, Laman binamarga.jatimprov.go.id, Pos-el',
    [
        'size' => 11,
        'name' => 'Times New Roman'
    ],
    [
        'alignment' => Jc::CENTER,
        'spaceAfter' => 0
    ]
);

$cellText->addText(
    'binamarga@jatimprov.go.id',
    [
        'size' => 11,
        'underline' => 'single',
        'name' => 'Times New Roman'
    ],
    [
        'alignment' => Jc::CENTER,
        'spaceAfter' => 0
    ]
);



$section->addLine([
    'weight' => 2,
    'width'  => 520,
    'height' => 0,
    'color'  => '000000',
    'alignment' => Jc::CENTER
]);



$section->addText(
    'LAPORAN PENGADUAN',
    [
        'bold' => true,
        'size' => 14,
        'underline' => 'single'
    ],
    [
        'alignment' => Jc::CENTER,
        'spaceBefore' => 0,
        'spaceAfter'  => 50
    ]
);



$table = $section->addTable([
    'alignment' => Jc::CENTER,
    'borderSize' => 0
]);

$table->addRow();

$table->addCell(9000, [
    'bgColor' => $statusColor
])->addText(
    $statusText,
    [
        'bold' => true,
        'color' => 'FFFFFF',
        'size' => 11
    ],
    [
        'alignment' => Jc::CENTER
    ]
);

$section->addTextBreak(1);



$infoTable = $section->addTable([
    'borderSize' => 6,
    'borderColor' => 'CCCCCC',
    'cellMargin' => 80
]);

$data = [
    'Nama'    => $nama,
    'NIP'     => $nip,
    'Tanggal' => date('d F Y'),
    'Status'  => $statusText
];

foreach ($data as $label => $value) {

    $infoTable->addRow();

    $infoTable->addCell(2500)->addText(
        $label,
        ['bold' => true]
    );

    $infoTable->addCell(7000)->addText($value);
}

$section->addTextBreak(1);



$section->addText(
    'Isi Pengaduan:',
    [
        'bold' => true
    ]
);

$section->addText(
    $keluhan,
    [
        'size' => 11
    ],
    [
        'alignment' => Jc::BOTH
    ]
);

$section->addTextBreak(1);



$section->addText(
    'Keterangan:',
    [
        'bold' => true
    ]
);

$section->addText(
    $keterangan,
    [
        'size' => 11
    ],
    [
        'alignment' => Jc::BOTH
    ]
);

$section->addTextBreak(2);



$section->addText(
    'Surabaya, ' . date('d F Y'),
    [],
    [
        'alignment' => Jc::RIGHT
    ]
);

$section->addText(
    'Admin Pengelola',
    [],
    [
        'alignment' => Jc::RIGHT
    ]
);

$section->addTextBreak(3);

$section->addText(
    '(____________________)',
    [],
    [
        'alignment' => Jc::RIGHT
    ]
);



$fileName = 'Laporan_Pengaduan.docx';
$filePath = __DIR__ . '/' . $fileName;

$writer = IOFactory::createWriter($phpWord, 'Word2007');
$writer->save($filePath);

if (ob_get_length()) {
    ob_end_clean();
}

header("Content-Description: File Transfer");
header("Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");
header("Content-Disposition: attachment; filename=\"$fileName\"");
header("Content-Transfer-Encoding: binary");
header("Expires: 0");
header("Cache-Control: must-revalidate");
header("Pragma: public");
header("Content-Length: " . filesize($filePath));

flush();
readfile($filePath);

unlink($filePath);
exit;
?>