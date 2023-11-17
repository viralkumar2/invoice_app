@extends('admin.app_master')

@section('content')
 <style>

@import url('https://fonts.googleapis.com/css?family=Palanquin:400,600,700');
@import url('https://fonts.googleapis.com/css?family=Open+Sans:400,600,700');
@import url('https://fonts.googleapis.com/css?family=Yantramanav:400,700');
@import url("https://fonts.googleapis.com/css?family=Merriweather:400,400i,700");
*{
	border: 0;
	box-sizing: content-box;
	color: inherit;
	font-family: 'Merriweather', serif !important;
	font-size: inherit;
	font-style: inherit;
	font-weight: inherit;
	line-height: inherit;
	list-style: none;
	margin: 0;
	padding: 0;
	text-decoration: none;
	vertical-align: top;
}
.marathi{
	font-family: 'Palanquin', sans-serif !important;
}
.marathi.info p {
    margin-top: 0;
    font-weight: 600;
    margin-bottom: 0;
    font-family: 'Palanquin', sans-serif !important;
    font-size: 11px;
    color: #181818;
    line-height: 1.5;
}
p.text-center.mah_in {
    position: absolute;
    font-size: 12px;
    top: 5px;
    left: 47%;
    font-family: 'Palanquin', sans-serif !important;
}
.Signature ul li:before {
    content: '';
    position: absolute;
    top: -10px;
    border-top: 1px dashed #999;
    width: 44%;
}
td{word-break: break-all;}    
.marathi.info {
    margin-top: 20px;
}
.red{
	color:#f44336!important;
}
/* content editable */

*[contenteditable] { border-radius: 0.25em; min-width: 1em; outline: 0; }

*[contenteditable] { cursor: pointer; }

*[contenteditable]:hover, *[contenteditable]:focus, td:hover *[contenteditable], td:focus *[contenteditable], img.hover {  }

span[contenteditable] { display: inline-block; }

/* heading */

h1 { font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; }

/* table */

