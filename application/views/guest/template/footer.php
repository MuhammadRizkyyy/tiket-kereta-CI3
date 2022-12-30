  <script
  src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <script src="<?= base_url('bootstrap/js/bootstrap.min.js'); ?>"></script>
  

  <script>
    $('.bagian_a').hide();
    $('.bagian_b').hide();
    <?php if($this->uri->segment(1) === "konfirmasi"): ?>
      $(document).ready(function() {
        cekBagian();
        $("select.pilih_gerbong").change(function() {
          var pilih_gerbong = $(this).children("option:selected").val();

          if(pilih_gerbong === "1") {
            gerbong.attr('src', '<?= base_url('bootstrap/gerbong/gerbong1.png') ?>');
          }else if(pilih_gerbong === "2") {
            gerbong.attr('src', '<?= base_url('bootstrap/gerbong/gerbong2.png') ?>');
          }else if(pilih_gerbong === "3") { 
            gerbong.attr('src', '<?= base_url('bootstrap/gerbong/gerbong3.png') ?>');
          }

          

          // validasi
          var bagian          = $('.bagian').val();
          var btn_konfirmasi  = $('#btn_konfirmasi');
          var pesan           = $('.pesan');

          if(pilih_gerbong == "0" || bagian === "0") {
            btn_konfirmasi.attr("disabled", true);

            pesan.removeClass('d-none');
            pesan.text('Pastikan telah memilih Gerbong dan Bagian Gerbong !!');
            pesan.addClass('text-danger');
          } else {
            btn_konfirmasi.attr("disabled", false);
            pesan.addClass('d-none');
            pesan.removeClass('text-danger');
          }

        });
      });
    <?php endif; ?>
    
    var gerbong = $('.img_gerbong');
    var pilih_gerbong = $('.pilih_gerbong').val();


    function cekBagian() {
      var bagian = $('.bagian');
      var bagian_a = $('.bagian_a');
      var bagian_b = $('.bagian_b');
      

      if(bagian.val() === "a") {
        bagian_a.show();
        bagian_b.hide();
        bagian_b.removeAttr('name');
        bagian_b.removeAttr('required');
        bagian_a.attr('name', 'kursi');
      }else if(bagian.val() === "b") {
        bagian_b.show();
        bagian_a.hide();
        bagian_b.attr('name', 'kursi');
        bagian_a.removeAttr('name');
        bagian_a.removeAttr('required');
      }

      // validasi
      var bagian          = $('.bagian').val();
      var btn_konfirmasi  = $('#btn_konfirmasi');
      var pesan           = $('.pesan');

      if(pilih_gerbong == "0" || bagian === "0") {
        btn_konfirmasi.attr("disabled", true);

        pesan.removeClass('d-none');
        pesan.text('Pastikan telah memilih Gerbong dan Bagian Gerbong !!');
        pesan.addClass('text-danger');
      } else {
        btn_konfirmasi.attr("disabled", false);
        pesan.addClass('d-none');
        pesan.removeClass('text-danger');
      }

    }

    $('.gambar').change(() => {
      var pilih_gerbong   = $('.pilih_gerbong').val();
      var bagian          = $('.bagian').val();
      var btn_konfirmasi  = $('#btn_konfirmasi');
      var pesan           = $('.pesan');

      if(pilih_gerbong === "0" || bagian === "0") {
        btn_konfirmasi.attr("disabled", true);

        pesan.removeClass('d-none');
        pesan.text('Pastikan telah memilih Gerbong dan Bagian Gerbong !!');
        pesan.addClass('text-danger');
      } else {
        btn_konfirmasi.attr("disabled", false);
        pesan.addClass('d-none');
        pesan.removeClass('text-danger');
      }
    });
    

  </script>
</body>
</html>