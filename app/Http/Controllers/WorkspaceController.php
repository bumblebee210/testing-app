<?php

namespace App\Http\Controllers;

use App\Models\Teams;
use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;

class WorkspaceController extends Controller
{

  public function index()
  {
    $teams = Teams::orderBy('id_teams')->get();
    return view('pages.workspace', compact('teams'));
  }

  


  public function getWorkspace()
    {
      //return view('pages.workspace');
      /**
 * Requires libcurl
 */

        $curl = curl_init();

        //$url= $_GET["input_url"];
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
          $response=json_decode($response,true);
          $save = $this->store($response);
          echo $save;
           //dd ($response);
        }
        
    }


    public function store($data)
    {
      
     $user_id=[];
      //dd($data);
        foreach ( $data['teams'] as $key => $value) {
          //dd($data['members']);
          
          //Create table User
          foreach ($value['members'] as $key => $value_m) {
          //dd($value_m);
            $user = User::create([
              'username' => $value_m['user']['username'],
              'email' => $value_m['user']['email'],
              'color' => $value_m['user']['color'],
              'profilePicture' => $value_m['user']['profilePicture'],
              'initials' => $value_m['user']['initials'],
              'role' => $value_m['user']['role'],
              'custom_role' => $value_m['user']['custom_role'],
              'last_active' => $value_m['user']['last_active'],
              'date_joined' => $value_m['user']['date_joined'],
              'date_invited' => $value_m['user']['date_invited'],
            ]);
            
            array_push($user_id, $user['id']);

          }
          $convert = implode(',', $user_id);
           //Tutup table User   

          //Create table Teams
          $team = Teams::create([
            'name' => $value['name'],
            'color' => $value['color'],
            'avatar' => $value['avatar'],
            'members' => $convert,
            
          ]);
           


          //array_push($team_id, $team['id']);
          //Tutup table Teams      
        }
       
        //$get= $data['teams'];
        //$work = ($get[0]);
        //echo $get;
        //dd($work['name']);

        //return view('work.get', compact('work'));
         return redirect()->route('tableWorkspace');
        
    }

    public function get($data)
  {
    dd($data);
    
  }

    
}
