<!-- START MAIN CONTENT -->
<hr>
<div class="main_content">
  <div class="section" style="padding: 30px 0 !important;">
    <div style="padding:0px 40px;">
      <div class="row">
        <div class="col-lg-3 col-md-4">
          <div class="dashboard_menu">
            <ul class="nav nav-tabs flex-column" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="dashboard-tab" data-toggle="tab" href="#dashboard" role="tab"
                  aria-controls="dashboard" aria-selected="false"><i class="ti-layout-grid2"></i>Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders"
                  aria-selected="false"><i class="ti-shopping-cart-full"></i>Orders</a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" id="address-tab" data-toggle="tab" href="#address" role="tab"
                  aria-controls="address" aria-selected="true"><i class="ti-location-pin"></i>My Address</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="account-detail-tab" data-toggle="tab" href="#account-detail" role="tab"
                  aria-controls="account-detail" aria-selected="true"><i class="ti-id-badge"></i>Account details</a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link" href="javascript:;" onclick="logout()"><i class="ti-lock"></i>Logout</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-9 col-md-8">
          <div class="tab-content dashboard_content">
            <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
              <div class="card">
                <div class="card-header">
                  <h3>Dashboard</h3>
                </div>
                <div class="card-body">
                  <p>Dari dasboard akun Anda. Anda dapat dengan mudah memeriksa & melihat pesanan terbaru Anda, serta mengedit kata sandi dan detail akun Anda.
                  </p>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
              <div class="card">
                <div class="card-header">
                  <h3>Orders</h3>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Order</th>
                          <th>Tanggal</th>
                          <th>Total</th>
                          <th>Status</th>
                          <th class="text-center">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        if(count($order)>0){
                          foreach ($order as $row) { ?>
                            <tr>
                              <td>#<?= $row->no_invoice ?></td>
                              <td><?= $row->tanggal ?></td>
                              <td><?= rupiah($row->total) ?></td>
                              <td><?= $row->nama_status ?></td>
                              <td class="text-center">
                                <?php if($row->status=='3'){ ?>
                                  <!-- Dikirim -->
                                  <a href="<?= site_url('Rating/penilaian/'.$row->id) ?>" style="color:#fff;" class="btn btn-warning btn-sm">Terima</a>
                                <?php } ?>
                                <a href="<?= site_url('Order/order_detail/'.$row->id) ?>" class="btn btn-fill-out btn-sm">Lihat</a>
                              </td>
                            </tr>
                        <?php  }
                        }else{ ?>
                            <tr>
                              <td colspan="5">Pesanan tidak ditemukan !</td>
                            </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
              <div class="row">
                <div class="col-lg-6">
                  <div class="card mb-3 mb-lg-0">
                    <div class="card-header">
                      <h3>Billing Address</h3>
                    </div>
                    <div class="card-body">
                      <address>House #15<br>Road #1<br>Block #C <br>Angali <br> Vedora <br>1212</address>
                      <p>New York</p>
                      <a href="#" class="btn btn-fill-out">Edit</a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="card">
                    <div class="card-header">
                      <h3>Shipping Address</h3>
                    </div>
                    <div class="card-body">
                      <address>House #15<br>Road #1<br>Block #C <br>Angali <br> Vedora <br>1212</address>
                      <p>New York</p>
                      <a href="#" class="btn btn-fill-out">Edit</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
              <div class="card">
                <div class="card-header">
                  <h3>Account Details</h3>
                </div>
                <div class="card-body">
                  <p>Already have an account? <a href="#">Log in instead!</a></p>
                  <form method="post" name="enq">
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label>First Name <span class="required">*</span></label>
                        <input required="" class="form-control" name="name" type="text">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Last Name <span class="required">*</span></label>
                        <input required="" class="form-control" name="phone">
                      </div>
                      <div class="form-group col-md-12">
                        <label>Display Name <span class="required">*</span></label>
                        <input required="" class="form-control" name="dname" type="text">
                      </div>
                      <div class="form-group col-md-12">
                        <label>Email Address <span class="required">*</span></label>
                        <input required="" class="form-control" name="email" type="email">
                      </div>
                      <div class="form-group col-md-12">
                        <label>Current Password <span class="required">*</span></label>
                        <input required="" class="form-control" name="password" type="password">
                      </div>
                      <div class="form-group col-md-12">
                        <label>New Password <span class="required">*</span></label>
                        <input required="" class="form-control" name="npassword" type="password">
                      </div>
                      <div class="form-group col-md-12">
                        <label>Confirm Password <span class="required">*</span></label>
                        <input required="" class="form-control" name="cpassword" type="password">
                      </div>
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-fill-out" name="submit" value="Submit">Save</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>