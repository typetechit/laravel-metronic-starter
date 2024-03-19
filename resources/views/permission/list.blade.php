@extends('layouts.main')
@section('title')
    CLP | Permissions
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item text-muted">Permissions</li>
@endsection
@section('styles')
    <style>
        .icon-btn {
            background: none !important;
            border: none !important;
            padding: 0 !important;
            cursor: pointer !important;
        }

        .icon-btn:hover, .icon-btn:focus {
            background-color: none !important;
            border: none !important;
            outline: none !important;
        }

        .icon-btn i {
            font-size: 24px !important;
        }
    </style>
@endsection
@section('content')

<!--begin::Card-->
<div class="card">
	<!--begin::Card header-->
	<div class="card-header border-0 pt-6">
		<!--begin::Card title-->
		<div class="card-title">
			<!--begin::Search-->
			<div class="d-flex align-items-center position-relative my-1">
				<i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
					<span class="path1"></span>
					<span class="path2"></span>
				</i>
				<input type="text" data-kt-user-table-filter="search" id="permissionsSearchInput" class="form-control form-control-solid w-250px ps-13 datatable-search" placeholder="Search permissions" />
			</div>
			<!--end::Search-->
		</div>
		<!--begin::Card title-->
		<!--begin::Card toolbar-->
		<div class="card-toolbar">
			<!--begin::Toolbar-->
			<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
				<!--begin::Add user-->
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_permission">
				<i class="ki-duotone ki-plus fs-2"></i>Add permission</button>
				<!--end::Add user-->
			</div>
			<!--end::Toolbar-->
			<!--begin::Group actions-->
			<div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
				<div class="fw-bold me-5">
				<span class="me-2" data-kt-user-table-select="selected_count"></span>Selected</div>
				<button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
			</div>
            <!--start::Modal - Add task-->
            @include('Modals.add-permission')
            {{-- @include('admin.modals.view-permission') --}}
            @include('Modals.edit-permission')
			<!--end::Modal - Add task-->
		</div>
		<!--end::Card toolbar-->
	</div>
	<!--end::Card header-->
	<!--begin::Card body-->
	<div class="card-body table-responsive py-4">
		<!--begin::Table-->
		{{-- <table class="table align-middle table-striped table-row-bordered gy-5 gs-7 datatable" id="clp_table_permission">
			<thead>
				<tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0 text-gray-800">
					<th class="w-10px pe-2">
						<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
							<input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#clp_table_permission .form-check-input" value="1" />
						</div>
					</th>
					<th class="min-w-200px text-center">names</th>
					<th class="text-end min-w-150px">Actions</th>
				</tr>
			</thead>
			<tbody class="text-gray-600 fw-semibold">
            @foreach ($permissions as $key => $permission)
                <tr>
					<td>
						<div class="form-check form-check-sm form-check-custom form-check-solid">
							<input class="form-check-input" type="checkbox" value={{ $key + 1 }} />
						</div>
					</td>
					<td class="text-center" >{{ $permission->name }}</td>
					<td class="text-end">
						<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" onclick="populateModalEditData('{{ $permission->id }}')">
                            <i class="ki-duotone ki-pencil fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </a>
                        <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" onclick="showConfirmationDialog('status', function() { handleDelete('{{ $permission->id }}'); })">
                            <i class="ki-duotone ki-trash fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                                <span class="path5"></span>
                            </i>
                        </a>
						<form id="deletePermission"  action="" method="post" class="d-none">
							@csrf
							@method('delete')
						</form>
					</td>
				</tr>
            @endforeach
			</tbody>
		</table> --}}

        <table id="kt_datatable_complex_header" class="datatable table table-striped table-row-bordered gy-5 gs-7 border rounded w-100">
            <thead>
                <tr class="fw-bold fs-6 text-gray-800 px-7">
                    <th rowspan="2" class="text-center align-middle border-bottom border-end w-200px">Name</th>
                    <th colspan={{ count($roles) }} class="text-center border-bottom">Roles</th>
                    <th rowspan="2" class="text-center align-middle border-bottom border-start w-200px">Action</th>
                </tr>
                <tr class="fw-bold fs-6 text-gray-800 px-7">
                    @foreach ($roles as $key => $role)
                        <th class="text-center">{{ $role->name }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $key => $permission)
                    <tr>
                        <td class="text-center">{{ $permission->name }}</td>
                        {{-- @foreach ($roles as $role)
                            @if($permission->roles->contains('id', $role->id))
                                <td class="text-success text-center">✔️</td>
                            @else
                                <td class="text-danger text-center">❌</td>
                            @endif
                        @endforeach --}}
                        @foreach ($roles as $role)
                            <td class="text-center">
                                @if($permission->roles->contains('id', $role->id))
                                    <!-- Form to revoke a role -->
                                    <form method="GET" action="{{ url('revoke-permission/' . $permission->id . '/roles/' . $role->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-icon btn-success icon-btn">
                                            <i class="fas fa-check-circle" style="color: green"></i> <!-- Use your preferred 'remove' icon -->
                                        </button>
                                    </form>
                                @else
                                    <!-- Form to assign a role -->
                                    <form method="GET" action="{{ url('add-permission/' . $permission->id . '/roles/' . $role->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-icon btn-danger icon-btn">
                                            <i class="fas fa-times-circle" style="color: red"></i> <!-- Use your preferred 'add' icon -->
                                        </button>
                                    </form>
                                @endif
                            </td>
                        @endforeach
                        <td class="text-center">
                            <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" onclick="populateModalEditData('{{ $permission->id }}')">
                                <i class="ki-duotone ki-pencil fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </a>
                            <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" onclick="showConfirmationDialog('status', function() { handleDelete('{{ $permission->id }}'); })">
                                <i class="ki-duotone ki-trash fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                    <span class="path5"></span>
                                </i>
                            </a>
                            <form id="deletePermission"  action="" method="post" class="d-none">
                                @csrf
                                @method('delete')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
		<!--end::Table-->
	</div>
	<!--end::Card body-->
</div>
<!--end::Card-->

<script>
	let permissions = {!! json_encode($permissions) !!};

	function populateModalEditData(permissionId){
		const permission = permissions.find(permission => permission.id == permissionId);
		
		if(permission){
			$('#edit-permission-id').val(permission.id);
			$('#edit-permission-title').val(permission.name);

			$('#kt_modal_edit_permission_form').attr('action', 'permissions/' + permission.id);
			$('#kt_modal_edit_permission').modal('show');
		}
	}
</script>

<script>
	function handleDelete(newsId) {
		$('#deletePermission').attr('action', 'permissions/' + newsId);
		var deleteForm = $('#deletePermission');

		// Submit the form
		deleteForm.submit();
    }
</script>
		
@endsection