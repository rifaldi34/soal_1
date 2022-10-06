
<br></br>

<h1 class="h5 fw-normal mb-3"><strong>Booking</strong> Servis Hari ini</h1>

<div class="card border-0 mb-5 shadow-custom ">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table" id="table-booking-today" style="width:100%">
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
                </tr>
            </thead>
            <tbody>
              
            </tbody>
        </table>
      </div>
    </div>
</div>

<script>
$(document).ready(function(){
    tabel = $('#table-booking-today').DataTable({
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
            "url": "<?= base_url('Datatables/view_data_booking_today');?>", // URL file untuk proses select datanya
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
            { "data": "STATUS" }
        ],
    });
})

</script>