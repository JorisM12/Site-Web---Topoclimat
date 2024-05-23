
let WEATHER_INTERPRETATION = new Object;

WEATHER_INTERPRETATION[0] = 'Soleil';
WEATHER_INTERPRETATION[1] = 'Quelques nuages';
WEATHER_INTERPRETATION[2] = 'Mitigé';
WEATHER_INTERPRETATION[3] = 'Couvert';
WEATHER_INTERPRETATION[45] = 'Brouillard';
WEATHER_INTERPRETATION[48] = 'Brouillard givrant';
WEATHER_INTERPRETATION[51] = 'Bruine';
WEATHER_INTERPRETATION[53] = 'Bruine soutenue';
WEATHER_INTERPRETATION[55] = 'Bruine';
WEATHER_INTERPRETATION[56] = 'Bruine localement verglaçante';
WEATHER_INTERPRETATION[57] = 'Bruine verglaçante';
WEATHER_INTERPRETATION[61] = 'Pluie';
WEATHER_INTERPRETATION[63] = 'Pluie modérée';
WEATHER_INTERPRETATION[66] = 'Pluie localement verglaçante';
WEATHER_INTERPRETATION[67] = 'Forte pluie';
WEATHER_INTERPRETATION[71] = 'Faible chute de neige';
WEATHER_INTERPRETATION[73] = 'Chute de neige soutenue';
WEATHER_INTERPRETATION[75] = 'Forte chute de neige';
WEATHER_INTERPRETATION[77] = 'Averses de neige';
WEATHER_INTERPRETATION[80] = 'Averses localisées';
WEATHER_INTERPRETATION[81] = 'Averses';
WEATHER_INTERPRETATION[82] = 'Averses fréquentes';
WEATHER_INTERPRETATION[85] = 'Averses de neige';
WEATHER_INTERPRETATION[86] = 'Averses de neige';
WEATHER_INTERPRETATION[95] = 'Risque d\'orages';
WEATHER_INTERPRETATION[96] = 'Orages forts';

let WEATHER_INTERPRETATION_PICTO = new Object;

WEATHER_INTERPRETATION_PICTO[0] = '/style/images/weather_map/weather_pictos/daytime/Soleil-animé.gif';
WEATHER_INTERPRETATION_PICTO[1] = '/style/images/weather_map/weather_pictos/daytime/Soleil-nuageux-3-animé.gif';
WEATHER_INTERPRETATION_PICTO[2] = '/style/images/weather_map/weather_pictos/daytime/Soleil-nuageux-3-animé.gif';
WEATHER_INTERPRETATION_PICTO[3] = '/style/images/weather_map/weather_pictos/daytime/temps-nuageux-animé.gif';
WEATHER_INTERPRETATION_PICTO[45] = '/style/images/weather_map/weather_pictos/daytime/brouillard-animé.gif';
WEATHER_INTERPRETATION_PICTO[48] = '/style/images/weather_map/weather_pictos/daytime/brouillard-givrant-animé.gif';
WEATHER_INTERPRETATION_PICTO[51] = '/style/images/weather_map/weather_pictos/daytime/Pluies-Faibles-animé.gif';
WEATHER_INTERPRETATION_PICTO[53] = '/style/images/weather_map/weather_pictos/daytime/Pluies-Faibles-animé.gif';
WEATHER_INTERPRETATION_PICTO[55] = '/style/images/weather_map/weather_pictos/daytime/Pluies-Faibles-animé.gif';
WEATHER_INTERPRETATION_PICTO[56] = '/style/images/weather_map/weather_pictos/daytime/Pluies--verglacantes-animé.gif';
WEATHER_INTERPRETATION_PICTO[57] = '/style/images/weather_map/weather_pictos/daytime/Pluies--verglacantes-animé.gif';
WEATHER_INTERPRETATION_PICTO[61] = '/style/images/weather_map/weather_pictos/daytime/Pluies-Faibles-animé.gif';
WEATHER_INTERPRETATION_PICTO[63] = '/style/images/weather_map/weather_pictos/daytime/Pluies-Modéré-animé.gif';
WEATHER_INTERPRETATION_PICTO[66] = '/style/images/weather_map/weather_pictos/daytime/Pluies--verglacantes-animé.gif';
WEATHER_INTERPRETATION_PICTO[67] = '/style/images/weather_map/weather_pictos/daytime/Pluies-fortes-animé.gif';
WEATHER_INTERPRETATION_PICTO[71] = '/style/images/weather_map/weather_pictos/daytime/neigeux-faible-animé.gif';
WEATHER_INTERPRETATION_PICTO[73] = '/style/images/weather_map/weather_pictos/daytime/neigeux-modéré-animé.gif';
WEATHER_INTERPRETATION_PICTO[75] = '/style/images/weather_map/weather_pictos/daytime/neigeux-fort-animé.gif';
WEATHER_INTERPRETATION_PICTO[77] = '/style/images/weather_map/weather_pictos/daytime/neigeux-modéré-soleil-animé.gif';
WEATHER_INTERPRETATION_PICTO[80] =  '/style/images/weather_map/weather_pictos/daytime/Pluies-Faibles-soleil-animé.gif';
WEATHER_INTERPRETATION_PICTO[81] = '/style/images/weather_map/weather_pictos/daytime/Pluies-fortes-soleil-animé.gif';
WEATHER_INTERPRETATION_PICTO[82] = '/style/images/weather_map/weather_pictos/daytime/Pluies-fortes-soleil-animé.gif';
WEATHER_INTERPRETATION_PICTO[85] = '/style/images/weather_map/weather_pictos/daytime/neigeux-modéré-soleil-animé.gif';
WEATHER_INTERPRETATION_PICTO[86] = '/style/images/weather_map/weather_pictos/daytime/neigeux-modéré-soleil-animé.gif';
WEATHER_INTERPRETATION_PICTO[95] = '/style/images/weather_map/weather_pictos/daytime/orage-simple-animé.gif';
WEATHER_INTERPRETATION_PICTO[96] = '/style/images/weather_map/weather_pictos/daytime/orage-violent-animé.gif';


