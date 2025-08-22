<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDonationRequest;
use App\Http\Resources\DonationResource;
use App\Models\Donation;

class DonationController extends Controller
{
    public function index()
    {
        return DonationResource::collection(Donation::orderBy('created_at', 'desc')->get());
    }

    public function store(StoreDonationRequest $request)
    {
        $donation = Donation::create($request->validated());
        
        return new DonationResource($donation);
    }
}