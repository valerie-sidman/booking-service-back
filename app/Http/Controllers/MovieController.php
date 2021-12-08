<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        return Movie::all();
    }

    public function store(Request $request)
    {
        $movies = $request->movies;
        return Movie::insert($movies);
    }

    public function getById($id)
    {
        return Movie::find($id);
    }

    public function update($id, Request $request)
    {
        $movieForUpdate = Movie::find($id);
        $movieForUpdate->update($request->all());
        return $movieForUpdate;
    }

    public function destroy($id)
    {
        return Movie::destroy($id);
    }
}
