<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $project = Project::with('employees')->get();
        return response()->json([
            'status' => 'success',
            'project' => $project,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
       

        $project = Project::create([
            'name' => $request->name,
        ]);
        // $project->employees()->attach($request->employee_id);

        return response()->json([
            'status' => 'success',
            'project' => $project,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return response()->json([
            'status' => 'success',
            'project' => $project,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
      
        $projects = $project->update([
            'name' => $request->name,
        ]);
        // $project->employees()->sync($request->employee_id);

        return response()->json([
            'status' => 'success',
            'project' => $projects,
        ]);
    }    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return response()->json([
            'status' => 'success',
            'project' => $project,
        ]);    }
}
