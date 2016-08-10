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
    public function index(){
      $meeting1 = [
        'title' => "Maintenance Sheet Review",
        'description' => "Consolodated Maintenance Spreadsheet - Review track status",
        'time' => "201608101630EST",
        'user_id' => "bhattkal",
        'view_meeting' => [             // Gives URL to get the meeting just created
          'href' => 'api/v1/meeting/1',
          'method' => 'GET'
        ]
      ];
      $meeting2 = [
        'title' => "Maint Eng Sync",
        'description' => "SPOC & Production Support Stabilization Coordination",
        'time' => "201608150900EST",
        'user_id' => "bhattkal",
        'view_meeting' => [             // Gives URL to get the meeting just created
          'href' => 'api/v1/meeting/2',
          'method' => 'GET'
        ]
      ];

      $response = [
          'msg' => 'List of all meetings',
          'meetings' => [
            $meeting1, $meeting2
          ]
      ];

      return response()->json($response, 200);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){

      $meeting = [
        'title' => "Maintenance Sheet Review",
        'description' => "Consolodated Maintenance Spreadsheet - Review track status",
        'time' => "201608101630EST",
        'user_id' => "bhattkal",
        'view_meeting' => [             // Gives URL to get the meeting just created
          'href' => 'api/v1/meeting/'.$id,
          'method' => 'GET'
        ]
      ];

      $response = [
          'msg' => 'Meeting Informatoin',
          'meetings' => $meeting
      ];

      return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

      $this->validate($request, [
        'title' =>'required',
        'description' => 'required',
        'time' => 'required|date_format:YmdHie',
        'user_id' => 'required'
      ]);

        $title = $request->input('title');
        $description = $request->input('description');
        $time = $request->input('time');
        $user_id = $request->input('user_id');

        $meeting = [
          'title' => $title,
          'description' => $description,
          'time' => $time,
          'user_id' => $user_id,
          'view_meeting' => [             // Gives URL to get the meeting just created
            'href' => 'api/v1/meeting/1',
            'method' => 'GET'
          ]
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
    public function update(Request $request, $id){

      $this->validate($request, [
        'title' =>'required',
        'description' => 'required',
        'time' => 'required|date_format:YmdHie',
        'user_id' => 'required'
      ]);

      $title = $request->input('title');
      $description = $request->input('description');
      $time = $request->input('time');
      $user_id = $request->input('user_id');

      $meeting = [
        'title' => $title,
        'description' => $description,
        'time' => $time,
        'user_id' => $user_id,
        'view_meeting' => [             // Gives URL to get the meeting just updated
          'href' => 'api/v1/meeting/'.$id,
          'method' => 'GET'
        ]
      ];

      $response = [
        'msg' => 'Meeting Successfully Updated',
        'meeting' => $meeting,
      ];
      return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

      $response = [
          'msg' => 'Meeting deleted with id: '.$id,
          'create' => [             // Gives URL to create a new meeting
            'href' => 'api/v1/meeting',
            'method' => 'POST',
            'params' => 'title, description, time'
          ]
      ];

      return response()->json($response, 200);
    }
}
