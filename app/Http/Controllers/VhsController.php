<?php

namespace App\Http\Controllers;

use App\Models\Vhs;
use App\Http\Resources\VhsResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VhsController extends Controller
{
    /**
     * ===========1================
     * Create index function that returns all vhs data
     */
    public function index()
    {
        // get all vhs data
        // $vhss = ....

        // return the collection of vhss
        // return ....
    }

    /**
     * ===========2================
     * Create store function to add new vhs data
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

        // Create vhs data
        // $vhs = ....

        // return the created vhs as resource
        // return ....

    }

    /**
     * ===========3================
     * Create show function to display single vhs data by ID
     */
    public function show(string $id)
    {
        // Find vhs data by ID
        // $vhs = ....

        if (!$vhs) {
            return response()->json([
                // 'success' => false,
                // 'message' => ....
            ], 404);
        }

        // return the vhs as resource
        // return ....
    }

    /**
     * ===========4================
     * Create update function to modify existing vhs data
     */
    public function update(Request $request, string $id)
    {
        // Find vhs data by ID
        // $vhs = ....
        $vhs = Vhs::find($id);

        if (!$vhs) {
            return response()->json([
                'success' => false,
                'message' => 'VHS not found'
            ], 404);
        }

        // The request body are title, director and year
        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|required|string|max:255',
            'director' => 'sometimes|required|string|max:255',
            'year' => 'sometimes|required|integer|min:1900|max:' . date('Y')
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Update vhs data
        // $vhs->....
        $vhs->update($request->all());

        // return the updated vhs as resource
        // return ....
        return (new VhsResource($vhs))
            ->additional(['message' => 'VHS updated successfully'])
            ->response()
            ->setStatusCode(200);
    }

    /**
     * ===========5================
     * Create destroy function to delete vhs data
     */
    public function destroy(string $id)
    {
        // Find vhs data by ID
        // $vhs = ....

        if (!$vhs) {
            return response()->json([
                // 'success' => false,
                // 'message' => ....
            ], 404);
        }

        // Delete vhs data
        // $vhs->....

        // return success message
        // return ....
    }
}
