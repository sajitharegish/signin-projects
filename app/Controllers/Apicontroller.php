<?php

namespace App\Controllers;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\Default_model;
// use App\Libraries\JWT;


class Apicontroller extends ResourceController
{
    protected $format    = 'json';

    public function add_task()
    {
        $request = $this->request;
       
        
        $empid=1;
        $data = [];
        if ($this->request->getMethod() == 'post') {
            
                $formData = [
                    'project_id' => $this->request->getVar('project_id'),
                    'task_title' => $this->request->getVar('task_title'),
                    'status'=>$this->request->getVar('status'),
                    'assigned_by' => $empid, 
                    'due_date' => $this->request->getVar('due_date'),
  
                    
                ];
                $db = db_connect();
               $defaultModel= new Default_model($db);

              $result= $defaultModel->insert_to_tb('tasks', $formData);
              
                $db = db_connect();
                $lastInsertedID = $db->insertID(); 

                $selected_employees = $this->request->getVar('emp_id');

        
                $emp_data = [];
                foreach ($selected_employees as $emp_id) {
                    $emp_data[] = [
                        'task_id' => $lastInsertedID, 
                        'emp_id' => $emp_id,

                    ];
                }
        
                $defaultModel->insert_toRelatetbl($emp_data);
                $formData['id']=$lastInsertedID;
                $response = array(
                    'success' => true,
                    'task' => $formData  // Pass the task details
                );
                return $this->response->setJSON($response);

               
        }
        
        if(isset($_GET['search']))
        {   $db = db_connect();
            $defaultModel= new Default_model($db);
           $search = $this->request->getGet('search');
      
            $data['task'] = $defaultModel->select_task($empid,$search);
            $data['progress'] = $defaultModel->select_taskProgress($empid,$search);
            $data['completed'] = $defaultModel->select_taskCompleted($empid,$search);
            $data['verified'] = $defaultModel->select_verified($empid,$search);

            $data['project'] = $defaultModel->select_all_list('tbl_project');
            $data['employees'] = $defaultModel->select_all_list('tbl_employees');
            if (empty($data['task']) && empty($data['progress']) && empty($data['completed']) && empty($data['verified'])) {
                // Display "result not found" message
                $data['result_message'] = "No results found for '$search'";
            }
            
          
            return $this->response->setJSON($data,200,);

        }
        else
        {
            $db = db_connect();
            $defaultModel= new Default_model($db);
            $search='';
            $data['task'] =  $defaultModel->select_task($empid,$search);
            $data['progress'] =  $defaultModel->select_taskProgress($empid,$search);
            $data['completed'] =  $defaultModel->select_taskCompleted($empid,$search);
            $data['verified'] =  $defaultModel->select_verified($empid,$search);

            $data['project'] =  $defaultModel->select_all_list('tbl_project');
            $data['employees'] =  $defaultModel->select_all_list('tbl_employees');


            return $this->response->setJSON($data,200);


        }
       
    }
    public function edit_task(){
        $db = db_connect();
        $defaultModel= new Default_model($db);
        $p_id= $this->request->getPost('id');
        $data =[];
        $data['task']=$defaultModel->select_by_id('tasks', $p_id);
        $data['project1'] = $defaultModel->select_all_list('tbl_project');
        $data['employees'] = $defaultModel->select_all_list('tbl_employees');

        return $this->response->setJSON($data);
        
    }
    public function updateTaskStatus() {
        $taskId = $this->request->getPost('task_id');
        $status = $this->request->getPost('status');

        $data=[
            'status'=>$status
        ];
        $db = db_connect();
        $defaultModel= new Default_model($db);

        $defaultModel->update_from_tb('tasks','id',$taskId,$data);

        
        $response = array('status' => 'success');
        echo json_encode($response);
        
    }
    

    public function send_response($data, $status = true, $message = "")
    {    
        $response['status'] = $status;
        $response['message'] = $message;
        $response['data'] = $data;
    
        return $this->respond($response);
    }

    public function update_task($id=0){
        $up_id=$id;

        $up_data=[
            'project_id'     => $this->request->getVar('project_id'),
            'task_title'     => $this->request->getVar('task_title'),
           
        ];
        $db = db_connect();
        $defaultModel= new Default_model($db);

        $defaultModel->update_from_tb('tasks', 'id', $up_id, $up_data);
        $response = array('status' => 'success');

        return $this->respond($response);

    }
    public function delete_task()
    {
        $id= $this->request->getPost('id');
        $db = db_connect();
        $defaultModel= new Default_model($db);

        
        $flag=  $defaultModel->delete_by_id('tasks', $id);
       if(isset($flag))
       {
        return $this->send_response('',true);
       }
       else
       {
        return $this->send_response(-1,false);
       }
     
    }
   
   


}