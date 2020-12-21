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
	
	<title>CSH Editable Inspection</title>
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
}
</style>
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

		<textarea id="header">Inspection Form</textarea>
		
		<div id="identity">
		
            <textarea id="address">Top Notch Chimney
1925 Park Avenue
Des Moines, IA 50315
Phone: (515) 249-6337
<?php echo date("m/d/Y"); ?></textarea>

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
Customer Address</textarea></div>
</br>
            		</li>		<li id="li_4" >
		<label class="description" for="element_4"><b>Height:</b>.......................................................................</label>
		<span>
			<input id="element_4_1" name="element_4" class="element radio" type="radio" value="1" />
<label class="choice" for="element_4_1">Satisfactory</label>
<input id="element_4_2" name="element_4" class="element radio" type="radio" value="2" />
<label class="choice" for="element_4_2">Unsatisfactory</label>
<input id="element_4_3" name="element_4" class="element radio" type="radio" value="3" />
<label class="choice" for="element_4_3">Not Applicable</label>

		</span> 
		</li>		<li id="li_6" >
		<label class="description" for="element_6"><b>Chimney Cap / Spark Arrestor:</b>...............................</label>
		<span>
			<input id="element_6_1" name="element_6" class="element radio" type="radio" value="1" />
<label class="choice" for="element_6_1">Satisfactory</label>
<input id="element_6_2" name="element_6" class="element radio" type="radio" value="2" />
<label class="choice" for="element_6_2">Unsatisfactory</label>
<input id="element_6_3" name="element_6" class="element radio" type="radio" value="3" />
<label class="choice" for="element_6_3">Not Applicable</label>

		</span> 
		</li>		<li id="li_9" >
		<label class="description" for="element_9"><b>Crown / Wash:</b>..........................................................</label>
		<span>
			<input id="element_9_1" name="element_9" class="element radio" type="radio" value="1" />
<label class="choice" for="element_9_1">Satisfactory</label>
<input id="element_9_2" name="element_9" class="element radio" type="radio" value="2" />
<label class="choice" for="element_9_2">Unsatisfactory</label>
<input id="element_9_3" name="element_9" class="element radio" type="radio" value="3" />
<label class="choice" for="element_9_3">Not Applicable</label>

		</span> 
		</li>		<li id="li_7" >
		<label class="description" for="element_7"><b>Brickwork / Mortar:</b>..................................................</label>
		<span>
			<input id="element_7_1" name="element_7" class="element radio" type="radio" value="1" />
<label class="choice" for="element_7_1">Satisfactory</label>
<input id="element_7_2" name="element_7" class="element radio" type="radio" value="2" />
<label class="choice" for="element_7_2">Unsatisfactory</label>
<input id="element_7_3" name="element_7" class="element radio" type="radio" value="3" />
<label class="choice" for="element_7_3">Not Applicable</label>

		</span> 
		</li>		<li id="li_8" >
		<label class="description" for="element_8"><b>Flashing:</b>...................................................................</label>
		<span>
			<input id="element_8_1" name="element_8" class="element radio" type="radio" value="1" />
<label class="choice" for="element_8_1">Satisfactory</label>
<input id="element_8_2" name="element_8" class="element radio" type="radio" value="2" />
<label class="choice" for="element_8_2">Unsatisfactory</label>
<input id="element_8_3" name="element_8" class="element radio" type="radio" value="3" />
<label class="choice" for="element_8_3">Not Applicable</label>

		</span> 
		</li>		<li id="li_11" >
		<label class="description" for="element_11"><b>Flue Liner:</b>.................................................................</label>
		<span>
			<input id="element_11_1" name="element_11" class="element radio" type="radio" value="1" />
<label class="choice" for="element_11_1">Satisfactory</label>
<input id="element_11_2" name="element_11" class="element radio" type="radio" value="2" />
<label class="choice" for="element_11_2">Unsatisfactory</label>
<input id="element_11_3" name="element_11" class="element radio" type="radio" value="3" />
<label class="choice" for="element_11_3">Not Applicable</label>

		</span> 
		</li>		<li id="li_10" >
		<label class="description" for="element_10"><b>Moisture Resistance:</b>...............................................</label>
		<span>
			<input id="element_10_1" name="element_10" class="element radio" type="radio" value="1" />
