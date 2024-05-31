<?php
namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticable;

class Client extends Authenticable
{
    use HasFactory, SoftDeletes ,Notifiable;
    protected $table = 'clients';
    protected $fillable = ['nom','prenom','email','password','CIN','adresse','formation_id','groupe_id','prix_total','type_paiement','montant_paye'];
    protected $dates =['created_at'];
    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }
    public function groupe()
    {
        return $this->belongsTo(Groupe::class);
    }
    public function paiements(){
        return $this->hasMany(Paiement::class);
    }
   
}



