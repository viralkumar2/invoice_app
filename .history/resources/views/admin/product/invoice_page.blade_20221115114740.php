@extends('admin.app_master')
@section('content')

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
                            <td>Product</td>
                            <td>Category</td>
                            <td>Rate</td>
                            <td>Quantity</td>
                            <td>Price</td>
                            {{-- <td>Action/</td> --}}
                         </tr>
                         <tr>
                             <td>
                              <select class="form-control product"name="attraction_or_activity[]" id="product" onchange='product_chnage()'>
                                 <option value=''>Select Product</option>
                                 @foreach ($product as $row)
                                   <option value="{{ $row->id }}" pro_id='{{ $row->id }}' cat_name='{{ $row->cat_name }}' pro_prices='{{ $row->rate }}'>{{ $row->name }}</option>
                                 @endforeach
                             </select>
                             {{-- <select class="text-two" name="attraction_or_activity[]">
                              <option value="attraction_or_activity">Select the attractions or activities</option>
                              <option value="attraction">Attraction</option>
                              <option value="activity">Activity</option>
                           </select> --}}

                              {{-- <input type="text" name="addMoreInputFields[0][subject]" placeholder="product" class="form-control" /> --}}
                             </td>
                             <td><input type="text" class="form-control add_category" id="add_category"/></td>
                             <td><input type="number" readonly class="form-control add_price" id='add_price'/></td>
                             <td><input type="number" class="form-control" value="1"/></td>
                             {{-- <td><input type="number" class="form-control" value="1"/></td> --}}
                             <td>
                              1.00
                           </td>
                             <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">+</button></td>
                           </tr>

                           {{-- <tr>
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
    var $wrapper = $('.multi-fields', this);
		var x = 1;

      var products = {!! $product->toJson() !!};
      var select = '<select class="text-two'+x+'" name="attraction_or_activity[]"><option value="activity">Activity</option></select>';
      
         $("#dynamic-ar").click(function () {
               ++i;
               x++;


               const $lastRow = $('.product:last');
               const $newRow = $lastRow.clone();
               var selectedItem_1 =  $('.product:last').find(":selected").val();
               console.log(selectedItem_1);
                  if(selectedItem_1) {
                     $newRow.find('option[value='+selectedItem_1+']').remove();
                  }

               $('.item_select').html('');
               // $newRow.insertAfter($lastRow);
               $("#dynamicAddRemove").append('<tr><td><select class="text-two form-control product item_select" name="attraction_or_activity"><option >Select Product</option></select></td><td><input type="text" class="form-control add_category" id="add_category"/></td><td><input type="number" readonly class="form-control add_price" id=add_price/></td><td><input type="number" class="form-control" value="1"/></td><td>1.1</td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
               );
               $.each(products, function( index, value ) {
                  if(selectedItem_1 != value['id']){

                     $('.item_select').append('<option value='+value['id']+'>'+value['name']+'</option>');
                  }
               });
         });



      $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
      });

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


   //  $(".text-two").change(function() { // when the attraction_OR_activity dropdown is selected
	// $('#populated_attr_or_activity').html(''); // emptying the selections of 3rd dropdown list if there was any selections were made before.
		
	// 	/* saving selected values in variables */
	// 	var selected_destination = $('.text-one :selected').val();
	// 	var selected_attraction_or_activity = $('.text-two :selected').val();
		
	// 	colombo_attractions = new Array("Ganga Ramaya","National Art Gallery","Galle Face Green","Arcade Indepentent Square");
	// 	colombo_activities = new Array("City Walk 2016","Traditional Dance Competition 2016","Local Spicy food");
		
	// 	if ( selected_destination == 'colombo' && selected_attraction_or_activity == 'attraction') {
	// 		colombo_attractions.forEach(function(t) { 
	// 			$('#populated_attr_or_activity').append('<option>'+t+'</option>');
	// 		});
	// 	}
		
	// 	if ( selected_destination == 'colombo' && selected_attraction_or_activity == 'activity') {
	// 		colombo_activities.forEach(function(t) { 
	// 			$('#populated_attr_or_activity').append('<option>'+t+'</option>');
	// 		});
	// 	}


	// });

</script>
</html>
@endsection