table { font-size: 75%; table-layout: fixed; width: 100%; }
table { border-collapse: separate; border-spacing: 2px; }
th, td { border-width: 1px; padding: 0.5em; position: relative; text-align: left; }
th, td { border-radius: 0.25em; border-style: solid; }
th { background: #EEE; border-color: #BBB; }
td { border-color: #DDD; }

/* page */

html { font: 16px/1 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; }
html { background: #999; cursor: default; }

body { box-sizing: border-box; min-height: 11in; margin: 0 auto; padding: 0 0.5in; width: 8.5in; }
body { background: #FFF; border-radius: 1px; box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5); }

/* header */

header { margin: 0 0 1em; }
header:after { clear: both; content: ""; display: table; }

header h1 { background: #000; border-radius: 0.25em; color: #FFF; margin: 0 0 1em; padding: 0.5em 0; }
header address { float: left; font-size: 75%; font-style: normal; line-height: 1.25; margin: 0 1em 1em 0; }
header address p { margin: 0 0 0.25em; }
header span, header img { display: block; }
header span { max-height: 100%; max-width: 100%; position: relative; }
header img { max-height: 100%; max-width: 100%; margin: 0 auto;}
header input { cursor: pointer; -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; height: 100%; left: 0; opacity: 0; position: absolute; top: 0; width: 100%; }

/* article */

article, article address, table.meta, table.inventory { margin: 0 0 3em; }
article:after { clear: both; content: ""; display: table; }
article h1 { clip: rect(0 0 0 0); position: absolute; }

article address { float: left; font-size: 125%; font-weight: bold; }

/* table meta & balance */

table.meta, table.balance { float: right; width: 40%; }
table.meta:after, table.balance:after { clear: both; content: ""; display: table; }

/* table meta */

table.meta th { width: 40%; }
table.meta td { width: 60%; }

/* table items */

table.inventory { clear: both; width: 100%; }
table.inventory th { font-weight: 400; text-align: center; }

table.inventory td:nth-child(1) { width: 26%; }
table.inventory td:nth-child(2) { width: 38%; }
table.inventory td:nth-child(3) { text-align: right; width: 12%; }
table.inventory td:nth-child(4) { text-align: right; width: 12%; }
table.inventory td:nth-child(5) { text-align: right; width: 12%; }

/* table balance */

table.balance th, table.balance td { width: 50%; }
table.balance td { text-align: right; }

/* aside */

aside h1 { border: none; border-width: 0 0 1px; margin: 0 0 1em; }
aside h1 { border-color: #999; border-bottom-style: solid; }
.left_info {
    width: 60%;
    display: inline-block;
}
.min_height {
    min-height: 283px;
}
/* javascript */

.add, .cut
{
	border-width: 1px;
	display: block;
	font-size: .8rem;
	padding: 0.25em 0.5em;	
	float: left;
	text-align: center;
	width: 0.6em;
}

.add, .cut, .mah_btn
{
	background-position: 0% 0%;
	box-shadow: 0 1px 2px rgba(0,0,0,0.2);
	border-radius: 0.5em;
	border-color: #0076A3;
	color: #FFF;
	cursor: pointer;
	font-weight: bold;
	background-image: -webkit-linear-gradient(#00ADEE 5%, #0078A5 100%);
	background-color: #9AF;
	background-repeat: repeat;
	background-attachment: scroll;
}

.add { margin: -2.5em 0 0; }

.add:hover { background: #00ADEE; }

.cut { opacity: 0; position: absolute; top: 0; left: -1.5em; }
.cut { -webkit-transition: opacity 100ms ease-in; }

tr:hover .cut { opacity: 1; }

@media print {
	* { -webkit-print-color-adjust: exact; }
	html { background: none; padding: 0; }
	body { box-shadow: none; margin: 0; }
	.add, .cut { display: none; }
		.input.clientDetails{
	    border-bottom: none;
	}

}
@page { margin: 0; }

body{
	margin-top: 0px;
	box-shadow: 10px 10px 5px #888888;
	position: relative;
}
header img {
    width: 816px;
    margin-left: -48px;
    max-width: 816px !important;
}
div.container a.navbar-brand{
	color: white;
}
img.stamp{
	margin-left:5px;
	height:50px;
	background: rgba(0, 0, 0, 0);
	box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
}
.bold{
	font-weight:400;
}
.left_btn button.mah_btn {
    font-size: 14px;
    font-weight: 400;
    padding: 8px 19px;
    border-radius: 3px;
}
.left_btn {
    width: 50%;
    float: left;
}
.Signature ul li {
    font-size: 14px;
    text-transform: uppercase;
    display: inline-block;
    width: 48%;
    position:relative;
}
.Signature ul li:last-child {
    text-align: right;
}
::-webkit-input-placeholder { /* WebKit browsers */
        color: #dbdbdb;
    }
    :-moz-placeholder { /* Mozilla Firefox 4 to 18 */
       color: #dbdbdb;
    }
    ::-moz-placeholder { /* Mozilla Firefox 19+ */
       color: #dbdbdb;
    }
    :-ms-input-placeholder { /* Internet Explorer 10+ */
       color: #dbdbdb;
    }

    textarea::-webkit-input-placeholder { /* WebKit browsers */
        color: #dbdbdb;
    }
    textarea:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
       color: #dbdbdb;
    }
    textarea::-moz-placeholder { /* Mozilla Firefox 19+ */
       color: #dbdbdb;
    }
    textarea:-ms-input-placeholder { /* Internet Explorer 10+ */
       color: #dbdbdb;
    }

@media print {
	.noprint { display: none !important; }
	.input.clientDetails{
	    border-bottom: none;
	}

    ::-webkit-input-placeholder { /* WebKit browsers */
        color: transparent;
    }
    :-moz-placeholder { /* Mozilla Firefox 4 to 18 */
       color: transparent;
    }
    ::-moz-placeholder { /* Mozilla Firefox 19+ */
       color: transparent;
    }
    :-ms-input-placeholder { /* Internet Explorer 10+ */
       color: transparent;
    }

    textarea::-webkit-input-placeholder { /* WebKit browsers */
        color: transparent;
    }
    textarea:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
       color: transparent;
    }
    textarea::-moz-placeholder { /* Mozilla Firefox 19+ */
       color: transparent;
    }
    textarea:-ms-input-placeholder { /* Internet Explorer 10+ */
       color: transparent;
    }
    .clientDetails {
	    width: 400px;
	    border-bottom: none;
	    margin-bottom: 1px;
	}
	.left_btn{
		display:none;
	}


}

.nodisplay{
	display: none;
}

.display: {
	display: block;
}

table.cpanel td {
    text-align: center;
}
.clientDetails {
    width: 400px;
    border-bottom: 1px solid #ccc;
	margin-bottom: 3px;
    font-size: 15px;
}
.bootstrap * {
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
}

.add:hover,.cut:hover { text-decoration: none; }

/* content editable */

*[contenteditable] { border-radius: 0.25em; min-width: 1em; outline: 0; }

*[contenteditable] { cursor: pointer; }

*[contenteditable]:hover, *[contenteditable]:focus, td:hover *[contenteditable], td:focus *[contenteditable], img.hover { background: #fcf3a9; box-shadow: 0 0 1em 0.5em #DEF; }

span[contenteditable] { display: inline-block; }
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