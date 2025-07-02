<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; 
use App\Models\Contact;

class AdminController extends Controller
{
    public function index() {
        $categories = Category::all();
        $contacts = Contact::paginate(10)->onEachSide(2);
        return view('admin', compact('categories', 'contacts'));
    }
}
