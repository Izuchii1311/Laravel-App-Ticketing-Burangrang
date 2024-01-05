<?php

namespace App\Http\Controllers\Dashboard;

use Exception;
use App\Models\Ticket;
use Barryvdh\DomPDF\PDF;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Showing View Index Transaction
        return view('dashboard.cashier.transaction.index', [
            'transactions' => Transaction::latest()->filter(request(['search']))->paginate(25)->withQueryString(),
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Ticket $ticket)
    {
        // Get All Data Ticket
        $checkTicket = Ticket::all();

        // Check Ticket Status if all status closed
        $allClosed = $checkTicket->every(function ($item) {
            return $item->status === 'closed';
        });

        // Check Ticket if showing item > 0, return to create
        if($checkTicket->count() > 0) {
            # Showing View Create Transaction
            return view('dashboard.cashier.transaction.create', [
                "tickets" => $checkTicket,
                "allClosed" => $allClosed
            ]);
        } else {
            return redirect(route('ticket.index'))
                ->with('warning', "Mohon untuk membuat tiket terlebih dahulu. 🙏");
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate Data
        $validatedData = $request->validate([
            'user_id' => 'required',
            'name_cashier' => 'required',
            'amount' => 'required|numeric',
            'cus_name' => 'required',
            'description' => 'required',
        ]);
        // Get Request Input Checkbox
        $selectedTicketId = $request->input('selectedTicket', []);
        // Check Ticket in Model
        $selectedTicket = Ticket::find($selectedTicketId);

        // Get Data Ticket from Selected Ticket
        $ticketData = [];
        foreach ($selectedTicket as $ticket) {
            $ticketData[] = [
                'ticket_id' => $ticket->id,
                'cd_ticket' => $ticket->cd_ticket,
                'name_ticket' => $ticket->name_ticket,
                'price' => $ticket->price,
            ];
        }

        // reset to change data in arrray [{...}] to be object {...}
        $ticket = reset($ticketData);
        $validatedData['ticket_id'] = $ticket['ticket_id'];
        $validatedData['cd_ticket'] = $ticket['cd_ticket'];
        $validatedData['name_ticket'] = $ticket['name_ticket'];
        $validatedData['price'] = $ticket['price'];
        $validatedData['total'] = $ticket['price'] * $request->amount;

        // Create New Cd_Transaction with get latest cd_transaction
        $lastCdTransaction = Transaction::withTrashed()
            ->latest('created_at')
            ->value('cd_transaction');
        // Get 3 last character string
        $lastCdTransactionNumber = substr($lastCdTransaction, -3);
        // Adds 1 to the most recent cd transaction value and makes it 5 digits long with a leading '0'
        $newCdTransactionNumber = str_pad((int)$lastCdTransactionNumber + 1, 5, '0', STR_PAD_LEFT);
        $validatedData['cd_transaction'] = 'KT-' . $newCdTransactionNumber;

        // Transaction Date with Custom Format
        $validatedData['transaction_date'] = now()->format('Y-m-d H:i:s');

        // Try Catch
        try {
            # Create New Data
            Transaction::create($validatedData);
            # Redirect to Route Index Ticket with message
            return redirect(route('transaction.index'))
                ->with('success', 'Transaksi berhasil dilakukan. 🌟');
        } catch (Exception $e) {
            # Get Error Message to laravel.log
            Log::error('Error during transaction creation: ' . $e->getMessage());
            # Handle the exception, log it, or redirect with an error message
            return back()
                ->with('error', 'Terjadi kesalahan. Mohon coba lagi.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        // Showing View Show Data Transaction
        return view('dashboard.cashier.transaction.show', compact('transaction'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        // Showing View Edit Data Transaction
        return view('dashboard.cashier.transaction.edit', [
            "transaction" => $transaction,
            "tickets" => Ticket::get()
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        // Validate Data
        $validatedData = $request->validate([
            'user_id' => 'required',
            'name_cashier' => 'required',
            'amount' => 'required|numeric',
            'cus_name' => 'required',
            'description' => 'required',
        ]);

        // Check if any new input has been selected
        if ($request->input('selectedTicket')) {
            // Get Request Input Checkbox
            $selectedTicketId = $request->input('selectedTicket', []);
            // Check Ticket in Model
            $selectedTicket = Ticket::find($selectedTicketId);

            // Get Data Ticket from Selected Ticket
            $ticketData = [];
            foreach ($selectedTicket as $ticket) {
                $ticketData[] = [
                    'ticket_id' => $ticket->id,
                    'cd_ticket' => $ticket->cd_ticket,
                    'name_ticket' => $ticket->name_ticket,
                    'price' => $ticket->price,
                ];
            }

            // reset to change data in arrray [{...}] to be object {...}
            $ticket = reset($ticketData);
            $validatedData['ticket_id'] = $ticket['ticket_id'];
            $validatedData['cd_ticket'] = $ticket['cd_ticket'];
            $validatedData['name_ticket'] = $ticket['name_ticket'];
            $validatedData['price'] = $ticket['price'];
            $validatedData['total'] = $ticket['price'] * $request->amount;
            // If no input is selected, it is filled in again with the previous data
        } else {
            $validatedData['ticket_id'] = $request->ticket_id;
            $validatedData['cd_ticket'] = $request->cd_ticket;
            $validatedData['name_ticket'] = $request->name_ticket;
            $validatedData['price'] = $request->price;
            $validatedData['total'] = $request['price'] * $request->amount;
        }

        // Try Catch
        try {
            # Update Data
            Transaction::where('id', $transaction->id)->update($validatedData);
            # Redirect to Route Index Ticket with message
            return redirect(route('transaction.index'))
                ->with('success', "Berhasil mengedit data transaksi. 👍");
        } catch (Exception $e) {
            # Get Error Message to laravel.log
            Log::error('Error during transaction creation: ' . $e->getMessage());
            # Handle the exception, log it, or redirect with an error message
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        // Try Catch
        try {
            # Delete Data
            Transaction::destroy($transaction->id);
            # Redirect to Route Index Ticket with message
            return redirect(route('transaction.index'))
                ->with('success', "Berhasil menghapus data transaksi. 🗑️");
        } catch (Exception $e) {
            # Get Error Message to laravel.log
            Log::error('Error during transaction creation: ' . $e->getMessage());
            return back()
                ->with('error', 'Terjadi kesalahan. Mohon coba lagi.');
        }
    }


    public function report()
    {
        // Showing View Report Data Transaction
        return view('dashboard.cashier.transaction.laporan', [
            'transactions' => Transaction::withTrashed()->get()
        ]);
    }


    public function report_pdf() {
        // Download Report Data Transaction
        $transactions = Transaction::withTrashed()->get();
        $pdf = app('dompdf.wrapper')->loadView('dashboard.cashier.transaction.laporanPdf', ['transactions' => $transactions]);
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('laporan-transaksi.pdf');
    }
}
