<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agriculteur extends Model
{
    protected $table1 = 'agriculteurs inscription';
    protected $table2 = 'agriculteurs connexion';
    use HasFactory;
}
