<?php

namespace App\Services\Category;

use App\Models\Category;

use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryService
{
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryrRepository = $categoryRepository;
    }

    public function index()
    {
       return $this->categoryrRepository->getAllCategories();


    }
    public function create()
    {
       return view('dashboard.book_categories.create');
    }

    public function store($data): JsonResponse
    {

        return response()->json(
            [
                'data' => $this->categoryrRepository->createCategory($data)
            ],
            Response::HTTP_CREATED
        );
    }

    public function edit($id)
    {
        return $this->categoryrRepository->getCategoryById($id);
    }

    public function update($categoryId, $categoryDetails): JsonResponse
    {

        return response()->json([
            'data' => $this->categoryrRepository->updateCategory($categoryId, $categoryDetails)
        ]);
    }

    public function destroy($categoryId): JsonResponse
    {

        $this->categoryrRepository->deleteCategory($categoryId);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    public function imageDelete($id)
    {
        return $this->categoryrRepository->deleteCategoryImageById($id);
    }
}
