<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Made;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class MadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $mades = Made::paginate();
        return view('admin.mades.index', compact('mades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.mades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3'
        ]);
        $request->merge(['slug' => Str::slug($request->name)]);
        Made::create($request->all());
        return redirect()->route('admin.mades.index')->with('success', 'تم الاضافة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $made = Made::with('moulds')->findorFail($id);

        return view('admin.mades.show', compact('made'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $made = Made::findOrFail($id);
        return view('admin.mades.edit', compact('made'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3'
        ]);
        $made = Made::findorFail($id);
        $request->merge(['slug' => Str::slug($request->name)]);
        $made->update($request->all());
        return redirect()->route('admin.mades.index')->with('success', 'تم التعديل بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $made = Made::findOrFail($id);
        $made->delete();
        return redirect()->route('admin.mades.index')->with('success', 'تم الحذف بنجاح');

    }

    public function trash()
    {
        $mades = Made::onlyTrashed()->orderBy('name')->paginate();
        return view('admin.mades.trash', compact('mades'));
    }

    public function restore($id)
    {
        $made = Made::onlyTrashed()->findOrFail($id);
        $made->restore();
        return redirect()->route('admin.mades.index')->with(['success' => 'تم الاسترداد بنجاح']);
    }

    public function forceDelete($id): \Illuminate\Http\RedirectResponse
    {
        $made = Made::onlyTrashed()->findOrFail($id);
        $made->forceDelete();
        return Redirect::route('admin.mades.trash')->with('success', 'تم الحذف نهائيا');

    }
}
