<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Formation extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'formations';
    protected $fillable = ['titre','duree','prix','couleur','groupe_id','date_debut','date_fin','deleted_at'];
    protected $dates =['created_at'];
    public function formateur()
    {
        return $this->belongsTo(Formateur::class);
    }

    public function seances(){
        return $this->hasMany(Seance::class);
    }
    public function groupe(){
        return $this->hasOne(Groupe::class);
    }
    
}
