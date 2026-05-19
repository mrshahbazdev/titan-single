<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = Product::query();

        if ($request->has('category')) {
            $query->where('productCategory', $request->category);
        }

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        $products = $query->get();

        return response()->json([
            'success' => true,
            'data' => $products,
        ]);
    }

    public function show(int $id): JsonResponse
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $product,
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'productName' => 'required|string|max:255',
            'productPrice' => 'required|numeric|min:0',
            'productImage' => 'nullable|string|max:500',
            'productCategory' => 'nullable|string|max:255',
            'productDescription' => 'nullable|string',
            'status' => 'nullable|integer|in:0,1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $product = Product::create($validator->validated());

        return response()->json([
            'success' => true,
            'message' => 'Product created successfully',
            'data' => $product,
        ], 201);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'productName' => 'sometimes|required|string|max:255',
            'productPrice' => 'sometimes|required|numeric|min:0',
            'productImage' => 'nullable|string|max:500',
            'productCategory' => 'nullable|string|max:255',
            'productDescription' => 'nullable|string',
            'status' => 'nullable|integer|in:0,1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $product->update($validator->validated());

        return response()->json([
            'success' => true,
            'message' => 'Product updated successfully',
            'data' => $product,
        ]);
    }

    public function destroy(int $id): JsonResponse
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found',
            ], 404);
        }

        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product deleted successfully',
        ]);
    }

    public function categories(): JsonResponse
    {
        $categories = ProductCategory::where('status', 1)->get();

        return response()->json([
            'success' => true,
            'data' => $categories,
        ]);
    }

    public function storeCategory(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'categoryName' => 'required|string|max:255',
            'status' => 'nullable|integer|in:0,1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $category = ProductCategory::create($validator->validated());

        return response()->json([
            'success' => true,
            'message' => 'Category created successfully',
            'data' => $category,
        ], 201);
    }
}
