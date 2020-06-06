<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class BoardController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show_board_3()
    {
        $user = Auth::User();
        return view('board.Approach-3',compact('user'));
    }
    public function update()
    {
        $user = Auth::User();
        
        $user->colour == 'Black' ?  $colour = 'White' :$colour = 'Black';
         $user->update([
            'colour' =>  $colour,
        ]);
        return redirect()->back();
    }

    public function show_board_2()
    {
        $user = Auth::User();
        return view('board.Approach-2',compact('user'));
    }
    public function show_board_1()
    {
        $user = Auth::User();
        return view('board.Approach-1',compact('user'));
    }
}
