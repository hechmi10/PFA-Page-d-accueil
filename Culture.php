<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Stock;
use App\Models\PlanificationRecolte; // Importez le modèle PlanificationRecolte

class Culture extends Model
{
    // Définir le nom de la table
    protected $table = 'cultures'; // Assurez-vous de correspondre exactement au nom de votre table dans MySQL

    protected $fillable = [
        'nom_culture', 'date_plantation', 'type_sol', 'quantite', 'description'
    ];

    // Relation avec le modèle Stock
    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

    // Relation avec le modèle PlanificationRecolte
    public function planificationsRecolte()
    {
        return $this->hasMany(PlanificationRecolte::class);
    }
}
