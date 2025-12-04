<?php

namespace App\Http\Controllers;

use App\Models\DvdAudio;
use App\Http\Resources\DvdaudioResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DvdaudioController extends Controller
{
    /**
     * ===========1================
     * Create index function that returns all dvd audio data
     */
    public function index()
    {
        // get all dvd audio data
        // $dvdaudios = ....
        $dvdaudios = DvdAudio::all();

        // return the collection of dvd audios
        // return ....
        return DvdaudioResource::collection($dvdaudios);
    }

    /**
     * ===========2================
     * Create store function to add new dvd audio data
     */
    public function store(Request $request)
    {
        // The request body are title, artist and year
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'year' => 'nullable|integer'
        ]);

        if ($validator->fails()) {
            return response()->json([
                // 'success' => false,
                // 'errors' => ....
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Create dvd audio data
        // $dvdaudio = ....
        $dvdaudio = Dvdaudio::create($validator->validated());

        // return the created dvd audio as resource
        // return ....
        return (new DvdaudioResource($dvdaudio))
                ->additional(['message'=>'Dvd Audio created successfully'])
                ->response()
                ->setStatusCode(201);

    }

    /**
     * ===========3================
     * Create show function to display single dvd audio data by ID
     */
    public function show(string $id)
    {
        // Find dvd audio data by ID
        // $dvdaudio = ....
        $dvdaudio = DvdAudio::find($id);

        if (!$dvdaudio) {
            return response()->json([
                // 'success' => false,
                // 'message' => ....
                'success' => false,
                'message' => 'Dvd Audio not found'
            ], 404);
        }

        // return the dvd audio as resource
        // return ....
        return new DvdaudioResource($dvdaudio);
    }

    /**
     * ===========4================
     * Create update function to modify existing dvd audio data
     */
    public function update(Request $request, string $id)
    {
        // Find dvd audio data by ID
        // $dvdaudio = ....
        $dvdaudio = DvdAudio::find($id);

        if (!$dvdaudio) {
            return response()->json([
                'success' => false,
                'message' => 'DVD Audio not found'
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

        // Update dvd audio data
        // $dvdaudio->....
        $dvdaudio->update($request->all());

        // return the updated dvd audio as resource
        // return ....
        return (new DvdaudioResource($dvdaudio))
            ->additional(['message' => 'DVD Audio updated successfully'])
            ->response()
            ->setStatusCode(200);
    }

    /**
     * ===========5================
     * Create destroy function to delete dvd audio data
     */
    public function destroy(string $id)
    {
        // Find dvd audio data by ID
        // $dvdaudio = ....
        $dvdaudio = DvdAudio::find($id);

        if (!$dvdaudio) {
            return response()->json([
                // 'success' => false,
                // 'message' => ....
                'success' => false,
                'message' => 'Dvd Audio not found'
            ], 404);
        }

        // Delete dvd audio data
        // $dvdaudio->....
        $dvdaudio->delete();

        // return success message
        // return ....
        return response()->json([
            'message'=> 'Dvd Audio deleted successfully'
        ], 200);
    }
}
