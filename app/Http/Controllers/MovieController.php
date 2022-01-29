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

    public function getWithHalls()
    {
        $movies = Movie::with('hall')->get();
        collect($movies)->map(function ($movie) {
            collect($movie->hall) ->map(function ($hall) use ($movie) {
                $hall->session = $movie->id;
            });
        });
        return $movies;
    }

    public function store(Request $request)
    {
        return Movie::create($request->all());
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
