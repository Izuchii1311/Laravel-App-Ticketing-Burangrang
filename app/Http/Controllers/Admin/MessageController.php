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
    // Store Message User Guest
    public function storeMessage(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'title' => 'required|string',
            'message' => 'required|string',
        ]);
        $validatedData['slug'] = SlugService::createSlug(Message::class, 'slug', $request->title);

        try {
            Message::create($validatedData);
            return redirect('/#contact')
                ->with("success", "Pesan anda telah kami terima, terimakasih!🖐");
        } catch (Exception $e) {
            Log::error('Message Store Error: ' . $e->getMessage());
            return redirect('/#contact')
                ->with('error', 'Terjadi kesalahan, Silahkan coba lagi nanti.');
        }
    }


    // Dashboard Admin Showing All Message
    public function showMessage() {
        return view('dashboard.admin.messages.show', [
            // paginate(15, ['*'], 'messages') = membagi hasil kueri menjadi beberapa halaman.
            // ['*'] = mengambil semua dari tabel messages
            "messages" => Message::latest()->filter(request(['search']))->paginate(15, ['*'], 'messages')->withQueryString(),
            "recomends" => Message::where('recomend', 1)->orderBy('updated_at', 'desc')->get()
        ]);
    }


    // Dashboard Admin Detail Message
    public function detailMessage(Message $message, $slug) {
        try {
            $message = Message::where('slug', $slug)->firstOrFail();
            return view('dashboard.admin.messages.detail', [
                'message' => $message
            ]);
        } catch (\Exception $e) {
            Log::error('Detail Message Error: ' . $e->getMessage());
            return redirect(route('dashboard.message.show'))
                ->with('error', 'Terjadi kesalahan, Silahkan coba lagi nanti.');
        }
    }


    // Dashboard Admin Delete Message
    public function deleteMessage($slug) {
        try {
            $getMessage = Message::where('slug', $slug);
            $getMessage->delete();
            return redirect()->route('dashboard.message.show')
                ->with('success', 'Berhasil menghapus pesan pengguna. 🗑️');
        } catch (\Exception $e) {
            Log::error('Delete Message Error: ' . $e->getMessage());
            return redirect(route('dashboard.message.show'))
                ->with('error', 'Terjadi kesalahan, Silahkan coba lagi nanti.');
        }
    }


    // Dashboard Admin Add To Recomend Message
    public function addToMenu($slug) {
        try {
            $message = Message::findOrFail($slug);

            $dataRecomend = Message::where('recomend', 1)->count();
            $maxRecomend = 10;

            if ($dataRecomend < $maxRecomend) {
                $message->update(['recomend' => true]);
                return response()
                    ->json([
                        'success' => true,
                        'message' => 'Added to Menu successfully'
                    ]);
            } else {
                return response()
                    ->json([
                        'success' => false,
                        'error' => 'Batas pesan yang ingin ditampilkan sudah maksimum.'
                    ]);
            }
        } catch (\Exception $e) {
            Log::error('Add To Menu Message Error: ' . $e->getMessage());
            return redirect(route('dashboard.message.show'))
                ->with('error', 'Terjadi kesalahan, Silahkan coba lagi nanti.');
        }
    }

    // Dashboard Admin Remove To Recomend Message
    public function removeToMenu($slug) {
        try {
            $message = Message::findOrFail($slug);
            $message->update(['recomend' => null]);
            return response()->json([
                'success' => true,
                'message' => 'Added to Menu successfully'
            ]);
        } catch (\Exception $e) {
            Log::error('Add To Menu Message Error: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan, Silahkan coba lagi nanti.');
        }
    }
}
