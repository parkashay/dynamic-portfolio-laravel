<?php

namespace App\Http\Controllers;

use App\Models\AdminPass;
use App\Models\Content;
use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    public function index()
    {
        $data = Content::all();
        return view('dashboard')
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
       if(session()->has('admin')){
        $row = Content::find($id);
        $row->delete();
        return redirect()->back()
            ->with('success', 'Deleted Successfully');
       }
       else{
        abort(404);
       }
    }
    public function edit($id)
    {
        $editContent = Content::find($id);
        return view('update')
        ->with('editContent', $editContent);
    }

    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        $update = Content::where('id', $id)->update($validatedData);
        if($update){
            return redirect('/dashboard')->with('success', 'Update Successful');
        }
        else{
            return redirect()->back()->with('fail', 'Update Failed');
        }
    }

    public function tokens(){
        $tokens = AdminPass::all();
        return view('tokens')
        ->with('tokens', $tokens);
    }
    public function addkey(Request $request){
        $validatedData = $request->validate([
            'keys' => 'required'
        ]);
        AdminPass::create($validatedData);
        return redirect()->back();
    }
    public function deleteToken($id){
        if(session()->has('admin')){
            AdminPass::find($id)->delete();
            return redirect()->back();
        }
        else{
            abort(404);
        }
    }
}