let WEATHER_INTERPRETATION_PICTO_NIGHT = new Object;
WEATHER_INTERPRETATION_PICTO_NIGHT[0] = '/style/images/weather_map/weather_pictos/night/Lune-animé.gif';
WEATHER_INTERPRETATION_PICTO_NIGHT[1] = '/style/images/weather_map/weather_pictos/night/Lune-animé-2.gif';
WEATHER_INTERPRETATION_PICTO_NIGHT[2] = '/style/images/weather_map/weather_pictos/night/Lune-animé-3.gif';
WEATHER_INTERPRETATION_PICTO_NIGHT[3] = '/style/images/weather_map/weather_pictos/daytime/temps-nuageux-animé.gif';
WEATHER_INTERPRETATION_PICTO_NIGHT[45] = '/style/images/weather_map/weather_pictos/daytime/brouillard-animé.gif';
WEATHER_INTERPRETATION_PICTO_NIGHT[48] = '/style/images/weather_map/weather_pictos/daytime/brouillard-givrant-animé.gif';
WEATHER_INTERPRETATION_PICTO_NIGHT[51] = '/style/images/weather_map/weather_pictos/daytime/Pluies-Faibles-animé.gif';
WEATHER_INTERPRETATION_PICTO_NIGHT[53] = '/style/images/weather_map/weather_pictos/daytime/Pluies-Faibles-animé.gif';
WEATHER_INTERPRETATION_PICTO_NIGHT[55] = '/style/images/weather_map/weather_pictos/daytime/Pluies-Faibles-animé.gif';
WEATHER_INTERPRETATION_PICTO_NIGHT[56] = '/style/images/weather_map/weather_pictos/daytime/Pluies--verglacantes-animé.gif';
WEATHER_INTERPRETATION_PICTO_NIGHT[57] = '/style/images/weather_map/weather_pictos/daytime/Pluies--verglacantes-animé.gif';
WEATHER_INTERPRETATION_PICTO_NIGHT[61] = '/style/images/weather_map/weather_pictos/daytime/Pluies-Faibles-animé.gif';
WEATHER_INTERPRETATION_PICTO_NIGHT[63] = '/style/images/weather_map/weather_pictos/daytime/Pluies-Modéré-animé.gif';
WEATHER_INTERPRETATION_PICTO_NIGHT[66] = '/style/images/weather_map/weather_pictos/daytime/Pluies--verglacantes-animé.gif';
WEATHER_INTERPRETATION_PICTO_NIGHT[67] = '/style/images/weather_map/weather_pictos/daytime/Pluies-fortes-animé.gif';
WEATHER_INTERPRETATION_PICTO_NIGHT[71] = '/style/images/weather_map/weather_pictos/daytime/neigeux-faible-animé.gif';
WEATHER_INTERPRETATION_PICTO_NIGHT[73] = '/style/images/weather_map/weather_pictos/daytime/neigeux-modéré-animé.gif';
WEATHER_INTERPRETATION_PICTO_NIGHT[75] = '/style/images/weather_map/weather_pictos/daytime/neigeux-fort-animé.gif';
WEATHER_INTERPRETATION_PICTO_NIGHT[77] = '/style/images/weather_map/weather_pictos/night/neigeux-modéré-lune-animé.gif';
WEATHER_INTERPRETATION_PICTO_NIGHT[80] =  '/style/images/weather_map/weather_pictos/night/Pluies-Faibles-lune-animé.gif';
WEATHER_INTERPRETATION_PICTO_NIGHT[81] = '/style/images/weather_map/weather_pictos/night/Pluies-fortes-lune-animé.gif';
WEATHER_INTERPRETATION_PICTO_NIGHT[82] = '/style/images/weather_map/weather_pictos/night/Pluies-fortes-lune-animé.gif';
WEATHER_INTERPRETATION_PICTO_NIGHT[85] = '/style/images/weather_map/weather_pictos/night/neigeux-modéré-lune-animé.gif';
WEATHER_INTERPRETATION_PICTO_NIGHT[86] = '/style/images/weather_map/weather_pictos/night/neigeux-modéré-lune-animé.gif';
WEATHER_INTERPRETATION_PICTO_NIGHT[95] = '/style/images/weather_map/weather_pictos/night/orage-simple-lune-animé.gif';
WEATHER_INTERPRETATION_PICTO_NIGHT[96] = '/style/images/weather_map/weather_pictos/daytime/orage-violent-animé.gif';

