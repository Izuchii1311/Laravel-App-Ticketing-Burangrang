<?php

namespace App\Http\Controllers\Main;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LandingPageController extends Controller
{
    // Landing Page
    public function storePesan(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'title' => 'required|string',
            'message' => 'required|string',
        ]);

        Message::create($validatedData);

        return redirect('/#contact')->with("success", "Pesan anda telah kami terima, terimakasih!🖐");
    }
}
