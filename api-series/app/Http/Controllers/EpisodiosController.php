<?php


namespace App\Http\Controllers;


use App\Models\Episodio;

class EpisodiosController extends BasicController
{
    public function __construct()
    {
        $this->classe = Episodio::class;
    }

    public function episodiosPorSerie(int $id)
    {
        $episodios = Episodio::query()
            ->where('serie_id', $id)
            ->orderBy('temporada')
            //->get() Remove o get pra usar o paginate
            ->paginate();
        return $episodios;

    }

}
