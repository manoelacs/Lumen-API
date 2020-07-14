<?php


namespace App\Models;


class Episodio extends \Illuminate\Database\Eloquent\Model
{
    public $timestamps = false;
    protected $fillable = ['temporada', 'numero', 'assistido'];

    public function serie()
    {
        return $this->belongsTo(Serie::class);

    }

}
