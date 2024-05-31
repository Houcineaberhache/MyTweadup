<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Depense extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'depenses';
    protected $fillable = ['nature_depense','montant_depense','categorie_depense'];
    protected $dates =['created_at'];
}
