<?php
include 'classes/vendaencomenda.php';

$vendaencomenda = new VendaEncomenda();

$vendaencomenda->getEncomendaAll($_GET);




