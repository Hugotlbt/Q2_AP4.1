<?php
include "./vendor/autoload.php";
use App\Modele\Modele_jeton;

try {
    $jeton=Modele_jeton::InsertJeton(12,12);

} catch (\Exception $e){
    echo $e->getMessage();
}
