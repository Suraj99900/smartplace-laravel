<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class UserSymptoms extends Model
{
    protected $table = 'user_symptoms';
    protected $fillable = ['name'];
    public $timestamps = true;

    public function fetchSymptomsByName($name = null)
    {
        if ($name) {
            // Fetch symptoms that match the provided name
            return $this->where('name', 'like', '%' . $name . '%')->get();
        } else {
            // Fetch all symptoms if no name is provided
            return $this->all();
        }
    }
}