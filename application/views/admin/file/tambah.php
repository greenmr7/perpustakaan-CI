<p><button class="btn btn-success" data-toggle="modal" data-target="#Add" title="Add File">
  <i class="fa fa-upload"></i>
</button>
<?php

// cetak error kalau ada salah input
echo validation_errors('<div class="alert alert-warning"><i class="fa fa-warning"></i>','</div>');

if(isset($error)) {
	echo '<div class="alert alert-success">';
	echo $error;
	echo '</div>';
}


echo form_open_multipart(base_url('admin/file/kelola/'.$buku->id_buku));
?>

<div class="modal fade" id="Add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Tambah File Baru</h4>
            </div>
            <div class="modal-body">
							<div class="form-group">
								<label>Judul File</label>
								<input type="text" name="judul_file" class="form-control" placeholder="Judul File" value="<?php echo set_value('judul_file') ?>" required>
							</div>

							<div class="form-group">
								<label>Upload File</label>
								<input type="file" name="nama_file" class="form-control" placeholder="Upload File" value="<?php echo set_value('nama_file') ?>" required>
							</div>

							<div class="form-group">
								<label>Urutan File</label>
								<input type="number" name="urutan" class="form-control" placeholder="Urutan File" value="<?php echo set_value('urutan') ?>" >
							</div>

							<div class="form-group">
								<label>Kerterangan Lain</label>
								<textarea name="keterangan" class="form-control" placeholder="Keterangan"><?php echo set_value('keterangan') ?></textarea>
							</div>

            </div>
            <div class="modal-footer">
							<input type="submit" name="Submit" class="btn btn-success" value="Upload File Baru">
							<input type="reset" name="reset" class="btn btn-default" value="Reset">
              <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i>Close</button>
            </div>
        </div>
    </div>
</div>


<?php echo form_close() ?>
