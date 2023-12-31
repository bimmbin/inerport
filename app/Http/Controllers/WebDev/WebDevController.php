<?php

namespace App\Http\Controllers\WebDev;

use Inertia\Inertia;
use App\Models\WebDev;
use App\Models\Project;
use App\Models\WebFeat;
use App\Models\TechUsed;
use Illuminate\Http\Request;
use App\Models\ImageShowcase;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class WebDevController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $projects = Project::with('image_showcase', 'web_dev', 'web_dev.tech_used', 'web_dev.web_feat')->latest()->get();

    return Inertia::render('Dashboard/WebDev/WebDev', [
      'projects' => $projects
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'proj_title' => 'required|string|max:255',
      'proj_description' => 'required|string',
      'github_link.*' => 'required|string',
      'live_link.*' => 'required|string',
      'tech_used' => 'required|array',
      'web_feat' => 'required|array',
      'image' => 'required|array',
      'image.*' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:40000',
    ]);

    //thumbnail upload
    // if ($request->hasFile('image')) {
    //   $thumbnail_path = $request->file('image')[$request->img_thumbnail]->store('image', 'public');
    // }

    //Project model creation
    $project = Project::create([
      'proj_title' => $request->proj_title,
      'proj_description' => $request->proj_description,
      'img_thumbnail' => $request->img_thumbnail,
      'category' => $request->category,
    ]);

    //ImageShowcase model creation (loop)
    if ($request->hasFile('image')) {
      foreach ($request->image as $image) {

        $image_path = $image->store('image', 'public');

        ImageShowcase::create([
          'project_id' => $project->id,
          'img_path' => '/storage/' . $image_path,
        ]);
      }
    }

    //WebDev model creation 
    $web_dev = WebDev::create([
      'project_id' => $project->id,
      'github_link' => $request->github_link,
      'live_link' => $request->live_link,
    ]);

    //TechUsed model creation
    foreach ($request->tech_used as $tech) {
      TechUsed::create([
        'web_dev_id' => $web_dev->id,
        'tech_name' => $tech,
      ]);
    }

    //WebFeat model creation
    foreach ($request->web_feat as $feat) {
      WebFeat::create([
        'web_dev_id' => $web_dev->id,
        'feat_name' => $feat,
      ]);
    }

    return redirect()->back();
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $project = Project::with('image_showcase', 'web_dev', 'web_dev.tech_used', 'web_dev.web_feat')->findOrFail($id);
    $recommend_projects = Project::with('image_showcase')->whereNot(function ($query) use ($project) {
      $query->where('id', $project->id);
    })
      ->get();

    return Inertia::render('Dashboard/WebDev/DevProject', [
      'project' => $project,
      'recommend_projects' => $recommend_projects,
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $request->validate([
      'proj_title' => 'required|string|max:255',
      'proj_description' => 'required|string',
      'github_link' => 'required|string',
      'live_link' => 'required|string',
      'tech_used' => 'required|array',
      'web_feat' => 'required|array',
      'image' => 'array',
      'image.*' => 'image|mimes:jpeg,jpg,png,gif,svg|max:40000',
    ]);

    $project = Project::with('image_showcase', 'web_dev', 'web_dev.tech_used', 'web_dev.web_feat')->findOrFail($id);

    //Project update
    $project->proj_title = $request->proj_title;
    $project->proj_description = $request->proj_description;
    $project->img_thumbnail = $request->img_thumbnail;
    $project->proj_title = $request->proj_title;
    $project->save();

    //ImageShowcase update (loop)
    if ($request->hasFile('image')) {
      //remove old images
      foreach ($project->image_showcase as $image) {
        $proper_img_path = ltrim($image->img_path, '/storage');
        Storage::disk('public')->delete($proper_img_path);
      }
      $project->image_showcase()->delete();

      //insert new images
      foreach ($request->image as $image) {

        $image_path = $image->store('image', 'public');

        ImageShowcase::create([
          'project_id' => $project->id,
          'img_path' => '/storage/' . $image_path,
        ]);
      }
    }

    //webdev update
    $project->web_dev->github_link = $request->github_link;
    $project->web_dev->live_link = $request->live_link;
    $project->web_dev->save();
    
    //TechUsed model creation
    $project->web_dev->tech_used()->delete();
    foreach ($request->tech_used as $tech) {
      TechUsed::create([
        'web_dev_id' => $project->web_dev->id,
        'tech_name' => $tech,
      ]);
    }

    //WebFeat model creation
    $project->web_dev->web_feat()->delete();
    foreach ($request->web_feat as $feat) {
      WebFeat::create([
        'web_dev_id' => $project->web_dev->id,
        'feat_name' => $feat,
      ]);
    }

    return redirect()->route('web-development.show', $id);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  { 
    $project = Project::with('image_showcase')->findOrFail($id);
    foreach ($project->image_showcase as $image) {
      $proper_img_path = ltrim($image->img_path, '/storage');
      Storage::disk('public')->delete($proper_img_path);
    }
    $project->delete();

    return redirect()->route('web-development.index');
  }
}
