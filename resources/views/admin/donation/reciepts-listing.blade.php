@extends('admin.layout.app')

@push('header-scripts')
   <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/admin/fontawesome-free/css/all.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('assets/admin/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/admin/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/admin/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/admin/dist/css/adminlte.min.css')}}">

  <!-- for sweet alert  -->
  {{-- <link rel="stylesheet" href="{{asset('assets/admin/sweetalert/sweetalert.css')}}"> --}}

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">

   {{-- toggle bootstrap --}}
   <style>
	   .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>


@endpush


@section('content')
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
		  <div class="container-fluid">
		    <div class="row mb-2">
		      <div class="col-sm-6">
		        <h1 class="m-0">Donations</h1>
		      </div><!-- /.col -->
		      <div class="col-sm-6">
		        <ol class="breadcrumb float-sm-right">
		          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
		          <li class="breadcrumb-item active">Add New Doantion</li>
		        </ol>
		      </div><!-- /.col -->
		    </div><!-- /.row -->
		  </div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->

		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				<div class="row">
				  <div class="col-12">
				    <div class="card">
				      <div class="card-header">
				      	@if(have_right('add-slider'))
					        <h3 class="card-title">
					        	<a href="{{ URL('admin/donations/create') }}" class="btn btn-primary"> Add New </a>
					        </h3>
				        @endif
				      </div>
				      <div class="card-body">
				        <table id="pages-datatable" class="table table-bordered table-striped" style="width:100%">
				          <thead>
				              <tr>
				                <th>ID</th>
				                <th>Name</th>
								<th>Amount</th>
				                <th>Receipt</th>
				                <th>Status</th>
				                <th>Actions</th>
				              </tr>
				          </thead>
				          <tbody>
				          </tbody>
				          <tfoot>
				              <tr>
				                <th>ID</th>
				                <th>Name</th>
				                <th>Amount</th>
				                <th>Receipt</th>
				                <th>Status</th>
				                <th>Actions</th>
				              </tr>
				          </tfoot>
				        </table>
				      </div>
				    </div>
				  </div>
				</div>
			</div>
		</section>
		<!-- Main content -->
	</div>
	<div class="modal fade common-model-style" id="showPaymentdetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h2 class="modal-title text-red" id="exampleModalLabel"><strong>Payment Details</strong></h2>
					<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body" id="showPaymentdetail_modal">

				</div>
				<div class="modal-footer">
					{{-- <button type="button" class="green-hover-bg theme-btn" data-dismiss="modal">Close</button> --}}
				</div>
			</div>
		</div>
	</div>
@endsection

@push('footer-scripts')
  <!-- jQuery -->
	<script src="{{asset('assets/admin/jquery/jquery.min.js')}}"></script>
	<!-- Bootstrap 4 -->
	<script src="{{asset('assets/admin/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
	<!-- DataTables  & Plugins -->
	<script src="{{asset('assets/admin/datatables/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('assets/admin/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
	<script src="{{asset('assets/admin/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
	<script src="{{asset('assets/admin/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
	<script src="{{asset('assets/admin/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
	<script src="{{asset('assets/admin/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
	<script src="{{asset('assets/admin/jszip/jszip.min.js')}}"></script>
	<script src="{{asset('assets/admin/pdfmake/pdfmake.min.js')}}"></script>
	<script src="{{asset('assets/admin/pdfmake/vfs_fonts.js')}}"></script>
	<script src="{{asset('assets/admin/datatables-buttons/js/buttons.html5.min.js')}}"></script>
	<script src="{{asset('assets/admin/datatables-buttons/js/buttons.print.min.js')}}"></script>
	<script src="{{asset('assets/admin/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

	<!-- AdminLTE App -->
	<script src="{{asset('assets/admin/dist/js/adminlte.min.js')}}"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="{{asset('assets/admin/dist/js/demo.js')}}"></script>
    <!-- Global Var -->
	<script src="{{asset('assets/admin/dist/js/binary-image.js')}}"></script>
	<!--sweat alert -->
	{{-- <script src="{{asset('assets/admin/sweetalert/sweetalert.min.js')}}"></script> --}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js">

	</script>
	<!-- Page specific script -->
	<script>
	  $(function () {
	    $('#pages-datatable').dataTable(
      	{
      		sort: false,
			pageLength: 50,
			scrollX: true,
			processing: false,
			language: { "processing": showOverlayLoader()},
			drawCallback : function( ) {
		        hideOverlayLoader();
		    },
			responsive: true,
			dom: 'Blfrtip',
            buttons: [
                        {
                            extend: 'pdf',
                            text: '<i class="fa fa-file-pdf-o" aria-hidden="true" title="Admin Users"></i>&nbsp;Export as PDF',
                            title: 'Doantions',
                            orientation: 'landscape',
                            alignment: "center",
                            exportOptions: {
                                columns: [0,1,2,3],
                                alignment: "center",
                                orthogonal: "PDF",
                                modifier: {order: 'index', page: 'current'},
                            },
                            customize : function(doc) {
                                doc.content[1].table.widths = [ '16%', '22%', '40%','22%'];
                                doc.styles.tableBodyEven.alignment = "center";
                                doc.styles.tableBodyOdd.alignment = "center";
                                doc.content.splice( 1, 0, {
                                margin: [  0, -70, 0, 20 ],
                                alignment: 'right',
                                image:GlobalVar.image_logo,
                                } );
                                doc.styles.title = {
                                // color: 'red',
                                fontSize: '45',
                                // margin: [ 120, 0, 0, -120],
                                // background: 'blue',
                                alignment: 'left'
                                }
                            }
                        }
                    ],

			lengthMenu: [[5, 10, 25, 50, 100, 200, -1], [5, 10, 25, 50, 100, 200, "All"]],
			serverSide: true,
			ajax: "{{ url('admin/donations/reciepts/'.$id) }}",
			columns: [
				{data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
				{data: 'name', name: 'name'},
				{data: 'amount', name: 'amount'},
				{data: 'receipt', name: 'receipt'},
				{data: 'status', name: 'status'},
				{data: 'action', name: 'action', orderable: false, searchable: false},
			]
	    }).on( 'length.dt', function () {
		}).on('page.dt', function () {
	    }).on( 'order.dt', function () {
		}).on( 'search.dt', function () {
		});
	  });
	  function showOverlayLoader()
	  {
	  }
	  function hideOverlayLoader()
	  {
	  }

	  $.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('input[name="_token"]').val()
		    }
		});

	//  set featured donation function
	  function statusChange(_this,id){

		var URL = "{{ URL('admin/donations/reciept-status') }}";
		var status = ($(_this).prop('checked') == true) ? 1:0;
		$.ajax({
			url: URL+'/'+id,
			data: {status:status},
			type: "get",
			success: function(response) {
				swal("Done!", "Status Changed.", "success")
			},
			error: function(data) {
			}
		});
	 }
	 function get_tranfer_payment_details(val){
		// $("#showPaymentdetail").modal('show');
		// alert("ok");
		var donationRecieptId = val;
		var URLPayment = "{{ URL('admin/donations-show-transfer-payment') }}";
		$.ajax({
			url: URLPayment,
			data: {donationRecieptId:donationRecieptId},
			type: "get",
			success: function(response) {
				$("#showPaymentdetail").modal('show');
				$("#showPaymentdetail_modal").html(response);
			},
			error: function(data) {
			}
		});

	 }

	</script>
@endpush
