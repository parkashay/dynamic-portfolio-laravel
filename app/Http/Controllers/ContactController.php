<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('manageContact')
            ->with('contacts', $contacts);
    }
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'required',
            'title' => 'required',
            'content' => 'required'
        ]);
        Contact::create($validatedData);
        return redirect()->back();
    }
    public function delete($id)
    {
        if (session()->has('admin')) {
            Contact::find($id)->delete();
            return redirect()->back();
        } else {
            abort(404);
        }
    }
}
