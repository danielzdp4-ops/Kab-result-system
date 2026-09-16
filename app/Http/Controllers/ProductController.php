<?php
namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
class ProductController extends Controller {
    public function index(){
        $products = Product::latest()->get();
        return view('products.index', compact('products'));
    }
    public function store(Request $request){
        $request->validate(['name'=>'required','quantity'=>'required|integer','buying_price'=>'required','selling_price'=>'required']);
        Product::create($request->all());
        return back()->with('success','Added!');
    }
    public function update(Request $request, Product $product){
        $product->update($request->all());
        return back()->with('success','Updated!');
    }
    public function destroy(Product $product){
        $product->delete();
        return back()->with('success','Deleted!');
    }
}