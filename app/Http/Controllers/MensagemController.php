<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mensagem;

class MensagemController extends Controller
{
    public function index()
    {
        $lmsg = Mensagem::all(); 
        return view('mensagem.list', ['lmsg' => $lmsg]);
    }
}
