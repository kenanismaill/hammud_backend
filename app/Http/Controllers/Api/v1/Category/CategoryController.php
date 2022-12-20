<?php

namespace App\Http\Controllers\Api\v1\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Category\IndexCategoryRequest;
use App\Http\Requests\Api\v1\Category\StoreCategoryRequest;
use App\Http\Requests\Api\v1\Category\UpdateCategoryRequest;
use App\Http\Resources\Api\v1\Category\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * @param IndexCategoryRequest $request
     * @return AnonymousResourceCollection
     */
    public function index(IndexCategoryRequest $request): AnonymousResourceCollection
    {
        $categories = Category::query();
        if ($request->get('content')) {
            $categories = $categories->where('name', 'like', '%' . $request->get('content') . '%')
                ->orWhere('description', 'like', '%' . $request->get('content') . '%');
        }
        if ($request->get('status') !== null) {
            $categories = $categories->where('status', '=', (bool) $request->get('status'));
        }
        if ($request->get('color')) {
            $categories = $categories->where('color', '=', $request->get('color'));
        }
        $categories = $categories->paginate($request->get('per_page') ?? 10);
        return CategoryResource::collection($categories);
    }

    /**
     * @param Category $category
     * @return CategoryResource
     */
    public function show(Category $category): CategoryResource
    {
        return new CategoryResource($category);
    }

    /**
     * @param StoreCategoryRequest $request
     * @return Response
     */
    public function store(StoreCategoryRequest $request): Response
    {
        $data = $request->validated();
        Category::query()->create($data);
        return response()->noContent();
    }

    /**
     * @param Category $category
     * @param UpdateCategoryRequest $request
     * @return Response
     */
    public function update(Category $category, UpdateCategoryRequest $request): Response
    {
        $data = $request->validated();
        $category->update($data);
        return response()->noContent();
    }

    public function destroy(Category $category): Response
    {
        $category->delete();
        return response()->noContent();
    }
}
