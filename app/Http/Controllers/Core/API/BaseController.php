<?php

namespace App\Http\Controllers\Core\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;

class BaseController extends Controller
{

    protected $validator;
    protected $model;

    public function __construct(Validator $validator, Model $model)
    {
        $this->validator = $validator;
        $this->model = $model;
    }

    public function index(Request $request)
    {
        try {
            $perPage = $request->input('per_page', 10);

            $items = $this->model
                ->orderByDesc('created_at')
                ->paginate($perPage);

            if ($items->isEmpty()) {
                return response()->json([
                    'error' => 'No data found',
                    'code' => 404,
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => $items,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Something went wrong',
                'message' => $e->getMessage(),
                'code' => 500,
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = $this->validator->make($request->all(), $this->model->getValidationRules());

            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors(),
                    'code' => 400,
                ], 400);
            }

            $item = $this->model->create($request->all());

            if (!$item) {
                throw new \Exception('Failed to create item.');
            }

            return response()->json([
                'success' => true,
                'data' => $item,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to create item',
                'message' => $e->getMessage(),
                'code' => 500,
            ], 500);
        }
    }

    public function show(string $id)
    {
        try {
            $item = $this->model->find($id);

            if (is_null($item)) {
                return response()->json([
                    'error' => 'Item Not Found',
                    'code' => 404,
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => $item,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to fetch item',
                'message' => $e->getMessage(),
                'code' => 500,
            ], 500);
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $item = $this->model->find($id);

            if (is_null($item)) {
                return response()->json([
                    'error' => 'Item Not Found',
                    'code' => 404,
                ], 404);
            }

            $validator = $this->validator->make($request->all(), $this->model->getValidationRules());

            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors(),
                    'code' => 400,
                ], 400);
            }

            $item->update($request->all());

            return response()->json([
                'success' => true,
                'data' => $item,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to update item',
                'message' => $e->getMessage(),
                'code' => 500,
            ], 500);
        }
    }

    public function destroy(string $id)
    {
        try {
            $item = $this->model->find($id);

            if (is_null($item)) {
                return response()->json([
                    'error' => 'Item not found',
                    'code' => 404,
                ], 404);
            }

            $item->delete();

            return response()->json([
                'success' => true,
                'message' => 'Item deleted successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to delete item',
                'message' => $e->getMessage(),
                'code' => 500,
            ], 500);
        }
    }
}