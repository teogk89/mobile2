@extends('basic.layouts.app')
@section('content')


<div class="cta">
               <div class="row-fluid">
                  <div class="span9">
                     <!-- First line -->
                     <p class="cbig" style="color:red;">Uw toestel in 4 stappen gerepareerd.</p><br/>
                     <!-- Second line -->
                     <p class="csmall">Of laat toestel in onze winkels repararen.<br/>
                     Zonder afspraak binnen 1 uur gerepareerd</p>
                  </div>
                  <div class="span2">
                     <!-- Button -->
                     <div class="button">
                     <?php echo'<a href="/offline_ticket.php">'; ?>
                     Nieuwe Reparatie Aanmelden!</a></div>
                  </div>
               </div>
            </div>
            
            
            <div class="row-fluid">
                        <div class="span6 ">
                        
                           <!-- Service 1. Class name - "serv-a" -->
                           <div class="serv-a animated tada">
                              <div class="serv">
                                 <div class="simg">
                                 <span style="color:red; font-size:20px;" class="pull-left">1.</span>
                                    <!-- Font awesome icon. -->
                                    <i class="icon-tasks"></i>
                                 </div>
                                 <!-- Service title -->
                                 <h4 style="color:red;">Reparatie Aanmelden</h4>
                                 <!-- Service para -->
                                 <p>Meld uw reparatie online en ontvang binnen enkele min<br/>
                                 (prijs-offerte-afhaal afspraak bevesteging)</p>
                              </div>
                           </div>
                           
                           <!-- Service 2. Class name - "serv-b" -->
                           <div class="serv-b  animated tada">
                              <div class="serv">
                                 <div class="simg">
                                     <span style="color:red; font-size:20px;" class="pull-left">2.</span>
                                    <i class="icon-truck"></i>
                                 </div>
                                 <h4 style="color:red;">Transport</h4>
                                 <p>Doors ons laten ophalen of zelf opsturen !<br/>
                                 (u betaald zelf verzend kosten en retour verzending is gratis)</p>
                              </div>
                           </div>
                           
                           <div class="clearfix"></div>
                        </div>                        
                        <div class="span6">
                        
                           <!-- Service 3. Class name - "serv-a" -->
                           <div class="serv-a animated tada">
                              <div class="serv">
                                 <div class="simg">
                                     <span style="color:red; font-size:20px;" class="pull-left">3.</span>
                                    <i class="icon-gears"></i>
                                 </div>
                                 <h4 style="color:red;">T-TEL repareer uw toestel</h4>
                                 <p><br/>
                                 Zelfde dag nog hersteld en retour.
                                 <br/><br/><br/>
                                 </p>
                              </div>
                           </div>
                           
                           <!-- Service 4. Class name - "serv-b" -->
                           <div class="serv-b animated tada">
                              <div class="serv">
                                 <div class="simg">
                                     <span style="color:red; font-size:20px;" class="pull-left">4.</span>
                                    <i class="icon-thumbs-up"></i>
                                 </div>
                                 <h4 style="color:red;">Betalen&amp;Ontvangs</h4>
                                 <p>Als nodig u betaald reparatie kosten en wij sturen of 
                                 leveren na ontvangs van uw betaling.<br/><br/>
                                 </p>
                              </div>
                           </div>
                           
                           <div class="clearfix"></div>                        
                        </div>
                     </div>
                     
                     <div class="cta">
               <div class="row-fluid">
               <div class="span2" style="margin-top:12px;">
                        
                           <!-- Service 1. Class name - "serv-a" -->
                           <div class="serv-a">
                              <div class="serv">
                                 <div class="simgb">
                                    <!-- Font awesome icon. -->
                                    <i class="icon-shopping-cart"></i>
                                 </div>
                              </div>
                           </div>
                           
                           
                           <div class="clearfix"></div>
                        </div>                
                        
                  <div class="span6">
                     <!-- First line -->
                     <p class="cbig">Bezoek ook onze webshop.</p>
                     <!-- Second line -->
                     <p class="cnormal">Laagste prijzen, niewuste producten , beste service.</p><br/>
                    <p class="csmall">Abonnement of nieuwe toestel of een accessoaries bezoek onze webshop.</p>
                  </div>
                  <div class="span2 pull-right red" style="margin-top:14px;">
                     <!-- Button -->
                     <div class="button"><a href="<?php echo env('APP_URL')?>/web"><h4>BEZOEK !</h4></a></div>
                  </div>
               </div>
            </div>
            


@stop