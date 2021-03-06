<?php
// Session
if($this->session->flashdata('success')) {
	echo '<div class="alert alert-success">';
	echo $this->session->flashdata('success');
	echo '</div>';
}

// cetak error kalau ada salah input
echo validation_errors('<div class="alert alert-warning"><i class="fa fa-warning"></i>','</div>');

if(isset($error)) {
	echo '<div class="alert alert-success">';
	echo $error;
	echo '</div>';
}


echo form_open_multipart(base_url('admin/berita/tambah'));
?>

<div class="col-md-12">
	<div class="form-group form-group-lg">
		<label>Judul Berita</label>
		<input type="text" name="judul_berita" class="form-control" placeholder="Judul Berita" value="<?php echo set_value('judul_berita') ?>" required>
	</div>
</div>

<div class="col-md-4">
	<div class="forom-group">
		<label>Status Berita</label>
		<select name="status_berita" class="form-control" >
			<option value="Publish">Publish</option>
			<option value="Draft">Simpan Sebagai Draft</option>
		</select>
	</div>
</div>

<div class="col-md-4">
	<div class="forom-group ">
		<label>Jenis Berita</label>
		<select name="jenis_berita" class="form-control" >
			<option value="Berita">Berita</option>
			<option value="Slide">Homepage</option>
		</select>
	</div>
</div>

<div class="col-md-4">
	<div class="forom-group">
		<label>Upload Gambar Berita</label>
		<input type="file" name="gambar" class="form-control" placeholder="Gambar" required="required">
	</div>
</div>

<div class="col-md-12">
	<div class="form-group ">
		<label>Isi Berita</label>
		<textarea name="isi" class="form-control editor" placeholder="Isi"> <?php echo set_value('isi') ?> </textarea>
	</div>

    <div class="form-group form-group-lg text-center">
  		<input type="submit" name="Submit" class="btn btn-primary btn-lg" value="Save Data">
  		<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
  	</div>
</div>



<?php echo form_close() ?>
