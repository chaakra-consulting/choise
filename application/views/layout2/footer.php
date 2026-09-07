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
          <a href="https://maps.app.goo.gl/VFTj6fifkN3VYUJF7" target="_blank">Jl. Karah Agung No.01 PIK A, Jambangan, Kec. Jambangan, Surabaya, Jawa Timur 60232</a>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function () {
    $('#tempat_lahir').select2({
      placeholder: "Pilih Kota",
      allowClear: true,
    });
  });
</script>
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
<script>
  $(document).ready(function() {
  const $dateInput = $('#jadwal_tanggal'); 
  const $timeSelect = $('#jadwal_waktu');

  $dateInput.on('change', validateTimeSlots);

  function validateTimeSlots() {
    const selectedDateStr = $dateInput.val();
    
    if (!selectedDateStr) {
      $timeSelect.prop('disabled', true);
      
      if ($timeSelect.hasClass('select2-hidden-accessible')) {
        $timeSelect.trigger('change.select2'); 
      }
      return;
    } else {
      $timeSelect.prop('disabled', false); 
    }

    const now = new Date();
    const todayMidnight = new Date(now.getFullYear(), now.getMonth(), now.getDate());

    const [year, month, day] = selectedDateStr.split('-').map(Number);
    const selectedDate = new Date(year, month - 1, day);

    $timeSelect.find('option').each(function() {
      const $option = $(this);
      const optionVal = $option.val();
      
      if (!optionVal || optionVal.trim() === "-") return; 

      let isPassed = false;

      if (selectedDate < todayMidnight) {
        isPassed = true;
      } 
      else if (selectedDate.getTime() === todayMidnight.getTime()) {
        
        const startTimeStr = optionVal.split(' - ')[0].trim(); 
        const [startHour, startMinute] = startTimeStr.split(':').map(Number);

        const slotStartTime = new Date();
        slotStartTime.setHours(startHour, startMinute, 0, 0);

        if (now >= slotStartTime) {
          isPassed = true;
        }
      }

      $option.prop('disabled', isPassed);
      
      if (isPassed) { 
        $option.hide(); 
      } else { 
        $option.show(); 
      }
    });

    if ($timeSelect.find('option:selected').prop('disabled')) {
      $timeSelect.val('');
    }

    if ($timeSelect.hasClass('select2-hidden-accessible')) {
      $timeSelect.trigger('change.select2');
    }
  }

  validateTimeSlots();
});
</script>
</body>
</html>