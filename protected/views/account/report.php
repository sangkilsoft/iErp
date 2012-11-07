<?php
Yii::import('application.vendors.mpdf.*');
include("mpdf.php");
?>
<?php
$html='
<table
 style="width: 100%; text-align: left; margin-left: auto; margin-right: auto;"
 border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td style="text-align: center;"><big><span
 style="font-weight: bold;">PT. AWS</span></big></td>
    </tr>
    <tr>
      <td style="text-align: center;"><big><span
 style="font-weight: bold;">N E R A C A</span></big></td>
    </tr>
    <tr>
      <td style="text-align: center;">PER TANGGAL 31
JANUARI 2012</td>
    </tr>
    <tr>
      <td style="text-align: center;">&nbsp; &nbsp;</td>
    </tr>
    <tr>
      <td style="text-align: center;">
      <table style="text-align: left; width: 100%;" border="1"
 cellpadding="2" cellspacing="2">
        <tbody>
          <tr>
            <td style="font-weight: bold;">AKTIVA</td>
            <td></td>
          </tr>
          <tr>
            <td>AKTIVA LANCAR</td>
            <td></td>
          </tr>
          <tr>
            <td>KAS</td>
            <td style="text-align: right;">200000000</td>
          </tr>
          <tr>
            <td>BANK</td>
            <td style="text-align: right;">100000000</td>
          </tr>
          <tr>
            <td>PIUTANG DAGANG</td>
            <td style="text-align: right;">200000000</td>
          </tr>
          <tr>
            <td>PERSEDIAAN BARANG DAGANG</td>
            <td style="text-align: right;">250000000</td>
          </tr>
          <tr>
            <td>JUMLAH AKTIVA LANCAR</td>
            <td style="text-align: right;">100000000</td>
          </tr>
          <tr>
            <td>AKTIVA TETAP</td>
            <td></td>
          </tr>
          <tr>
            <td>TANAH </td>
            <td></td>
          </tr>
          <tr>
            <td>BANGUNAN</td>
            <td></td>
          </tr>
          <tr>
            <td>KENDARAAN</td>
            <td></td>
          </tr>
          <tr>
            <td>JUMLAH AKTIVA TETAP</td>
            <td></td>
          </tr>
          <tr>
            <td>TOTAL AKTIVA</td>
            <td></td>
          </tr>
        </tbody>
      </table>
      </td>
    </tr>
  </tbody>
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

