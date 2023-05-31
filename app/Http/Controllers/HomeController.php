<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Content;
use App\Models\Project;

class HomeController extends Controller
{
    public function index(){
        session()->forget('admin');
        $nav = Contact::all()->where('type', 'nav');
        $owner = Content::where('title', 'owner')->latest()->first();
        $about = Content::where('title', 'about')->latest()->first();
        $skills = Content::all()->where('title', 'skills');
        $acedemics = Content::all()->where('title', 'education');
        $experience = Content::all()->where('title', 'experience');
        $projects = Project::all();
        $contacts = Contact::all()->where('type', 'contact');
        return view('welcome')
        ->with('owner', $owner)
        ->with('links', $nav)
        ->with('about', $about)
        ->with('skills', $skills)
        ->with('education', $acedemics)
        ->with('projects', $projects)
        ->with('experience', $experience)
        ->with('contacts', $contacts)
        ;
    }
}
