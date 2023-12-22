<?php
$comp_model = new SharedController;
$page_element_id = "list-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data From Controller
$view_data = $this->view_data;
$records = $view_data->records;
$record_count = $view_data->record_count;
$total_records = $view_data->total_records;
$field_name = $this->route->field_name;
$field_value = $this->route->field_value;
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_footer = $this->show_footer;
$show_pagination = $this->show_pagination;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="list"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-info shadow text-white p-3 mb-3">
        <div class="container-fluid">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title"><b>FORM RELATORIU  DADUS ESTUDANTE</b> </h4> 
                </div>
                <div class="col-sm-4 ">
                    <form  class="search" action="<?php print_link('reesudan'); ?>" method="get">
                        <div class="input-group">
                            <input value="<?php echo get_value('search'); ?>" class="form-control" type="text" name="search"  placeholder="Search" />
                                <div class="input-group-append">
                                    <button class="btn btn-primary"><i class="material-icons">search</i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12 comp-grid">
                        <div class="">
                            <!-- Page bread crumbs components-->
                            <?php
                            if(!empty($field_name) || !empty($_GET['search'])){
                            ?>
                            <hr class="sm d-block d-sm-none" />
                            <nav class="page-header-breadcrumbs mt-2" aria-label="breadcrumb">
                                <ul class="breadcrumb m-0 p-1">
                                    <?php
                                    if(!empty($field_name)){
                                    ?>
                                    <li class="breadcrumb-item">
                                        <a class="text-decoration-none" href="<?php print_link('reesudan'); ?>">
                                            <i class="material-icons">arrow_back</i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <?php echo (get_value("tag") ? get_value("tag")  :  make_readable($field_name)); ?>
                                    </li>
                                    <li  class="breadcrumb-item active text-capitalize font-weight-bold">
                                        <?php echo (get_value("label") ? get_value("label")  :  make_readable(urldecode($field_value))); ?>
                                    </li>
                                    <?php 
                                    }   
                                    ?>
                                    <?php
                                    if(get_value("search")){
                                    ?>
                                    <li class="breadcrumb-item">
                                        <a class="text-decoration-none" href="<?php print_link('reesudan'); ?>">
                                            <i class="material-icons">arrow_back</i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item text-capitalize">
                                        Search
                                    </li>
                                    <li  class="breadcrumb-item active text-capitalize font-weight-bold"><?php echo get_value("search"); ?></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </nav>
                            <!--End of Page bread crumbs components-->
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        ?> 
        <div  class="">
            <div class="container-fluid">
                <div class="row ">

                    <div class="col-md-12 comp-grid">
                        <?php $this :: display_page_errors(); ?>
                        <div class="filter-tags mb-2">
                            <?php
                            if(!empty(get_value('reesudan_data_rejistu'))){
                            ?>
                            <div class="filter-chip card bg-primary shadow text-white">
                                <b>Dadus Neebe Ita Boot Filter Mak : Data Rejistu :</b> 

                                    <span class="badge rounded-pill bg-warning">
                                <?php 
                                if(get_value('reesudan_data_rejistulabel')){
                                echo get_value('reesudan_data_rejistulabel');
                                }
                                else{
                                echo get_value('reesudan_data_rejistu');
                                }
                                $remove_link = unset_get_value('reesudan_data_rejistu', $this->route->page_url);
                                ?>
                                <a href="<?php print_link($remove_link); ?>" class="close-btn">
                                    &times;
                                </a>
                            </div>
                            <?php
                            }
                            ?>
                                </span>

                              
                            <?php
                            if(!empty(get_value('reesudan_id_municipiu'))){
                            ?>
                            <div class="filter-chip card bg-primary shadow text-white">
                                <b>Dadus Neebe Ita Boot Filter Mak : Municipiu :</b> 

                                    <span class="badge rounded-pill bg-warning text-dark">
                                <?php 
                                if(get_value('reesudan_id_municipiulabel')){
                                echo get_value('reesudan_id_municipiulabel');
                                }
                                else{
                                echo get_value('reesudan_id_municipiu');
                                }
                                $remove_link = unset_get_value('reesudan_id_municipiu', $this->route->page_url);
                                ?>
                                <a href="<?php print_link($remove_link); ?>" class="close-btn">
                                    &times;
                                </a>
                            </div>
                            <?php
                            }
                            ?>
                                </span>

                               
                            <?php
                            if(!empty(get_value('reesudan_id_postu'))){
                            ?>
                            <div class="filter-chip card bg-primary shadow text-white">
                                <b>Dadus Neebe Ita Boot Filter Mak : Postu :</b> 

                                    <span class="badge rounded-pill bg-warning text-dark">

                                <?php 
                                if(get_value('reesudan_id_postulabel')){
                                echo get_value('reesudan_id_postulabel');
                                }
                                else{
                                echo get_value('reesudan_id_postu');
                                }
                                $remove_link = unset_get_value('reesudan_id_postu', $this->route->page_url);
                                ?>
                                <a href="<?php print_link($remove_link); ?>" class="close-btn">
                                    &times;
                                </a>
                            </div>
                            <?php
                            }
                            ?>
                                </span>

                              
                            <?php
                            if(!empty(get_value('reesudan_id_suco'))){
                            ?>
                            <div class="filter-chip card bg-primary shadow text-white">
                                <b>Dadus Neebe Ita Boot Filter Mak : Suco :</b> 
                                    <span class="badge rounded-pill bg-warning text-dark">
                                <?php 
                                if(get_value('reesudan_id_sucolabel')){
                                echo get_value('reesudan_id_sucolabel');
                                }
                                else{
                                echo get_value('reesudan_id_suco');
                                }
                                $remove_link = unset_get_value('reesudan_id_suco', $this->route->page_url);
                                ?>
                                <a href="<?php print_link($remove_link); ?>" class="close-btn">
                                    &times;
                                </a>
                            </div>
                            <?php
                            }
                            ?>
                                </span>

                               
                        </div>
                        <div  class=" animated fadeIn page-content">
                            <div id="reesudan-list-records">
                                <div id="page-report-body" class="table-responsive">
                                    <table class="table  table-striped table-sm text-left">
                                        <thead class="table-header bg-light">
                                            <tr>
                                                <th class="td-sno">no</th>
                                                <th  class="td-id"> Id</th>
                                                <th  class="td-n_emis"> N Emis</th>
                                                <th  class="td-naran_estudante"> Naran Estudante</th>
                                                <th  class="td-sexo"> Sexo</th>
                                                <th  class="td-data_moris"> Data Moris</th>
                                                <th  class="td-f_moris"> F Moris</th>
                                                <th  class="td-img_estudante"> Img Estudante</th>
                                                <th  class="td-eskola_anterior"> Eskola Anterior</th>
                                                <th  class="td-pai"> Pai</th>
                                                <th  class="td-mae"> Mae</th>
                                                <th  class="td-id_municipiu"> Municipiu</th>
                                                <th  class="td-id_postu"> Postu</th>
                                                <th  class="td-id_suco">  Suco</th>
                                                <th  class="td-id_aldeia">  Aldeia</th>
                                                <th  class="td-n_kontaktu"> N Kontaktu</th>
                                                <th  class="td-data_rejistu"> Data Rejistu</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        if(!empty($records)){
                                        ?>
                                        <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                            <!--record-->
                                            <?php
                                            $counter = 0;
                                            foreach($records as $data){
                                            $rec_id = (!empty($data['']) ? urlencode($data['']) : null);
                                            $counter++;
                                            ?>
                                            <tr>
                                                <th class="td-sno"><?php echo $counter; ?></th>
                                                <td class="td-id"> <?php echo $data['id']; ?></td>
                                                <td class="td-n_emis"> <?php echo $data['n_emis']; ?></td>
                                                <td class="td-naran_estudante"> <?php echo $data['naran_estudante']; ?></td>
                                                <td class="td-sexo"> <?php echo $data['sexo']; ?></td>
                                                <td class="td-data_moris"> <?php echo $data['data_moris']; ?></td>
                                                <td class="td-f_moris"> <?php echo $data['f_moris']; ?></td>
                                                <td class="td-img_estudante"><?php Html :: page_img($data['img_estudante'],50,50,1); ?></td>
                                                <td class="td-eskola_anterior"> <?php echo $data['eskola_anterior']; ?></td>
                                                <td class="td-pai"> <?php echo $data['pai']; ?></td>
                                                <td class="td-mae"> <?php echo $data['mae']; ?></td>
                                                <td class="td-id_municipiu"> <?php echo $data['id_municipiu']; ?></td>
                                                <td class="td-id_postu"> <?php echo $data['id_postu']; ?></td>
                                                <td class="td-id_suco"> <?php echo $data['id_suco']; ?></td>
                                                <td class="td-id_aldeia"> <?php echo $data['id_aldeia']; ?></td>
                                                <td class="td-n_kontaktu"> <?php echo $data['n_kontaktu']; ?></td>
                                                <td class="td-data_rejistu"> <?php echo $data['data_rejistu']; ?></td>
                                            </tr>
                                            <?php 
                                            }
                                            ?>
                                            <!--endrecord-->
                                        </tbody>
                                        <tbody class="search-data" id="search-data-<?php echo $page_element_id; ?>"></tbody>
                                        <?php
                                        }
                                        ?>
                                    </table>
                                    <?php 
                                    if(empty($records)){
                                    ?>
                                    <h4 class="bg-light text-center border-top text-muted animated bounce  p-3">
                                        <i class="material-icons">block</i> DADUS LAIHA TABELA
                                    </h4>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <?php
                                if( $show_footer && !empty($records)){
                                ?>
                                <div class=" border-top mt-2">
                                    <div class="row justify-content-center">    
                                        <div class="col-md-auto justify-content-center">    
                                            <div class="p-3 d-flex justify-content-between">    
                                                <div class="dropup export-btn-holder mx-1">
                                                    <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="material-icons">save</i> EMPRIME DADUS
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <?php $export_print_link = $this->set_current_page_link(array('format' => 'print')); ?>
                                                        <a class="dropdown-item export-link-btn" data-format="print" href="<?php print_link($export_print_link); ?>" target="_blank">
                                                            <img src="<?php print_link('assets/images/print.png') ?>" class="mr-2" /> PRINT
                                                            </a>
                                                            <?php $export_pdf_link = $this->set_current_page_link(array('format' => 'pdf')); ?>
                                                            <a class="dropdown-item export-link-btn" data-format="pdf" href="<?php print_link($export_pdf_link); ?>" target="_blank">
                                                                <img src="<?php print_link('assets/images/pdf.png') ?>" class="mr-2" /> PDF
                                                                </a>
                                                                <?php $export_word_link = $this->set_current_page_link(array('format' => 'word')); ?>
                                                                <a class="dropdown-item export-link-btn" data-format="word" href="<?php print_link($export_word_link); ?>" target="_blank">
                                                                    <img src="<?php print_link('assets/images/doc.png') ?>" class="mr-2" /> WORD
                                                                    </a>
                                                                    <?php $export_csv_link = $this->set_current_page_link(array('format' => 'csv')); ?>
                                                                    <a class="dropdown-item export-link-btn" data-format="csv" href="<?php print_link($export_csv_link); ?>" target="_blank">
                                                                        <img src="<?php print_link('assets/images/csv.png') ?>" class="mr-2" /> CSV
                                                                        </a>
                                                                        <?php $export_excel_link = $this->set_current_page_link(array('format' => 'excel')); ?>
                                                                        <a class="dropdown-item export-link-btn" data-format="excel" href="<?php print_link($export_excel_link); ?>" target="_blank">
                                                                            <img src="<?php print_link('assets/images/xsl.png') ?>" class="mr-2" /> EXCEL
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col">   
                                                                <?php
                                                                if($show_pagination == true){
                                                                $pager = new Pagination($total_records, $record_count);
                                                                $pager->route = $this->route;
                                                                $pager->show_page_count = true;
                                                                $pager->show_record_count = true;
                                                                $pager->show_page_limit =true;
                                                                $pager->limit_count = $this->limit_count;
                                                                $pager->show_page_number_list = true;
                                                                $pager->pager_link_range=5;
                                                                $pager->render();
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 comp-grid mt-6">
                                            <form method="get" action="<?php print_link($current_page) ?>" class="form filter-form">
                                                <div class="card mb-3">
                                                    <div class="card-header bg-primary text-white shadow h4 h4">FILTER  DATA REJISTU</div>
                                                    <div class="p-2">
                                                        <select   name="reesudan_data_rejistu" class="form-control custom ">
                                                            <option value="">HILI DATA REJISTU</option>
                                                            <?php 
                                                            $reesudan_data_rejistu_options = $comp_model -> reesudan_reesudandata_rejistu_option_list();
                                                            if(!empty($reesudan_data_rejistu_options)){
                                                            foreach($reesudan_data_rejistu_options as $option){
                                                            $value = (!empty($option['value']) ? $option['value'] : null);
                                                            $label = (!empty($option['label']) ? $option['label'] : $value);
                                                            $selected = $this->set_field_selected('reesudan_data_rejistu',$value);
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
                                                <hr />
                                                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
                                                <div class="form-group text-center">
                                                    <button class="btn btn-primary"><i class="bi bi-sort-alpha-down m-2"></i>Filter Dadus</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-3 comp-grid mt-6">
                                            <form method="get" action="<?php print_link($current_page) ?>" class="form filter-form">
                                                <div class="card mb-3">
                                                    <div class="card-header bg-primary text-white shadow h4 h4">Filter  Dadus Municipiu</div>
                                                    <div class="p-2">
                                                        <select   name="reesudan_id_municipiu" class="form-control custom ">
                                                            <option value="">Hili Municipiu ...</option>
                                                            <?php 
                                                            $reesudan_id_municipiu_options = $comp_model -> reesudan_reesudanid_municipiu_option_list();
                                                            if(!empty($reesudan_id_municipiu_options)){
                                                            foreach($reesudan_id_municipiu_options as $option){
                                                            $value = (!empty($option['value']) ? $option['value'] : null);
                                                            $label = (!empty($option['label']) ? $option['label'] : $value);
                                                            $selected = $this->set_field_selected('reesudan_id_municipiu',$value);
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
                                                <hr />
                                                <div class="form-group text-center">
                                                    <button class="btn btn-primary shadpw"><i class="bi bi-sort-alpha-down m-2"></i>Filter Dadus</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-3 comp-grid mt-6">
                                            <form method="get" action="<?php print_link($current_page) ?>" class="form filter-form">
                                                <div class="card mb-3">
                                                    <div class="card-header bg-primary shadow text-white h4 h4">Filter Dadus Postu</div>
                                                    <div class="p-2">
                                                        <select   name="reesudan_id_postu" class="form-control custom ">
                                                            <option value="">Hili Postu ...</option>
                                                            <?php 
                                                            $reesudan_id_postu_options = $comp_model -> reesudan_reesudanid_postu_option_list();
                                                            if(!empty($reesudan_id_postu_options)){
                                                            foreach($reesudan_id_postu_options as $option){
                                                            $value = (!empty($option['value']) ? $option['value'] : null);
                                                            $label = (!empty($option['label']) ? $option['label'] : $value);
                                                            $selected = $this->set_field_selected('reesudan_id_postu',$value);
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
                                                <hr />
                                                <div class="form-group text-center">
                                                    <button class="btn btn-primary"><i class="bi bi-sort-alpha-down m-2"></i>Filter Dadus</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-3 comp-grid mt-6">
                                            <form method="get" action="<?php print_link($current_page) ?>" class="form filter-form">
                                                <div class="card mb-3">
                                                    <div class="card-header bg-primary shadow text-white h4 h4">Filter Dadus Suco</div>
                                                    <div class="p-2">
                                                        <select   name="reesudan_id_suco" class="form-control custom ">
                                                            <option value="">Hili Suko ...</option>
                                                            <?php 
                                                            $reesudan_id_suco_options = $comp_model -> reesudan_reesudanid_suco_option_list();
                                                            if(!empty($reesudan_id_suco_options)){
                                                            foreach($reesudan_id_suco_options as $option){
                                                            $value = (!empty($option['value']) ? $option['value'] : null);
                                                            $label = (!empty($option['label']) ? $option['label'] : $value);
                                                            $selected = $this->set_field_selected('reesudan_id_suco',$value);
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
                                                <hr />
                                                <div class="form-group text-center">
                                                    <button class="btn btn-primary"><i class="bi bi-sort-alpha-down m-2"></i>Filter Dadus</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
