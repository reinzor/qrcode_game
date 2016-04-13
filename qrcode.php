<?php
$code = $_GET['code'];
include "phpqrcode/qrlib.php";
QRcode::png('http://eindspel.baasvanhorstaandemaas.nl?code='.$code, false, QR_ECLEVEL_L, 100); 