<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSponsorRequest;
use App\Http\Requests\UpdateSponsorRequest;
use App\Http\Resources\SponsorResource;
use App\Models\Sponsor;
use Illuminate\Support\Facades\Storage;

class SponsorController extends Controller
{
    public function index()
    {
        return SponsorResource::collection(Sponsor::orderBy('name')->get());
    }

    public function store(StoreSponsorRequest $request)
    {
        $logoPath = $request->file('logo')->store('sponsors', 'public');

        $sponsor = Sponsor::create([
            'name' => $request->name,
            'logo' => $logoPath,
            'website' => $request->website,
            'sponsoring_since' => now(),
        ]);

        return new SponsorResource($sponsor);
    }

    public function show(Sponsor $sponsor)
    {
        return new SponsorResource($sponsor);
    }

    public function update(UpdateSponsorRequest $request, Sponsor $sponsor)
    {
        $data = $request->only(['name', 'website']);

        if ($request->hasFile('logo')) {
            if ($sponsor->logo) {
                Storage::disk('public')->delete($sponsor->logo);
            }
            $data['logo'] = $request->file('logo')->store('sponsors', 'public');
        }

        $sponsor->update($data);

        return new SponsorResource($sponsor);
    }

    public function destroy(Sponsor $sponsor)
    {
        if ($sponsor->logo) {
            Storage::disk('public')->delete($sponsor->logo);
        }

        $sponsor->delete();

        return new SponsorResource($sponsor);
    }
}