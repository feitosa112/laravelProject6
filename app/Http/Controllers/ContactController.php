<?php

namespace App\Http\Controllers;

use App\Models\ContactModel;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //funkcija za prikaz forme za slanje poruke
    public function showContactForm(){
        return view('contact');
    }

    //funkcija za izvrsavanje slanja poruke preko forme
    public function sendMsg(Request $request){
        $request->validate([
            'email'=>'required|string',
            'subject'=>'required|string|max:20',
            'message'=>'required|string|min:5|max:100'
        ]);

        ContactModel::create([
            'email'=>$request->get('email'),
            'subject'=>$request->get('subject'),
            'message'=>$request->get('message')
        ]);

        return redirect(route('shop'))->with('sendMsg','You have successfully sent the message!!');
    }
}
