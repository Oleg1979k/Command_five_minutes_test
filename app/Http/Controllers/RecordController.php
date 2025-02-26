<?php

namespace App\Http\Controllers;

use App\Models\Record;

class RecordController extends Controller
{
    public function index()
    {
        $records = Record::all();
        return response()->json($records);
    }
}

