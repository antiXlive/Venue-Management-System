<!-- Block alenia_home -->

<div class="front_venue_view">
  <h1 class="alenia_title">Our Venues</h1>
  <p style="width:30%;margin:0 auto;">Tofu helvetica leggings tattooed. Skateboard blue bottle green juice, brooklyn cardigan kitsch fap narwhal organic flexitarian.</p>
  	{foreach $allvenue as $venue}
		  <div style="width:35%;height:100%;display:inline-block;position:relative;margin-top:1.5%;margin-left:1%;">
		  	{if $venue['id'] <= 3}
			  <img style="width:100%;;height:500px" src="modules/alenia/views/img/{$venue['id']}.jpg">
			{elseif $venue['id'] > 3}
			  <img style="width:100%;;height:500px" src="upload/{$venue['name']}">
			{/if}
  			<div style="position:absolute;bottom:0%;width:100%;height:30%;background-color:rgba(255, 255, 255, 0.9);padding:0px 20px;padding-top:15px;padding-bottom:5px;">
  				<p style="float:left;font-size:18px;font-weight:bolder;">{$venue['name']}</p>
  				<p style="float:right;font-size:18px;">₹{$venue['price']} / day</p><br>
  				<p style="margin-top:3%;">{$venue['description']}</p>
  				<a href="{$module_url}?id={$venue['id']}" style="position:absolute;bottom:10%;left:40%;width:20%;height:25%;font-size:15px;"><button class="alenia_cta">Book Now</button></a>
  			</div>
  		</div>
  	{/foreach}
</div>

<!-- /Block alenia_home -->
