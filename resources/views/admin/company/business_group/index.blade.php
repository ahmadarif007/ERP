@extends('admin.master')

@section('title')
Business Group | ERP
@endsection

@section('content')

<div class="container">
    <h2 class="text-center">Add Business Group Info Here </h2>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Add / Edit Form -->
    <div class="panel panel-default">
        <div class="panel-heading">
            {{-- @if(isset($editData))
                Edit Business Group
            @else
                Add Business Group
            @endif --}}
            
            @if(isset($editData)) 
                <button class="btn btn-edit">
                    <i class="fi fi-br-user-pen"></i> Edit Business Group Information
                </button>
            @else 
                <button class="btn btn-save">
                    <i class="fi fi-br-square-plus"></i> Add Business Group Information
                </button>
            @endif
        </div>
        <div class="panel-body">
            @if(isset($editData))
                <form action="{{ route('business-groups.update', $editData->id) }}" method="POST">
            @else
                <form action="{{ route('business-groups.store') }}" method="POST">
            @endif
                @csrf
                <div class="form-group">
                    <label>Group Name:</label>
                    <input type="text" name="group_name" value="{{ old('group_name', $editData->group_name ?? '') }}" class="form-control">
                    @error('group_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label>Address:</label>
                    <input type="text" name="group_address" value="{{ old('group_address', $editData->group_address ?? '') }}" class="form-control">
                    @error('group_address') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label>Description:</label>
                    <textarea name="group_description" class="form-control">{{ old('group_description', $editData->group_description ?? '') }}</textarea>
                    @error('group_description') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <button type="submit" class="btn btn-save">
                    @if(isset($editData)) <i class="fi fi-br-rotate-square"></i> Update @else <i class="fi fi-br-disk"></i> Save @endif
                </button>
                @if(isset($editData))
                    <a href="{{ route('business-groups.index') }}" class="btn btn-cancel"><i class="fi fi-br-rectangle-xmark"></i> Cancel</a>
                @endif
            </form>
        </div>
    </div>

    <hr>

    <section>
    <!-- Data Table -->
      <table class="table table-bordered table-striped">
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Group Name</th>
                  <th>Description</th>
                  <th>Address</th>
                  <th width="150">Action</th>
              </tr>
          </thead>
          <tbody>
              @foreach($groups as $group)
                  <tr>
                      <td>{{ $group->id }}</td>
                      <td>{{ $group->gp_name }}</td>
                      <td>{{ $group->gp_description }}</td>
                      <td>{{ $group->gp_address }}</td>
                      <td>
                          <a href="{{ route('business-groups.edit',$group->id) }}" class="btn btn-xs btn-edit">
                              <i class="fi fi-br-pencil"></i> Edit
                          </a>
                          <a href="{{ route('business-groups.destroy',$group->id) }}" class="btn btn-xs btn-delete"
                          onclick="return confirm('Are you sure?')">
                          <i class="fi fi-br-trash"></i> Delete
                          </a>
                      </td>
                  </tr>
              @endforeach
          </tbody>
      </table>
      <!-- Pagination -->
      <div class="text-center">
          {{ $groups->links() }}
      </div>
    </section>

    <section>
        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Data Table With Full Features</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Group Name</th>
                  <th>Description</th>
                  <th>Address</th>
                  <th width="150">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($groups as $group)
                <tr>
                  <td>{{ $group->id }}</td>
                  <td>{{ $group->group_name }}</td>
                  <td>{{ $group->group_description }}</td>
                  <td>{{ $group->group_address }}</td>
                  <td>
                      <a href="{{ route('business-groups.edit',$group->id) }}" class="btn btn-xs btn-edit">
                          <i class="fi fi-br-pencil"></i> Edit
                      </a>
                      <a href="{{ route('business-groups.destroy',$group->id) }}" class="btn btn-xs btn-delete"
                      onclick="return confirm('Are you sure?')">
                      <i class="fi fi-br-trash"></i> Delete
                      </a>
                  </td>
                </tr>
                @endforeach
              </tfoot>
            </table>

            <!-- Pagination -->
            <div class="text-center">
                {{ $groups->links() }}
            </div>
          </div>
          <!-- /.box-body -->
        </div>
    </section>
    <!-- /.content -->


    <div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h3 class="page-header">
                <i class="fa fa-sitemap"></i> Business Groups
                <button id="btnAdd" class="btn btn-success btn-sm pull-right">
                    <i class="fa fa-plus"></i> Add New
                </button>
            </h3>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <table id="businessGroupTable" class="table table-bordered table-striped table-hover" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Description</th>
                        <th style="width:90px;">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

    {{-- <script>
      var table = $('#groupTable').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('business-groups.list') }}",
          columns: [
              { data: 'id', name: 'id' },
              { data: 'name', name: 'name' },
              { data: 'description', name: 'description' },
              { data: 'address', name: 'address' },
              {
                  data: null,
                  orderable: false,
                  searchable: false,
                  render: function (data) {
                      return `
                          <button class="btn btn-xs btn-edit" onclick="editGroup(${data.id})">Edit</button>
                          <button class="btn btn-xs btn-delete" onclick="deleteGroup(${data.id})">Delete</button>
                      `;
                  }
              }
          ]
      });
    </script> --}}


<script>
(function($){
    var table;
    var modal = $('#businessGroupModal');
    var form  = $('#businessGroupForm');
    var modalTitle = $('#businessGroupModalLabel');
    var submitBtn = $('#bgSubmitBtn');
    var idField   = $('#bg_id');

    // CSRF
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });

    // DataTable init
    table = $('#businessGroupTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{{ route('business-groups.data') }}',
            type: 'GET'
        },
        lengthMenu: [5,10,15,20,25,50,100],
        order: [[0,'desc']],
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'group_name'},
            {data: 'address', name: 'group_address', orderable:false, searchable:false},
            {data: 'description', name: 'group_description', orderable:false, searchable:false},
            {data: 'created_at', name: 'created_at'},
            {data: null, orderable:false, searchable:false, render: function(data,type,row){
                return `
                    <button data-id="${row.id}" class="btn btn-xs btn-primary action-btn btnEdit" title="Edit"><i class="fa fa-pencil"></i></button>
                    <button data-id="${row.id}" class="btn btn-xs btn-danger action-btn btnDelete" title="Delete"><i class="fa fa-trash"></i></button>
                `;
            }}
        ]
    });

    // Validation helper
    function displayValidationErrors(errors){
        $.each(errors, function(field, msgs){
            var input = $('[name="'+field+'"]');
            var group = input.closest('.form-group');
            group.addClass('has-error');
            group.append('<span class="help-block">'+msgs[0]+'</span>');
        });
    }

})(jQuery);
</script>

</div>
@endsection