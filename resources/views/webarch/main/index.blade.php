@extends('webarch.layouts.app2')

@section('content')

 <link href="{{ asset('/basic/template/style/animate.css') }}" rel="stylesheet" type="text/css" media="screen" />
<style>


.cbig {
  
    font-size: 23px;
}

.mycolor{

	color:white;
	background-color: #29a1c4;
}


#button1{

	margin-top:30px;
	margin-left:30px;
}

.myicon{

	text-align: center;

}
.sameheight{

	height:245px;
}
.fa{

	color:black;
}
</style>
<div class="page-container row-fluid">
	<div class="page-content">
		@include('layouts/menu2')
		<div class="clearfix"></div>
		<div class="content" style="padding-top:0px">
			<div class="row">
				<div class="col-md-offset-2 col-md-8" style="margin-top:20px">
					<div class="row">
						<div class="col-md-12 spacing-bottom">
								<div class=" tiles white">
						
						<div class="tiles-body">
							<div class="row">
								<div class="col-md-8">
									<p class="cbig" style="color:red">Uw toestel in 4 stappen gerepareerd </p>
									<br/>
									  <p>Of laat toestel in onze winkels repararen.<br/>
                     Zonder afspraak binnen 1 uur gerepareerd</p>
								</div>
								<div class="col-md-4 pull-right">
									<a href="{{ route('offline-ticket') }}"><button id="button1" class="btn mycolor" type="button">  Nieuwe Reparatie Aanmelden!</button></a>
								</div>
							</div>
						</div>
					</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 spacing-bottom-sm spacing-bottom ">
							<div class="animated tada tiles white added-margin sameheight">
								<div class="tiles-body">
									 <p class="myicon"><i class=" fa-tasks fa custom-icon-space fa-5x "></i></p>
									 <h4 class="myicon" style="color:red;">Reparatie Aanmelden</h4>
									 <p class="myicon">Meld uw reparatie online en ontvang binnen enkele min<br/>
                                 (prijs-offerte-afhaal afspraak bevesteging)</p>
								</div>
							</div>
						</div>
						<div class="col-md-3 spacing-bottom-sm spacing-bottom ">
							<div class="animated tada tiles white added-margin sameheight">
								<div class="tiles-body">
									 <p class="myicon"><i class=" fa-truck fa custom-icon-space fa-5x "></i></p>
									 <h4 class="myicon" style="color:red;">Transport</h4>
									 <p class="myicon">Doors ons laten ophalen of zelf opsturen !<br/>
                                 (u betaald zelf verzend kosten en retour verzending is gratis)</p>
								</div>
							</div>
						</div>
						<div class="col-md-3 spacing-bottom-sm spacing-bottom ">
							<div class="animated tada tiles white added-margin sameheight">
								<div class="tiles-body">
									 <p class="myicon"><i class=" fa-gears fa custom-icon-space fa-5x "></i></p>
									 <h4 class="myicon" style="color:red;">T-TEL repareer uw toestel</h4>
									 <p class="myicon"> Zelfde dag nog hersteld en retour.</p>
								</div>
							</div>

						</div>	
						<div class="col-md-3 spacing-bottom-sm spacing-bottom">

							<div class="animated tada tiles white added-margin sameheight">
								<div class="tiles-body">

									 <p class="myicon"><i class=" fa-thumbs-up fa custom-icon-space fa-5x "></i></p>
									 <h4 class="myicon" style="color:red;">Betalen&amp;Ontvangs</h4>
									 <p class="myicon">Betalen&amp;Ontvangs</p>
                                 	<p>Als nodig u betaald reparatie kosten en wij sturen of 
                 					leveren na ontvangs van uw betaling</p>
								</div>

							</div>
						</div>



						</div>	

						<div class="row">
							<div class="col-md-12">
								<div class="tiles white added-margin">
									<div class="tiles-body">
										<div class="row">
											<div class="col-md-2">
												<i style="color:red;margin-top:20px;margin-left:20px" class=" fa-shopping-cart fa custom-icon-space fa-4x "></i>
											</div>
											<div class="col-md-8">
												   <!-- First line -->
                     <p class="cbig">Bezoek ook onze webshop.</p>
                     <!-- Second line -->
                     <p class="cnormal">Laagste prijzen, niewuste producten , beste service.</p><br/>
                    <p class="csmall">Abonnement of nieuwe toestel of een accessoaries bezoek onze webshop.</p>
											</div>
											<div class="col-md-2">
												<a href="<?php echo env('APP_URL')?>/web"><button style="margin-top:20px" class="btn mycolor" type="button">  <h4 style="color:white">BEZOEK !</h4></button></a>
												
											</div>
										</div>
										 
									</div>
								</div>
							</div>
						</div>		
					</div>
				</div>
			</div>
		
		</div>
	</div>
</div>

@endsection