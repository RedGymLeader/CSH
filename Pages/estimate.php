<?php
include "../config.php";

// Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location: index.php');
}

// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: ../index.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>CSH Editable Estimate</title>
	<link rel="icon" href="../Images/chimney-sweep.png">
	<link rel='stylesheet' type='text/css' href='../CSS/style.css' />
	<link rel='stylesheet' type='text/css' href='../CSS/print.css' media="print" />
	<link rel="stylesheet" type="text/css" href="../CSS/sidebar.css"> 
	<script type='text/javascript' src='jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='example.js'></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>  
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
        <style>
   .but_logout {     
    background-color: Transparent;
    background-repeat:no-repeat;
    border: none;
    cursor:pointer;
    overflow: hidden;
    color: #fff;
    position: absolute;
    top: 0;
    left: 0;
}</style>
</head>

<body>
<div class="sidenav">
  <img src="../Images/chimney-sweep.png" alt="Avatar" class="avatar" width="160" height="160">
  <a href="home.php">Inventory Manager</a>
  <a href="customerdatabase.php">Customers</a>
  <a href="inspection.php">Inspection</a>
  <a href="estimate.php">Estimate</a>
  <a href="pdfUpload.php">PDF Upload</a>
    <form  method='post' action="">
            <input type="submit" value="Log Out" name="but_logout" id="but_logout" class="but_logout" >
        </form>
</div>
<form class="form" style="max-width: none; width: 1200px;"> 
	<div id="page-wrap">

		<textarea id="header">Estimate</textarea>
		
		<div id="identity">
		
            <textarea id="address">Top Notch Chimney
1925 Park Avenue
Des Moines, IA 50315

Phone: (515) 249-6337</textarea>

            <div id="logo">

              <div id="logoctr">
                <a href="javascript:;" id="change-logo" title="Change logo">Change Logo</a>
                <a href="javascript:;" id="save-logo" title="Save changes">Save</a>
                |
                <a href="javascript:;" id="delete-logo" title="Delete logo">Delete Logo</a>
                <a href="javascript:;" id="cancel-logo" title="Cancel changes">Cancel</a>
              </div>

              <div id="logohelp">
                <input id="imageloc" type="text" size="50" value="" /><br />
                (max width: 540px, max height: 100px)
              </div>
              <img id="image" src="../Images/topnotch.png" alt="logo" height="95px" width="100px" />
            </div>
		
		</div>
		
		<div style="clear:both"></div>
		
		<div id="customer">

            <textarea id="customer-title">Customer Name
