<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSponsorRequest;
use App\Http\Requests\UpdateSponsorRequest;
use App\Http\Resources\SponsorResource;
use App\Models\Sponsor;

class SponsorController extends Controller
{
    public function index()
    {
        return SponsorResource::collection(Sponsor::orderBy('name')->get());
    }

    public function store(StoreSponsorRequest $request)
    {
        $sponsor = Sponsor::create([
            'name' => $request->name,
            'logo' => $request->logo,
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

        if ($request->filled('logo')) {
            $data['logo'] = $request->logo;
        }

        $sponsor->update($data);

        return new SponsorResource($sponsor);
    }

    public function destroy(Sponsor $sponsor)
    {
        // Logo deletion handled by frontend/Cloudflare R2

        $sponsor->delete();

        return new SponsorResource($sponsor);
    }
}