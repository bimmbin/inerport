<?php

namespace App\Http\Controllers\WebDev;

use Inertia\Inertia;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DevProjectController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index($project)
  {
    dd($project);
    // $projects = Project::findOrFail();
    return Inertia::render('Dashboard/WebDev/DevProject');
    // return Inertia::render('Dashboard/WebDev/WebDev', [
    //   'projects' => $projects
    // ]);
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
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
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
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
