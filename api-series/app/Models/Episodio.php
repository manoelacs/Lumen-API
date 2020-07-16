<?php


namespace App\Models;


class Episodio extends \Illuminate\Database\Eloquent\Model
{
    public $timestamps = false;
    protected $fillable = ['temporada', 'numero', 'assistido', 'serie_id'];
    protected $appends = ['links'];

    public function serie()
    {
        return $this->belongsTo(Serie::class);

    }
    # Metodo Accessors : Altera atributo durante a busca
    public function getAssistidoAttribute($assistido):bool
    {
        return $assistido;

    }

    public function getLinksAttribute(): array
    {
        return [
            'self' => "/api/episodios/{$this->id}",      #acessar ele mesmo
            'serie'=> "/api/series/{$this->serie_id}"    #acesar as series


        ];
    }


}
