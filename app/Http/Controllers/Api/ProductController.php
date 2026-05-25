<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as FileSystem;
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
            'productImage' => 'required|string',
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

        $data = $validator->validated();
        $data['productImage'] = $this->saveBase64Image($data['productImage']);

        $product = Product::create($data);

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
            'productImage' => 'nullable|string',
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

        $data = $validator->validated();

        if (isset($data['productImage']) && $data['productImage']) {
            if ($product->productImage && FileSystem::exists(public_path('backend/productImage/' . $product->productImage))) {
                FileSystem::delete(public_path('backend/productImage/' . $product->productImage));
            }
            $data['productImage'] = $this->saveBase64Image($data['productImage']);
        }

        $product->update($data);

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

        if ($product->productImage && FileSystem::exists(public_path('backend/productImage/' . $product->productImage))) {
            FileSystem::delete(public_path('backend/productImage/' . $product->productImage));
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

    private function saveBase64Image(string $base64): string
    {
        $imageInfo = explode(',', $base64);
        $decodedImage = base64_decode($imageInfo[1]);

        $extension = 'png';
        if (strpos($imageInfo[0], 'jpeg') !== false || strpos($imageInfo[0], 'jpg') !== false) {
            $extension = 'jpg';
        }

        $filename = uniqid() . '.' . $extension;
        $publicPath = public_path('backend/productImage');

        if (!FileSystem::exists($publicPath)) {
            FileSystem::makeDirectory($publicPath, 0755, true, true);
        }

        file_put_contents($publicPath . '/' . $filename, $decodedImage);

        return $filename;
    }
}
