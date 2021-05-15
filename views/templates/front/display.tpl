{block name='page_content_container'}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js "></script>
<div style="display:flex;width:123%;">

<div style="flex-grow:3;padding:2%">

    <div class="card">
        <span><h3 class="iiitm_hotel_name_block">{$venue[0]['name']} - IIIT MANIPUR</h3></span>
        <br>
        <div style="border:1px solid black;width:680px;height:500px;">
        <img src="{$img}" width="680px" height="500px">
        </div>
    </div>

    <br>

    <div class="card">
		<div class="room_info_heading">
			<span>{l s='VENUE SEATS'}</span>
		</div>
        <h3 class="iiitm_room_seats">{$venue[0]['seats']}</h3>

        <br>

		<div class="room_info_heading">
			<span>{l s='VENUE INFORMATION'}</span>
		</div>
        <p class="iiitm_room_description">{$venue[0]['description']}</p>

        <br>

		<div class="iiitm_info_margin_div">
        	<div class="room_info_heading">
				<span>{l s='VENUE FEATURES'}</span>
			</div>
			<div class="room_info_content row">
				{foreach from=$features key=ftr_k item=ftr_v}
				<div class="col-sm-4 col-xs-12"><i class="circle-small">o</i> {$ftr_v|escape:'html':'UTF-8'}<br></div>
				{/foreach}
				</div>
			</div>
    	</div>
	</div>


    <div class="booking-form card" style="width:30%;flex-grow:2;height:70%;margin-top:2%;">
		<div class="booking_room_fields">
			<form action="modules/alenia/checkout.php" method="POST" id="addtocart">

				<input type="hidden" value={$base_dir} name="base_url">
				<input type="hidden" value={$id} name="venue_id">
				<input type="hidden" value={$venue[0]['price']} name="price">
				
				<div class="form-group htl_location_block">
					<label for="" class="control-label">{l s='VENUE LOCATION'}</label>
					<p>Imphal, Manipur, India</p>
				</div>
				<div class="row">
					<div class="form-group col-sm-6">
						<label for="room_check_in" class="control-label">{l s='Check In Date'}</label>
						<input type="date" id="checkin" class="form-control input-date" name="room_check_in" id="room_check_in" value="" required/> 
					</div>
					<div class="form-group col-sm-6">
						<label for="room_check_out" class="control-label">{l s='Check Out Date'}</label>
						<input type="date" id="checkout" class="form-control input-date" name="room_check_out" id="room_check_out" value="" autocomplete="on" required/>
					</div>
				</div>
				<div class="room_unavailability_qty_error_div"></div>
				<div class="row unvail_rooms_cond_display">
					<div class="total_price_block col-xs-7 form-group">
						<label class="control-label">{l s='Subtotal'}</label>
						<p style="font-size:30px;" id="price">₹{$venue[0]['price']}</p>
							<!-- {convertPrice price=$venue[0]['price']|floatval} -->
					</div>
				</div>

				<button type="submit" id="add2cart" name="addtocart"class="exclusive iiitm_book_now_submit" style="margin:0">
				{l s='Add to cart'}
				</button>
				<h2 id="outofstock" style="text-align:center;color:red;font-weight:bold;display:none">OUT OF STOCK!</h2>
				<h2 id="invaliddates" style="text-align:center;color:red;font-weight:bold;font-size:20px;display:none">DATES ARE NOT VALID</h2>
				</div>
			</form>
		</div>
	</div>
</div>



