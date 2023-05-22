<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Project;

class HomeController extends Controller
{
    public function index(){
        session()->forget('admin');
        $nav = [
            'Github' => 'https://github.com/parkashay',
            'LinkedIn' => 'https://www.linkedin.com/in/prakash-poudel-2a8a1b1a9/'
        ];

        $about = Content::where('title', 'about')->latest()->first();
        $skills = Content::all()->where('title', 'skills');
        $acedemics = Content::all()->where('title', 'education');
        $projects = Project::all();
        return view('welcome')
        ->with('links', $nav)
        ->with('about', $about)
        ->with('skills', $skills)
        ->with('education', $acedemics)
        ->with('projects', $projects)
        ;
    }
}
