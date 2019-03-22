<p>
	<button class="btn btn-success" data-toggle="modal" data-target="#Tambah" >
  <i class="fa fa-plus"></i>Tambah
</button>
</p>
<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Data Jenis</h4>
            </div>
            <div class="modal-body">

<?php
// Session
if($this->session->flashdata('success')) {
	echo '<div class="alert alert-success">';
	echo $this->session->flashdata('success');
	echo '</div>';
}

// cetak error kalau ada salah input
echo validation_errors('<div class="alert alert-warning"><i class="fa fa-warning"></i>','</div>');

echo form_open(base_url('admin/jenis'));
?>

<div class="col-lg-6">
	<div class="form-group form-group-lg">
		<label>Nama Jenis Buku</label>
		<input type="text" name="nama_jenis" class="form-control" placeholder="Nama Jenis Buku" value="<?php echo set_value('nama_jenis_jenis') ?>" required>
	</div>
	<div class="form-group form-group-lg">
		<label>Kode Jenis Buku</label>
		<input type="text" name="kode_jenis" class="form-control" placeholder="Kode Jenis Buku" value="<?php echo set_value('kode_jenis') ?>" required>
	</div>
	<div class="form-group form-group-lg">
		<label>Urutan Tampil </label>
		<input type="number" name="urutan"  class="form-control" placeholder="Nomor Urut Tampil" value="<?php echo set_value('urutan') ?>">
	</div>
  </div>
  <div class="col-lg-6">
    <div class="form-group form-group-lg">
      <label>Keterangan Lain</label>
      <textarea name="keterangan" class="form-control" placeholder="keterangan"> <?php echo set_value('keterangan') ?> </textarea>
    </div>
    <div class="form-group form-group-lg">
  		<input type="submit" name="Submit" class="btn btn-primary btn-lg" value="Save Data">
  		<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
  	</div>
  </div>



<?php echo form_close() ?>

<div class="clearfix"></div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i>Close</button>
</div>
</div>
</div>
</div>
