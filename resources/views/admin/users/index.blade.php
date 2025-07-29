{{-- @extends('admin.master')

@section('title')
Users | ERP
@endsection

@section('content')

<div class="container">
    <h3>User List</h3>
    <table class="table table-bordered" id="userTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(function () {
        $('#userTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('users.index') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });
</script>

@endsection --}}


@extends('admin.master')

@section('content')
<div class="container mt-5">
    <h3 class="mb-4">ইউজার তালিকা (Add/Edit একই ফর্মে)</h3>

    <form id="userForm">
        <input type="hidden" name="id" id="userId">
        <div class="mb-3">
            <label>নাম</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="নাম লিখুন">
        </div>
        <div class="mb-3">
            <label>ইমেইল</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="ইমেইল লিখুন">
        </div>
        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> সংরক্ষণ করুন</button>
    </form>

    <hr class="my-4">

    <table class="table table-bordered table-striped" id="userTable">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>নাম</th>
                <th>ইমেইল</th>
                <th>তারিখ</th>
                <th>অ্যাকশন</th>
            </tr>
        </thead>
    </table>
</div>
@endsection

@push('scripts')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

<script>
    let table;
    $(function () {
        table = $('#userTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('users.data') }}',
            columns: [
                {data: 'id'},
                {data: 'name'},
                {data: 'email'},
                {data: 'created_at'},
                {data: 'action', orderable: false, searchable: false}
            ]
        });

        $('#userForm').on('submit', function (e) {
            e.preventDefault();
            let id = $('#userId').val();
            let url = id ? `/users/update/${id}` : '{{ route('users.store') }}';
            $.ajax({
                url: url,
                method: 'POST',
                data: $(this).serialize(),
                success: function (res) {
                    alert(res.message);
                    $('#userForm')[0].reset();
                    $('#userId').val('');
                    table.ajax.reload();
                }
            });
        });

        $(document).on('click', '.editBtn', function () {
            let id = $(this).data('id');
            $.get(`/users/edit/${id}`, function (data) {
                $('#userId').val(data.id);
                $('#name').val(data.name);
                $('#email').val(data.email);
            });
        });

        $(document).on('click', '.deleteBtn', function () {
            if (!confirm('আপনি কি নিশ্চিত মুছতে চান?')) return;
            let id = $(this).data('id');
            $.ajax({
                url: `/users/${id}`,
                method: 'DELETE',
                data: {_token: '{{ csrf_token() }}'},
                success: function (res) {
                    alert(res.message);
                    table.ajax.reload();
                }
            });
        });
    });
</script>
@endpush
