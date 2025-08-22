<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        return ProjectResource::collection(Project::all());
    }

    public function store(StoreProjectRequest $request)
    {
        $coverImagePath = $request->file('cover_image')->store('projects', 'public');

        $project = Project::create([
            'name' => $request->name,
            'cover_image' => $coverImagePath,
            'project_type' => $request->project_type,
            'status' => $request->status,
            'slug' => Str::slug($request->name),
            'responsibles' => $request->responsibles,
            'location' => $request->location,
            'date' => $request->date,
            'starting_time' => $request->starting_time,
            'ending_time' => $request->ending_time,
            'markdown' => $request->markdown,
        ]);

        return new ProjectResource($project);
    }

    public function show(Project $project)
    {
        return new ProjectResource($project);
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->only(['name', 'project_type', 'status', 'responsibles', 'location', 'date', 'starting_time', 'ending_time', 'markdown']);
        
        if ($request->filled('name')) {
            $data['slug'] = Str::slug($request->name);
        }

        if ($request->hasFile('cover_image')) {
            if ($project->cover_image) {
                Storage::disk('public')->delete($project->cover_image);
            }
            $data['cover_image'] = $request->file('cover_image')->store('projects', 'public');
        }

        $project->update($data);

        return new ProjectResource($project);
    }

    public function destroy(Project $project)
    {
        if ($project->cover_image) {
            Storage::disk('public')->delete($project->cover_image);
        }

        $project->delete();

        return new ProjectResource($project);
    }
}