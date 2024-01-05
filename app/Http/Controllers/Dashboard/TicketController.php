<?php

namespace App\Http\Controllers\Dashboard;

use Exception;
use App\Models\Ticket;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Showing View Index Ticket
        return view('dashboard.cashier.ticket.index', [
            'tickets' => Ticket::latest()->filter(request(['search']))->paginate(25)->withQueryString(),
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Showing View Create New Ticket
        return view('dashboard.cashier.ticket.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate Data
        $validatedData = $request->validate([
            'user_id' => 'required',
            'cd_ticket' => 'required|unique:tickets',
            'name_ticket' => 'required|max:255',
            'price' => 'required|numeric',
            'start_time' => 'required', // default time 06:00
            'end_time' => 'required',   // default time 20:00
            'description' => 'required'
        ]);
        $validatedData['status'] = 'open';

        // Try Catch
        try {
            # Create New Data
            Ticket::create($validatedData);
            # Redirect to Route Index Ticket with message
            return redirect(route('ticket.index'))
                ->with('success', "Berhasil membuat data tiket baru. 🌟");
        } catch (\Exception $e) {
            # Get Error Message to laravel.log
            Log::error('Transaction Store Error : ' . $e->getMessage());
            # Handle the exception, log it, or redirect with an error message
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan, Silahkan coba lagi nanti.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        // Showing View Show Data Ticket
        return view('dashboard.cashier.ticket.show', [
            'ticket' => $ticket
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        // Showing View Edit Data Ticket
        return view('dashboard.cashier.ticket.edit', [
            'ticket' => $ticket
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        // Validate Data
        $validatedData = $request->validate([
            'name_ticket' => 'required|max:255',
            'price' => 'required|numeric',
            'start_time' => 'required', // default time 06:00
            'end_time' => 'required',   // default time 20:00
            'description' => 'required',
            'status' => 'required|in:open,closed',
        ]);

        // Check if cd_ticket is being updated
        if ($request->has('cd_ticket')) {
            # Validate uniqueness only if cd_ticket is different
            $request->validate([
                'cd_ticket' => 'required|unique:tickets,cd_ticket,' . $ticket->id,
            ]);
            $validatedData['cd_ticket'] = $request->input('cd_ticket');
        } else {
            # If cd_ticket is not being updated, use the existing value
            $validatedData['cd_ticket'] = $ticket->cd_ticket;
        }

        // Try Catch
        try {
            # Update Data
            Ticket::where('cd_ticket', $ticket->cd_ticket)->update($validatedData);
            # Redirect to Route Index Ticket with message
            return redirect(route('ticket.index'))
                ->with('success', "Berhasil mengedit data tiket. 👍");
        } catch (Exception $e) {
            # Get Error Message to laravel.log
            Log::error('Transaction Update Error: ' . $e->getMessage());
            # Handle the exception, log it, or redirect with an error message
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan, Silahkan coba lagi nanti.');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket) {
        // Try Catch
        try {
            # Delete Transaction if Ticket Deleted
            Transaction::where('cd_ticket', $ticket->cd_ticket)->delete();
            # Delete Ticket
            $ticket->delete();
            # Redirect to Route Index with message
            return redirect()->route('ticket.index')
                ->with('success', 'Berhasil menghapus data tiket. 🗑️');
        } catch (\Exception $e) {
            # Get Error Message to laravel.log
            Log::error('Transaction Delete Error : ' . $e->getMessage());
            # Handle the exception, log it, or redirect with an error message
            return redirect()->route('ticket.index')
                ->with('error', 'Terjadi kesalahan, Silahkan coba lagi nanti.');
        }
    }
}
