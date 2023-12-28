<?php

namespace App\Http\Controllers\Admin;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    //* Landing Page Store Message
    public function storeMessage(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'title' => 'required|string',
            'message' => 'required|string',
        ]);

        Message::create($validatedData);

        return redirect('/#contact')->with("success", "Pesan anda telah kami terima, terimakasih!🖐");
    }

    //* Dashboard Admin Show Message
    public function showMessage() {
        return view('dashboard.admin.messages.show', [
            "messages" => Message::all()
        ]);
    }

    //* Dashboard Detail Message
    public function detailMessage(Message $message, $id) {
        $message = Message::findOrFail($id);

        return view('dashboard.admin.messages.detail', [
            'message' => $message
        ]);
    }

    //* Dashboard Delete Message
    public function deleteMessage(Message $message, $id) {
        // return $id;
        Message::destroy($id);

        return redirect()->route('dashboard.message.show')->with('success', 'Berhasil menghapus pesan pengguna. 🗑️');
    }

    //* Add to Menu
    public function addToMenu($id) {
        $message = Message::findOrFail($id);
        $message->update(['recomend' => true]);

        return response()->json(['message' => 'Added to Menu successfully']);
    }

    //* Remove to Menu
    public function removeToMenu($id) {
        $message = Message::findOrFail($id);
        // $message->update(['recomend' => false]);
        $message->update(['recomend' => null]);

        return response()->json(['message' => 'Removed from Menu successfully']);
    }
}
