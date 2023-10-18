<?php 
namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
use App\Libraries\JWT;

class Default_model extends Model {
	protected $format    = 'json';
   

	protected $db;
	public function __construct()
    {
        $this->db=db_connect();
    }

	public function insert_to_tb($tableName,$data)
	{
		return $this->db
			 	->table($tableName)
			 	->insert($data);  
	}
	public function update_from_tb($tableName,$where='',$whereValue='',$data){
		if(!empty($where))			
		 return $this->db
                        ->table($tableName)
                        ->where([$where => $whereValue])
                        ->set($data)
                        ->update();
	}

	public function delete_by_id($tableName,$id){		
		return $this->db
                        ->table($tableName)
                        ->where(["id" => $id])
                        ->set('mode',1)
                        ->update();
	}
	public function select_by_id($tableName,$id,$select=''){
		$mainQuery = $this->db->table('tasks apd');
		if ($select) {
			$mainQuery->select($select);
		} else {
			$mainQuery->select('apd.id,apd.status, apd.project_id, apd.task_title, apd.mode,apd.due_date');
		}
		$subQueryRelatedTables = "(SELECT GROUP_CONCAT(e.name) FROM task_employee drt 
		INNER JOIN tbl_employees e ON drt.emp_id = e.id 
		WHERE drt.task_id = apd.id) as related_employee";

