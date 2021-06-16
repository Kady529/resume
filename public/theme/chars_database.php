<?php
$chart = charts::database(Marche_Conakry::all(),bar,'material')
    ->setResponsive('false')
    ->setWidth(0)
    ->setLabels();
