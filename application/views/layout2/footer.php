<div class="footer py-5 text-center">



  <div class="container">



    <div class="row mb-3">



      <div class="col-md-6 col-sm-12">



        <div style='text-align:right;'>



          <img src="<?php echo base_url('assets2/images/companylogohighresfooterjpg.jpg') ?>" alt="" style="width:40%;">



        </div>



      </div>



    </div>



    <div class="row">



      <div class="col-md-6 col-sm-12">



        <div style='text-align:right;'>



          <p class="mb-0" align="justify" style='text-align:right;'>



            Chaakra Consulting menggunakan Chaakra Online System (Choise) untuk melakukan kegiatan rekrutmen calon pegawai bagi perusahaan Chaakra Consuting maupun perusahaan lain yang menggunakan jasa asesmen dan rekrutmen pada Chaakra Consulting.



          </p>



        </div>



      </div>



      <div class="col-md-6 col-sm-12">



        <h4 style='text-align:left;'><b>Media Sosial</b></h4>



        <p class="mb-0" style='text-align:left;'>



          <a href="https://www.facebook.com/chaakraconsulting/" target="blank" class="p-3"><span class="icon-facebook"></span></a>



          <a href="https://www.instagram.com/chaakra.consulting/" target="blank" class="p-3"><span class="icon-instagram"></span></a>



          <a href="https://api.whatsapp.com/send/?phone=62085648200701" class="p-3"><span class="icon-whatsapp"></span></a>



        </p>



        <h4 style='text-align:left;'><b>Alamat</b></h4>

<p class="mb-0" style='text-align:left;'>
    <a href="https://maps.app.goo.gl/MVjhna5cRPrWtaDF7" target="_blank">Jl. Jambangan VII B No.14, Jambangan, Kec. Jambangan, Kota SBY, Jawa Timur 60232</a>
</p>




      </div>



    </div>



  </div><br>







</div>



</div><!-- .site-wrap -->







<script src="<?php  echo base_url('assets2/js/jquery-3.3.1.min.js') ?>"></script>



<script src="<?php  echo base_url('assets2/js/jquery-ui.js') ?>"></script>



<script src="<?php  echo base_url('assets2/js/popper.min.js') ?>"></script>



<script src="<?php  echo base_url('assets2/js/bootstrap.min.js') ?>"></script>



<script src="<?php  echo base_url('assets2/js/owl.carousel.min.js') ?>"></script>



<script src="<?php  echo base_url('assets2/js/jquery.countdown.min.js') ?>"></script>



<script src="<?php  echo base_url('assets2/js/bootstrap-datepicker.min.js') ?>"></script>



<script src="<?php  echo base_url('assets2/js/jquery.easing.1.3.js') ?>"></script>



<script src="<?php  echo base_url('assets2/js/aos.js') ?>"></script>



<script src="<?php  echo base_url('assets2/js/jquery.fancybox.min.js') ?>"></script>



<script src="<?php  echo base_url('assets2/js/jquery.sticky.js') ?>"></script>



<script src="<?php  echo base_url('assets2/js/main.js') ?>"></script>







<script>

$(document).ready(function() {
    setTimeout(function() {
      $("#myModal").modal('show');
    }, 1000);
    $("#btnModalDaftar").click(function () {
    // Tutup modal
    $("#myModal").modal('hide');
    
    // Trigger klik pada elemen navbar
    $('a.nav-link[href="#features-section"]').click();
});

  });

  (function($) {



    'use strict';







    jQuery(document).on('ready', function(){







      $('a.page-scroll').on('click', function(e){



        var anchor = $(this);



        $('html, body').stop().animate({



          scrollTop: $(anchor.attr('href')).offset().top - 50



        }, 1500);



        e.preventDefault();



      });



    });        



  })(jQuery);



</script>


<script type="text/javascript">

        function submitForm() {
            // Cek apakah checkbox disetujui sebelum mengirim data
            var approveCheckbox = document.getElementById('approveCheckbox');

            if (!approveCheckbox.checked) {
        alert("Untuk membuat akun, Anda harus menyetujui ketentuan di atas.");
        return false;
    }
    return true;
        }
    </script>





</body>



</html>