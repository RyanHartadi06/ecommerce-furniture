<!-- popper min js -->
<script src="<?= base_url('assets/frontend/js/popper.min.js') ?>"></script>
<!-- Latest compiled and minified Bootstrap -->
<script src="<?= base_url('assets/frontend/bootstrap/js/bootstrap.min.js') ?>"></script>
<!-- owl-carousel min js  -->
<script src="<?= base_url('assets/frontend/owlcarousel/js/owl.carousel.min.js') ?>"></script>
<!-- magnific-popup min js  -->
<script src="<?= base_url('assets/frontend/js/magnific-popup.min.js') ?>"></script>
<!-- waypoints min js  -->
<script src="<?= base_url('assets/frontend/js/waypoints.min.js') ?>"></script>
<!-- parallax js  -->
<script src="<?= base_url('assets/frontend/js/parallax.js') ?>"></script>
<!-- countdown js  -->
<script src="<?= base_url('assets/frontend/js/jquery.countdown.min.js') ?>"></script>
<!-- imagesloaded js -->
<script src="<?= base_url('assets/frontend/js/imagesloaded.pkgd.min.js') ?>"></script>
<!-- isotope min js -->
<script src="<?= base_url('assets/frontend/js/isotope.min.js') ?>"></script>
<!-- jquery.dd.min js -->
<script src="<?= base_url('assets/frontend/js/jquery.dd.min.js') ?>"></script>
<!-- slick js -->
<script src="<?= base_url('assets/frontend/js/slick.min.js') ?>"></script>
<!-- elevatezoom js -->
<script src="<?= base_url('assets/frontend/js/jquery.elevatezoom.js') ?>"></script>
<!-- scripts js -->
<script src="<?= base_url('assets/frontend/js/scripts.js') ?>"></script>

<script src="<?= base_url('assets/all/sweetalert2/sweetalert2.all.min.js') ?>"></script>

<script>
  var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });
  
  function formatRupiah(angka){
    var reverse = angka.toString().split('').reverse().join(''),
    ribuan = reverse.match(/\d{1,3}/g);
    ribuan = ribuan.join('.').split('').reverse().join('');
    return ribuan;
  }
</script>