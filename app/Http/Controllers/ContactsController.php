<?php

use App\Contact;

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index() {
        $contacts = \App\Contact::all();
        return response()->json($contacts);
    }

    public function show($id) {
        $contact = \App\Contact::find($id);

        if(!$contact) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        return response()->json($contact);
    }

    public function store(Request $request) {
        $contact = new \App\Contact();
        $contact->fill($request->all());
        $contact->save();

        return response()->json($contact, 201);
    }

}