<label class="choice" for="element_10_1">Satisfactory</label>
<input id="element_10_2" name="element_10" class="element radio" type="radio" value="2" />
<label class="choice" for="element_10_2">Unsatisfactory</label>
<input id="element_10_3" name="element_10" class="element radio" type="radio" value="3" />
<label class="choice" for="element_10_3">Not Applicable</label>

		</span> 
		</li>		<li id="li_12" >
		<label class="description" for="element_12"><b>Smoke Chamber:</b>.....................................................</label>
		<span>
			<input id="element_12_1" name="element_12" class="element radio" type="radio" value="1" />
<label class="choice" for="element_12_1">Satisfactory</label>
<input id="element_12_2" name="element_12" class="element radio" type="radio" value="2" />
<label class="choice" for="element_12_2">Unsatisfactory</label>
<input id="element_12_3" name="element_12" class="element radio" type="radio" value="3" />
<label class="choice" for="element_12_3">Not Applicable</label>

		</span> 
		</li>		<li id="li_13" >
		<label class="description" for="element_13"><b>Damper:</b>....................................................................</label>
		<span>
			<input id="element_13_1" name="element_13" class="element radio" type="radio" value="1" />
<label class="choice" for="element_13_1">Satisfactory</label>
<input id="element_13_2" name="element_13" class="element radio" type="radio" value="2" />
<label class="choice" for="element_13_2">Unsatisfactory</label>
<input id="element_13_3" name="element_13" class="element radio" type="radio" value="3" />
<label class="choice" for="element_13_3">Not Applicable</label>

		</span> 
		</li>		<li id="li_14" >
		<label class="description" for="element_14"><b>Firebox / Grate:</b>........................................................</label>
		<span>
			<input id="element_14_1" name="element_14" class="element radio" type="radio" value="1" />
<label class="choice" for="element_14_1">Satisfactory</label>
<input id="element_14_2" name="element_14" class="element radio" type="radio" value="2" />
<label class="choice" for="element_14_2">Unsatisfactory</label>
<input id="element_14_3" name="element_14" class="element radio" type="radio" value="3" />
<label class="choice" for="element_14_3">Not Applicable</label>

		</span> 
		</li>		<li id="li_15" >
		<label class="description" for="element_15"><b>Ash Container:</b>.........................................................</label>
		<span>
			<input id="element_15_1" name="element_15" class="element radio" type="radio" value="1" />
<label class="choice" for="element_15_1">Satisfactory</label>
<input id="element_15_2" name="element_15" class="element radio" type="radio" value="2" />
<label class="choice" for="element_15_2">Unsatisfactory</label>
<input id="element_15_3" name="element_15" class="element radio" type="radio" value="3" />
<label class="choice" for="element_15_3">Not Applicable</label>

		</span> 
		</li>		<li id="li_16" >
		<label class="description" for="element_16"><b>Spark Screen / Doors:</b>.............................................</label>
		<span>
			<input id="element_16_1" name="element_16" class="element radio" type="radio" value="1" />
<label class="choice" for="element_16_1">Satisfactory</label>
<input id="element_16_2" name="element_16" class="element radio" type="radio" value="2" />
<label class="choice" for="element_16_2">Unsatisfactory</label>
<input id="element_16_3" name="element_16" class="element radio" type="radio" value="3" />
<label class="choice" for="element_16_3">Not Applicable</label>

		</span> 
		</li>		<li id="li_17" >
		<label class="description" for="element_17"><b>Tools / Gloves:</b>.........................................................</label>
		<span>
			<input id="element_17_1" name="element_17" class="element radio" type="radio" value="1" />
<label class="choice" for="element_17_1">Satisfactory</label>
<input id="element_17_2" name="element_17" class="element radio" type="radio" value="2" />
<label class="choice" for="element_17_2">Unsatisfactory</label>
<input id="element_17_3" name="element_17" class="element radio" type="radio" value="3" />
<label class="choice" for="element_17_3">Not Applicable</label>

		</span> 
		</li>		<li id="li_19" >
		<label class="description" for="element_19"><b>Hearth Protection:</b>...................................................</label>
		<span>
			<input id="element_19_1" name="element_19" class="element radio" type="radio" value="1" />
<label class="choice" for="element_19_1">Satisfactory</label>
<input id="element_19_2" name="element_19" class="element radio" type="radio" value="2" />
<label class="choice" for="element_19_2">Unsatisfactory</label>
<input id="element_19_3" name="element_19" class="element radio" type="radio" value="3" />
<label class="choice" for="element_19_3">Not Applicable</label>

		</span> 
		</li>		<li id="li_5" >
		<label class="description" for="element_5"><b>Miscellanious: </b></label>
		<div>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="element_5" name="element_5" class="element text Large" size = "86" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_18" >
		<label class="description" for="element_18"><b>Stovepipe Condition (woodstove):</b>.........................</label>
		<span>
			<input id="element_18_1" name="element_18" class="element radio" type="radio" value="1" />
