<?php
//zend by 旺旺ecshop2011所有  禁止倒卖 一经发现停止任何服务
ob_start();
echo "<style type=\"text/css\">\n<!--\n.div { background: #CCDDCC; color: #002200; text-align: center; width: 70mm; height: 20mm; margin: 2mm; }\n.div1 { border: solid 2mm black; border-radius: 5mm;              -moz-border-radius: 5mm;              }\n.div2 { border: solid 2mm black; border-radius: 3mm 10mm 0mm 3mm; -moz-border-radius: 3mm 10mm 0mm 3mm; }\n.div3 { border: solid 2mm black; border-radius: 10mm / 7mm;       -moz-border-radius: 10mm / 7mm;       }\n.div4 { border: solid 6mm black; border-radius: 5mm / 10mm;       -moz-border-radius: 5mm / 10mm;       }\n.div5 { border: solid 5mm black; border-top: none; border-bottom: none; border-radius: 5mm; -moz-border-radius: 5mm; }\n.div6 { border: solid 5mm black; border-left: none; border-right: none; border-radius: 5mm; -moz-border-radius: 5mm; }\n.div7 { border: solid 5mm black; border-left: none; border-top: none; border-radius: 5mm;   -moz-border-radius: 5mm; }\n.div8 { border-radius: 8mm; -moz-border-radius: 8mm; border-left: solid 2mm #660000; border-top: solid 1mm #006600; border-right: solid 2mm #000066; border-bottom: solid 4mm #004444;}\n-->\n</style>\n<page>\n    <div class=\"div div1\">Exemple de div</div>\n    <div class=\"div div2\">Exemple de div</div>\n    <div class=\"div div3\">Exemple de div</div>\n    <div class=\"div div4\">Exemple de div</div>\n    <div class=\"div div5\">Exemple de div</div>\n    <div class=\"div div6\">Exemple de div</div>\n    <div class=\"div div7\">Exemple de div</div>\n    <div class=\"div div8\">Exemple de div</div>\n</page>\n";
$content = ob_get_clean();
require_once dirname(__FILE__) . '/../html2pdf.class.php';

try {
	$html2pdf = new HTML2PDF('P', 'A4', 'fr');
	$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
	$html2pdf->Output('radius.pdf');
}
catch (HTML2PDF_exception $e) {
	echo $e;
	exit();
}

?>