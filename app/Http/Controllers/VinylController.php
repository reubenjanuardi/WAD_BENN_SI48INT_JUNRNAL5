<?php

namespace App\Http\Controllers;

use App\Models\Vinyl;
use App\Http\Resources\VinylResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VinylController extends Controller
{
    /**
     * ===========1================
     * Create index function that returns all vinyl data
     */
    public function index()
    {
        // get all vinyl data
        // $vinyls = ....

        // return the collection of vinyls
        // return ....
    }

    /**
     * ===========2================
     * Create store function to add new vinyl data
     */
    public function store(Request $request)
    {
        // The request body are title, artist and year
        $validator = Validator::make($request->all(), [
            
        ]);

        if ($validator->fails()) {
            return response()->json([
                // 'success' => false,
                // 'errors' => ....
            ], 422);
        }

        // Create vinyl data
        // $vinyl = ....

        // return the created vinyl as resource
        // return ....

    }

    /**
     * ===========3================
     * Create show function to display single vinyl data by ID
     */
    public function show(string $id)
    {
        // Find vinyl data by ID
        // $vinyl = ....

        if (!$vinyl) {
            return response()->json([
                // 'success' => false,
                // 'message' => ....
            ], 404);
        }

        // return the vinyl as resource
        // return ....
    }

    /**
     * ===========4================
     * Create update function to modify existing vinyl data
     */
    public function update(Request $request, string $id)
    {
        // Find vinyl data by ID
        // $vinyl = ....
        $vinyl = Vinyl::find($id);

        if (!$vinyl) {
            return response()->json([
                'success' => false,
                'message' => 'Vinyl not found'
            ], 404);
        }

        // The request body are title, artist and year
        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|required|string|max:255',
            'artist' => 'sometimes|required|string|max:255',
            'year' => 'sometimes|required|integer|min:1900|max:' . date('Y')
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Update vinyl data
        // $vinyl->....
        $vinyl->update($request->all());

        // return the updated vinyl as resource
        // return ....
        return (new VinylResource($vinyl))
            ->additional(['message' => 'Vinyl updated successfully'])
            ->response()
            ->setStatusCode(200);
    }

    /**
     * ===========5================
     * Create destroy function to delete vinyl data
     */
    public function destroy(string $id)
    {
        // Find vinyl data by ID
        // $vinyl = ....

        if (!$vinyl) {
            return response()->json([
                // 'success' => false,
                // 'message' => ....
            ], 404);
        }

        // Delete vinyl data
        // $vinyl->....

        // return success message
        // return ....
    }
}
