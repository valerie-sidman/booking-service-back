<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    public function index()
    {
        return Seat::all();
    }

    public function store(Request $request)
    {
        $seats = $request->seats;
        return Seat::insert($seats);
    }

    public function getById($id)
    {
        return Seat::find($id);
    }

    public function getByHallId($id)
    {
        return Seat::where('hall_id', '=', $id)->get();
    }

    public function changeByHallId($id, Request $request)
    {
        Seat::where('hall_id', '=', $id)->delete();

        $seats = $request->seats;
        return Seat::insert($seats);
    }

    public function getByTicketId($id)
    {
        return Seat::where('ticket_id', '=', $id)->get();
    }

    public function update($id, Request $request)
    {
        $seatForUpdate = Seat::find($id);
        $seatForUpdate->update($request->all());
        return $seatForUpdate;
    }

    public function destroy($id)
    {
        return Seat::destroy($id);
    }
}
