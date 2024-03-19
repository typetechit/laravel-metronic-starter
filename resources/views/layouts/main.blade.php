<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href=""/>
		<title>@yield('title')</title>
		<meta charset="utf-8" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="description" content="The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Metronic - Bootstrap Admin Template, HTML, VueJS, React, Angular. Laravel, Asp.Net Core, Ruby on Rails, Spring Boot, Blazor, Django, Express.js, Node.js, Flask Admin Dashboard Theme & Template" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Keenthemes | Metronic" />
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href={{ asset('assets/media/logos/favicon.ico') }} />
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Vendor Stylesheets(used for this page only)-->
		<link href={{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }} rel="stylesheet" type="text/css" />
		<link href={{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }} rel="stylesheet" type="text/css" />
		<!--end::Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href={{ asset('assets/plugins/global/plugins.bundle.css') }} rel="stylesheet" type="text/css" />
		<link href={{ asset('assets/css/style.bundle.css') }} rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href={{ asset('css/custom.css') }}>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

		<!--Sweetalert-->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
		<!--end::Global Stylesheets Bundle-->
		<script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>
		@yield('styles')
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::App-->
		<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
			<!--begin::Page-->
			<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
				<!--begin::Header-->
				@include('layouts.header')
				<!--end::Header-->
				<!--begin::Wrapper-->
				<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
					<!--begin::Sidebar-->
					@include('layouts.sidebar')
					<!--end::Sidebar-->
					<!--begin::Main-->
					<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
						<!--begin::Content wrapper-->
						<div class="d-flex flex-column flex-column-fluid">
							<!--begin::Toolbar-->
							<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
								<!--begin::Toolbar container-->
								<div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
									<!--begin::Page title-->
									<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
										<!--begin::Title-->
										<!--end::Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
											<!--begin::Item-->
											<li class="breadcrumb-item text-muted">
												<a href="{{route('dashboard')}}" class="text-muted text-hover-primary">Dashboard</a>
											</li>
											<!--end::Item-->
											<!--begin::Item-->
											<li class="breadcrumb-item">
												<span class="bullet bg-gray-400 w-5px h-2px"></span>
											</li>
											<!--end::Item-->
											<!--begin::Item-->
											@yield('breadcrumb')
											<!--end::Item-->
										</ul>
										<!--end::Breadcrumb-->
									</div>
									<!--end::Page title-->
									<!--begin::Actions-->
									{{-- <div class="d-flex align-items-center gap-2 gap-lg-3">
										<!--begin::Secondary button-->
										<a href="#" class="btn btn-sm fw-bold btn-secondary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Rollover</a>
										<!--end::Secondary button-->
										<!--begin::Primary button-->
										<a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target">Add Target</a>
										<!--end::Primary button-->
									</div> --}}
									<!--end::Actions-->
								</div>
								<!--end::Toolbar container-->
							</div>
							<!--end::Toolbar-->
							<!--begin::Content-->
							<div id="kt_app_content" class="app-content flex-column-fluid">
								<!--begin::Content container-->
								<div id="kt_app_content_container" class="app-container container-fluid">
									@if(session('success'))
										<!--begin::Alert-->
										<div class="alert alert-dismissible bg-light-success border border-success d-flex flex-column flex-sm-row p-5 mb-10">
											<!--begin::Icon-->
											<i class="ki-duotone ki-search-list fs-2hx text-success me-4 mb-5 mb-sm-0"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
											<!--end::Icon-->

											<!--begin::Wrapper-->
											<div class="d-flex flex-column pe-0 pe-sm-10">
												<!--begin::Title-->
												<h5 class="mb-1">{{ session('success') }}</h5>
												<!--end::Title-->
											</div>
											<!--end::Wrapper-->

											<!--begin::Close-->
											<button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
												<i class="ki-duotone ki-cross fs-1 text-success"><span class="path1"></span><span class="path2"></span></i>
											</button>
											<!--end::Close-->
										</div>
										<!--end::Alert-->
									@endif
									@if(session('error'))
										<!--begin::Alert-->
										<div class="alert alert-dismissible bg-light-danger border border-danger d-flex flex-column flex-sm-row p-5 mb-10">
											<!--begin::Icon-->
											<i class="ki-duotone ki-search-list fs-2hx text-success me-4 mb-5 mb-sm-0"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
											<!--end::Icon-->

											<!--begin::Wrapper-->
											<div class="d-flex flex-column pe-0 pe-sm-10">
												<!--begin::Title-->
												<h5 class="mb-1">{{ session('error') }}</h5>
												<!--end::Title-->
											</div>
											<!--end::Wrapper-->

											<!--begin::Close-->
											<button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
												<i class="ki-duotone ki-cross fs-1 text-success"><span class="path1"></span><span class="path2"></span></i>
											</button>
											<!--end::Close-->
										</div>
										<!--end::Alert-->
									@endif
									<!--begin::Row-->
									@yield('content')
									<!--end::Row-->
								</div>
								<!--end::Content container-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Content wrapper-->
						<!--begin::Footer-->
						@include('layouts.footer')
						<!--end::Footer-->
					</div>
					<!--end:::Main-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::App-->

		<!--begin::Javascript-->
		<script>var hostUrl = "{{ asset('/assets/metronic/assets') }}"</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->

		<script src={{ asset('assets/plugins/global/plugins.bundle.js') }}></script>
		<script src={{ asset('assets/js/scripts.bundle.js') }}></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Vendors Javascript(used for this page only)-->
		<script src={{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}></script>
		<!--CKEditor Build Bundles:: Only include the relevant bundles accordingly-->
		<script src={{ asset('assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}></script>
		<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
		<script src={{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"> </script>

		<script>
			const editors = {};
			$(document).ready(function() {
				// Initialize DataTable
				var table = $('.datatable').DataTable({
					"lengthMenu": [5, 10, 25, 50],
					"order": [],
					"pageLength": 10,
					"language": {
						"lengthMenu": "Show _MENU_", // Customizing the length menu
					},
				});

				// Initialize Datepicker
				$(".flatpickr").flatpickr({
					// enableTime: true,
					dateFormat: "d F, Y",
				});

				// Initialize CKEditor
				// Get all elements with class 'textarea-ck'
				const textAreas = document.querySelectorAll('.textarea-ck');

				// Loop through each textarea and initialize ClassicEditor
				textAreas.forEach((textArea, index) => {
					const id = textArea.getAttribute('id');
					ClassicEditor
						.create(textArea, {
							plugins: [ 'Essentials', 'Paragraph', 'Heading', 'List', 'Bold', 'Italic', 'Table', 'Link' ], // List other plugins you want to keep
							removePlugins: ['Image']
						})
						.then(editor => {
							editors[id] = editor;
						})
						.catch(error => {
							console.error(error);
						});
				});

				// Add event listener for keyup on search input
				$('.datatable-search').on('keyup', function() {
					table.search(this.value).draw();
				});

				// Add form validataion
				$(".form-validate").validate(
				{
					ignore: [],
					debug: false,
					rules: {
						cktext:{
							required: function()
							{
								CKEDITOR.instances.cktext.updateElement();
							},
							minlength:10
						}
					},
					messages:{
						cktext:{
							required:"Please enter Text",
							minlength:"Please enter 10 characters"
						}
					}
				});
			});
		</script>
		<script>
			const assetUrl = "{{ asset('') }}";
			function showConfirmationDialog(action, callback) {
				Swal.fire({
					title: 'Are you sure?',
					text: `You are about to perform ${action} action.`,
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Yes, proceed!'
				}).then((result) => {
					if (result.isConfirmed) {
						// Execute the callback function if provided
						if (typeof callback === 'function') {
							callback();
						}
					}
				});
			}

			function removePublicSegment(imageUrl) {
				const newString = assetUrl + imageUrl.replace("public/", "");
				return newString;
			}

			function generateSlug(title) {
				return title.trim().toLowerCase()
					.replace(/\s+/g, '-')           // Replace spaces with -
					.replace(/[^\w\-]+/g, '')       // Remove all non-word chars
					.replace(/\-\-+/g, '-')         // Replace multiple - with single -
					.replace(/^-+/, '')             // Trim - from start of text
					.replace(/-+$/, '');            // Trim - from end of text
			}
    	</script>
		<!--end::Vendors Javascript-->
		<!--begin::Custom Javascript(used for this page only)-->

		<!--end::Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>
