<?php
//zend by 旺旺ecshop2011所有  禁止倒卖 一经发现停止任何服务
function customSetup($barcode, $get)
{
	if (isset($get['checksum'])) {
		$barcode->setChecksum($get['checksum'] === '1' ? true : false);
	}
}

$classFile = 'BCGcode39.barcode.php';
$className = 'BCGcode39';
$baseClassFile = 'BCGBarcode1D.php';
$codeVersion = '5.0.2';

?>
