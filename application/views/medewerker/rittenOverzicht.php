<?php
/**
	* @file rittenOverzicht.php
	*
	* vieuw waar al de ritten van een minder mobiele persoon worden opgelijst. De eerst volgende rit zal vanboven staan.
	* - krijgt een $ritten object binnen waar al de nodige info instaat
	* - maakt gebruik van een tabel om alles weer te geven
*/
	// var_dump($ritten);
?>
<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-sm-6">
				<p>
					Naam minder mobiele filter
					<input id="mindermobieleZoeken" type="text"/>
				</p>
				<p>
					Naam vrijwilliger filter
					<input id="vrijwilligerZoeken" type="text"/>
				</p>
			</div>
			<div class="col-sm-6">
				Status
			</div>
		</div>
	</div>
</div>
<div class="card">
	<table class="table table-striped">
	  <thead>
		<tr>
		  <th scope="col">Datum</th>
		  <th scope="col">Vertrek uur</th>
		  <th scope="col">Minder mobiele</th>
		  <th scope="col">Vrijwilliger</th>
		  <th scope="col">Status</th>
		  <th scope="col"></th>
		</tr>
	  </thead>
	  <tbody>
		<?php
			foreach($ritten as $rit){
				if(!empty($rit)){
		?>
					<tr>
						<td><?php print date("d.m.y", strtotime($rit->heenvertrek->tijd));?></td>
						<td><?php print date("G:i", strtotime($rit->heenvertrek->tijd));?></td>
						<td id="mindermobiele"><?php print $rit->MM->voornaam . " " . $rit->MM->naam;?></td>
						<td id="vrijwilliger"><?php if(!empty($rit->vrijwilliger->vrijwilliger->voornaam)){
							if($rit->vrijwilliger->statusId != 1){
								print $rit->vrijwilliger->vrijwilliger->voornaam . " " . $rit->vrijwilliger->vrijwilliger->naam;
							}else{
								print "N/A";
							}
						}else{
							print "N/A";
						} ?></td>
						<td><?php
                            if ($rit->status->id == "1"){
                                print '<i class="fa fa-times fa-2x  text-danger" data-toggle="tooltip" data-placement="top" title="' . $rit->status->naam . '"></i>';
                            }else if ($rit->status->id=="2"){
                                print '<i class="fa fa-check fa-2x  text-success" data-toggle="tooltip" data-placement="top" title="' . $rit->status->naam . '"></i>';
                            }else if ($rit->status->id =="3"){
                                print '<i class="fa fa-question-circle fa-2x text-info" data-toggle="tooltip" data-placement="top" title="' . $rit->status->naam . '"></i>';
                            }else if ($rit->status->id =="4"){
                                print '<i class="fa fa-minus-circle fa-2x text-warning" data-toggle="tooltip" data-placement="top" title="' . $rit->status->naam . '"></i>';
                            }
                        ?></td>
						<td><?php print anchor(array('medewerker/rittenAfhandelen/eenRit', $rit->id), '<i class="fa fa-eye fa-2x" data-toggle="tooltip" data-placement="top" title="Bekijken"></i>'); ?></td>
					</tr>
		<?php
				}
			}
		?>
	  </tbody>
	</table>
</div>
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})


$(function() {
	// voeg data-g atribuut toe, hier komt de naam in kleine letters in te staan zodat we hier op kunnen filteren
    $('tr').each(function(){
        $(this).attr('data-g', $(this).find("#mindermobiele").text().toLowerCase());
		$(this).attr('data-v', $(this).find("#vrijwilliger").text().toLowerCase());
    })
    
	//als er iets aangepast wordt in het zoek veldje dan word er opnieuw gefilterd
	$('#mindermobieleZoeken').keyup(function(){
		groteFilter();
	});
	
	//als er iets aangepast wordt 
	$('#vrijwilligerZoeken').keyup(function(){
		groteFilter();
	});
	
	//grote filter functie, deze gaat alles filteren
	function groteFilter(){
        var mindermobiele = $('#mindermobieleZoeken').val().toLowerCase();
		var vrijwilliger = $('#vrijwilligerZoeken').val().toLowerCase();
		$('tr').hide();
		if(mindermobiele != '' && vrijwilliger == ""){
            $('tr[data-g *= ' + mindermobiele + ']').show();
        }else if(mindermobiele == '' && vrijwilliger != ""){
			gLen = vrijwilliger.length;
			for(i = 0; i< gLen; i++){
				$('tr').each(function(){
					if($(this).attr('data-v').indexOf(vrijwilliger)> -1){
						$(this).show();
					}
				})
			}
		}else if(mindermobiele != '' && vrijwilliger != ""){
			gLen = vrijwilliger.length;
			for(i = 0; i< gLen; i++){
				$('tr').each(function(){
					if($(this).attr('data-v').indexOf(vrijwilliger)> -1){
						console.log();
						if($(this).attr('data-g').indexOf(mindermobiele)> -1){
							$(this).show();
						}
					}
				})
			}
		}else{
            $('tr').show();
        }
	}	
});

</script>	