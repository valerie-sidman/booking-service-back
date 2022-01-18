<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index()
    {
        return Session::with('hall', 'movie')->get();
    }

    public function store(Request $request)
    {
        return Session::create($request->all());
    }

    public function getById($id)
    {
        return Session::find($id);
    }

    public function getByMovieId($id)
    {
        return Session::where('movie_id', '=', $id)->get();
    }

    public function update($id, Request $request)
    {
        $sessionForUpdate = Session::find($id);
        $sessionForUpdate->update($request->all());
        return $sessionForUpdate;
    }

    public function destroy($id)
    {
        return Session::destroy($id);
    }
}
