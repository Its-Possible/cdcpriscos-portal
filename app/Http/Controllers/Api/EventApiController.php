<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EventApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        //
        $events = Event::all();

        return response()->json([
            'success' => true,
            'message' => 'Events fetched successfully',
            'data' => $events
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEventRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreEventRequest $request)
    {
        //
        $validated = $request->validated();

        if(!$validated){
            return response()->json([
                'success' => false,
                'message' => 'Event could not be created, missing fields, try again please!',
                'data' => []
            ], Response::HTTP_BAD_REQUEST);
        }

        $event = new Event();
        $event->user_id = 1;
        $event->title = $request->title;
        $event->description = $request->description;
        $event->location = $request->location;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;

        if($event->save()){
            return response()->json([
                'success' => true,
                'message' => 'Event created successfully',
                'data' => $event
            ]);
        }

        return response()->json([
            'error' => true,
            'message' => 'Event could not be created',
            'data' => ''
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
