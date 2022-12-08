<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Made;
use App\Models\Mould;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MouldController extends Controller
{
    public function store(Request $request, $made_id)
    {
        $request->validate([
            'name' => 'required|min:3'
        ]);
        $made = Made::find($made_id);
        if ($made) {

            $mould = Mould::create([
                'made_id' => $made_id,
                'name' => $request->post('name'),
                'slug' => Str::slug($request->post('name')),
            ]);
            return redirect()->back()->with('success', 'تم الاضافة بنجاح');
        }
        return redirect()->back()->with('error', 'غير موجود');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $mould = Mould::findOrFail($id);
        return view('admin.moulds.edit', compact('mould'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3',
        ]);
        $mould = Mould::findOrFail($id);
        $request->merge(['slug' => Str::slug($request->name)]);
        $mould->update($request->all());
        return redirect()->route('admin.mades.show', $mould->made_id)->with('success', 'تم التعديل بنجاح');

    }


    public function destroy($id)
    {
        $mould = Mould::findOrFail($id);
        $mould->delete();
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }

    public function trash()
    {
        $moulds = Mould::onlyTrashed()->with('made')->orderBy('name')->paginate();
        return view('admin.moulds.trash', compact('moulds'));
    }

    public function restore($id)
    {
        $mould = Mould::onlyTrashed()->findOrFail($id);
        $mould->restore();
        return redirect()->route('admin.mades.show', $mould->made_id)->with(['success' => 'تم الاسترداد بنجاح']);

    }

    public function forceDelete($id)
    {
        $mould = Mould::onlyTrashed()->findOrFail($id);
        $mould->forceDelete();
        return redirect()->route('admin.mades.show', $mould->made_id)->with('success', 'تم الحذف نهائيا');
    }

    public function getMouldsById($id)
    {
        $made = Made::findOrFail($id);
        return response()->json($made['moulds']);
    }
}
