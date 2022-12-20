<?php

namespace App\Http\Controllers\Api\v1\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Product\IndexProductRequest;
use App\Http\Requests\Api\v1\Product\StoreProductRequest;
use App\Http\Requests\Api\v1\Product\UpdateProductRequest;
use App\Http\Resources\Api\v1\Product\ProductResource;
use App\Models\Product;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * @param IndexProductRequest $request
     * @return AnonymousResourceCollection
     */
    public function index(IndexProductRequest $request): AnonymousResourceCollection
    {
        $products = Product::query();
        //todo:: apply filters
        $products = $products->paginate($request->get('per_page') ?? 10);
        return ProductResource::collection($products);
    }

    /**
     * @param Product $product
     * @return ProductResource
     */
    public function show(Product $product): ProductResource
    {
        return new ProductResource($product);
    }

    /**
     * @param StoreProductRequest $request
     * @return Response
     */
    public function store(StoreProductRequest $request): Response
    {
        $data = $request->validated();
        Product::query()->create($data);
        return response()->noContent();
    }

    /**
     * @param Product $product
     * @param UpdateProductRequest $request
     * @return Response
     */
    public function update(Product $product, UpdateProductRequest $request): Response
    {
        $data = $request->validated();
        $product->update($data);
        return response()->noContent();
    }

    /**
     * @param Product $product
     * @return Response
     */
    public function destroy(Product $product): Response
    {
        $product->delete();
        return response()->noContent();
    }
}
