<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Paiementss extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'paiementsses';
    protected $fillable = ['etudiant_id','formation_id','somme','remise','prix_total','groupe_id','reste_paiement'];
    protected $dates =['created_at'];
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }
    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }
    public function groupe()
    {
        return $this->belongsTo(Groupe::class);
    }

   
}
