/*
 * WP-Map 1.0.23 - JavaScript Vector Map
 * Copyright (c) 2013 comersis (http://comersis.com)
 */		
		
/*
 *	CONFIGURATION GENERALE
 */ 
		
		var mapfill = '#4EAB92';	// couleur du fond de carte
		var hover_fill = '#FFEA93';	// couleur au survol survol de la souris
		var mapstroke = '#333333';	// couleur des traits de régions
		var mapstroke_width = 2.5;
		
		var txtfill = '#FFFFFF';	// couleur de remplissage de la bulle texte
		var txtstroke = '#000000';	// couleur de contours de la bulle texte
		var txtfont = '#000000';	// couleur des caracteres de la bulle texte
		
		
/*
 *	CONFIGURATION DES REGIONS
 *
 *	name: 	texte affiché dans l'infobulle
 *	target:	cible du lien ( _self ou _blank)
 *	url:	lien de la page ou du script au moment du clic
 *	path:	coordonnées de la zone réactive
 */ 
var paths = {
	R100: {
		name: "Alsace",
		target: "_blank",
		url: "http://elections-urps.fr/correspondants-fni/alsace/",
		path: "M 277.2,67.1 C 273.1,66.5 269.2,65.8 265.4,65.1 C 251.8,68.7 247,82.3 251.2,105.7 C 253.8,108.1 256.2,111.6 258.6,116.1 C 260.9,114.8 263.4,114.1 265.9,114.1 C 261.8,98 265.6,82.3 277.2,67.1 z"
	},
	R101: {
		name: "Aquitaine",
		target: "_self",
		url: "http://elections-urps.fr/correspondants-fni/aquitaine/",
		path: "M 118.4,172.8 C 107.1,188.8 97.1,193.6 88.4,187.3 L 79.8,179.5 L 63.1,245.1 C 71,252.8 80.9,259.2 92.7,264 C 94,236.3 103.2,223.1 120.3,224.6 C 130.2,212.6 135.4,202.5 136.1,194.2 C 136.8,184.5 130.9,177.4 118.4,172.8 z"
	},
	R102: {
		name: "Auvergne",
		target: "_self",
		url: "http://elections-urps.fr/correspondants-fni/auvergne/",
		path: "M 190.7,184.2 C 185.5,173.6 186,163 192.2,152.4 C 185.9,149.8 178.9,145.5 171.2,139.6 C 166,144.2 160.3,147.7 154.1,150.1 C 166.5,166.4 163.8,182.9 146,199.5 C 153.5,202.5 161.3,204.3 169.6,204.7 C 176.2,205.1 183.1,204.6 190.2,203.4 C 203.5,190.6 203.7,184.2 190.7,184.2 z"
	},
	R103: {
		name: "Basse-Normandie",
		target: "_self",
		url: "http://elections-urps.fr/correspondants-fni/basse-normandie/",
		path: "M 124.1,95.5 C 126.6,91.3 127.2,86 125.8,79.8 C 124.2,73.2 120.6,65.6 114.7,56.8 C 106.1,59 95.6,55.8 83.4,47.3 L 69.7,45.8 C 75.9,56.4 78.9,67.6 78.5,79.3 C 80.6,81.5 82.3,83.6 83.6,85.8 L 124.1,95.5 z"
	},
	R104: {
		name: "Bourgogne",
		target: "_self",
		url: "http://elections-urps.fr/correspondants-fni/bourgogne/",
		path: "M 178.5,89.4 C 176.5,92.2 173.3,94.7 168.8,96.8 L 171.2,139.6 C 178.9,145.5 185.9,149.8 192.2,152.4 C 204.5,157.7 213.9,156.6 220.5,149.2 C 218.3,135.5 218.7,123.2 221.8,112.2 C 203.2,108.4 188.8,100.8 178.5,89.4 z"
	},
	R105: {
		name: "Bretagne",
		target: "_self",
		url: "http://elections-urps.fr/correspondants-fni/bretagne/",
		path: "M 10,78 L 8.3,83.8 L 18.2,83.1 L 11.7,87.4 L 18.4,92 L 10,93.3 C 13.1,98 17.1,99.7 22,98.6 C 33.7,105.4 43.7,112.1 51.9,118.7 C 80.6,109.8 91.2,98.8 83.6,85.8 C 82.3,83.6 80.6,81.5 78.5,79.3 C 61,81.2 48.8,78.3 41.8,70.8 C 29.4,71.4 18.8,73.8 10,78 z"
	},
	R106: {
		name: "Centre",
		target: "_self",
		url: "http://elections-urps.fr/correspondants-fni/centre/",
		path: "M 171.2,139.6 L 168.8,96.8 C 149.9,99.3 140.2,91.4 139.5,72.8 C 135.9,77 131.3,79.3 125.8,79.8 C 127.2,86 126.6,91.3 124.1,95.5 C 122.1,108.3 117,119.5 109.1,128.9 C 120.8,132.3 127.9,140.4 130.2,153.3 C 138.8,153.9 146.8,152.8 154.1,150.1 C 160.3,147.7 166,144.2 171.2,139.6 z"
	},
	R107: {
		name: "Champagne-Ardenne",
		target: "_self",
		url: "http://elections-urps.fr/correspondants-fni/champagne-ardenne/",
		path: "M 180,75.1 C 181.9,80.6 181.4,85.4 178.5,89.4 C 188.8,100.8 203.2,108.4 221.8,112.2 C 225.1,108.5 228.2,105.8 231.3,104 C 209.8,83.2 205.2,65.3 217.2,50.4 C 208.6,46.5 200.6,42.2 193.3,37.4 C 196.5,52.2 192.1,64.8 180,75.1 z"
	},
	R108: {
		name: "Corse",
		target: "_self",
		url: "http://elections-urps.fr/correspondants-fni/corse/",
		path: "M 281.3,240.6 L 278.7,241.6 L 278.9,249.5 C 273.9,247.6 268.9,250.1 264,256.8 C 261.4,263.3 262.3,268.2 266.8,271.5 L 271.1,287 L 279.7,291.9 C 284.3,283.1 286.4,274.3 286.3,265.5 L 283.8,251.5 C 281.6,247.5 280.8,243.9 281.3,240.6 z"
	},
	R109: {
		name: "Franche-Comté",
		target: "_self",
		url: "http://elections-urps.fr/correspondants-fni/franche-comte/",
		path: "M 231.3,104 C 228.2,105.8 225.1,108.5 221.8,112.2 C 218.7,123.2 218.3,135.5 220.5,149.2 C 222.6,154.7 228.5,154.6 238,149 C 244.1,131.2 250.9,120.3 258.6,116.1 C 256.2,111.6 253.8,108.1 251.2,105.7 C 245.2,100 238.6,99.4 231.3,104 z"
	},
	R110: {
		name: "Haute-Normandie",
		target: "_self",
		url: "http://elections-urps.fr/correspondants-fni/haute-normandie/",
		path: "M 139.5,72.8 C 141.8,70.1 143.8,66.5 145.3,62.1 C 147.7,52.6 144.3,43.6 135.1,35.2 C 130,47.5 123.2,54.7 114.7,56.8 C 120.6,65.6 124.2,73.2 125.8,79.8 C 131.3,79.3 135.9,77 139.5,72.8 z"
	},
	R111: {
		name: "Ile-de-France",
		target: "_self",
		url: "http://elections-urps.fr/correspondants-fni/ile-de-france/",
		path: "M 178.5,89.4 C 181.4,85.4 181.9,80.6 180,75.1 L 145.3,62.1 C 143.8,66.5 141.8,70.1 139.5,72.8 C 140.2,91.4 149.9,99.3 168.8,96.8 C 173.3,94.7 176.5,92.2 178.5,89.4 z"
	},
	R112: {
		name: "Languedoc-Roussillon",
		target: "_self",
		url: "http://elections-urps.fr/correspondants-fni/languedoc-roussillon/",
		path: "M 145.7,244.5 C 152.7,260.2 151.5,270.3 142,275 C 152.5,275.8 163.8,276.1 175.9,275.8 C 171.6,253.8 179.4,242.9 199.4,243.2 C 211.8,234.8 214.5,226.4 207.6,218 C 195.9,214.5 190.2,209.6 190.2,203.4 C 183.1,204.6 176.2,205.1 169.6,204.7 C 184.3,227.4 176.3,240.6 145.7,244.5 z"
	},
	R113: {
		name: "Limousin",
		target: "_self",
		url: "http://elections-urps.fr/correspondants-fni/limousin/",
		path: "M 154.1,150.1 C 146.8,152.8 138.8,153.9 130.2,153.3 C 126.1,161.1 122.2,167.5 118.4,172.8 C 130.9,177.4 136.8,184.5 136.1,194.2 C 139.5,196.5 142.8,198.2 146,199.5 C 163.8,182.9 166.5,166.4 154.1,150.1 z"
	},
	R114: {
		name: "Lorraine",
		target: "_self",
		url: "http://elections-urps.fr/correspondants-fni/lorraine/",
		path: "M 217.2,50.4 C 205.2,65.3 209.8,83.2 231.3,104 C 238.6,99.4 245.2,100 251.2,105.7 C 247,82.3 251.8,68.7 265.4,65.1 C 247.5,61.5 231.5,56.6 217.2,50.4 z"
	},
	R115: {
		name: "Midi-Pyrénées",
		target: "_self",
		url: "http://elections-urps.fr/correspondants-fni/midi-pyrenees/",
		path: "M 142,275 C 151.5,270.3 152.7,260.2 145.7,244.5 C 176.3,240.6 184.3,227.4 169.6,204.7 C 161.3,204.3 153.5,202.5 146,199.5 C 142.8,198.2 139.5,196.5 136.1,194.2 C 135.4,202.5 130.2,212.6 120.3,224.6 C 103.2,223.1 94,236.3 92.7,264 C 106.5,269.7 122.9,273.3 142,275 z"
	},
	R116: {
		name: "Nord-Pas-de-Calais",
		target: "_self",
		url: "http://elections-urps.fr/correspondants-fni/nord-pas-de-calais/",
		path: "M 159.6,5.8 L 141.4,12.5 C 140.3,18.7 138.8,24.3 137.2,29.2 C 164.3,37.6 183,40.4 193.3,37.4 C 179.9,28.5 168.7,18 159.6,5.8 z"
	},
	R117: {
		name: "Pays-de-la-Loire",
		target: "_self",
		url: "http://elections-urps.fr/correspondants-fni/pays-de-la-loire/",
		path: "M 124.1,95.5 L 83.6,85.8 C 91.2,98.8 80.6,109.8 51.9,118.7 C 65.6,129.9 74.4,140.7 78.1,151.3 C 91.1,145.4 101.4,137.9 109.1,128.9 C 117,119.5 122.1,108.3 124.1,95.5 z"
	},
	R118: {
		name: "Picardie",
		target: "_self",
		url: "http://elections-urps.fr/correspondants-fni/picardie/",
		path: "M 193.3,37.4 C 183,40.4 164.3,37.6 137.2,29.2 C 136.5,31.3 135.8,33.3 135.1,35.2 C 144.3,43.6 147.7,52.6 145.3,62.1 L 180,75.1 C 192.1,64.8 196.5,52.2 193.3,37.4 z"
	},
	R119: {
		name: "Poitou-Charentes",
		target: "_self",
		url: "http://elections-urps.fr/correspondants-fni/poitou-charentes/",
		path: "M 78.1,151.3 C 80.6,158.4 80.9,165.4 78.9,172.2 L 88.4,187.3 C 97.1,193.6 107.1,188.8 118.4,172.8 C 122.2,167.5 126.1,161.1 130.2,153.3 C 127.9,140.4 120.8,132.3 109.1,128.9 C 101.4,137.9 91.1,145.4 78.1,151.3 z"
	},
	R120: {
		name: "Provence Alpes-Côte d'Azur",
		target: "_self",
		url: "http://elections-urps.fr/correspondants-fni/provence-alpes-cote-d-azur/",
		path: "M 227.5,221.9 C 219.6,220.9 212.9,219.6 207.6,218 C 214.5,226.4 211.8,234.8 199.4,243.2 C 210.4,243.4 225.1,246.9 243.4,253.8 C 259.2,249.2 270.6,238 277.6,220.2 C 262.5,220.8 253.8,210.6 251.4,189.7 C 237.1,192.1 229.1,202.8 227.5,221.9 z"
	},
	R121: {
		name: "Rhône-Alpes",
		target: "_self",
		url: "http://elections-urps.fr/correspondants-fni/rhone-alpes/",
		path: "M 192.2,152.4 C 186,163 185.5,173.6 190.7,184.2 C 203.7,184.2 203.5,190.6 190.2,203.4 C 190.2,209.6 195.9,214.5 207.6,218 C 212.9,219.6 219.6,220.9 227.5,221.9 C 229.1,202.8 237.1,192.1 251.4,189.7 C 265.6,157.7 260.2,147.3 235,158.6 C 236,155.2 237,152 238,149 C 228.5,154.6 222.6,154.7 220.5,149.2 C 213.9,156.6 204.5,157.7 192.2,152.4 z"
	}
	
}