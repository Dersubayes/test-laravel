<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Office;
use Illuminate\Support\Facades\Redis; 


class OfficeController extends Controller
{
    
    public function index()
    {
        if ($office = Redis::get('offices.all')) {
            return json_decode($office);
        }
        // store into redis
        Redis::set('offices.all', Office::all());
        // return all posts
        return Office::all();
    }
 
    public function show(Office $office)
    {
    
    return $office;
        
    }

    public function store(Request $request)
    {
        $office = Office::create($request->all());

        return response()->json($office, 201);
    }

    public function update(Request $request, Office $office)
    {
        $office->update($request->all());
        return response()->json($office, 200);

    }

    public function delete(Office $office)
    {
        $office->delete();
        return response()->json(null, 204);
    }
}

