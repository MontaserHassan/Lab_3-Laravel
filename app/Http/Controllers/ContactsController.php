<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function create(){
        return '<h1>Form to create a new contact</h1>';
    }

    public function editForm($id, $name='No-name'){
        return '<h1>Form to edit this contact --> id: ' .$id. ' - name: '.$name.'</h1>';
    }
}
