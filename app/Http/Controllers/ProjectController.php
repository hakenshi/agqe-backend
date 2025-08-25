<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        return ProjectResource::collection(Project::all());
    }

    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();
        
        $data['slug'] = Str::slug($request->name);

        $project = Project::create($data);

        return new ProjectResource($project);
    }

    public function show(string $slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();

        return new ProjectResource($project);
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();


        if ($request->filled('name')) {
            $data['slug'] = Str::slug($request->name);
        }

        if ($request->filled('cover_image')) {
            $data['coverImage'] = $request->coverImage;
        }

        $project->update($data);

        return new ProjectResource($project);
    }

    public function destroy(Project $project)
    {
        // Image deletion handled by frontend/Cloudflare R2

        $project->delete();

        return new ProjectResource($project);
    }
}
