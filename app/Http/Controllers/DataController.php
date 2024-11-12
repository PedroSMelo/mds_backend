<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DataController extends Controller
{
    public function saveData(Request $request)
    {
        $data = $request->all();

        $filePath = storage_path('app/data.json');
        
        if (File::exists($filePath)) {
            $existingData = json_decode(File::get($filePath), true);
        } else {
            $existingData = [];
        }

        $existingData[] = $data;

        File::put($filePath, json_encode($existingData, JSON_PRETTY_PRINT));

        return response()->json(['message' => 'Dados salvos com sucesso!'], 200);
    }
}
