<?php

namespace App\Repositories;

use App\Models\ContactModel;

class ContactRepository {
    private $contactModel;

    public function __construct() {
        $this->contactModel = new ContactModel();
    }


    public function createNewMsg($request){
        $this->contactModel->create([
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'message' => $request->get('message')
        ]);
    }
}