<?php
//ESTA FUNCIONANDO
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Twilio\Rest\Client;
use Dotenv\Dotenv;

class ChatSendController extends Controller
{
    public function index()
    {
        // $dotenv = Dotenv::create('');
        // $dotenv->load();

        $sid    = "ACa1ea4717b05f9a8d8d2ce10348d6a068";
        $token  = "bac72b9ede1bdf08c580430aa838ca96";
        $twilio = new Client($sid, $token);

        $codes = ["Receita", "Despesa", "Objetivo"];

        $message = $twilio->messages
            ->create(
                "whatsapp:+5522999989597", // to
                [
                    "from" => "whatsapp:+14155238886",
                    "body" => "Eu sou fodao configurei essa porra ".$codes[rand(0,2)]
                ]
            );

        print($message->sid);
    }
}