{/block}
<script>
	$(document).ready(function()
	{
	
		var ultimate;
		var currcheckin;
		var jsCheckin = [
			{foreach from=$checkin item=c}
				"{$c}",
			{/foreach}
		]
		
		var jsCheckout = [
			{foreach from=$checkout item=c}
				"{$c}",
			{/foreach}
		]
		var jsCP = "{$venue[0]['price']}";
		//console.log(jsCheckout);


		



		var todaydate = new Date();
		
		var todaydate1 = todaydate.toISOString().split('T')[0];
		$('#checkin').attr('min', todaydate1);
		
		todaydate.setDate(todaydate.getDate() + 1);
		var tommorow = todaydate.toISOString().split('T')[0];
		$('#checkout').attr('min', tommorow);
		
		
		
		$("#checkin").on("input", function(){
			
			currcheckin = new Date($(this).val());
			var x = new Date($(this).val());;
			//console.log("X => "+x);
			
			x.setDate(x.getDate() + 1);
			var checkout = x.toISOString().split('T')[0];
			$('#checkout').attr('min', checkout);

			var currcheckout = new Date($("#checkout").val());
			var count = currcheckout.getDate() - currcheckin.getDate();
			if(!isNaN(count))
			{
				updatedprice = count*jsCP;
				updatedprice = "₹"+updatedprice;
				$('#price').text(updatedprice);
				$('input[name=price]').val(updatedprice);
			}
			
			
			for(var i=0;i<jsCheckout.length;i++)
			{
				
				//console.log("OO => "+jsCheckin[0]);
				if(currcheckin <= new Date(jsCheckout[i]) && currcheckin >= new Date(jsCheckin[i]))
				{
					$('#add2cart').prop('disabled', true);
					$('#add2cart').hide();
					$('#outofstock').show();
					break;
				}
				/*else if(currcheckin > new Date(jsCheckout[i]))
				{
					console.log("OKAY");
					console.log("CURR => "+currcheckin);
					console.log("IN =>"+ jsCheckin[i]);
					console.log("OUT =>"+ jsCheckout[i]);
					$('#add2cart').prop('disabled', false);
					$('#add2cart').show();
					$('#outofstock').hide();

					var currcheckout = $("#checkout").val();
					console.log("INCHOUT => "+currcheckout);
					var count = currcheckout.getDate() - currcheckin.getDate();
					updatedprice = count*jsCP;
					updatedprice = "₹"+updatedprice;
					$('#price').text(updatedprice);
					$('input[name=price]').val(updatedprice);
					ultimate = jsCheckin[i+1];
				}*/
				else if(currcheckin < new Date(jsCheckin[i]) && currcheckin < new Date(jsCheckout[i]) || currcheckin > new Date(jsCheckin[i]) && currcheckin > new Date(jsCheckout[i]))
				{
					$('#add2cart').prop('disabled', false);
					$('#add2cart').show();
					$('#outofstock').hide();

					var currcheckout = new Date($("#checkout").val());
					var count = currcheckout.getDate() - currcheckin.getDate();
					if(!isNaN(count))
					{
						updatedprice = count*jsCP;
						updatedprice = "₹"+updatedprice;
						$('#price').text(updatedprice);
						$('input[name=price]').val(updatedprice);
					}
					ultimate = jsCheckin[i+1];
					if(jsCheckin.length>2)
					{
						if(!ultimate)
						{
							ultimate = jsCheckout[i];
						}
					}
				}
			}
		});
		
		$("#checkout").on("input", function(){

			var currcheckout = new Date($(this).val());
			//console.log("CURR => "+currcheckout);
			//console.log("ULTIMATE => "+ultimate);
			var currentprice = $('#price').text();

			//console.log(typeof(new Date(jsCheckout[0])));

			//var count = currcheckout.getDate() - currcheckin.getDate();
			//console.log("COUNT => "+ count);

			
			if(currcheckout <= new Date(ultimate))
			{
				//$('#price').text("₹"+jsCP);
				//console.log("OUT OF STOCK 01");
				//console.log("CURR => "+currcheckout);
				$('#add2cart').prop('disabled', true);
				$('#add2cart').hide();
				$('#outofstock').show();
			}
			else
			{
				var count = currcheckout.getDate() - currcheckin.getDate();
				updatedprice = count*jsCP;
				updatedprice = "₹"+updatedprice;
				$('#price').text(updatedprice);
				$('input[name=price]').val(updatedprice);
				//console.log("OKAY");
				//console.log("CURR => "+currcheckout);
				$('#add2cart').prop('disabled', false);
				$('#add2cart').show();
				$('#outofstock').hide();
			}
		
			// for(var i=0;i<jsCheckout.length;i++)
			// {
			// 	if(currcheckout < new Date(jsCheckout[i]) && currcheckout > new Date(jsCheckin[i]))
			// 	{
			// 		console.log("OUT OF STOCK 01");
			// 		console.log("CURR => "+currcheckout);
			// 		console.log("IN =>"+ jsCheckin[i]);
			// 		console.log("OUT =>"+ jsCheckout[i]);
			// 		$('#add2cart').prop('disabled', true);
			// 		$('#add2cart').hide();
			// 		$('#outofstock').show();
			// 		break;
			// 	}
			// 	// else if(currcheckin > new Date(jsCheckout[i]))
			// 	// {
			// 	// 	console.log("OKAY");
			// 	// 	console.log("CURR => "+currcheckin);
			// 	// 	console.log("IN =>"+ jsCheckin[i]);
			// 	// 	console.log("OUT =>"+ jsCheckout[i]);
			// 	// 	$('#add2cart').prop('disabled', false);
			// 	// 	$('#add2cart').show();
			// 	// 	$('#outofstock').hide();
			// 	// }
			// 	else
			// 	{
			// 		console.log("OKAY");
			// 		console.log("CURR => "+currcheckout);
			// 		console.log("IN =>"+ jsCheckin[i]);
			// 		console.log("OUT =>"+ jsCheckout[i]);
			// 		$('#add2cart').prop('disabled', false);
			// 		$('#add2cart').show();
			// 		$('#outofstock').hide();
			// 	}
			// }
		});
	
	});
</script>
