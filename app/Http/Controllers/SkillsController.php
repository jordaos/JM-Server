<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Skill;

class SkillsController extends Controller
{
    public function index() {
        $skills = Skill::all();
        return response()->json($skills);
    }

    public function show($id) {
        $skill = Skill::find($id);

        if(!$skill) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        return response()->json($skill);
    }

    public function store(Request $request) {
        $skill = new Skill();
        $skill->fill($request->all());
        $skill->save();

        return response()->json($skill, 201);
    }
}
