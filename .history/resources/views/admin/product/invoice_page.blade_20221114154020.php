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
                                    Invoice #: 123<br> Created: January 1, 2015<br> Due: February 1, 2015
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
                                 <td>
                                    {{ $client->first_name }} - {{ $client->last_name }}<br> John Doe<br> john@example.com
                                 </td>
                              </tr>
                           </table>
                        </td>
                     </tr>
                     {{-- 
                     <tr class="heading">
                        <td colspan="3">
                           Payment Method
                        </td>
                        <td>
                           Check #
                        </td>
                     </tr>
                     --}}
                     {{-- 
                     <tr class="details">
                        <td colspan="3">
                           Check
                        </td>
                        <td>
                           1000
                        </td>
                     </tr>
                     --}}
                     <tr class="heading">
                        <td>Item</td>
                        <td>Unit Cost</td>
                        <td>Quantity</td>
                        <td>Price</td>
                     </tr>
                     <tr class="item">
                        <td><input value="Website design" /></td>
                        <td><input type="number" value="300" /></td>
                        <td><input type="number" value="1" /></td>
                        <td>
                           1.00
                        </td>
                     </tr>
                     <tr>
                        <td colspan="4">
                           <button class="btn-add-row">Add row</button>
                        </td>
                     </tr>
                     <tr class="total">
                        <td colspan="3"></td>
                        <td>
                           Total: $385.00
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
<script>
   // A $( document ).ready() block.
   $( document ).ready(function() {
   
   });
   
   
   
</script>
@endsection