let CITY_MOSELLE = new Object;

CITY_MOSELLE['METZ'] = ['4/5','5/6','10px','10px'];
CITY_MOSELLE['THIONVILLE'] = ['4/5','3/4','0px','10px'];
CITY_MOSELLE['BOUZONVILLE'] = ['6/7','4/5','0px','-15px'];
CITY_MOSELLE['FORBACH'] = ['8/9','4/5','15px','-20px'];
CITY_MOSELLE['CHATEAU-SALIN'] = ['6/7','8/9','0px','0px'];
CITY_MOSELLE['SARREBOURG'] = ['9/10','9/10','-10px','-20px'];
CITY_MOSELLE['FRANCALTROFF'] = ['8/9','7/8','0px','-25px'];
CITY_MOSELLE['BITCHE'] = ['10/11','5/6','10px','-35px'];
CITY_MOSELLE['SARREGUEMINE'] = ['9/10','5/6','-20px','-25px'];

let LOC_CITY_MOSELLE = new Object;

LOC_CITY_MOSELLE['METZ'] = ['186','133'];
LOC_CITY_MOSELLE['THIONVILLE'] = ['78','133'];
LOC_CITY_MOSELLE['BOUZONVILLE'] = ['107','243'];
LOC_CITY_MOSELLE['FORBACH'] = ['142','373'];
LOC_CITY_MOSELLE['CHATEAU-SALIN'] = ['331','256'];
LOC_CITY_MOSELLE['SARREBOURG'] = ['382','445'];
LOC_CITY_MOSELLE['FRANCALTROFF'] = ['263','365'];
LOC_CITY_MOSELLE['BITCHE'] = ['198','506'];
LOC_CITY_MOSELLE['SARREGUEMINE'] = ['194','431'];

let LOC_CITY_MEURTHE_ET_MOSELLE = new Object;

LOC_CITY_MEURTHE_ET_MOSELLE['NANCY'] = ['353','241'];
LOC_CITY_MEURTHE_ET_MOSELLE['TOUL'] = ['363','142'];
LOC_CITY_MEURTHE_ET_MOSELLE['JARNY'] = ['175','144'];
LOC_CITY_MEURTHE_ET_MOSELLE['AUDUN-LE-ROMAN'] = ['75','137'];
LOC_CITY_MEURTHE_ET_MOSELLE['BACCARAT'] = ['448','404'];
LOC_CITY_MEURTHE_ET_MOSELLE['LONGWY'] = ['15','112'];
LOC_CITY_MEURTHE_ET_MOSELLE['PONT-A-MOUSSON'] = ['259','195'];
LOC_CITY_MEURTHE_ET_MOSELLE['ROZELIEURES'] = ['447','303'];
LOC_CITY_MEURTHE_ET_MOSELLE['SAXON-SION'] = ['457','209'];
LOC_CITY_MEURTHE_ET_MOSELLE['VAL-DE-BRIEY'] = ['123','166'];