<label class="choice" for="element_18_1">Satisfactory</label>
<input id="element_18_2" name="element_18" class="element radio" type="radio" value="2" />
<label class="choice" for="element_18_2">Unsatisfactory</label>
<input id="element_18_3" name="element_18" class="element radio" type="radio" value="3" />
<label class="choice" for="element_18_3">Not Applicable</label>

		</span> 
		</li>		<li id="li_20" >
		<label class="description" for="element_20"><b>NFPA Approved Flue Connection:</b>..........................</label>
		<span>
			<input id="element_20_1" name="element_20" class="element radio" type="radio" value="1" />
<label class="choice" for="element_20_1">Satisfactory</label>
<input id="element_20_2" name="element_20" class="element radio" type="radio" value="2" />
<label class="choice" for="element_20_2">Unsatisfactory</label>
<input id="element_20_3" name="element_20" class="element radio" type="radio" value="3" />
<label class="choice" for="element_20_3">Not Applicable</label>

		</span> 
		</li>		<li id="li_22" >
		<label class="description" for="element_22"><b>Installation / Thimble / Clearences:</b>........................</label>
		<span>
			<input id="element_22_1" name="element_22" class="element radio" type="radio" value="1" />
<label class="choice" for="element_22_1">Satisfactory</label>
<input id="element_22_2" name="element_22" class="element radio" type="radio" value="2" />
<label class="choice" for="element_22_2">Unsatisfactory</label>
<input id="element_22_3" name="element_22" class="element radio" type="radio" value="3" />
<label class="choice" for="element_22_3">Not Applicable</label>

		</span> 
		</li>		<li id="li_21" >
		<label class="description" for="element_21"><b>Fire Ext./ Smoke Detectors / CO Alarms:</b>...............</label>
		<span>
			<input id="element_21_1" name="element_21" class="element radio" type="radio" value="1" />
<label class="choice" for="element_21_1">Satisfactory</label>
<input id="element_21_2" name="element_21" class="element radio" type="radio" value="2" />
<label class="choice" for="element_21_2">Unsatisfactory</label>
<input id="element_21_3" name="element_21" class="element radio" type="radio" value="3" />
<label class="choice" for="element_21_3">Not Applicable</label>

		</span> 
		</li>		<li id="li_23" >
		<label class="description" for="element_23"><b>Gas/Oil Furnace Flue Liner:</b>....................................</label>
		<span>
			<input id="element_23_1" name="element_23" class="element radio" type="radio" value="1" />
<label class="choice" for="element_23_1">Satisfactory</label>
<input id="element_23_2" name="element_23" class="element radio" type="radio" value="2" />
<label class="choice" for="element_23_2">Unsatisfactory</label>
<input id="element_23_3" name="element_23" class="element radio" type="radio" value="3" />
<label class="choice" for="element_23_3">Not Applicable</label>

		</span> 
		</li>		<li id="li_24" >
		<label class="description" for="element_24"><b>Fire Escape Plan:</b>.....................................................</label>
		<span>
			<input id="element_24_1" name="element_24" class="element radio" type="radio" value="1" />
<label class="choice" for="element_24_1">Satisfactory</label>
<input id="element_24_2" name="element_24" class="element radio" type="radio" value="2" />
<label class="choice" for="element_24_2">Unsatisfactory</label>
<input id="element_24_3" name="element_24" class="element radio" type="radio" value="3" />
<label class="choice" for="element_24_3">Not Applicable</label>

		</span> 
			</ul>
		
		<div id="terms">
		  <h5><b>Terms</b></h5>
		  <textarea>This inspection reports our observations of the inspected areas. In cases where we report "Unsatisfactory" these representeither a measured deviance from Code or NFPA recommendations, or our opinion is that some</textarea><textarea>deviation exists. Where/if we report "Satsifactory", we cannot and do not warranty the inspected feature. Caveat emptor.</textarea>
		</div>
		</br>
		</br>
	<div><input type="button" id="create_pdf" value="Generate PDF"></div>
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
                doc.save('CSHInspection.pdf');  
                form.width(cache_width);  
            });  
        }  
  
        // create canvas object  
        function getCanvas() {  
            form.width((a4[0] * 1.3333) + 100 ).css('none', 'none');  
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