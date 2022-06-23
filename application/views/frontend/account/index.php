<!-- START MAIN CONTENT -->
<style>
.tab-profile .nav-link.active {
  background: #dedede !important;
}
</style>
<hr>
<input type="hidden" name="id_user" id="id_user" value="<?= $this->session->userdata('auth_id_user'); ?>">
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
              <li class="nav-item">
                <a class="nav-link" id="address-tab" data-toggle="tab" href="#address" role="tab"
                  aria-controls="address" aria-selected="true"><i class="ti-location-pin"></i>Alamat</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="account-detail-tab" data-toggle="tab" href="#account-detail" role="tab"
                  aria-controls="account-detail" aria-selected="true"><i class="ti-id-badge"></i>Profile</a>
              </li>
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
                  <h3 class="font-weight-bold">Hallo <?= $this->session->userdata("auth_nama_user"); ?></h3>
                  <h6 class="font-weight-normal mb-0">Selamat datang di aplikasi E-Commerce Mebel Anggita Jaya.</span>
                  </h6>
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
                            <?php if($row->status=='1' && $row->tanggal_upload==""){ ?>
                              <!-- Upload bukti bayar -->
                              <a href="<?= site_url('Order/order_complete?id_order='.$row->id) ?>" style="color:#fff;" class="btn btn-warning btn-sm">Upload Bukti</a>
                            <?php }else if($row->status=='3'){ ?>
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
              <!-- Alamat -->
              <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-md-6">
                      <h3>Alamat</h3>
                    </div>
                    <div class="col-md-6 text-right">
                      <a class="btn btn-sm btn-primary" id="btn-add-alamat" href="javascript:;">Tambah</a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div id="list-alamat"></div>
                </div>
              </div>
              <!-- End Alamat -->
            </div>
            <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
              <!-- Profile -->
              <div class="card">
                <div class="card-header">
                  <h3>Profile</h3>
                </div>
                <div class="card-body">
                  <!--  -->
                  <div class="mb-4">
                    <ul class="nav nav-tabs tab-profile" role="tablist">
                      <li class="nav-item nav-tabs-item">
                        <a class="nav-link nav-tabs-link active show" data-toggle="tab" href="#tab_profile" role="tab"
                          aria-controls="home" aria-selected="true">
                          <i class="fa fa-address-card"></i> Data User
                        </a>
                      </li>
                      <li class="nav-item nav-tabs-item">
                        <a class="nav-link nav-tabs-link" data-toggle="tab" href="#tab_ubah_password" role="tab"
                          aria-controls="messages" aria-selected="false">
                          <i class="fa fa-key"></i> Ubah Password</a>
                      </li>
                    </ul>
                    <div class="tab-content">
                      <div class="tab-pane active show" id="tab_profile" role="tabpanel">
                        <!-- form Profile -->
                        <form action="" id="form-profile">
                          <div class="form-group">
                            <label class="control-label col-md-3">Nama User</label>
                            <div class="col-md-12">
                              <input type="text" id="nama_user" name="nama_user" class="form-control"
                                placeholder="Masukkan Nama User . . . " autocomplete="off" value="<?= $user['nama'] ?>"
                                required>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <hr>
                            <button class="btn btn-primary" type="submit">Simpan</button>
                          </div>
                        </form>
                        <!-- end form Profile -->
                      </div>
                      <div class="tab-pane" id="tab_ubah_password" role="tabpanel">
                        <!-- form ubah password -->
                        <form action="" id="form-password">
                          <div class="form-group">
                            <label class="control-label col-md-3">Password Baru</label>
                            <div class="col-md-12">
                              <input type="password" id="password" name="password" class="form-control"
                                placeholder="Masukkan Password Baru" autocomplete="off" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Ulang Password Baru</label>
                            <div class="col-md-12">
                              <input type="password" id="konfirm_password" name="konfirm_password" class="form-control"
                                placeholder="Masukkan Ulang Password Baru" autocomplete="off"
                                onkeyup="validate_password()" required>
                              <span id="pass-message" style=""></span>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <hr>
                            <button class="btn btn-primary" id="submit-reset" type="submit">Simpan</button>
                          </div>
                        </form>
                        <!-- end form ubah password -->
                      </div>
                    </div>
                  </div>
                  <!--  -->
                </div>
              </div>
              <!-- End Profile -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="div_modal"></div>
<script>
$(document).ready(function() {
  getAlamat();
})

/**
 * Function Alamat
 * 
 */
function getAlamat() {
  $.ajax({
    url: "<?= site_url() ?>" + "/Account/get_alamat",
    type: 'GET',
    dataType: 'html',
    data: {},
    beforeSend: function() {},
    success: function(result) {
      $('#list-alamat').html(result);
    }
  });
}

$('#btn-add-alamat').on('click', function() {
  $.ajax({
    url: "<?= site_url() ?>" + "/Account/load_modal_alamat",
    type: 'POST',
    data: {},
    dataType: 'html',
    beforeSend: function() {},
    success: function(result) {
      $('#div_modal').html(result);
      $('#modalTitleAdd').show();
      $('#modeform').val('ADD');
      $('#modal-alamat').modal('show');
    }
  });
});

$(document).on('click', '.btn-edit-alamat', function(event) {
  event.preventDefault();
  var id = $(this).attr('data-id');
  $.ajax({
    url: "<?= site_url() ?>" + "/Account/load_modal_alamat",
    type: 'POST',
    dataType: 'html',
    data: {
      id: id
    },
    beforeSend: function() {},
    success: function(result) {
      $('#div_modal').html(result);
      $('#modalTitleEdit').show();
      $('#modeform').val('UPDATE');
      $('#modal-alamat').modal('show');
    }
  });
});

$(document).on('click', '.btn-delete-alamat', function(e) {
  var id = $(this).attr('data-id');
  var title = $(this).attr('data-name');
  var page = $('#hidden_page').val();

  Swal.fire({
    title: 'Hapus Alamat',
    text: "Apakah Anda yakin menghapus alamat ?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#95a5a6',
    confirmButtonText: 'Hapus',
    cancelButtonText: 'Batal',
    showLoaderOnConfirm: true,
    preConfirm: function() {
      return new Promise(function(resolve) {
        $.ajax({
          method: 'GET',
          dataType: 'json',
          url: "<?= site_url() ?>" + "/Account/delete_alamat/" + id,
          data: {},
          success: function(data) {
            if (data.success === true) {
              $('#modal-alamat').modal('hide');
              Toast.fire({
                icon: 'success',
                title: data.message
              });
              swal.hideLoading()
              getAlamat();
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: data.message
              });
            }
          },
          fail: function(e) {
            alert(e);
          }
        });
      });
    },
    allowOutsideClick: false
  });
  e.preventDefault();
});

