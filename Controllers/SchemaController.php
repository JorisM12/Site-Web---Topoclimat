<?php
namespace App\Controllers;

class SchemaController extends Controller
{
    public function index()
    {
        $nameCSS = 'schema';
        $titlePage = 'Pédagogie';
        $this->render('schema/index',compact('nameCSS','titlePage'),"template");
    }
    public function typesFoudre()
    {
        $page = ['storm','1'];
        $nameCSS = 'schema';
        $titlePage = 'Les types de foudre';
        $this->render('schema/storm/typesFoudre',compact('nameCSS','titlePage','page'),"template");
    }
    public function neigeOceanique()
    {
        $page = ['snow','1'];
        $nameCSS = 'schema';
        $titlePage = 'La neige océanique';
        $this->render('schema/snow/neigeOceanique',compact('nameCSS','titlePage','page'),"template");
    }
    public function neigeOceaniqueInteractive()
    {
        $nameCSS = 'schemaInterNeigeOceanique';
        $titlePage = 'La neige océanique';
        $title = $titlePage;
        $this->render('schema/snow/inter/neigeOceaniqueInter',compact('nameCSS','titlePage','title'),"template_schema");
    }
    public function foudresInteractive()
    {
        $nameCSS = 'schemaInterFoudres';
        $titlePage = 'LES DÉCHARGES AU SOL';
        $title = $titlePage;
        $this->render('schema/storm/inter/foudresInter',compact('nameCSS','titlePage','title'),"template_schema");
    }
    public function pluieVerglas()
    {
        $page = ['snow','2'];
        $nameCSS = 'schema';
        $titlePage = 'La pluie verglaçante';
        $this->render('schema/snow/pluieVerglas',compact('nameCSS','titlePage','page'),"template");
    }
    public function pluieVerglasInteractive()
    {
        $nameCSS = 'schemaInterVerglas';
        $titlePage = 'LA PLUIE VERGLAÇANTE';
        $title = $titlePage;
        $this->render('schema/snow/inter/pluieVerglasInter',compact('nameCSS','titlePage','title'),"template_schema");
    }
    public function grele()
    {
        $nameCSS = 'schema';
        $titlePage = 'LA FORMATION DE LA GRÊLE';
        $title = $titlePage;
        $page = ['storm','2'];
        $this->render('schema/storm/grele',compact('nameCSS','titlePage','title','page'),"template");
    }
    public function noctu()
    {
        $nameCSS = 'schema';
        $titlePage = 'LES NUAGES NOCTULESCENTS';
        $title = $titlePage;
        $page = ['weather','1'];
        $this->render('schema/weather/noctu',compact('nameCSS','titlePage','title','page'),"template");
    }
}