<?php
Yii::import('application.vendors.mpdf.*');
include("mpdf.php");
?>
<?php
$html='
<table width="100%" border="0">
  <tr>
    <td colspan="2" align="center"><strong>PT AWS </strong></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><strong>J U R N A L</strong></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><strong>JANUARI 2012</strong></td>
  </tr>
  <tr>
    <td width="12%"><strong>Organisasi</strong></td>
    <td width="88%">Aqua</td>
  </tr>
  <tr>
    <td><strong>Cabang</strong></td>
    <td>Padang</td>
  </tr>
</table>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td><div align="center"><strong>No</strong></div></td>
    <td><div align="center"><strong>Kode Jurnal</strong></div></td>
    <td><div align="center"><strong>Tanggal</strong></div></td>
    <td><div align="center"><strong>Desc</strong></div></td>
    <td><div align="center"><strong>Kode</strong></div></td>
    <td><div align="center"><strong>Nama Perkiraan</strong></div></td>
    <td><div align="center"><strong>Debet</strong></div></td>
    <td><div align="center"><strong>Kredit</strong></div></td>
  </tr>
  <tr>
    <td><div align="center">1</div></td>
    <td>GL0001</td>
    <td><div align="center">01-09-2012</div></td>
    <td>Pembelian</td>
    <td><div align="center">1130</div></td>
    <td>PERSEDIAAN BARANG DAGANGAN</td>
    <td><div align="right">10000000</div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="center">2110</div></td>
    <td>HUTANG USAHA</td>
    <td>&nbsp;</td>
    <td><div align="right">10000000</div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>';

$mpdf=new mPDF('c');
//$mpdf->Bookmark('Start of the document');
$mpdf->useOddEven = 1;
$mpdf->AddPage('L','','5','i','on');
//$mpdf->AddPage('L','','','','',50,50,50,50,10,10);
//$stylesheet = file_get_contents('../../mpdfstyletables.css');
//$mpdf->WriteHTML($stylesheet,1);      // The parameter 1 tells that this is css/style only and no body/html/text
//$mpdf->WriteHTML('<div>Section 1 text</div>');
$mpdf->WriteHTML($html,2);
$mpdf->Output();
exit;
?>

