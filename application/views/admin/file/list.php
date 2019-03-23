<?php
  //deteksi URI segment
  if($this->uri->segment(3) != ""){
    include('tambah.php');
  }else {
?>

<p><a href="<?php echo base_url('admin/file/tambah') ?>" class="btn btn-success">
  <i class="fa fa-plus"></i> Tambah File Buku</a></p>

  <?php
}
    //cetak notifikasi
    if($this->session->flashdata('success')){
      echo '<div class="alert alert-success"><i class="fa fa-check"></i>';
      echo $this->session->flashdata('success');
      echo '</div>';
    }
  ?>
  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
  <thead>
      <tr>
          <th>#</th>
          <th>Judul Buku</th>
          <th>Nama File Buku</th>
          <th>Keterangan</th>
          <th>Urutan</th>
          <th>Action</th>
      </tr>
  </thead>
  <tbody>
  <?php
    $i=1; foreach($file as $file) {
  ?>
      <tr class="odd gradeX">
          <td><?php echo $i ?></td>
          <td><?php echo $file->judul_buku ?></td>
          <td><?php echo $file->nama_file ?>
          <td><?php echo $file->keterangan?></td>
          <td><?php echo $file->urutan ?> </td>

          <td>
            <a href="<?php echo base_url('admin/file/edit/'.$file->id_file) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
            <?php include('delete.php');?>
          </td>
      </tr>
  <?php $i++; } ?>
  </tbody>
  </table>
