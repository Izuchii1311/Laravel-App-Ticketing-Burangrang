<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Ticket;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
            'user_id' => 'required',
            'cd_ticket' => 'required|unique:tickets',
            'name_ticket' => 'required|max:255',
            'price' => 'required|numeric',
            'start_time' => 'required',                 // default 06:00
            'end_time' => 'required',                   // default 20:00
            'description' => 'required'
        ]);

        $validatedData['status'] = 'open';
        Ticket::create($validatedData);

        return redirect(route('ticket.index'))->with('success', "Berhasil membuat data tiket baru. 🌟");
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
            'cd_ticket' => 'required|unique:tickets,cd_ticket,' . $ticket->id,
            'name_ticket' => 'required|max:255',
            'price' => 'required|numeric',
            'start_time' => 'required',                 // default 06:00
            'end_time' => 'required',                   // default 20:00
            'description' => 'required',
            'status' => 'required|in:open,closed',
        ]);

        Ticket::where('id', $ticket->id)->update($validatedData);

        return redirect(route('ticket.index'))->with('success', "Berhasil mengedit data tiket. 👍");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket, Request $request) {
        // Hapus tiket
        $ticket->delete();

        // Hapus transaksi terkait
        Transaction::where('ticket_id', $ticket->id)->delete();

        return redirect()->route('ticket.index')->with('success', 'Berhasil menghapus data tiket. 🗑️');
    }
}
