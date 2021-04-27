<?php

require __DIR__.'/vendor/autoload.php';

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->AddPage();

$pdf->AddFont('FontAwesome', '');
$pdf->SetFont('FontAwesome', '', 14, '', true);
$pdf->setFontSubsetting(false);
// following works:
// $pdf->SetFont('FontAwesome');
$pdf->writeHTML('&#xf03e;'); // single icon
$pdf->writeHTML('2 icons: &#xf0a4; &#xf03e;'); // text "2 icons:" will show invalid chars
$pdf->writeHTMLCell(0, 0, 0, 0, '&#xf0a4;&#xf01d;&#xf03e;'); // three icons

// following does not work:
$pdf->SetFont('FontAwesome', '', 14, '', true);
// $pdf->Cell(0, 0, "\\xf0\xa4");
// $pdf->MultiCell(0, 0, "&#xf03e;");
// mixing up non-font awesome text and normal text does not work either
// $pdf->writeHTML("<span style='font-family:FontAwesome;'> &#xf0a4; </span>");

// after icons inserted, switch back to normal legible font
$pdf->SetFont('Courier', '');
$pdf->Cell(0, 0, 'Continue normal text ..');

file_put_contents('test.pdf', $pdf->output('test.pdf', 'S'));
