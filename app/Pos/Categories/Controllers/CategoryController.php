<?php

namespace Pos\Categories\Controllers;

use App\Http\Controllers\Controller;
use Pos\Categories\Models\Category;
use Pos\Categories\Requests\StoreCategoriesRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get();
        return view('Backend.categories.index',compact('categories'));
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
    public function store(StoreCategoriesRequest $request)
    {
         // return $request;
        try {

            Category::create([
                'name'=> ['ar' => $request->name, 'en' => $request->name_en],
                'notes'=>$request->notes,
            ]);
            session()->flash('Add', trans('backend/categories.Section Added Successfully') );
            return redirect('categories');

        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCategoriesRequest $request, $id)
    {
        $category = Category::findorFail($request->id);

        try {

            $category->update([
                'name'=> ['ar' => $request->name, 'en' => $request->name_en],
                'notes'=>$request->notes,
            ]);
            session()->flash('Edit', trans('backend/categories.Section has been successfully modified')   );
            return redirect('categories');


        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            Category::destroy($id);
            session()->flash('Deleted', trans('backend/categories.Section has been deleted successfully'));
            return redirect('categories');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
