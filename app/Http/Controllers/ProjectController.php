<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\User;
use App\Models\Requirement;

class ProjectController extends Controller
{
    public function show_projects()
    {
        return view('project.projects', [
            'projects' => Auth::user()->projects,
            'count' => 0
        ]);
    }

    public function show_project($position)
    {
        try {
            $project = Auth::user()->projects[$position-1];
        }
        catch(\Exception $e) {
            return Redirect::route('projects.show');
        }
        $project->requirements->load('type');
        return view('project.project', [
            'project' => $project,
            'requirements' => $project->requirements,
            'project_position' => $position,
            'count' => 0
        ]);
    }

    public function edit($position)
    {
        try {
            $project = Auth::user()->projects[$position-1];
        }
        catch(\Exception $e) {
            return Redirect::route('projects.show');
        }
        return view('project.project_edit', [
            'project' => $project
        ]);
    }

    public function update(Project $project, ProjectStoreRequest $request)
    {
        $input = $request->validated();

        $project->fill($input);
        $project->save();

        return Redirect::route('projects.show');
    }

    public function create(Project $project)
    {
        return view('project.project_create', [
            'project' => $project
        ]);
    }

    public function store(ProjectStoreRequest $request)
    {
        $input = $request->validated();
        $project = Project::create($input);
        $project->users()->attach(Auth::id());
        return Redirect::route('projects.show');
    }

    public function destroy($project_position) {
        $project = Auth::user()->projects[$project_position-1];
        $project->delete();

        return Redirect::route('projects.show');
    }
}
