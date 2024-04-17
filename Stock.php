<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PlanificationRecolte;
use App\Models\Culture;
 class Stock extends Model
{
    // Déclaration des champs remplissables
    protected $table = 'stocks';
    protected $fillable = [
        'product_name', 'quantity', 'purchase_date', 'supplier'
    ];
    use HasFactory;
    // Relation avec le modèle Culture
    public function culture()
    {
        return $this->belongsTo(Culture::class);
    }
    public function planificationsRecolte()
    {
        return $this->hasMany(PlanificationRecolte::class);
    }
}


