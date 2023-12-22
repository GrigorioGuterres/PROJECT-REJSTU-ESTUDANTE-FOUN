<?php 
$page_id = null;
$comp_model = new SharedController;
$current_page = $this->set_current_page_link();
?>
<div>
    <div  class="p-3 mb-3" style="background: rgb(146,36,190);
background: -moz-linear-gradient(161deg, rgba(146,36,190,0.5596287831538865) 18%, rgba(36,88,190,0.8307772083442753) 99%);
background: -webkit-linear-gradient(161deg, rgba(146,36,190,0.5596287831538865) 18%, rgba(36,88,190,0.8307772083442753) 99%);
background: linear-gradient(161deg, rgba(146,36,190,0.5596287831538865) 18%, rgba(36,88,190,0.8307772083442753) 99%);
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#9224be",endColorstr="#2458be",GradientType=1);">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <h4 >The Dashboard</h4>
                </div>
                <div class="col-md-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_dadussuko();  ?>
                    <a class="animated zoomIn record-count card bg-light text-dark"  href="<?php print_link("suko/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="material-icons mi-xxlg">folder_special</i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">DADUS SUKO</div>
                                    <div class="progress mt-2">
                                        <?php 
                                        $perc = ($rec_count / 100) * 100 ;
                                        ?>
                                        <div class="progress-bar bg-light text-dark" role="progressbar" aria-valuenow="<?php echo $rec_count; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $perc ?>%">
                                            <span class="progress-label"><?php echo round($perc,2); ?>%</span>
                                        </div>
                                    </div>
                                    <small class="small desc"></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_dadusaldeia();  ?>
                    <a class="animated zoomIn record-count card bg-light text-dark"  href="<?php print_link("tb_aldeia/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="material-icons mi-xxlg">folder_shared</i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">DADUS ALDEIA</div>
                                    <div class="progress mt-2">
                                        <?php 
                                        $perc = ($rec_count / 100) * 100 ;
                                        ?>
                                        <div class="progress-bar bg-light text-dark" role="progressbar" aria-valuenow="<?php echo $rec_count; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $perc ?>%">
                                            <span class="progress-label"><?php echo round($perc,2); ?>%</span>
                                        </div>
                                    </div>
                                    <small class="small desc"></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_totalestudante();  ?>
                    <a class="animated zoomIn record-count card bg-light text-dark"  href="<?php print_link("tb_estudante/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="material-icons mi-xxlg">folder_shared</i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">TOTAL ESTUDANTE</div>
                                    <div class="progress mt-2">
                                        <?php 
                                        $perc = ($rec_count / 100) * 100 ;
                                        ?>
                                        <div class="progress-bar bg-light text-dark" role="progressbar" aria-valuenow="<?php echo $rec_count; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $perc ?>%">
                                            <span class="progress-label"><?php echo round($perc,2); ?>%</span>
                                        </div>
                                    </div>
                                    <small class="small desc"></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_dadusmunicipiu();  ?>
                    <a class="animated zoomIn record-count card bg-light text-dark"  href="<?php print_link("tb_municipiu/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="material-icons mi-xxlg">import_contacts</i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">DADUS MUNICIPIU</div>
                                    <div class="progress mt-2">
                                        <?php 
                                        $perc = ($rec_count / 100) * 100 ;
                                        ?>
                                        <div class="progress-bar bg-light text-dark" role="progressbar" aria-valuenow="<?php echo $rec_count; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $perc ?>%">
                                            <span class="progress-label"><?php echo round($perc,2); ?>%</span>
                                        </div>
                                    </div>
                                    <small class="small desc"></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_daduspostu();  ?>
                    <a class="animated zoomIn record-count card bg-light text-dark"  href="<?php print_link("tb_postu/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="material-icons mi-xxlg">import_contacts</i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">DADUS POSTU</div>
                                    <div class="progress mt-2">
                                        <?php 
                                        $perc = ($rec_count / 100) * 100 ;
                                        ?>
                                        <div class="progress-bar bg-light text-dark" role="progressbar" aria-valuenow="<?php echo $rec_count; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $perc ?>%">
                                            <span class="progress-label"><?php echo round($perc,2); ?>%</span>
                                        </div>
                                    </div>
                                    <small class="small desc"></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 comp-grid">
                    <?php $rec_count = $comp_model->getcount_dadusadmin();  ?>
                    <a class="animated zoomIn record-count card bg-light text-dark"  href="<?php print_link("tb_user/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="material-icons mi-xxlg">fingerprint</i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">DADUS ADMIN</div>
                                    <div class="progress mt-2">
                                        <?php 
                                        $perc = ($rec_count / 100) * 100 ;
                                        ?>
                                        <div class="progress-bar bg-light text-dark" role="progressbar" aria-valuenow="<?php echo $rec_count; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $perc ?>%">
                                            <span class="progress-label"><?php echo round($perc,2); ?>%</span>
                                        </div>
                                    </div>
                                    <small class="small desc"></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
