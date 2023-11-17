@extends('admin.app_master')

@section('content')
 <style>

.invoice-box {
  max-width: 800px;
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
            {{-- <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div> --}}
            {{-- <div class="invoice p-3 mb-3">
            <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> AdminLTE, Inc.
                    <small class="float-right">Date: 2/10/2014</small>
                  </h4>
                </div>
            </div>
              
              <div class="row invoice-info">
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
                    <strong>{{ $client->first_name }}-{{ $client->last_name }} </strong><br>
                    Phone: {{ $client->phone }}<br>
                    Email: {{ $client->email }}
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
                
              </div>
              

              
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Qty</th>
                      <th>Product</th>
                      <th>Serial #</th>
                      <th>Description</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>1</td>
                      <td>Call of Duty</td>
                      <td>455-981-221</td>
                      <td>El snort testosterone trophy driving gloves handsome</td>
                      <td>$64.50</td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Need for Speed IV</td>
                      <td>247-925-726</td>
                      <td>Wes Anderson umami biodiesel</td>
                      <td>$50.00</td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Monsters DVD</td>
                      <td>735-845-642</td>
                      <td>Terry Richardson helvetica tousled street art master</td>
                      <td>$10.70</td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Grown Ups Blue Ray</td>
                      <td>422-568-642</td>
                      <td>Tousled lomo letterpress</td>
                      <td>$25.99</td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                
              </div>
              

              <div class="row">
                
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  <img src="{{ asset('admin/dist/img/credit/visa.png') }}" alt="Visa">
                  <img src="{{ asset('admin/dist/img/credit/mastercard.png') }}" alt="Mastercard">
                  <img src="{{ asset('admin/dist/img/credit/american-express.png') }}" alt="American Express">
                  <img src="{{ asset('admin/dist/img/credit/paypal2.png') }}" alt="Paypal">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                    plugg
                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                  </p>
                </div>
                
                <div class="col-6">
                  <p class="lead">Amount Due 2/22/2014</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>$250.30</td>
                      </tr>
                      <tr>
                        <th>Tax (9.3%)</th>
                        <td>$10.34</td>
                      </tr>
                      <tr>
                        <th>Shipping:</th>
                        <td>$5.80</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>$265.24</td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              
            <div class="row no-print">
                <div class="col-12">
                  {{-- <a href="{{ route('pdfview_download') }}" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a> --}}
                  {{-- <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i>  Download
                  </button> --}}
                  <a href='{{ route('pdfview_download') }}' type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </a>
                </div>
              </div>
            {{-- </div> --}} 

            <link rel="license" href="http://www.opensource.org/licenses/mit-license/">
<body id="form">
  <form>
    <header>
      <span>
        <img alt="logo" src="https://nidomachineries.in/wp-content/uploads/2019/08/header-banner.gif" class="center logo" id="logo" title="Nido Machineries" draggable="false" style="-moz-user-select: none;">
        
      </span>
    </header> 
    <article class="invoicebody">
	    <div class="left_info">
	      <input type="text" class="clientDetails" id="company_name"  placeholder="Company Name"><br>
	      <input type="text" class="clientDetails" id="customer_name" placeholder="Address"><br>
	      <input type="text" class="clientDetails" id="occupation"    placeholder="Contact Person"><br>
	      <input type="text" class="clientDetails" id="afm"           placeholder="Contact No"><br>
	      <input type="text" class="clientDetails" id="doy"           placeholder="Email">
		</div>
      <table class="meta" id="top_data_table">
         <tbody>
          <tr class="" id="invoice_number_row">
            <th class="bold"><span class="invoice" id="invoice">Reference&nbsp;No</span></th> 
            <td id="time"></td>
          </tr>

          <tr id="daterow">
            <th class="bold"><span class="date" id="date">Date</span></th>
            <td><span contenteditable=""><input type="date" id="theDate"></span></td>
          </tr>

          <tr class="" id="total_block">
            <th class="bold"><span class="amount" id="amount">Ammout</span></th>
            <td><span id="prefix">&#8377;</span><span></span></td>
          </tr>

        </tbody>
      </table>
	<div class="min_height">
      <table class="inventory">
        <thead>
          <tr>
            <th class="bold">
              <span class="item" id="item">Equipment Name & Model</span>
            </th>
            <th class="bold">
              <span class="description" id="description">HSN code & GST</span>
            </th>
            <th class="bold">
              <span class="rate" id="rate">Unit Price</span>
            </th>
            <th class="bold">
              <span class="quantity" id="quantity">Quantity</span>
            </th>
            <th class="bold">
              <span class="price" id="price">Total Price</span>
            </th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>
              <a class="cut" title="Remove Item">-</a>
              <span contenteditable></span>
            </td>
            <td>
              <span contenteditable></span>
              </td>
            <td>
              <span data-prefix>&#8377;</span>
              <span contenteditable>0.00</span>
            </td>
            <td>
              <span contenteditable>1</span>
            </td>
            <td>
              <span data-prefix>&#8377;</span><span>0.00</span>
            </td>
          </tr>
        </tbody>
      </table>
      <a class="add noprint" title="Add Item">+</a>
      <div class="left_btn">
      		<button class="mah_btn" onclick="myprint()">Print</button>
      		<button class="mah_btn" onClick="window.location.reload()">Reset</button>
      </div>
      <div class="right_tax">
      <table class="balance" id="balance">
        <tbody>

          <tr>
            <th class="bold">
              <span class="subtotal" id="subtotal">Subtotal</span>
            </th>
            <td>
              <span>&#8377;</span><span>0.00</span>
            </td>
          </tr>

          <tr>
            <th class="bold">
              <span class="tax" id="tax" contenteditable="">Include GST&nbsp;</span>
              <span contenteditable="">18</span>%
            </th>
            <td>
              <span>&#8377;</span><span>0.00</span>
            </td>
          </tr>

          <tr>
            <th class="bold">
              <span class="total" id="total">Total</span>
            </th>
            <td>
              <span>&#8377; </span><span>0.00</span>
            </td>
          </tr>

        </tbody>
      </table> 
      </div>     
	</div>
    </article>
  </form>

<div class="marathi info"contenteditable>
		<p class="red" style="font-weight:700">TERMS & CONDITIONS :<br><br></p>
		<p> PRICE/DELIVERY:<br> </p>
		<p>The prices quoted are basic prices unpacked, ex-Bhiwandi  <br> <br></p>
  <p> GST:<br> </p>
		<p>Extra as applicable. Our GST No. 27AADCN1555B1ZU Maharashtra State.  <br> <br></p>
  <p> PAYMENT:<br> </p>
		<p>50% advance along with the Purchase Order & 50% against PI in the name of ‘Nido Machineries Pvt. Ltd.’ an account payee cheque / draft payable at Mumbai, Maharashtra. <br> In case of cancellation of a confirmed order for any reason what so ever, 25% of the order value shall have to be paid by you to us, as damage.   <br> <br></p>
  <p> FREIGHT, TRANSIT INSURANCE & UNLOADING:<br> </p>
		<p>To be arranged by the customer OR If arranged by NIDO: Extra at actual plus GST. <br> Insurance: In the scope of buyer. Packing & Forwarding: 3 % Extra  <br> Unloading: In the scope of buyer. Buyer need to provide forklifts, crane or unskilled labor. <br> <br> </p>
	<p> DELIVERY:<br> </p>	
  <p>Exact schedule for dispatch will be notified at a later date. Delivery dates are approximate only & assume timely receipt of all information, test materials & advance.  <br> <br></p>
  <p> WARRANTY:<br> </p>
		<p> Limited onsite for product 12 months’ warranty (considering 8 hours of operations per day) against manufacturing defects against establishment of proof for same. <br> This warranty is void & NIDO will not be responsible for machine failure or performance if the customer chooses to use the equipment other than the product it was designed & tested for. <br> Our warranty does not extend to damages caused due to negligence or improper handing or erection by the buyer or any alterations carries out without our knowledge / approval. During this period, the items are to be returned to us at your cost. <br> The warranty will not cover normal wear & tear of the components, damages or losses caused during transit, & deterioration or rusting due to atmospheric conditions, damages resulting from fire, accidents, or lack of maintenance on the part of the customer. <br> Warranty on Third party components like motors, electric contractors & breakers, & pneumatic will be given by manufacturers. <br> <br></p>
   <p> VALIDITY:<br> </p>
		<p>Our offer is valid for your acceptance for a period of 30 Days from the date. Thereafter, it will be subject to confirmation by us. <br> <br></p>
  <p> JURISDICTION:<br> </p>
		<p>All terms subject to Mumbai, Maharashtra jurisdiction.<br> <br></p>
  <p> IMAGES:<br> </p>
  <p>Images are for representation purpose only. The actual product may vary in color, size & design<br> <br><br><br><br></p>
</div>
<script>

(function () {
    function checkTime(i) {
        return (i < 10) ? "0" + i : i;
    }

    function startTime() {
        var times = new Date(),
        
            hh = checkTime(times.getHours()),
            mm = checkTime(times.getMinutes()),
            ss = checkTime(times.getSeconds()),
            yy = checkTime(times.getFullYear().toString(10).substring(2, 4)),
            MM = checkTime(times.getMonth() + 1),
            dd = checkTime(times.getDate())
            ;
        document.getElementById('time').innerHTML = yy + "" + MM + "" + dd + "" + hh + "" + mm + "" + ss ;
        t = setTimeout(function () {
            startTime1()
        }, 500);
    }
    startTime();
})();

var date = new Date();

var day = date.getDate();
var month = date.getMonth() + 1;
var year = date.getFullYear();

if (month < 10) month = "0" + month;
if (day < 10) day = "0" + day;

var today = year + "-" + month + "-" + day;


document.getElementById('theDate').value = today;
</script>

            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
  @endsection