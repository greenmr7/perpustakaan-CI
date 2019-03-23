<p><a href="<?php echo base_url('admin/buku/tambah') ?>" class="btn btn-success">
  <i class="fa fa-plus"></i> Tambah</a></p>

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
          <th>Cover</th>
          <th>Judul Buku</th>
          <th>Penulis</th>
          <th>Letak Buku</th>
          <th>Jenis - Bahasa</th>
          <th>Action</th>
      </tr>
  </thead>
  <tbody>
  <?php $i=1; foreach($buku as $buku) { ?>
      <tr class="odd gradeX">
          <td><?php echo $i ?></td>
          <td><?php if($buku->cover_buku != ""){ ?>
                  <img src="<?php echo base_url('assets/upload/buku/thumbs/'.$buku->cover_buku) ?>" class="img img-thumbnail" width="60">
              <?php }else{ echo 'Tidak ada';} ?>

         </td>
          <td><?php echo $buku->judul_buku ?></td>
          <td><?php echo $buku->penulis_buku ?>
          <td><?php echo $buku->letak_buku?></td>
          <td><?php echo $buku->kode_jenis ?> - <?php echo $buku->kode_bahasa ?></td></td>

          <td>
          <a href="<?php echo base_url('admin/buku/edit/'.$buku->id_buku) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
          <?php
            //Delete
            include('delete.php')
          ?>
          </td>
      </tr>
  <?php $i++; } ?>
  </tbody>
  </table>
