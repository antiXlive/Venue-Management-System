

<section id="wrapper">
	<div class="container">
		<section id="content">
			<div class="row">
<div class="card">
	<div class="card-header" id="shopping-cart-summary-head">
		<h3 class="accordion-header" data-toggle="collapse" data-target="#collapse-shopping-cart" aria-expanded="true" aria-controls="collapse-shopping-cart">
			<span style="color:black">{l s='Venue & Price Summary'}</span>
			<i class="icon-angle-left pull-right accordion-left-arrow {if $step->step_is_current}hidden{/if}"></i>
		</h3>
	</div>
	<h5 style="margin:30px 0px;">VENUE INFORMATION</h5>
    <div style="display:flex">
        <div style="border:1px solid white;width:100px;height:100px;">
        <img src="{$img}" width="100px" height="100px">
        </div>
        <div style="margin-left:30px;margin-top:-20px">
        <h2 style="color:black">{$venue[0]['name']}</h2>
        {foreach from=$features key=ftr_k item=ftr_v}
			<div style="display:inline-block;margin:1px 10px;border:1px solid black;padding:4px;background:#eee;color:black;border-radius:20px;">{$ftr_v}<br></div>
		{/foreach}

        <div class="total_price_block col-xs-7 form-group" style="margin-top:20px">
			<p style="font-size:22px;">
				{convertPrice price=$venue[0]['price']|floatval}
			</p>
            <p style="font-size:12px;color:grey">Total Venue Price</p>
            <p style="font-size:12px;color:grey">(Incl.) all taxes.</p>
		</div>
        </div>
    </div>
</div>

<div class="card">
<form>
	<div class="card-header" style="margin-bottom:50px"id="shopping-cart-summary-head">
		<h3 class="accordion-header" data-toggle="collapse" data-target="#collapse-shopping-cart" aria-expanded="true" aria-controls="collapse-shopping-cart">
			<span style="color:black">{l s='Your Details'}</span>
			<i class="icon-angle-left pull-right accordion-left-arrow {if $step->step_is_current}hidden{/if}"></i>
		</h3>
	</div>
    <div style="display:flex;justify-content:space-between">
	<div>
        <div style="margin-left:30px;margin-top:-20px">
		<p style="color:black;margin-bottom:-10px">First Name:</p><br>
		<input style="padding:5px;margin-bottom:10px" type="text" name="firstname" required><br>
		<p style="color:black;margin-bottom:-10px">Last Name:</p><br>
		<input style="padding:5px;margin-bottom:10px" type="text" name="lastname" required><br>
		<p style="color:black;margin-bottom:-10px">Email:</p><br>
		<input style="padding:5px;margin-bottom:10px" type="email" name="email" required>
		<p style="color:black;margin-bottom:-10px">Mobile:</p><br>
		<input style="padding:5px;margin-bottom:10px" type="text" name="email" required><br>
		{* <h1>{$is_logged}</h1> *}
		{* <h1>{$isGuest}</h1> *}
		</div>
	</div>
	
	<div style="margin-right:50px;margin-top:200px">
	<button type="submit" name="checkout" style="border:1px solid white;width:130px;height:40px;border-radius:20px;background-color:#17c717;color:white;font-weight:bold">Book Now</button>
    </div>
    </div>
</form>
</div>



</div>
</section>
</div>
</section>
