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
  <?php $i=1; foreach($bahasa as $bahasa) { ?>
      <tr class="odd gradeX">
          <td><?php echo $i ?></td>
          <td><?php echo $bahasa->kode_bahasa ?><br>
          <td><?php echo $bahasa->nama_bahasa ?></td>
          <td><?php echo $bahasa->urutan ?></td>
          <td><?php echo $bahasa->keterangan ?></td>
          <td>
          <a href="<?php echo base_url('admin/bahasa/edit/'.$bahasa->id_bahasa) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
          <?php
            //Delete
            include('delete.php')
          ?>
          </td>
      </tr>
  <?php $i++; } ?>
  </tbody>
  </table>
