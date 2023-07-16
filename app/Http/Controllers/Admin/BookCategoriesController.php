<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreCategoryRequest;
use App\Services\Category\CategoryService;
use Illuminate\Http\Request;

class BookCategoriesController extends Controller
{

    /**
     * @var CategoryService
     */
    protected $categoryService;

    /**
     * BookCategoriesController __constructor
     *
     */

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }


    public function index()
    {
        return $this->categoryService->index();
    }

    public function create()
    {
        return $this->categoryService->create();
    }

    public function edit($id)
    {
        return $this->categoryService->edit($id);
    }

    public function store(StoreCategoryRequest $request )
    {
         $this->categoryService->store($request->all());
        return redirect()->back();
    }

    public function show(Request $request)
    {
        $orderId = $request->route('id');

        return response()->json([
            'data' => $this->categoryService->getOrderById($orderId)
        ]);
    }

    public function update($categoryId,Request $request)
    {
        $categoryDetails = $request->except(['_token', '_method' ]);
         response()->json([
            'data' => $this->categoryService->update($categoryId, $categoryDetails)
        ]);
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $orderId = $request->route('id');
        $this->categoryService->deleteOrder($orderId);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
    public function imageDelete($id)
    {
        $this->categoryService->imageDelete($id);
        return redirect()->back();
    }
}
