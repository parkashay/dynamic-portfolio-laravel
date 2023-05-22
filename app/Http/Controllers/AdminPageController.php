<?php

namespace App\Http\Controllers;

use App\Models\AdminPass;
use App\Models\Content;
use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    public function index()
    {
        $links = [];
        $data = Content::all();
        return view('dashboard')
            ->with('links', $links)
            ->with('data', $data);
    }
    public function newContent(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        Content::create($validatedData);
        return redirect('/dashboard')
            ->with('success', 'Saved Successfully');
    }
    public function auth()
    {
        return view('auth');
    }
    public function verify(Request $request)
    {
        $validatedData = $request->validate([
            'adminpass' => 'required'
        ]);
        if (!AdminPass::where('keys', $validatedData['adminpass'])->exists()) {
            return redirect()->back()
                ->with('fail', 'Incorrect Key');
        } else {
            session(['admin' => true]);
            return redirect('/dashboard');
        }
    }
    public function delete($id)
    {
        $row = Content::find($id);
        $row->delete();
        return redirect()->back()
            ->with('deleted', 'Deleted Successfully');
    }
}
