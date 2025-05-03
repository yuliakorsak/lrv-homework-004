<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Http\Requests\CarValidationRequest;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Car::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarValidationRequest $request)
    {
        return Car::create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        return Car::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarValidationRequest $request, Car $car)
    {
        return $car->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        if($car->delete()) {
            return response(null, 204);
        }
        return null;
    }
}
