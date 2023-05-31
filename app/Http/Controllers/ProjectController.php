<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    function index(){
        $nav = [];
        $projects = Project::all();
        return view('projects')
        ->with('projects', $projects)
        ->with('links', $nav);
    }
    public function create(Request $request){
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'tech' => 'required',
            'link' => 'required',
            'image' => 'required'
        ]);

        Project::create($validatedData);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
        }
        Project::where('title', $validatedData['title'])->update([
            'image' => $imageName
        ]);
    
        return redirect('/projects')->with('success', 'Project Added Successfully');
    }

    public function delete($id){
       if(session()->has('admin')){
        $data = Project::find($id);
        $img = public_path('uploads/'. $data->image);
        if(File::exists($img)){
            File::delete($img);
        }
        $data->delete();
        return redirect()->back()
        ->with('deleted', 'Project has been deleted');
       }
       else{
        abort(404);
       }
    }

    public function editProject($id){
        $nav = [];
        $project = Project::find($id);
        return view('projectUpdate')
        ->with('links', $nav)
        ->with('project', $project);
    }
    public function updateProject(Request $request, $id){
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'tech' => 'required',
            'link' => 'required'
        ]);
        $update = Project::where('id', $id)->update($validatedData);
        if($update){
            return redirect('/projects')->with('success', 'Update Successful');
        }
        else{
            return redirect()->back()->with('fail', 'Update Failed');
        }
    }
}
