<?php

namespace App\Http\Controllers\AiChat;

use App\Http\Controllers\Controller;
use Gemini\Laravel\Facades\Gemini;
use Illuminate\Http\Request;

class AiChatController extends Controller
{
    //
    public function index()
    {
        return view('aichat.index');
    }

    public function generateResponse(Request $request)
    {
        $userInput = $request->input('user_input');

        $result = Gemini::geminiPro()->generateContent($userInput);

        $response = $result->text();

        // Return the response as a JSON object
        return response()->json(['response' => $response]);
    }
}
