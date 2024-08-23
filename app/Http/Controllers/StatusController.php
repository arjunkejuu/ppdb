<?php

namespace App\Http\Controllers;

use App\Models\Pdb;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function status(Request $request)
    {
        $query = $request->input('query');
        $results = collect();
        
        if ($query) {
            $results = Pdb::where('nama_pdb','LIKE',"%{$query}%")->paginate(5);
        }
        
        return view('pdb.status', compact('results'));
    }
}
