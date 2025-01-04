<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\QueryException;

class Client extends Model
{

    protected $table = "clients";

    public static function getClientByClientID($iClientId)
    {
        try {
            
            return self::where('client_id', $iClientId)->first();
        } catch (QueryException $e) {
            // Handle database query exception
            throw new \Exception("Failed to update folder: " . $e->getMessage());
        }
    }
}