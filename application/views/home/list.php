<!--banner -->
      <!-- Slideshow 4 -->
      <div class="slider">
        <div class="callbacks_container">
          <ul class="rslides" id="slider4">
            <?php $i=1; foreach($slide as $slide) { ?>
            <li>
              <div style="background-image: url(<?php echo base_url('assets/upload/berita/'.$slide->gambar)?>);"class="slider-img <?php if($i==1){ echo 'active'; } ?>">
                <div class="container">
                  <div class="slider-info text-left">
                    <h5><?php echo $slide->judul_berita ?></h5>
                    <p><?php echo character_limiter($slide->isi,50) ?>
                    </p>
                    <div class="outs_more-buttn" >
                      <a href="<?php echo base_url('berita/read/'.$slide->slug_berita) ?>" data-blast="bgColor">More</a>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <?php $i++; } ?>
          </ul>
        </div>

        <!-- This is here just to demonstrate the callbacks -->
        <!-- <ul class="events">
          <li>Example 4 callback events</li>
          </ul>-->
          <div class="clearfix"></div>
      </div>
    <!-- </div> -->
    <!-- //banner -->

    <!--model-->
    <!-- <div id="exampleModalLive" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLiveLabel" data-blast="color"><?php echo $slide->judul_berita ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <img src="<?php echo base_url('assets/front/images/'.$slide->gambar) ?>" alt="" class="img-fluid">
            <p><?php echo $slide->isi ?></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div> -->
    <!--//model-->

    <!--about-->
    <section class="pt-md-5 pt-sm-4 pt-3">
      <div class="container-fluid ">
        <div class="main row ">
          <!-- TENTH EXAMPLE -->
          <div class="col-lg-4 view view-tenth">
            <img src="<?php echo base_url()?>assets/front/images/ab1.jpg" alt="" class="img-fluid">
            <div class="mask">
              <h3 data-blast="bgColor">Success</h3>
              <p>Vivamus sed poritor felis.ntesque habitant morbi senectus et netus</p>
              <a href="#" class="info" data-toggle="modal" data-target="#exampleModalLive" data-blast="bgColor">Read More</a>
            </div>
          </div>
          <div class="col-lg-4 view view-tenth">
            <img src="<?php echo base_url()?>assets/front/images/ab2.jpg" alt="" class="img-fluid">
            <div class="mask">
              <h3 data-blast="bgColor">Hard Work</h3>
              <p>Vivamus sed poritor felis.ntesque habitant morbi senectus et netus</p>
              <a href="#" class="info" data-toggle="modal" data-target="#exampleModalLive" data-blast="bgColor">Read More</a>
            </div>
          </div>
          <div class="col-lg-4 view view-tenth">
            <img src="<?php echo base_url()?>assets/front/images/ab3.jpg" alt="" class="img-fluid">
            <div class="mask">
              <h3 data-blast="bgColor">Admission</h3>
              <p>Vivamus sed poritor felis.ntesque habitant morbi senectus et netus</p>
              <a href="#" class="info" data-toggle="modal" data-target="#exampleModalLive" data-blast="bgColor">Read More</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--Keyword-->
    <section class="py-md-5 py-sm-4 py-3">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 subscrib-w3layouts text-center">
            <h2 data-blast="color">Pencarian Buku</h2>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="newsletter">
              <form action="<?php echo base_url('katalog') ?>" method="post" class="d-flex">
                <input type="text" name="cari" class="form-control" placeholder="Keyword" required >
                <!-- <input type="submit" name="submit" class="btn btn-danger" value="Search" > -->
                <button class="btn1" >
                <span class="fa fa-search" data-blast="bgcolor"></span>
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--//about-->
    <!--service-->
    <section class="service py-lg-4 py-md-3 py-sm-3 py-3" id="service">
      <div class="container py-lg-5 py-md-5 py-sm-4 py-3">
        <h3 class="title clr text-center mb-lg-5 mb-md-4  mb-sm-4 mb-3">services</h3>
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-6 w3layouts-service-list text-center">
            <div class="white-shadow">
              <div class="text-wls-ser-bake">
                <span class="fas fa-book banner-icon" data-blast="color"></span>
              </div>
              <div class="ser-inner-info">
                <h4 class="my-3">Lorem ipsum</h4>
                <p>delectus reiciendis maiores alias consequatur aut.maiores alias</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6 w3layouts-service-list text-center">
            <div class="white-shadow">
              <div class="text-wls-ser-bake">
                <span class="fas fa-pencil-alt banner-icon" data-blast="color"></span>
              </div>
              <div class="ser-inner-info">
                <h4 class="my-3">Lorem ipsum</h4>
                <p>delectus reiciendis maiores alias consequatur aut.maiores alias</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6 w3layouts-service-list text-center">
            <div class="white-shadow">
              <div class="text-wls-ser-bake">
                <span class="fas fa-bookmark banner-icon" data-blast="color"></span>
              </div>
              <div class="ser-inner-info">
                <h4 class="my-3">Lorem ipsum</h4>
                <p>delectus reiciendis maiores alias consequatur aut.maiores alias</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6 w3layouts-service-list text-center mt-md-4 mt-sm-3 mt-3">
            <div class="white-shadow">
              <div class="text-wls-ser-bake">
                <span class="fas fa-address-book banner-icon" data-blast="color"></span>
              </div>
              <div class="ser-inner-info">
                <h4 class="my-3">Lorem ipsum</h4>
                <p>delectus reiciendis maiores alias consequatur aut.maiores alias</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6 w3layouts-service-list text-center mt-md-4 mt-sm-3 mt-3">
            <div class="white-shadow">
              <div class="text-wls-ser-bake">
                <span class="fas fa-graduation-cap banner-icon" data-blast="color"></span>
              </div>
              <div class="ser-inner-info">
                <h4 class="my-3">Lorem ipsum</h4>
                <p>delectus reiciendis maiores alias consequatur aut.maiores alias</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6 w3layouts-service-list text-center mt-md-4 mt-sm-3 mt-3">
            <div class="white-shadow">
              <div class="text-wls-ser-bake">
                <span class="fab fa-cloudscale banner-icon" data-blast="color"></span>
              </div>
              <div class="ser-inner-info">
                <h4 class="my-3">Lorem ipsum</h4>
                <p>delectus reiciendis maiores alias consequatur aut.maiores alias</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--//service-->

    <!--Book-->
    <section class="team py-lg-4 py-md-3 py-sm-3 py-3" id="team">
      <div class="container py-lg-5 py-md-5 py-sm-4 py-3">
        <h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">Book</h3>
        <div class="row">
          <?php $i; foreach ($buku as $buku) {?>
          <div class="col-lg-3 col-md-6 col-sm-6 profile">
            <div class="team-shadow">
              <div class="img-box">
                <img src="<?php echo base_url('assets/upload/buku/'.$buku->cover_buku) ?>" alt="<?php echo $buku->judul_buku ?>">
                <!-- <div class="list-social-icons">
                  <ul>
                    <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                    <li><a href="#"><span class="fas fa-envelope"></span></a></li>
                    <li><a href="#"><span class="fas fa-rss"></span></a></li>
                    <li><a href="#"><span class="fab fa-vk"></span></a></li>
                  </ul>
                </div> -->
              </div>
              <div class="team-w3layouts-info py-lg-4 py-3 text-center" data-blast="bgColor">
                <h4 class="text-white mb-2"> <a href="<?php echo base_url('katalog/read/'.$buku->id_buku) ?>"><?php echo $buku->judul_buku ?></a> </h4>
                <span class="wls-client-title text-black"><?php echo $buku->penulis_buku ?></span>
              </div>
            </div>
          </div>
          <!-- <div class="clearfix"></div> -->
        <?php } ?>
        </div>
      </div>
    </section>
    <!--//Buku-->

    <!--stats-->
    <section class="stats py-lg-4 py-md-3 py-sm-3 py-3" id="stats">
      <div class="container py-lg-5 py-md-5 py-sm-4 py-3">
        <h3 class="title clr text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">Our Stats </h3>
        <div class="jst-must-info text-center">
          <div class="row stats-info">
            <div class="col-lg-3 col-md-6 col-sm-6 col-6 stats-grid-1">
              <div class="stats-grid" data-blast="bgColor">
                <div class="counter">2045</div>
                <div class="stat-info">
                  <h5 class="pt-2">Experience </h5>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6 stats-grid-2">
              <div class=" stats-grid" data-blast="bgColor">
                <div class="counter">350</div>
                <div class="stat-info">
                  <h5 class="pt-2"> Staff</h5>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6 stats-grid-3">
              <div class=" stats-grid" data-blast="bgColor">
                <div class="counter">1000</div>
                <div class="stat-info">
                  <h5 class="pt-2"> Coffee</h5>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6 stats-grid-4">
              <div class=" stats-grid" data-blast="bgColor">
                <div class="counter">650</div>
                <div class="stat-info">
                  <h5 class="pt-2"> Projects </h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--//stats-->

    <!--News -->
    <section class="blog py-lg-4 py-md-3 py-sm-3 py-3" id="blog">
      <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
        <h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">News</h3>
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
    <!--//News -->

    <!--contact -->
    <section class="contact py-lg-4 py-md-3 py-sm-3 py-3" id="contact">
      <div class="container py-lg-5 py-md-5 py-sm-4 py-3">
        <h3 class="title clr text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">Contact Us</h3>
        <div class="row">
          <div class="col-md-5 address-grid">
            <div class="addres-office-hour text-center" >
              <ul>
                <li class="mb-2">
                  <h6 data-blast="color">Address</h6>
                </li>
                <li>
                  <p>Melbourne,south Brisbane,<br>QLD 4101,Aurstralia.</p>
                </li>
              </ul>
              <ul>
                <li class="mt-lg-4 mt-3">
                  <h6 data-blast="color">Phone</h6>
                </li>
                <li class="mt-2">
                  <p>+ 1 (234) 567 8901</p>
                </li>
                <li class="mt-lg-4 mt-3">
                  <h6 data-blast="color">Email</h6>
                </li>
                <li class="mt-2">
                  <p><a href="mailto:info@example.com">info@example.com</a></p>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-7 contact-form">
            <form action="#" method="post">
              <div class="row text-center contact-wls-detail">
                <div class="col-md-6 form-group contact-forms">
                  <input type="text" class="form-control" placeholder="Your Name" required="">
                </div>
                <div class="col-md-6 form-group contact-forms">
                  <input type="email" class="form-control" placeholder="Your Email" required="">
                </div>
              </div>
              <div class="form-group contact-forms">
                <input type="text" class="form-control" placeholder="Subject" required="">
              </div>
              <div class="form-group contact-forms">
                <textarea class="form-control" rows="3" placeholder="Your Message" required=""></textarea>
              </div>
              <div class="sent-butnn text-center">
                <button type="submit" class="btn btn-block" data-blast="bgColor">Send</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!--//contact -->
