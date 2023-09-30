<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\User;
use Validator;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::paginate(10);
        return view('tickets.index', compact('tickets'));
    }

    public function view(Request $request)
    {
        $ticket = Ticket::find($request->id);
        return view('tickets.view', compact('ticket'));
    }

    public function create(Request $request)
    {
        $users = User::all();
        return view('tickets.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
        ]);
  
        if ($validator->fails()) {
            return response()->json([
                        'error' => $validator->errors()->all()
                    ]);
        }
       
        Ticket::create([
            'title' => $request->title,
            'description' => $request->description,
            'assigned_user_id' => $request->assigned_user_id,
        ]);

        $request->session()->flash('success', __('Ticket created successfully.'));
        return response()->json(['success' => 'Ticket created successfully.']);
    }

    public function status(Request $request)
    {
        $ticket = Ticket::find($request->id);
        $ticket->status = $request->status;
        $ticket->save();

        $request->session()->flash('success', __('Ticket status changed successfully.'));
        return response()->json(['success' => 'Ticket status changed successfully.']);
    }
}
