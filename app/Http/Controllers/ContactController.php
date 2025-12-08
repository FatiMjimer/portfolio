<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function form()
    {
        return view('contact.form');
    }

    public function send(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'message' => 'required|min:10',
        ]);

        Contact::create($request->all());

        return redirect()->back()->with('success', 'Votre message a été envoyé avec succès !');
    }
}
