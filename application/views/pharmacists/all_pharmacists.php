<div class="row">

    <div class="col-lg-12">


        <div class="panel panel-default">

            <div class="panel-heading">
                <?php echo $this->lang->line('menu_all_pharmacists')?>

            </div>
            <div class="panel-body">

                <?php foreach ($pharmacists AS $pharmacist) { ?>
                    <div class="row" style="border-bottom: 5px #54920c solid;margin: 10px">
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="margin-bottom: 10px">
                            <img src="<?php if($pharmacist['farmacisti_photo_location']!='')echo base_url('').$pharmacist['farmacisti_photo_location'];else echo 'http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image'?>" style="border: 2px #54920c solid" height="150px" width="150px">
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="row">
                                <div class="col-xs-12">
                                    <b style="font-size: x-large"><?php echo $pharmacist['farmacisti_first_name'].' '.$pharmacist['farmacisti_last_name']?></b>
                                </div>
                                <div class="col-xs-12">
                                    <p style="font-size: x-large"><?php echo $pharmacist['farmacisti_job_position']?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                            <a href="<?php echo base_url('edit_pharmacist/'.$pharmacist['farmacisti_id']) ?>" data-placement="top" data-toggle="tooltip"
                               title="<?php echo $this->lang->line('edit')?>"><span class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                                                                                       aria-hidden="true"></i> </span></a>
                            <a href="#" onclick="delete_model(<?php echo $pharmacist['farmacisti_id']?>)" class="deletebutton" data-placement="top"
                               data-toggle="tooltip" title="<?php echo $this->lang->line('delete')?>"><span class="btn btn-danger btn-sm"><i class="fa fa-trash-o"
                                                                                                                                              aria-hidden="true"></i> </span></a>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="message_delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <p><?php echo $this->lang->line('want_to_delete_it');?></p>
            </div>
            <div class="modal-footer">
                <a href="#" id="delete_link" class="btn btn-danger" > <?php echo $this->lang->line('delete');?> </a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->