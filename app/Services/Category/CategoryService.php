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

    public function edit($id)
    {
        return $this->categoryrRepository->getCategoryById($id);
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

    public function show(Request $request): JsonResponse
    {
        $orderId = $request->route('id');

        return response()->json([
            'data' => $this->categoryrRepository->getCategoryById($orderId)
        ]);
    }

    public function update(Request $request): JsonResponse
    {
        $orderId = $request->route('id');
        $orderDetails = $request->only([
            'client',
            'details'
        ]);

        return response()->json([
            'data' => $this->categoryrRepository->updateCategory($orderId, $orderDetails)
        ]);
    }

    public function destroy(Request $request): JsonResponse
    {
        $orderId = $request->route('id');
        $this->categoryrRepository->deleteCategory($orderId);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    public function imageDelete($id): JsonResponse
    {
        return $this->categoryrRepository->deleteCategoryImageById($id);
    }
}
