<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'groupes';
    protected $fillable = ['nom_groupe','formateur_id','formation_id'];
    protected $dates =['created_at'];
    public function formateur()
    {
        return $this->belongsTo(Formateur::class);
    }
    public function formation()
    {
        return $this->belongsTo(Formation::class,'formation_id');
        
    }
    public function paiement()
    {
        return $this->hasMany(Paiementss::class);
    }
 
    }


