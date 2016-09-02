<?php

require_once('../plugins/html2pdf-4.5.1/html2pdf.class.php');

$html = "
<table>
<tr>
<td>Ola</td>
<td>mundo</td>
</tr>
<tr>
<td>adkas</td>
</tr>
<tr>
<td colspan='2'>asdsdasdad</td>
</tr>
</table>";
$html2pdf = new HTML2PDF('L', 'A4', 'en');
$html2pdf->writeHTML($html);
$html2pdf->Output('first_PDF_file.pdf');