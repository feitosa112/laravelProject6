<?php

namespace App\Http\Controllers;

use App\Http\Requests\sendMsgRequest;
use App\Models\ContactModel;
use App\Repositories\ContactRepository;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    private $contactRepo;

    public function __construct() {
        $this->contactRepo = new ContactRepository();
    }

    //funkcija za prikaz forme za slanje poruke
    public function showContactForm()
    {
        return view('contact');
    }

    

    //funkcija za izvrsavanje slanja poruke preko forme
    public function sendMsg(sendMsgRequest $request)
    {
        $this->contactRepo->createNewMsg($request);

        return redirect(route('shop'))->with('sendMsg', 'You have successfully sent the message!!');
    }
}
