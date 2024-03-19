@extends('layouts.main')
@section('title')
    CLP | Roles
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item text-muted">Roles</li>
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
				<input type="text" data-kt-user-table-filter="search" id="rolesSearchInput" class="form-control form-control-solid w-250px ps-13 datatable-search" placeholder="Search roles" />
			</div>
			<!--end::Search-->
		</div>
		<!--begin::Card title-->
		<!--begin::Card toolbar-->
		<div class="card-toolbar">
			<!--begin::Toolbar-->
			<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
				<!--begin::Add user-->
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_role">
				<i class="ki-duotone ki-plus fs-2"></i>Add Role</button>
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
            @include('Modals.add-role')
            {{-- @include('admin.modals.view-role') --}}
            @include('Modals.edit-role')
			<!--end::Modal - Add task-->
		</div>
		<!--end::Card toolbar-->
	</div>
	<!--end::Card header-->
	<!--begin::Card body-->
	<div class="card-body py-4">
		<!--begin::Table-->
		<table class="table align-middle table-row-dashed datatable fs-6 gy-5" id="clp_table_role">
			<thead>
				<tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0 text-gray-800">
					<th class="w-10px pe-2">
						<div class="form-check form-check-sm form-check-custom form-check-solid me-3">
							<input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#clp_table_role .form-check-input" value="1" />
						</div>
					</th>
					<th class="min-w-200px text-center">names</th>
					<th class="text-end min-w-150px">Actions</th>
				</tr>
			</thead>
			<tbody class="text-gray-600 fw-semibold">
            @foreach ($roles as $key => $role)
                <tr>
					<td>
						<div class="form-check form-check-sm form-check-custom form-check-solid">
							<input class="form-check-input" type="checkbox" value={{ $key + 1 }} />
						</div>
					</td>
					<td class="text-center" >{{ $role->name }}</td>
					<td class="text-end">
						<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal" onclick="populateModalEditData('{{ $role->id }}')">
							<i class="ki-duotone ki-pencil fs-2">
								<span class="path1"></span>
								<span class="path2"></span>
							</i>
						</a>
						<a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" onclick="showConfirmationDialog('status', function() { handleDelete('{{ $role->id }}'); })">
							<i class="ki-duotone ki-trash fs-2">
								<span class="path1"></span>
								<span class="path2"></span>
								<span class="path3"></span>
								<span class="path4"></span>
								<span class="path5"></span>
							</i>
						</a>
						<form id="deleteRole"  action="" method="post" class="d-none">
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
	let roles = {!! json_encode($roles) !!};

	function populateModalEditData(roleId){
		const role = roles.find(role => role.id == roleId);
		
		if(role){
			$('#edit-role-id').val(role.id);
			$('#edit-role-title').val(role.name);

			$('#kt_modal_edit_role_form').attr('action', 'roles/' + role.id);
			$('#kt_modal_edit_role').modal('show');
		}
	}
</script>

<script>
	function handleDelete(newsId) {
		$('#deleteRole').attr('action', 'roles/' + newsId);
		var deleteForm = $('#deleteRole');

		// Submit the form
		deleteForm.submit();
    }
</script>
		
@endsection