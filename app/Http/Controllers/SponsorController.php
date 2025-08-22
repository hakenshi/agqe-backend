<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SponsorController extends Controller
{
    public function index()
    {
        return response()->json(Sponsor::orderBy('name')->get());
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'website' => 'required|url|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $logoPath = $request->file('logo')->store('sponsors', 'public');

        $sponsor = Sponsor::create([
            'name' => $request->name,
            'logo' => $logoPath,
            'website' => $request->website,
            'sponsoring_since' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Apoiador criado com sucesso',
            'sponsor' => $sponsor,
        ], 201);
    }

    public function show(Sponsor $sponsor)
    {
        return response()->json($sponsor);
    }

    public function update(Request $request, Sponsor $sponsor)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|string|max:255',
            'logo' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
            'website' => 'sometimes|url|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->only(['name', 'website']);

        if ($request->hasFile('logo')) {
            if ($sponsor->logo) {
                Storage::disk('public')->delete($sponsor->logo);
            }
            $data['logo'] = $request->file('logo')->store('sponsors', 'public');
        }

        $sponsor->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Apoiador atualizado com sucesso',
            'sponsor' => $sponsor,
        ]);
    }

    public function destroy(Sponsor $sponsor)
    {
        if ($sponsor->logo) {
            Storage::disk('public')->delete($sponsor->logo);
        }

        $sponsor->delete();

        return response()->json([
            'success' => true,
            'message' => 'Apoiador excluído com sucesso',
        ]);
    }
}