@extends('admin.app_master')
@section('content')
<style>
 .invoice_header {
    align-items: center;
    display: flex;
    /* background-color: #007aff; */
    justify-content: end;
    color: #fff;
    position: relative;
}
.invoice_header .invoice_col h6{
   font-weight: bold;
   margin-right:15px;
}

.right_address{
   text-align: right
}
.invoice-info{
   margin-top: 20px
}
.table_header{
   background-color: #007aff;
   color: #fff
}
.table-bordered td, .table-bordered th {
    border: none;
    border-top: 1px solid #dbdfea;
}
.table_total{
   background-color: #f5f6fa;
}
.total_block{
   background-color: #007aff;
   color: #fff
}

.tm_invoice_seperator {
    margin-right: 0;
    border-radius: 0;
    -webkit-transform: skewX(35deg);
    transform: skewX(35deg);
    position: absolute;
    height: 100%;
    width: 100%;
    right: -30px;
    overflow: hidden;
    border: none;
    background: #007aff;
    z-index: 0;
}
.invoice_col ,.date{
    z-index: 2;
}  

.invoice {
    overflow: hidden;
}
table#tab_logic {
    border-bottom: 1px solid #ddd;
}
</style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
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
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                     <form action="{{ route('invoice_submit') }}" method="POST">
                        @csrf

                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                              <div class="row justify-content-between">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <h4> <i class="fas fa-globe"></i> AdminLTE, Inc.</h4>
                                 </div>
                                 <div class="col-sm-3 col-md-5 col-lg-3 invoice_header">
                                    <div class="invoice_col">
                                       <h6>Invoice {{ $invoice_number }}</h6>
                                       <input type="hidden" name='invoice_number' value='{{ $invoice_number }}'>
                                    </div>
                                 
                                    <div class="date">
                                       <h6 class="float-right">Date: {{ date('d-m-Y') }}</h6>
                                    </div>
                                    <div class="tm_invoice_seperator tm_accent_bg"></div>
                                 </div>
                                <!-- /.col -->
                            </div>
                            
                            <div class="row invoice-info justify-content-between">
                                <div class="col-sm-4 invoice-col left_address">
                                    From
                                    <address>
                                        <strong>Admin, Inc.</strong><br>
                                        Name: {{ $user->name }}<br>
                                        Email: {{ $user->email }}
                                    </address>
                                </div>
                                
                                <div class="col-sm-4 invoice-col right_address" >
                                 To
                                 <span id='address_hide_option'>
                                    <select class="form-control" name="clients" id="clients">
                                       <option value=''>Select Product</option>
                                                @foreach ($client as $row)
                                                <option value="{{ $row->id }}"
                                                   frist_name="{{ $row->first_name }}"
                                                   last_name="{{ $row->last_name }}"
                                                   email='{{ $row->email }}'
                                                   phone='{{ $row->phone }}'
                                                   >{{ $row->first_name }}
                                                </option>
                                                @endforeach
                                       </select>
                                       @error('clients')
                                          <P class='text-danger'>{{ $message }}</P>
                                       @enderror
                                    </span>
                                 
                                    
                                    <address class='td text-address_hide' id='address_hide'>
                                        <strong>John Doe</strong><br>
                                        795 Folsom Ave, Suite 600<br>
                                        San Francisco, CA 94107<br>
                                        Phone: (555) 539-1037<br>
                                        Email: john.doe@example.com
                                    </address>

                                </div>
                           </div>
                           

                            <div class="row">
                                <div class="col-12 table-responsive">
                                    
                                       
                                        {{-- id="dynamicAddRemove" --}}
                                        <table class="table table-bordered" id="tab_logic">
                                            <tr class="table_header">
                                                <td>Product</td>
                                                <td>Category</td>
                                                <td>Rate</td>
                                                <td>Quantity</td>
                                                <td>Price</td>
                                                <td>Action</td>
                                            </tr>
                                            <tr class='item'>
                                                <td>
                                                    <select class="form-control product"name="attraction_or_activity[]"
                                                        id="product_1" data-id='1' onchange='product_chnage(1)'>
                                                        <option value=''>Select Product</option>
                                                        @foreach ($product as $row)
                                                            <option value="{{ $row->id }}" pro_id='{{ $row->id }}'
                                                                cat_name='{{ $row->cat_name }}'
                                                                pro_prices='{{ $row->rate }}'>{{ $row->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td><input type="text" readonly class="form-control add_category"
                                                        id="add_category1" /></td>
                                                <td><input type="number" readonly class="form-control price add_price"
                                                        id='add_price1' /></td>
                                                <td><input type="number" name='qty[]' class="form-control qty" value="1" /></td>
                                                
                                                <td>
                                                    <input type="number" name='total[]' placeholder='0.00'
                                                        class="form-control total" readonly />

                                                </td>

                                             </tr>
                                          </table>
                                          <button type="button" name="add" id="dynamic-ar"
                                          class="btn btn-outline-primary">Add +</button>


                                        
                                         
                                    
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <div class="row justify-content-end">
                              <div class="col-sm-4 col-md-6 col-lg-4">
                                 <table class="table table-bordered table_total">
                                    <tbody>
                                        <tr>
                                            <th class="text-center">Sub Total</th>
                                            <td class="text-center"><input type="number" name='sub_total'
                                                    placeholder='0.00' class="form-control" id="sub_total"
                                                    readonly /></td>
                                        </tr>
                                        <tr>
                                            <th class="text-center">Tax</th>
                                            <td class="text-center">
                                                <div class="input-group mb-2 mb-sm-0">
                                                    <input type="number" readonly class="form-control" id="tax1"
                                                        placeholder="0" name='tex' value='{{ $setting->text }}'>
                                                    <div class="input-group-addon"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-center"> Tax Amount</th>
                                            <td class="text-center"><input type="number" name='tax_amount'
                                                    id="tax_amount" placeholder='0.00' class="form-control"
                                                    readonly /></td>
                                        </tr>
                                        <tr class="total_block">
                                            <th class="text-center">Grand Total</th>
                                            <td class="text-center"><input type="number" name='total_amount'
                                                    id="total_amount" placeholder='0.00' class="form-control "
                                                    readonly /></td>
                                        </tr>
                                    </tbody>
                                </table>
                              </div>
                            </div>
                           




                            
                            <div class="row no-print">
               <div class="col-12">
                 
                 
                 <button type="submit" class="btn btn-primary float-right" style="margin-right: 5px;">
                   <i class="fas fa-download"></i> Generate PDF
                 </button>
               </div>
             </div>
            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {

      $('#address_hide').hide();

      $("#clients").change(function(){
         var element = $(this).val();
         var first_name = $('option:selected', this).attr('frist_name');
         var last_name = $('option:selected', this).attr('last_name');
         var email = $('option:selected', this).attr('email');
         var phone = $('option:selected', this).attr('phone');
         
         
         $('#address_hide_option').hide();
         $('#address_hide').show();

         $('#address_hide').html(''+first_name+'- '+last_name+'<br>'+email+'<br>'+phone+'');
         
      });


        var i = 0;

        var x = 1;

        var products = {!! $product->toJson() !!};
         $("#dynamic-ar").click(function() {
            ++i;
            x++;
            var selectedItem_1 = $('#product_' + x + ':last').find(":selected").val();
            $("#tab_logic").append('<tr><td><select onchange=product_chnage(' + x +
                ') class="text-two form-control product item_select" id=product_' + x + ' data-id=' + x +
                ' name="attraction_or_activity[]"><option >Select Product</option></select></td><td><input type="text" class="form-control add_category" readonly id="add_category' +
                x +
                '"/></td><td><input type="number" readonly class="form-control price add_price" id="add_price' +
                x +
                '"/></td><td><input type="number" name=qty[] class="form-control qty" value="1"/></td><td><input type="number" name=total[] placeholder=0.00 class="form-control total" readonly/></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );
            $.each(products, function(index, value) {
                $('#product_' + x + '').append('<option value=' + value['id'] + ' pro_id=' + value['id'] +
                    ' cat_name=' + value['cat_name'] + ' pro_prices=' + value['rate'] + ' >' + value[
                        'name'] + '</option>');
            });
        });

         $(document).on('click', '.remove-input-field', function() {
           $(this).parents('tr').remove();
           calc();
         });

         var i = 1;
            $('#tab_logic tbody').on('keyup change', function() {
                  console.log("hjh");
                  calc();
            });
            $('#tax').on('keyup change', function() {
                  calc_total();
            });
         });

        function calc() {
            $('#tab_logic tbody tr').each(function(i, element) {
                var html = $(this).html();
                if (html != '') {
                    var qty = $(this).find('.qty').val();
                    var price = $(this).find('.price').val();
                    $(this).find('.total').val(qty * price);

                    calc_total();
                }
            });
        }

         function calc_total() {
            total = 0;
            $('.total').each(function() {
                total += parseInt($(this).val());
            });
            $('#sub_total').val(total.toFixed(2));
            tax_sum = (total / 100) * $('#tax1').val();
            $('#tax_amount').val(tax_sum.toFixed(2));
            $('#total_amount').val((tax_sum + total).toFixed(2));
         }

         function product_chnage(id) {
            var cat_name = $('#product_' + id + ' option:selected').last().attr('cat_name');
            var price = $('#product_' + id + ' option:selected').last().attr('pro_prices');
            $('#add_category' + id).val(cat_name);
            $('#add_price' + id).val(price);
         }

    </script>

    </html>
@endsection
