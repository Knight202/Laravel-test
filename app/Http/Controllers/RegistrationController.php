<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RegistrationController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $this->validate($request, [
        'meeting_id' => 'required',
        'user_id' => 'required'
      ]);

        $meeting_id = $request->input('meeting_id');
        $user_id = $request->input('user_id');

        $meeting = [
            'title' => "Maint Eng Sync",
            'description' => "SPOC & Production Support Stabilization Coordination",
            'time' => "201608150900EST",
            'user_id' => "bhattkal",
            'view_meeting' => [             // Gives URL to get the meeting just created
              'href' => 'api/v1/meeting/'.$meeting_id,
              'method' => 'GET'
            ]
          ];

        $user = [
          'name' => 'Kalpan Bhatt'
        ];

        $response = [
          'msg' => 'User Successfully registered for the meeting',
          'meeting' => $meeting,
          'user' => $user,
          'unregister' => [
            'href' => 'api/v1/meeting/registration/id',
            'method' => 'DELETE'
          ]
        ];

        return response()->json($response, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $meeting = [
          'title' => "Maint Eng Sync",
          'description' => "SPOC & Production Support Stabilization Coordination",
          'time' => "201608150900EST",
          'user_id' => "bhattkal",
          'view_meeting' => [             // Gives URL to get the meeting just created
            'href' => 'api/v1/meeting/'.$id,
            'method' => 'GET'
          ]
        ];

      $user = [
        'name' => 'Kalpan Bhatt'
      ];

      $response = [
        'msg' => 'User Successfully Un-registered for the meeting',
        'meeting' => $meeting,
        'user' => $user,
        'unregister' => [
          'href' => 'api/v1/meeting/registration',
          'method' => 'POST',
          'params' => 'meeting_id', 'user_id'
        ]
      ];

      return response()->json($response, 200);
    }
}
