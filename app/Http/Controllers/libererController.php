<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\liberer;

class libererController extends Controller
{
    //
    public function affichinfos($id){
        $liberer = liberer::find($id);
        return view('Liberer.information',compact('liberer'));
    }
}
