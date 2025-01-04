<?php
namespace App\Http\Controllers;

use App\Models\UserSymptoms;
use Illuminate\Http\Request;

class SymptomController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->input('name', '');
        // Retrieve all symptoms
        $symptoms = (new UserSymptoms)->fetchSymptomsByName($name);

        return response()->json([
            'status' => 'success',
            'status_code'=>200,
            'data' => $symptoms,
        ]);
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Create a new symptom record
        $symptom = UserSymptoms::create([
            'name' => $request->name,
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $symptom,
        ]);
    }
}
