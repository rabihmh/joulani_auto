<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Made;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class MadeController extends Controller
{
    public function index()
    {
        $mades = Made::paginate();
        return view('admin.mades.index', compact('mades'));
    }

    public function create()
    {
        return view('admin.mades.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|min:3',
            'image' => 'required|image'
        ]);
        $request->merge(['slug' => Str::slug($request->name)]);
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $image = $file->storeAs('uploads/mades/', $request->post('slug') . '.' . $ext, ['disk' => 'public']);
            $data['image'] = $image;
        }

        Made::create($data);
        return redirect()->route('admin.mades.index')->with('success', 'تم الاضافة بنجاح');
    }

    public function show($id)
    {
        $made = Made::with(['moulds' => function ($q) {
            $q->orderby('slug', 'asc');
        }])->findorFail($id);

        return view('admin.mades.show', compact('made'));
    }

    public function edit($id)
    {
        $made = Made::findOrFail($id);
        return view('admin.mades.edit', compact('made'));
    }

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
