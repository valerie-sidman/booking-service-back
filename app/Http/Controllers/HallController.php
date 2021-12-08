<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use Illuminate\Http\Request;

class HallController extends Controller
{
    public function index()
    {
        return Hall::all();
    }

    public function store(Request $request)
    {
        return Hall::create($request->all());
    }

    public function getById($id)
    {
        return Hall::find($id);
    }

    public function getWithSession()
    {
        return Hall::with('session.movie')->get();
    }

    public function update($id, Request $request)
    {
        $hallForUpdate = Hall::find($id);
        $hallForUpdate->update($request->all());
        return $hallForUpdate;
    }

    public function destroy($id)
    {
        return Hall::destroy($id);
    }
}
