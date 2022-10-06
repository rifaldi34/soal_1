<?php 

$no = 1;

 ?>

<br>
<br>

<h1 class="h5 fw-normal mb-3"><strong>Customer</strong> List</h1>



<div class="card border-0 mt-3 mb-5 shadow-custom ">
    <div class="card-body">


      <div class="row">
          <div class="col">
              <button class="btn btn-success btn-sm rounded my-2 my-sm-0" type="button" title="Tambah" data-bs-toggle="modal" data-bs-target="#addModal">
                <span class="bi bi-plus-lg bi-lg"> Tambah</span>
              </button>
          </div>
          <div class="text-end col">
              <button class="btn btn-danger btn-sm rounded my-2 my-sm-0" id="reset_filter" type="button">
                  <span class="bi bi-x-lg bi-lg"> Reset Sort</span>
              </button>
          </div>
      </div>

      <div class="row mb-3 mt-3">
          <div class="col-12">
              <div class="input-group input-group-sm ms-auto my-2" style="max-width:200px;">
                  <span class="input-group-text"><i class="bi bi-search"></i></span>
                  <input type="text" id="filter_search" class="form-control form-control-sm ms-0 ms-sm-auto">
              </div>
          </div>
      </div>

      <div class="table-responsive">
      	<table class="table" id="table-customer" style="width:100%">
      	    <thead>
      	        <tr>
                    <th>Hidden REC ID</th>
      	            <th scope="col">No.</th>
      	            <th scope="col">Nama</th>
      	            <th scope="col">Telp</th>
      	            <th scope="col">Email</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Tgl buat</th>
      	            <th scope="col" style="min-width:100px">Aksi</th>
      	        </tr>
      	    </thead>
      	    <tbody>
              
            </tbody>
      	</table>

      </div>

      <div class="modal fade" id="addModal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content border-0 shadow">
            <div class="modal-header">
              <h5 class="modal-title">Add Customer</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body" id="add_modal">

              <form action="<?= base_url('Cms/insertCustomer') ?>" method="POST" id="addForm">

                <div class="mb-3">
                  <label class="form-label ">Nama</label>
                  <input type="text" class="form-control form-control-sm" name="value[CUSTOMER_NAME]" value="" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Telp</label>
                  <input type="text" class="form-control form-control-sm" name="value[CUSTOMER_PHONE]" value="" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">E-mail</label>
                  <input type="email" class="form-control form-control-sm" name="value[CUSTOMER_EMAIL]" value="" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Alamat</label>
                  <textarea name="value[CUSTOMER_ADDRESS]" class="form-control form-control-sm"></textarea>
                </div>

                <div class="d-flex justify-content-end mt-4">
                  <button type="submit" class="btn btn-success me-auto">Simpan</button>
                  <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</a>
                </div>

              </form>

            </div>

          </div>
        </div>
      </div>
  </div>
</div>


