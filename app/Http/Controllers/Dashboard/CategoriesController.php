<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\Category;
class CategoriesController extends Controller
{
    public function index (Request $request)
    {
        $categories = Category::when($request->search, function($q) use ($request){
            return $q->whereTranslationLike('name',  '%' . $request->search . '%');

        })->latest()->paginate(5);
        return view('admin.categories.index', compact('categories'));
    }
    public function create ()
    {
      return view('admin.categories.create');
    }

    public function store (Request $request)
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('category_translations', 'name')]];

        }//end of for each

        $request->validate($rules);

        Category::create($request->all());
        session()->flash('message', __('site.added_successfully'));
        return redirect()->route('dashboard.categories.index');
    }
    public function edit ($id)
    {
        $category = Category::findOrfail($id);
        return view('admin.categories.edit',compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('category_translations', 'name')->ignore($category->id, 'category_id')]];

        }//end of for each

        $request->validate($rules);
        
        // $category->name = request('name');
        $category->update($request->all());
        session()->flash('message', __('site.updated_successfully'));
        return redirect()->route('dashboard.categories.index');
    }
    public function destroy (Category $category)
    {
        $category->delete();
        session()->flash('message', __('site.deleted_successfully'));
        return redirect()->route('dashboard.categories.index');
    }
}