		$subQueryprojectName = "(SELECT p.project_title FROM tbl_project p
				WHERE p.id = apd.project_id) as project_title";

		$mainQuery->select($subQueryRelatedTables, false);
		$mainQuery->select($subQueryprojectName, false);

		// $mainQuery->join('task_employee drt', 'apd.id = drt.task_id', 'inner');
		$mainQuery->groupBy('apd.id');
		$mainQuery->where('apd.id', $id);
		$results = $mainQuery->get()->getRowArray();
		return $results;
	}
	public function select_by_id_mytask($tableName,$id,$select=''){
		
		$mainQuery = $this->db->table('tasks apd');
	
		if ($select) {
			$mainQuery->select($select);
		} else {
			$mainQuery->select('apd.id, apd.status, apd.project_id, apd.task_title, apd.mode, apd.due_date');
		}
	
		
		$subQueryprojectName = "(SELECT p.project_title FROM tbl_project p
				WHERE p.id = apd.project_id) as project_title";
		
		$mainQuery->select($subQueryprojectName, false);
		
	
		$mainQuery->join('task_employee drt', 'apd.id = drt.task_id', 'inner');
		$mainQuery->groupBy('apd.id');
	    $mainQuery->where('apd.id', $id);
	    $results = $mainQuery->get()->getRowArray();
	    return $results;
	}

	public function select_all_list($tableName,$select=''){
	$query = $this->db->table($tableName);
		if ($select) {
		    $query->select($select);
		} else {
		    $query->select('*');
		}
	$results = $query->get()->getResultArray();

	return $results;
	}


	public function get_latest_entry($tableName,$select=''){
		$query = $this->db->table($tableName);
		if ($select) {
		    $query->select($select);
		} else {
		    $query->select('*');
		}
		$query->limit(1);
		$query->orderby('id','desc');
		$query->where('status', );
		$results = $query->get()->getRowArray();
	    return $results;
	}

	public function get_details($arr, $tableName, $where) {        
        $query = $this->db->table($tableName);
        $query->select($arr);

        foreach ($where as $key => $value) {
            $query->where($key, $value);
        }
        $query->orderby('id','desc');
        $results = $query->get()->getResultArray();
	    return $results;
    }

    public function select_by_field($tableName,$fieldName,$fieldData,$select=''){
    	$query=$this->db->table($tableName);
		if($select)
			$query->select($select);
		else
			$query->select('*');
		$query->where($fieldName,$fieldData);
		$query->where('status',);
		$query->orderby('id','desc');
        $results = $query->get()->getResultArray();
	    return $results;
	}

    public function select_by_field_limit_blogs($tableName,$fieldName1,$fieldData1,$select='',$limit)
	{
		$query=$this->db->table($tableName);
		if($select)
			$query->select($select);
		else
			$query->select('*');
		if($limit){
		 $query->limit($limit);
		}		
		$query->where($fieldName1,$fieldData1);
		//$query->where('hide',1);		
		$query->where('status',);
		$query->orderby('id','desc');		
		$results = $query->get()->getResultArray();
	    return $results;

	}

	public function get_user_list() {
		return $this->db
					->table('tbl_authservice')
					->where(["status" => "1"])
					->get()
					->getResult();
	}

	public function get_edit_data($id){
		return $this->db
					->table('tbl_authservice')
					->select('id,firstName,lastName,email,phone,image')
					->where(["status" => "1"])
					->where(["id" => $id])
					->get()
					->getRowArray();

	}

	public function updateTaskStatus($tableName,$id,$data){

	}



	public function select_task($empid,$searchQuery,$select = '') {
		if ($searchQuery!='') {
			$builder = $this->db->table('tasks apd');
						$builder->where('apd.mode',0);
						
				
					// Define your search query condition on 'tasks' table
					$builder->select('apd.id, apd.status, apd.project_id, apd.task_title, apd.mode,apd.due_date');
				
					// Subquery to get related employee names as an array
					$subQueryRelatedEmployees = "(SELECT GROUP_CONCAT(t.name) FROM task_employee drt 
												INNER JOIN tbl_employees t ON drt.emp_id = t.id 
												WHERE drt.task_id = apd.id) as related_employee";
					$subQueryprojectName = "(SELECT p.project_title FROM tbl_project p
												WHERE p.id = apd.project_id) as project_title";
					
					// Add the subquery as a selected field
					$builder->select($subQueryRelatedEmployees, false);
					$builder->select($subQueryprojectName, false);
					

					$builder->join('task_employee te', 'te.task_id = apd.id', 'inner');
					$builder->where('apd.status', 0);
					$builder->where('apd.mode', 0);
					// Group by the task ID to avoid duplicate rows
					$builder->where('apd.assigned_by',$empid);				
					$builder->groupBy('apd.id');
				
					// Apply the HAVING clause for filtering both project_title and task_title
					$builder->having("related_employee LIKE '%$searchQuery%' ESCAPE '!' OR project_title LIKE '%$searchQuery%' ESCAPE '!' OR apd.task_title LIKE '%$searchQuery%' ESCAPE '!'", null, false);
				
					// Execute the query
					$query = $builder->get();
				
					// Return the results as an array
					return $query->getResultArray();


		}
		else
		{



				$mainQuery = $this->db->table('tasks apd');
			
				if ($select) {
					$mainQuery->select($select);
				} else {
					$mainQuery->select('apd.id, apd.status, apd.project_id, apd.task_title, apd.mode, apd.due_date,apd.assigned_by');
				}
			
				$subQueryRelatedTables = "(SELECT GROUP_CONCAT(e.name) FROM task_employee drt 
										INNER JOIN tbl_employees e ON drt.emp_id = e.id 
										WHERE drt.task_id = apd.id) as related_employee";
				$subQueryprojectName = "(SELECT p.project_title FROM tbl_project p
						WHERE p.id = apd.project_id) as project_title";
				$subQueryEmpName = "(SELECT e.name FROM tbl_employees e
						WHERE e.id = apd.assigned_by) as assignedby";

				
				
				$mainQuery->select($subQueryRelatedTables, false);
				$mainQuery->select($subQueryprojectName, false);
				$mainQuery->select($subQueryEmpName, false);
				
			
				$mainQuery->join('task_employee drt', 'apd.id = drt.task_id', 'inner');
				$mainQuery->join('task_employee te', 'te.task_id = apd.id', 'inner');
				$mainQuery->groupBy('apd.id');
			
				$mainQuery->where('apd.status', 0);
				$mainQuery->where('apd.mode', 0);
				$mainQuery->where('apd.assigned_by',$empid);
				$mainQuery->orderBy('apd.id', 'desc');
			
				$results = $mainQuery->get()->getResultArray();
				
				// echo $this->db->getLastQuery();dd();
				return $results;
	   }
	}
	
	

	
	public function select_taskProgress($empid,$searchQuery,$select=''){
		if ($searchQuery!='') {
			$builder = $this->db->table('tasks apd');
						$builder->where('apd.mode',0);
						
				
					// Define your search query condition on 'tasks' table
					$builder->select('apd.id, apd.status, apd.project_id, apd.task_title, apd.mode,apd.due_date');
				
					// Subquery to get related employee names as an array
					$subQueryRelatedEmployees = "(SELECT GROUP_CONCAT(t.name) FROM task_employee drt 
												INNER JOIN tbl_employees t ON drt.emp_id = t.id 
												WHERE drt.task_id = apd.id) as related_employee";
					$subQueryprojectName = "(SELECT p.project_title FROM tbl_project p
												WHERE p.id = apd.project_id) as project_title";
					
					// Add the subquery as a selected field
					$builder->select($subQueryRelatedEmployees, false);
					$builder->select($subQueryprojectName, false);
					

					$builder->join('task_employee te', 'te.task_id = apd.id', 'inner');
					$builder->where('apd.status', 1);
					$builder->where('apd.mode', 0);
					// Group by the task ID to avoid duplicate rows
					$builder->where('apd.assigned_by',$empid);				
					$builder->groupBy('apd.id');
				
					// Apply the HAVING clause for filtering both project_title and task_title
					$builder->having("related_employee LIKE '%$searchQuery%' ESCAPE '!' OR project_title LIKE '%$searchQuery%' ESCAPE '!' OR apd.task_title LIKE '%$searchQuery%' ESCAPE '!'", null, false);
				
					// Execute the query
					$query = $builder->get();
				
					// Return the results as an array
					return $query->getResultArray();


		}
		else
		{



				$mainQuery = $this->db->table('tasks apd');
			
				if ($select) {
					$mainQuery->select($select);
				} else {
					$mainQuery->select('apd.id, apd.status, apd.project_id, apd.task_title, apd.mode, apd.due_date,apd.assigned_by');
				}
			
				$subQueryRelatedTables = "(SELECT GROUP_CONCAT(e.name) FROM task_employee drt 
										INNER JOIN tbl_employees e ON drt.emp_id = e.id 
										WHERE drt.task_id = apd.id) as related_employee";
				$subQueryprojectName = "(SELECT p.project_title FROM tbl_project p
						WHERE p.id = apd.project_id) as project_title";
				$subQueryEmpName = "(SELECT e.name FROM tbl_employees e
						WHERE e.id = apd.assigned_by) as assignedby";

				
				
				$mainQuery->select($subQueryRelatedTables, false);
				$mainQuery->select($subQueryprojectName, false);
				$mainQuery->select($subQueryEmpName, false);
				
			
				$mainQuery->join('task_employee drt', 'apd.id = drt.task_id', 'inner');
				$mainQuery->join('task_employee te', 'te.task_id = apd.id', 'inner');
				$mainQuery->groupBy('apd.id');
			
				$mainQuery->where('apd.status', 1);
				$mainQuery->where('apd.mode', 0);
				$mainQuery->where('apd.assigned_by',$empid);
				$mainQuery->orderBy('apd.id', 'desc');
			
				$results = $mainQuery->get()->getResultArray();
				
				// echo $this->db->getLastQuery();dd();
				return $results;
	   }
	}

	public function select_taskCompleted($empid,$searchQuery,$select=''){
		if ($searchQuery!='') {
			$builder = $this->db->table('tasks apd');
						$builder->where('apd.mode',0);
						
				
					// Define your search query condition on 'tasks' table
					$builder->select('apd.id, apd.status, apd.project_id, apd.task_title, apd.mode,apd.due_date');
				
					// Subquery to get related employee names as an array
					$subQueryRelatedEmployees = "(SELECT GROUP_CONCAT(t.name) FROM task_employee drt 
												INNER JOIN tbl_employees t ON drt.emp_id = t.id 
												WHERE drt.task_id = apd.id) as related_employee";
					$subQueryprojectName = "(SELECT p.project_title FROM tbl_project p
												WHERE p.id = apd.project_id) as project_title";
					
					// Add the subquery as a selected field
					$builder->select($subQueryRelatedEmployees, false);
					$builder->select($subQueryprojectName, false);
					

					$builder->join('task_employee te', 'te.task_id = apd.id', 'inner');
					$builder->where('apd.status', 2);
					$builder->where('apd.mode', 0);
					// Group by the task ID to avoid duplicate rows
					$builder->where('apd.assigned_by',$empid);				
					$builder->groupBy('apd.id');
				
					// Apply the HAVING clause for filtering both project_title and task_title
					$builder->having("related_employee LIKE '%$searchQuery%' ESCAPE '!' OR project_title LIKE '%$searchQuery%' ESCAPE '!' OR apd.task_title LIKE '%$searchQuery%' ESCAPE '!'", null, false);
				
					// Execute the query
					$query = $builder->get();
				
					// Return the results as an array
					return $query->getResultArray();


		}
		else
		{



				$mainQuery = $this->db->table('tasks apd');
			
				if ($select) {
					$mainQuery->select($select);
				} else {
					$mainQuery->select('apd.id, apd.status, apd.project_id, apd.task_title, apd.mode, apd.due_date,apd.assigned_by');
				}
			
				$subQueryRelatedTables = "(SELECT GROUP_CONCAT(e.name) FROM task_employee drt 
										INNER JOIN tbl_employees e ON drt.emp_id = e.id 
										WHERE drt.task_id = apd.id) as related_employee";
				$subQueryprojectName = "(SELECT p.project_title FROM tbl_project p
						WHERE p.id = apd.project_id) as project_title";
				$subQueryEmpName = "(SELECT e.name FROM tbl_employees e
						WHERE e.id = apd.assigned_by) as assignedby";

				
				
				$mainQuery->select($subQueryRelatedTables, false);
				$mainQuery->select($subQueryprojectName, false);
				$mainQuery->select($subQueryEmpName, false);
				
			
				$mainQuery->join('task_employee drt', 'apd.id = drt.task_id', 'inner');
				$mainQuery->join('task_employee te', 'te.task_id = apd.id', 'inner');
				$mainQuery->groupBy('apd.id');
			
				$mainQuery->where('apd.status', 2);
				$mainQuery->where('apd.mode', 0);
				$mainQuery->where('apd.assigned_by',$empid);
				$mainQuery->orderBy('apd.id', 'desc');
			
				$results = $mainQuery->get()->getResultArray();
				
				// echo $this->db->getLastQuery();dd();
				return $results;
	   }
	
		
	}
	public function select_verified($empid,$searchQuery,$select=''){
		if ($searchQuery!='') {
			$builder = $this->db->table('tasks apd');
						$builder->where('apd.mode',0);
						
				
					// Define your search query condition on 'tasks' table
					$builder->select('apd.id, apd.status, apd.project_id, apd.task_title, apd.mode,apd.due_date');
				
					// Subquery to get related employee names as an array
					$subQueryRelatedEmployees = "(SELECT GROUP_CONCAT(t.name) FROM task_employee drt 
												INNER JOIN tbl_employees t ON drt.emp_id = t.id 
												WHERE drt.task_id = apd.id) as related_employee";
					$subQueryprojectName = "(SELECT p.project_title FROM tbl_project p
												WHERE p.id = apd.project_id) as project_title";
					
					// Add the subquery as a selected field
					$builder->select($subQueryRelatedEmployees, false);
					$builder->select($subQueryprojectName, false);
					

					$builder->join('task_employee te', 'te.task_id = apd.id', 'inner');
					$builder->where('apd.status', 3);
					$builder->where('apd.mode', 0);
					// Group by the task ID to avoid duplicate rows
					$builder->where('apd.assigned_by',$empid);				
					$builder->groupBy('apd.id');
				
					// Apply the HAVING clause for filtering both project_title and task_title
					$builder->having("related_employee LIKE '%$searchQuery%' ESCAPE '!' OR project_title LIKE '%$searchQuery%' ESCAPE '!' OR apd.task_title LIKE '%$searchQuery%' ESCAPE '!'", null, false);
				
					// Execute the query
					$query = $builder->get();
				
					// Return the results as an array
					return $query->getResultArray();


		}
		else
		{



				$mainQuery = $this->db->table('tasks apd');
			
				if ($select) {
					$mainQuery->select($select);
				} else {
					$mainQuery->select('apd.id, apd.status, apd.project_id, apd.task_title, apd.mode, apd.due_date,apd.assigned_by');
				}
			
				$subQueryRelatedTables = "(SELECT GROUP_CONCAT(e.name) FROM task_employee drt 
										INNER JOIN tbl_employees e ON drt.emp_id = e.id 
										WHERE drt.task_id = apd.id) as related_employee";
				$subQueryprojectName = "(SELECT p.project_title FROM tbl_project p
						WHERE p.id = apd.project_id) as project_title";
				$subQueryEmpName = "(SELECT e.name FROM tbl_employees e
						WHERE e.id = apd.assigned_by) as assignedby";

				
				
				$mainQuery->select($subQueryRelatedTables, false);
				$mainQuery->select($subQueryprojectName, false);
				$mainQuery->select($subQueryEmpName, false);
				
			
				$mainQuery->join('task_employee drt', 'apd.id = drt.task_id', 'inner');
				$mainQuery->join('task_employee te', 'te.task_id = apd.id', 'inner');
				$mainQuery->groupBy('apd.id');
			
				$mainQuery->where('apd.status', 3);
				$mainQuery->where('apd.mode', 0);
				$mainQuery->where('apd.assigned_by',$empid);
				$mainQuery->orderBy('apd.id', 'desc');
			
				$results = $mainQuery->get()->getResultArray();
				
				// echo $this->db->getLastQuery();dd();
				return $results;
	   }
	
	}

	public function select_task9($empid,$searchQuery,$select='')
	 {
		if ($searchQuery!='') 
		 {
			$builder = $this->db->table('tasks apd');
			$builder->where('apd.mode',0);
			
	
		// Define your search query condition on 'tasks' table
		$builder->select('apd.id, apd.status, apd.project_id, apd.task_title, apd.mode,apd.due_date');
	
		// Subquery to get related employee names as an array
		$subQueryRelatedEmployees = "(SELECT GROUP_CONCAT(t.name) FROM task_employee drt 
									  INNER JOIN tbl_employees t ON drt.emp_id = t.id 
									  WHERE drt.task_id = apd.id) as related_employee";
	    $subQueryprojectName = "(SELECT p.project_title FROM tbl_project p
									  WHERE p.id = apd.project_id) as project_title";
		$subQueryEmpName = "(SELECT e.name FROM tbl_employees e
									  WHERE e.id = apd.assigned_by) as assignedby";

		// Add the subquery as a selected field
		$builder->select($subQueryRelatedEmployees, false);
		$builder->select($subQueryprojectName, false);
		$builder->select($subQueryEmpName, false);

		$builder->join('task_employee te', 'te.task_id = apd.id', 'inner');
		// Group by the task ID to avoid duplicate rows
		$builder->where('te.emp_id', $empid);
		$builder->groupBy('apd.id');
	
		// Apply the HAVING clause for filtering both project_title and task_title
		$builder->having("related_employee LIKE '%$searchQuery%' ESCAPE '!' OR project_title LIKE '%$searchQuery%' ESCAPE '!' OR apd.task_title LIKE '%$searchQuery%' ESCAPE '!'", null, false);
	
		// Execute the query
		$query = $builder->get();
	
		// Return the results as an array
		return $query->getResultArray();

		}
		else
		{
			$mainQuery = $this->db->table('tasks apd');
	
		if ($select) {
			$mainQuery->select($select);
		} else {
			$mainQuery->select('apd.id, apd.status, apd.project_id, apd.task_title, apd.mode, apd.due_date');
		}
	
		$subQueryRelatedTables = "(SELECT GROUP_CONCAT(t.name) FROM task_employee drt 
								  INNER JOIN tbl_employees t ON drt.emp_id = t.id 
								  WHERE drt.task_id = apd.id) as related_employee";

	    $subQueryprojectName = "(SELECT p.project_title FROM tbl_project p
								  WHERE p.id = apd.project_id) as project_title";
		$subQueryEmpName = "(SELECT e.name FROM tbl_employees e
								  WHERE e.id = apd.assigned_by) as assignedby";
	
		$mainQuery->select($subQueryRelatedTables, false);
		$mainQuery->select($subQueryprojectName, false);
		$mainQuery->select($subQueryEmpName, false);
	
		$mainQuery->join('task_employee drt', 'apd.id = drt.task_id', 'inner');
		$mainQuery->join('task_employee te', 'te.task_id = apd.id', 'inner');
		$mainQuery->groupBy('apd.id');
	
		$mainQuery->where('apd.status', 0);
		$mainQuery->where('apd.mode', 0);
		$mainQuery->where('te.emp_id', $empid);
		$mainQuery->orderBy('apd.id', 'desc');
		$results = $mainQuery->get()->getResultArray();
		return $results;

		}

			
		// Create a query builder instance
		


	}

	public function select_task3($empid,$searchQuery,$select='')
	 {
		if ($searchQuery!='') 
		 {
						$builder = $this->db->table('tasks apd');
						$builder->where('apd.mode',0);
						
				
					// Define your search query condition on 'tasks' table
					$builder->select('apd.id, apd.status, apd.project_id, apd.task_title, apd.mode,apd.due_date');
				
					// Subquery to get related employee names as an array
					$subQueryRelatedEmployees = "(SELECT GROUP_CONCAT(t.name) FROM task_employee drt 
												INNER JOIN tbl_employees t ON drt.emp_id = t.id 
												WHERE drt.task_id = apd.id) as related_employee";
					$subQueryprojectName = "(SELECT p.project_title FROM tbl_project p
												WHERE p.id = apd.project_id) as project_title";
					$subQueryEmpName = "(SELECT e.name FROM tbl_employees e
												WHERE e.id = apd.assigned_by) as assignedby";

					// Add the subquery as a selected field
					$builder->select($subQueryRelatedEmployees, false);
					$builder->select($subQueryprojectName, false);
					$builder->select($subQueryEmpName, false);

					$builder->join('task_employee te', 'te.task_id = apd.id', 'inner');
					$builder->where('apd.status', 0);
					$builder->where('apd.mode', 0);
					// Group by the task ID to avoid duplicate rows
					$builder->where('te.emp_id', $empid);
					$builder->groupBy('apd.id');
				
					// Apply the HAVING clause for filtering both project_title and task_title
					$builder->having("related_employee LIKE '%$searchQuery%' ESCAPE '!' OR project_title LIKE '%$searchQuery%' ESCAPE '!' OR apd.task_title LIKE '%$searchQuery%' ESCAPE '!'", null, false);
				
					// Execute the query
					$query = $builder->get();
				
					// Return the results as an array
					return $query->getResultArray();

		}
		else
		{
						$mainQuery = $this->db->table('tasks apd');
				
					if ($select) {
						$mainQuery->select($select);
					} else {
						$mainQuery->select('apd.id, apd.status, apd.project_id, apd.task_title, apd.mode, apd.due_date');
					}
				
					$subQueryRelatedTables = "(SELECT GROUP_CONCAT(t.name) FROM task_employee drt 
											INNER JOIN tbl_employees t ON drt.emp_id = t.id 
											WHERE drt.task_id = apd.id) as related_employee";

					$subQueryprojectName = "(SELECT p.project_title FROM tbl_project p
											WHERE p.id = apd.project_id) as project_title";
					$subQueryEmpName = "(SELECT e.name FROM tbl_employees e
											WHERE e.id = apd.assigned_by) as assignedby";
				
					$mainQuery->select($subQueryRelatedTables, false);
					$mainQuery->select($subQueryprojectName, false);
					$mainQuery->select($subQueryEmpName, false);
				
					$mainQuery->join('task_employee drt', 'apd.id = drt.task_id', 'inner');
					$mainQuery->join('task_employee te', 'te.task_id = apd.id', 'inner');
					$mainQuery->groupBy('apd.id');
				
					$mainQuery->where('apd.status', 0);
					$mainQuery->where('apd.mode', 0);
					$mainQuery->where('te.emp_id', $empid);
					$mainQuery->orderBy('apd.id', 'desc');
					$results = $mainQuery->get()->getResultArray();
					return $results;

		}

			
		// Create a query builder instance
		


	}

    public function select_taskProgress3($empid,$searchQuery,$select='')
	{
		if ($searchQuery!='') 
		 {
						$builder = $this->db->table('tasks apd');
						$builder->where('apd.mode',0);
						
				
					// Define your search query condition on 'tasks' table
					$builder->select('apd.id, apd.status, apd.project_id, apd.task_title, apd.mode,apd.due_date');
				
					// Subquery to get related employee names as an array
					$subQueryRelatedEmployees = "(SELECT GROUP_CONCAT(t.name) FROM task_employee drt 
												INNER JOIN tbl_employees t ON drt.emp_id = t.id 
												WHERE drt.task_id = apd.id) as related_employee";
					$subQueryprojectName = "(SELECT p.project_title FROM tbl_project p
												WHERE p.id = apd.project_id) as project_title";
					$subQueryEmpName = "(SELECT e.name FROM tbl_employees e
												WHERE e.id = apd.assigned_by) as assignedby";

					// Add the subquery as a selected field
					$builder->select($subQueryRelatedEmployees, false);
					$builder->select($subQueryprojectName, false);
					$builder->select($subQueryEmpName, false);

					$builder->join('task_employee te', 'te.task_id = apd.id', 'inner');
					$builder->where('apd.status', 1);
					$builder->where('apd.mode', 0);
					// Group by the task ID to avoid duplicate rows
					$builder->where('te.emp_id', $empid);

					$builder->groupBy('apd.id');
				
					// Apply the HAVING clause for filtering both project_title and task_title
					$builder->having("related_employee LIKE '%$searchQuery%' ESCAPE '!' OR project_title LIKE '%$searchQuery%' ESCAPE '!' OR apd.task_title LIKE '%$searchQuery%' ESCAPE '!'", null, false);
				
					// Execute the query
					$query = $builder->get();
				
					// Return the results as an array
					return $query->getResultArray();

		}
		else
		{
						$mainQuery = $this->db->table('tasks apd');
				
					if ($select) {
						$mainQuery->select($select);
					} else {
						$mainQuery->select('apd.id, apd.status, apd.project_id, apd.task_title, apd.mode, apd.due_date');
					}
				
					$subQueryRelatedTables = "(SELECT GROUP_CONCAT(t.name) FROM task_employee drt 
											INNER JOIN tbl_employees t ON drt.emp_id = t.id 
											WHERE drt.task_id = apd.id) as related_employee";

					$subQueryprojectName = "(SELECT p.project_title FROM tbl_project p
											WHERE p.id = apd.project_id) as project_title";
					$subQueryEmpName = "(SELECT e.name FROM tbl_employees e
											WHERE e.id = apd.assigned_by) as assignedby";
				
					$mainQuery->select($subQueryRelatedTables, false);
					$mainQuery->select($subQueryprojectName, false);
					$mainQuery->select($subQueryEmpName, false);
				
					$mainQuery->join('task_employee drt', 'apd.id = drt.task_id', 'inner');
					$mainQuery->join('task_employee te', 'te.task_id = apd.id', 'inner');
					$mainQuery->groupBy('apd.id');
				
					$mainQuery->where('apd.status', 1);
					$mainQuery->where('apd.mode', 0);
					$mainQuery->where('te.emp_id', $empid);
					$mainQuery->orderBy('apd.id', 'desc');
					$results = $mainQuery->get()->getResultArray();
					return $results;

		}

			
		// Create a query builder instance
		

		
	}
	public function select_taskCompleted3($empid,$searchQuery,$select=''){
		if ($searchQuery!='') 
		 {
						$builder = $this->db->table('tasks apd');
						$builder->where('apd.mode',0);
						
				
					// Define your search query condition on 'tasks' table
					$builder->select('apd.id, apd.status, apd.project_id, apd.task_title, apd.mode,apd.due_date');
				
					// Subquery to get related employee names as an array
					$subQueryRelatedEmployees = "(SELECT GROUP_CONCAT(t.name) FROM task_employee drt 
												INNER JOIN tbl_employees t ON drt.emp_id = t.id 
												WHERE drt.task_id = apd.id) as related_employee";
					$subQueryprojectName = "(SELECT p.project_title FROM tbl_project p
												WHERE p.id = apd.project_id) as project_title";
					$subQueryEmpName = "(SELECT e.name FROM tbl_employees e
												WHERE e.id = apd.assigned_by) as assignedby";

					// Add the subquery as a selected field
					$builder->select($subQueryRelatedEmployees, false);
					$builder->select($subQueryprojectName, false);
					$builder->select($subQueryEmpName, false);

					$builder->join('task_employee te', 'te.task_id = apd.id', 'inner');
					$builder->where('apd.status', 2);
					$builder->where('apd.mode', 0);
					// Group by the task ID to avoid duplicate rows
					$builder->where('te.emp_id', $empid);

					$builder->groupBy('apd.id');
				
					// Apply the HAVING clause for filtering both project_title and task_title
					$builder->having("related_employee LIKE '%$searchQuery%' ESCAPE '!' OR project_title LIKE '%$searchQuery%' ESCAPE '!' OR apd.task_title LIKE '%$searchQuery%' ESCAPE '!'", null, false);
				
					// Execute the query
					$query = $builder->get();
				
					// Return the results as an array
					return $query->getResultArray();

		}
		else
		{
						$mainQuery = $this->db->table('tasks apd');
				
					if ($select) {
						$mainQuery->select($select);
					} else {
						$mainQuery->select('apd.id, apd.status, apd.project_id, apd.task_title, apd.mode, apd.due_date');
					}
				
					$subQueryRelatedTables = "(SELECT GROUP_CONCAT(t.name) FROM task_employee drt 
											INNER JOIN tbl_employees t ON drt.emp_id = t.id 
											WHERE drt.task_id = apd.id) as related_employee";

					$subQueryprojectName = "(SELECT p.project_title FROM tbl_project p
											WHERE p.id = apd.project_id) as project_title";
					$subQueryEmpName = "(SELECT e.name FROM tbl_employees e
											WHERE e.id = apd.assigned_by) as assignedby";
				
					$mainQuery->select($subQueryRelatedTables, false);
					$mainQuery->select($subQueryprojectName, false);
					$mainQuery->select($subQueryEmpName, false);
				
					$mainQuery->join('task_employee drt', 'apd.id = drt.task_id', 'inner');
					$mainQuery->join('task_employee te', 'te.task_id = apd.id', 'inner');
					$mainQuery->groupBy('apd.id');
				
					$mainQuery->where('apd.status', 2);
					$mainQuery->where('apd.mode', 0);
					$mainQuery->where('te.emp_id', $empid);
					$mainQuery->orderBy('apd.id', 'desc');
					$results = $mainQuery->get()->getResultArray();
					return $results;

		
	}
}
	public function select_taskVerified3($empid,$searchQuery,$select=''){
		if ($searchQuery!='') 
		 {
						$builder = $this->db->table('tasks apd');
						$builder->where('apd.mode',0);
						
				
					// Define your search query condition on 'tasks' table
					$builder->select('apd.id, apd.status, apd.project_id, apd.task_title, apd.mode,apd.due_date');
				
					// Subquery to get related employee names as an array
					$subQueryRelatedEmployees = "(SELECT GROUP_CONCAT(t.name) FROM task_employee drt 
												INNER JOIN tbl_employees t ON drt.emp_id = t.id 
												WHERE drt.task_id = apd.id) as related_employee";
					$subQueryprojectName = "(SELECT p.project_title FROM tbl_project p
												WHERE p.id = apd.project_id) as project_title";
					$subQueryEmpName = "(SELECT e.name FROM tbl_employees e
												WHERE e.id = apd.assigned_by) as assignedby";

					// Add the subquery as a selected field
					$builder->select($subQueryRelatedEmployees, false);
					$builder->select($subQueryprojectName, false);
					$builder->select($subQueryEmpName, false);

					$builder->join('task_employee te', 'te.task_id = apd.id', 'inner');
					$builder->where('apd.status', 3);
					$builder->where('apd.mode', 0);
					// Group by the task ID to avoid duplicate rows
					$builder->where('te.emp_id', $empid);

					$builder->groupBy('apd.id');
				
					// Apply the HAVING clause for filtering both project_title and task_title
					$builder->having("related_employee LIKE '%$searchQuery%' ESCAPE '!' OR project_title LIKE '%$searchQuery%' ESCAPE '!' OR apd.task_title LIKE '%$searchQuery%' ESCAPE '!'", null, false);
				
					// Execute the query
					$query = $builder->get();
				
					// Return the results as an array
					return $query->getResultArray();

		}
		else
		{
						$mainQuery = $this->db->table('tasks apd');
				
					if ($select) {
						$mainQuery->select($select);
					} else {
						$mainQuery->select('apd.id, apd.status, apd.project_id, apd.task_title, apd.mode, apd.due_date');
					}
				
					$subQueryRelatedTables = "(SELECT GROUP_CONCAT(t.name) FROM task_employee drt 
											INNER JOIN tbl_employees t ON drt.emp_id = t.id 
											WHERE drt.task_id = apd.id) as related_employee";

					$subQueryprojectName = "(SELECT p.project_title FROM tbl_project p
											WHERE p.id = apd.project_id) as project_title";
					$subQueryEmpName = "(SELECT e.name FROM tbl_employees e
											WHERE e.id = apd.assigned_by) as assignedby";
				
					$mainQuery->select($subQueryRelatedTables, false);
					$mainQuery->select($subQueryprojectName, false);
					$mainQuery->select($subQueryEmpName, false);
				
					$mainQuery->join('task_employee drt', 'apd.id = drt.task_id', 'inner');
					$mainQuery->join('task_employee te', 'te.task_id = apd.id', 'inner');
					$mainQuery->groupBy('apd.id');
				
					$mainQuery->where('apd.status', 3);
					$mainQuery->where('apd.mode', 0);
					$mainQuery->where('te.emp_id', $empid);
					$mainQuery->orderBy('apd.id', 'desc');
					$results = $mainQuery->get()->getResultArray();
					return $results;

		}
	}


	public function insert_toRelatetbl($data) {
        $this->db->table('task_employee')->insertBatch($data);
    }
	// public function update_toRelatetbl($data,$where='',$whereValue='') {
	// 	$this->db->table('task_employee')->updateBatch($data, $where);
	// }

	public function updateTaskRelations($updateData) {
		// Use CodeIgniter's Query Builder to perform the update.
		$this->db->table('task_employee')
				 ->where('task_id', $updateData[0]['task_id']) // Assuming 'task_id' is the primary key.
				 ->delete(); // Remove existing records for the specified task_id.
	
		// Insert the new records for the task.
		$this->db->table('task_employee')->insertBatch($updateData);
	}
   


    public function select_task2($empid,$select = '') {
		$mainQuery = $this->db->table('tasks apd');
		
		if ($select) {
			$mainQuery->select($select);
		} else {
			$mainQuery->select('apd.id, apd.status, apd.project_id, apd.task_title, apd.mode, apd.due_date,apd.assigned_by,apd.type,apd.created_date');
		}
	
		
		$subQueryprojectName = "(SELECT p.project_title FROM tbl_project p
								  WHERE p.id = apd.project_id) as project_title";
		$mainQuery->select($subQueryprojectName, false);
	    $mainQuery->where('apd.status', 0);
		$mainQuery->where('apd.mode', 0);
		$mainQuery->where('apd.assigned_by',$empid);
		$mainQuery->where('apd.type',1);

		$mainQuery->orderBy('apd.id', 'desc');
		$results = $mainQuery->get()->getResultArray();
	
		return $results;
	}

	
	
	

	
	public function select_taskProgress2($empid,$select=''){
		$mainQuery = $this->db->table('tasks apd');
		
		if ($select) {
			$mainQuery->select($select);
		} else {
			$mainQuery->select('apd.id, apd.status, apd.project_id, apd.task_title, apd.mode, apd.due_date,apd.assigned_by,apd.type,apd.created_date');
		}
	
		
		$subQueryprojectName = "(SELECT p.project_title FROM tbl_project p
								  WHERE p.id = apd.project_id) as project_title";
		$mainQuery->select($subQueryprojectName, false);
		$mainQuery->where('apd.status', 1);
		$mainQuery->where('apd.mode', 0);
		$mainQuery->where('apd.assigned_by',$empid);
		$mainQuery->where('apd.type',1);
		$mainQuery->orderBy('apd.id', 'desc');
		
		$results = $mainQuery->get()->getResultArray();
		return $results;
	}

	public function select_taskCompleted2($empid,$select=''){
		$mainQuery = $this->db->table('tasks apd');
		
		if ($select) {
			$mainQuery->select($select);
		} else {
			$mainQuery->select('apd.id, apd.status, apd.project_id, apd.task_title, apd.mode, apd.due_date,apd.assigned_by,apd.type,apd.created_date');
		}
	
		
		$subQueryprojectName = "(SELECT p.project_title FROM tbl_project p
								  WHERE p.id = apd.project_id) as project_title";
		$mainQuery->select($subQueryprojectName, false);
		$mainQuery->where('apd.status', 2);
		$mainQuery->where('apd.mode', 0);
		$mainQuery->where('apd.assigned_by',$empid);
		$mainQuery->where('apd.type',1);
		$mainQuery->orderBy('apd.id', 'desc');
		

		$results = $mainQuery->get()->getResultArray();
		return $results;
	}


	public function searchTasks($searchQuery)
	{
		// Create a query builder instance
		$builder = $this->db->table('tasks apd');
		$builder->where('apd.mode',0);
	
		// Define your search query condition on 'tasks' table
		$builder->select('apd.id, apd.status, apd.project_id, apd.task_title, apd.mode');
	
		// Subquery to get related employee names as an array
		$subQueryRelatedEmployees = "(SELECT GROUP_CONCAT(t.name) FROM task_employee drt 
									  INNER JOIN tbl_employees t ON drt.emp_id = t.id 
									  WHERE drt.task_id = apd.id) as related_employee";
	    $subQueryprojectName = "(SELECT p.project_title FROM tbl_project p
									  WHERE p.id = apd.project_id) as project_title";
	
		// Add the subquery as a selected field
		$builder->select($subQueryRelatedEmployees, false);
		$builder->select($subQueryprojectName, false);
		// Group by the task ID to avoid duplicate rows
		$builder->groupBy('apd.id');
	
		// Apply the HAVING clause for filtering both project_title and task_title
		$builder->having("related_employee LIKE '%$searchQuery%' ESCAPE '!' OR project_title LIKE '%$searchQuery%' ESCAPE '!' OR apd.task_title LIKE '%$searchQuery%' ESCAPE '!'", null, false);
	
		// Execute the query
		$query = $builder->get();
	
		// Return the results as an array
		return $query->getResultArray();
	}
	
	

}?>