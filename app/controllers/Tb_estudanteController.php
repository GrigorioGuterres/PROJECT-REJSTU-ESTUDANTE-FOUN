<?php 
/**
 * Tb_estudante Page Controller
 * @category  Controller
 */
class Tb_estudanteController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "tb_estudante";
	}
	/**
     * List page records
     * @param $fieldname (filter record by a field) 
     * @param $fieldvalue (filter field value)
     * @return BaseView
     */
	function index($fieldname = null , $fieldvalue = null){
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$fields = array("id", 
			"n_emis", 
			"naran_estudante", 
			"sexo", 
			"data_moris", 
			"f_moris", 
			"img_estudante", 
			"eskola_anterior", 
			"pai", 
			"mae", 
			"id_municipiu", 
			"id_postu", 
			"id_suco", 
			"id_aldeia", 
			"n_kontaktu", 
			"data_rejistu");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				tb_estudante.id LIKE ? OR 
				tb_estudante.n_emis LIKE ? OR 
				tb_estudante.naran_estudante LIKE ? OR 
				tb_estudante.sexo LIKE ? OR 
				tb_estudante.data_moris LIKE ? OR 
				tb_estudante.f_moris LIKE ? OR 
				tb_estudante.img_estudante LIKE ? OR 
				tb_estudante.eskola_anterior LIKE ? OR 
				tb_estudante.pai LIKE ? OR 
				tb_estudante.mae LIKE ? OR 
				tb_estudante.id_municipiu LIKE ? OR 
				tb_estudante.id_postu LIKE ? OR 
				tb_estudante.id_suco LIKE ? OR 
				tb_estudante.id_aldeia LIKE ? OR 
				tb_estudante.n_kontaktu LIKE ? OR 
				tb_estudante.data_rejistu LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "tb_estudante/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("tb_estudante.id", ORDER_TYPE);
		}
		if($fieldname){
			$db->where($fieldname , $fieldvalue); //filter by a single field name
		}
		$tc = $db->withTotalCount();
		$records = $db->get($tablename, $pagination, $fields);
		$records_count = count($records);
		$total_records = intval($tc->totalCount);
		$page_limit = $pagination[1];
		$total_pages = ceil($total_records / $page_limit);
		$data = new stdClass;
		$data->records = $records;
		$data->record_count = $records_count;
		$data->total_records = $total_records;
		$data->total_page = $total_pages;
		if($db->getLastError()){
			$this->set_page_error();
		}
		$page_title = $this->view->page_title = "Tb Estudante";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("tb_estudante/list.php", $data); //render the full page
	}
	/**
     * Load csv|json data
     * @return data
     */
	function import_data(){
		if(!empty($_FILES['file'])){
			$finfo = pathinfo($_FILES['file']['name']);
			$ext = strtolower($finfo['extension']);
			if(!in_array($ext , array('csv','json'))){
				$this->set_flash_msg("File format not supported", "danger");
			}
			else{
			$file_path = $_FILES['file']['tmp_name'];
				if(!empty($file_path)){
					$request = $this->request;
					$db = $this->GetModel();
					$tablename = $this->tablename;
					if($ext == "csv"){
						$options = array('table' => $tablename, 'fields' => '', 'delimiter' => ',', 'quote' => '"');
						$data = $db->loadCsvData($file_path , $options , false);
					}
					else{
						$data = $db->loadJsonData($file_path, $tablename , false);
					}
					if($db->getLastError()){
						$this->set_flash_msg($db->getLastError(), "danger");
					}
					else{
						$this->set_flash_msg("Data imported successfully", "success");
					}
				}
				else{
					$this->set_flash_msg("Error uploading file", "success");
				}
			}
		}
		else{
			$this->set_flash_msg("No file selected for upload", "warning");
		}
		$this->redirect("tb_estudante");
	}
	/**
     * View record detail 
	 * @param $rec_id (select record by table primary key) 
     * @param $value value (select record by value of field name(rec_id))
     * @return BaseView
     */
	function view($rec_id = null, $value = null){
		$request = $this->request;
		$db = $this->GetModel();
		$rec_id = $this->rec_id = urldecode($rec_id);
		$tablename = $this->tablename;
		$fields = array("id", 
			"n_emis", 
			"naran_estudante", 
			"sexo", 
			"data_moris", 
			"f_moris", 
			"img_estudante", 
			"eskola_anterior", 
			"pai", 
			"mae", 
			"id_municipiu", 
			"id_postu", 
			"id_suco", 
			"id_aldeia", 
			"n_kontaktu", 
			"data_rejistu");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("tb_estudante.id", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
			$page_title = $this->view->page_title = "View  Tb Estudante";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		}
		else{
			if($db->getLastError()){
				$this->set_page_error();
			}
			else{
				$this->set_page_error("No record found");
			}
		}
		return $this->render_view("tb_estudante/view.php", $record);
	}
	/**
     * Insert new record to the database table
	 * @param $formdata array() from $_POST
     * @return BaseView
     */
	function add($formdata = null){
		if($formdata){
			$db = $this->GetModel();
			$tablename = $this->tablename;
			$request = $this->request;
			//fillable fields
			$fields = $this->fields = array("n_emis","naran_estudante","sexo","data_moris","f_moris","img_estudante","eskola_anterior","pai","mae","id_municipiu","id_postu","id_suco","id_aldeia","n_kontaktu","data_rejistu");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'n_emis' => 'required|numeric',
				'naran_estudante' => 'required',
				'sexo' => 'required',
				'data_moris' => 'required',
				'f_moris' => 'required',
				'img_estudante' => 'required',
				'eskola_anterior' => 'required',
				'pai' => 'required',
				'mae' => 'required',
				'id_municipiu' => 'required',
				'id_postu' => 'required',
				'id_suco' => 'required',
				'id_aldeia' => 'required',
				'n_kontaktu' => 'required',
				'data_rejistu' => 'required',
			);
			$this->sanitize_array = array(
				'n_emis' => 'sanitize_string',
				'naran_estudante' => 'sanitize_string',
				'sexo' => 'sanitize_string',
				'data_moris' => 'sanitize_string',
				'f_moris' => 'sanitize_string',
				'img_estudante' => 'sanitize_string',
				'eskola_anterior' => 'sanitize_string',
				'pai' => 'sanitize_string',
				'mae' => 'sanitize_string',
				'id_municipiu' => 'sanitize_string',
				'id_postu' => 'sanitize_string',
				'id_suco' => 'sanitize_string',
				'id_aldeia' => 'sanitize_string',
				'n_kontaktu' => 'sanitize_string',
				'data_rejistu' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("tb_estudante");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Tb Estudante";
		$this->render_view("tb_estudante/add.php");
	}
	/**
     * Update table record with formdata
	 * @param $rec_id (select record by table primary key)
	 * @param $formdata array() from $_POST
     * @return array
     */
	function edit($rec_id = null, $formdata = null){
		$request = $this->request;
		$db = $this->GetModel();
		$this->rec_id = $rec_id;
		$tablename = $this->tablename;
		 //editable fields
		$fields = $this->fields = array("id","n_emis","naran_estudante","sexo","data_moris","f_moris","img_estudante","eskola_anterior","pai","mae","id_municipiu","id_postu","id_suco","id_aldeia","n_kontaktu","data_rejistu");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'n_emis' => 'required|numeric',
				'naran_estudante' => 'required',
				'sexo' => 'required',
				'data_moris' => 'required',
				'f_moris' => 'required',
				'img_estudante' => 'required',
				'eskola_anterior' => 'required',
				'pai' => 'required',
				'mae' => 'required',
				'id_municipiu' => 'required',
				'id_postu' => 'required',
				'id_suco' => 'required',
				'id_aldeia' => 'required',
				'n_kontaktu' => 'required',
				'data_rejistu' => 'required',
			);
			$this->sanitize_array = array(
				'n_emis' => 'sanitize_string',
				'naran_estudante' => 'sanitize_string',
				'sexo' => 'sanitize_string',
				'data_moris' => 'sanitize_string',
				'f_moris' => 'sanitize_string',
				'img_estudante' => 'sanitize_string',
				'eskola_anterior' => 'sanitize_string',
				'pai' => 'sanitize_string',
				'mae' => 'sanitize_string',
				'id_municipiu' => 'sanitize_string',
				'id_postu' => 'sanitize_string',
				'id_suco' => 'sanitize_string',
				'id_aldeia' => 'sanitize_string',
				'n_kontaktu' => 'sanitize_string',
				'data_rejistu' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("tb_estudante.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("tb_estudante");
				}
				else{
					if($db->getLastError()){
						$this->set_page_error();
					}
					elseif(!$numRows){
						//not an error, but no record was updated
						$page_error = "No record updated";
						$this->set_page_error($page_error);
						$this->set_flash_msg($page_error, "warning");
						return	$this->redirect("tb_estudante");
					}
				}
			}
		}
		$db->where("tb_estudante.id", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Tb Estudante";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("tb_estudante/edit.php", $data);
	}
	/**
     * Update single field
	 * @param $rec_id (select record by table primary key)
	 * @param $formdata array() from $_POST
     * @return array
     */
	function editfield($rec_id = null, $formdata = null){
		$db = $this->GetModel();
		$this->rec_id = $rec_id;
		$tablename = $this->tablename;
		//editable fields
		$fields = $this->fields = array("id","n_emis","naran_estudante","sexo","data_moris","f_moris","img_estudante","eskola_anterior","pai","mae","id_municipiu","id_postu","id_suco","id_aldeia","n_kontaktu","data_rejistu");
		$page_error = null;
		if($formdata){
			$postdata = array();
			$fieldname = $formdata['name'];
			$fieldvalue = $formdata['value'];
			$postdata[$fieldname] = $fieldvalue;
			$postdata = $this->format_request_data($postdata);
			$this->rules_array = array(
				'n_emis' => 'required|numeric',
				'naran_estudante' => 'required',
				'sexo' => 'required',
				'data_moris' => 'required',
				'f_moris' => 'required',
				'img_estudante' => 'required',
				'eskola_anterior' => 'required',
				'pai' => 'required',
				'mae' => 'required',
				'id_municipiu' => 'required',
				'id_postu' => 'required',
				'id_suco' => 'required',
				'id_aldeia' => 'required',
				'n_kontaktu' => 'required',
				'data_rejistu' => 'required',
			);
			$this->sanitize_array = array(
				'n_emis' => 'sanitize_string',
				'naran_estudante' => 'sanitize_string',
				'sexo' => 'sanitize_string',
				'data_moris' => 'sanitize_string',
				'f_moris' => 'sanitize_string',
				'img_estudante' => 'sanitize_string',
				'eskola_anterior' => 'sanitize_string',
				'pai' => 'sanitize_string',
				'mae' => 'sanitize_string',
				'id_municipiu' => 'sanitize_string',
				'id_postu' => 'sanitize_string',
				'id_suco' => 'sanitize_string',
				'id_aldeia' => 'sanitize_string',
				'n_kontaktu' => 'sanitize_string',
				'data_rejistu' => 'sanitize_string',
			);
			$this->filter_rules = true; //filter validation rules by excluding fields not in the formdata
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("tb_estudante.id", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount();
				if($bool && $numRows){
					return render_json(
						array(
							'num_rows' =>$numRows,
							'rec_id' =>$rec_id,
						)
					);
				}
				else{
					if($db->getLastError()){
						$page_error = $db->getLastError();
					}
					elseif(!$numRows){
						$page_error = "No record updated";
					}
					render_error($page_error);
				}
			}
			else{
				render_error($this->view->page_error);
			}
		}
		return null;
	}
	/**
     * Delete record from the database
	 * Support multi delete by separating record id by comma.
     * @return BaseView
     */
	function delete($rec_id = null){
		Csrf::cross_check();
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$this->rec_id = $rec_id;
		//form multiple delete, split record id separated by comma into array
		$arr_rec_id = array_map('trim', explode(",", $rec_id));
		$db->where("tb_estudante.id", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("tb_estudante");
	}
}
