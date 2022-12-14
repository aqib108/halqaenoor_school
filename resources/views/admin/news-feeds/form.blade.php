@extends('admin.layout.app')

@push('header-scripts')
   <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/admin/fontawesome-free/css/all.min.css')}}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{asset('assets/admin/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/admin/dist/css/adminlte.min.css')}}">
  <!-- SummerNote -->
  <link rel="stylesheet" href="{{asset('assets/admin/summernote/summernote-bs4.min.css')}}">
@endpush

@section('content')
@php
	$message = (array)json_decode($row->message);
@endphp
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
		  <div class="container-fluid">
		    <div class="row mb-2">
		      <div class="col-sm-6">
		        <h1 class="m-0">Add News Feeds</h1>
		      </div><!-- /.col -->
		      <div class="col-sm-6">
		        <ol class="breadcrumb float-sm-right">
		          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
		          <li class="breadcrumb-item"><a href="{{ URL('admin/news') }}">News feeds</a></li>
		          <li class="breadcrumb-item active">Add News</li>
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
		          	<div class="col-md-12">
			            <!-- general form elements -->
			            <div class="card card-primary">
			              <div class="card-header">
			                <h3 class="card-title">News Form</h3>
			              </div>
                         @php
						 $title = [];
						 $author_name = [];
						 $location = [];
						 $content = []; 
                         if(!empty($row)){
								$title = (array)json_decode($row->title);
								$author_name = (array)json_decode($row->author_name);
								$location = (array)json_decode($row->location);
								$content = (array)json_decode($row->content);
						 }
						@endphp
			              <!-- /.card-header -->
			              <div class="card-body">
			                <form id="page-form" class="form-horizontal label-left" action="{{ URL('admin/news') }}" enctype="multipart/form-data" method="POST">
			                	{!! csrf_field() !!}

								<input type="hidden" name="action" value="{{$action}}">
			                	<input type="hidden" name="id" value="{{ isset($id) ? $id : '' }}">

								<div class="accordion" id="accordionExample">
									<div class="card">
										<!-- For news  title general  -->
										<div class="card-header" id="title-heading">
											<h2 class="mb-0">
												<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#messagetitle" aria-expanded="true" aria-controls="messagetitle">
													Title
												</button>
											</h2>
										</div>

										<div id="messagetitle" class="collapse" aria-labelledby="message-title-heading" data-parent="#accordionExample">
											<div class="card-body">
												
												<div class="row">
												@foreach($languages as $language)
												
													<div class="col-sm-4">
														<div class="form-group ">
														<label>News Title in {{ $language->name }} <span class="text-red">*</span></label>
													        
														<input type="text" class="form-control" placeholder="Enter Message Title in {{$language->name}} " name="title[{{$language->short_name}}]" value="{{ isset($title[$language->short_name]) ? $title[$language->short_name] : '' }}" required="">
												
														</div>
													</div>
												@endforeach
												</div>
                                            
											</div>
										</div>
										<!-- For Image -->
				                        <!--for author name-->
										<div class="card-header" id="title-heading">
											<h2 class="mb-0">
												<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#newsauthor" aria-expanded="true" aria-controls="messagetitle">
													Author Name
												</button>
											</h2>
										</div>
										<div id="newsauthor" class="collapse" aria-labelledby="message-title-heading" data-parent="#accordionExample">
											<div class="card-body">
											<div class="row">
												@foreach($languages as $language)
												
													<div class="col-sm-4">
														<div class="form-group ">
														<label>Author Name in {{ $language->name }} <span class="text-red">*</span></label>													        
														<input type="text" class="form-control" placeholder="Author Name in {{$language->name}} " name="author_name[{{$language->short_name}}]" value="{{ isset($author_name[$language->short_name]) ? $author_name[$language->short_name] : '' }}" required="">
														</div>
													</div>
												@endforeach
												</div>
											</div>
										</div>
										<!--end of author name-->
										<!--for author name-->
										<div class="card-header" id="title-heading">
											<h2 class="mb-0">
												<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#newslocation" aria-expanded="true" aria-controls="messagetitle">
													Location
												</button>
											</h2>
										</div>
										<div id="newslocation" class="collapse" aria-labelledby="message-title-heading" data-parent="#accordionExample">
											<div class="card-body">
											<div class="row">
												@foreach($languages as $language)
												
													<div class="col-sm-4">
														<div class="form-group ">
														<label>Location in {{ $language->name }} <span class="text-red">*</span></label>        
														<input type="text" class="form-control" placeholder="location in {{$language->name}} " name="location[{{$language->short_name}}]" value="{{ isset($location[$language->short_name]) ? $location[$language->short_name] : '' }}" required="">
														</div>
													</div>
												@endforeach
												</div>
											</div>
										</div>
										<!--end of news location-->
										<!-- For message title general  -->
										<div class="card-header" style="display: none !important" id="title-heading">
											<h2 class="mb-0">
												<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#image" aria-expanded="true" aria-controls="image">
													Image
												</button>
											</h2>
										</div>

										<div id="image" class="collapse"  aria-labelledby="message-title-heading" data-parent="#accordionExample">
											<div class="card-body" >
												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Image <span class="text-red">*</span></label>
													<div class="col-sm-6">
														<input type="File" class="form-control" placeholder="Enter Message Title " id="imageinpt" name="image" value="{{ $row->image }}">
														<p>CEO image: 410*612</p>
													</div>
													<div class="col-sm-2">
														@if($row->image)
														<a href="{{ asset($row->image) }}" target="_blank">
															<img src="{{ asset($row->image) }}" alt="" id="sample_image" width="100" height="100">
														</a>
															<button class="btn btn-sm btn-danger d-block mt-2" id="clear_image" > clear Image</button>
														@else
															<a href="javascrit:void(0)" target="_blank">
															 	<img id="sample_image" src="{{ asset('images/dummy-images/dummy.PNG') }}" alt="your image" width="60" height="60" />
															</a>
															<button class="btn btn-sm btn-danger d-block mt-2" id="clear_image" > clear Image</button>
													  	@endif
													</div>
												</div>

											</div>
										</div>
										<!-- For Message -->
										<div class="card-header" id="title-heading">
											<h2 class="mb-0">
												<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#message" aria-expanded="true" aria-controls="message">
													News Content
												</button>
											</h2>
										</div>

										<div id="message" class="collapse" aria-labelledby="message-heading" data-parent="#accordionExample">
											<div class="card-body">
												<div class="row">
												@foreach($languages as $language)
													<div class="col-sm-4">
														<div class="form-group ">
															<label class="col-form-label">News Content {{$language->name}} <span class="text-red">*</span></label>
																<textarea id="summernote" name="content[{{$language->short_name}}]" required>{{isset($content[$language->short_name])?$content[$language->short_name]:''}}</textarea>
														</div>
													</div>
												@endforeach
												
												</div>

											</div>
										</div>
										<!-- for Gernal -->
										<div class="card-header"  id="short-heading">
											<h2 class="mb-0">
												<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#general" aria-expanded="true" aria-controls="general">
													News Status
												</button>
											</h2>
										</div>
										<div id="general" class="collapse" aria-labelledby="short-heading" data-parent="#accordionExample">
											<div class="card-body">
												<div class="form-group row">
													<label class="col-sm-2 col-form-label">Status</label>
													<div class="col-sm-6">
														<div class="icheck-primary d-inline">
															Active
															<input type="radio" name="status" id="active-radio-status" value="1" {{ ($row->status==1) ? 'checked' : '' }}>
															<label for="active-radio-status">
															</label>
														</div>
														<div class="icheck-primary d-inline">
															In-Active
															<input type="radio" name="status" id="in-active-radio-status" value="0" {{ ($row->status==0) ? 'checked' : '' }}>
															<label for="in-active-radio-status">
															</label>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

			                	<div class="card-body">
				                  	<div class="form-group text-right">
				                  		<div class="col-sm-12">
				                  			<a href="{{ URL('admin/ceomessage') }}" class="btn btn-info" style="margin-right:05px;"> Cancel </a>
				                  			<button type="submit" class="btn btn-primary float-right"> {{ ($action == 'add') ? 'Save' : 'Update' }} </button>
				                  		</div>
				                  	</div>
			                	</div>

			                </form>
			              </div>
			              <!-- /.card-body -->
			            </div>
			            <!-- /.card -->
					</div>
				</div>
			</div>
		</section>
		<!-- Main content -->
	</div>
