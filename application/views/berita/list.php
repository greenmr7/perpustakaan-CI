<div class="slider">
    <div class="callbacks_container">
      <ul class="rslides" >
        <li>
          <div style="background-image: url(<?php echo base_url()?>assets/front/images/b2.jpg);">
            <div class="container">
              <div class="slider-info text-left">
                <div class="text-center" style="padding-bottom:100px; ">
                  <h5 style=" color: white;" >News</h5>
                  <h4>
                    <a href="<?php echo base_url() ?>">Home</a>
                    <a href="<?php echo base_url('berita') ?>">News</a>
                  </h4>
                </div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
    <div class="clearfix"></div>

  <section class="py-lg-4 py-md-3 py-sm-3 py-3" id="blog">
    <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
      <!-- <h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3"></h3> -->
      <div class="row">
        <?php $i=1; foreach ($berita as $berita) {?>
        <div class="col-lg-4 col-md-6 col-sm-6 blog-grid-flex">
          <div class="clients-color">
            <img src="<?php echo base_url('assets/upload/berita/'.$berita->gambar) ?>" class="img-fluid" alt="">
            <div class="blog-txt-info">
              <h4 class="mt-2"><a href="<?php echo base_url('berita/read/'.$berita->slug_berita) ?>" data-blast="color"><?php echo $berita->judul_berita ?> </a></h4>
              <div class="news-date my-3">
                <ul>
                  <li class="mr-3"><span class="far fa-calendar-check"></span><a href="#" ><?php echo $berita->tanggal ?></a></li>
                  <li><span class="far fa-comments"></span><a href="#" data-toggle="modal" data-target="#exampleModalLive">5 Comments</a></li>
                </ul>
              </div>
              <p><?php echo $berita->isi ?></p>
              <div class="outs_more-buttn" >
                <a href="<?php echo base_url('berita/read/'.$berita->slug_berita) ?>"  data-blast="bgColor">More</a>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
      </div>
    </div>
  </section>
