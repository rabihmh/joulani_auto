<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Services\Stripe\Plans;
use Illuminate\Http\Request;
use Stripe\Exception\ApiErrorException;

class PlansController extends Controller
{

    public function index()
    {
        $plans = Plan::all();
        return view('admin.plans.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.plans.create');

    }

    /**
     * Store a newly created resource in storage.
     * @throws ApiErrorException
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $plans = new Plans($request->all());
        $stripe_plan = $plans->create();
        $planData = [
            'name' => $request->post('name'),
            'description' => $request->post('description'),
            'price' => $request->post('price'),
            'billing_cycle' => $request->post('billing_cycle'),
            'vehicle_limit' => $request->post('vehicle_limit'),
            'stripe_plan_id' => $stripe_plan->id,
        ];

        $plan = Plan::query()->create($planData);

        return redirect()->route('admin.plans.index')->with('success', 'Plan created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
