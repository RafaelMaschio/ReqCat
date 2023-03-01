<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\User;
use App\Models\Requirement;
use App\Models\RequirementType;
use PDF;

class PdfController extends Controller
{
    public function generate_pdf($project_position)
    {
        $project = Auth::user()->projects[$project_position-1];
        $project->requirements->load('type');
        $author = Auth::user()->name;
        $requirements = $project->requirements;
        $types = RequirementType::all();
        $count = 0;
        $pdf = PDF::loadView('pdf.pdf',compact(
            'project',
            'project_position', 
            'author',
            'requirements', 
            'types', 
            'count'
        ));
        return $pdf->setPaper('a4')->stream($project->title . ".pdf");
    }
}
