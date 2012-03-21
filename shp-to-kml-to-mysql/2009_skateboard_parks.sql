CREATE TABLE IF NOT EXISTS `skateboardparks2` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
	`lat` double NOT NULL,
	`longi` double NOT NULL,
	`TYPE` text COLLATE utf8_unicode_ci NOT NULL,
	`NOTES` text COLLATE utf8_unicode_ci NOT NULL,
	`ADDRESS` text COLLATE utf8_unicode_ci NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;

INSERT INTO `skateboardparks2` (`name`, `lat` ,`longi`, `TYPE`, `NOTES`, `ADDRESS`) VALUES
("bowl", "-76.8879025641", "45.2945427195", "bowl", "Outdoor", "100 WALTER BAKER PL Kanata"),
("bowl", "-76.7524919026", "45.3480772103", "bowl", "Outdoor", "101 CENTREPOINTE DR Nepean"),
("flat", "-76.8461627769", "45.2911957540", "flat", "Outdoor", "65 STONEHAVEN DR Kanata"),
("flat", "-76.6856460249", "45.3193063956", "flat", "Outdoor", "334 RIVER RD Gloucester"),
("flat", "-76.3305855280", "45.3950670894", "flat", "Outdoor", "8720 RUSSELL RD Cumberland"),
("flat", "-76.7489495479", "45.2831718891", "flat", "Outdoor", "110 MALVERN DR Nepean"),
("flat", "-76.6729514691", "45.2268321320", "flat", "Outdoor - Joined with basketball", "5572 DOCTOR LEACH DR Rideau"),
("flat", "-76.5967563989", "45.4424097672", "flat", "Outdoor", "2030 OGILVIE RD Gloucester"),
("flat", "-76.5581025916", "45.4364517087", "flat", "Outdoor", "190 GLEN PARK DR Gloucester"),
("flat", "-76.9144293942", "45.2595916923", "flat", "Indoor - Summer", "10 WARNER COLPITTS LANE Goulbourn"),
("flat", "-76.6962793218", "45.4128405850", "flat", "Indoor - Summer", "435 BRONSON AVE Old Ottawa"),
("flat", "-76.7341294138", "45.2860586761", "flat", "Outdoor", "700 LONGFIELDS DR Nepean"),
("flat", "-76.8950694217", "45.2616442589", "flat", "Outdoor", "1500 SHEA RD Goulbourn"),
("flat", "-76.6189017954", "45.3808464732", "flat", "Outdoor", "3142 CONROY RD Old Ottawa"),
("flat", "-76.8461326859", "45.2911947953", "flat", "Outdoor", "65 STONEHAVEN DR Kanata"),
("flat", "-77.2027049431", "45.4631102651", "flat", "Outdoor", "100 CLIFFORD CAMPBELL ST West Carleton"),
("other", "-76.5434806980", "45.4742875479", "other", "Outdoor", "1490 YOUVILLE DR Gloucester"),
("other", "-76.4551405624", "45.2392448175", "other", "Outdoor - Mobile", "2785 8TH LINE RD Osgoode"),
("other", "-76.5841455459", "45.1536983199", "other", "Outdoor - Mobile", "5660 OSGOODE MAIN ST Osgoode"),
("other", "-76.5449002526", "45.2683388319", "other", "Outdoor - Mobile", "1448 MEADOW DR Osgoode"),
("other", "-77.0906175461", "45.4942529734", "other", "Outdoor", "262 LEN PURCELL DR West Carleton");
