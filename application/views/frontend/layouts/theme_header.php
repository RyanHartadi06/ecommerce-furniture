<header class="header_wrap">
  <div class="top-header">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="d-flex align-items-center justify-content-center justify-content-md-start">
            <ul class="contact_detail text-center text-lg-left">
              <li><i class="ti-mobile"></i><span>123-456-7890</span></li>
            </ul>
          </div>
        </div>
        <div class="col-md-6">
          <div class="text-center text-md-right">
            <ul class="header_list">
              <li><a href="#"><i class="ti-user"></i><span>Register</span></a></li>
              <li><a href="<?= site_url('Auth') ?>"><i class="ti-user"></i><span>Login</span></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="middle-header dark_skin">
    <div class="container">
      <div class="nav_block">
        <a class="navbar-brand" href="index.html">
          <img class="logo_light" src="<?= base_url('assets/frontend/images/logo_light.png') ?>" alt="logo">
          <img class="logo_dark" src="<?= base_url('assets/frontend/images/logo_dark.png') ?>" alt="logo">
        </a>
        <div class="product_search_form search_form_btn">
          <!-- Pencarian -->
          <form>
            <div class="input-group">
              <input class="form-control" placeholder="Search Product..." required="" type="text">
              <button type="submit" class="search_btn3"><i class="ti-search"></i></button>
            </div>
          </form>
        </div>
        <ul class="navbar-nav attr-nav align-items-center">
          <li><a href="#" class="nav-link"><i class="linearicons-user"></i></a></li>
          <!-- <li><a href="#" class="nav-link"><i class="linearicons-heart"></i><span class="wishlist_count">0</span></a> -->
          </li>
          <li class="dropdown cart_dropdown">
            <a class="nav-link cart_trigger" href="#" data-toggle="dropdown"><i class="linearicons-bag2">
              </i>
              <span class="cart_count">2</span>
            </a>
            <div class="cart_box cart_right dropdown-menu dropdown-menu-right">
              <ul class="cart_list">
                <li>
                  <a href="#" class="item_remove"><i class="ion-close"></i></a>
                  <a href="#"><img src="<?= base_url('assets/frontend/images/cart_thamb1.jpg') ?>"
                      alt="cart_thumb1">Variable product 001</a>
                  <span class="cart_quantity"> 1 x <span class="cart_amount"> <span
                        class="price_symbole">$</span></span>78.00</span>
                </li>
                <li>
                  <a href="#" class="item_remove"><i class="ion-close"></i></a>
                  <a href="#"><img src="<?= base_url('assets/frontend/images/cart_thamb2.jpg') ?>"
                      alt="cart_thumb2">Ornare sed consequat</a>
                  <span class="cart_quantity"> 1 x <span class="cart_amount"> <span
                        class="price_symbole">$</span></span>81.00</span>
                </li>
              </ul>
              <div class="cart_footer">
                <p class="cart_total"><strong>Subtotal:</strong> <span class="cart_price"> <span
                      class="price_symbole">$</span></span>159.00</p>
                <p class="cart_buttons"><a href="#" class="btn btn-fill-line view-cart">View Cart</a><a href="#"
                    class="btn btn-fill-out checkout">Checkout</a></p>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="bottom_header dark_skin main_menu_uppercase border-top">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-6 col-3">
          <!-- Kategori -->
          <div class="categories_wrap">
            <button type="button" data-toggle="collapse" data-target="#navCatContent" aria-expanded="false"
              class="categories_btn categories_menu">
              <span>All Categories </span><i class="linearicons-menu"></i>
            </button>
            <div id="navCatContent" class="navbar collapse">
              <ul>
                <li class="dropdown dropdown-mega-menu">
                  <a class="dropdown-item nav-link dropdown-toggler" href="#" data-toggle="dropdown"><i
                      class="flaticon-tv"></i> <span>Computer</span></a>
                  <div class="dropdown-menu">
                    <ul class="mega-menu d-lg-flex">
                      <li class="mega-menu-col col-lg-7">
                        <ul class="d-lg-flex">
                          <li class="mega-menu-col col-lg-6">
                            <ul>
                              <li class="dropdown-header">Featured Item</li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Vestibulum sed</a></li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Donec porttitor</a></li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae facilisis</a></li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Curabitur tempus</a></li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Vivamus in tortor</a></li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae ante ante</a></li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Etiam ac rutrum</a></li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Quisque condimentum</a></li>
                            </ul>
                          </li>
                          <li class="mega-menu-col col-lg-6">
                            <ul>
                              <li class="dropdown-header">Popular Item</li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Curabitur laoreet</a></li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Vivamus in tortor</a></li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae facilisis</a></li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Quisque condimentum</a></li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Etiam ac rutrum</a></li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae ante ante</a></li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Donec porttitor</a></li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Curabitur tempus</a></li>
                            </ul>
                          </li>
                        </ul>
                      </li>
                      <li class="mega-menu-col col-lg-5">
                        <div class="header-banner2">
                          <img src="<?= base_url('assets/frontend/images/menu_banner7.jpg') ?>" alt="menu_banner1">
                          <div class="banne_info">
                            <h6>10% Off</h6>
                            <h4>Computers</h4>
                            <a href="#">Shop now</a>
                          </div>
                        </div>
                        <div class="header-banner2">
                          <img src="<?= base_url('assets/frontend/images/menu_banner8.jpg') ?>" alt="menu_banner2">
                          <div class="banne_info">
                            <h6>15% Off</h6>
                            <h4>Top Laptops</h4>
                            <a href="#">Shop now</a>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="dropdown dropdown-mega-menu">
                  <a class="dropdown-item nav-link dropdown-toggler" href="#" data-toggle="dropdown"><i
                      class="flaticon-responsive"></i> <span>Mobile & Tablet</span></a>
                  <div class="dropdown-menu">
                    <ul class="mega-menu d-lg-flex">
                      <li class="mega-menu-col col-lg-7">
                        <ul class="d-lg-flex">
                          <li class="mega-menu-col col-lg-6">
                            <ul>
                              <li class="dropdown-header">Featured Item</li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Vestibulum sed</a></li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Donec porttitor</a></li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae facilisis</a></li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Curabitur tempus</a></li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Vivamus in tortor</a></li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae ante ante</a></li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Etiam ac rutrum</a></li>
                            </ul>
                          </li>
                          <li class="mega-menu-col col-lg-6">
                            <ul>
                              <li class="dropdown-header">Popular Item</li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Curabitur laoreet</a></li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Vivamus in tortor</a></li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae facilisis</a></li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Quisque condimentum</a></li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Etiam ac rutrum</a></li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae ante ante</a></li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Donec porttitor</a></li>
                            </ul>
                          </li>
                        </ul>
                      </li>
                      <li class="mega-menu-col col-lg-5">
                        <div class="header-banner2">
                          <a href="#"><img src="<?= base_url('assets/frontend/images/menu_banner6.jpg') ?>"
                              alt="menu_banner"></a>
                        </div>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="dropdown dropdown-mega-menu">
                  <a class="dropdown-item nav-link dropdown-toggler" href="#" data-toggle="dropdown"><i
                      class="flaticon-camera"></i> <span>Camera</span></a>
                  <div class="dropdown-menu">
                    <ul class="mega-menu d-lg-flex">
                      <li class="mega-menu-col col-lg-7">
                        <ul class="d-lg-flex">
                          <li class="mega-menu-col col-lg-6">
                            <ul>
                              <li class="dropdown-header">Featured Item</li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Vestibulum sed</a></li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Donec porttitor</a></li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae facilisis</a></li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Curabitur tempus</a></li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Vivamus in tortor</a></li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae ante ante</a></li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Etiam ac rutrum</a></li>
                            </ul>
                          </li>
                          <li class="mega-menu-col col-lg-6">
                            <ul>
                              <li class="dropdown-header">Popular Item</li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Curabitur laoreet</a></li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Vivamus in tortor</a></li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae facilisis</a></li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Quisque condimentum</a></li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Etiam ac rutrum</a></li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae ante ante</a></li>
                              <li><a class="dropdown-item nav-link nav_item" href="#">Donec porttitor</a></li>
                            </ul>
                          </li>
                        </ul>
                      </li>
                      <li class="mega-menu-col col-lg-5">
                        <div class="header-banner2">
                          <a href="#"><img src="<?= base_url('assets/frontend/images/menu_banner9.jpg') ?>"
                              alt="menu_banner"></a>
                        </div>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="dropdown dropdown-mega-menu">
                  <a class="dropdown-item nav-link dropdown-toggler" href="#" data-toggle="dropdown"><i
                      class="flaticon-plugins"></i> <span>Accessories</span></a>
                  <div class="dropdown-menu">
                    <ul class="mega-menu d-lg-flex">
                      <li class="mega-menu-col col-lg-4">
                        <ul>
                          <li class="dropdown-header">Woman's</li>
                          <li><a class="dropdown-item nav-link nav_item" href="shop-list-left-sidebar.html">Vestibulum
                              sed</a></li>
                          <li><a class="dropdown-item nav-link nav_item" href="shop-left-sidebar.html">Donec
                              porttitor</a></li>
                          <li><a class="dropdown-item nav-link nav_item" href="shop-right-sidebar.html">Donec vitae
                              facilisis</a></li>
                          <li><a class="dropdown-item nav-link nav_item" href="shop-list.html">Curabitur tempus</a>
                          </li>
                          <li><a class="dropdown-item nav-link nav_item" href="shop-load-more.html">Vivamus in
                              tortor</a></li>
                        </ul>
                      </li>
                      <li class="mega-menu-col col-lg-4">
                        <ul>
                          <li class="dropdown-header">Men's</li>
                          <li><a class="dropdown-item nav-link nav_item" href="shop-cart.html">Donec vitae ante
                              ante</a></li>
                          <li><a class="dropdown-item nav-link nav_item" href="checkout.html">Etiam ac rutrum</a></li>
                          <li><a class="dropdown-item nav-link nav_item" href="wishlist.html">Quisque condimentum</a>
                          </li>
                          <li><a class="dropdown-item nav-link nav_item" href="compare.html">Curabitur laoreet</a>
                          </li>
                          <li><a class="dropdown-item nav-link nav_item" href="order-completed.html">Vivamus in
                              tortor</a></li>
                        </ul>
                      </li>
                      <li class="mega-menu-col col-lg-4">
                        <ul>
                          <li class="dropdown-header">Kid's</li>
                          <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail.html">Donec vitae
                              facilisis</a></li>
                          <li><a class="dropdown-item nav-link nav_item"
                              href="shop-product-detail-left-sidebar.html">Quisque condimentum</a></li>
                          <li><a class="dropdown-item nav-link nav_item"
                              href="shop-product-detail-right-sidebar.html">Etiam ac rutrum</a></li>
                          <li><a class="dropdown-item nav-link nav_item"
                              href="shop-product-detail-thumbnails-left.html">Donec vitae ante ante</a></li>
                          <li><a class="dropdown-item nav-link nav_item"
                              href="shop-product-detail-thumbnails-left.html">Donec porttitor</a></li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                </li>
                <li><a class="dropdown-item nav-link nav_item" href="coming-soon.html"><i
                      class="flaticon-headphones"></i> <span>Headphones</span></a></li>
                <li><a class="dropdown-item nav-link nav_item" href="404.html"><i class="flaticon-console"></i>
                    <span>Gaming</span></a></li>
                <li><a class="dropdown-item nav-link nav_item" href="login.html"><i class="flaticon-watch"></i>
                    <span>Watches</span></a></li>
                <li><a class="dropdown-item nav-link nav_item" href="register.html"><i
                      class="flaticon-music-system"></i> <span>Home Audio & Theater</span></a></li>
                <li><a class="dropdown-item nav-link nav_item" href="coming-soon.html"><i class="flaticon-monitor"></i>
                    <span>TV & Smart Box</span></a></li>
                <li><a class="dropdown-item nav-link nav_item" href="404.html"><i class="flaticon-printer"></i>
                    <span>Printer</span></a></li>
                <li>
                  <ul class="more_slide_open">
                    <li><a class="dropdown-item nav-link nav_item" href="login.html"><i class="flaticon-fax"></i>
                        <span>Fax Machine</span></a></li>
                    <li><a class="dropdown-item nav-link nav_item" href="register.html"><i class="flaticon-mouse"></i>
                        <span>Mouse</span></a></li>
                  </ul>
                </li>
              </ul>
              <div class="more_categories">More Categories</div>
            </div>
          </div>
        </div>
        <div class="col-lg-9 col-md-8 col-sm-6 col-9">
          <nav class="navbar navbar-expand-lg">
            <button class="navbar-toggler side_navbar_toggler" type="button" data-toggle="collapse"
              data-target="#navbarSidetoggle" aria-expanded="false">
              <span class="ion-android-menu"></span>
            </button>
            <div class="pr_search_icon">
              <a href="javascript:void(0);" class="nav-link pr_search_trigger"><i class="linearicons-magnifier"></i></a>
            </div>
            <div class="collapse navbar-collapse mobile_side_menu" id="navbarSidetoggle">
              <ul class="navbar-nav">
                <!-- <li class="dropdown">
                  <a data-toggle="dropdown" class="nav-link dropdown-toggle active" href="#">Home</a>
                  <div class="dropdown-menu">
                    <ul>
                      <li><a class="dropdown-item nav-link nav_item" href="index.html">Fashion 1</a></li>
                      <li><a class="dropdown-item nav-link nav_item" href="index-2.html">Fashion 2</a></li>
                      <li><a class="dropdown-item nav-link nav_item" href="index-3.html">Furniture 1</a></li>
                      <li><a class="dropdown-item nav-link nav_item" href="index-4.html">Furniture 2</a></li>
                      <li><a class="dropdown-item nav-link nav_item" href="index-5.html">Electronics 1</a></li>
                      <li><a class="dropdown-item nav-link nav_item active" href="index-6.html">Electronics 2</a></li>
                    </ul>
                  </div>
                </li> -->
                <li><a class="nav-link nav_item" href="<?= site_url("Home/landing") ?>">Home</a></li>
                <li><a class="nav-link nav_item" href="#">Rekomendasi Produk</a></li>
                <li><a class="nav-link nav_item" href="#">About</a></li>
                <li><a class="nav-link nav_item" href="#">Contact Us</a></li>
              </ul>
            </div>
            <div class="contact_phone contact_support">
              <i class="linearicons-phone-wave"></i>
              <span>123-456-7689</span>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>
</header>