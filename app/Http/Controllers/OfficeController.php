<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Office;
use Illuminate\Support\Facades\Redis; 


class OfficeController extends Controller
{
    
    public function index()
    {
        return Office::all();
    }
 
    public function show(Office $office)
    {
    // redis has office.all key exists 
    // if office found then it will return all office without touching the database
    if ($office = Redis::get('office.all')) {
        return json_decode($office);
    }
    // store into redis
    Redis::set('office.all', $office);
    // return all posts
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

