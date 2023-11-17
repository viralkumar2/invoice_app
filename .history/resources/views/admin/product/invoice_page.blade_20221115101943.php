@extends('admin.app_master')
@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">



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
           


           <!-- Main content -->
           <div class="invoice p-3 mb-3">
             <!-- title row -->
             <div class="row">
               {{-- <div class="col-12">
                 <h4>
                   <i class="fas fa-globe"></i> AdminLTE, Inc.
                   <small class="float-right">Date: 2/10/2014</small>
                 </h4>
               </div> --}}
               <!-- /.col -->
             </div>
             <!-- info row -->
             {{-- <div class="row invoice-info">
               <div class="col-sm-4 invoice-col">
                 From
                 <address>
                   <strong>Admin, Inc.</strong><br>
                   795 Folsom Ave, Suite 600<br>
                   San Francisco, CA 94107<br>
                   Phone: (804) 123-5432<br>
                   Email: info@almasaeedstudio.com
                 </address>
               </div>
               <!-- /.col -->
               <div class="col-sm-4 invoice-col">
                 To
                 <address>
                   <strong>John Doe</strong><br>
                   795 Folsom Ave, Suite 600<br>
                   San Francisco, CA 94107<br>
                   Phone: (555) 539-1037<br>
                   Email: john.doe@example.com
                 </address>
               </div>
               <!-- /.col -->
               <div class="col-sm-4 invoice-col">
                 <b>Invoice #007612</b><br>
                 <br>
                 <b>Order ID:</b> 4F3S8J<br>
                 <b>Payment Due:</b> 2/22/2014<br>
                 <b>Account:</b> 968-34567
               </div>
               <!-- /.col -->
             </div> --}}
             <!-- /.row -->

             <!-- Table row -->
             <div class="row">
               <div class="col-12 table-responsive">
                  <form action="{{ url('store-input-fields') }}" method="POST">
                     @csrf
                     @if ($errors->any())
                     <div class="alert alert-danger" role="alert">
                         <ul>
                             @foreach ($errors->all() as $error)
                             <li>{{ $error }}</li>
                             @endforeach
                         </ul>
                     </div>
                     @endif
                    
                     <table class="table table-bordered" id="dynamicAddRemove">
                         <tr>
                           <td>Item</td>
                           <td>Product</td>
                           <td>Category</td>
                           <td>Rate</td>
                           <td>Quantity</td>
                           <td>Price</td>
                         </tr>
                         <tr>
                             <td><input type="text" name="addMoreInputFields[0][subject]" placeholder="Enter subject" class="form-control" />
                             </td>
                             <td><input type="text" class="form-control add_category" id="add_category"/></td>
                             <td><input type="number" readonly class="form-control add_price" id='add_price'/></td>
                             <td><input type="number" class="form-control" value="1"/></td>
                             <td><input type="number" class="form-control" value="1"/></td>
                             <td>
                              1.00
                           </td>
                             <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">+</button></td>
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
                            
                          
                       </tr>

                     </table>
                     {{-- <button type="submit" class="btn btn-outline-success btn-block btn-sm">Save</button> --}}
                     <button type="submit" class="btn btn-success float-left"><i class="far fa-credit-card"></i> Submit
                        Payment
                      </button>
                  </form>
               </div>
               <!-- /.col -->
             </div>
             <!-- /.row -->

             

             <!-- this row will not appear when printing -->
             {{-- <div class="row no-print">
               <div class="col-12">
                 
                 <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                   Payment
                 </button>
                 <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                   <i class="fas fa-download"></i> Generate PDF
                 </button>
               </div>
             </div> --}}
           </div>
           <!-- /.invoice -->
         </div><!-- /.col -->
       </div><!-- /.row -->
     </div><!-- /.container-fluid -->
   </section>
   <!-- /.content -->
 </div>

    

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="text" name="addMoreInputFields[' + i +
            '][subject]" placeholder="Enter subject" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
</html>
@endsection