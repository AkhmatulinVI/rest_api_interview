<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Http\Resources\ApplicationResource;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Application::all();
      //  return ApplicationResource::collection(Application::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $application_topic = $request->input('topic');
        $application_message = $request->input('message');
        $application_user_id = $request->input('user_id');

        $application = Application::create([
            'topic' => $application_topic,
            'message' => $application_message,
            'user_id' => $application_user_id,
        ]);
        return response()->json([
            'id'=>$application->id,
            'topic'=>$application->topic,
            'message'=>$application->message,
            'comment'=>$application->comment,
            'user_id'=>$application->user_id,
            'status_id'=>$application->status_id,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        $applications = $user->applications;
        return $applications;
    }
    public function getStatus($id)
    {
        $application = Application::find($id);

        return response()->json([
            'status_id'=>$application->status_id,
        ], );

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $application_comment = $request->input('comment');
        $application_status_id = $request->input('status_id');

        $application = Application::find($id);

        $application->update([
            'comment' => $application_comment,
            'status_id' => $application_status_id,
        ]);

       // return $request;
        return response()->json([
            //'comment'=>$application_comment,
            //'status_id'=>$application_status_id,

            'comment'=>$application->comment,
            'status_id'=>$application->status_id,
            //'data' => new ApplicationResource($application)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
