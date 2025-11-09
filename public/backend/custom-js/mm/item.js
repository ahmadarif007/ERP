/* ================
   Item JS Init
   ================ */
window.initItem = function() {

    // init DataTable প্রথমবার লোডের সময়
    $('#itemTable').DataTable({
        dom: 'Bfrtip',
        buttons: ['csv', 'excel', 'pdf', 'print'],
        responsive: true
    });

    // form validation + submit
    $('#itemForm').validate({
        rules: {
            item_code: { required: true },
            item_name: { required: true },
            // item_short_name: { required: true }
        },
        messages: {
            item_code: 'কোড দিন',
            item_name: 'নাম দিন',
            // item_short_name: 'সংক্ষিপ্ত নাম দিন'
        },
        highlight: function(el) { $(el).addClass('is-invalid'); },
        unhighlight: function(el) { $(el).removeClass('is-invalid'); },
        errorPlacement: function(error, element) {
            error.addClass('text-danger small');
            error.insertAfter(element);
        },
        submitHandler: function(form) {
            let id = $('#item_id').val();
            let url = id ? `/company/items/update/${id}` : '/company/items/store';
            $.post(url, $(form).serialize())
                .done(function(res) {
                    Swal.fire({ icon: 'success', title: res.success, toast: true, position: 'top-end', timer: 2000, showConfirmButton: false });
                    form.reset();
                    reloadItemTable(); // ✅ Table reload call

                    // Reset form and buttons
                    $('#updateBtn, #cancelBtn').addClass('d-none');
                    $('#saveBtn, #reloadBtn, #refreshBtn').removeClass('d-none');
                })
                .fail(function(xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        let msg = '';
                        $.each(errors, function(k, v){ msg += v + '<br>' });
                        Swal.fire({ icon: 'error', title: 'ভুল হয়েছে', html: msg });
                    } else {
                        Swal.fire({ icon: 'error', title: 'Error', text: 'অজানা ত্রুটি' });
                    }
                });
            return false;
        }
    });

    // 🔄 Table reload function
    window.reloadItemTable = function() {
        $.get('/company/items/table') // শুধু table body রিটার্ন করবে
            .done(function(html) {
                $('#itemTable').DataTable().destroy(); // পুরনো DataTable ধ্বংস
                $('#itemTableArea').html(html); // নতুন HTML বসানো
                $('#itemTable').DataTable({
                    dom: 'Bfrtip',
                    buttons: ['csv', 'excel', 'pdf', 'print'],
                    responsive: true
                });
            })
            .fail(function() {
                Swal.fire('Error','টেবিল রিলোড হয়নি','error');
            });
    };

    // edit action
    window.editItem = function(id) {
        $.get(`/company/items/edit/${id}`)
            .done(function(data) {
                $('#item_id').val(data.id);
                $('#item_code').val(data.item_code);
                $('#item_name').val(data.item_name);
                $('#item_short_name').val(data.item_short_name);
                $('#item_status').val(data.item_status);
                
                $('#saveBtn, #reloadBtn, #refreshBtn').addClass('d-none');
                $('#updateBtn, #cancelBtn').removeClass('d-none');
            })
            .fail(function() { Swal.fire('Error','ডাটা লোড করা যায়নি','error') });
    };

    // delete action
    window.deleteItem = function(id) {
        Swal.fire({
            title: 'আপনি কি নিশ্চিত?',
            text: "ডেটা স্থায়ীভাবে মুছে যাবে!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'হ্যাঁ, ডিলিট কর',
            cancelButtonText: 'না, বাতিল'
        }).then((res) => {
            if (res.isConfirmed) {
                $.ajax({
                    url: `/company/items/delete/${id}`,
                    type: 'DELETE',
                    data: { _token: "{{ csrf_token() }}" }
                }).done(function(r) {
                    Swal.fire({ icon: 'success', title: r.success, toast: true, position: 'top-end', timer: 1500, showConfirmButton: false });
                    reloadItemTable(); // ✅ delete এর পর reload
                }).fail(function(){ Swal.fire('Error','ডিলিট হয়নি','error') });
            }
        });
    };

    // ==================================== All button action ==========================================

    // update action
    $('#updateBtn').off('click').on('click', function() {
        e.preventDefault();
        $('#itemForm').submit();
    });

    // cancel action
    $('#cancelBtn').off('click').on('click', function() {
        $('#itemForm')[0].reset();
        $('#item_id').val('');

        $('#updateBtn, #cancelBtn').addClass('d-none');
        $('#saveBtn, #reloadBtn, #refreshBtn').removeClass('d-none');

        $('.is-invalid').removeClass('is-invalid');
        $('.text-danger').remove();
    });

    // resset action
    $('#refreshBtn').on('click',function () {
        $('#itemForm')[0].reset();         // ফর্ম ক্লিয়ার
        $('#item_id').val('');             // হিডেন ফিল্ড ক্লিয়ার
        $('#saveBtn, #reloadBtn, #refreshBtn').removeClass('d-none');
        $('#updateBtn, #cancelBtn').addClass('d-none');
        $('.is-invalid').removeClass('is-invalid'); // Validation ক্লাস রিমুভ
    });

    // reload action
    $('#reloadBtn').on('click', function () {
        e.preventDefault();
        location.reload(); // এটি পুরো পেজকে রিফ্রেশ করে দেবে
    });

    // Tooltip enable for all buttons with title attribute
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[title]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

};
