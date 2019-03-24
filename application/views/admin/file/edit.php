<?php

// cetak error kalau ada salah input
echo validation_errors('<div class="alert alert-warning"><i class="fa fa-warning"></i>','</div>');

if(isset($error)) {
	echo '<div class="alert alert-success">';
	echo $error;
	echo '</div>';
}


echo form_open_multipart(base_url('admin/file/kelola/'.$file->id_file));
?>
							<div class="form-group">
								<label>Judul File</label>
								<input type="text" name="judul_file" class="form-control" placeholder="Judul File" value="<?php echo $file->judul_file ?>" required>
							</div>

							<div class="form-group">
								<label>Upload File <small>(File lama: <a href="<?php echo base_url('admin/file/download/'.$file->id_file) ?>"> <i class="fa fa-download"></i> <?php echo $file->nama_file ?></a>)</small></label>
								<input type="file" name="nama_file" class="form-control" placeholder="Upload File" value="<?php echo $file->nama_file?>" >
							</div>

							<div class="form-group">
								<label>Urutan File</label>
								<input type="number" name="urutan" class="form-control" placeholder="Urutan File" value="<?php echo $file->urutan ?>" >
							</div>

							<div class="form-group">
								<label>Kerterangan Lain</label>
								<textarea name="keterangan" class="form-control" placeholder="Keterangan"><?php echo $file->keterangan ?></textarea>
							</div>

							<div class="form-group">
								<input type="submit" name="Submit" class="btn btn-success" value="Update Data File">
								<input type="reset" name="reset" class="btn btn-default" value="Reset">
							</div>




<?php echo form_close() ?>
