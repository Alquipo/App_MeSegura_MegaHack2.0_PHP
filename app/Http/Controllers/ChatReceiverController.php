<?php
//ESTA FUNCIONANDO
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Twiml\MessagingResponse;
use Twilio\Rest\Client;

use Illuminate\Support\Facades\Log;


class ChatReceiverController extends Controller
{
    public function index()
    {
              
        $response = new MessagingResponse();
        $guess = $_REQUEST['Body'];
        $pick = rand(1, 5);

        if (!in_array($guess, [1, 2, 3, 4, 5])) {
            $response->message("Hiya! I'm thinking of a number between 1 and 5 - try to guess it!");
        } elseif ($guess == $pick) {
            $response->message("Yes! You guessed it!");
        } else {
            $response->message("Nope, it was actually $pick - Pick a new number to play again!");
        }

        print $response;
                
         
    }

}
