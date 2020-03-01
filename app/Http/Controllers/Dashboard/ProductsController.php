<?php


namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use App\Product;
use App\Category;
class ProductsController extends Controller
{
    public function index(Request $request)
    {
        
        
        $categories = Category::all();
        $products = Product::when($request->search, function ($q) use ($request) {

            return $q->whereTranslationLike('name', '%' . $request->search . '%');

        })->when($request->category_id, function ($q) use ($request) {

            return $q->where('category_id', $request->category_id);

        })->latest()->paginate(5);
        return view('admin.products.index',compact('products','categories'));

    } //end of index

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create',compact('categories'));
        
    }//end of create

    public function store(Request $request)
    {
        $rules = [
            'category_id' => 'required'
        ];

        foreach (config('translatable.locales') as $local) 
        {
            $rules += [$local . '.name' => 'required|unique:product_translations,name'];
            $rules += [$local . '.description' => 'required'];

        }
        $rules += [
            'purchase_price' => 'required',
            'sale_price' => 'required',
            'stock' => 'required',
        ];

        $request->validate($rules);

        $request_data = $request->all();



        if ($request->image) {

            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('image/upload/products/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();

        }//end of if

        Product::create($request_data);
        session()->flash('message', __('site.added_successfully'));
        return redirect()->route('dashboard.products');
    }//end of store

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit',compact('product','categories'));
        
    }//end of edit

    public function update(Request $request, Product $product)
    {
        $rules = [];

        foreach (config('translatable.locales') as $locale) {

            $rules += [$locale . '.name' => ['required', Rule::unique('product_translations', 'name')->ignore($product->id, 'product_id')]];

        }//end of for each

        $request->validate($rules);
        
        // $category->name = request('name');
        $product->update($request->all());
        session()->flash('message', __('site.updated_successfully'));
        return redirect()->route('dashboard.products.index');
    }//end of update

    public function destroy (Product $product)
    {
        $product->delete();
        session()->flash('message', __('site.deleted_successfully'));
        return redirect()->route('dashboard.products.index');
    }//end of destroy
}//end of product controller
