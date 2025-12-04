<?php

namespace App\Http\Controllers;

use App\Models\Dvd;
use App\Http\Resources\DvdResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DvdController extends Controller
{
    /**
     * ===========1================
     * Create index function that returns all dvd data
     */
    public function index()
    {
        // get all dvd data
        // $dvds = ....

        // return the collection of dvds
        // return ....
    }

    /**
     * ===========2================
     * Create store function to add new dvd data
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

        // Create dvd data
        // $dvd = ....

        // return the created dvd as resource
        // return ....

    }

    /**
     * ===========3================
     * Create show function to display single dvd data by ID
     */
    public function show(string $id)
    {
        // Find dvd data by ID
        // $dvd = ....

        if (!$dvd) {
            return response()->json([
                // 'success' => false,
                // 'message' => ....
            ], 404);
        }

        // return the dvd as resource
        // return ....
    }

    /**
     * ===========4================
     * Create update function to modify existing dvd data
     */
    public function update(Request $request, string $id)
    {
        // Find dvd data by ID
        // $dvd = ....
        $dvd = Dvd::find($id);

        if (!$dvd) {
            return response()->json([
                'success' => false,
                'message' => 'DVD not found'
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

        // Update dvd data
        // $dvd->....
        $dvd->update($request->all());

        // return the updated dvd as resource
        // return ....
        return (new DvdResource($dvd))
            ->additional(['message' => 'DVD updated successfully'])
            ->response()
            ->setStatusCode(200);
    }

    /**
     * ===========5================
     * Create destroy function to delete dvd data
     */
    public function destroy(string $id)
    {
        // Find dvd data by ID
        // $dvd = ....

        if (!$dvd) {
            return response()->json([
                // 'success' => false,
                // 'message' => ....
            ], 404);
        }

        // Delete dvd data
        // $dvd->....

        // return success message
        // return ....
    }
}
