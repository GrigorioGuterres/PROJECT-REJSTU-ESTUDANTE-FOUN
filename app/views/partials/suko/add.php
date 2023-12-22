<?php
$comp_model = new SharedController;
$page_element_id = "add-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="add"  data-display-type="" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-primary shadow text-white p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">AUMENTA DADUS SUKO</h4>    
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-7 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="bg-light p-3 animated fadeIn page-content">
                        <form id="suko-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="<?php print_link("suko/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="naran_suku">Naran Suku <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-naran_suku"  value="<?php  echo $this->set_field_value('naran_suku',""); ?>" type="text" placeholder="Enter Naran Suku"  required="" name="naran_suku"  class="form-control " />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="id_posto">Posto <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <select required=""  id="ctrl-id_posto" data-load-path="<?php print_link('api/json/suko_id_posto_option_list') ?>" name="id_posto"  placeholder="Select a value ..."    class="custom-select" >
                                                        <option value="">Hili Posto ...</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="id_municipiu">Municipiu <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <select required=""  id="ctrl-id_municipiu" data-load-select-options="id_posto" name="id_municipiu"  placeholder="Select a value ..."    class="custom-select" >
                                                        <option value="">Hili Municipiu ...</option>
                                                        <?php 
                                                        $id_municipiu_options = $comp_model -> suko_id_municipiu_option_list();
                                                        if(!empty($id_municipiu_options)){
                                                        foreach($id_municipiu_options as $option){
                                                        $value = (!empty($option['value']) ? $option['value'] : null);
                                                        $label = (!empty($option['label']) ? $option['label'] : $value);
                                                        $selected = $this->set_field_selected('id_municipiu',$value, "");
                                                        ?>
                                                        <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                            <?php echo $label; ?>
                                                        </option>
                                                        <?php
                                                        }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="obs">Obs <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input id="ctrl-obs"  value="<?php  echo $this->set_field_value('obs',""); ?>" type="text" placeholder="Enter Obs"  required="" name="obs"  class="form-control " />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group form-submit-btn-holder text-center mt-3">
                                        <div class="form-ajax-status"></div>
                                        <button class="btn btn-primary" type="submit">
                                            Submite Dadus
                                            <i class="material-icons">send</i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
