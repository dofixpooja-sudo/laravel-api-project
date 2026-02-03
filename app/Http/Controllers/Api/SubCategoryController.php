<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    // ✅ All Subcategories
    public function index(Request $request)
    {
        $getSubCategries =  SubCategory::where("category_id", $request->category_id)->get();
        if(count($getSubCategries) > 0){
            return response()->json([
            'status' => true,
            'data' => SubCategory::get()
            ]);
        }
        else{
            return response()->json([
            'status' => false,
            'data' => null,
            'message' => 'no data found!!'
        ]);
        }
    }

    // ✅ Single Subcategory
    public function show($id)
    {
        $subcategory = SubCategory::with('category')->find($id);

        if (!$subcategory) {
            return response()->json([
                'status' => false,
                'message' => 'SubCategory not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $subcategory
        ]);
    }

    // ✅ Create Subcategory
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string'
        ]);

        $subcategory = SubCategory::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'SubCategory created successfully',
            'data' => $subcategory
        ]);
    }

    // ✅ Update Subcategory
    public function update(Request $request, $id)
    {
        $subcategory = SubCategory::find($id);

        if (!$subcategory) {
            return response()->json([
                'status' => false,
                'message' => 'SubCategory not found'
            ], 404);
        }

        $subcategory->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'SubCategory updated successfully',
            'data' => $subcategory
        ]);
    }

    // ✅ Delete Subcategory
    public function destroy($id)
    {
        $subcategory = SubCategory::find($id);

        if (!$subcategory) {
            return response()->json([
                'status' => false,
                'message' => 'SubCategory not found'
            ], 404);
        }

        $subcategory->delete();

        return response()->json([
            'status' => true,
            'message' => 'SubCategory deleted successfully'
        ]);
    }
}
