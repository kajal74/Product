<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

use DB;
class ProductController extends Controller
{
   public function index()
{
    //$products = Product::all()->toArray();
    return view('welcome');
}
public function productList()
{
    //$products = Product::all()->toArray();
    $products = Product::paginate(2);
    return view('product', compact('products'));
}
public function add()
    {
        return view('addproduct');

    }
public function search(Request $request)
{


    //$searchTerm = $request->input('searchTerm');
        
    // Perform the search based on your logic
   // $products = Product::where('product_name', 'LIKE', "%$searchTerm%")->get();
    
    // Render the search results partial view and return as a response
   // return view('product', compact('products'));
}

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image',
        ]);

        // Handle form submission and product creation

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('product_images', 'public');
        }

        // Create a new product instance
        $product = new Product;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->image = $imagePath; // Store the image file path or URL

        // Save the product to the database
        $product->save();

        // Redirect or perform any other action after saving the product

        return redirect('/products');
    }

    
}



   
   

