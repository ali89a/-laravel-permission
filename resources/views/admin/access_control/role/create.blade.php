@extends('admin.layouts.master')
@section('title')
Roles
@endsection
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-1">

        </div>
    </div><!-- /.container-fluid -->
</section>



<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Horizontal Form -->
                <div class="card card-primary">
                    <div class="card-header bg-light">

                        <h3 class="card-title" style="color:#115548;">Add Roles</h3>
                        <div class="card-tools">
                            <a href="{{route('user.roles.index')}}"><button class="btn btn-sm btn-primary"><i class="fa fa-list" aria-hidden="true"></i> &nbsp;See List</button></a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    {!! BootForm::open(['model' => $model, 'store' => 'user.roles.store', 'update' => 'user.roles.update','class'=>'form-horizontal']);
                    !!}

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                {!! BootForm::text('name', 'Roles Name (Must be unique)', null,
                                ['placeholder'=>'Enter name','required'=>'required'] ) !!}
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="name">Permissions</label>

                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="checkPermissionAll" value="1">
                                        <label class="form-check-label" for="checkPermissionAll">All</label>
                                    </div>
                                    <hr>
                                    @php $i = 1; @endphp
                                    @foreach ($permission_groups as $group)
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="{{ $i }}Management" value="{{ $group->name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)">
                                                <label class="form-check-label" for="checkPermission">{{ $group->name }}</label>
                                            </div>
                                        </div>

                                        <div class="col-9 role-{{ $i }}-management-checkbox">
                                            @php
                                            $permissions = App\Models\User::getpermissionsByGroupName($group->name);
                                            $j = 1;
                                            @endphp
                                            @foreach ($permissions as $permission)
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="permissions[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
                                                <label class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                                            </div>
                                            @php $j++; @endphp
                                            @endforeach
                                            <br>
                                        </div>

                                    </div>
                                    @php $i++; @endphp
                                    @endforeach


                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:20px;">
                                {!! BootForm::submit('Submit',['class'=>'btn btn-primary']); !!}
                            </div>
                        </div>
                    </div>
                    {!! Bootform::close() !!}

                </div>
                <!-- /.card -->
            </div>
            <div class="col-2"></div>
        </div>
        <!-- /.row -->

    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
@push('script')

<script>
    /**
         * Check all the permissions
         */
         $("#checkPermissionAll").click(function(){
             if($(this).is(':checked')){
                 // check all the checkbox
                 $('input[type=checkbox]').prop('checked', true);
             }else{
                 // un check all the checkbox
                 $('input[type=checkbox]').prop('checked', false);
             }
         });
         function checkPermissionByGroup(className, checkThis){
            const groupIdName = $("#"+checkThis.id);
            const classCheckBox = $('.'+className+' input');
            if(groupIdName.is(':checked')){
                 classCheckBox.prop('checked', true);
             }else{
                 classCheckBox.prop('checked', false);
             }
            implementAllChecked();
         }
         function checkSinglePermission(groupClassName, groupID, countTotalPermission) {
            const classCheckbox = $('.'+groupClassName+ ' input');
            const groupIDCheckBox = $("#"+groupID);
            // if there is any occurance where something is not selected then make selected = false
            if($('.'+groupClassName+ ' input:checked').length == countTotalPermission){
                groupIDCheckBox.prop('checked', true);
            }else{
                groupIDCheckBox.prop('checked', false);
            }
            implementAllChecked();
         }
         function implementAllChecked() {
             const countPermissions = {{ count($all_permissions) }};
             const countPermissionGroups = {{ count($permission_groups) }};
            //  console.log((countPermissions + countPermissionGroups));
            //  console.log($('input[type="checkbox"]:checked').length);
             if($('input[type="checkbox"]:checked').length >= (countPermissions + countPermissionGroups)){
                $("#checkPermissionAll").prop('checked', true);
            }else{
                $("#checkPermissionAll").prop('checked', false);
            }
         }
</script>
@endpush