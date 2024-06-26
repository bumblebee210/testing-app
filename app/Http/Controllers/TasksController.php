<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use App\Models\StatusTask;
use App\Models\Creator;
use App\Models\lists;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
      $tasks = Tasks::get();
      return view('pages.task', compact('tasks'));
    }

    public function detailTask($id)
    {
      $tasks = Tasks::findOrFail($id);
      return view('task.detail', compact('tasks'));
    }

    public function addtask()
    {
      $List= lists::get();
      return view('task.create', compact('List'));
    }

    public function gettask(){
            /**
       * Requires libcurl
       */
      // $statuses = [];
      // $assignees = [];
      // $custom_items = [];
     // $custom_fields=json_encode([]);
      
      $listId = $_POST['input_id']; //"901801273316";
      // $query = array(
      //   "archived" => "false",
      //   "include_markdown_description" => "true",
      //   "page" => "0",
      //   "order_by" => "string",
      //   "reverse" => "true",
      //   "subtasks" => "true",
      //   //"statuses" => $statuses,
      //   "include_closed" => "true",
      //  // "assignees" => $assignees,
      //   "watchers" => "string",
      //   "tags" => "string",
      //   "due_date_gt" => "0",
      //   "due_date_lt" => "0",
      //   "date_created_gt" => "0",
      //   "date_created_lt" => "0",
      //   "date_updated_gt" => "0",
      //   "date_updated_lt" => "0",
      //   "date_done_gt" => "0",
      //   "date_done_lt" => "0",
      //   //"custom_fields" => "string",
      //  //"custom_items" => $custom_items 
      // );

      $curl = curl_init();

      curl_setopt_array($curl, [
        CURLOPT_HTTPHEADER => [
          "Authorization: pk_84702088_YM5J05ATJWG4DWZSUPI2JRIC7M56HG0R"
        ],
        CURLOPT_URL => "https://api.clickup.com/api/v2/list/" . $listId . "/task?" , //. http_build_query($query)
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

    public function create(){
      /**
       * Requires libcurl
       */

      $listId = "901801273316";
      $query = array(
        "custom_task_ids" => "true",
        "team_id" => "123"
      );

      $curl = curl_init();

      //$status=[];
      $input_name = $_POST['input_name'];
      $input_descrip = $_POST['input_descrip'];
      $input_mark = $_POST['input_mark'];

      $payload = array(
        "name" => $input_name,
        "description" =>$input_descrip,
        "markdown_description" =>$input_mark, 
        "assignees" => array(
          183
        ),
        "watchers" => array(
          183
        ),
        "tags" => array(
          "tag name 1"
        ),
      // "status" => "status",
       "priority" => 3,
        "due_date" => 1508369194377,
        "due_date_time" => false,
        "time_estimate" => 8640000,
        "start_date" => 1567780450202,
        "start_date_time" => false,
        "notify_all" => true,
        "parent" => NULL,
        "links_to" => NULL,
        "check_required_custom_fields" => true,
        // "custom_fields" => array(
        //   array(
        //     "id" => "0a52c486-5f05-403b-b4fd-c512ff05131c",
        //     "value" => "This is a string of text added to a Custom Field."
        //   )
        // )
      );

      curl_setopt_array($curl, [
        CURLOPT_HTTPHEADER => [
          "Authorization: pk_84702088_YM5J05ATJWG4DWZSUPI2JRIC7M56HG0R",
          "Content-Type: application/json"
        ],
        CURLOPT_POSTFIELDS => json_encode($payload),
        CURLOPT_URL => "https://api.clickup.com/api/v2/list/" . $listId . "/task?" . http_build_query($query),
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
      }
      
    }

    public function store($data){
  
      $status_id=[];
      $status = StatusTask::create([
          'id_status' => $data['status']['id'],
          'status' => $data['status']['status'],
          'color' => $data['status']['color'],
          'orderindex' => $data['status']['orderindex'],
          'type' => $data['status']['type'],
        ]);
       array_push($status_id, $status['id']);
       $convert1 = implode(',', $status_id);

      $creator_id= [ ];
      $creator = Creator::create([
          'id_creator' => $data['creator']['id'],
          'username' => $data['creator']['username'],
          'color' => $data['creator']['color'],
          'email' => $data['creator']['email'],
          'profilePicture' => $data['creator']['profilePicture'],
        ]);   array_push($creator_id, $creator['id']);
      $convert2 = implode(',', $creator_id);

      $task = Tasks::create([
        'id_tasks' => $data['id'],
        'name' => $data['name'],
        'custom_id' => $data['custom_id'],
        'custom_item_id' => $data['custom_item_id'],
        'text_content' => $data['text_content'],
        'description' => $data['description'],
        //'markdown_description' => $data['markdown_description'],
        'status' => $convert1,
        'orderindex' => $data['orderindex'],
        'date_created' => $data['date_created'],
        'date_updated' => $data['date_updated'],
        'date_closed' => $data['date_closed'],
        'date_done' => $data['date_done'],
        'creator' => $convert2,
        //'assignees' => $data['assignees'],
        //'watchers' => $data[0],
        // 'checklists' => $data['checklists'],
        // 'tags' => $data['tags'],
        'parent' => $data['parent'],
        // 'priority' => $data['priority'],
        'due_date' => $data['due_date'],
        'start_date' => $data['start_date'],
        'time_estimate' => $data['time_estimate'],
        'time_spent' => $data['time_spent'],
        //'custom_fields' => $data['custom_fields'],
        //'list' => $data['list'],
        //'folder' => $data['folder'],
        //'space' => $data['space'],   
      ]);

      return redirect()->route('tasks');

    }

    public function edit($id)
    {

      //dd($id);
      $tasks = Tasks::findOrFail($id);
      
      return view('task.update',compact('tasks')); //
    }

    public function updatetask()
    {
            /**
       * Requires libcurl
       */

      $taskId = $_POST['id_tasks'];
      //dd($taskId);
      // $query = array(
      //   "custom_task_ids" => "true",
      //   "team_id" => "123"
      // );

      $curl = curl_init();

      $input_name = $_POST['input_name'];
      $input_textco = $_POST['text_content'];
      //$input_descrip = $_POST['description'];
      $payload = array(
        "name" => $input_name,
        "text_content" => $input_textco,
        //"description" => $input_descrip,
        //"status" => "in progress",
       // "priority" => 1,
        "due_date" => 1508369194377,
        "due_date_time" => false,
        "parent" => "abc1234",
        "time_estimate" => 8640000,
        "start_date" => 1567780450202,
        "start_date_time" => false,
        // "assignees" => array(
        //   "add" => array(
        //     182
        //   ),
        //   "rem" => array(
        //     183
        //   )
        // ),
        "archived" => false
      );

      curl_setopt_array($curl, [
        CURLOPT_HTTPHEADER => [
          "Authorization: pk_84702088_YM5J05ATJWG4DWZSUPI2JRIC7M56HG0R",
          "Content-Type: application/json"
        ],
        CURLOPT_POSTFIELDS => json_encode($payload),
        CURLOPT_URL => "https://api.clickup.com/api/v2/task/" . $taskId . "?", // . http_build_query($query)
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
       // echo $response;
      }
    }

    public function simpan($data)
    {
      //dd($data);


      $task = Tasks::where('id_tasks',$data)->update([

        'id_tasks'=>$data['id'],
        'name' => $data['name'],
        'custom_id' => $data['custom_id'],
        'custom_item_id' => $data['custom_item_id'],
        'text_content' => $data['text_content'],
        //'description' => $data['description'],
        //'markdown_description' => $data['markdown_description'],
        //'status' => $convert1,
        'orderindex' => $data['orderindex'],
        'date_created' => $data['date_created'],
        'date_updated' => $data['date_updated'],
        'date_closed' => $data['date_closed'],
        'date_done' => $data['date_done'],
        //'creator' => $convert2,
        //'assignees' => $data['assignees'],
        //'watchers' => $data[0],
        // 'checklists' => $data['checklists'],
        // 'tags' => $data['tags'],
        'parent' => $data['parent'],
        // 'priority' => $data['priority'],
        'due_date' => $data['due_date'],
        'start_date' => $data['start_date'],
        'time_estimate' => $data['time_estimate'],
        'time_spent' => $data['time_spent'],
      ]);
      //dd($task);
      return redirect()->route('tasks');
    }

    public function destroy($id)
    {
      /**
       * Requires libcurl
       */

      $taskId = $id;
      // $query = array(
      //   "custom_task_ids" => "true",
      //   "team_id" => "123"
      // );

      $curl = curl_init();

      curl_setopt_array($curl, [
        CURLOPT_HTTPHEADER => [
          "Authorization: YOUR_API_KEY_HERE",
          "Content-Type: application/json"
        ],
        CURLOPT_URL => "https://api.clickup.com/api/v2/task/" . $taskId . "?" , //. http_build_query($query)
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "DELETE",
      ]);

      $response = curl_exec($curl);
      $error = curl_error($curl);

      curl_close($curl);

      if ($error) {
        echo "cURL Error #:" . $error;
      } else {

        $task = Tasks::find($id);
        //dd($task);
        $task->delete($id);
        return redirect()->route('tasks');
        //echo $response;
      }
    }
}
