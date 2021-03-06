<?php

namespace App\Http\Controllers;

use App\ApiHandlers\CallHandler;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Object_;

class HomeController extends Controller
{
    private $callHandler;

    public function __construct(CallHandler $callHandler)
    {
        $this->callHandler = $callHandler;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $events = $this->callHandler->unauthorizedGetMethodHandler('/events/highlighted');
        $sports = $this->callHandler->unauthorizedGetMethodHandler('/sports');
        return view('homepage', [
            'sports' => $sports,
            'events' => $events
        ]);
    }

    public function test(Request $request)
    {
        $token = $request->session()->get('api_token');
        return view('test', [
            'apiKey' => $token
        ]);
    }
}
