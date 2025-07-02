<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
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
        $contact['tel'] = $request->input('tel1') . $request->input('tel2') . $request->input('tel3');
        unset($contact['tel1'], $contact['tel2'], $contact['tel3']);
        return view('confirm', compact('contact'));
    }

    public function store(Request $request)
    {
        if ($request->input('action') === 'back')
        {
            return redirect('/')->withInput();
        }
        $contact = $request->only([
            'last_name',
            'first_name',
            'gender',
            'email',
            'tel',
            'address',
            'building',
            'category_id',
            'detail'
        ]);
        Contact::create($contact);
        return view('thanks');
    }           

    public function books()
    {
        return $this->hasMany('App\Models\Category');
    }

    public function admin()
    {
        $contacts = Contact::paginate(5);
        return view('admin', compact('contacts'));
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->back();
    }

    public function search(Request $request)
{
    $contacts = Contact::with('category')
        ->KeywordSearch($request->keyword)
        ->GenderSearch($request->gender)
        ->CategorySearch($request->category_id)
        ->CreatedDateSearch($request->created_at)
        ->paginate(5);

    $categories = Category::all();

    return view('admin', compact('contacts', 'categories'));
}
}
