<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TicketController extends Controller
{
    public function index()
    {
        return Ticket::all();
    }

    public function store(Request $request)
    {
        return Ticket::create($request->all());
    }

    public function getById($id)
    {
        return Ticket::find($id);
    }

    public function update($id, Request $request)
    {
        $ticketForUpdate = Ticket::find($id);
        $ticketForUpdate->update($request->all());
        return $ticketForUpdate;
    }

    public function qrGenerate(Request $request)
    {
        $seat = $request->query('seat');
        $row = $request->query('row');
        $sessionStart = $request->query('sessionStart');
        return QrCode::generate('Seat: ' . $seat . ' Row: ' . $row . ' Starts at: ' . $sessionStart);
    }

    public function destroy($id)
    {
        return Ticket::destroy($id);
    }
}
