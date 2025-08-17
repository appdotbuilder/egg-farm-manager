<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDailyProductionRequest;
use App\Http\Requests\UpdateDailyProductionRequest;
use App\Models\DailyProduction;
use Inertia\Inertia;

class DailyProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productions = DailyProduction::latest('production_date')->paginate(15);
        
        return Inertia::render('production/index', [
            'productions' => $productions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('production/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDailyProductionRequest $request)
    {
        $production = DailyProduction::create($request->validated());

        return redirect()->route('production.show', $production)
            ->with('success', 'Daily production record created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DailyProduction $production)
    {
        return Inertia::render('production/show', [
            'production' => $production
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DailyProduction $production)
    {
        return Inertia::render('production/edit', [
            'production' => $production
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDailyProductionRequest $request, DailyProduction $production)
    {
        $production->update($request->validated());

        return redirect()->route('production.show', $production)
            ->with('success', 'Daily production record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DailyProduction $production)
    {
        $production->delete();

        return redirect()->route('production.index')
            ->with('success', 'Daily production record deleted successfully.');
    }
}