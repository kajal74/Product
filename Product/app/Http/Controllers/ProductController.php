<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function index(Request $request){
        
        $products = Product::paginate(5);
          return view('products.index',['products'=>$products]);
    }

    
    public function search(Request $request)
    {
        
        // Implement your search logic here
        $results = Product::where('product_name', 'Like', '%'.$request->search.'%')->get(); 
        // Replace with your actual model and column
        $dataArray = $results->toArray();

        // Return the array as the response
        return response($dataArray);

 
       
    
    }
    public function create(){
        return view('products.create');
    }

    public function store(Request $request)
    {

        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image',

        ]);

        $image = $request->image;
        $name = $request->file('image')->getClientOriginalName();
        
        $image->storeAs('public/images',$name);
        
         $product = new Product();
        $product->product_name = $validatedData['name'];
        $product->description =  $validatedData['description'];
         $product->price = $validatedData['price'];
        $product->image = $name;
       
        $product->save();
    
        return redirect()->route('products.index')->withSuccess("Product Created Successfully");

        }


        public function edit($id){
            $product = Product::where('id',$id)->first();

            return view('products.update',['product'=>$product]);
        }

        public function update(Request $request)
        {
    
            // Validate the form data
            $validatedData = $request->validate([
                'name' => 'required',
                'description' => 'required',
                'price' => 'required|numeric',
                'image' => 'required|image',
    
            ]);

            $product = Product::where('id',$id)->first();

            if(isset($request->image)){
                $image = $request->image;
                $name = $request->file('image')->getClientOriginalName();
                
                $image->storeAs('public/images',$name);
                $product->image = $name;

            }
    
            dd($product);
             $product = new Product();
            $product->product_name = $validatedData['name'];
            $product->description =  $validatedData['description'];
             $product->price = $validatedData['price'];
           
            $product->save();
        
            return back()->withSuccess("Product Updated Successfully");
            }

            
            public function delete($id){
                $product = Product::where('id',$id)->first();

                   $product->delete();
                   return back()->withSuccess("Product Deleted Successfully");    
            }                
}


