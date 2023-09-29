<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::paginate(15)->withQueryString();
        return view('tickets.index', compact('tickets'));
    }

    public function view(Request $request)
    {
        $ticket = Ticket::find($request->id);
        return view('tickets.view', compact('ticket'));
    }
}
