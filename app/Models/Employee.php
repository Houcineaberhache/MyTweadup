<?php
namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticable;

class Employee extends Authenticable
{
    use HasFactory, SoftDeletes ,Notifiable;
    protected $table = 'employees';
    protected $fillable = ['nom', 'prenom', 'email', 'profession', 'CIN', 'adresse', 'password','deleted_at'];
    protected $dates =['created_at'];
}
