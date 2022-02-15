<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function index()
    {
        $trips = Trip::all();
        return response()->json([
            'status' => 'success',
            'statusCode' => 200,
            'data' => $trips
        ]);
    }
    public function store()
    {
        $data = request()->validate([
            'user_id' => 'required',
            'title' => 'required',
            'destination' => 'required|string',
            'start_date' => 'required',
            'end_date' => 'required',
            'type_of_trip' => 'required',
        ]);
        Trip::create($data);
        return response()->json([
            'status' => 'success',
            'statusCode' => 201,
            'message' => 'Insert Data Successfully'
        ]);
    }
    public function update($trip_id)
    {
        $trip = Trip::find($trip_id);
        if (!$trip) {
            return response()->json([
                'status' => 'error',
                'statusCode' => 404,
                'message' => 'Trip is not found'
            ], 404);
        }
        $trip->fill(request()->all());
        return response()->json([
            'status' => 'success',
            'statusCode' => 200,
            'message' => 'Update Data Successfully',
            "data" => $trip
        ]);
    }
    public function destroy($trip_id)
    {
        $trip = Trip::find($trip_id);
        if (!$trip) {
            return response()->json([
                'status' => 'error',
                'statusCode' => 404,
                'message' => 'Trip is not found'
            ], 404);
        }
        $trip->delete();
        return response()->json([
            'status' => 'success',
            'statusCode' => 200,
            'message' => 'Destroy Data Successfully',
        ]);
    }
    public function show($trip_id)
    {
        $trip = Trip::find($trip_id);
        if (!$trip) {
            return response()->json([
                'status' => 'error',
                'statusCode' => 404,
                'message' => 'Trip is not found'
            ], 404);
        }
        return response()->json([
            'status' => 'success',
            'statusCode' => 200,
            "data" => $trip
        ]);
    }
    public function showByUserId($user_id)
    {
        $trips = Trip::where('user_id', $user_id)->get();
        if (count($trips) <= 0) {
            return response()->json([
                'status' => 'error',
                'statusCode' => 404,
                'message' => 'User Dont have trip'
            ], 404);
        }
        return response()->json([
            'status' => 'success',
            'statusCode' => 200,
            "data" => $trips
        ]);
    }
}
