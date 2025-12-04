<?php

namespace App\Http\Controllers;

use App\Models\Cassette;
use App\Http\Resources\CassetteResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CassetteController extends Controller
{
    /**
     * ===========1================
     * Create index function that returns all cassette data
     */
    public function index()
    {
        // get all cassette data
        // $cassettes = ....

        // return the collection of cassettes
        // return ....
    }

    /**
     * ===========2================
     * Create store function to add new cassette data
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

        // Create cassette data
        // $cassette = ....

        // return the created cassette as resource
        // return ....

    }

    /**
     * ===========3================
     * Create show function to display single cassette data by ID
     */
    public function show(string $id)
    {
        // Find cassette data by ID
        // $cassette = ....

        if (!$cassette) {
            return response()->json([
                // 'success' => false,
                // 'message' => ....
            ], 404);
        }

        // return the cassette as resource
        // return ....
    }

    /**
     * ===========4================
     * Create update function to modify existing cassette data
     */
    public function update(Request $request, string $id)
    {
        // Find cassette data by ID
        // $cassette = ....
        $cassette = Cassette::find($id);

        if (!$cassette) {
            return response()->json([
                'success' => false,
                'message' => 'Cassette not found'
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

        // Update cassette data
        // $cassette->....
        $cassette->update($request->all());

        // return the updated cassette as resource
        // return ....
        return (new CassetteResource($cassette))
            ->additional(['message' => 'Cassette updated successfully'])
            ->response()
            ->setStatusCode(200);
    }

    /**
     * ===========5================
     * Create destroy function to delete cassette data
     */
    public function destroy(string $id)
    {
        // Find cassette data by ID
        // $cassette = ....

        if (!$cassette) {
            return response()->json([
                // 'success' => false,
                // 'message' => ....
            ], 404);
        }

        // Delete cassette data
        // $cassette->....

        // return success message
        // return ....
    }
}
