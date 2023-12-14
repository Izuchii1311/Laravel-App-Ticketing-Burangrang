<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.ticket.index', [
            'tickets' => Ticket::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.ticket.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cd_ticket' => 'required|unique:tickets',
            'name_ticket' => 'required|max:255',
            'price' => 'required|numeric',
            'start_time' => 'required',                 // default 06:00
            'end_time' => 'required',                   // default 20:00
            'description' => 'required'
        ]);

        Ticket::create($validatedData);

        return redirect(route('ticket.index'))->with('success', "Berhasil membuat data tiket baru.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        return view('dashboard.ticket.show', [
            'ticket' => $ticket
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        return view('dashboard.ticket.edit', [
            'ticket' => $ticket
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        $validatedData = $request->validate([
            'cd_ticket' => 'required',
            'name_ticket' => 'required|max:255',
            'price' => 'required|numeric',
            'start_time' => 'required',                 // default 06:00
            'end_time' => 'required',                   // default 20:00
            'description' => 'required'
        ]);

        Ticket::where('id', $ticket->id)->update($validatedData);

        return redirect(route('ticket.index'))->with('success', "Berhasil membuat data tiket baru.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket, Request $request)
    {
        Ticket::destroy($ticket->id);
        return redirect(route('ticket.index'))->with('success', "Berhasil menghapus data tiket.");
    }
}
