<?php
$comp_model = new SharedController;
$page_element_id = "view-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data Information from Controller
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id; //Page id from url
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_edit_btn = $this->show_edit_btn;
$show_delete_btn = $this->show_delete_btn;
$show_export_btn = $this->show_export_btn;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="view"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">View  Reesudan</h4>
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
                <div class="col-md-12 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="card animated fadeIn page-content">
                        <?php
                        $counter = 0;
                        if(!empty($data)){
                        $rec_id = (!empty($data['id']) ? urlencode($data['id']) : null);
                        $counter++;
                        ?>
                        <div id="page-report-body" class="">
                            <table class="table table-hover table-borderless table-striped">
                                <!-- Table Body Start -->
                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <tr  class="td-id">
                                        <th class="title"> Id: </th>
                                        <td class="value"> <?php echo $data['id']; ?></td>
                                    </tr>
                                    <tr  class="td-n_emis">
                                        <th class="title"> N Emis: </th>
                                        <td class="value"> <?php echo $data['n_emis']; ?></td>
                                    </tr>
                                    <tr  class="td-naran_estudante">
                                        <th class="title"> Naran Estudante: </th>
                                        <td class="value"> <?php echo $data['naran_estudante']; ?></td>
                                    </tr>
                                    <tr  class="td-sexo">
                                        <th class="title"> Sexo: </th>
                                        <td class="value"> <?php echo $data['sexo']; ?></td>
                                    </tr>
                                    <tr  class="td-data_moris">
                                        <th class="title"> Data Moris: </th>
                                        <td class="value"> <?php echo $data['data_moris']; ?></td>
                                    </tr>
                                    <tr  class="td-f_moris">
                                        <th class="title"> F Moris: </th>
                                        <td class="value"> <?php echo $data['f_moris']; ?></td>
                                    </tr>
                                    <tr  class="td-img_estudante">
                                        <th class="title"> Img Estudante: </th>
                                        <td class="value"><?php Html :: page_img($data['img_estudante'],400,400,1); ?></td>
                                    </tr>
                                    <tr  class="td-eskola_anterior">
                                        <th class="title"> Eskola Anterior: </th>
                                        <td class="value"> <?php echo $data['eskola_anterior']; ?></td>
                                    </tr>
                                    <tr  class="td-pai">
                                        <th class="title"> Pai: </th>
                                        <td class="value"> <?php echo $data['pai']; ?></td>
                                    </tr>
                                    <tr  class="td-mae">
                                        <th class="title"> Mae: </th>
                                        <td class="value"> <?php echo $data['mae']; ?></td>
                                    </tr>
                                    <tr  class="td-id_municipiu">
                                        <th class="title"> Id Municipiu: </th>
                                        <td class="value"> <?php echo $data['id_municipiu']; ?></td>
                                    </tr>
                                    <tr  class="td-id_postu">
                                        <th class="title"> Id Postu: </th>
                                        <td class="value"> <?php echo $data['id_postu']; ?></td>
                                    </tr>
                                    <tr  class="td-id_suco">
                                        <th class="title"> Id Suco: </th>
                                        <td class="value"> <?php echo $data['id_suco']; ?></td>
                                    </tr>
                                    <tr  class="td-id_aldeia">
                                        <th class="title"> Id Aldeia: </th>
                                        <td class="value"> <?php echo $data['id_aldeia']; ?></td>
                                    </tr>
                                    <tr  class="td-n_kontaktu">
                                        <th class="title"> N Kontaktu: </th>
                                        <td class="value"> <?php echo $data['n_kontaktu']; ?></td>
                                    </tr>
                                    <tr  class="td-data_rejistu">
                                        <th class="title"> Data Rejistu: </th>
                                        <td class="value"> <?php echo $data['data_rejistu']; ?></td>
                                    </tr>
                                </tbody>
                                <!-- Table Body End -->
                            </table>
                        </div>
                        <div class="p-3 d-flex">
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
                                            <?php
                                            }
                                            else{
                                            ?>
                                            <!-- Empty Record Message -->
                                            <div class="text-muted p-3">
                                                <i class="material-icons">block</i> No Record Found
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>