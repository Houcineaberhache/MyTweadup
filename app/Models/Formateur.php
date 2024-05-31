<?php
namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticable;

class Formateur extends Authenticable
{
    use HasFactory, SoftDeletes ,Notifiable;
    protected $table = 'formateurs';
    protected $fillable = ['nom','prenom','email','password','CIN','formation_id','adresse','deleted_at'];
    protected $dates =['created_at'];
    public function formations()
    {
        return $this->hasMany(Formation::class,'formation_id');
    }
    public function seances()
    {
        return $this->hasMany(Seance::class);
    }
    public function groupes()
    {
        return $this->hasMany(Groupe::class);
    }
}