Address</textarea>

            <table id="meta">
                <tr>
                    <td class="meta-head">Estimate #</td>
                    <td><textarea>000123</textarea></td>
                </tr>
                <tr>

                    <td class="meta-head">Date</td>
                    <td><textarea id="date"><?php echo date("m/d/Y"); ?></textarea></td>
                </tr>
                <tr>
                    <td class="meta-head">Estimate Total</td>
                    <td><div class="due">$358.00</div></td>
                </tr>

            </table>
		
		</div>
		
		<table id="items">
		
		  <tr>
		      <th>Item</th>
		      <th>Description</th>
		      <th>Unit Cost</th>
		      <th>Quantity</th>
		      <th>Price</th>
		  </tr>
		  
		  <tr class="item-row">
		      <td class="item-name"><div class="delete-wpr"><textarea>Chimney Sweep</textarea><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>
		      <td class="description"><textarea>Sweep and Level 2 Camera Inspection</textarea></td>
		      <td><textarea class="cost">$229.00</textarea></td>
		      <td><textarea class="qty">1</textarea></td>
		      <td><span class="price">$229.00</span></td>
		  </tr>
		  
		  <tr class="item-row">
		      <td class="item-name"><div class="delete-wpr"><textarea>Chimney Cap</textarea><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>

		      <td class="description"><textarea>12 x 12 Galvanized Chimney Cap (Black)</textarea></td>
		      <td><textarea class="cost">$129.00</textarea></td>
		      <td><textarea class="qty">1</textarea></td>
		      <td><span class="price">$129.00</span></td>
		  </tr>
		  
		  <tr id="hiderow">
		    <td colspan="5"><a id="addrow" href="javascript:;" title="Add a row">Add a row</a></td>
		  </tr>
		  
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Subtotal</td>
		      <td class="total-value"><div id="subtotal">$358.00</div></td>
		  </tr>
		  <tr>

		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Total</td>
		      <td class="total-value"><div id="total">$358.00</div></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Amount Paid</td>

		      <td class="total-value"><textarea id="paid">$0.00</textarea></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Balance Due</td>
		      <td class="total-value balance"><div class="due">$358.00</div></td>
		  </tr>
		
		</table>
		
		<div id="terms">
		  <h5>Terms</h5>
		  <textarea>Estimate considered valid for one year following issue date.</textarea>
		</div>
	<div><input type="button" id="create_pdf" value="Generate PDF"> </div>
	  </form>
	</div>
	<script>  
    (function () {  
        var  
         form = $('.form'),  
         cache_width = form.width(),  
         a4 = [510, 841.89]; // for a4 size paper width and height  
  
        $('#create_pdf').on('click', function () {  
            $('body').scrollTop(0);  
            createPDF();  
        });  
        //create pdf  
        function createPDF() {  
            getCanvas().then(function (canvas) {  
                var  
                 img = canvas.toDataURL("image/png"),  
                 doc = new jsPDF({  
                     unit: 'px',  
                     format: 'a4'  
                 });  
                doc.addImage(img, 'JPEG', 20, 20);  
                doc.save('CSHEstimate.pdf');  
                form.width(cache_width);  
            });  
        }  
  
        // create canvas object  
        function getCanvas() {  
            form.width((a4[0] * 1.3333) + 90 ).css('max-width', 'none');  
            return html2canvas(form, {  
                imageTimeout: 2000,  
                removeContainer: true  
            });  
        }  
  
    }());  
</script>  
<script>  
    /* 
 * jQuery helper plugin for examples and tests 
 */  
    (function ($) {  
        $.fn.html2canvas = function (options) {  
            var date = new Date(),  
            $message = null,  
            timeoutTimer = false,  
            timer = date.getTime();  
            html2canvas.logging = options && options.logging;  
            html2canvas.Preload(this[0], $.extend({  
                complete: function (images) {  
                    var queue = html2canvas.Parse(this[0], images, options),  
                    $canvas = $(html2canvas.Renderer(queue, options)),  
                    finishTime = new Date();  
  
                    $canvas.css({ position: 'absolute', left: 0, top: 0 }).appendTo(document.body);  
                    $canvas.siblings().toggle();  
  
                    $(window).click(function () {  
                        if (!$canvas.is(':visible')) {  
                            $canvas.toggle().siblings().toggle();  
                            throwMessage("Canvas Render visible");  
                        } else {  
                            $canvas.siblings().toggle();  
                            $canvas.toggle();  
                            throwMessage("Canvas Render hidden");  
                        }  
                    });  
                    throwMessage('Screenshot created in ' + ((finishTime.getTime() - timer) / 1000) + " seconds<br />", 4000);  
                }  
            }, options));  
  
            function throwMessage(msg, duration) {  
                window.clearTimeout(timeoutTimer);  
                timeoutTimer = window.setTimeout(function () {  
                    $message.fadeOut(function () {  
                        $message.remove();  
                    });  
                }, duration || 2000);  
                if ($message)  
                    $message.remove();  
                $message = $('<div ></div>').html(msg).css({  
                    margin: 0,  
                    padding: 10,  
                    background: "#000",  
                    opacity: 0.7,  
                    position: "fixed",  
                    top: 10,  
                    right: 10,  
                    fontFamily: 'Tahoma',  
                    color: '#fff',  
                    fontSize: 12,  
                    borderRadius: 12,  
                    width: 'auto',  
                    height: 'auto',  
                    textAlign: 'center',  
                    textDecoration: 'none'  
                }).hide().fadeIn().appendTo('body');  
            }  
        };  
    })(jQuery);  
  
</script>  
</body>

</html>