<?php

namespace App\Http\Controllers;

use App\Models\Space;
use App\Models\Status;
use App\Models\Teams;
use App\Models\Feature;
use Illuminate\Http\Request;

class SpaceController extends Controller
{
    public function index()
    {
	  $spaces = Space::with('statuses')->paginate();
	  
      return view('pages.space', compact('spaces'));
    }

    public function getSpace()
    {
		    	/**
		 * Requires libcurl
		 */

		$teamId = "9018177798";
		$query = array(
		  "archived" => "false"
		);

		$curl = curl_init();

		curl_setopt_array($curl, [
		  CURLOPT_HTTPHEADER => [
		    "Authorization: pk_84702088_YM5J05ATJWG4DWZSUPI2JRIC7M56HG0R"
		  ],
		  CURLOPT_URL => "https://api.clickup.com/api/v2/team/" . $teamId . "/space?" . http_build_query($query),
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
		  dd($response);
		}
    }

    public function detailSpace($id)
    {
    	$space = Space::findOrFail($id);
        return view('space.detail', compact('space'));
    }


    public function add()
    {
    	return view('space.create');
    }

    public function Create()
    {
		    	
		$teamId = "9018177798";
		$curl = curl_init();

		$input_name = $_POST['input_name'];
		$payload = array(
		  "name" => $input_name,
		  "multiple_assignees" => true,
		  "features" => array(
		    "due_dates" => array(
		      "enabled" => true,
		      "start_date" => false,
		      "remap_due_dates" => true,
		      "remap_closed_due_date" => false
		    ),
		    "time_tracking" => array(
		      "enabled" => false
		    ),
		    "tags" => array(
		      "enabled" => true
		    ),
		    "time_estimates" => array(
		      "enabled" => true
		    ),
		    "checklists" => array(
		      "enabled" => true
		    ),
		    "custom_fields" => array(
		      "enabled" => true
		    ),
		    "remap_dependencies" => array(
		      "enabled" => true
		    ),
		    "dependency_warning" => array(
		      "enabled" => true
		    ),
		    "portfolios" => array(
		      "enabled" => true
		    )
		  )
		);

		curl_setopt_array($curl, [
		  CURLOPT_HTTPHEADER => [
		    "Authorization: pk_84702088_YM5J05ATJWG4DWZSUPI2JRIC7M56HG0R",
		    "Content-Type: application/json"
		  ],
		  CURLOPT_POSTFIELDS => json_encode($payload),
		  CURLOPT_URL => "https://api.clickup.com/api/v2/team/" . $teamId . "/space",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_CUSTOMREQUEST => "POST",
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

		//echo $response;
		 	//dd($response);
		}

    }

    public function store($data)
    {
		$status_id=[];
		foreach ($data['statuses'] as $key => $vstatus){
			$status = Status::create([
			'status' => $vstatus['status'],
			'type' => $vstatus['type'],
			'orderindex' => $vstatus['orderindex'],
			'color' => $vstatus['color'],
			]);
			array_push($status_id, $status['id']);
		}$convert = implode(',', $status_id);
				
		// $feature_id=[];
		// foreach ($data['features'] as $key => $vfeature){
		// 	//dd($data['features']);
		// 	$feature = Feature::create([
		// 		'due_dates'=> $vfeature['due_dates'],
		// 	    'time_tracking'=> $vfeature['time_tracking'],
		// 	    'tags'=> $vfeature['tags'],
		// 	    'time_estimates'=>$vfeature['time_estimates'],
		// 	    'checklists'=> $vfeature['checklists'],
		// 	    'custom_fields'=> $vfeature['custom_fields'],
		// 	    'remap_dependencies'=> $vfeature['remap_dependencies'],
		// 	    'dependency_warning'=> $vfeature['dependency_warning'],
		// 	    'portfolios'=> $vfeature['portfolios'],
		// 		]);
		// 		array_push($feature_id, $feature['id']);
		// }$convert2 = implode(',', $feature_id);
		
		$space = Space::create([
			'id'=>$data['id'],
			'name'=>$data['name'],
			'private' => $data['private'],
			'color' => $data['color'],
			'avatar' => $data['avatar'],
			'admin_can_manage' => $data['admin_can_manage'],
			'archived' => $data['archived'],
			'statuses' => $convert,
			'multiple_assignees' => $data['multiple_assignees'],
			//'features' => $data['features'],
		]);

		return redirect()->route('space');

    }

	public function edit($id){
	
		$spaces = Space::findOrFail($id);
	//	$status = Status::findOrFail($id);
		//dd($spaces);	
		return view('space.update',compact('spaces'));
	}

	public function update(Request $request, $id)
	{
		/**
 * Requires libcurl
 */

		$spaceId = $_POST['id'];
		$curl = curl_init();

		$input_name = $_POST['input_name'];
		$input_color = $_POST['input_color'];
		$payload = array(
		"name" => $input_name,
		"color" => $input_color,
		"private" => false,
		//"admin_can_manage" => false,
		"multiple_assignees" => false,
		// "features" => array(
		// 	"due_dates" => array(
		// 	"enabled" => false,
		// 	"start_date" => false,
		// 	"remap_due_dates" => false,
		// 	"remap_closed_due_date" => false
		// 	),
		// 	"time_tracking" => array(
		// 	"enabled" => false
		// 	),
		// 	"tags" => array(
		// 	"enabled" => false
		// 	),
		// 	"time_estimates" => array(
		// 	"enabled" => false
		// 	),
		// 	"checklists" => array(
		// 	"enabled" => true
		// 	),
		// 	"custom_fields" => array(
		// 	"enabled" => true
		// 	),
		// 	"remap_dependencies" => array(
		// 	"enabled" => false
		// 	),
		// 	"dependency_warning" => array(
		// 	"enabled" => false
		// 	),
		// 	"portfolios" => array(
		// 	"enabled" => false
		// 	)
		// )
		);

		curl_setopt_array($curl, [
		CURLOPT_HTTPHEADER => [
			"Authorization: pk_84702088_YM5J05ATJWG4DWZSUPI2JRIC7M56HG0R",
			"Content-Type: application/json"
		],
		CURLOPT_POSTFIELDS => json_encode($payload),
		CURLOPT_URL => "https://api.clickup.com/api/v2/space/" . $spaceId,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_CUSTOMREQUEST => "PUT",
		]);

		$response = curl_exec($curl);
		$error = curl_error($curl);

		curl_close($curl);

		if ($error) {
		echo "cURL Error #:" . $error;
		} else {
			$response=json_decode($response,true);
          	$save = $this->simpan($response);
		//dd($response);
		echo $save;
		}
	}

	public function simpan( $data){
		
		// $status_id=[];
		// foreach ($data['statuses'] as $key => $vstatus){
		// 	$status = Status::where('id', $data)->update([
		// 	'status' => $vstatus['status'],
		// 	'type' => $vstatus['type'],
		// 	'orderindex' => $vstatus['orderindex'],
		// 	'color' => $vstatus['color'],
		// 	]);
		// 	array_push($status_id, $status['id']);
		// }$convert = implode(',', $status_id);

		$space = Space::where('id',$data)->update([
			'id'=>$data['id'],
			'name'=>$data['name'],
			'private' => $data['private'],
			'color' => $data['color'],
			'avatar' => $data['avatar'],
			'admin_can_manage' => $data['admin_can_manage'],
			'archived' => $data['archived'],
			//'statuses' => $convert,
			'multiple_assignees' => $data['multiple_assignees'],
		]);
		//dd($space);
		return redirect()->route('space');

	}

	

	public function destroy($id){

		//dd($id);
		/**
 * Requires libcurl
 */		//$spaces = Space::findOrFail($id);
		$spaceId = $id;
		$curl = curl_init();

		curl_setopt_array($curl, [
		CURLOPT_HTTPHEADER => [
			"Authorization: pk_84702088_YM5J05ATJWG4DWZSUPI2JRIC7M56HG0R"
		],
		CURLOPT_URL => "https://api.clickup.com/api/v2/space/" . $spaceId,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_CUSTOMREQUEST => "DELETE",
		]);

		$response = curl_exec($curl);
		$error = curl_error($curl);

		curl_close($curl);

		if ($error) {
		echo "cURL Error #:" . $error;
		} else {
		
		$space = Space::find($id);
		$space->delete($id);
		return redirect()->route('space');
		}
	}


}
