<?php


namespace App\Http\Controllers;


use App\Models\Episodio;

class EpisodiosController extends BasicController
{
    public function __construct()
    {
        $this->classe = Episodio::class;
    }

}
