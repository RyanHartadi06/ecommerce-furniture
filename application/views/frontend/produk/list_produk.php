<?php if($list->num_rows()>0){ ?>
<div class="row">
  <?php foreach ($list->result() as $row) { ?>
  <div class="col-md-3 col-sm-6">
    <div class="item">
      <div class="product_wrap">
        <!-- <span class="pr_flash">New</span> -->
        <div class="product_img">
          <a href="<?= site_url('Produk/detail/'.$row->id) ?>">
            <img style="height:290px; object-fit:cover;"
              src="<?= ($row->foto!="") ? base_url($row->foto) : base_url('assets/images/icons/no-product.png') ?>"
              alt="el_img3">
            <img style="height:290px; object-fit:cover;" class="product_hover_img"
              src="<?= ($row->foto!="") ? base_url($row->foto) : base_url('assets/images/icons/no-product.png') ?>"
              alt="el_hover_img3">
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
          <h6 class="product_title"><a href="<?= site_url('Produk/detail/'.$row->id) ?>"><?= $row->nama ?></a></h6>
          <div class="product_price">
            <span class="price"><?= rupiah($row->harga) ?></span>
            <!-- <del>$99.00</del> -->
          </div>
          <div class="rating_wrap">
            <div class="rating">
              <div class="product_rate" style="width:87%"></div>
            </div>
            <span class="rating_num">(25)</span>
          </div>
          <div class="pr_desc">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim.
              Nullam id varius nunc id varius nunc.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>

</div>
<!-- Pagination -->
<div class="row">
  <br>
  <div class="col-xs-12 col-md-6" style="padding-top:5px; color:#333;">
    Menampilkan data
    <?php $batas_akhir = (($paging['current'])*$paging['limit']);
          if ($batas_akhir > $paging['count_row']) {
              $batas_akhir = $paging['count_row'];
          }
          echo ((($paging['current']-1)*$paging['limit'])+1).' - '.$batas_akhir.' dari total '.$paging['count_row']; ?>
    data
  </div>
  <br>
  <div class="col-xs-12 col-md-6">
    <div style="float:right;">
      <?php echo $paging['list']; ?>
    </div>
  </div>
</div>
<?php }else{ ?>
<div class="alert alert-warning">
  Data produk tidak ditemukan !
</div>
<?php } ?>