<?php

namespace App\Http\Controllers;

use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Http\Requests\Categories\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest('updated_at')->paginate(10);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        //1.Validation is already done with the help of Form Request
        //2.Store the data in db
        Category::create([
            'name' => $request->name
        ]);

        session()->flash('success', 'Category created successfully!');
        /**
         * This method is fast than a class Session of Fasacdes according to laravel
         * Flash method is used to request for session only once.
         * Flash deletes a session automatically after one request.
         */
        //3.return to index
        return redirect(route('categories.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)//route model binding
    {
        return view('categories.edit', compact(['category']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->name = $request->name;

        // $category->update(['name' => $request->name]);
        $category->save();

        session()->flash('success', 'Category Updated Successfully');
        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->posts->count() > 0) {
            session()->flash('error', 'Category cannot be deleted as it contains many posts.');
            return redirect(route('categories.index'));
        }
        $category->delete();
        session()->flash('success', 'Category deleted sucessfully!');
        return redirect(route('categories.index'));
    }
}
