<?php
namespace App\Controllers;

class OtherController extends Controller{

    public function mentions()
    {
        $nameCSS = 'mentions';
        $titlePage = 'Mentions Légals';
        $this->render('other/mentions',compact('nameCSS','titlePage'),'template');
    }
}