<form id="itemForm">
  <input type="hidden" name="id" id="item_id">
  <div class="form-group">
    <label>আইটেম নাম</label>
    <input type="text" name="name" id="item_name" class="form-control">
  </div>
  <button type="submit" class="btn btn-save"><i class="fa fa-save"></i> সংরক্ষণ</button>
</form>

<table id="itemTable" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>ID</th><th>Name</th><th>Status</th><th>Action</th>
    </tr>
  </thead>
</table>

<script>
$(document).ready(function(){
    let table = $('#itemTable').DataTable({
        processing:true,
        serverSide:true,
        ajax: "{{ route('item.list') }}",
        columns:[
            {data:'id',name:'id'},
            {data:'name',name:'name'},
            {data:'status',name:'status'},
            {data:'action',name:'action',orderable:false,searchable:false}
        ]
    });

    $('#itemForm').submit(function(e){
        e.preventDefault();
        $.ajax({
            url:"{{ route('item.store') }}",
            type:"POST",
            data:$(this).serialize(),
            success:function(res){
                Swal.fire('সফল!',res.message,'success');
                $('#itemForm')[0].reset();
                $('#item_id').val('');
                table.ajax.reload();
            }
        });
    });
});

function editItem(id){
    $.get("{{ url('company/item/edit') }}/"+id,function(data){
        $('#item_id').val(data.id);
        $('#item_name').val(data.name);
    });
}

function deleteItem(id){
    Swal.fire({
        title: 'আপনি কি নিশ্চিত?',
        text: "ডেটা মুছে ফেলা হবে!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'হ্যাঁ, মুছুন!'
    }).then((result)=>{
        if(result.isConfirmed){
            $.ajax({
                url:"{{ url('company/item/delete') }}/"+id,
                type:"DELETE",
                data:{_token:'{{ csrf_token() }}'},
                success:function(res){
                    Swal.fire('Deleted!',res.message,'success');
                    $('#itemTable').DataTable().ajax.reload();
                }
            });
        }
    });
}
</script>
