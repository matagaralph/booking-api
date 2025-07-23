<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePropertyRequest;
use App\Models\Property;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class PropertyController extends Controller {
    use AuthorizesRequests;

    public function index() {
        $this->authorize('properties-manage');

        return response()->json([]);
    }

    public function store(StorePropertyRequest $request) {
        $this->authorize('properties-manage');

        return Property::create($request->validated());
    }
}
