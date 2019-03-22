<?php include('tambah.php'); ?>

<br>

  <?php
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
          <th>Kode</th>
          <th>Nama</th>
          <th>Urutan</th>
          <th>Keterangan</th>
          <th>Action</th>
      </tr>
  </thead>
  <tbody>
  <?php $i=1; foreach($jenis as $jenis) { ?>
      <tr class="odd gradeX">
          <td><?php echo $i ?></td>
          <td><?php echo $jenis->kode_jenis ?><br>
          <td><?php echo $jenis->nama_jenis ?></td>
          <td><?php echo $jenis->urutan ?></td>
          <td><?php echo $jenis->keterangan ?></td>
          <td>
          <a href="<?php echo base_url('admin/jenis/edit/'.$jenis->id_jenis) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
          <?php
            //Delete
            include('delete.php')
          ?>
          </td>
      </tr>
  <?php $i++; } ?>
  </tbody>
  </table>
