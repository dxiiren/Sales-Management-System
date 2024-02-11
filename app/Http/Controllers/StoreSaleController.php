<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreSaleRequest;
use App\Models\Sale;
use Illuminate\Http\JsonResponse;

class StoreSaleController extends Controller
{
    /**
     * Store a newly created sale.
     *
     * @return JsonResponse
     */
    public function __invoke(StoreSaleRequest $request): JsonResponse
    {
        return response()->json([
            'message' => 'Sale created successfully',
            'sale' => Sale::create($request->validated()),
        ]);
    }

}
