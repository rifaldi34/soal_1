            </div>
          </div>
        


<!-- <script>
  jQuery(document).ready(function($) {

    "use strict";

    Swal.fire({
      title: '',
      text: 'Masih dalam tahap development',
      icon: 'info',
      showCancelButton: false,
      confirmButtonText: 'Tutup'
    });

  });
</script> -->


<?php if ($this->session->userdata('custom_error')) { ?>
  <script>
    jQuery(document).ready(function($) {

      "use strict";

      Swal.fire({
        title: 'Proses Gagal',
        html: '<?= $this->session->userdata('custom_error') ?>',
        icon: 'error',
        showCancelButton: false,
        confirmButtonText: 'Tutup'
      });

    });
  </script>
<?php } ?>

<?php if ($this->session->userdata('custom_success')) { ?>
  <script>
    jQuery(document).ready(function($) {

      "use strict";

      Swal.fire({
        title: 'Proses Berhasil',
        html: '<?= $this->session->userdata('custom_success') ?>',
        icon: 'success',
        showCancelButton: false,
        confirmButtonText: 'Tutup'
      });

    });
  </script>
<?php } ?>



<?php if ($this->session->userdata('query') == 'failed') { ?>
  <script>
    jQuery(document).ready(function($) {

      "use strict";

      Swal.fire({
        title: 'Proses Gagal',
        text: 'Proses tidak dapat dilakukan, silahkan coba lagi',
        icon: 'error',
        showCancelButton: false,
        confirmButtonText: 'Tutup'
      });

    });
  </script>
<?php } ?>

<?php if ($this->session->userdata('query') == 'success') { ?>
  <script>
    jQuery(document).ready(function($) {

      "use strict";

      Swal.fire({
        title: 'Proses Berhasil',
        text: 'Proses Berhasil',
        icon: 'success',
        showCancelButton: false,
        confirmButtonText: 'Tutup'
      });
    });
  </script>
<?php } ?>

</div>
<script type="text/javascript">
</script>
</body>
</html>