@extends('admin.app_master')

@section('content')
 <style>

//colors
$color_pattens_blue_approx: #def;
$color_gallery_approx: #eee;
$color_pink_swan_approx: #bbb;
$color_alto_approx: #ddd;
$color_mountain_mist_approx: #999;
$white: #fff;
$black_50: rgba(0, 0, 0, 0.5);
$black: #000;
$color_portage_approx: #9af;
$black_20: rgba(0,0,0,0.2);
$color_cerulean_approx: #00adee;
$color_allports_approx: #0078a5;
$allports: #0076a3;
$black_33: rgba(0,0,0,0.33);

//@extend-elements
//original selectors
//th, td
%extend_1 {
  border-width: 1px;
  padding: 0.5em;
  position: relative;
  text-align: left;
  //Instead of the line below you could use @includeborder-radius($radius, $vertical-radius)
  border-radius: 0.25em;
  border-style: solid;
}

//original selectors
//table.meta:after, table.balance:after
%extend_2 {
  clear: both;
  content: "";
  display: table;
}

//original selectors
//.add, .cut
%extend_3 {
  border-width: 1px;
  display: block;
  font-size: .8rem;
  padding: 0.25em 0.5em;
  float: left;
  text-align: center;
  width: 0.6em;
  background: $color_portage_approx;
  //Instead of the line below you could use @includebox-shadow($shadow-1, $shadow-2, $shadow-3, $shadow-4, $shadow-5, $shadow-6, $shadow-7, $shadow-8, $shadow-9, $shadow-10)
  box-shadow: 0 1px 2px $black_20;
  background-image: -moz-linear-gradient($color_cerulean_approx 5%, $color_allports_approx 100%);
  background-image: -webkit-linear-gradient($color_cerulean_approx 5%, $color_allports_approx 100%);
  //Instead of the line below you could use @includeborder-radius($radius, $vertical-radius)
  border-radius: 0.5em;
  border-color: $allports;
  color: $white;
  cursor: pointer;
  font-weight: bold;
  //Instead of the line below you could use @includetext-shadow($shadow-1, $shadow-2, $shadow-3, $shadow-4, $shadow-5, $shadow-6, $shadow-7, $shadow-8, $shadow-9, $shadow-10)
  text-shadow: 0 -1px 2px $black_33;
}


