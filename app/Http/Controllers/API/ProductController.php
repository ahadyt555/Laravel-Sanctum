<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Product;
use Validator;
use App\Http\Resources\ProductResource;
   
class ProductController extends BaseController
{
    public function index()
    {
        $posts = Product::all();
        return response()->json($posts);
    }

    public function store(Request $request)
    {
        $post = Product::create($request->all());
        return response()->json($post, 201);
    }

    public function show($id)
    {
        $post = Product::findOrFail($id);
        return response()->json($post);
    }

    public function update(Request $request, $id)
    {
        $post = Product::findOrFail($id);
        $post->update($request->all());
        return response()->json($post, 200);
    }

    public function destroy($id)
    {
        $post = Product::findOrFail($id);
        $post->delete();
        return response()->json(null, 204);
    }
}