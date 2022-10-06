<?php 

$no = 1;

 ?>

<br>
<br>

<h1 class="h5 fw-normal mb-3"><strong>Service</strong> Category</h1>



<div class="card border-0 mt-3 mb-5 shadow-custom ">
    <div class="card-body">


      <div class="row">
          <div class="col">
              <button class="btn btn-success btn-sm rounded my-2 my-sm-0" type="button" title="Tambah" data-bs-toggle="modal" data-bs-target="#addModal1">
                <span class="bi bi-plus-lg bi-lg"> Tambah</span>
              </button>
          </div>
          <div class="text-end col">
              <button class="btn btn-danger btn-sm rounded my-2 my-sm-0 reset_filter" id="" type="button">
                  <span class="bi bi-x-lg bi-lg"> Reset Sort</span>
              </button>
          </div>
      </div>

      <div class="row mb-3 mt-3">
          <div class="col-12">
              <div class="input-group input-group-sm ms-auto my-2" style="max-width:200px;">
                  <span class="input-group-text"><i class="bi bi-search"></i></span>
                  <input type="text" id="filter_search1" class="form-control form-control-sm ms-0 ms-sm-auto">
              </div>
          </div>
      </div>

      <div class="table-responsive">
      	<table class="table" id="table-1" style="width:100%">
      	    <thead>
      	        <tr>
                    <th>Hidden REC ID</th>
      	            <th scope="col">No.</th>
      	            <th scope="col">Kategori Servis</th>
      	            <!-- <th scope="col">Tgl buat</th> -->
      	            <th scope="col" style="min-width:100px">Aksi</th>
      	        </tr>
      	    </thead>
      	    <tbody>
              
            </tbody>
      	</table>

      </div>
  </div>
</div>

<br>
<br>

<h1 class="h5 fw-normal mb-3"><strong>Service</strong> Type</h1>



<div class="card border-0 mt-3 mb-5 shadow-custom ">
    <div class="card-body">


      <div class="row">
          <div class="col">
              <button class="btn btn-success btn-sm rounded my-2 my-sm-0" type="button" title="Tambah" data-bs-toggle="modal" data-bs-target="#addModal2">
                <span class="bi bi-plus-lg bi-lg"> Tambah</span>
              </button>
          </div>
          <div class="text-end col">
              <button class="btn btn-danger btn-sm rounded my-2 my-sm-0 reset_filter" id="" type="button">
                  <span class="bi bi-x-lg bi-lg"> Reset Sort</span>
              </button>
          </div>
      </div>

      <div class="row mb-3 mt-3">
          <div class="col-12">
              <div class="input-group input-group-sm ms-auto my-2" style="max-width:200px;">
                  <span class="input-group-text"><i class="bi bi-search"></i></span>
                  <input type="text" id="filter_search2" class="form-control form-control-sm ms-0 ms-sm-auto">
              </div>
          </div>
      </div>

      <div class="table-responsive">
        <table class="table" id="table-2" style="width:100%">
            <thead>
                <tr>
                    <th>Hidden REC ID</th>
                    <th scope="col">No.</th>
                    <th scope="col">Kategori Servis</th>
                    <th scope="col">Jenis Servis</th>
                    <!-- <th scope="col">Tgl buat</th> -->
                    <th scope="col" style="min-width:100px">Aksi</th>
                </tr>
            </thead>
            <tbody>
              
            </tbody>
        </table>

      </div>
  </div>
</div>


<div class="modal fade" id="addModal1" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content border-0 shadow">
      <div class="modal-header">
        <h5 class="modal-title">Add Kategori Servis</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body" id="add_modal">

        <form action="<?= base_url('Cms/insertServiceCategory') ?>" method="POST" id="addForm1">

          <div class="mb-3">
            <label class="form-label ">Nama Kategori Servis</label>
            <input type="text" class="form-control form-control-sm" name="value[CATEGORY_NAME]" value="" required>
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