$(document).on('submit', '#form-alamat', function(event) {
  event.preventDefault();
  var modeform = $('#modeform').val();
  var page = (modeform == 'UPDATE') ? $('#hidden_page').val() : 1;
  $.ajax({
    url: "<?= site_url() ?>" + "/Account/save_alamat",
    method: 'POST',
    dataType: 'json',
    data: new FormData($('#form-alamat')[0]),
    async: true,
    processData: false,
    contentType: false,
    success: function(data) {
      if (data.success == true) {
        Toast.fire({
          icon: 'success',
          title: data.message
        });
        $('#modal-alamat').modal('hide');
        getAlamat();
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: data.message
        });
      }
    },
    fail: function(event) {
      alert(event);
    }
  });
});

/**
 * Function Profile
 * 
 */

$('#form-password').submit(function(event) {
  event.preventDefault();
  var id_user = $('#id_user').val();
  var formData = new FormData($('#form-password')[0])
  formData.append('id_user', id_user);

  Swal.fire({
    title: 'Ubah Password',
    text: "Apakah Anda yakin mengubah password !",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3498db',
    cancelButtonColor: '#95a5a6',
    confirmButtonText: 'Simpan',
    cancelButtonText: 'Batal',
    showLoaderOnConfirm: true,
    preConfirm: function() {
      return new Promise(function(resolve) {
        $.ajax({
          url: '<?= site_url() ?>' + '/Profile/update_password',
          method: 'POST',
          dataType: 'json',
          data: formData,
          async: true,
          processData: false,
          contentType: false,
          success: function(data) {
            if (data.success == true) {
              const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
              });

              Toast.fire({
                icon: 'success',
                title: data.message
              })
              swal.hideLoading()
              setTimeout(function() {
                location.reload();
              }, 1000);
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: data.message
              });
            }
          },
          fail: function(event) {
            alert(event);
          }
        });
      });
    },
    allowOutsideClick: false
  });
  event.preventDefault();
});

$('#form-profile').submit(function(event) {
  event.preventDefault();
  var id_user = $('#id_user').val();
  var formData = new FormData($('#form-profile')[0])
  formData.append('id_user', id_user);

  Swal.fire({
    title: 'Ubah Profile',
    text: "Apakah Anda yakin mengubah profile !",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3498db',
    cancelButtonColor: '#95a5a6',
    confirmButtonText: 'Simpan',
    cancelButtonText: 'Batal',
    showLoaderOnConfirm: true,
    preConfirm: function() {
      return new Promise(function(resolve) {
        $.ajax({
          url: '<?= site_url() ?>' + '/Profile/update_profile',
          method: 'POST',
          dataType: 'json',
          data: formData,
          async: true,
          processData: false,
          contentType: false,
          success: function(data) {
            if (data.success == true) {
              const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
              });

              Toast.fire({
                icon: 'success',
                title: data.message
              })
              swal.hideLoading()
              setTimeout(function() {
                location.reload();
              }, 1000);
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: data.message
              });
            }
          },
          fail: function(event) {
            alert(event);
          }
        });
      });
    },
    allowOutsideClick: false
  });
  event.preventDefault();
});

function validate_password() {
  var pass = $('#password').val();
  var confirm_pass = $('#konfirm_password').val();
  if (pass != confirm_pass) {
    $('#pass-message').show();
    $('#pass-message').text('Password tidak cocok !');
    $('#pass-message').css('color', 'red');
    $('#submit-reset').prop('disabled', true);
  } else {
    $('#pass-message').hide();
    $('#pass-message').text('');
    $('#pass-message').css('color', 'white');
    $('#submit-reset').prop('disabled', false);
  }
}
</script>