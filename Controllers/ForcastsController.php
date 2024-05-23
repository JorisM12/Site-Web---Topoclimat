<?php 
namespace App\Controllers;

class ForcastsController extends Controller
{
    public function index(string $sector = 'REGION')
    {
        header('Content-Type: application/json');
        $data = file_get_contents("".$sector);
        echo $data;
        exit;
    }
    public function forcastCity()
    {
        $url = 'https://api.open-meteo.com/v1/dwd-icon?latitude=49.1191&longitude=6.1727&hourly=temperature_2m,relative_humidity_2m,weather_code,wind_speed_10m,wind_gusts_10m&timezone=Europe%2FLondon';
        $result = file_get_contents($url);
        if ($result!== false) {
            $data = json_decode($result, true);
        } else {
            echo "Erreur lors de la récupération des données depuis l'API.";
        }
    }
    public function apiMeteoFrance()
    {
        header('Content-Type: application/json');
        $dep = [57, 54, 55, 88, 8, 51, 52, 10, 52, 67, 68];
        $listVigi = 0;
        
        foreach ($dep as $value) {
            $url = "https://public.opendatasoft.com/api/explore/v2.1/catalog/datasets/weatherref-france-vigilance-meteo-departement/records?select=color_id&where=domain_id%3A%22$value%22%20AND%20echeance%3A%22J%22%20%20AND%20color_id%20%3E%201&limit=20";
            $result = file_get_contents($url);
            $color =  json_decode($result, true);
            if($color["total_count"] > 0) {
                $index = $color['results'][0]['color_id'];
                $listVigi < $index ? $listVigi = $index : $listVigi = $listVigi;
            }
        }
        echo json_encode($listVigi);
    }
}