@extends('admin.master')

@section('title')
Pre-Costing | ERP
@endsection

@section('content')

{{-- <!-- কিছু স্টাইল (ঐচ্ছিক) -->
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
        }
        input {
            width: 100%;
            padding: 5px;
        }
    </style>
</head>
<body>

    <h2>আইটেম ইনপুট ফর্ম</h2>

    <form action="{{ route('item.save') }}" method="POST">
        @csrf
        <table border="1">
            <thead>
                <tr>
                    <th>আইটেম নাম</th>
                    <th>পরিমাণ</th>
                    <th>দর</th>
                </tr>
            </thead>
            <tbody id="item-rows">
                <tr class="item-row">
                    <td><input type="text" name="item_name[]" class="form-control item-name" /></td>
                    <td><input type="number" name="quantity[]" class="form-control quantity" /></td>
                    <td><input type="number" name="rate[]" class="form-control rate" /></td>
                </tr>
            </tbody>
        </table>

        <br>
        <button type="submit">সাবমিট করুন</button>
    </form>

    
    <div>
      <table id="item-table" class="table">
        <thead>
            <tr>
                <th>আইটেম নাম</th>
                <th>পরিমাণ</th>
                <th>দর</th>
            </tr>
        </thead>
        <tbody id="item-rows">
            <tr class="item-row">
                <td><input type="text" name="item_name[]" class="form-control item-name" /></td>
                <td><input type="number" name="quantity[]" class="form-control quantity" /></td>
                <td><input type="number" name="rate[]" class="form-control rate" /></td>
            </tr>
        </tbody>
      </table>
    </div>


    <script>
      $(document).on('blur', '.item-row:last input', function () {
          let empty = false;

          // শেষ রো-এর সব ইনপুট চেক করুন পূর্ণ হয়েছে কিনা
          $('.item-row:last input').each(function () {
              if ($(this).val() === '') {
                  empty = true;
              }
          });

          // যদি সব ইনপুট পূর্ণ থাকে, তাহলে নতুন ফাঁকা রো যোগ করুন
          if (!empty) {
              let newRow = $('.item-row:last').clone(); // শেষ রো ক্লোন করুন
              newRow.find('input').val(''); // ইনপুট ক্লিয়ার করুন
              $('#item-rows').append(newRow); // নতুন রো টেবিলে যুক্ত করুন
          }
      });
    </script>

    <script>
        // যখন শেষ রো-এর ইনপুট থেকে ফোকাস সরায়
        $(document).on('blur', '.item-row:last input', function () {
            let isFilled = true;

            // শেষ রো-এর সব ইনপুট পূর্ণ কিনা যাচাই
            $('.item-row:last input').each(function () {
                if ($(this).val().trim() === '') {
                    isFilled = false;
                }
            });

            // যদি পূর্ণ হয়, নতুন ফাঁকা রো যুক্ত করুন
            if (isFilled) {
                let newRow = $('.item-row:last').clone();
                newRow.find('input').val('');
                $('#item-rows').append(newRow);
            }
        });
    </script> --}}


    <div class="container mt-5">
      <h2>Item List</h2>
      
      <!-- Button to open modal -->
      <button class="btn btn-primary mb-3 m-0" data-toggle="modal" data-target="#addItemModal">নতুন আইটেম যোগ করুন</button>

      <!-- Success Message -->
      <div id="successMsg" class="alert alert-success d-none">{{Session::get('message')}}</div>

      <!-- Items Table -->
      <ul class="list-group" id="itemList">
        @php
          $i = 1;
        @endphp
        @foreach ($items as $item)
          <li class="list-group-item">{{ $i++ }} - {{ $item->item_name }} - {{ $item->rate }}</li>
        @endforeach
      </ul>

    <table class="table table-striped border">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Item Name</th>
          <th scope="col">Item Quantity</th>
          <th scope="col">Item Rate</th>
        </tr>
      </thead>
      <tbody>
        @php
          $i = 1;
        @endphp
        @foreach ($items as $item)
        <tr>
          <th scope="row">{{ $i++ }}</th>
          <td>{{ $item->item_name }}</td>
          <td>{{ $item->quantity }}</td>
          <td>{{ $item->rate }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

<!-- Modal -->
<div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="addItemModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="itemForm" method="POST" action="{{ route('items.store') }}">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">নতুন আইটেম যোগ করুন</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label>নাম</label>
            <input type="text" name="item_name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>বর্ণনা</label>
           <input type="number" name="quantity" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>বর্ণনা</label>
           <input type="number" name="rate" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">সংরক্ষণ</button>
        </div>
      </form>
    </div>
  </div>
</div>



{{-- <script>
  console.log('Blade loaded pre');
  $(document).ready(function () {
    $('#itemForm').on('submit', function (e) {
      e.preventDefault();

      let formData = {
        item_name: $('input[name="item_name"]').val(),
        quantity: $('input[name="quantity"]').val(),
        rate: $('input[name="rate"]').val(),
        _token: $('meta[name="csrf-token"]').attr('content')
      };

      console.log('Sending Data:', formData); // Add this

      $.ajax({
        url: "{{ route('items.store') }}",
        method: "POST",
        data: formData,
        success: function (response) {
          console.log('Response:', response); // Check this
          $('#addItemModal').modal('hide');
          $('#successMsg').removeClass('d-none').text('আইটেম সফলভাবে যোগ হয়েছে!');

          // নতুন আইটেম তালিকায় যুক্ত করা
          $('#itemList').append(`<li class="list-group-item">${response.item_name} - ${response.rate}</li>`);

          // ফর্ম রিসেট
          $('#itemForm')[0].reset();
        },
        error: function (xhr) {
          console.error('Error:', xhr.responseText); // খুব গুরুত্বপূর্ণ
          alert("সমস্যা হয়েছে! অনুগ্রহ করে আবার চেষ্টা করুন।");
        }
      });
    });
  });
  console.log('Blade loaded post');
</script> --}}

@endsection