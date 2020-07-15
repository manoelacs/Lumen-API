<?php


namespace App\Models;


class Serie extends \Illuminate\Database\Eloquent\Model
{
    public $timestamps = false;
    protected $fillable = ['nome'];
    #protected $perPage = 3;
    protected $appends = ['links'];

    public function episodios()
    {
        return $this->hasMany(Episodio::class);

    }
    public function getLinksAttribute($links): bool
    {
        $episodios = Episodio::query()->where('serie_id',$this->id)->count();
               if($episodios>0){

                   $episodiosLink = "/api/series/{$this->id}/episodios";

               }else{
                    $episodiosLink ="";
               }
               return [
                        "self" => "/api/series/{$this->id}",   #acessar o proprio recurso
                        "episodios" => $episodiosLink          #acessar os episodios
               ]   ;

    }

    # metodos m        ];utators : altera atributo na definição
    # mutator que transforma o nome sempre pra maiusculos
    /*public function setNomeAttribute($nome){
        $this->attributes['nome'] = strtoupper($nome);
    }  */

}
