<?php 

/**
 * SharedController Controller
 * @category  Controller / Model
 */
class SharedController extends BaseController{
	
	/**
     * suko_id_posto_option_list Model Action
     * @return array
     */
	function suko_id_posto_option_list($lookup_id_municipiu){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT naran_postu AS value,naran_postu AS label FROM tb_postu WHERE id_municipiu= ? ORDER BY naran_postu ASC" ;
		$queryparams = array($lookup_id_municipiu);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * suko_id_municipiu_option_list Model Action
     * @return array
     */
	function suko_id_municipiu_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT naran AS value,naran AS label FROM tb_municipiu ORDER BY naran";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * tb_aldeia_id_municipio_option_list Model Action
     * @return array
     */
	function tb_aldeia_id_municipio_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT naran AS value,naran AS label FROM tb_municipiu ORDER BY naran";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * tb_aldeia_id_posto_option_list Model Action
     * @return array
     */
	function tb_aldeia_id_posto_option_list($lookup_id_municipio){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT naran_postu AS value,naran_postu AS label FROM tb_postu WHERE id_municipiu= ? ORDER BY naran_postu ASC" ;
		$queryparams = array($lookup_id_municipio);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * tb_aldeia_id_suko_option_list Model Action
     * @return array
     */
	function tb_aldeia_id_suko_option_list($lookup_id_posto){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT naran_suku AS value,naran_suku AS label FROM suko WHERE id_posto= ? ORDER BY naran_suku ASC" ;
		$queryparams = array($lookup_id_posto);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * tb_estudante_id_municipiu_option_list Model Action
     * @return array
     */
	function tb_estudante_id_municipiu_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT naran AS value,naran AS label FROM tb_municipiu ORDER BY naran";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * tb_estudante_id_postu_option_list Model Action
     * @return array
     */
	function tb_estudante_id_postu_option_list($lookup_id_municipiu){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT naran_postu AS value,naran_postu AS label FROM tb_postu WHERE id_municipiu= ? ORDER BY naran_postu ASC" ;
		$queryparams = array($lookup_id_municipiu);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * tb_estudante_id_suco_option_list Model Action
     * @return array
     */
	function tb_estudante_id_suco_option_list($lookup_id_postu){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT naran_suku AS value,naran_suku AS label FROM suko WHERE id_posto= ? ORDER BY naran_suku ASC" ;
		$queryparams = array($lookup_id_postu);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * tb_estudante_id_aldeia_option_list Model Action
     * @return array
     */
	function tb_estudante_id_aldeia_option_list($lookup_id_suco){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT naran_aldeia AS value,naran_aldeia AS label FROM tb_aldeia WHERE id_suko= ? ORDER BY naran_aldeia ASC" ;
		$queryparams = array($lookup_id_suco);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * tb_postu_id_municipiu_option_list Model Action
     * @return array
     */
	function tb_postu_id_municipiu_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT naran AS value,naran AS label FROM tb_municipiu ORDER BY naran";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * tb_user_username_value_exist Model Action
     * @return array
     */
	function tb_user_username_value_exist($val){
		$db = $this->GetModel();
		$db->where("username", $val);
		$exist = $db->has("tb_user");
		return $exist;
	}

	/**
     * tb_user_email_value_exist Model Action
     * @return array
     */
	function tb_user_email_value_exist($val){
		$db = $this->GetModel();
		$db->where("email", $val);
		$exist = $db->has("tb_user");
		return $exist;
	}

	/**
     * reesudan_reesudandata_rejistu_option_list Model Action
     * @return array
     */
	function reesudan_reesudandata_rejistu_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT data_rejistu AS value,data_rejistu AS label FROM tb_estudante ORDER BY data_rejistu";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * reesudan_reesudanid_municipiu_option_list Model Action
     * @return array
     */
	function reesudan_reesudanid_municipiu_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT naran AS value,naran AS label FROM tb_municipiu ORDER BY naran";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * reesudan_reesudanid_postu_option_list Model Action
     * @return array
     */
	function reesudan_reesudanid_postu_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT naran_postu AS value,naran_postu AS label FROM tb_postu ORDER BY naran_postu";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * reesudan_reesudanid_suco_option_list Model Action
     * @return array
     */
	function reesudan_reesudanid_suco_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT naran_suku AS value,naran_suku AS label FROM suko ORDER BY naran_suku";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * getcount_dadussuko Model Action
     * @return Value
     */
	function getcount_dadussuko(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM suko";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_dadusaldeia Model Action
     * @return Value
     */
	function getcount_dadusaldeia(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM tb_aldeia";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_totalestudante Model Action
     * @return Value
     */
	function getcount_totalestudante(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM tb_estudante";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_dadusmunicipiu Model Action
     * @return Value
     */
	function getcount_dadusmunicipiu(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM tb_municipiu";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_daduspostu Model Action
     * @return Value
     */
	function getcount_daduspostu(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM tb_postu";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_dadusadmin Model Action
     * @return Value
     */
	function getcount_dadusadmin(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM tb_user";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

}
