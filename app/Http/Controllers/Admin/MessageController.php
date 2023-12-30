<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Message;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Cviebrock\EloquentSluggable\Services\SlugService;

class MessageController extends Controller
{
    public function storeMessage(Request $request) {
        // Validate Data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'title' => 'required|string',
            'message' => 'required|string',
        ]);

        $validatedData['slug'] = SlugService::createSlug(Message::class, 'slug', $request->title);

        // Try Catch
        try {
            # Create New Message
            Message::create($validatedData);
            # Redirect to Route #contact with message
            return redirect('/#contact')
                ->with("success", "Pesan anda telah kami terima, terimakasih!🖐");
        } catch (Exception $e) {
            # Get Error Message to laravel.log
            Log::error('Message Store Error: ' . $e->getMessage());
            # Handle the exception, log it, or redirect with an error message
            return redirect('/#contact')
                ->with('error', 'Terjadi kesalahan, Silahkan coba lagi nanti.');
        }
    }


    // ? Dashboard Admin Show Message
    public function showMessage() {
        return view('dashboard.admin.messages.show', [
            "messages" => Message::all()
        ]);
    }


    // ? Dashboard Detail Message
    public function detailMessage(Message $message, $slug) {
        // Try Catch
        try {
            # Find Message
            $message = Message::where('slug', $slug)->firstOrFail();
            # Return View
            return view('dashboard.admin.messages.detail', [
                'message' => $message
            ]);
        } catch (\Exception $e) {
            # Get Error Message to laravel.log
            Log::error('Detail Message Error: ' . $e->getMessage());
            # Handle the exception, log it, or redirect with an error message
            return redirect()->back()
            ->with('error', 'Terjadi kesalahan, Silahkan coba lagi nanti.');
        }
    }


    // ? Dashboard Delete Message
    public function deleteMessage($slug) {
        // Try Catch
        try {
            # Delete Message
            $getMessage = Message::where('slug', $slug);
            $getMessage->delete();
            # Redirect to Route Show with Message
            return redirect()->route('dashboard.message.show')
                ->with('success', 'Berhasil menghapus pesan pengguna. 🗑️');
        } catch (\Exception $e) {
            # Get Error Message to laravel.log
            Log::error('Delete Message Error: ' . $e->getMessage());
            # Handle the exception, log it, or redirect with an error message
            return redirect()->back()
            ->with('error', 'Terjadi kesalahan, Silahkan coba lagi nanti.');
        }
    }


    // ? Add to Menu
    public function addToMenu($slug) {
        // Try Catch
        try {
            # Find Message
            $message = Message::findOrFail($slug);
            # Update Message Recomend
            $message->update(['recomend' => true]);
            # Return Response
            return response()->json(['message' => 'Added to Menu successfully']);
        } catch (\Exception $e) {
            # Get Error Message to laravel.log
            Log::error('Add To Menu Message Error: ' . $e->getMessage());
            # Handle the exception, log it, or redirect with an error message
            return redirect()->back()
            ->with('error', 'Terjadi kesalahan, Silahkan coba lagi nanti.');
        }
    }

    //* Remove to Menu
    public function removeToMenu($slug) {
        // Try Catch
        try {
            # Find Message
            $message = Message::findOrFail($slug);
            # Update Message
            $message->update(['recomend' => null]);
            # Return Response
            return response()->json(['message' => 'Removed from Menu successfully']);
        } catch (\Exception $e) {
            # Get Error Message to laravel.log
            Log::error('Add To Menu Message Error: ' . $e->getMessage());
            # Handle the exception, log it, or redirect with an error message
            return redirect()->back()
            ->with('error', 'Terjadi kesalahan, Silahkan coba lagi nanti.');
        }
    }
}