let LOC_CITY_MEUSE = new Object;

LOC_CITY_MEUSE['VERDUN'] = ['168','212'];
LOC_CITY_MEUSE['BAR-LE-DUC'] = ['315','142'];
LOC_CITY_MEUSE['CLERMONT-EN-ARGONNE'] = ['192','131'];
LOC_CITY_MEUSE['COMMERCY'] = ['326','263'];
LOC_CITY_MEUSE['ETAIN'] = ['155','273'];
LOC_CITY_MEUSE['GONDRECOURT-LE-CHATEAU'] = ['425','246'];
LOC_CITY_MEUSE['MONTMEDY'] = ['7','202'];
LOC_CITY_MEUSE['PAGNY-SUR-MEUSE'] = ['360','303'];
LOC_CITY_MEUSE['SAINT-MIHIEL'] = ['271','260'];
LOC_CITY_MEUSE['SPINCOURT'] = ['84','276'];

let LOC_CITY_VOSGES = new Object;

LOC_CITY_VOSGES['CHARMES'] = ['184','307'];
LOC_CITY_VOSGES['EPINAL'] = ['299','356'];
LOC_CITY_VOSGES['GERARDMER'] = ['327','481'];
LOC_CITY_VOSGES['MIRECOURT'] = ['224','235'];
LOC_CITY_VOSGES['NEUFCHATEAU'] = ['195','81'];
LOC_CITY_VOSGES['REMIREMONT'] = ['358','402'];
LOC_CITY_VOSGES['PLOMBIERES-LES-BAINS'] = ['387','356'];
LOC_CITY_VOSGES['SAINT-DIE-DES-VOSGES'] = ['234','514'];
LOC_CITY_VOSGES['SAINT-JULIEN'] = ['378','175'];
LOC_CITY_VOSGES['VITTEL'] = ['278','195'];



let LOC_CITY_ARDENNES = new Object;

LOC_CITY_ARDENNES['BUZANCY'] = ['350','383'];
LOC_CITY_ARDENNES['CHARLEVILLE-MEZIERES'] = ['186','291'];
LOC_CITY_ARDENNES['FLEVILLE'] = ['419','370'];
LOC_CITY_ARDENNES['LIART'] = ['189','174'];
LOC_CITY_ARDENNES['MARGUT'] = ['262','455'];
LOC_CITY_ARDENNES['MONTHOIS'] = ['406','283'];
LOC_CITY_ARDENNES['NEUVILLE-LEZ-BEAULIEU'] = ['111','162'];
LOC_CITY_ARDENNES['RETHEL'] = ['304','159'];
LOC_CITY_ARDENNES['REVIN'] = ['90','271'];
LOC_CITY_ARDENNES['SEDAN'] = ['222','349'];


let LOC_CITY_MARNE = new Object;

LOC_CITY_MARNE['AUGLURE'] = ['350','383'];
LOC_CITY_MARNE['CHALONS-EN-CHAMPAGNE'] = ['235','311'];
LOC_CITY_MARNE['CHARMONT'] = ['280','478'];
LOC_CITY_MARNE['EPERNAY'] = ['210','184'];
LOC_CITY_MARNE['MONTMIRAIL'] = ['295','43'];
LOC_CITY_MARNE['REIMS'] = ['105','199'];
LOC_CITY_MARNE['SAINTE-MENEHOULD'] = ['195','492'];
LOC_CITY_MARNE['SUIPPES'] = ['157','324'];
LOC_CITY_MARNE['VITRY-LE-FRANCOIS'] = ['375','412'];


let LOC_CITY_AUBE = new Object;

