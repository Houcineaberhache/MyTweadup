<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;
    protected $table = 'paiements';
    protected $fillable = ['etudiant_id','formation_id','somme','reste_paiement'];
    protected $dates =['created_at'];
    public function etudint()
    {
        return $this->belongsTo(Etudiant::class);
    }
    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }

   
}