<div class="modal fade" id="editModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content border-0 shadow">
      <div class="modal-header">
        <h5 class="modal-title">Edit Customer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body modal-body-ajax-loading" id="bodyEditModalLoading">
        Loading...
      </div>
      <div class="modal-body modal-body-ajax" id="bodyEditModal">
        <form action="<?= base_url('Cms/editCustomer') ?>" method="POST" id="editForm">
          <input type="text" class="form-control form-control-sm" required id="editId" name="value[CUSTOMER_ID]" hidden>
          <div class="mb-3">
            <label class="form-label ">Nama</label>
            <input type="text" class="form-control form-control-sm" required id="editNama" name="value[CUSTOMER_NAME]">
          </div>
          <div class="mb-3">
            <label class="form-label">Telp</label>
            <input type="text" class="form-control form-control-sm" required id="editTelp" name="value[CUSTOMER_PHONE]">
          </div>
          <div class="mb-3">
            <label class="form-label">E-mail</label>
            <input type="email" class="form-control form-control-sm" required id="editEmail" name="value[CUSTOMER_EMAIL]">
          </div>
          <div class="mb-3">
            <label class="form-label">Alamat</label>
            <textarea class="form-control form-control-sm" id="editAlamat" name="value[CUSTOMER_ADDRESS]"></textarea>
          </div>

          <div class="d-flex justify-content-end mt-4">
            <button type="submit" class="btn btn-success me-auto">Edit</button>
            <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</a>
          </div>
        </form>

      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="detailModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content border-0 shadow">
      <div class="modal-header">
        <h5 class="modal-title">Detail Customer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body modal-body-ajax-loading" id="bodyDetailModalLoading">
        Loading...
      </div>
      <div class="modal-body modal-body-ajax" id="bodyDetailModal">
        <div class="mb-3">
          <label class="form-label ">Nama</label>
          <input type="text" class="form-control form-control-sm" readonly required id="detailNama">
        </div>
        <div class="mb-3">
          <label class="form-label">Telp</label>
          <input type="text" class="form-control form-control-sm" readonly required id="detailTelp">
        </div>
        <div class="mb-3">
          <label class="form-label">E-mail</label>
          <input type="email" class="form-control form-control-sm" readonly required id="detailEmail">
        </div>
        <div class="mb-3">
          <label class="form-label">Alamat</label>
          <textarea class="form-control form-control-sm" id="detailAlamat" readonly></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Tgl Buat</label>
          <input type="email" class="form-control form-control-sm" readonly required id="detailCreated">
        </div>
        <div class="mb-3">
          <label class="form-label">Tgl Update</label>
          <input type="email" class="form-control form-control-sm" readonly required id="detailUpdated">
        </div>
      </div>

    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {

    //EoL 2
    let tombol_aksi1_prefix = "<a data-bs-toggle='modal' data-bs-target='#detailModal' href='#' class='btn btn-success btn-sm rounded me-1 btnDetail' data-id='";
    let tombol_aksi1_suffix = "' type='button' title='Lihat'><i class='bi bi-eye-fill bi-lg'></i></a>";

    let tombol_aksi2_prefix = "<button class='btn btn-warning btn-sm rounded me-1 text-white btnEdit' data-id='";
    let tombol_aksi2_suffix = "' type='button' title='Edit' data-bs-toggle='modal' data-bs-target='#EditModal'><i class='bi bi-pencil-fill bi-lg'></i></button>"

    let tombol_aksi3_prefix = "<button class='btn btn-danger btn-sm rounded me-1 btnDelete' type='button' title='Hapus' data-id='";
    let tombol_aksi3_suffix = "'><i class='bi bi-trash-fill bi-lg'></i></button>";

    tabel = $('#table-customer').DataTable({
        "dom": "rtip",
        "scrollX": true,
        "processing": true,
        "responsive": false,
        "stateSave": true,
        "serverSide": true,
        "ordering": true, // Set true agar bisa di sorting
        "order": [[ 6, 'desc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
        "ajax":
        {
            "url": "<?= base_url('Datatables/view_data_customer');?>", // URL file untuk proses select datanya
            "type": "POST"
        },
        "deferRender": true,
        "aLengthMenu": [[10, 20, 50],[ 10, 20, 50]], // Combobox Limit
        "columns": [
            {"data": 'REC_ID', visible: false, searchable: false, 
            },
            {"data": 'REC_ID',sortable: false, 
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { "data": "CUSTOMER_NAME" },
            { "data": "CUSTOMER_PHONE" },
            { "data": "CUSTOMER_EMAIL",},
            { "data": "CUSTOMER_ADDRESS",},
            { "data": "CREATED" },
            { "data": "CUSTOMER_ID",
                "render": 
                function( data, type, row, meta ) {
                    //return '<a href="show/'+data+'">Show</a>';
                    return tombol_aksi1_prefix+data+tombol_aksi1_suffix + tombol_aksi2_prefix+data+tombol_aksi2_suffix + tombol_aksi3_prefix+data+tombol_aksi3_suffix;
                }
            },
        ],
    });

    $( "#reset_filter" ).click(function() {
        tabel.state.clear();
        window.location.reload();
    });

    function delay(callback, ms) {
      var timer = 0;
      return function() {
        var context = this, args = arguments;
        clearTimeout(timer);
        timer = setTimeout(function () {
          callback.apply(context, args);
        }, ms || 0);
      };
    }

    $('#filter_search').keyup(delay(function (e) {
      tabel.search(this.value).draw();
    }, 200));
    $('#filter_search').val(tabel.search());
  });
</script>

<script>
  $(document).ready(function() {
    var baseUrl = "<?= base_url() ?>";

    function swallOkReload(icon, title, desc) {
      Swal.fire({
        icon: icon,
        title: title,
        text: desc,
      }).then((result) => {
        // Reload the Page
        location.reload();
      });
    }

    function loadingOnOff(loading){
      if (loading == 'on') {
        $('.modal-body-ajax-loading').removeClass('d-none');
        $('.modal-body-ajax').addClass('d-none');
      }else if (loading == 'off'){
        $('.modal-body-ajax-loading').addClass('d-none');
        $('.modal-body-ajax').removeClass('d-none');        
      }
    }

    function formAjax(form){
      let actionUrl = form.attr('action');
      
      $.ajax({
        type: "POST",
        url: actionUrl,
        data: form.serialize(), // serializes the form's elements.
        success: function(data)
        {
          if (data.code == '200') {
            swallOkReload('success', data.title, data.desc);
          }else{
            swallOkReload('error', data.title, data.desc);
          }
          //alert(data); // show response from the php script.
        }
      });
    }


    $("#addForm").submit(function(e) {

      e.preventDefault(); // avoid to execute the actual submit of the form.
      let form = $(this);
      formAjax(form);
    });

    $("#editForm").submit(function(e) {

      e.preventDefault(); // avoid to execute the actual submit of the form.
      let form = $(this);
      Swal.fire({
        icon: 'info',
        title: 'Apakah Anda yakin ingin ubah data ?',
        showCancelButton: true,
        cancelButtonText: 'Batal',
        confirmButtonText: 'Ubah'
      }).then((result) => {
        // Reload the Page
        if (result.value) {
          formAjax(form);          
        }
      });
      
    });


    $(document).on('click', '.btnDetail', function(e){
      e.preventDefault();
      loadingOnOff('on');
      $.ajax({
        type: 'GET',
        url: baseUrl+'Cms/getCustomer',
        data: {customer_id : $(this).data('id')},
        success: function(data){
          loadingOnOff('off');
          let prefix_id = 'detail';
          $('#'+prefix_id+'Nama').val(data.CUSTOMER_NAME);
          $('#'+prefix_id+'Telp').val(data.CUSTOMER_PHONE);
          $('#'+prefix_id+'Email').val(data.CUSTOMER_EMAIL);
          $('#'+prefix_id+'Alamat').val(data.CUSTOMER_ADDRESS);
          $('#'+prefix_id+'Created').val(data.CREATED);
          $('#'+prefix_id+'Updated').val(data.UPDATED);
        }
      });
    });

    $(document).on('click', '.btnEdit', function(e){
      e.preventDefault();
      loadingOnOff('on');
      $.ajax({
        type: 'GET',
        url: baseUrl+'Cms/getCustomer',
        data: {customer_id : $(this).data('id')},
        success: function(data){
          loadingOnOff('off');
          let prefix_id = 'edit';
          $('#'+prefix_id+'Id').val(data.CUSTOMER_ID);
          $('#'+prefix_id+'Nama').val(data.CUSTOMER_NAME);
          $('#'+prefix_id+'Telp').val(data.CUSTOMER_PHONE);
          $('#'+prefix_id+'Email').val(data.CUSTOMER_EMAIL);
          $('#'+prefix_id+'Alamat').val(data.CUSTOMER_ADDRESS);
          $('#'+prefix_id+'Created').val(data.CREATED);
          $('#'+prefix_id+'Updated').val(data.UPDATED);
        }
      });
    });

    $(document).on('click', '.btnDelete', function(e){
      e.preventDefault();

      Swal.fire({
        icon: 'error',
        title: 'Apakah Anda yakin ingin HAPUS data ?',
        showCancelButton: true,
        cancelButtonText: 'Batal',
        confirmButtonText: 'HAPUS'
      }).then((result) => {
        // Reload the Page
        if (result.value) {
          $.ajax({
            type: 'POST',
            url: baseUrl+'Cms/deleteCustomer',
            data: {customer_id : $(this).data('id')},
            success: function(data){
              if (data.code == '200') {
                swallOkReload('success', data.title, data.desc);
              }else{
                swallOkReload('error', data.title, data.desc);
              }
            }
          });
        }
      });
    });

  });
</script>