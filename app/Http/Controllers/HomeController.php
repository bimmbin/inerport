<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Inertia\Inertia;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $feat_projects = Project::with('web_dev', 'image_showcase')->take(4)->get();
        return Inertia::render('Home', [
            'feat_projects' => $feat_projects
        ]);
    }
}
