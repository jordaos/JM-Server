<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index() {
        $projects = \App\Project::all();
        return response()->json($projects);
    }

    public function show($id) {
        $project = \App\Project::find($id);

        if(!$project) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        return response()->json($project);
    }

    public function store(Request $request) {
        $project = new \App\Project();
        $project->fill($request->all());
        $project->save();

        return response()->json($project, 201);
    }
}
