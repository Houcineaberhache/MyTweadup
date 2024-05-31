<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Seance extends Model
{
    use HasFactory,SoftDeletes ;
    protected $table = 'Seances';
    protected $fillable = ['date','horaire','duree','salle','formation_id','formateur_id'];
    protected $dates =['created_at'];
    public function formation()
    {
        return $this->belongsTo(Formation::class,'formation_id');
    }
    public function formateur()
    {
        return $this->belongsTo(Formateur::class);
    }

}
