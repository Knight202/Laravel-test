<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MeetingController extends Controller
{
    public function __constructor(){
      //$this->middleware = ('name');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "It's Working!";
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "It's Working!";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = $request->input('title');
        $description = $request->input('description');
        $time = $request->input('time');
        $user_id = $request->input('user_id');
        //return "It's Not Working!";

        $meeting = [
          'title' => 'SPE Meeting',
          'description' => 'To Discuss further action on Layon_Publish code fix',
          'time' => '6 PM'
        ];

        $response = [
          'msg' => 'Meeting Successfully Created',
          'meeting' => $meeting,
        ];
        return response()->json($response, 201);
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
      $title = $request->input('title');
      $description = $request->input('description');
      $time = $request->input('time');
      $user_id = $request->input('user_id');
        return "It's Working!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "It's Working!";
    }
}
