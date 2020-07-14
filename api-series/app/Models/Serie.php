<?php


namespace App\Models;


class Serie extends \Illuminate\Database\Eloquent\Model
{
    public $timestamps = false;
    protected $fillable = ['nome'];

    public function episodios()
    {
        return $this->hasMany(Episodio::class);

    }
}
