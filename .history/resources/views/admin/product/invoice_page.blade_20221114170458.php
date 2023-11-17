@extends('admin.app_master')
@section('content')
<style>
   .invoice-box {
   max-width: 100%;
   margin: auto;
   padding: 30px;
   border: 1px solid #eee;
   box-shadow: 0 0 10px rgba(0, 0, 0, .15);
   font-size: 16px;
   line-height: 24px;
   font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
   color: #555;
   }
   .invoice-box table {
   width: 100%;
   line-height: inherit;
   text-align: left;
   }
   .invoice-box table td {
   padding: 5px;
   vertical-align: top;
   }
   .invoice-box table tr td:nth-child(n+2) {
   text-align: right;
   }
   .invoice-box table tr.top table td {
   padding-bottom: 20px;
   }
   .invoice-box table tr.top table td.title {
   font-size: 45px;
   line-height: 45px;
   color: #333;
   }
   .invoice-box table tr.information table td {
   padding-bottom: 40px;
   }
   .invoice-box table tr.heading td {
   background: #eee;
   border-bottom: 1px solid #ddd;
   font-weight: bold;
   }
   .invoice-box table tr.details td {
   padding-bottom: 20px;
   }
   .invoice-box table tr.item td{
   border-bottom: 1px solid #eee;
   }
   .invoice-box table tr.item.last td {
   border-bottom: none;
   }
   .invoice-box table tr.item input {
   padding-left: 5px;
   }
   .invoice-box table tr.item td:first-child input {
   margin-left: -5px;
   width: 100%;
   }
   .invoice-box table tr.total td:nth-child(2) {
   border-top: 2px solid #eee;
   font-weight: bold;
   }
   .invoice-box input[type=number] {
   width: 60px;
   }
   @media only screen and (max-width: 600px) {
   .invoice-box table tr.top table td {
   width: 100%;
   display: block;
   text-align: center;
   }
   .invoice-box table tr.information table td {
   width: 100%;
   display: block;
   text-align: center;
   }
   }
   /** RTL **/
   .rtl {
   direction: rtl;
   font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
   }
   .rtl table {
   text-align: right;
   }
   .rtl table tr td:nth-child(2) {
   text-align: left;
   }
</style>
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Invoice</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Invoice</li>
               </ol>
            </div>
         </div>
      </div>
   </section>
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="invoice-box">
                  <table cellpadding="0" cellspacing="0">
                     <tr class="top">
                        <td colspan="4">
                           <table>
                              <tr>
                                 <td class="title">
                                    <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" style="width:20%; max-width:300px;">
                                 </td>
                                 <td>
                                    Invoice: {{ $invoice_number }}<br> Created: {{ date('d-F-Y') }}
                                 </td>
                              </tr>
                           </table>
                        </td>
                     </tr>
                     <tr class="information">
                        <td colspan="4">
                           <table>
                              <tr>
                                 {{-- <td>
                                    Sparksuite, Inc.<br> 12345 Sunny Road<br> Sunnyville, CA 12345
                                 </td> --}}
                                 <td class='text-address_hide d-none'>
                                    viral - kumar<br>+9574535297<br>vk@gmail.com
                                 </td>
                                 
                                 <td class='text-address_hide'>
                                    <select class="form-control" name="product" id="product">
                                       <option >Select Product</option>
                                       @foreach ($product as $row)
                                         <option value="{{ $row->id }}" data-frist_name='{{  }}'>{{ $row->name }}</option>
                                       @endforeach
                                   </select>
                                 </td>

                              </tr>
                           </table>
                        </td>
                     </tr>
                      <tr class="heading">
                        
                        <td>Product</td>
                        <td>Category</td>
                        <td>Quantity</td>
                        <td>Price</td>
                        <td>Price</td>
                      </tr>
                     <tr class="item">
                        <td>
                          <select class="form-control" name="product" id="product">
                              <option >Select Product</option>
                              @foreach ($product as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                  
                              @endforeach
                          </select>
                          
                        </td>
                        <td><input type="number" class="form-control" value="300" /></td>
                        <td><input type="number" class="form-control" value="1" /></td>
                        <td><input type="number" class="form-control" value="1" /></td>
                        
                        <td>
                           1.00
                        </td>
                     </tr>
                     <tr>
                        <td colspan="4">
                           <button class="btn btn-primary btn-add-row">Add row</button>
                        </td>
                     </tr>
                     <tr class="total">
                        <td colspan="3"></td>
                        <td>
                           Total: 00
                        </td>
                     </tr>

                     <tr class="total">
                      <td colspan="3"></td>
                      <td>
                        Discount: 00
                      </td>
                   </tr>

                   <tr class="total">
                    <td colspan="3"></td>
                    <td>
                      Shipping: 00
                    </td>
                 </tr>

                     <tr class="total2">
                      <td colspan="3"></td>
                        <td>
                          <button class="mah_btn float-left" onclick="myprint()">Print</button>
                        </td>
                    </tr>

                    
                  </table>
               </div>
               <!-- /.invoice -->
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </section>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>
  $(document).ready( function () {
    $('table').on('mouseup keyup', 'input[type=number]', () => calculateTotals());

    $('.btn-add-row').on('click', () => {
      const $lastRow = $('.item:last');
      const $newRow = $lastRow.clone();

      var selectedItem_1 =  $('.item:last').find(":selected").val();
      if(selectedItem_1) {
         $newRow.find('option[value="' + selectedItem_1 + '"]').remove();
      }
      $newRow.find('input').val('');
      $newRow.find('td:last').text('0.00');
      $newRow.insertAfter($lastRow);
      $newRow.find('input:first').focus();
});

  function calculateTotals() {
    const subtotals = $('.item').map((idx, val) => calculateSubtotal(val)).get();
    const total = subtotals.reduce((a, v) => a + Number(v), 0);
    $('.total td:eq(1)').text(formatAsCurrency(total));
  }

    function calculateSubtotal(row) {
        const $row = $(row);
        const inputs = $row.find('input');
        const subtotal = inputs[1].value * inputs[2].value;

        $row.find('td:last').text(formatAsCurrency(subtotal));

    return subtotal;
    }

    function formatAsCurrency(amount) {
    return `$${Number(amount).toFixed(2)}`;
    }

    

    

  });

  function myprint() {
    window.print();
}

</script>
@endsection