* {
  border: 0;
  //Instead of the line below you could use @includebox-sizing($bs)
  box-sizing: content-box;
  color: inherit;
  font-family: inherit;
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
*[contenteditable] {
  //Instead of the line below you could use @includeborder-radius($radius, $vertical-radius)
  border-radius: 0.25em;
  min-width: 1em;
  outline: 0;
  cursor: pointer;
  &:hover {
    background: $color_pattens_blue_approx;
    //Instead of the line below you could use @includebox-shadow($shadow-1, $shadow-2, $shadow-3, $shadow-4, $shadow-5, $shadow-6, $shadow-7, $shadow-8, $shadow-9, $shadow-10)
    box-shadow: 0 0 1em 0.5em $color_pattens_blue_approx;
  }
  &:focus {
    background: $color_pattens_blue_approx;
    //Instead of the line below you could use @includebox-shadow($shadow-1, $shadow-2, $shadow-3, $shadow-4, $shadow-5, $shadow-6, $shadow-7, $shadow-8, $shadow-9, $shadow-10)
    box-shadow: 0 0 1em 0.5em $color_pattens_blue_approx;
  }
}
td {
  @extend %extend_1;
  border-color: $color_alto_approx;
  &:hover *[contenteditable] {
    background: $color_pattens_blue_approx;
    //Instead of the line below you could use @includebox-shadow($shadow-1, $shadow-2, $shadow-3, $shadow-4, $shadow-5, $shadow-6, $shadow-7, $shadow-8, $shadow-9, $shadow-10)
    box-shadow: 0 0 1em 0.5em $color_pattens_blue_approx;
  }
  &:focus *[contenteditable] {
    background: $color_pattens_blue_approx;
    //Instead of the line below you could use @includebox-shadow($shadow-1, $shadow-2, $shadow-3, $shadow-4, $shadow-5, $shadow-6, $shadow-7, $shadow-8, $shadow-9, $shadow-10)
    box-shadow: 0 0 1em 0.5em $color_pattens_blue_approx;
  }
}
span[contenteditable] {
  display: inline-block;
}
h1 {
  font: bold 100% sans-serif;
  letter-spacing: 0.5em;
  text-align: center;
  text-transform: uppercase;
}
table {
  font-size: 75%;
  table-layout: fixed;
  width: 100%;
  border-collapse: separate;
  border-spacing: 2px;
  &.meta {
    margin: 0 0 3em;
    float: right;
    width: 36%;
    &:after {
      @extend %extend_2;
    }
    th {
      width: 40%;
    }
    td {
      width: 60%;
    }
  }
  &.inventory {
    margin: 0 0 3em;
    clear: both;
    width: 100%;
    th {
      font-weight: bold;
      text-align: center;
    }
    td {
      &:nth-child(1) {
        width: 26%;
      }
      &:nth-child(2) {
        width: 38%;
      }
      &:nth-child(3) {
        text-align: right;
        width: 12%;
      }
      &:nth-child(4) {
        text-align: right;
        width: 12%;
      }
      &:nth-child(5) {
        text-align: right;
        width: 12%;
      }
    }
  }
  &.balance {
    float: right;
    width: 36%;
    &:after {
      @extend %extend_2;
    }
    th {
      width: 50%;
    }
    td {
      width: 50%;
      text-align: right;
    }
  }
}
th {
  @extend %extend_1;
  background: $color_gallery_approx;
  border-color: $color_pink_swan_approx;
}
html {
  font: 16px/1 'Open Sans', sans-serif;
  overflow: auto;
  padding: 0.5in;
  background: $color_mountain_mist_approx;
  cursor: default;
}
body {
  //Instead of the line below you could use @includebox-sizing($bs)
  box-sizing: border-box;
  height: 11in;
  margin: 0 auto;
  overflow: hidden;
  padding: 0.5in;
  width: 8.5in;
  background: $white;
  //Instead of the line below you could use @includeborder-radius($radius, $vertical-radius)
  border-radius: 1px;
  //Instead of the line below you could use @includebox-shadow($shadow-1, $shadow-2, $shadow-3, $shadow-4, $shadow-5, $shadow-6, $shadow-7, $shadow-8, $shadow-9, $shadow-10)
  box-shadow: 0 0 1in -0.25in $black_50;
}
header {
  margin: 0 0 3em;
  &:after {
    clear: both;
    content: "";
    display: table;
  }
  h1 {
    background: $black;
    //Instead of the line below you could use @includeborder-radius($radius, $vertical-radius)
    border-radius: 0.25em;
    color: $white;
    margin: 0 0 1em;
    padding: 0.5em 0;
  }
  address {
    float: left;
    font-size: 75%;
    font-style: normal;
    line-height: 1.25;
    margin: 0 1em 1em 0;
    p {
      margin: 0 0 0.25em;
    }
  }
  span {
    display: block;
    float: right;
    margin: 0 0 1em 1em;
    max-height: 25%;
    max-width: 60%;
    position: relative;
  }
  img {
    display: block;
    float: right;
    max-height: 100%;
    max-width: 100%;
  }
  input {
    cursor: pointer;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
    height: 100%;
    left: 0;
    opacity: 0;
    position: absolute;
    top: 0;
    width: 100%;
  }
}
article {
  margin: 0 0 3em;
  address {
    margin: 0 0 3em;
    float: left;
    font-size: 125%;
    font-weight: bold;
  }
  &:after {
    clear: both;
    content: "";
    display: table;
  }
  h1 {
    clip: rect(0 0 0 0);
    position: absolute;
  }
}
.add {
  @extend %extend_3;
  margin: -2.5em 0 0;
  &:hover {
    background: $color_cerulean_approx;
  }
}
.cut {
  @extend %extend_3;
  opacity: 0;
  position: absolute;
  top: 0;
  left: -1.5em;
  -webkit-transition: opacity 100ms ease-in;
}
@media print {
  * {
    -webkit-print-color-adjust: exact;
  }
  html {
    background: none;
    padding: 0;
  }
  body {
    //Instead of the line below you could use @includebox-shadow($shadow-1, $shadow-2, $shadow-3, $shadow-4, $shadow-5, $shadow-6, $shadow-7, $shadow-8, $shadow-9, $shadow-10)
    box-shadow: none;
    margin: 0;
  }
  .add {
    display: none;
  }
  .cut {
    display: none;
  }
  span:empty {
    display: none;
  }
}
@page {
  margin: 0;
}
img.hover {
  background: $color_pattens_blue_approx;
  //Instead of the line below you could use @includebox-shadow($shadow-1, $shadow-2, $shadow-3, $shadow-4, $shadow-5, $shadow-6, $shadow-7, $shadow-8, $shadow-9, $shadow-10)
  box-shadow: 0 0 1em 0.5em $color_pattens_blue_approx;
}
aside h1 {
  border: none;
  border-width: 0 0 1px;
  margin: 0 0 1em;
  border-color: $color_mountain_mist_approx;
  border-bottom-style: solid;
}
tr:hover .cut {
  opacity: 1;
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

            <header>
              <h1>Invoice</h1> 
              <address contenteditable>
                <p>Jonathan Neal</p>
                <p>101 E. Chapman Ave<br>Orange, CA 92866</p>
                <p>(800) 555-1234</p>
              </address>
              <span><img alt="" src="http://www.jonathantneal.com/examples/invoice/logo.png"><input type="file" accept="image/*"></span>
            </header>
            <article>
              <h1>Recipient</h1>
              <address contenteditable>
                <p>Some Company<br>c/o Some Guy</p>
              </address>
              <table class="meta">
                <tr>
                  <th><span contenteditable>Invoice #</span></th>
                  <td><span contenteditable>101138</span></td>
                </tr>
                <tr>
                  <th><span contenteditable>Date</span></th>
                  <td><span contenteditable>January 1, 2012</span></td>
                </tr>
                <tr>
                  <th><span contenteditable>Amount Due</span></th>
                  <td><span id="prefix" contenteditable>$</span><span>600.00</span></td>
                </tr>
              </table>
              <table class="inventory">
                <thead>
                  <tr>
                    <th><span contenteditable>Item</span></th>
                    <th><span contenteditable>Description</span></th>
                    <th><span contenteditable>Rate</span></th>
                    <th><span contenteditable>Quantity</span></th>
                    <th><span contenteditable>Price</span></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><a class="cut">-</a><span contenteditable>Front End Consultation</span></td>
                    <td><span contenteditable>Experience Review</span></td>
                    <td><span data-prefix>$</span><span contenteditable>150.00</span></td>
                    <td><span contenteditable>4</span></td>
                    <td><span data-prefix>$</span><span>600.00</span></td>
                  </tr>
                </tbody>
              </table>
              <a class="add">+</a>
              <table class="balance">
                <tr>
                  <th><span contenteditable>Total</span></th>
                  <td><span data-prefix>$</span><span>600.00</span></td>
                </tr>
                <tr>
                  <th><span contenteditable>Amount Paid</span></th>
                  <td><span data-prefix>$</span><span contenteditable>0.00</span></td>
                </tr>
                <tr>
                  <th><span contenteditable>Balance Due</span></th>
                  <td><span data-prefix>$</span><span>600.00</span></td>
                </tr>
              </table>
            </article>
            <aside>
              <h1><span contenteditable>Additional Notes</span></h1>
              <div contenteditable>
                <p>A finance charge of 1.5% will be made on unpaid balances after 30 days.</p>
              </div>
            </aside>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>

  <script>

/* Shivving (IE8 is not supported, but at least it won't look as awful)
/* ========================================================================== */
// A $( document ).ready() block.
$( document ).ready(function() {
    console.log( "ready!" );
});
(function(document) {
  var
  head = document.head = document.getElementsByTagName('head')[0] || document.documentElement,
      elements = 'article aside audio bdi canvas data datalist details figcaption figure footer header hgroup mark meter nav output picture progress section summary time video x'.split(' '),
      elementsLength = elements.length,
      elementsIndex = 0,
      element;

  while (elementsIndex < elementsLength) {
    element = document.createElement(elements[++elementsIndex]);
  }

  element.innerHTML = 'x<style>' +
    'article,aside,details,figcaption,figure,footer,header,hgroup,nav,section{display:block}' +
    'audio[controls],canvas,video{display:inline-block}' +
    '[hidden],audio{display:none}' +
    'mark{background:#FF0;color:#000}' +
    '</style>';

  return head.insertBefore(element.lastChild, head.firstChild);
})(document);

/* Prototyping
/* ========================================================================== */

(function(window, ElementPrototype, ArrayPrototype, polyfill) {
  function NodeList() {
    [polyfill]
  }
  NodeList.prototype.length = ArrayPrototype.length;

  ElementPrototype.matchesSelector = ElementPrototype.matchesSelector || ElementPrototype.mozMatchesSelector || ElementPrototype.msMatchesSelector || ElementPrototype.oMatchesSelector || ElementPrototype.webkitMatchesSelector || function matchesSelector(selector) {
    return ArrayPrototype.indexOf.call(this.parentNode.querySelectorAll(selector), this) > -1;
  };

  ElementPrototype.ancestorQuerySelectorAll = ElementPrototype.ancestorQuerySelectorAll || ElementPrototype.mozAncestorQuerySelectorAll || ElementPrototype.msAncestorQuerySelectorAll || ElementPrototype.oAncestorQuerySelectorAll || ElementPrototype.webkitAncestorQuerySelectorAll || function ancestorQuerySelectorAll(selector) {
    for (var cite = this, newNodeList = new NodeList; cite = cite.parentElement;) {
      if (cite.matchesSelector(selector)) ArrayPrototype.push.call(newNodeList, cite);
    }

    return newNodeList;
  };

  ElementPrototype.ancestorQuerySelector = ElementPrototype.ancestorQuerySelector || ElementPrototype.mozAncestorQuerySelector || ElementPrototype.msAncestorQuerySelector || ElementPrototype.oAncestorQuerySelector || ElementPrototype.webkitAncestorQuerySelector || function ancestorQuerySelector(selector) {
    return this.ancestorQuerySelectorAll(selector)[0] || null;
  };
})(this, Element.prototype, Array.prototype);

/* Helper Functions
/* ========================================================================== */

function generateTableRow() {
  var emptyColumn = document.createElement('tr');

  emptyColumn.innerHTML = '<td><a class="cut">-</a><span contenteditable></span></td>' +
    '<td><span contenteditable></span></td>' +
    '<td><span data-prefix>$</span><span contenteditable>0.00</span></td>' +
    '<td><span contenteditable>0</span></td>' +
    '<td><span data-prefix>$</span><span>0.00</span></td>';

  return emptyColumn;
}

function parseFloatHTML(element) {
  return parseFloat(element.innerHTML.replace(/[^\d\.\-]+/g, '')) || 0;
}

function parsePrice(number) {
  return number.toFixed(2).replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1,');
}

/* Update Number
/* ========================================================================== */

function updateNumber(e) {
  var
  activeElement = document.activeElement,
      value = parseFloat(activeElement.innerHTML),
      wasPrice = activeElement.innerHTML == parsePrice(parseFloatHTML(activeElement));

  if (!isNaN(value) && (e.keyCode == 38 || e.keyCode == 40 || e.wheelDeltaY)) {
    e.preventDefault();

    value += e.keyCode == 38 ? 1 : e.keyCode == 40 ? -1 : Math.round(e.wheelDelta * 0.025);
    value = Math.max(value, 0);

    activeElement.innerHTML = wasPrice ? parsePrice(value) : value;
  }

  updateInvoice();
}

/* Update Invoice
/* ========================================================================== */

function updateInvoice() {
  var total = 0;
  var cells, price, total, a, i;

  // update inventory cells
  // ======================

  for (var a = document.querySelectorAll('table.inventory tbody tr'), i = 0; a[i]; ++i) {
    // get inventory row cells
    cells = a[i].querySelectorAll('span:last-child');

    // set price as cell[2] * cell[3]
    price = parseFloatHTML(cells[2]) * parseFloatHTML(cells[3]);

    // add price to total
    total += price;

    // set row total
    cells[4].innerHTML = price;
  }

  // update balance cells
  // ====================

  // get balance cells
  cells = document.querySelectorAll('table.balance td:last-child span:last-child');

  // set total
  cells[0].innerHTML = total;

  // set balance and meta balance
  cells[2].innerHTML = document.querySelector('table.meta tr:last-child td:last-child span:last-child').innerHTML = parsePrice(total - parseFloatHTML(cells[1]));

  // update prefix formatting
  // ========================

  var prefix = document.querySelector('#prefix').innerHTML;
  for (a = document.querySelectorAll('[data-prefix]'), i = 0; a[i]; ++i) a[i].innerHTML = prefix;

  // update price formatting
  // =======================

  for (a = document.querySelectorAll('span[data-prefix] + span'), i = 0; a[i]; ++i) if (document.activeElement != a[i]) a[i].innerHTML = parsePrice(parseFloatHTML(a[i]));
}

/* On Content Load
/* ========================================================================== */

function onContentLoad() {
  updateInvoice();

  var
  input = document.querySelector('input'),
      image = document.querySelector('img');

  function onClick(e) {
    var element = e.target.querySelector('[contenteditable]'),
        row;

    element && e.target != document.documentElement && e.target != document.body && element.focus();

    if (e.target.matchesSelector('.add')) {
      document.querySelector('table.inventory tbody').appendChild(generateTableRow());
    } else if (e.target.className == 'cut') {
      row = e.target.ancestorQuerySelector('tr');

      row.parentNode.removeChild(row);
    }

    updateInvoice();
  }

  function onEnterCancel(e) {
    e.preventDefault();

    image.classList.add('hover');
  }

  function onLeaveCancel(e) {
    e.preventDefault();

    image.classList.remove('hover');
  }

  function onFileInput(e) {
    image.classList.remove('hover');

    var
    reader = new FileReader(),
        files = e.dataTransfer ? e.dataTransfer.files : e.target.files,
        i = 0;

    reader.onload = onFileLoad;

    while (files[i]) reader.readAsDataURL(files[i++]);
  }

  function onFileLoad(e) {
    var data = e.target.result;

    image.src = data;
  }

  if (window.addEventListener) {
    document.addEventListener('click', onClick);

    document.addEventListener('mousewheel', updateNumber);
    document.addEventListener('keydown', updateNumber);

    document.addEventListener('keydown', updateInvoice);
    document.addEventListener('keyup', updateInvoice);

    input.addEventListener('focus', onEnterCancel);
    input.addEventListener('mouseover', onEnterCancel);
    input.addEventListener('dragover', onEnterCancel);
    input.addEventListener('dragenter', onEnterCancel);

    input.addEventListener('blur', onLeaveCancel);
    input.addEventListener('dragleave', onLeaveCancel);
    input.addEventListener('mouseout', onLeaveCancel);

    input.addEventListener('drop', onFileInput);
    input.addEventListener('change', onFileInput);
  }
}

window.addEventListener && document.addEventListener('DOMContentLoaded', onContentLoad);

  </script>
  @endsection