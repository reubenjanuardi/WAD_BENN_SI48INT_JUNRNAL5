<?php

namespace App\Http\Controllers;

use App\Models\Bluray;
use App\Http\Resources\BlurayResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlurayController extends Controller
{
    /**
     * ===========1================
     * Create index function that returns all bluray data
     */
    public function index()
    {
        // get all bluray data
        $blurays = Bluray::all();
        // return the collection of blurays
        return BlurayResource::collection($blurays);
    }

    /**
     * ===========2================
     * Create store function to add new bluray data
     */
    public function store(Request $request)
    {
        // The request body are title, director and year
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'director' => 'required|string|max:255',
            'year' => 'required|integer|min:0'
        ]);

        if ($validator->fails()) {
            return response()->json([
                // 'success' => false,
                // 'errors' => ....
                'message' => 'Please check your request',
                'errors' => $validator->errors()
            ], 422);
        }

        // Create bluray data
        // $bluray = ....
        $bluray = Bluray::create($validator->validate());

        // return the created bluray as resource
        // return ....
        return (new BlurayResource($bluray))
                ->additional(['message' => 'Bluray created successfully'])
                ->response()
                ->setStatusCode(201);

    }

    /**
     * ===========3================
     * Create show function to display single bluray data by ID
     */
    public function show(string $id)
    {
        // Find bluray data by ID
        $bluray = Bluray::find($id);

        if (!$bluray) {
            return response()->json([
                // 'success' => false,
                // 'message' => ....
                'message' => 'Item not found'
            ], 404);
        }

        // return the bluray as resource
        return new BlurayResource($bluray);
    }

    /**
     * ===========4================
     * Create update function to modify existing bluray data
     */
    public function update(Request $request, string $id)
    {
        // The request body are title, director and year
        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|required|string|max:255',
            'director' => 'sometimes|required|string|max:255',
            'year' => 'sometimes|required|integer|min:0'
        ]);

        // Find bluray data by ID
        $bluray = Bluray::find($id);

        if (!$bluray) {
            return response()->json([
                // 'success' => false,
                // 'message' => ....
                'message' => 'Item not found'
            ], 404);
        }


        if ($validator->fails()) {
            return response()->json([
                // 'success' => false,
                // 'errors' => ....
                'message' => 'Please check your request',
                'errors' => $validator->errors()
            ], 422);
        }

        // Update bluray data
        $bluray->update($validator->validate());

        // return the updated bluray as resource
        return (new BlurayResource($bluray))
            ->additional(['message' => 'Bluray updated successfully'])
            ->response()
            ->setStatusCode(200);
    }

    /**
     * ===========5================
     * Create destroy function to delete bluray data
     */
    public function destroy(string $id)
    {
        // Find bluray data by ID
        $bluray = Bluray::find($id);

        if (!$bluray) {
            return response()->json([
                // 'success' => false,
                // 'message' => ....
                'message' => 'item not found'
            ], 404);
        }

        // Delete bluray data
        $bluray->delete();

        // return success message
        return response()->json(['message' => 'Bluray deleted successfully'], 200);
    }
}
