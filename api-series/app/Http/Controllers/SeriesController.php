<?php


namespace App\Http\Controllers;


use App\Models\Serie;
use http\Env\Response;
use Illuminate\Http\Request;

class SeriesController extends BasicController
{
    public function __construct()
    {
        $this->classe = Serie::class;
    }

}
