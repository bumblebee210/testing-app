<?php

namespace App\Http\Controllers;

use App\Models\Teams;
use App\Models\User;
use Illuminate\Http\Request;

class WorkspaceController extends Controller
{
    public function index()
    {
      //return view('pages.workspace');
      /**
 * Requires libcurl
 */

        $curl = curl_init();

        curl_setopt_array($curl, [
          CURLOPT_HTTPHEADER => [
            "Authorization: pk_84702088_YM5J05ATJWG4DWZSUPI2JRIC7M56HG0R"
          ],
          CURLOPT_URL => "https://api.clickup.com/api/v2/team",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_CUSTOMREQUEST => "GET",
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        if ($error) {
          echo "cURL Error #:" . $error;
        } else {
//$save = $this->store($response);
          echo $response->teams;
        }
        
    }

    public function store($data)
    {
      
      dd($data);
        foreach ($data as $key => $value) {
          
          
          // save workspace
          $team = Teams::create([
            'name' => $value->name,
            'color' => $value->color,
            'avatar' => $value->avatar
          ]);
        }
        
    }
}
