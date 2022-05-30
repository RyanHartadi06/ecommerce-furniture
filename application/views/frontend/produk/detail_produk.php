<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="page-title">
          <h1>Product Detail</h1>
        </div>
      </div>
      <div class="col-md-6">
        <ol class="breadcrumb justify-content-md-end">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Pages</a></li>
          <li class="breadcrumb-item active">Product Detail</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!-- END SECTION BREADCRUMB -->
<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
        <div class="product-image">
          <div class="product_img_box">
            <img id="product_img" src='<?= base_url($data['foto']) ?>' data-zoom-image="<?= base_url($data['foto']) ?>"
              alt="product_img1" />
            <a href="#" class="product_img_zoom" title="Zoom">
              <span class="linearicons-zoom-in"></span>
            </a>
          </div>
          <div id="pr_item_gallery" class="product_gallery_item slick_slider" data-slides-to-show="4"
            data-slides-to-scroll="1" data-infinite="false">
            <?php 
            $no = 0;
            foreach ($foto_produk as $fp) { $no++; ?>
            <div class="item">
              <a href="#" class="product_gallery_item <?= ($no==1) ? 'active' : '' ?>"
                data-image="<?= base_url($fp->foto) ?>" data-zoom-image="<?= base_url($fp->foto) ?>">
                <img style="width:120px; height:120px; object-fit:cover;" src="<?= base_url($fp->foto) ?>"
                  alt="product_small_img1" />
              </a>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6">
        <div class="pr_detail">
          <div class="product_description">
            <h4 class="product_title"><a href="#"><?= $data['nama'] ?></a></h4>
            <div class="product_price">
              <span class="price"><?= rupiah($data['harga']) ?></span>
            </div>
            <div class="rating_wrap">
              <div class="rating">
                <div class="product_rate" style="width:80%"></div>
              </div>
              <span class="rating_num">(21)</span>
            </div>
            <div class="pr_desc">
              <p> </p>
            </div>
          </div>
          <hr />
          <p><?= $data['deskripsi'] ?></p>
          <form id="form-cart">
            <div class="cart_extra">
              <input type="hidden" name="id_produk" value="<?= $data['id'] ?>">
              <div class="cart-product-quantity">
                <div class="quantity">
                  <input type="button" value="-" class="minus">
                  <input type="text" name="qty" value="1" title="Qty" class="qty" size="4">
                  <input type="button" value="+" class="plus">
                </div>
              </div>
              <div class="cart_btn">
                <button type="submit" class="btn btn-fill-out btn-addtocart" type="button">
                  <i class="icon-basket-loaded"></i> Tambah ke keranjang
                </button>
                <a class="add_wishlist" href="javascript:;"><i class="icon-heart"></i></a>
              </div>
            </div>
          </form>
          <hr />
          <ul class="product-meta">
            <li>SKU: <a href="#"><?= $data['kode'] ?></a></li>
            <li>Category: <a href="#"><?= $data['kategori_produk'] ?></a></li>
            <li>Jenis: <a href="#" rel="tag"><?= $data['jenis_produk'] ?></a> </li>
          </ul>

          <div class="product_share">
            <span>Share:</span>
            <ul class="social_icons">
              <li><a href="#"><i class="ion-social-facebook"></i></a></li>
              <li><a href="#"><i class="ion-social-twitter"></i></a></li>
              <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
              <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
              <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="large_divider clearfix"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="tab-style3">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="Description-tab" data-toggle="tab" href="#Description" role="tab"
                aria-controls="Description" aria-selected="true">Description</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="Reviews-tab" data-toggle="tab" href="#Reviews" role="tab" aria-controls="Reviews"
                aria-selected="false">Reviews (2)</a>
            </li>
          </ul>
          <div class="tab-content shop_info_tab">
            <div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="Description-tab">
              <p><?= $data['deskripsi'] ?></p>
            </div>
            <div class="tab-pane fade" id="Reviews" role="tabpanel" aria-labelledby="Reviews-tab">
              <div class="comments">
                <h5 class="product_tab_title">2 Review For <span>Blue Dress For Woman</span></h5>
                <ul class="list_none comment_list mt-4">
                  <li>
                    <div class="comment_img">
                      <img src="<?= base_url('assets/frontend/images/user1.jpg') ?>" alt="user1" />
                    </div>
                    <div class="comment_block">
                      <div class="rating_wrap">
                        <div class="rating">
                          <div class="product_rate" style="width:80%"></div>
                        </div>
                      </div>
                      <p class="customer_meta">
                        <span class="review_author">Alea Brooks</span>
                        <span class="comment-date">March 5, 2018</span>
                      </p>
                      <div class="description">
                        <p>Lorem Ipsumin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum
                          auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh
                          vulputate</p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="comment_img">
                      <img src="<?= base_url('assets/frontend/images/user2.jpg') ?>" alt="user2" />
                    </div>
                    <div class="comment_block">
                      <div class="rating_wrap">
                        <div class="rating">
                          <div class="product_rate" style="width:60%"></div>
                        </div>
                      </div>
                      <p class="customer_meta">
                        <span class="review_author">Grace Wong</span>
                        <span class="comment-date">June 17, 2018</span>
                      </p>
                      <div class="description">
                        <p>It is a long established fact that a reader will be distracted by the readable content of a
                          page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less
                          normal distribution of letters</p>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="review_form field_form">
                <h5>Add a review</h5>
                <form class="row mt-3">
                  <div class="form-group col-12">
                    <div class="star_rating">
                      <span data-value="1"><i class="far fa-star"></i></span>
                      <span data-value="2"><i class="far fa-star"></i></span>
                      <span data-value="3"><i class="far fa-star"></i></span>
                      <span data-value="4"><i class="far fa-star"></i></span>
                      <span data-value="5"><i class="far fa-star"></i></span>
                    </div>
                  </div>
                  <div class="form-group col-12">
                    <textarea required="required" placeholder="Your review *" class="form-control" name="message"
                      rows="4"></textarea>
                  </div>
                  <div class="form-group col-md-6">
                    <input required="required" placeholder="Enter Name *" class="form-control" name="name" type="text">
                  </div>
                  <div class="form-group col-md-6">
                    <input required="required" placeholder="Enter Email *" class="form-control" name="email"
                      type="email">
                  </div>

                  <div class="form-group col-12">
                    <button type="submit" class="btn btn-fill-out" name="submit" value="Submit">Submit Review</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="small_divider"></div>
        <div class="divider"></div>
        <div class="medium_divider"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="heading_s1">
          <h3>Produk Serupa</h3>
        </div>
        <div class="releted_product_slider carousel_slider owl-carousel owl-theme" data-margin="20"
          data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
          <?php foreach ($produk_serupa as $ps) { ?>
          <div class="item">
            <div class="product_wrap">
              <!-- <span class="pr_flash">New</span> -->
              <div class="product_img">
                <a href="<?= site_url('Produk/detail/'.$ps->id) ?>">
                  <img style="height:290px; object-fit:cover;" src="<?= ($ps->foto!="") ? base_url($ps->foto) : base_url('assets/images/icons/no-product.png') ?>" alt="el_img3">
                  <img style="height:290px; object-fit:cover;" class="product_hover_img"
                    src="<?= ($ps->foto!="") ? base_url($ps->foto) : base_url('assets/images/icons/no-product.png') ?>" alt="el_hover_img3">
                </a>
                <div class="product_action_box">
                  <ul class="list_none pr_action_btn">
                    <!-- <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                    <li><a href="javascript:;" class="popup-ajax"><i class="icon-magnifier-add"></i></a>
                    </li>
                    <li><a href="#"><i class="icon-heart"></i></a></li> -->
                  </ul>
                </div>
              </div>
              <div class="product_info">
                <h6 class="product_title"><a href="<?= site_url('Produk/detail/'.$ps->id) ?>"><?= $ps->nama ?></a>
                </h6>
                <div class="product_price">
                  <span class="price"><?= rupiah($ps->harga) ?></span>
                  <!-- <del>$99.00</del> -->
                </div>
                <div class="rating_wrap">
                  <div class="rating">
                    <div class="product_rate" style="width:87%"></div>
                  </div>
                  <span class="rating_num">(25)</span>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
$(document).on('submit', '#form-cart', function(event) {
  event.preventDefault();
  var formData = new FormData($('#form-cart')[0]);

  $.ajax({
    url: '<?= site_url() ?>' + '/Order/add_cart',
    method: 'POST',
    dataType: 'json',
    data: formData,
    async: true,
    processData: false,
    contentType: false,
    success: function(data) {
      if (data.success == true) {
        Toast.fire({
          icon: 'success',
          title: data.message
        });
        loadNotifikasiCart();
      } else {
        window.location.href = site_url + "/Auth";
      }
    },
    fail: function(event) {
      alert(event);
    }
  });
});
</script>