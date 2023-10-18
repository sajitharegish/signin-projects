<?php

namespace App\Controllers;
use CodeIgniter\HTTP\RequestInterface;
use App\Models\Default_model;

class taskcontroller extends BaseController
{
 
    public function __construct() { 
        $db = db_connect();
        $this->Default_model = new Default_model($db);
        $this->session = \Config\Services::session();
        
    }


    public function add_task()
    {
        
        $empid=1;
        $data = [];
        if ($this->request->getMethod() == 'post') {

            $due_date = $this->request->getVar('due_date');
            // Convert 'dd-mm-yy' to 'yy-mm-dd' format
            $formatted_due_date = date('Y-m-d', strtotime($due_date));
                $formData = [
                    'project_id' => $this->request->getVar('project_id'),
                    'task_title' => $this->request->getVar('task_title'),
                    'status'=>$this->request->getVar('status'),
                    'assigned_by' => $empid, 
                    'due_date' => $this->request->getVar('due_date'),
  
                    
                ];
             

                $this->Default_model->insert_to_tb('tasks', $formData);

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
        
                $this->Default_model->insert_toRelatetbl($emp_data);
                $formData['id']=$lastInsertedID;
                $response = array(
                    'success' => true,
                    'task' => $formData  // Pass the task details
                );
                return $this->response->setJSON($response);

               
        }
        
        if(isset($_GET['search']))
        {
           $search = $this->request->getGet('search');
      
            $data['task'] = $this->Default_model->select_task($empid,$search);
            $data['progress'] = $this->Default_model->select_taskProgress($empid,$search);
            $data['completed'] = $this->Default_model->select_taskCompleted($empid,$search);
            $data['verified'] = $this->Default_model->select_verified($empid,$search);

            $data['project'] = $this->Default_model->select_all_list('tbl_project');
            $data['employees'] = $this->Default_model->select_all_list('tbl_employees');
            if (empty($data['task']) && empty($data['progress']) && empty($data['completed']) && empty($data['verified'])) {
                // Display "result not found" message
                $data['result_message'] = "No results found for '$search'";
            }
            
          
            echo view('task',$data);

        }
        else
        {
            $search='';
            $data['task'] = $this->Default_model->select_task($empid,$search);
            $data['progress'] = $this->Default_model->select_taskProgress($empid,$search);
            $data['completed'] = $this->Default_model->select_taskCompleted($empid,$search);
            $data['verified'] = $this->Default_model->select_verified($empid,$search);

            $data['project'] = $this->Default_model->select_all_list('tbl_project');
            $data['employees'] = $this->Default_model->select_all_list('tbl_employees');


            echo view('task',$data);

        }
       
    }


    public function add_taskself()
    {
        

        $empid=1;
        $data = [];
       if($this->request->getMethod()=='post')
       {

            
                    
                    $formData = [
                        'project_id'     => $this->request->getVar('project_id'),
                        'task_title'     => $this->request->getVar('task_title'),  
                        'assigned_by' => $empid, 
                        'status'=> $this->request->getVar('status'),    
                        'type' => 1,          
                    ];
                    $this->Default_model->insert_to_tb('tasks',$formData);
                    
                    $response = array(
                        'success' => true,
                        'task' => $formData  // Pass the task details
                    );
                    return $this->response->setJSON($response);
               
                
       }

       $data['task'] = $this->Default_model->select_task2($empid);
       $data['progress'] = $this->Default_model->select_taskProgress2($empid);
       $data['completed'] = $this->Default_model->select_taskCompleted2($empid);

       $data['project'] = $this->Default_model->select_all_list('tbl_project');
       $data['employees'] = $this->Default_model->select_all_list('tbl_employees');

       echo view('my-task',$data);
       
    }
    public function add_taskin()
     { 
        $data = [];

        $empId = 1;
        
         if(isset($_GET['search']))
         {
            $search = $this->request->getGet('search');
            // $search=$_GET['search'];
            //  var_dump($search);dd();
                    $data['task'] = $this->Default_model->select_task3($empId,$search);
                    $data['progress'] = $this->Default_model->select_taskProgress3($empId,$search);
                    $data['completed'] = $this->Default_model->select_taskCompleted3($empId,$search);
                    $data['verified'] = $this->Default_model->select_taskVerified3($empId,$search);

                    $data['project'] = $this->Default_model->select_all_list('tbl_project');
                    $data['employees'] = $this->Default_model->select_all_list('tbl_employees');
                    if (empty($data['task']) && empty($data['progress']) && empty($data['completed']) && empty($data['verified'])) {
                        // Display "result not found" message
                        $data['result_message'] = "No results found for '$search'";
                    }
                    
                  
                    echo view('task',$data);

                    

             }
        else
        {
            $search='';
                    $data['task'] = $this->Default_model->select_task3($empId,$search);
                    $data['progress'] = $this->Default_model->select_taskProgress3($empId,$search);
                    $data['completed'] = $this->Default_model->select_taskCompleted3($empId,$search);
                    $data['verified'] = $this->Default_model->select_taskVerified3($empId,$search);

                    $data['project'] = $this->Default_model->select_all_list('tbl_project');
                    $data['employees'] = $this->Default_model->select_all_list('tbl_employees');


                        echo view('task-in',$data);
                    
       }

       
       
    }

    
    public function updateTaskStatus() {
        $taskId = $this->request->getPost('task_id');
        $status = $this->request->getPost('status');

        $data=[
            'status'=>$status
        ];

        $this->Default_model->update_from_tb('tasks','id',$taskId,$data);

        
        $response = array('status' => 'success');
        echo json_encode($response);
        
    }

    public function edit_task(){
        $p_id= $this->request->getPost('id');
        $data =[];
        $data['task']=$this->Default_model->select_by_id('tasks', $p_id);
        $data['project1'] = $this->Default_model->select_all_list('tbl_project');
        $data['employees'] = $this->Default_model->select_all_list('tbl_employees');

        return $this->response->setJSON($data);
        
    }
    

    public function update_task($id=0){
        $up_id=$id;

        $up_data=[
            'project_id'     => $this->request->getVar('project_id'),
            'task_title'     => $this->request->getVar('task_title'),
           
        ];

        $this->Default_model->update_from_tb('tasks', 'id', $up_id, $up_data);

        return redirect()->to('my-task');

    }
    public function update_task_multiple($id=0){
        $ip_id=$id;
        $data = [];
        
                $ins_data = [
                    'project_id' => $this->request->getVar('project_id'),
                    'task_title' => $this->request->getVar('task_title'),
                    'due_date' => $this->request->getVar('due_date'),
                ];

                $this->Default_model->update_from_tb('tasks','id',$ip_id, $ins_data);

                $db = db_connect();
                $lastInsertedID = $db->insertID(); 

                $selected_employees = $this->request->getVar('emp_id');

        
                $emp_data = [];
                foreach ($selected_employees as $emp_id) {
                    $emp_data[] = [
                        'task_id' => $ip_id, 
                        'emp_id' => $emp_id,
                    ];
                }
                $this->Default_model->updateTaskRelations($emp_data);
        
                

                return redirect()->to('task');
        

    }

    public function delete()
    {
        $id= $this->request->getPost('id');

        
        $flag= $this->Default_model->delete_by_id('tasks', $id);
     
    }

    
   
   


}