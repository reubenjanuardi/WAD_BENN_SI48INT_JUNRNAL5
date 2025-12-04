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
        // $blurays = ....

        // return the collection of blurays
        // return ....
    }

    /**
     * ===========2================
     * Create store function to add new bluray data
     */
    public function store(Request $request)
    {
        // The request body are title, director and year
        $validator = Validator::make($request->all(), [
            
        ]);

        if ($validator->fails()) {
            return response()->json([
                // 'success' => false,
                // 'errors' => ....
            ], 422);
        }

        // Create bluray data
        // $bluray = ....

        // return the created bluray as resource
        // return ....

    }

    /**
     * ===========3================
     * Create show function to display single bluray data by ID
     */
    public function show(string $id)
    {
        // Find bluray data by ID
        // $bluray = ....

        if (!$bluray) {
            return response()->json([
                // 'success' => false,
                // 'message' => ....
            ], 404);
        }

        // return the bluray as resource
        // return ....
    }

    /**
     * ===========4================
     * Create update function to modify existing bluray data
     */
    public function update(Request $request, string $id)
    {
        // The request body are title, director and year
        $validator = Validator::make($request->all(), [
            
        ]);

        // Find bluray data by ID
        // $bluray = ....

        if (!$bluray) {
            return response()->json([
                // 'success' => false,
                // 'message' => ....
            ], 404);
        }


        if ($validator->fails()) {
            return response()->json([
                // 'success' => false,
                // 'errors' => ....
            ], 422);
        }

        // Update bluray data
        // $bluray->....

        // return the updated bluray as resource
        // return ....
    }

    /**
     * ===========5================
     * Create destroy function to delete bluray data
     */
    public function destroy(string $id)
    {
        // Find bluray data by ID
        // $bluray = ....

        if (!$bluray) {
            return response()->json([
                // 'success' => false,
                // 'message' => ....
            ], 404);
        }

        // Delete bluray data
        // $bluray->....

        // return success message
        // return ....
    }
}
