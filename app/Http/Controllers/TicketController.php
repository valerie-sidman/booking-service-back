<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use App\Models\Session;
use App\Models\Ticket;
use Illuminate\Http\Request;
use QRcode;

require_once (__DIR__ . '/../../phpqrcode/qrlib.php');

class TicketController extends Controller
{
    public function index()
    {
        return Ticket::all();
    }

    /*
     {
        sessionId: "", - id сессии
        date: "", - дата сеанса
        seats: [1, 4, 5] - массив с id мест
     }
     */

    public function store(Request $request)
    {
        $ticket = Ticket::create(['session_id' => $request->sessionId, 'date' => $request->date]);
        $updatedSeats = array_map(function ($seatId) use ($ticket) {
            $seat = Seat::where([['id', '=', $seatId], ['ticket_id', '=', null]])->first();
            $seat->ticket_id = $ticket->id;
            $seat->save();
            return $seat;
        }, $request->seats);
        foreach ($request->seats as $seatId) {
            Seat::where([['id', '=', $seatId], ['ticket_id', 'is', null]])->update(['ticket_id' => $ticket->id]);
        }
        $session = Session::with('movie', 'hall')->where('id', '=', $request->sessionId)->first();
        $seatAndRowsNumbers = array_map(function ($seat) {
            return 'Row: ' . $seat->row . '; Number: ' . $seat->number;
        }, $updatedSeats);
        $stringToQrCode = 'Movie: ' . $session->movie->name .
            ' | Seats: ' . implode(', ', $seatAndRowsNumbers) .
            ' | Hall: ' . $session->hall->name .
            ' | Date: ' . $request->date .
            ' | Starts at: ' . $session->hours . ':' . $session->minutes;
        $path = __DIR__ . '/../../../qr.png';
        QRcode::png($stringToQrCode, $path);
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        unlink($path);
        return ['qrcode'=>'data:image/' . $type . ';base64,' . base64_encode($data)];
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

    public function destroy($id)
    {
        return Ticket::destroy($id);
    }
}
