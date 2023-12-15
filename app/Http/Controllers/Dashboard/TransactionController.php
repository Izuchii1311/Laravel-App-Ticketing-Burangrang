<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Ticket;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.transaction.index', [
            'transactions' => Transaction::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Ticket $ticket)
    {
        $currentTime = now()->format('H:i:s');

        $tickets = $ticket->get()->map(function ($ticket) use ($currentTime) {
            $ticket->isClosed = $currentTime > $ticket->end_time;
            return $ticket;
        });
    
        return view('dashboard.transaction.create', compact('tickets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'name_cashier' => 'required',
            'amount' => 'required|numeric',
            'cus_name' => 'required',
            'description' => 'required',
            'transaction_date' => 'required',
        ]);

        $selectedTicketIds = $request->input('selectedTickets', []);
        $selectedTickets = Ticket::find($selectedTicketIds);

        $ticketData = [];
        foreach ($selectedTickets as $ticket) {
            $ticketData[] = [
                'ticket_id' => $ticket->id,
                'cd_ticket' => $ticket->cd_ticket,
                'name_ticket' => $ticket->name_ticket,
                'price' => $ticket->price,
            ];
        }

        $ticket = reset($ticketData);

        $validatedData['ticket_id'] = $ticket['ticket_id'];
        $validatedData['cd_ticket'] = $ticket['cd_ticket'];
        $validatedData['name_ticket'] = $ticket['name_ticket'];
        $validatedData['price'] = $ticket['price'];
        $validatedData['total'] = $ticket['price'] * $request->amount;

        $lastCdTransaction = Transaction::latest('created_at')->value('cd_transaction');
        $lastCdTransactionNumber = substr($lastCdTransaction, -3);

        $newCdTransactionNumber = str_pad((int)$lastCdTransactionNumber + 1, 5, '0', STR_PAD_LEFT);
        $validatedData['cd_transaction'] = 'KT-' . $newCdTransactionNumber;

        Transaction::create($validatedData);

        return redirect(route('transaction.index'))->with('success', 'Transaksi berhasil dilakukan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        Transaction::destroy($transaction->id);
        return redirect(route('transaction.index'))->with('success', "Berhasil menghapus data tiket.");
    }
}
