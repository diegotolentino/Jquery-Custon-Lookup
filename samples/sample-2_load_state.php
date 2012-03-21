<?php
/**
 * array of Options 
 * 
 * sub array is:
 * <ul>
 *   <li> 0: after selected this is value of hidden field</li>
 *   <li> 1: list display text </li>
 *   <li> 2: after selected this is value of display input</li>
 * </ul>
 */
$aOptions = array(
				/*Brazil*/
				34 => array(
							array('AC', 'Acre(AC)', 'Acre'), 
							array('AL', 'Alagoas(AL)', 'Alagoas'), 
							array('AP', 'Amapa(AP)', 'Amapa'), 
							array('AM', 'Amazonas(AM)', 'Amazonas'), 
							array('BA', 'Bahia(BA)', 'Bahia'), 
							array('CE', 'Ceara(CE)', 'Ceara'), 
							array('DF', 'Distrito Federal(DF)', 'Distrito Federal'), 
							array('ES', 'Espirito Santo(ES)', 'Espirito Santo'), 
							array('GO', 'Goias(GO)', 'Goias'), 
							array('MA', 'Maranhao(MA)', 'Maranhao'), 
							array('MT', 'Mato Grosso(MT)', 'Mato Grosso'), 
							array('MS', 'Mato Grosso do Sul(MS)', 'Mato Grosso do Sul'), 
							array('MG', 'Minas Gerais(MG)', 'Minas Gerais'), 
							array('PA', 'Para(PA)', 'Para'), 
							array('PB', 'Paraiba(PB)', 'Paraiba'), 
							array('PR', 'Parana(PR)', 'Parana'), 
							array('PE', 'Pernambuco(PE)', 'Pernambuco'), 
							array('PI', 'Piaui(PI)', 'Piaui'), 
							array('RJ', 'Rio de Janeiro(RJ)', 'Rio de Janeiro'), 
							array('RN', 'Rio Grande do Norte(RN)', 'Rio Grande do Norte'), 
							array('RS', 'Rio Grande do Sul(RS)', 'Rio Grande do Sul'), 
							array('RO', 'Rondônia(RO)', 'Rondônia'), 
							array('RR', 'Roraima(RR)', 'Roraima'), 
							array('SC', 'Santa Catarina(SC)', 'Santa Catarina'), 
							array('SP', 'Sao Paulo(SP)', 'Sao Paulo'), 
							array('SE', 'Sergipe(SE)', 'Sergipe'), 
							array('TO', 'Tocantins(TO)', 'Tocantins')),

				/*United States of America*/
				65 => array(
							array('AL', 'Alabama(AL)', 'Alabama'), 
							array('AK', 'Alaska(AK)', 'Alaska'), 
							array('AZ', 'Arizona(AZ)', 'Arizona'), 
							array('AR', 'Arkansas(AR)', 'Arkansas'), 
							array('CA', 'California(CA)', 'California'), 
							array('CO', 'Colorado(CO)', 'Colorado'), 
							array('CT', 'Connecticut(CT)', 'Connecticut'), 
							array('DE', 'Delaware(DE)', 'Delaware'), 
							array('FL', 'Florida(FL)', 'Florida'), 
							array('GA', 'Georgia(GA)', 'Georgia'), 
							array('HI', 'Hawaii(HI)', 'Hawaii'), 
							array('ID', 'Idaho(ID)', 'Idaho'), 
							array('IL', 'Illinois(IL)', 'Illinois'), 
							array('IN', 'Indiana(IN)', 'Indiana'), 
							array('IA', 'Iowa(IA)', 'Iowa'), 
							array('KS', 'Kansas(KS)', 'Kansas'), 
							array('KY', 'Kentucky(KY)', 'Kentucky'), 
							array('LA', 'Louisiana(LA)', 'Louisiana'), 
							array('ME', 'Maine(ME)', 'Maine'), 
							array('MD', 'Maryland(MD)', 'Maryland'), 
							array('MA', 'Massachusetts(MA)', 'Massachusetts'), 
							array('MI', 'Michigan(MI)', 'Michigan'), 
							array('MN', 'Minnesota(MN)', 'Minnesota'), 
							array('MS', 'Mississippi(MS)', 'Mississippi'), 
							array('MO', 'Missouri(MO)', 'Missouri'), 
							array('MT', 'Montana(MT)', 'Montana'), 
							array('NE', 'Nebraska(NE)', 'Nebraska'), 
							array('NV', 'Nevada(NV)', 'Nevada'), 
							array('NH', 'New Hampshire(NH)', 'New Hampshire'), 
							array('NJ', 'New Jersey(NJ)', 'New Jersey'), 
							array('NM', 'New Mexico(NM)', 'New Mexico'), 
							array('NY', 'New York(NY)', 'New York'), 
							array('NC', 'North Carolina(NC)', 'North Carolina'), 
							array('ND', 'North Dakota(ND)', 'North Dakota'), 
							array('OH', 'Ohio(OH)', 'Ohio'), 
							array('OK', 'Oklahoma(OK)', 'Oklahoma'), 
							array('OR', 'Oregon(OR)', 'Oregon'), 
							array('PA', 'Pennsylvania(PA)', 'Pennsylvania'), 
							array('RI', 'Rhode Island(RI)', 'Rhode Island'), 
							array('SC', 'South Carolina(SC)', 'South Carolina'), 
							array('SD', 'South Dakota(SD)', 'South Dakota'), 
							array('TN', 'Tennessee(TN)', 'Tennessee'), 
							array('TX', 'Texas(TX)', 'Texas'), 
							array('UT', 'Utah(UT)', 'Utah'), 
							array('VT', 'Vermont(VT)', 'Vermont'), 
							array('VA', 'Virginia(VA)', 'Virginia'), 
							array('WA', 'Washington(WA)', 'Washington'), 
							array('WV', 'West Virginia(WV)', 'West Virginia'), 
							array('WI', 'Wisconsin(WI)', 'Wisconsin'), 
							array('WY', 'Wyoming(WY)', 'Wyoming')));

/*find "term" search in the array*/
$aReturn = array();
$sTerm = isset($_REQUEST['term']) ? $_REQUEST['term'] : '';
$idcountry = isset($_REQUEST['idcountry']) ? $_REQUEST['idcountry'] : '';
if (isset($aOptions[$idcountry])) {
	foreach ($aOptions[$idcountry] as $val) {
		if ($sTerm) {
			/*if search*/
			if (strpos(strtoupper($val[2]), strtoupper($_REQUEST['term'])) !== false) {
				/*if term found, add item*/
				$aReturn[] = $val;
			}
		} else {
			/*if dont search add all*/
			$aReturn[] = $val;
		}
	}
}

/*json encoded return value*/
echo json_encode($aReturn);

?>