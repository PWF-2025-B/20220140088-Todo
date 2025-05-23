<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {

        $categories = Category::with('todos')
            ->where('user_id', auth()->user()->id)
            ->get();

        return view('category.index', compact('categories'));
    }


    public function create()
    {
        return view('category.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        Category::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
        ]);

        return redirect()->route('category.index')
            ->with('success', 'Category created successfully!');
    }


    public function show(Category $category)
    {
        // Not implemented
    }


    public function edit(Category $category)
    {
        if (auth()->user()->id === $category->user_id) {
            return view('category.edit', compact('category'));
        }

        return redirect()->route('category.index')
            ->with('danger', 'You are not authorized to edit this category!');
    }


    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        $category->update([
            'title' => ucfirst($request->title),
        ]);

        return redirect()->route('category.index')
            ->with('success', 'Todo category updated successfully!');
    }


    public function destroy(Category $category)
    {
        if (auth()->user()->id === $category->user_id) {
            $category->delete();

            return redirect()->route('category.index')
                ->with('success', 'Category deleted successfully!');
        }

        return redirect()->route('category.index')
            ->with('danger', 'You are not authorized to delete this category!');
    }
}