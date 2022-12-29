<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);
            $data = $request->all();
            $data['user_id'] = Auth::id();

        Category::create($data);
        return redirect()->route('category.index')->withSuccess('Category has been created Successfully');
    }

    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $category->update($request->post());
        return redirect()->route('category.index')->withSuccess('Category has been update successfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->withSuccess('Category has been deleted successfully');
    }
}
