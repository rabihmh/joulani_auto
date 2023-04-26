<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('admins.view');
        $admins = Admin::query()->where('type', '!=', 'super_admin')->select(['id', 'name', 'email', 'type', 'status', 'created_at'])->get();
        return view('admin.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('admins.create');
        $roles = Role::all();
        return view('admin.admins.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('admins.create');
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email',
            'role' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:admins'
        ]);

        $admin = Admin::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'username' => Str::slug($validatedData['name']),
            'status' => 'active',
            'password' => Hash::make('password'),
            'phone' => $validatedData['phone']
        ]);

        $admin->roles()->attach($validatedData['role']);

        return redirect()->route('admin.admins.index')->with('success', 'Admin created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        Gate::authorize('admins.view');
        $admin = Admin::query()->with('roles')->findOrFail($id);
        return view('admin.admins.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        Gate::authorize('admins.edit');
        $admin->load(['roles' => function ($query) {
            $query->select('id', 'name')->take(1);
        }]);
        $admin->setRelation('roles', $admin->roles->first());

        $roles = Role::all();
        //$admin_roles = $admin->roles()->pluck('id')->toArray();
        return view('admin.admins.edit', compact('admin', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Gate::authorize('admins.edit');
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email,' . $id,
            'role' => 'required|min:1',
        ]);
        $admin = Admin::findOrFail($id);
        $updated = $admin->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
        ]);

        if (!$updated) {
            return redirect()->route('admin.admins.index')->with('error', 'Failed to update admin');
        }

        $admin->roles()->sync($validatedData['role']);

        return redirect()->route('admin.admins.index')->with('success', 'Updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin): \Illuminate\Http\Response
    {
        Gate::authorize('admins.delete');
        $admin->delete();

        return response()->noContent();
    }

    public function updateStatus(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        Gate::authorize('admins.edit');
        $admin = Admin::query()->where('id', $id)->first();
        $status = $request->get('status');
        if (!$admin) {
            return response()->json([
                'message' => 'Not Found'
            ], 404);
        }
        $admin->update([
            'status' => $status
        ]);
        $message = $status == 'active' ? 'تم التفعيل بنجاح' : 'تم الغاء التفعيل بنجاح';
        return response()->json([
            'message' => $message,
            'admin' => $admin
        ], 202);
    }

}