<div class="modal fade" id="addModal2" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content border-0 shadow">
      <div class="modal-header">
        <h5 class="modal-title">Add Tipe Servis</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body" id="add_modal">

        <form action="<?= base_url('Cms/insertServiceType') ?>" method="POST" id="addForm2">

          <div class="mb-3">
            <label class="form-label ">Kategori Servis</label>
            <select class="form-select form-select-sm" id="kategori_servis_select_add" required name="value[CATEGORY_ID]">
              <option value=""></option>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label ">Nama Tipe Servis</label>
            <input type="text" class="form-control form-control-sm" name="value[TYPE_NAME]" value="" required>
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

<div class="modal fade" id="editModal1" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content border-0 shadow">
      <div class="modal-header">
        <h5 class="modal-title">Edit Kategori Servis</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body modal-body-ajax-loading" id="bodyEditModal1Loading">
        Loading...
      </div>
      <div class="modal-body modal-body-ajax" id="bodyEditModal1">
        <form action="<?= base_url('Cms/editServiceCategory') ?>" method="POST" id="editForm1">
          <input type="text" class="form-control form-control-sm" required id="edit1Id" name="value[CATEGORY_ID]" hidden>
          <div class="mb-3">
            <label class="form-label ">Nama Kategori Servis</label>
            <input type="text" class="form-control form-control-sm" required id="edit1Nama" name="value[CATEGORY_NAME]">
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

<div class="modal fade" id="editModal2" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content border-0 shadow">
      <div class="modal-header">
        <h5 class="modal-title">Edit Tipe Servis</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body modal-body-ajax-loading" id="bodyEditModal2Loading">
        Loading...
      </div>
      <div class="modal-body modal-body-ajax" id="bodyEditModal2">
        <form action="<?= base_url('Cms/editServiceType') ?>" method="POST" id="editForm2">
          <input type="text" class="form-control form-control-sm" required id="edit2Id" name="value[TYPE_ID]" hidden>
          <div class="mb-3">
            <label class="form-label ">Kategori Servis</label>
            <select class="form-select form-select-sm" id="edit2Category" name="value[CATEGORY_ID]">
              <option value=""></option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label ">Nama Tipe Servis</label>
            <input type="text" class="form-control form-control-sm" required id="edit2Nama" name="value[TYPE_NAME]">
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


<div class="modal fade" id="detailModal1" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content border-0 shadow">
      <div class="modal-header">
        <h5 class="modal-title">Detail Kategori Servis</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body modal-body-ajax-loading" id="bodyDetailModal1Loading">
        Loading...
      </div>
      <div class="modal-body modal-body-ajax" id="bodyDetailModal">
        <div class="mb-3">
          <label class="form-label ">Nama Kategori Servis</label>
          <input type="text" class="form-control form-control-sm" readonly required id="detail1Nama">
        </div>
        <div class="mb-3">
          <label class="form-label">Tgl Buat</label>
          <input type="email" class="form-control form-control-sm" readonly required id="detail1Created">
        </div>
        <div class="mb-3">
          <label class="form-label">Tgl Update</label>
          <input type="email" class="form-control form-control-sm" readonly required id="detail1Updated">
        </div>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="detailModal2" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content border-0 shadow">
      <div class="modal-header">
        <h5 class="modal-title">Detail Tipe Servis</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body modal-body-ajax-loading" id="bodyDetailModal2Loading">
        Loading...
      </div>
      <div class="modal-body modal-body-ajax" id="bodyDetailModal">
        <div class="mb-3">
          <label class="form-label ">Kategori Servis</label>
          <select class="form-select form-select-sm" id="detail2Category" disabled>
            <option value=""></option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label ">Nama Tipe Servis</label>
          <input type="text" class="form-control form-control-sm" readonly required id="detail2Nama">
        </div>
        <div class="mb-3">
          <label class="form-label">Tgl Buat</label>
          <input type="email" class="form-control form-control-sm" readonly required id="detail2Created">
        </div>
        <div class="mb-3">
          <label class="form-label">Tgl Update</label>
          <input type="email" class="form-control form-control-sm" readonly required id="detail2Updated">
        </div>
      </div>

    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $.ajax({
      type: "GET",
      url: '<?= base_url('Cms/getServiceCatList') ?>',
      success: function(data)
      {
        $.each(data, function(index, value) {
          $('#kategori_servis_select_add').append($('<option>', { value: value.CATEGORY_ID, text: value.CATEGORY_NAME }) );
          $('#detail2Category').append($('<option>', { value: value.CATEGORY_ID, text: value.CATEGORY_NAME }) );
          $('#edit2Category').append($('<option>', { value: value.CATEGORY_ID, text: value.CATEGORY_NAME }) );
          //console.log(value.CATEGORY_NAME);
        });
      }
    });
  });
