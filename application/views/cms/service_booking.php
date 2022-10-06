<?php 

$no = 1;

 ?>

<br>
<br>

<h1 class="h5 fw-normal mb-3"><strong>Service</strong> Booking</h1>



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
      	<table class="table" id="table-booking" style="width:100%">
      	    <thead>
      	        <tr>
                    <th>Hidden REC ID</th>
      	            <th scope="col">No.</th>
                    <th scope="col">Kategori Servis</th>
      	            <th scope="col">Tipe Servis</th>
      	            <th scope="col">Nama Customer</th>
                    <th scope="col">Telp Customer</th>
                    <th scope="col">Target Booking</th>
                    <th scope="col">Tgl buat</th>
                    <th scope="col">Status</th>
      	            <th scope="col" style="min-width:130px">Aksi</th>
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
              <h5 class="modal-title">Add Booking</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body" id="add_modal">

              <form action="<?= base_url('Cms/insertBooking') ?>" method="POST" id="addForm">

                <div class="mb-3">
                  <label class="form-label ">Kategori Servis</label>
                  <select class="form-select form-select-sm" id="addCategory" required>
                    <option value=""></option>
                  </select>
                </div>
                <div class="mb-3">
                  <label class="form-label ">Tipe Servis</label>
                  <select class="form-select form-select-sm" id="addType" name="value[TYPE_ID]" required>
                    <option value=""></option>
                  </select>
                </div>
                <div class="mb-3">
                  <label class="form-label">Customer</label>
                  <select class="form-select form-select-sm" id="addCustomer" name="value[CUSTOMER_ID]" required>
                    <option value=""></option>
                  </select>
                </div>
                <div class="mb-3">
                  <label class="form-label">Target Booking</label>
                  <input type="datetime-local" name="value[BOOKING_TARGET_DATE]" class="form-control form-control-sm" required id="datetimeAdd">
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
        <h5 class="modal-title">Edit Booking</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body modal-body-ajax-loading" id="bodyEditModalLoading">
        Loading...
      </div>
      <div class="modal-body modal-body-ajax" id="bodyEditModal">
        <form action="<?= base_url('Cms/editBooking') ?>" method="POST" id="editForm">
          <input type="text" class="form-control form-control-sm" required id="editId" name="value[BOOKING_ID]" hidden>
          <div class="mb-3">
            <label class="form-label ">Kategori Servis</label>
            <select class="form-select form-select-sm" id="editCategory" required>
              <option value=""></option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label ">Tipe Servis</label>
            <select class="form-select form-select-sm" id="editType" name="value[TYPE_ID]" required>
              <option value=""></option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Customer</label>
            <select class="form-select form-select-sm" id="editCustomer" name="value[CUSTOMER_ID]" required>
              <option value=""></option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Target Booking</label>
            <input type="datetime-local" name="value[BOOKING_TARGET_DATE]" class="form-control form-control-sm" required id="editTarget">
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
        <h5 class="modal-title">Detail Booking</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body modal-body-ajax-loading" id="bodyDetailModalLoading">
        Loading...
      </div>
      <div class="modal-body modal-body-ajax" id="bodyDetailModal">
        <div class="mb-3">
          <label class="form-label ">Kategori Servis</label>
          <input type="text" class="form-control form-control-sm" readonly id="detailCategory">
        </div>
        <div class="mb-3">
          <label class="form-label">Tipe Servis</label>
          <input type="text" class="form-control form-control-sm" readonly id="detailType">
        </div>
        <div class="mb-3">
          <label class="form-label">Nama Customer</label>
          <input type="email" class="form-control form-control-sm" readonly id="detailName">
        </div>
        <div class="mb-3">
          <label class="form-label">Telp Customer</label>
          <input type="email" class="form-control form-control-sm" readonly id="detailPhone">
        </div>
        <div class="mb-3">
          <label class="form-label">Email Customer</label>
          <input type="email" class="form-control form-control-sm" readonly id="detailEmail">
        </div>
        <div class="mb-3">
          <label class="form-label">Alamat Customer</label>
          <textarea class="form-control form-control-sm" readonly id="detailAddress"></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Target Booking</label>
          <input type="email" class="form-control form-control-sm" readonly id="detailTarget">
        </div>
        <div class="mb-3">
          <label class="form-label">Tgl Buat</label>
          <input type="email" class="form-control form-control-sm" readonly id="detailCreated">
        </div>
        <div class="mb-3">
          <label class="form-label">Tgl Update</label>
          <input type="email" class="form-control form-control-sm" readonly id="detailUpdated">
        </div>
      </div>

    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {

    Date.prototype.addDays = function(days) {
      var date = new Date(this.valueOf());
      date.setDate(date.getDate() + days);
      return date;
    }

    const d = new Date();
    let minTime = d.toISOString().slice(0,16);
    let maxTime = d.addDays(2).toISOString().slice(0,10);
    $('#datetimeAdd').attr('min', minTime);
    $('#datetimeAdd').attr('max', maxTime+'T23:59');

    //EoL 2
    let tombol_aksi1_prefix = "<a data-bs-toggle='modal' data-bs-target='#detailModal' href='#' class='btn btn-success btn-sm rounded me-1 btnDetail' data-id='";
    let tombol_aksi1_suffix = "' type='button' title='Lihat'><i class='bi bi-eye-fill bi-lg'></i></a>";

    let tombol_aksi2_prefix = "<button class='btn btn-warning btn-sm rounded me-1 text-white btnEdit' data-id='";
    let tombol_aksi2_suffix = "' type='button' title='Edit' data-bs-toggle='modal' data-bs-target='#EditModal'><i class='bi bi-pencil-fill bi-lg'></i></button>"

    let tombol_aksi2p_prefix = "<button class='btn btn-success btn-sm rounded me-1 text-white btnDone' data-id='";
    let tombol_aksi2p_suffix = "' type='button' title='Kerjakan'><i class='bi bi-tools bi-lg'></i></button>"

    let tombol_aksi3_prefix = "<button class='btn btn-danger btn-sm rounded me-1 btnDelete' type='button' title='Hapus' data-id='";
    let tombol_aksi3_suffix = "'><i class='bi bi-trash-fill bi-lg'></i></button>";

    tabel = $('#table-booking').DataTable({
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
            "url": "<?= base_url('Datatables/view_data_booking');?>", // URL file untuk proses select datanya
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
            { "data": "CATEGORY_NAME" },
            { "data": "TYPE_NAME" },
            { "data": "CUSTOMER_NAME",},
            { "data": "CUSTOMER_PHONE",},
            { "data": "BOOKING_TARGET_DATE" },
            { "data": "CREATED" },
            { "data": "STATUS" },
            { "data": "BOOKING_ID",
                "render": 
                function( data, type, row, meta ) {

                  if (row.STATUS == 'DONE') {
                    return tombol_aksi1_prefix+data+tombol_aksi1_suffix;
                  }else{
                    return tombol_aksi1_prefix+data+tombol_aksi1_suffix + tombol_aksi2_prefix+data+tombol_aksi2_suffix + tombol_aksi2p_prefix+data+tombol_aksi2p_suffix + tombol_aksi3_prefix+data+tombol_aksi3_suffix;
                  }
                    //return '<a href="show/'+data+'">Show</a>';
                    
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

    $.ajax({
      type: "GET",
      url: '<?= base_url('Cms/getServiceCatList') ?>',
      success: function(data)
      {
        $.each(data, function(index, value) {
          $('#addCategory').append($('<option>', { value: value.CATEGORY_ID, text: value.CATEGORY_NAME }) );
          $('#editCategory').append($('<option>', { value: value.CATEGORY_ID, text: value.CATEGORY_NAME }) );
          //console.log(value.CATEGORY_NAME);
        });
      }
    });

    $.ajax({
      type: "GET",
      url: '<?= base_url('Cms/getCustomerList') ?>',
      success: function(data)
      {
        $.each(data, function(index, value) {
          $('#addCustomer').append($('<option>', { value: value.CUSTOMER_ID, text: value.CUSTOMER_NAME }) );
          $('#editCustomer').append($('<option>', { value: value.CUSTOMER_ID, text: value.CUSTOMER_NAME }) );
          //console.log(value.CATEGORY_NAME);
        });
      }
    });

    $(document).on('change', '#addCategory', function(e){
      e.preventDefault();
      $.ajax({
        type: 'GET',
        url: baseUrl+'Cms/getCatTypeList',
        data: {category_id : $(this).val()},
        success: function(data){
          loadingOnOff('off');
          $('#addType').empty();
          $('#addType').append($('<option>', { value: '', text: '' }) );
          $.each(data, function(index, value) {
            $('#addType').append($('<option>', { value: value.TYPE_ID, text: value.TYPE_NAME }) );
          });
          
        }
      });
    });


    $(document).on('click', '.btnDetail', function(e){
      e.preventDefault();
      loadingOnOff('on');
      $.ajax({
        type: 'GET',
        url: baseUrl+'Cms/getBooking',
        data: {booking_id : $(this).data('id')},
        success: function(data){
          loadingOnOff('off');
          let prefix_id = 'detail';
          $('#'+prefix_id+'Category').val(data.CATEGORY_NAME);
          $('#'+prefix_id+'Type').val(data.TYPE_NAME);
          $('#'+prefix_id+'Name').val(data.CUSTOMER_NAME);
          $('#'+prefix_id+'Phone').val(data.CUSTOMER_PHONE);
          $('#'+prefix_id+'Email').val(data.CUSTOMER_EMAIL);
          $('#'+prefix_id+'Address').val(data.CUSTOMER_ADDRESS);
          $('#'+prefix_id+'Target').val(data.BOOKING_TARGET_DATE);
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
        url: baseUrl+'Cms/getBooking',
        data: {booking_id : $(this).data('id')},
        success: function(data1){
          loadingOnOff('off');
          var prefix_id = 'edit';
          $('#'+prefix_id+'Category').val(data1.CATEGORY_ID);
          $('#'+prefix_id+'Id').val(data1.BOOKING_ID);
          $.ajax({
            type: 'GET',
            url: baseUrl+'Cms/getCatTypeList',
            data: {category_id : data1.CATEGORY_ID},
            success: function(data2){
              loadingOnOff('off');
              $('#editType').empty();
              $('#editType').append($('<option>', { value: '', text: '' }) );
              $.each(data2, function(index, value) {
                if (data1.TYPE_ID == value.TYPE_ID) {

                  $('#editType').append($('<option>', { value: value.TYPE_ID, text: value.TYPE_NAME, selected: true}) );
                }else{
                  $('#editType').append($('<option>', { value: value.TYPE_ID, text: value.TYPE_NAME }) );
                }
                
              });
              // $('#'+prefix_id+'Type').val(data.TYPE_ID);
            }
          });

          $('#'+prefix_id+'Customer').val(data1.CUSTOMER_ID);
          date_temp1 = data1.BOOKING_TARGET_DATE.replace(' ', 'T');
          //console.log(date_temp1);
          $('#'+prefix_id+'Target').val(date_temp1);
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
            url: baseUrl+'Cms/deleteBooking',
            data: {booking_id : $(this).data('id')},
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

    $(document).on('click', '.btnDone', function(e){
      e.preventDefault();

      Swal.fire({
        icon: 'info',
        title: 'Apakah Anda yakin ingin mengerjakan booking ini ?',
        showCancelButton: true,
        cancelButtonText: 'Batal',
        confirmButtonText: 'Kerjakan'
      }).then((result) => {
        // Reload the Page
        if (result.value) {
          $.ajax({
            type: 'POST',
            url: baseUrl+'Cms/doneBooking',
            data: {booking_id : $(this).data('id')},
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