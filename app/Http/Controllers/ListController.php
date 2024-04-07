<?php

namespace App\Http\Controllers;

use App\Models\folder;
use App\Models\Space;
use App\Models\lists;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function index()
    {
      $list = lists::get();
      //dd($list);
      return view('pages.list',compact('list'));
    }

    public function getList(){
            /**
       * Requires libcurl
       */

      $spaceId = "90180685587";
      $query = array(
        "archived" => "false"
      );

      $curl = curl_init();

      curl_setopt_array($curl, [
        CURLOPT_HTTPHEADER => [
          "Authorization: pk_84702088_YM5J05ATJWG4DWZSUPI2JRIC7M56HG0R"
        ],
        CURLOPT_URL => "https://api.clickup.com/api/v2/space/" . $spaceId . "/list?" . http_build_query($query),
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
       // $save = $this->store($response);
		  dd($response);
		  //dd($save);
      
      }

    }

    public function detailList($id)
    {
      $list = lists::findOrFail($id);
      return view('list.detail', compact('list'));
    }

    public function addlist(){
      return view('list.create');
    }

    public function createList()
    {
      /**
 * Requires libcurl
 */ 
    $spaceId = "90180685587";
    
    $curl = curl_init();

    $input_name = $_POST['input_name'];
    $input_content = $_POST['input_content'];
    $payload = array(
      "name" => $input_name,
      "content" => $input_content,
      //"due_date" => 1567780450202,
      "due_date_time" => false,
      "priority" => 1,
      //"assignee" => 183,
      "status" => "red"
    );

    curl_setopt_array($curl, [
      CURLOPT_HTTPHEADER => [
        "Authorization: pk_84702088_YM5J05ATJWG4DWZSUPI2JRIC7M56HG0R",
        "Content-Type: application/json"
      ],
      CURLOPT_POSTFIELDS => json_encode($payload),
      CURLOPT_URL => "https://api.clickup.com/api/v2/space/" . $spaceId . "/list",
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
		//dd($response);
		  echo $save;
      //echo $response;
    }
    }
    public function store($data){
     // dd($data);
      $list = lists::create([
        'id'=>$data['id'],
        'name'=>$data['name'],
        'orderindex'=>$data['orderindex'],
        'content'=>$data['content'],
        //'asignee'=>$data['asignee'],
        //'task_count'=>$data['task_count'],
        'due_date'=>$data['due_date'],
        'start_date'=>$data['start_date'],
        'archived'=>$data['archived'],
        'override_statuses'=>$data['override_statuses'],
        'permission_level'=>$data['permission_level'],
      ]);
      return redirect()->route('list');
    }

    public function edit($id){

      $list = lists::findOrFail($id);
      //  dd($list);
      return view('list.update',compact('list'));
    }

    public function updatelist(){
      /**
 * Requires libcurl
 */

      $listId = $_POST['id'];
      $curl = curl_init();

      $input_name = $_POST['input_name'];
      $input_content = $_POST['input_content'];
      $payload = array(
        "name" => $input_name,
        "content" => $input_content,
        //"due_date" => 1567780450202,
        "due_date_time" => true,
        "priority" => 2,
       // "assignee" => "none",
        "status" => "red",
        "unset_status" => true
      );

      curl_setopt_array($curl, [
        CURLOPT_HTTPHEADER => [
          "Authorization: pk_84702088_YM5J05ATJWG4DWZSUPI2JRIC7M56HG0R",
          "Content-Type: application/json"
        ],
        CURLOPT_POSTFIELDS => json_encode($payload),
        CURLOPT_URL => "https://api.clickup.com/api/v2/list/" . $listId,
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
        echo $save;
      }
    }

    public function simpan($data){
      //dd($data);
      $list = lists::where('id',$data)->update([
        'id'=>$data['id'],
        'name'=>$data['name'],
        'orderindex'=>$data['orderindex'],
        'content'=>$data['content'],
        //'asignee'=>$data['asignee'],
        //'task_count'=>$data['task_count'],
        'due_date'=>$data['due_date'],
        'start_date'=>$data['start_date'],
        'archived'=>$data['archived'],
        'override_statuses'=>$data['override_statuses'],
        'permission_level'=>$data['permission_level'],
      ]);
      return redirect()->route('list');
    }

    public function destroy($id){
      /**
 * Requires libcurl
 */
      $listId = $id;
      $curl = curl_init();

      curl_setopt_array($curl, [
        CURLOPT_HTTPHEADER => [
          "Authorization: pk_84702088_YM5J05ATJWG4DWZSUPI2JRIC7M56HG0R",
          "Content-Type: content king"
        ],
        CURLOPT_URL => "https://api.clickup.com/api/v2/list/" . $listId,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "DELETE",
      ]);

      $response = curl_exec($curl);
      $error = curl_error($curl);

      curl_close($curl);

      if ($error) {
        echo "cURL Error #:" . $error;
      } else {
        $list = lists::find($id);
		    $list->delete($id);
        return redirect()->route('list');
      }
    }

}