LOC_CITY_AUBE['ARCIS-SUR-AUBE'] = ['113','295'];
LOC_CITY_AUBE['AUXON'] = ['323','233'];
LOC_CITY_AUBE['BAR-SUR-AUBE'] = ['257','491'];
LOC_CITY_AUBE['BAR-SUR-SEINE'] = ['333','389'];
LOC_CITY_AUBE['DOLANCOURT-NIGLOLAND'] = ['160','431'];
LOC_CITY_AUBE['CHESLEY'] = ['387','283'];
LOC_CITY_AUBE['NOGENT-SUR-SEINE'] = ['122','103'];
LOC_CITY_AUBE['TROYES'] = ['233','284'];

let LOC_CITY_HAUTE_MARNE = new Object;

LOC_CITY_HAUTE_MARNE['CHALVRAINES'] = ['197','325'];
LOC_CITY_HAUTE_MARNE['CHAUMONT'] = ['264','224'];
LOC_CITY_HAUTE_MARNE['COUPRAY'] = ['320','162'];
LOC_CITY_HAUTE_MARNE['CUSEY'] = ['473','288'];
LOC_CITY_HAUTE_MARNE['JOINVILLE'] = ['118','216'];
LOC_CITY_HAUTE_MARNE['LA-PORTE-DU-DER'] = ['91','119'];
LOC_CITY_HAUTE_MARNE['LANGRES'] = ['376','283'];
LOC_CITY_HAUTE_MARNE['SAINT-DIZIER'] = ['22','149'];
LOC_CITY_HAUTE_MARNE['VAL-DE-MEUSE'] = ['286','352'];
LOC_CITY_HAUTE_MARNE['VILLARS-EN-AZOIS'] = ['275','110'];


let LOC_CITY_HAUT_RHIN = new Object;

LOC_CITY_HAUT_RHIN['COLMAR'] = ['166','402'];
LOC_CITY_HAUT_RHIN['FERRETTE'] = ['457','411'];
LOC_CITY_HAUT_RHIN['FESSENHEIM'] = ['253','461'];
LOC_CITY_HAUT_RHIN['GUEBWILLER'] = ['266','369'];
LOC_CITY_HAUT_RHIN['KRUTH'] = ['260','282'];
LOC_CITY_HAUT_RHIN['MULHOUSE'] = ['335','399'];
LOC_CITY_HAUT_RHIN['MUNSTER'] = ['190','341'];
LOC_CITY_HAUT_RHIN['RIBEAUVILLÉ'] = ['113','403'];
LOC_CITY_HAUT_RHIN['ROUFFACH'] = ['236','394'];
LOC_CITY_HAUT_RHIN['SAINT-LOUIS'] = ['407','491'];


let LOC_CITY_BAS_RHIN = new Object;

LOC_CITY_BAS_RHIN['BARR'] = ['330','430'];
LOC_CITY_BAS_RHIN['HAGUENAU'] = ['105','526'];
LOC_CITY_BAS_RHIN['PHILIPPSBOURG'] = ['59','471'];
LOC_CITY_BAS_RHIN['RHINAU'] = ['361','509'];
LOC_CITY_BAS_RHIN['SAVERNE'] = ['162','393'];
LOC_CITY_BAS_RHIN['SCHIRMECK'] = ['289','354'];
LOC_CITY_BAS_RHIN['SELESTAT'] = ['417','442'];
LOC_CITY_BAS_RHIN['SELTZ'] = ['54','640'];
LOC_CITY_BAS_RHIN['STRASBOURG'] = ['254','525'];
LOC_CITY_BAS_RHIN['WISSEMBOURG'] = ['5','563'];
LOC_CITY_BAS_RHIN['SARRE-UNION'] = ['67','300'];

const LOC_CITY_REGION = new Object;
LOC_CITY_REGION['ARDENNES'] = ['84','170'];
LOC_CITY_REGION['MARNE'] = ['209','136'];
LOC_CITY_REGION['AUBE'] = ['348','130'];
LOC_CITY_REGION['HAUTE-MARNE'] = ['358','261'];
LOC_CITY_REGION['MEUSE'] = ['192','277'];
LOC_CITY_REGION['MEURTHE-ET-MOSELLE'] = ['262','370'];
LOC_CITY_REGION['MOSELLE'] = ['181','410'];
LOC_CITY_REGION['VOSGES'] = ['361','407'];
LOC_CITY_REGION['HAUT-RHIN'] = ['412','529'];
LOC_CITY_REGION['BAS-RHIN'] = ['238','571'];
