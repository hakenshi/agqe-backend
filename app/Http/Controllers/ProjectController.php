<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function index()
    {
        return response()->json(Project::all());
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'project_type' => 'required|in:social,educational,environmental,cultural,health',
            'status' => 'required|in:planning,active,completed,archived',
            'responsibles' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'date' => 'nullable|date',
            'starting_time' => 'nullable|date_format:H:i',
            'ending_time' => 'nullable|date_format:H:i',
            'markdown' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $coverImagePath = $request->file('cover_image')->store('projects', 'public');

        $project = Project::create([
            'name' => $request->name,
            'cover_image' => $coverImagePath,
            'project_type' => $request->project_type,
            'status' => $request->status,
            'responsibles' => $request->responsibles,
            'location' => $request->location,
            'date' => $request->date,
            'starting_time' => $request->starting_time,
            'ending_time' => $request->ending_time,
            'markdown' => $request->markdown,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Projeto criado com sucesso',
            'project' => $project,
        ], 201);
    }

    public function show(Project $project)
    {
        return response()->json($project);
    }

    public function update(Request $request, Project $project)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|string|max:255',
            'cover_image' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
            'project_type' => 'sometimes|in:social,educational,environmental,cultural,health',
            'status' => 'sometimes|in:planning,active,completed,archived',
            'responsibles' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'date' => 'nullable|date',
            'starting_time' => 'nullable|date_format:H:i',
            'ending_time' => 'nullable|date_format:H:i',
            'markdown' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->only(['name', 'project_type', 'status', 'responsibles', 'location', 'date', 'starting_time', 'ending_time', 'markdown']);

        if ($request->hasFile('cover_image')) {
            if ($project->cover_image) {
                Storage::disk('public')->delete($project->cover_image);
            }
            $data['cover_image'] = $request->file('cover_image')->store('projects', 'public');
        }

        $project->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Projeto atualizado com sucesso',
            'project' => $project,
        ]);
    }

    public function destroy(Project $project)
    {
        if ($project->cover_image) {
            Storage::disk('public')->delete($project->cover_image);
        }

        $project->delete();

        return response()->json([
            'success' => true,
            'message' => 'Projeto excluído com sucesso',
        ]);
    }
}