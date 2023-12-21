<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Ticket;
use Barryvdh\DomPDF\PDF;
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
            'transactions' => Transaction::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Ticket $ticket)
    {
        $checkTicket = Ticket::all();

        // Check Status Ticket
        $allClosed = $checkTicket->every(function ($item) {
            return $item->status === 'closed';
        });

        if($checkTicket->count() > 0) {
            return view('dashboard.transaction.create', [
                "tickets" => $checkTicket,
                "allClosed" => $allClosed
            ]);
        } else {
            return redirect(route('ticket.index'))->with('warning', "Mohon untuk membuat tiket terlebih dahulu. 🙏");
        }
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

        $lastCdTransaction = Transaction::withTrashed() ->latest('created_at') ->value('cd_transaction');
        $lastCdTransactionNumber = substr($lastCdTransaction, -3);

        $newCdTransactionNumber = str_pad((int)$lastCdTransactionNumber + 1, 5, '0', STR_PAD_LEFT);
        $validatedData['cd_transaction'] = 'KT-' . $newCdTransactionNumber;

        $validatedData['transaction_date'] = now()->format('Y-m-d H:i:s');

        Transaction::create($validatedData);

        return redirect(route('transaction.index'))->with('success', 'Transaksi berhasil dilakukan. 🌟');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        return view('dashboard.transaction.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        return view('dashboard.transaction.edit', [
            "transaction" => $transaction,
            "tickets" => Ticket::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'name_cashier' => 'required',
            'amount' => 'required|numeric',
            'cus_name' => 'required',
            'description' => 'required',
        ]);

        if ($request->input('selectedTickets')) {
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
        } else {
            $validatedData['ticket_id'] = $request->ticket_id;
            $validatedData['cd_ticket'] = $request->cd_ticket;
            $validatedData['name_ticket'] = $request->name_ticket;
            $validatedData['price'] = $request->price;
            $validatedData['total'] = $request['price'] * $request->amount;
        }

        Transaction::where('id', $transaction->id)->update($validatedData);

        return redirect(route('transaction.index'))->with('success', "Berhasil mengedit data transaksi. 👍");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        Transaction::destroy($transaction->id);
        return redirect(route('transaction.index'))->with('success', "Berhasil menghapus data transaksi. 🗑️");
    }

    public function report()
    {
        return view('dashboard.transaction.laporan', [
            'transactions' => Transaction::withTrashed()->get()
        ]);
    }

    public function report_pdf() {
        $transactions = Transaction::withTrashed()->get();
        $pdf = app('dompdf.wrapper')->loadView('dashboard.transaction.laporanPdf', ['transactions' => $transactions]);
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('laporan-transaksi.pdf');
    }
}
