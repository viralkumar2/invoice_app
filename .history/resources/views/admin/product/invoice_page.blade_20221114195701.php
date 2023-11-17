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
                           <table class="new">
                              <tr class='add_clients'>
                                 <td class='td text-address_hide' id='address_hide'>
                                    viral - kumar<br>+9574535297<br>vk@gmail.com
                                 </td>
                                 
                                 <td class='text-address_hide_option' id='address_hide_option'>
                                    <select class="form-control" name="clients" id="clients">
                                       <option >Select Product</option>
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
                                 </td>

                              </tr>
                           </table>
                        </td>
                     </tr>
                      {{-- <tr class="heading">
                        
                        <td>Item</td>
                        <td>Product</td>
                        <td>Category</td>
                        <td>Rate</td>
                        <td>Quantity</td>
                        <td>Price</td>
                      </tr>
                     <tr class="item">

                        <td>
                           <span Class='btn btn-danger'>-</span>
                        </td>
                        <td>
                          <select class="form-control product" name="product" id="product" onchange='product_chnage()'>
                              <option >Select Product</option>
                              @foreach ($product as $row)
                                <option value="{{ $row->id }}" pro_id='{{ $row->id }}' cat_name='{{ $row->cat_name }}' pro_prices='{{ $row->rate }}'>{{ $row->name }}</option>
                              @endforeach
                          </select>
                          
                        </td>
                        <td><input type="text" class="form-control add_category" id="add_category"/></td>
                        <td><input type="number" readonly class="form-control add_price" id='add_price'/></td>
                        <td><input type="number" class="form-control" value="1"/></td>
                        
                        <td>
                           1.00
                        </td>
                     </tr>
                     <tr>
                        <td colspan="4">
                           <button class="btn btn-primary btn-add-row disabled">+</button>
                        </td>
                     </tr>
                     <tr class="total">
                        <td colspan="3"></td>
                        <td>Total: 00</td>
                           
                        
                     </tr>

                     <tr class="total">
                      <td colspan="3"></td>
                      <td>Discount: 00</td>
                   </tr>

                   <tr class="total">
                    <td colspan="3"></td>
                    <td>Shipping: 00</td>
                      
                    
                 </tr> --}}

                     {{-- <tr class="total2">
                      <td colspan="3"></td>
                        <td>
                          <button class="mah_btn float-left" onclick="myprint()">Print</button>
                        </td>
                    </tr> --}}

                    
                  </table>
              


               <div class="row">
                  <div class="customer_records">
                           <select class="product" name="product" id="product" onchange='product_chnage()'>
                              <option >Select Product</option>
                                 @foreach ($product as $row)
                                 <option value="{{ $row->id }}" pro_id='{{ $row->id }}' cat_name='{{ $row->cat_name }}' pro_prices='{{ $row->rate }}'>{{ $row->name }}</option>
                                 @endforeach
                        </select>

                        <input name="customer_age" type="number" class='add_category' id='add_category'>
                        <input name="customer_email" type="email" value="email">
                  
                     <a class="extra-fields-customer" href="#">Add More Customer</a>
                     </div>
                
                  <div class="customer_records_dynamic"></div>
                
                </div>

                {{-- /////daskdhasd --}}
              </div>
               
            </div>
            
         </div>
         
      </div>
      
   </section>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>

function product_chnage(){
   
            $('.btn-add-row').removeClass('disabled');
         
         var element = $('.product option:selected').last().val();
         
         $('.add_category').last().addClass('add_category'+element);
         var addclass_value = 'add_category'+element;
         var cat_name = $('.product option:selected').last().attr('cat_name');
         $('.'+addclass_value).val(cat_name);


         $('.add_price').last().addClass('add_price'+element);
         var add_price_value = 'add_price'+element;
         var price = $('.product option:selected').last().attr('pro_prices');
         $('.'+add_price_value).val(price);
         console.log(price);
         
   }
  $(document).ready( function () {

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

$('.extra-fields-customer').click(function() {
      $('.customer_records').clone().appendTo('.customer_records_dynamic');
      $('.customer_records_dynamic .customer_records').addClass('single remove');
      $('.single .extra-fields-customer').remove();
      $('.single').append('<a href="#" class="remove-field btn-remove-customer">Remove Fields</a>');
      $('.customer_records_dynamic > .single').attr("class", "remove");

      $('.customer_records_dynamic input').each(function() {
         var count = 0;
         var fieldname = $(this).attr("name");
         $(this).attr('name', fieldname + count);
         count++;
      });

      });

      $(document).on('click', '.remove-field', function(e) {
         $(this).parent('.remove').remove();
         e.preventDefault();
      });

</script>
@endsection