@endsection

@push('footer-scripts')
  <!-- jQuery -->
	<script src="{{asset('assets/admin/jquery/jquery.min.js')}}"></script>
	<!-- Bootstrap 4 -->
	<script src="{{asset('assets/admin/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
	<!-- jquery-validation -->
	<script src="{{asset('assets/admin/jquery-validation/jquery.validate.min.js')}}"></script>
	<script src="{{asset('assets/admin/jquery-validation/additional-methods.min.js')}}"></script>
	<!-- InputMask -->
	<script src="{{asset('assets/admin/moment/moment.min.js')}}"></script>
	<script src="{{asset('assets/admin/inputmask/jquery.inputmask.min.js')}}"></script>
	<!-- bs-custom-file-input -->
	<script src="{{asset('assets/admin/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
	<!-- AdminLTE App -->
	<script src="{{asset('assets/admin/dist/js/adminlte.min.js')}}"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="{{asset('assets/admin/dist/js/demo.js')}}"></script>
	<!-- SummerNote -->
	<script src="{{asset('assets/admin/summernote/summernote-bs4.min.js')}}"></script>
	<!-- Page specific script -->
	<script>
	  $(function () {
		  	// Summernote
	    	$("textarea[id^='summernote']").summernote({
	    		height: ($(window).height() - 300),
	    	})


		  	$('#page-form').validate({
				ignore: false,
			    rules:
			    {},
			    errorElement: 'span',
			    errorPlacement: function (error, element) {
			      error.addClass('invalid-feedback');
			      element.closest('.form-group').append(error);
			    },
			    highlight: function (element, errorClass, validClass) {
			      $(element).addClass('is-invalid');
			    },
			    unhighlight: function (element, errorClass, validClass) {
			      $(element).removeClass('is-invalid');
			    },
				invalidHandler: function(e,validator)
				{
					// loop through the errors:
					for (var i=0;i<validator.errorList.length;i++){
						// "uncollapse" section containing invalid input/s:
						$(validator.errorList[i].element).closest('.collapse').collapse('show');
					}
				}
			});
		});
	</script>
	<script>
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('input[name="_token"]').val()
		    }
		});

		var toggler = document.getElementsByClassName("caret");
		var i;

		for (i = 0; i < toggler.length; i++) {
		  toggler[i].addEventListener("click", function() {
		    this.parentElement.querySelector(".nested").classList.toggle("active");
		    this.classList.toggle("caret-down");
		  });
		}
		imageinpt.onchange = evt => {
			const [file] = imageinpt.files
			if (file) {
				sample_image.src = URL.createObjectURL(file)
				$('#sample_image').parent().attr('href',URL.createObjectURL(file));
			}
		}
		$('#clear_image').click(function(){
			event.preventDefault();
			$('#imageinpt').val('');
			$('#sample_image').parent().attr('href','https://www.freeiconspng.com/uploads/no-image-icon-6.png');
			$('#sample_image').attr('src','https://www.freeiconspng.com/uploads/no-image-icon-6.png');
		});
	</script>
@endpush
