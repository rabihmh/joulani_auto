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
        try {
            $request->validate([
                'name' => 'required|min:2',
                'parent_id' => 'nullable|numeric'
            ]);

            $made = Made::find($made_id);
            if (!$made) {
                return redirect()->back()->with('error', 'غير موجود');
            }

            $mould = Mould::create([
                'made_id' => $made_id,
                'name' => $request->input('name'),
                'parent_id' => $request->input('parent_id'),
                'slug' => Str::slug($request->input('name')),
            ]);

            return redirect()->back()->with('success', 'تم الاضافة بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ أثناء الإضافة');
        }
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
        try {
            $moulds = Mould::whereNull('parent_id')
                ->with('children')
                ->where('made_id', $id)
                ->get();

            return response()->json([
                'success' => true,
                'data' => $moulds
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }


    public function getMouldsChild($id)
    {
        try {
            $moulds = Mould::where('parent_id', $id)->get();

            return response()->json([
                'success' => true,
                'data' => $moulds
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

}
