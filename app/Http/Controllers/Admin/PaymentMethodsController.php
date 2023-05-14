<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use App\PaymentGateways\PaymentGatewayFactory;
use Illuminate\Http\Request;

class PaymentMethodsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $methods = PaymentMethod::all();
        return view('admin.paymentMethods.index', compact('methods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
     * @throws \Exception
     */
    public function edit(string $id)
    {
        $method = PaymentMethod::query()->findOrFail($id);
        $gateway = PaymentGatewayFactory::create($method->slug);
        return view('admin.paymentMethods.edit', [
                'method' => $method,
                'options' => $gateway->formOptions()
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     * @throws \Exception
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'status' => 'required|string'
        ]);
        $method = PaymentMethod::query()->findOrFail($id);
        $method->update($request->all());
        return redirect()->route('admin.payment_methods.index')->with('success', 'updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
