<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete<?php echo $file->id_file ?>" title="Delete File">
  <i class="fa fa-trash-o"></i>
</button>
<div class="modal fade" id="Delete<?php echo $file->id_file ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Delete Data File Buku : <?php echo $file->judul_buku ?></h4>
            </div>
            <div class="modal-body">
        			<p class="alert alert-warning">Are you sure want to delete this data?</p>
            </div>
            <div class="modal-footer">
              <a href="<?php echo base_url('admin/file/delete/'.$file->id_file.'/'.$file->id_buku) ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i> Yes. Delete this Data</a>
              <a href="<?php echo base_url('admin/file/edit/'.$file->id_file) ?>" class="btn btn-warning"><i class="fa fa-edit"></i> Edit this Data</a>
              <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i>Close</button>
            </div>
        </div>
    </div>
</div>
