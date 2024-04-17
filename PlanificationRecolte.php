<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Culture;
use App\Models\Stock;
class PlanificationRecolte extends Model
{
    protected $table4='planification_recoltes';
    protected $fillable=['nom','date_recolte_prevue','main_oeuvre','equipement','culture_id'];
    use HasFactory;
    public function culture()
    {
        return $this->belongsTo(Culture::class);
    }
    public function stock()
    {
        return $this->hasMany(Stock::class);
    }
}