</script>


<script type="text/javascript">
  $(document).ready(function() {

    //EoL 2
    let tombol_aksi1_prefix1 = "<a data-bs-toggle='modal' data-bs-target='#detailModal1' href='#' class='btn btn-success btn-sm rounded me-1 btnDetail1' data-id='";
    let tombol_aksi1_suffix1 = "' type='button' title='Lihat'><i class='bi bi-eye-fill bi-lg'></i></a>";

    let tombol_aksi2_prefix1 = "<button class='btn btn-warning btn-sm rounded me-1 text-white btnEdit1' data-id='";
    let tombol_aksi2_suffix1 = "' type='button' title='Edit' data-bs-toggle='modal' data-bs-target='#EditModal1'><i class='bi bi-pencil-fill bi-lg'></i></button>"

    let tombol_aksi3_prefix1 = "<button class='btn btn-danger btn-sm rounded me-1 btnDelete1' type='button' title='Hapus' data-id='";
    let tombol_aksi3_suffix1 = "'><i class='bi bi-trash-fill bi-lg'></i></button>";

    let tombol_aksi1_prefix2 = "<a data-bs-toggle='modal' data-bs-target='#detailModal2' href='#' class='btn btn-success btn-sm rounded me-1 btnDetail2' data-id='";
    let tombol_aksi1_suffix2 = "' type='button' title='Lihat'><i class='bi bi-eye-fill bi-lg'></i></a>";

    let tombol_aksi2_prefix2 = "<button class='btn btn-warning btn-sm rounded me-1 text-white btnEdit2' data-id='";
    let tombol_aksi2_suffix2 = "' type='button' title='Edit' data-bs-toggle='modal' data-bs-target='#EditModal2'><i class='bi bi-pencil-fill bi-lg'></i></button>"

    let tombol_aksi3_prefix2 = "<button class='btn btn-danger btn-sm rounded me-1 btnDelete2' type='button' title='Hapus' data-id='";
    let tombol_aksi3_suffix2 = "'><i class='bi bi-trash-fill bi-lg'></i></button>";

    tabel = $('#table-1').DataTable({
        "dom": "rtip",
        "scrollX": true,
        "processing": true,
        "responsive": false,
        "stateSave": true,
        "serverSide": true,
        "ordering": true, // Set true agar bisa di sorting
        "order": [[ 2, 'desc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
        "ajax":
        {
            "url": "<?= base_url('Datatables/view_data_service_category');?>", // URL file untuk proses select datanya
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
            // { "data": "CREATED" },
            { "data": "CATEGORY_ID",
                "render": 
                function( data, type, row, meta ) {
                    //return '<a href="show/'+data+'">Show</a>';
                    return tombol_aksi1_prefix1+data+tombol_aksi1_suffix1 + tombol_aksi2_prefix1+data+tombol_aksi2_suffix1 + tombol_aksi3_prefix1+data+tombol_aksi3_suffix1;
                }
            },
        ],
    });

    tabel2 = $('#table-2').DataTable({
        "dom": "rtip",
        "scrollX": true,
        "processing": true,
        "responsive": false,
        "stateSave": true,
        "serverSide": true,
        "ordering": true, // Set true agar bisa di sorting
        "order": [[ 2, 'desc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
        "ajax":
        {
            "url": "<?= base_url('Datatables/view_data_service_type');?>", // URL file untuk proses select datanya
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
            // { "data": "CREATED" },
            { "data": "TYPE_ID",
                "render": 
                function( data, type, row, meta ) {
                    //return '<a href="show/'+data+'">Show</a>';
                    return tombol_aksi1_prefix2+data+tombol_aksi1_suffix2 + tombol_aksi2_prefix2+data+tombol_aksi2_suffix2 + tombol_aksi3_prefix2+data+tombol_aksi3_suffix2;
                }
            },
        ],
    });

    $( ".reset_filter" ).click(function() {
        tabel.state.clear();
        tabel2.state.clear();
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

    $('#filter_search1').keyup(delay(function (e) {
      tabel.search(this.value).draw();
    }, 200));
    $('#filter_search2').keyup(delay(function (e) {
      tabel2.search(this.value).draw();
    }, 200));

    $('#filter_search1').val(tabel.search());
    $('#filter_search2').val(tabel2.search());

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


    $("#addForm1").submit(function(e) {

      e.preventDefault(); // avoid to execute the actual submit of the form.
      let form = $(this);
      formAjax(form);
    });

    $("#addForm2").submit(function(e) {

      e.preventDefault(); // avoid to execute the actual submit of the form.
      let form = $(this);
      formAjax(form);
    });

    $("#editForm1").submit(function(e) {

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

    $("#editForm2").submit(function(e) {

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


    $(document).on('click', '.btnDetail1', function(e){
      e.preventDefault();
      loadingOnOff('on');
      $.ajax({
        type: 'GET',
        url: baseUrl+'Cms/getServiceCategory',
        data: {category_id : $(this).data('id')},
        success: function(data){
          loadingOnOff('off');
          let prefix_id = 'detail1';
          $('#'+prefix_id+'Nama').val(data.CATEGORY_NAME);
          $('#'+prefix_id+'Created').val(data.CREATED);
          $('#'+prefix_id+'Updated').val(data.UPDATED);
        }
      });
    });

    $(document).on('click', '.btnDetail2', function(e){
      e.preventDefault();
      loadingOnOff('on');
      $.ajax({
        type: 'GET',
        url: baseUrl+'Cms/getServiceType',
        data: {type_id : $(this).data('id')},
        success: function(data){
          loadingOnOff('off');
          let prefix_id = 'detail2';
          $('#'+prefix_id+'Category').val(data.CATEGORY_ID);
          $('#'+prefix_id+'Nama').val(data.TYPE_NAME);
          $('#'+prefix_id+'Created').val(data.CREATED);
          $('#'+prefix_id+'Updated').val(data.UPDATED);
        }
      });
    });

    $(document).on('click', '.btnEdit1', function(e){
      e.preventDefault();
      loadingOnOff('on');
      $.ajax({
        type: 'GET',
        url: baseUrl+'Cms/getServiceCategory',
        data: {category_id : $(this).data('id')},
        success: function(data){
          loadingOnOff('off');
          let prefix_id = 'edit1';
          $('#'+prefix_id+'Id').val(data.CATEGORY_ID);
          $('#'+prefix_id+'Nama').val(data.CATEGORY_NAME);
          $('#'+prefix_id+'Created').val(data.CREATED);
          $('#'+prefix_id+'Updated').val(data.UPDATED);
        }
      });
    });

    $(document).on('click', '.btnEdit2', function(e){
      e.preventDefault();
      loadingOnOff('on');
      $.ajax({
        type: 'GET',
        url: baseUrl+'Cms/getServiceType',
        data: {type_id : $(this).data('id')},
        success: function(data){
          loadingOnOff('off');
          let prefix_id = 'edit2';
          $('#'+prefix_id+'Id').val(data.TYPE_ID);
          $('#'+prefix_id+'Category').val(data.CATEGORY_ID);
          $('#'+prefix_id+'Nama').val(data.TYPE_NAME);
          $('#'+prefix_id+'Created').val(data.CREATED);
          $('#'+prefix_id+'Updated').val(data.UPDATED);
        }
      });
    });

    $(document).on('click', '.btnDelete1', function(e){
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
            url: baseUrl+'Cms/deleteServiceCategory',
            data: {category_id : $(this).data('id')},
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

    $(document).on('click', '.btnDelete2', function(e){
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
            url: baseUrl+'Cms/deleteServiceType',
            data: {type_id : $(this).data('id')},
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