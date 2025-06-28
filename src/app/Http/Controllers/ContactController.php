<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->validated();
        return view('confirm', compact('contact'));
    }

    public function store(Request $request)
    {
        $contact = $request->validated();
        if ($request->input('action') === 'back')
        {
            return redirect('/')->withInput();
        }
        Contact::create($contact);
        return view('thanks');
    }
}
