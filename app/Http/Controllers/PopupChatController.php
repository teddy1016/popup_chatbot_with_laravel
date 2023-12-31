<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PopupChatController extends Controller
{
    public function __construct()
    {
        $this->httpClient = new Client([
            'base_uri' => 'https://api.openai.com/v1/',
            'headers' => [
                'Authorization' => 'Bearer ' . env('CHATGPT_API_KEY'),
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    public function index() 
    {
        return view('welcome');
    }

    public function send(Request $request) {
        $question = $_POST['question'];

        $response = $this->httpClient->post('chat/completions', [
            'json' => [
                'model' => 'gpt-3.5-turbo-1106',
                'messages' => [
                    ['role' => 'system', 'content' => 'You are'],
                    ['role' => 'user', 'content' => $question],
                ],
            ],
        ]);

        $answer = json_decode($response->getBody(), true)['choices'][0]['message']['content'];
        return json_encode($answer);
    }
}
