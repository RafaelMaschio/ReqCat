<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequirementStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\User;
use App\Models\Requirement;
use App\Models\RequirementType;
use App\Models\RequirementSuggestion;

class RequirementController extends Controller
{
     public function edit($project_position, $requirement_position, RequirementType $requirementType)
    {
        $requirement = Auth::user()->projects[$project_position-1]->requirements[$requirement_position-1];
        $requirement->load('project');
        return view('requirement.requirement_edit', [
            'requirement' => $requirement,
            'requirementTypes' => $requirementType->all(),
            'project_position'=>$project_position,
            'requirement_position'=>$requirement_position
        ]);
    }

    public function update($project_position, $requirement_position, RequirementStoreRequest $request)
    {
        $input = $request->validated();
        $requirement = Auth::user()->projects[$project_position-1]->requirements[$requirement_position-1];
        $requirement->fill($input);
        $requirement->save();

        return Redirect::route('project.show', $project_position);
    }

    public function create($project_position, RequirementType $requirementType)
    {
        return view('requirement.requirement_create', [
            'project' => Auth::user()->projects[$project_position-1],
            'requirementTypes' => $requirementType->all(),
            'project_position' => $project_position
        ]);
    }

    public function suggestion($project_position, RequirementSuggestion $requirementSuggestion)
    {
        $suggestions = $requirementSuggestion->all();
        $suggestions->load('type');
        $project = Auth::user()->projects[$project_position-1];
        return view('requirement.requirement_suggestion', [
            'project' => $project,
            'requirements' => $project->requirements,
            'requirementSuggestions' => $suggestions,
            'project_position' => $project_position,
            'count' => 0,
            'titles' => []
        ]);
    }

    public function store(RequirementStoreRequest $request, $project_position)
    {
        $input = $request->validated();
        $requirement = Requirement::create($input);
        $requirement->load('project');
        return Redirect::route('project.show', $project_position);
    }

    public function destroy($project_position, $requirement_position) {
        $requirement = Auth::user()->projects[$project_position-1]->requirements[$requirement_position-1];
        $requirement->delete();

        return Redirect::route('project.show', $project_position);
    } 
}
