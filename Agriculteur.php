<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agriculteur extends Model
{
    protected $table = 'agriculteurs inscription'; // Specify the correct table name
    protected $fillable=['Cin','Nom','Prènom','MotDePasse','Email','NumTel'];
    use HasFactory;
}
?>
