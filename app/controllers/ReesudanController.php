<?php 
/**
 * Reesudan Page Controller
 * @category  Controller
 */
class ReesudanController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "reesudan";
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
				reesudan.id LIKE ? OR 
				reesudan.n_emis LIKE ? OR 
				reesudan.naran_estudante LIKE ? OR 
				reesudan.sexo LIKE ? OR 
				reesudan.data_moris LIKE ? OR 
				reesudan.f_moris LIKE ? OR 
				reesudan.img_estudante LIKE ? OR 
				reesudan.eskola_anterior LIKE ? OR 
				reesudan.pai LIKE ? OR 
				reesudan.mae LIKE ? OR 
				reesudan.id_municipiu LIKE ? OR 
				reesudan.id_postu LIKE ? OR 
				reesudan.id_suco LIKE ? OR 
				reesudan.id_aldeia LIKE ? OR 
				reesudan.n_kontaktu LIKE ? OR 
				reesudan.data_rejistu LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "reesudan/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("reesudan.id", ORDER_TYPE);
		}
		if($fieldname){
			$db->where($fieldname , $fieldvalue); //filter by a single field name
		}
		if(!empty($request->reesudan_data_rejistu)){
			$val = $request->reesudan_data_rejistu;
			$db->where("reesudan.data_rejistu", $val , "=");
		}
		if(!empty($request->reesudan_id_municipiu)){
			$val = $request->reesudan_id_municipiu;
			$db->where("reesudan.id_municipiu", $val , "=");
		}
		if(!empty($request->reesudan_id_postu)){
			$val = $request->reesudan_id_postu;
			$db->where("reesudan.id_postu", $val , "=");
		}
		if(!empty($request->reesudan_id_suco)){
			$val = $request->reesudan_id_suco;
			$db->where("reesudan.id_suco", $val , "=");
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
		$page_title = $this->view->page_title = "Reesudan";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("reesudan/list.php", $data); //render the full page
	}
}
