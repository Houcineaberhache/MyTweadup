<?php
namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticable;

class Admin extends Authenticable
{
    use HasFactory, SoftDeletes ,Notifiable;
    protected $table = 'admins';
    protected $fillable = ['nom','prenom','email','password','image','CIN','adresse'];
    protected $dates =['created_at'];

}