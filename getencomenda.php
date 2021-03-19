<?php
include 'classes/vendaencomenda.php';

$vendaencomenda = new VendaEncomenda();

$vendaencomenda->getEncomenda($_GET);




