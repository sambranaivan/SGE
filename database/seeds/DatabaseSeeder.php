<?php

use Illuminate\Database\Seeder;

use App\consulta;
use App\encuesta;

use App\pregunta_simple;
use App\pregunta_libre;
use App\pregunta_multiple;

use App\valor_simple;
use App\valor_libre;
use App\valor_multiple;

use App\option_simple;
use App\option_multiple;

use App\hotel;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        self::createEncuesta();

    }

    private function crearHoteles()
    {
        $hoteles = 'Paraná norte;San Antonio Apipé;ALBERGUE;ALBERGUE GRAN HERMANO;3;9;María pérez;;Calle 3 y 6 S/N;;;;;;;;;;S/R**
            Paraná Sur;Bella Vista;ALBERGUE;ALBERGUE DEPORTIVO MUNICIPAL;7;60;Dependencia municipal;03777 451474/451161;RP 27 y Sta. Fe;turismoycultura@bellavista.gov.ar;;;;;;;S/R;;**
            Paraná Sur;Goya;ALBERGUE;ALBERGUE BOMBEROS;2;24;Jéfe de la Dotacion;03777-422000/100;12 de octubre y 25 de mayo;bomberosgoya@guazunet.com.ar;;;;;;;S/R;;**
            Paraná Sur;Goya;ALBERGUE;ALBERGUE CLUB ATLÉTICO UNIÓN;;45;Escobar María;03777-439893;Agustín P. Justo y Tucumán;;;;;;;;S/D;;**
            Paraná Sur;Goya;ALBERGUE;CLUB DE CAZA Y PESCA DOÑA GOYA;;;;;Puerto Goya;;;;;;;;S/D;;**
            Gran Corrientes;Capital;ALQUILERES TEMPORARIOS;REFUGIO GUARANI (Dpto.);2;3;González, María Concepción ;3794-594378;España 698;nariacgonzalez13@hotmail.com;;;;;;;C/R;;1034/15**
            Gran Corrientes;Capital;ALQUILERES TEMPORARIOS;ANIBAL GUILLERMO TOSETTI (Casa);;;Tosetti, Aníbal Guillermo;3794-702030;Mendoza 670;;;;;;;;S/D;;**
            Solar de las Huellas;Loreto;ALQUILERES TEMPORARIOS;CASA DE FAMILIA;3;10;Pis Pando, Rosa;03781 15482048/497114;Salta 107;;;;;;;;S/R;;**
            Gran Corrientes;Capital;APART HOTEL;LA ROZADA APART HOTEL;20;60;Lischinsky, Pablo;4433001/44824913;Plácido Martínez 1223;;www.larozada.com;La Rozada Suites;;;;;A/C;3;972/14**
            Gran Corrientes;Capital;APART HOTEL;DON SUITES APART HOTEL;27;62;T. de Lorenzo, María Luisa;4423433/154670049;La Rioja 442;lucia@donsuites.com.ar / info@donsuite.com.ar;www.donsuites.com;Don Suites Apart Hotel;;;;;A/C;3;451/12**
            Gran Corrientes;Capital;APART HOTEL;ASTRO APART HOTEL;27;61;Verrastro, Javier;4466112/4466125;Bolívar 1288;contacto@astroapart.com;www.astroapart.com ;Astro Apart Hotel;;;;;S/R;;**
            Gran Corrientes;Capital;APART HOTEL;APART HOTEL RIVADAVIA;13;39;;4521536;Rivadavia N° 1379;;;;;;;;A/C;3;201/17**
            Gran Corrientes;Paso de la Patria;APART HOTEL;APART ALTO PARANA;11;62;Romero Bieber, Federico;4494777/154775105/4494700;Cazadores Correntinos 123 o San Luis y Belgrano;altoparanaapart@arnetbiz.com.ar / complejoaltoparana@hotmail.com;www.apartparana.com.ar;Alto Paraná Apart;;;S/D;;;;**
            Gran Corrientes;Paso de la Patria;APART HOTEL;PUNTA IGLESIAS APART;7;36;Pérez Eduardo;362-4537094;Av. Virgen de Itatí y Miella;info@puntaiglesiasapart.com.ar;www.puntaiglesiasapart.com.ar;;;;S/D;;;;**
            Gran Corrientes;Paso de la Patria;APART HOTEL;ARREBOL COMPLEJO APART;2;6;Albarenque, Sebastián (Gerente);;Bo. Los Pescadores. Calle Pejerrey;albarenque@hotmail.com;;;;;S/D;;;;**
            Gran Corrientes;San Cosme;APART HOTEL;APART HOTEL MAINUMBY;5;25;Morales Veronica;3794-787542;J. R. Vidal esq. Cacique Guaicurarí;veronicamoralesmaciel@gmail.com ;;;;;;;S/R;;**
            Micro Región Iberá;Mercedes;APART HOTEL;APART HOTEL DON FAUSTINO;8;21;Tanara, Faustino;03777 420293;Pedro Ferré 953;faustino.tanara@gmail.com;;;;;;;S/D;;**
            Micro Región del Sur;Paso de Los Libres;APART HOTEL;DON BOSCO APARTAMENTOS;6;14;Carbonel, Rubén Marcelo;3772-522245/638538;Rivadavia Nº 1695;;;;;;;;C/R;;**
            Paraná norte;Ituzaingo;APART HOTEL;DON VIDAL;;;;03786-420616;Belgrano 1645;;;;;;;;;S/D;**
            Paraná norte;Ituzaingo;APART HOTEL;LA VALENTINA APART HOTEL;10;50;Rocco, Jorge Eduardo;03786-15610729/421721;Francisco López 1525;lavalentinaitu@gmail.com;;;;;;;A/CA;APART HOTEL 3 ESTRELLAS;210/16**
            Paraná norte;Ituzaingo;APART HOTEL;CABAÑAS CHE RECOVE POTY;7;46;Beltrán Simo, Enrique L.;03786-497539/15619130/421222;Brasil 1630 y Francisco López;cherecovepoty@yahoo.com.ar;www.cherecovepoty.com.ar;Cabañas Che Recove Poty;;;;;A/CA;APART HOTEL 3 ESTRELLAS;107/16**
            Paraná Sur;Bella Vista;APART HOTEL;RIO ARRIBA SUITES;17;45;Río Arriba S.R.L.;03777-15311296/4450376;Pedro Ferré 220;info@hotelrioarriba.com  anaachitte@hotmail.com;www.hotelrioarriba.com ;;;;;;S/R;;**
            Paraná Sur;Esquina;APART HOTEL;ESQUINA APART HOTEL;8;38;Gonzales, Mónica Silvana y Lavoratto, Paola;;Berón de Astrada entre R. Marín y J. A. Ferreyra;;;;;;;;C/R;;681/14**
            Paraná Sur;Goya;APART HOTEL;APART COSTANERA;7;30;Stortti, Vanina Paola;03777-431884;12 de octubre 831;goyaapartcostanera@hotmail.com.ar;www.goyaapartcostanera.blogspot.com;;;;;;C/R;;730/14**
            Jesuítico Guaraní;General Alvear;APART HOTEL;APART-HOTEL ALTO URUGUAY;10;30;Serpa, Eulogio Fabián;03772 471433(Fijo)/ 15510582/15416071;General Paz 932;aparthotelalvearctes@hotmail.com;;;;;;;S/R;;**
            Solar de las Huellas;Loreto;BED & BREAKFAST;LA ABUELA;1;3;Mosqueda, Nélida;03781 497702/15484586 ;Mario Bofil y 25 de Mayo;;;;;;;;S/R;;**
            Solar de las Huellas;Loreto;BED & BREAKFAST;HOSPEDAJE CUARAHY;5;19;Paez Zapini, Rita;03781-497055/0379-154380416;San Martín 610;ritapaezsapini@yahoo.com.ar;www.hospedajecuarahy.com.ar;;;;;;S/R;;**
            Gran Corrientes;Capital;BED & BREAKFAST;ÑANDE ROGA;6;22;Cipollini, María Amalia;4439401/154552138;Carlos Pellegrini 1756;reservas@ñanderogacorrientes.com.ar/nanderogahotel@hotmail.com.ar;www.nanderoga.es.tl;Hotel Ñanderoga Corrientes;;;;;A/C;BED & BREAKFAST CATEGORIA UNICA;491/12**
            Micro Región Iberá;Mercedes;BED & BREAKFAST;LA CASA DE CHINA B&B;3;6;Elizalde, María T.;03773 15627269;Fray Luis Beltrán 599;lacasadechina@hotmail.com;;;;;;;S/D;;**
            Micro Región Iberá;Mercedes;BED & BREAKFAST;MIAMBY DE ITIN LACOUR;4;12;Itin Lacour;03773 421622- 011/61755643;Belgrano Nº 520;itinlacour@yahoo.com.ar ;;;;;;;S/R;;**
            Micro Región Iberá;Mercedes;BED & BREAKFAST;CASA DE PIEDRA B&B;2;6;Perera, Aníbal;03773 15466969;El Tordo 26;silviaparera@gmail.com;www.casadepiedra.blogsport.com;;;;;;S/D;;**
            Paraná Sur;Esquina;BED & BREAKFAST;LA CASONA PESCA;8;24;Liebig, Klaus;03777-460169/412888;Mitre 691;info@lacasonapesca.com.ar;www.lacasonapesca.com.ar;;;;;;S/R;;**
            Paraná Sur;Esquina;BED & BREAKFAST;HOSPEDAJE LAURITTO;11;30;Lauritto, Carlos;03777-460131;25 de Mayo 190;carloslaurito@hotmail.com;;;;;;;S/R;;**
            Gran Corrientes;Paso de la Patria;BUNGALOW;BUNGALOWS LA CANDELARIA;6;24;Bompland, Carlos Bravo;4494692/154663878;Av. Santa Coloma y Río Paraná;lacandelariapp@yahoo.com.ar;www.lacandelariapesca.com.ar;;;;S/D;;;;**
            Gran Corrientes;Paso de la Patria;BUNGALOW;COMPLEJO VIRGEN DE ITATI;18;75;Pereyra Roberto;4494045;25 de Mayo y Jujuy;virgendeitati@hotmail.com;www.sindicatodelseguro.com;;;;S/D;;;;**
            Paraná Sur;Esquina;BUNGALOW;BUNGALOWS LOS QUINCHOS;10;36;Tognola, Arquímides;03777 460406/15336787;RN 12/J. A. Ferreira 2113;info@bungalowslosquinchos.com.ar;www.bungalowslosquinchos.com.ar;;;;;;S/R;;**
            Paraná Sur;Esquina;BUNGALOW;ÑASAINDY APART-BUNGALOW;4;18;Vallejo, Roberto;03777 15576500/460831;Para notificación:  Mitre 698;info@nasaindy.com.ar;www.nasaindy.com.ar;Ñasaindy Bungalow Esquina Corrientes;;;;;S/D;;**
            Jesuítico Guaraní;Gobernador Virasora;CABAÑA;CABAÑAS LAS AZALEAS;8;32;Muller, Alfredo Goo Kurt;03756 452062/15432191/15432548;RN 14 acceso sur Km. 745 ;cabaniaslasazaleas@yahoo.com.ar;www.cabaniaslasazaleas.com.ar;Cabañas las Azaleas;;;;;S/R;;**
            Jesuítico Guaraní;La Cruz;CABAÑA;LAS CABAÑAS;8;24;Rojas, Roberto Gerrado;03772-491153/15401733;Av. Juan Brandi y RN 14;lascabaniashotel@hotmail.com;;;;;;;S/D;;**
            Jesuítico Guaraní;Santo Tomé;CABAÑA;LAs CASITAS DE SANTINO;11;56;Martins, Susana Mabel;03756-15496892;RN 14. Km 683;lascasitasdesantino@hotmail.com;www.lascasitasdesantino.com.ar;Las Casitas de Santino;;;;;S/R;;**
            Jesuítico Guaraní;Santo Tomé;CABAÑA;COMPLEJO IPORA;10;26;Belmonte, Griselda Yolanda;03782-15433720;RN 14. Km 681;;;;;;;;S/R;;**
            Gran Corrientes;Empedrado;CABAÑA;HOTEL COSTA COCOS;16;70;Marasconi, Susana (Prof.);03624-897309 / 0362-154889241;Colonia Gdor. Soto. Lote 42 RN Km 980;costacocoshotelderio@gmail.com;;;;Alojamiento categorizado (Bungalows/cabañas);A/CA;3;128/16;;**
            Gran Corrientes;Empedrado;CABAÑA;CABAÑAS SAN ANTONIO;3;18;Moyano, Valeria;3794-044427;9 de Julio 746 esq. Cambaceres;moyano25@yahoo.com.ar;;Cabañas San Antonio;;;S/R;;;;**
            Gran Corrientes;Empedrado;CABAÑA;CABAÑAS DEL DESCANSO;3;20;Cáceres, Rito;3794491146/3794680606;Bartolomé Mitre N° 245;el.descanso@hotmail.com;;;;;S/R;;;;**
            Gran Corrientes;Empedrado;CABAÑA;CABAÑAS DOÑA KIKA;3;7;Acevedo, Héctor Dejesus;3794461422/3794250735;Roca 212;alquilerdecasaschingolo@hotmail.com;www.chingolocasaalquila.com.ar;;;;S/R;;;;**
            Gran Corrientes;Empedrado;CABAÑA;CABAÑAS LAS BARRANCAS;12;36;Rita Susana Ester Atencio de Porcel;4491604/15463603;Julio A. Roca y Río Paraná;complejoslasbarrancas@hotmail.com;;;;6 cabañas de 2 ambientes c/u (12);S/R;;;;**
            Gran Corrientes;Empedrado;CABAÑA;CABAÑAS EL ENCANTO;3;15;Paratore, Pedro;4491601;Gral. Paz 640;pedroparatore@hotmail.com;;Cabañas El Encanto Empedrado;;;C/R;;;;**
            Gran Corrientes;Empedrado;CABAÑA;CABAÑAS LA POSADA;3;24;Berdini, Zulma;4491474/154477823;Mitre 609;;;;;;S/R;;;;**
            Gran Corrientes;Empedrado;CABAÑA;CABAÑAS PUESTA DEL SOL;6;42;Pérez, Marina Angeles;4491894/154312193;9 de Julio y río Paraná;marinaluz2011@live.com.ar;www.corrientes.com.ar/puestadelsol;Cabañas Puesta del Sol;;;S/R;;;;**
            Gran Corrientes;Empedrado;CABAÑA;CAÑAÑAS ITATI;8;24;Savino Clodine;4491688/0362569789;Fanfarria Alto Parú Nº 50;cabaniasitati@yahoo.com.ar;www.cabaniasitatiempedrado.blogspot.com;;;4 cabañas con 2 habitaciones c/u (8);S/R;;;;**
            Gran Corrientes;Empedrado;CABAÑA;EL BARRANCAS;4;8;Iglesias, Jorge Omar;3774-411948;Moreno 701 (Sauce);;;;;;S/R;;;;**
            Gran Corrientes;Empedrado;CABAÑA;EL VIEJO PESCADOR;;;;3794-750558;Tucumán 745;rubendarioruffino@gmail.com;;;;;S/R;;;;**
            Gran Corrientes;Empedrado;CABAÑA;CABAÑAS EL NEGRITO;3;7;Balcazas, Gloria y Coronel ;3794491149/379425073;Bartolomé Mitre 1079;;;Cabañas el negrito;;;S/R;;;;**
            Gran Corrientes;Empedrado;CABAÑA;CABAÑAS EL DESCANSO;6;30;ramirez Monica Graciela;3794491515/3794704108;Cambaceres y 25 de Mayo;;;;;;S/R;;;;**
            Gran Corrientes;Empedrado;CABAÑA;CABAÑAS SHIRRE;2;8;Rodríguez, Carmen Mabel;3795041444;Gral. Paz 751;;;;;;S/R;;;;**
            Gran Corrientes;Empedrado;CABAÑA;CABAÑAS LELY;2;6;Rolon Audelina;3794056906;La Rioja 343;;;;;;S/R;;;;**
            Gran Corrientes;Empedrado;CABAÑA;CABAÑA LAS DOS HERMANAS;6;15;Aguirre, Esmeralda;3782523359;Bartolomé Mitre y Alsina;;;;;;S/R;;;;**
            Gran Corrientes;Empedrado;CABAÑA;CABAÑAS FEYLING;3;7;Feyling, Nicolás;3795042391;Belgrano 571;;;;;;S/R;;;;**
            Gran Corrientes;Itatí;CABAÑA;CABAÑA DE ALLÁ ITÉ;;;;154596667;;;;Cabañas Corrientes Itatí de Allá Ité;;;S/D;;;;**
            Gran Corrientes;Itatí;CABAÑA;PUERTO PARAISO;14;56;Teitelman, Daniel;03781-608648/0379-4493469;Los Benedictinos. Bº Abarapé;federicoteitelman@hotmail.com;www.puertoparaiso.com.br;Cabañas Puerto Paraíso;;;S/D;;;;**
            Gran Corrientes;Itatí;CABAÑA;LA MACARENA;5;10;Arriortua, Juan Pablo de;0364-154626788/0379-154531182;;reservas@cabañaslamacarena.com.ar;www.cabañaslamacarena.com.ar;;;;S/D;;;;**
            Gran Corrientes;Itatí;CABAÑA;CABAÑA ÑANDE RANCHO;1;6;Alcaraz, Juan Gregorio;;San Martín y Río Paraná;;;;;;S/D;;;;**
            Gran Corrientes;Itatí;CABAÑA;EL CHAQUEÑO;2;11;García, Oscar Horacio;3794-784371/8041061;Bo. Ibiray. Río Paraná y Cortada s/n;;www.cabanasycampingelchauqno.com;;;;S/R;;;;**
            Gran Corrientes;Itatí;CABAÑA;DE LUIS ANTONIO RAMIREZ;4;12;Ramírez, Luis Antonio;;San Luis del Palmar entre Villegas y San Martín;luisguiadepesca@hotmail.com.ar;;turismo y aventura;;;S/D;;;;**
            Gran Corrientes;Paso de la Patria;CABAÑA;RIO PARANA LODGE;4;16;Miraclo, Leonardo;3794-727200;Av. Cazadores Correntinos y Luis Botto;;www.rioparanalodge.com;;;;S/D;;;;**
            Gran Corrientes;Paso de la Patria;CABAÑA;CABAÑAS DON JULIAN;24;70;Lafuente, María y Andrés;4494021/024;Julián Lafuente 1881;donjulian.reservas@gmail.com;www.cabanadonjulian.com.ar;;;;C/R;;;;**
            Gran Corrientes;Paso de la Patria;CABAÑA;CABAÑAS BRISAS DEL PARANA;3;24;Becher, Juan Carlos;154202318/4418713/154389820;Surubí esq. Lapacho;brizas.del.parana@hotmail.com;www.lasbrizasdelparanablogspot.com.ar;;;;S/D;;;;**
            Gran Corrientes;Paso de la Patria;CABAÑA;COMPLEJO DE LA PENINTENCIARIA FEDERAL;8;48;López Americo;4494204- 011-57076974;Mendoza 960;americoraully@hotmail.com ;;;;;S/R;;;;**
            Gran Corrientes;Paso de la Patria;CABAÑA;CIRCULO DE SUB-OFICIALES DE LA POLICIA;10;50;Aquino, Gladis Isabel (Encargada);4490063/154865762/4494363;Pacú y Dorado s/n;copctes@arnet.com.ar;;Circulo de Suboficiales de la Policía de Corrientes;;;S/D;;;;**
            Gran Corrientes;Paso de la Patria;CABAÑA;CABAÑA DON MARCO;5;22;Forabtier, Ramón Miguel;154687964/4405609;Ruta 6. Km 3. Bo. Frutilla s/n;marcoforastier@hotmail.com;;Marco Forastier;;;S/D;;;;**
            Gran Corrientes;Paso de la Patria;CABAÑA;LA MORENA;8;24;Martínez, Héctor Rolando y Kuperrstein, Marcelo Saúl;3794-019924;Luis Botto Nº 50;malumorel@yahoo.com.ar / malumorel@hotmail.com;;La Morena Cabañas;;;S/R;;;;**
            Gran Corrientes;Paso de la Patria;CABAÑA;CABAÑAS AWAKAY ;8;40;Monguet Colombo, Ibis y Mega, Marcelo;03722-15718606/304200/710202;Chubut y Neuquén;;;Wa-Kay Cabañas;;;S/D;;;;**
            Gran Corrientes;Paso de la Patria;CABAÑA;CABAÑAS AMIRA;5;30;Nallib Skdiker, Dardo;03732-15621019/0364-154607849;Surubí 555;marthaelizabetgaleano@gmail.com ;www.cabaniasamira.com.ar;Cabañas Amira;;;S/R;;;;**
            Gran Corrientes;Paso de la Patria;CABAÑA;SOLAR DEL PASO;10;34;Cozzarini, Raúl;0379-154331905 / 0362-154261440;Urunday 1139;wensw@solardelpaso.com ;www.solardelpazo.com.ar;Solar del Paso Cabañas;;;S/R;;;;**
            Gran Corrientes;Paso de la Patria;CABAÑA;CABAÑAS EL ARENAL;;;Marasso, Mauricio Fernando;154638939;Córdoba 242;;www.cabañaselarenal.com.ar;;;;S/D;;;;**
            Gran Corrientes;Paso de la Patria;CABAÑA;CABAÑAS EL DESCANSO;2;13;Sosa, Jorge;4494333/154602395;25 de Mayo entre Sgo. del Estero y San Martín;;;Cabañas El Descanso;;;S/R;;;;**
            Gran Corrientes;Paso de la Patria;CABAÑA;CABAÑAS DE LA PATRIA SH;4;24;Graciela Tejerina y Ricardo Osuna;03717-427519/154357818;Av. Virgen de Itatí 3150;info.delapatria@gmail.com / cabaniasdelapatria@hotmail.com.ar;www.cabañasdelapatria.com.ar;;;;S/D;;;;**
            Gran Corrientes;Paso de la Patria;CABAÑA;EL TURF CABAÑAS;5;25;Lafuente, Juan Rubén;0362-154209981;Honduras s/n;info@complejoelturf.com.ar;www.complejoeklturf.com.ar;;;;S/R;;;;**
            Gran Corrientes;Paso de la Patria;CABAÑA;CABAÑAS DON ÑOLO;;;Spagnolo, Fabricio M.;0379-4427360-154532311;Pirayagua 230. Bo. Los Pescadores;;;;;;S/D;;;;**
            Gran Corrientes;Paso de la Patria;CABAÑA;CABAÑA LAS ROCAS;11;28;Margosa Pablo;03482-15581200;8 de Diciembre y Libertad;info@complejolasrocas.com.ar ;;;;;S/D;;;;**
            Gran Corrientes;Paso de la Patria;CABAÑA;CABAÑAS SUEÑO DORADO;16;40;Vallejos Griselda Elisa;4494760/154781088;Córdoba 160;luisgmacias@hotmail.com ;;Sueño Dorado Paso Patria;;;S/D;;;;**
            Gran Corrientes;Paso de la Patria;CABAÑA;COUNTRY MARINA HUESO CUE;8;64;Migliorini, Yolanda;44944265;Av. Brig. Pedro Ferré s/n;;www.marinahuesocue.com.ar;Marina Hueso Cue;;;C/R;;;;**
            Gran Corrientes;Paso de la Patria;CABAÑA;CABAÑAS DE ENSUEÑO;4;24;Ongay Jorge;3794022754/44889836;Av. Cazadores Correntino s/n;jjo54@hotmail.com;;;;;S/R;;;;**
            Gran Corrientes;Paso de la Patria;CABAÑA;CABAÑA CHAMIGO;4;24;;379-4494667;Av. Virgen de Itatí esq. Ferré;;;;;;S/D;;;;**
            Gran Corrientes;Paso de la Patria;CABAÑA;CABAÑA SAPUCAY;3;12;;;6 de Diciembre 128 (Inmobiliaria Nordeste);;;Cabañas Sapucay;;;S/D;;;;**
            Gran Corrientes;Paso de la Patria;CABAÑA;CABAÑAS BOKERON;7;28;;379-154025733/362-154645452;Av. Cazadores Correntinos 511;cabanasbokeron@gmail.com;;Cabañas Bokeron;;;S/D;;;;**
            Gran Corrientes;Paso de la Patria;CABAÑA;SAN JUAN DE LOS PESCADORES;4;12;Kalbermatter, Diego A.;;Pje. Cordobesa Cué altura Km20;diegokalbermatter@gmail.com ;;;;;C/R;;464/14;;**
            Gran Corrientes;Paso de la Patria;CABAÑA;CABAÑAS PIRACUACITO;4;16;Leguizamón, Julio Daniel;3794-668417;Av. Virgen de Itatí esq. Santo Tomé;julioleg@hotmail.com;;;;;C/R;;945/15;;**
            Gran Corrientes;Paso de la Patria;CABAÑA;QUEBRACHO BLANCO;2;12;Zurita, Norma;3795-918572;Catamarca 788;norma_piris@hotmail.com.ar;;;;;S/D;;;;**
            Gran Corrientes;San Cosme;CABAÑA;CABAÑA LO DE MOLINA;5;25;Molina, Yanina;0379 154728531;Puerto González, Km 22;;;;;;;;S/D;;**
            Gran Corrientes;San Cosme;CABAÑA;CABAÑA IARITA;6;19;Gauna, Lucía;0379 4496089;H. Irigoyen s/n;;;Cabañas Iarita San Cosme;;;;;S/R;;**
            Gran Corrientes;San Cosme;CABAÑA;CAMPING MOLINA (CABAÑAS);;;Molina, Yanina;;Puerto González, 12 Km del casco urbano;;;;;Capacidad para 100 carpas;;;S/D;;**
            Gran Corrientes;San Cosme;CABAÑA;LOS PINOS CABAÑAS Y RESTAURANT;;;Alvarez, Heberto Edgar ;;Acceso a la Laguna Totora (legal Entre Ríos 1259);;;;;;;;C/R;;**
            Gran Corrientes;San Cosme;CABAÑA;CABAÑA PUERTO ALEGRE-ECOTURISMO;;;Alvez da Silva, José;3794669722/4438461;San Martín 1033 Of. 6 Ctes. Capital;puertoalegreecotur@gmail.com / ze.alvezdasilva17@gmail.com ;;;;;;;C/R;;**
            Gran Corrientes;Santa Ana;CABAÑA;CABAÑA SAN JOSÉ;6;36;Teler, José Luis;15467815/154349792;RP 43, Km 8;;;;;;;;S/R;;**
            Gran Corrientes;Santa Ana;CABAÑA;CABAÑA PUERTO GRANDE;3;6;Alves da Silva, José;;Pje. Punta Santa Ana, Km 20 (Notif. San Martín 1033);puertoalegre-ecotur@gmail.com ;;;;;;;C/R;;1135/16**
            Gran Corrientes;Santa Ana;CABAÑA;POSADA LAS HAMACAS;3;15;Capitanich Carla;3794-245372;Calle 12 de Octubre casi el estero;;;;;;;;S/R;;**
            Micro Región Iberá;Mercedes;CABAÑA;LA RAMONA;4;8;Moulin, Celina;03773 15628632;Ruta Nº 40 Km 10;maricelmoulin@hotmail.com ;www.laramona.com.ar;Turismo La Ramona;;;;Resol. Nº 922/15;C/R;;933/15**
            Micro Región Iberá;Colonia Carlos Pellegrini;CABAÑA;EL PASO;4;27;Cabral, Armando;03773-155452017/15400274;Timbó y Yaguareté; info@elpasibera.com.ar;www.elpasoibera.com.ar;Cabañas & Posada El Paso;;;;;S/R;;**
            Micro Región Iberá;Colonia Carlos Pellegrini;CABAÑA;CABAÑAS Y CAMPING CAMBA CUÁ;6;20;Brouchoud, María Isabel;03773-15408474;RP 40 y calle Aguará;cambacuaibera@gmail.com;www.cambacuaibera.com.ar ;;;;;;S/D;;**
            Micro Región Iberá;Chavarría;CABAÑA;CABAÑA DE JUANCHO CASENAVE;4;10;Casenave, Juan;;;;;;;;;;S/D;;**
            Solar de las Huellas;Concepción;CABAÑA;CABAÑA IBERA;4;10;Ibarra, Rosa Amalia;3794400707;Calle 8 de Diciembre (entre Sarmiento y Dr. Vernengo);;;;;;;;S/R;;**
            Solar de las Huellas;Concepción;CABAÑA;CABAÑA ARERUROGA;2;5;Valenzuela, María Lidia;3782402377;Bartolomé Mitre 694;nydiavalenzuela@hotmail.com;;;;;;;S/R;;**
            Solar de las Huellas;Concepción;CABAÑA;CABAÑAS DON CIMA;2;5;Cima, Luis Alberto;3782523959;Caá Guazú 1588;;;;;;;;S/R;;**
            Solar de las Huellas;Mburucuyá;CABAÑA;CABAÑAS MBURUCUYÁ POTY;7;40;Dolce, Miriam Evelin;03794 384626/03782 15501309;General Rodríguez 651;cabanas@mburucuyapoti.com;;;;;;;A/CA;CABAÑA 3 ESTRELLAS;503/17**
            Solar de las Huellas;Mburucuyá;CABAÑA;CABAÑA DON FELIPE;4;16;González;3782441651;Rivadavia 500;nidiaobregon2017@gmail.com;;;;;;;S/R;;**
            Solar de las Huellas;Mburucuyá;CABAÑA;CABAÑAS ETERNO VERGEL;6;21;Coen, Yanina;3794687464;Sarmiento 480;eternovergel@gmail.com;;Mburucuyá Cabañas Eterno Vergel;;;;;S/R;;**
            Solar de las Huellas;Santa Rosa;CABAÑA;CABAÑA DOÑA ROSA;4;10;Santa Cruz, Julia E.;03782-508413;México s/n entre Tucumán y Corrientes;chiche_lafuente@hotmail.com;;;;;;;C/R;;1064/17**
            Solar de las Huellas;Santa Rosa;CABAÑA;CABAÑAS LA SOÑADA;6;18;Ramírez, María Soledad;3782-450794/511102;Ingreso a Bo. Llamarada;;;;;;;;S/R;;**
            Paraná norte;Yahape;CABAÑA;PUERTO PARAISO;12;36;Teitelman Daniel;3781-495336;paraje Yahapé;;www.pescaparaiso.com ;;;;;;S/D;;**
            Paraná norte;Yahape;CABAÑA;CABAÑAS GATOMORO;8;26;Gustavo Renato Rocabert;03786-154659070/154659072;paraje Yahapé;jccricabert@hotmail.com ;www.gatomoro.com ;;;;;;S/R;;**
            Paraná norte;Yahape;CABAÑA;CABAÑAS YAHAPÉ;3;9;;3794-322868;paraje Yahapé;;;;;;;;S/D;;**
            Paraná norte;Yahape;CABAÑA;CABAÑAS DEL MONTE;12;48;Gergoff Jorge;03786-15466805;paraje Yahapé;cabanadelmonte@hotmail.com ;www.cabanadelmonte.com;Cabañas del Monte;;;;;C/R;;527/16**
            Paraná norte;Itá Ibaté;CABAÑA;CABAÑA CARAYÁ DE RIO;10;40;Mancuso, Andrea Mayte;0379-154621629/03781-485149;Juan Bautista Alberdi 151;;www.cabañacaraya.com.ar / cabañascaraya.com.ar;Caraya de Rio;;;;;S/R;;**
            Paraná norte;Itá Ibaté;CABAÑA;CABAÑA PIEDRA ALTA;18;62;Fernández, Alfredo H.;3541 495136/75484583;San Martín esq. Mitre;piedra-alta@yahoo.com.ar;www.piedraalta.com.ar;Hotel y Cabañas Piedras Altas;;;;;A/CA;CABAÑAS 3 ESTRELLAS;506/127**
            Paraná norte;Itá Ibaté;CABAÑA;CABAÑA PUERTO PARAISO;12;36;Teitelman, Daniel;03781 4956336;Bartolomé Mitre s/n;puertoparaiso@arnet.com.ar;www.puertoparaiso.com.ar;Cabañas Puerto Paraíso;;;;;S/R;;**
            Paraná norte;Itá Ibaté;CABAÑA;CABAÑA ROCYMAR;2;12;Aguirre, Martín;03783-15528934;Sarmiento 1412;;;;;;;;S/D;;**
            Paraná norte;Itá Ibaté;CABAÑA;CABAÑA GUILLERMO MORALES;2;6;Morales, Guillermo;03783 495084;Belgrano 614;;;;;;;;S/R;;**
            Paraná norte;Itá Ibaté;CABAÑA;CABAÑA BARRANCAS DE BRENN;8;28;Brenn, Ernesto;03781 482667;Sarmiento y Calle 1;pescabrenn@gmail.com;www.barrancasdebrem.net;Complejo Barrancas de Brenn;;;;;S/R;;**
            Paraná norte;Itá Ibaté;CABAÑA;CABAÑAS GEMELOS;15;40;Simón, Diego y Daniel;03781 495156;Víctor Duarte 954;;;;;;;;S/R;;**
            Paraná norte;Itá Ibaté;CABAÑA;CABAÑAS DON QUICO;4;32;Soperez, Raúl;03781-495195/495227/0342-4281563;Bicentenario N° 615;cdonquico@yahoo.com.ar;www.cdonquico.com.ar;Camping y Cabañas Don Quico;;;;;S/R;;**
            Paraná norte;Itá Ibaté;CABAÑA;CABAÑA JARDIN DEL PARANA;10;30;Aquere Martín;3794-053695;Avenida Sarmiento S/N;info@jardinitaibate.com ;www.jardinitaibate.com ;Jardin del Paraná ita Ibate;;;;;S/R;;**
            Paraná norte;Ituzaingo;CABAÑA;CABAÑAS SIMONS;4;34;Simons, Inés;03755-420852/15442490;Urquiza esq. Salta;schuines@hotmail.com;;;;;;;A/CA;CABAÑA 3 ESTRELLAS;1158/16**
            Paraná norte;Ituzaingo;CABAÑA;CABAÑAS LO DE FATIMA;4;25;Colombo, Fátima;03781 420852/15617196;Posadas 1930;fatimacolombo64@hotmail.com;;Cabañas Lo de Fátima;;;;;S/R;;**
            Paraná norte;Ituzaingo;CABAÑA;CABAÑA PARANA RANCH;6;36;Benedetti, Gustavo;03781 420882;RN 12, Km 1251;paranaranch@yahoo.com.ar;www.parana-ranch.com.ar;;;;;;S/D;;**
            Paraná norte;Ituzaingo;CABAÑA;CABAÑA LOS TRONCOS;10;52;Mazanti, Fabio;03781 420335;Güemes y Mandoza;info@lostroncosituzaingo.com.ar;www.lostroncosituzaingo.com.ar;;;;;;A/CA;CABAÑAS 3 ESTRELLAS;360/16**
            Paraná norte;Ituzaingo;CABAÑA;CABAÑA EL BALCON;5;25;Vázquez Carcomo, Mirta;03781 420258;Catamarca y Pellegrini;elbalconituctes@gmail.com / elbalcon@itunet.com.ar / flialuna@itunet.com.ar;www.itunet.com.ar/elbalcon;;;;;;S/R;;**
            Paraná norte;Ituzaingo;CABAÑA;CABAÑA TIO LUCAS;8;44;Rivero, Rubén;03786-420791/421810/15615313/15615761;Mitre 1832;rivero_rube@hotmail.com;www.corrientes.com.ar/tiolucas;Cabañas Tío Lucas;;;;;S/R;;**
            Paraná norte;Ituzaingo;CABAÑA;CABAÑA LA BARCA;16;80;;03786 422154/03752 15510441;Santa Fe y Pellegrini;labarca_itu@hotmail.com;www.cabaniaslabarca.com.ar;Cabañas Camping La Barca;;;;;A/CA;CABAÑA 2 ESTRELLAS;876/16**
            Paraná norte;Ituzaingo;CABAÑA;CABAÑA EL ALJIBE;5;28;Fisch, Gerardo;03786-425293 / 15617559;Posadas y Perú;edgardofisch@gmail.com;www.complejoelaljibe.com.ar;;;;;;S/D;;**
            Paraná norte;Ituzaingo;CABAÑA;CABAÑA AGUARÁ CUA;17;90;Bonta, Carlos D.;03781 421876/421886;Salta 4270;info@aguara-cua.com.ar;www.aguara-cua.com;Cabañas aguará Cuá SRL;;;;;S/R;;**
            Paraná norte;Ituzaingo;CABAÑA;CABAÑAS SHANGRI-LA;7;30;Ferro, Ingrid;03781 15345953/15451072;Francisco López 2254;;;;;;;;A/CA;CABAÑA 2 ESTRELLAS;1041/16**
            Paraná norte;Ituzaingo;CABAÑA;COSTA SANTINO;7;37;Reidán Ulises;03786-425307/15618100;Saavedra N° 950;costasantino@hotmail.com;www.costasantino.com.ar ;Cabañas Costa Santino;;;;;S/R;;**
            Paraná norte;Ituzaingo;CABAÑA;CABAÑAS PUESTA DEL SOL;6;30;Pauluk, Edgardo Francisco;03786-420677/03755-421259-401650/15518816;Juan José Paso y Salta;dorapaw@hotmail.com;;Cabañas Puesta del Sol;;;;;S/D;;**
            Paraná norte;Ituzaingo;CABAÑA;ATARDECER ITUZAINGÓ;6;25;;3758- 15650494;Paraguay y Barrancas del Río Paraná;;;Atardecer Ituzaingó;;;;;S/D;;**
            Paraná norte;Ituzaingo;CABAÑA;DON MATHEO;;;Miño, Carlos Antonio;03786-421899/15410649;Saavedra N° 1949;;;;;;;;S/D;;**
            Paraná Sur;Bella Vista;CABAÑA;CABAÑAS EL PAJARO;2;8;Mórtola, Norberto;03777-15411817;Isla La Invernada;elpajaro_cabana@yahoo.com.ar;www.bellavistapesca.com.ar;;;;;;S/D;;**
            Paraná Sur;Bella Vista;CABAÑA;CABAÑAS BELLA VISTA;10;50;Britos de Jesús, Eleuterio;03777-451333/555/15541671;Fígaro 777;info@turismobellavista.com.ar;;;;;;;S/R;;**
            Paraná Sur;Esquina;CABAÑA;CABAÑAS EL PATO;10;30;Bengoechea, Patricia;03777 460836/15310154;Calle El Dorado S/N;cabanaelpato@uol.com.ar ;www.pescaelpato.com.ar ;;;;;;S/R;;**
            Paraná Sur;Esquina;CABAÑA;CABAÑA LA SUERTE;7;35;Aranda, Juan Pablo;03777 15404303/461314;9 de Julio y J. A. Roca;lasuerte_@hotmail.com ;www.complejolasuerte.com.ar;;;;;;S/R;;**
            Paraná Sur;Esquina;CABAÑA;CABAÑAS EL SOÑADOR;9;30;Perotti, Karina;03777-460800;RN 12 s/n, acceso norte;cabaniadelsoniador@gmail.com;www.e-portalsur.com.ar;;;;;;S/R;;**
            Paraná Sur;Esquina;CABAÑA;CABAÑAS VILLA NIÑO RUPÁ;4;20;López, Nidia;03777 460727/15606467;Serrano Soto y José Hernández;tapizcar@hotmail.com;www.villaninorupa.com.ar;;;;;;S/R;;**
            Paraná Sur;Esquina;CABAÑA;CABAÑAS EL BIGUÁ;10;40;Santos, Luis;03777 460110;Mancini 20;danielagrille@gmail.com ;;Cabañas El Bigua;;;;;S/R;;**
            Paraná Sur;Esquina;CABAÑA;CABAÑAS EL PIRAYU;4;16;Giorgi, Lito;03777 461953/15556527;9 de Julio y Río Corrientes. Quinta 1;litopirayu@hotmail.com;www.pescanet.com;;;;;;S/R;;**
            Paraná Sur;Esquina;CABAÑA;CABAÑAS QUIQUE PESCA;8;24;Pellegrini Victor J.;03777 15310237;Mitre y Leconte;quiquepesca@yahoo.com.ar;;Quique Pesca Esquina;;;;;S/R;;**
            Paraná Sur;Esquina;CABAÑA;CABAÑAS RIO MANSO;5;20;Quaranta, María Cristina;03777 460986;El Dorado s/n, quinta 2;riomanso23@hotmail.com;www.pescariomanso.com.ar;;;;;;S/R;;**
            Paraná Sur;Esquina;CABAÑA;CABAÑAS EL PARAISO;6;24;Vacheran, Dardo;03777-15416497;José Hernández 820;;;;;;;;S/D;;**
            Paraná Sur;Esquina;CABAÑA;CABAÑAS BALDI PESCA;20;58;Baldi, Miguel;03777 461945;Antártida Argentina N° 2000 B° San Fernando;baldipesca@yahoo.com.ar;www.baldipesca.com.ar;;;;;;S/R;;**
            Paraná Sur;Esquina;CABAÑA;CABAÑAS LO DE GOLY;2;8;Cocentino, Liliana;011-1554544983;Vidal 91;goly1953@yahoo.com.ar;;;;;;;S/R;;**
            Paraná Sur;Esquina;CABAÑA;CABAÑAS ARCO IRIS;5;15;Fernández Isabel María;011-1562456797/03777-467035;RN 12, acceso sur. 1ra. Sección;arcoirispesca@hotmail.com;;;;;;;S/R;;**
            Paraná Sur;Esquina;CABAÑA;RANCHO PELO LARGO;10;30;Cáceres, Rubén;03777-469016;RN 12, acceso norte;pelocasave@hotmail.com;www.elpatowebride.com.ar;Rancho Pelo Largo;;;;;S/D;;**
            Paraná Sur;Esquina;CABAÑA;CABAÑA PUESTA DEL SOL;6;14;Grela, Alicia;03777 460866/411567;Sgto. Cabral y Pujol;grelaalicia@hotmail.com ;www.corrientes.com.ar/puestadelsol;;;;;;S/R;;**
            Paraná Sur;Esquina;CABAÑA;PESQUE CON FONCHO;5;25;Arias, Leonardo;;Bo. 100 viv. Mza. B, casa 2;pesqueconponcho@hotmail.com;;;;;;;S/D;;**
            Paraná Sur;Esquina;CABAÑA;CABAÑA LA FIERITA;8;32;Domínguez, Daniel;03777 15527839/460874;José Hernández y Serrano Soto;esquinapesca@hotmail.com;www.esquinapesca.com.ar;Cabaña la Fierita;;;;;S/D;;**
            Paraná Sur;Esquina;CABAÑA;MATUTE PESCA;6;18;Capuyolo, Guillermo;;J. A. Ferreyra y Sáenz Peña;;;;;;;;C/R;;129/16**
            Paraná Sur;Esquina;CABAÑA;CABAÑA MARCE CAMERUM;6;35;Aranda, Antonio;;1ra Sección, Bo. San Fernando;;;;;;;;C/R;;106/16**
            Paraná Sur;Goya;CABAÑA;CABAÑA LO DE MEDOLY;6;28;Melody Gross Klaus;03777-427041;Paraje Remanso;;;;;;;;S/R;;**
            Paraná Sur;Goya;CABAÑA;CABAÑA DOÑA ERNESTINA;1;6;Fouin, Jorge;03777-15597880;Camino Puerto Boca;;;;;;;;S/D;;**
            Paraná Sur;Goya;CABAÑA;CABAÑAS PIRA PORA;9;46;Minestrone, Oscar;03777-427022/15566834;Patricias Argentinas S/N;pirapora@guazunet.com.ar;www.cabanapirapora.com.ar;;;;;;S/R;;**
            Paraná Sur;Goya;CABAÑA;CABAÑA EL BRUJO;1;9;Guastavino, Oscar;03777-15400303;Camino al puerto, Km 6;negroguasta@hotmail.com;www.elbrujogoya.blogspot.com;;;;;;S/D;;**
            Paraná Sur;Goya;CABAÑA;CABAÑA DON HUGO;1;6;Melana, Hugo;03777-422706;Camino al Puerto Boca;bernardobaibiene@hotmail.com;;;;;;;S/D;;**
            Paraná Sur;Goya;CABAÑA;CABAÑAS EL ALBOR;2;15;Manso, Darío César;03777-4206637;Av. Mazzantti 799;;;;;;;;S/D;;**
            Paraná Sur;Goya;CABAÑA;CABAÑA IRU HETA;3;12;Baibiene, Bernardo;03777-15479310;Av. Millar Medina S/N;bbaibiene@gmail.com;www.pescagoya.com;Cabañas Itu Heta;;;;;S/R;;**
            Paraná Sur;Goya;CABAÑA;CABAÑA PUNTA DE MILLAN;6;11;Millán, Natalia y Marcela;03777 431549/15312279;Puerto Boca;;;;;;;;S/D;;**
            Paraná Sur;Goya;CABAÑA;CABAÑA DE LA COSTA FISHING LODGE;3;17;Ferrero, María Elena;3777-257125;Camino de la cosa - Rincón de Gómez s/n;cabadelacosta@gmail.com ;;;;;;;S/D;;**
            Paraná Sur;Lavalle;CABAÑA;ATARDECER DEL PARANÁ;2;12;Martín, Gonzalo;03777-15415538/415538/421923;Islas Malvinas y Río Paraná;atardecerdelparana@hotmail.com;www.wix.com.ar;Atardecer del Paraná;;;;;S/D;;**
            Micro Región del Sur;Paso de Los Libres;CABAÑA;CABAÑAS DEL PALMAR;5;30;Renobar SRL;03772 426066;Chacra 239;;;;;;;;S/R;;**
            Solar de las Huellas;Saladas;CABAÑA;CABAÑAS COMPLEJO TURISTICO MUNICIPAL PRESIDENTE KIRCHNER;;;;3782-524769;Díaz Colodredo y Alfredo Miranda;;;;;;;;;;**
            Gran Corrientes;Empedrado;CAMPING;CAMPING RIO BONITO;;;Parodi, Lucas Marías;3794773935/1140780444;Manuel Derqui;riobonitocamping@gmail.com ;;;;;S/D;;;;**
            Solar de las Huellas;Caa Catí;CAMPING;BALNEARIO EL RINCON;9;58;Ente Municipal;03781 406478;Av. David Martínez y Gervasio Blanco;;;;;;;Camping municipal c/cabañas;S/R;;**
            Solar de las Huellas;Concepción;CAMPING;MITAÍ;;;Ríos, Lourdes;;;;;;;;;Privado;;;**
            Solar de las Huellas;Mburucuyá;CAMPING;BALNEARIO MUNICIPAL;;;Ente Municipal;;Eustaquio Miño entre Alsina y Pedro Ferré;;;;;Capacidad 200 personas;;;S/R;;**
            Solar de las Huellas;Saladas;CAMPING;CAMPING Y COMPLEJO TURÍSTICO KITNER;11;120;;;;;;;;;;Capacidad del camping 120 personas. Tres cabañas;S/D;;**
            Solar de las Huellas;Tatacuá;CAMPING;CAMPING MUNICIPAL LA SOÑADA;;;Yonchyk, Sergio;3416297976;;;;;;;;Capacidad para 1500 personas. Hay una laguna;S/R;;**
            Paraná norte;Ituzaingo;CAMPING;CAMPING EL MIRADOR;;;Solís, Ricardo Enrique;;Ruta Inter.  a Yacyretá. Rincón de Santa María;meigosos@hotmail.com;;;;;;;C/R;;131/16**
            Gran Corrientes;Paso de la Patria;CAMPING Y COMPLEJOS;COMPLEJO SINDICAL DEL DOCENTE;8;32;Romero, José (Encargado);3795-057662;12 de Octubre entre Jujuy y Libertad;;;;;;S/D;;;;**
            Gran Corrientes;Paso de la Patria;CAMPING Y COMPLEJOS;COMPLEJO PETROLERO;8;48;Lorenzo Claudio (Encargado);;Av. Prefectura Naval s/n;sintripega@ciudad.com.ar;;;;;S/R;;;;**
            Gran Corrientes;Paso de la Patria;CAMPING Y COMPLEJOS;COMPLEJO SETIA (TEXTIL);15;70;Gimenez Bernardo Angel;0379 4494175;Rivadavia y Navajas Artaza s/n;;;;;;S/R;;;;**
            Gran Corrientes;Paso de la Patria;CAMPING Y COMPLEJOS;COMPLEJO MUPAYE;30;101;Lastra Cristian;4494106/154636012;Catamarca entre Prefectura y Uruguay;complejomupaye@hotmail.com ;;Complejo Mupaye;;;S/R;;;;**
            Gran Corrientes;Paso de la Patria;CAMPING Y COMPLEJOS;COMPLEJO PASO DEL REY;14;70;Gualtieri Raúl;;Lapacho 200. Bo. Jardín;info@complejopasodelrey.com;www.complejopasodelrey.com;Complejo Paso del Rey;;;S/R;;;;**
            Gran Corrientes;Paso de la Patria;CAMPING Y COMPLEJOS;SINDICATO DEL SEGURO DE LA REPUBLICA;18;70;Vaspag, Miguel Angel;0379 4494045;Jujuy 97;;;;;;S/D;;;;**
            Gran Corrientes;Paso de la Patria;CAMPING Y COMPLEJOS;COMPLEJO LAS ROCAS;3;18;Piccoli, Claudia del Carmen;03782-15551200/15421334;8 de Diciembre 1169;info@complejolasrocas.com.ar;www.complejolasrocas.com.ar;Complejo Las Rocas;;;S/D;;;;**
            Paraná Sur;Goya;CASA DE CAMPO;CASA DE CAMPO GOETZE;1;6;Goetze, Juan Martín;03777-15599183;Carolina frente al hoyo 18 del Golf Club;;www.quintagoetze.com.ar;;;;;;S/D;;**
            Paraná Sur;Goya;CASA DE CAMPO;CASA DE CAMPO PEKY BAIBIENE;1;6;Baibiene, Pedro;03777-15513799;Pje. El Remanso;;;;;;;;S/D;;**
            Paraná Sur;Goya;CASA DE CAMPO;CASA DE CAMPO ZOLEZI MARIA DELICIA;4;12;Zolezi, María Delicia;03777-15446333;Pje. El Remanso;;;;;;;;S/D;;**
            Solar de las Huellas;Concepción;CASA DE FAMILIA;IBERA RAPE;4;8;Leguizamón, Cirilo y Arregín, Elsa;3782-486823;Bo. 40 vdas. Casa 1B;joseciriloleguizamon2015@hotmail.com;;Comedor Hospedaje Bar;;;;;S/R;;**
            Solar de las Huellas;Concepción;CASA DE FAMILIA;ÑANGAPIRÍ TUJÁ;2;6;Escobar, Mirta;3782-497116;Caá Guazú Nº 21;vivi_card@hotmail.com;;Nangapirí Tujá;;;;;S/R;;**
            Solar de las Huellas;Concepción;CASA DE FAMILIA;HOSPEDAJE CASA NIZ;3;8;Niz, Alberto;0379-400734/03782497257;Bo. 40 vdas. Grupo 1. Casa 13;albertoniz67@hotmail.com;;;;;;;S/R;;**
            Solar de las Huellas;Concepción;CASAS DE ALQUILER;CASA JACARANDA;2;5;Abalos, Antonia;3794381286;Bo. Corazón de Jesús. Casa 19. Sector 2;nuevodeanto@hotmail.com;;;;;;;S/R;;**
            Solar de las Huellas;Concepción;CASAS DE ALQUILER;BARBERAN NORMA;2;5;Barberán, Norma;3782547105;Bo. 30 viv. Casa 3;;;Norma Barberán;;;;;S/R;;**
            Paraná Sur;Goya;COMPLEJO ;COMPLEJO RED BEANS FISHING;4;12;Compá, Pablo;03777 15305430/15305448;Camino a Puerto Goya cerca de Prefectura;reservas@redbeansfishing.com.ar;www.redbeansfishing.com.ar;;;;;;S/D;;**
            Jesuítico Guaraní;La Cruz;DEPARTAMENTOS;DEPARTAMENTOS ELENA;;;Silveira, Elena;03772-438429;Remedios de Escalada de San Martín s/n;;;;;;;;S/D;;**
            Jesuítico Guaraní;Yapeyú;ESTANCIA;ESTANCIA YAPEYÚ;11;27;Vialelo, Guillermo y Cabiglia, Mercedes Julia;03772-15447308;RN 14, Km 560;;www.estanciayapeyu.com.ar;Estancia Yapeyú;;;;;S/R;;**
            Paraná Sur;Santa Lucía;ESTANCIA;ESTANCIA LA CORRENTINA;8;16;López, Víctor Manuel;;;;;;;;;;S/D;;**
            Jesuítico Guaraní;La Cruz;ESTANCIA TURÍSTICA;ESTANCIA LAS PALMAS;7;20;Toledo, José L.;03772-15465361;RP 114;hotel-estancialaspalmas@hotmail.com;;;;;;;S/D;;**
            Jesuítico Guaraní;La Cruz;ESTANCIA TURÍSTICA;ESTANCIA SAN JOAQUIN;;;;03772-154635327;RP 114;;;;;;;;S/D;;**
            Jesuítico Guaraní;Santo Tomé;ESTANCIA TURÍSTICA;ESTANCIA SANTA BARBARA;2;6;Bertram, María Teresa;03756-15613533/421343;RN 14. Km 698;martecue@hotmail.com;;;;;;;S/R;;**
            Micro Región Iberá;Mercedes;ESTANCIA TURÍSTICA;ESTANCIA EL DORADO;3;7;Sánchez, Carlos;03773-420660;RP 29;estanciaeldorado@hotmail.com;www.eldoradofishing.com.ar;Estancia El Dorado;;;;;S/D;;**
            Micro Región Iberá;Mercedes;ESTANCIA TURÍSTICA;ESTANCIA RINCÓN DEL DIABLO;14;28;Cemborain, Luis A.;03773 420103-16629698;Av. Atanasio Aguirre, Km 1;ibera@rincondeldiablo.com.ar;www.rincondeldiablo.com.ar;Estancia Rincón del Diablo;;;;;S/D;;**
            Micro Región Iberá;Mercedes;ESTANCIA TURÍSTICA;"PIRA LODGE ""IN SEARCH OF GOLD""";5;10;Nervouss Waters;03773 420399-43310444;4ta. Sección Rural;info@piralodge.com;www.piralodge.com;;;;;;S/D;;**
            Micro Región Iberá;Mercedes;ESTANCIA TURÍSTICA;ESTANCIAS DEL IBERA;5;10;Estancias del Iberá SA;011-156713273;San Martín 50, Piso 3. CABA;rosario@nervouswaters.com;;;;;;Resol. Nº 1006/15;C/R;;1006/15**
            Micro Región Iberá;Colonia Carlos Pellegrini;ESTANCIA TURÍSTICA;ESTANCIA RINCÓN DEL SOCORRO;6;22;Consecionaria Verdaguer, Valeria;03773-15475114;RP 40, Km 83;info@delsocorro.com;www.rincondelsocorro.com;Estancia Rincón del Socorro;;;;ESTANCIA TURISTICA;A/CA;ESTANCIA TURISTICA;325/17**
            Solar de las Huellas;Loreto;ESTANCIA TURÍSTICA;"ESTANCIA ""SAN JUAN PORIAJHU""";9;27;García Rans, Marcos;03781-15608674/15609658;Ruta Nac. 118 km 178;sanjuanporiajhu@hotmail.com;;;;;;;S/R;;**
            Paraná norte;Itá Ibaté;ESTANCIA TURÍSTICA;ESTANCIA DON CINDO;8;25;Chequin, Nancy y Moncada, Vicente;0379 15-4600-683;RN 12, Km 1178;navisrl@hotmail.com / nancychequin@hotmail.com ;;;;;;;C/R;;1321/16**
            Paraná norte;Ituzaingo;ESTANCIA TURÍSTICA;ESTANCIA SAN GARA;15;40;Panzarini Lanusse, Martin;03783-15582779/15381231;RN 12, Km 1237;estanciasangara@gmail.com;www.estanciasangara.com.ar;Estancia San Gara;;;;;S/D;;**
            Paraná Sur;Esquina;ESTANCIA TURÍSTICA;ESTANCIA BUENA VISTA;8;24;Las Camelias S.A.;03777-460169/412888;3ra sección, Pasaje Los Laureles;info@estanciabuenavista.com.ar;www.estanciabuenavista.com.ar;Estancia Buena Vista;;;;;S/R;;**
            Paraná Sur;Esquina;ESTANCIA TURÍSTICA;ESTANCIA LA MORENA;6;16;Bonelli, Sebastián;03777 468032/418028;Av. Mitre 450 (para notificaciones);lamorena@cvenet.com.ar;www.lamorena.com.ar;La Morena Turismo Estancia;;;;;S/D;;**
            Paraná Sur;Esquina;ESTANCIA TURÍSTICA;ESTANCIA LA PELADA;5;10;Rohner, Augusto;03777 15419616;RP 30;estancialapelada@yahoo.com.ar;www.lapeladalodge.com.ar;Estancia La Pelada;;;;;S/R;;**
            Paraná Sur;Esquina;ESTANCIA TURÍSTICA;ESTANCIA LA ROSITA;8;20;Cometta, Alicia-Fer Landgraf;011-1560525566;RP N° 51 Km 3,2;info@estancialarosita.com ;www.estancialarosita.com.ar;Estancia La Rosita;;;;;S/R;;**
            Paraná Sur;Esquina;ESTANCIA TURÍSTICA;ESTANCIA LA BRAVA;5;10;Fernández Codazzi, Damián I.;03777-15535211;Arroyo Aguará;labrava@fibertel.com.ar;www.estancialabrava.com.ar ;Estancia La Brava Esquina;;;;;S/D;;**
            Paraná Sur;Esquina;ESTANCIA TURÍSTICA;ESTANCIA DON JOAQUIN;8;16;Solanet, Angeles de;011-15-54667223;RN 12, Km 6;info@estanciadonjoaquin.com.ar;www.estanciadonjoaquin.com.ar;;;;;;S/R;;**
            Paraná Sur;Esquina;ESTANCIA TURÍSTICA;MOMBIRÍ;6;15;Kelly, Andrés;011-1557680107;Guaiquiraró;info@mombiri.com.ar;www.mombiri.com.ar;Finca Mombirí;;;;;S/D;;**
            Paraná Sur;Goya;ESTANCIA TURÍSTICA;ESTANCIA LA PERLA;3;15;Osella Bernarda;03777-15471999;a 26 km de Goya;berni_osella@hotmail.com ;;;;;;;S/D;;**
            Paraná Sur;Goya;ESTANCIA TURÍSTICA;ESTANCIA SAN ERASMO;3;12;Arce Lucio;03777-15569591;a 40 Km de Goya;goyatradicionalista@hotmail.com ;;;;;;;S/D;;**
            Paraná Sur;Goya;ESTANCIA TURÍSTICA;ESTANCIA SAN ANDRÉS;3;12;;;;coty07@hotmail.com ;;;;;;;S/D;;**
            Gran Corrientes;San Cosme;ESTANCIA TURÍSTICA;ESTANCIA CAMINO REAL;2;10;Sico, Pedro;0379 154617394/4436102;Ruta 1 Costa Toledo;estanciacaminoreal@hotmail.com;www.estanciacaminoreal.com.ar;Estancia Camino Real;;2 Cabañas, 10 plazas;;;S/D;;**
            Micro Región del Sur;Sauce;ESTANCIA TURÍSTICA;ESTANCIA LA MAKITA;2;7;Winkler, Leticia M.;;A 20 Km de Sauce-Paraje Cañadita;leticiawinkler@hotmail.com;;;;;;;S/R;;**
            Micro Región del Sur;Sauce;ESTANCIA TURÍSTICA;ESTANCIA LOS PINOS;1;5;Wetzel, Otto;03774-15402440;4ta sección dep. Sauce;;;;;;;;S/R;;**
            Micro Región del Sur;Sauce;ESTANCIA TURÍSTICA;ESTANCIA LA GLORIA;3;9;Wetzel, Otto;03774-15635979;3ra sección;;;;;;;;S/R;;**
            Jesuítico Guaraní;General Alvear;HOSPEDAJE;HOSPEDAJE MANITO;10;30;Collinet, Maximiliano;03772 470431;Isaco Abitbol y Sussini;lauracollinet@hotmail.com;;;;;;;S/R;;**
            Jesuítico Guaraní;La Cruz;HOSPEDAJE;HOSPEDAJE UNION;;;Unión y Av. Sarmiento;037725-433977;;;;;;;;;S/D;;**
            Jesuítico Guaraní;Santo Tomé;HOSPEDAJE;HOSPEDAJE ATALAYA;8;40;Gómez, Ramón;03756-15611133;Ruta 94 s/n;;;;;;;;S/D;;**
            Jesuítico Guaraní;Yapeyú;HOSPEDAJE;HOSPEDAJE DA SILVA;4;10;Da Silva, Alejandro César;3772 429044;Sgto. Cabral s/n esq. Adolfo Flores Meza;alejandrocesards007@outlook.comn.ar;;;;;;;S/R;;**
            Jesuítico Guaraní;Yapeyú;HOSPEDAJE;RESIDENCIAL MI SUEÑO (PROYECTO);4;16;Jorge L. Soto;3772-417281;Obispo Romero Nº 802 esquina Yapeyú;jorgelsoto10@hotmail.com ;;;;;;;S/R;;**
            Jesuítico Guaraní;Yapeyú;HOSPEDAJE;HOSPEDAJE ELSARA;4;16;Rodríguez, Karina;0230 15-4479-332;RP 122, acceso Yapeyú;karinamr664@gmail.com;;;;;;;S/R;;**
            Gran Corrientes;Capital;HOSPEDAJE;HOSPEDAJE SAN LORENZO;20;40;Montenegro, Víctor E.;4421740/154523780;San Lorenzo 1136;info@hospedajesanlorenzo.com.ar/montenegroestoanoff_srl@hotmail.com;www.hospedajesanlorenzo.com.ar;Hospedaje San Lorenzo;;;;;S/R;;**
            Gran Corrientes;Capital;HOSPEDAJE;HOSPEDAJE ARTIGAS;23;62;Rosa, Duarte;4461745/4432361;Av. Artigas 1269;;;;;;;;S/D;;**
            Gran Corrientes;Capital;HOSPEDAJE;HOSPEDAJE BRASIL;18;57;Prose, Pablo César;4444138;Av. Maipú 2400;hotel-brasil@hotmail.com;;;;;;;S/D;;**
            Gran Corrientes;Capital;HOSPEDAJE;HOSPEDAJE DON JOSE;8;16;Ranalle, Daniel Gustavo;4442592;Av. Maipú 2496;;;;;;;;S/D;;**
            Gran Corrientes;Capital;HOSPEDAJE;HOSPEDAJE RANALLI;8;24;Ranalli Edi Martha;4441341;Avda. Maipú 2492;;;;;;;;S/D;;**
            Gran Corrientes;Itatí;HOSPEDAJE;HOSPEDAJE EL COLONIAL;14;20;Gervasoni, Marta;4493050/154407426;Desiderio Sosa 731;cel_08_merc@hotmail.com;;;;;S/D;;;;**
            Gran Corrientes;Itatí;HOSPEDAJE;HOSPEDAJE VIRGEN DE ITATI;10;40;Estoup, Victorino;4493576;Desidierio Sosa 650;;;;;;S/D;;;;**
            Gran Corrientes;Itatí;HOSPEDAJE;HOSPEDAJE LAS MELLI;14;44;Almada, Estela Maris;154516684/154381535;Belgrano esq. Garay;hospedajelasmelli@hotmail.com;www.hospedajelosmellis.com.ar;;;;S/D;;;;**
            Gran Corrientes;Itatí;HOSPEDAJE;HOSPEDAJE ITATI;15;60;Contreras, Ricardo César;4493349;Fray Juan de Gamarra s/n casi Roque González de Santa Cruz;hospedajeitati@hotmail.com;;;;;S/D;;;;**
            Gran Corrientes;Itatí;HOSPEDAJE;HOSPEDAJE LOMA GUAZÚ;21;83;Anonis, José;4493061/15408094;Obispo Luis Niella 965;;;Hospedaje Loma Guazú;;;S/D;;;;**
            Gran Corrientes;Itatí;HOSPEDAJE;HOSPEDAJE EL GAUCHITO;18;72;Torres, Ramona Adelma;4493250-3794-540888;Obispo Niella 438;hospedaelgauchito@hotmail.com.ar;;Hospedaje El Gauchito;;;S/D;;;;**
            Gran Corrientes;Itatí;HOSPEDAJE;HOSPEDAJE TABA CUE;19;60;Escalante, Ramón Leopoldo;3794-493254;Obispo Luis María Niella 422;;;;;;S/D;;;;**
            Gran Corrientes;Itatí;HOSPEDAJE;HOSPEDAJE CASA DEL PROMESERO;63;200;Medina, Saturnino Ramón;4493369;Obispo Niella s/n;;;;;;S/R;;;;**
            Gran Corrientes;Itatí;HOSPEDAJE;LAS TACUARAS;7;21;Torres, Héctor;4493515;Desiderio Sosa 881;;;;;;S/D;;;;**
            Gran Corrientes;Itatí;HOSPEDAJE;HOSPEDAJE JAJEJOHU;15;33;Acuña de Marín, Gladys Inés;4493399;Desiderio Sosa 620;;;;;;S/D;;;;**
            Gran Corrientes;Itatí;HOSPEDAJE;HOSPEDAJE LA ABUELA;4;12;Tonanez, Carlos;0379-4493220/154387744;Desiderio Sosa 893;catonal56@hotmail.com;;;;;S/D;;;;**
            Gran Corrientes;Itatí;HOSPEDAJE;HOSPEDAJE LAS PALMERAS;12;39;Marín de Goycoechea, Irenea;4493036/154752160;Desiderio Sosa 769;;;;;;S/D;;;;**
            Gran Corrientes;Paso de la Patria;HOSPEDAJE;HOSPEDAJE GAUCHITO GIL;8;32;Romero Rita Isabel;0379-4494532/4494932;12 de Octubre 310;cabela_65@hotmail.com;;;;;S/R;;;;**
            Gran Corrientes;Paso de la Patria;HOSPEDAJE;LA ESTANCIA;12;54;Miño, Analía;3794-255011;Av. Virgen de Itatí 310;;;;;;S/R;;;;**
            Gran Corrientes;Paso de la Patria;HOSPEDAJE;HOTEL LA CAMPANA;6;18;Caseaux, Estela;0379 154387624;La Rioja 261;lacampanahotel@hotmail.com;;;;;S/R;;;;**
            Gran Corrientes;Paso de la Patria;HOSPEDAJE;PALAMARES DEL PASO;4;24;;362-154261439;Nicaragua esq. Costa Rica;;www.corrientes.com.ar/palmaresdelpaso;;;;S/D;;;;**
            Gran Corrientes;Santa Ana;HOSPEDAJE;HOSPEDAJE DON NELSON;3;12;Alcaráz Nelson;3794-512041;Ituzaingó e Iberá;;;;;;;;S/R;;**
            Micro Región Iberá;Mercedes;HOSPEDAJE;HOSPEDAJE ILI;9;18;Galarza, Liliana;03773 15430191;Av. San Martín 1767;;;;;;;;S/R;;**
            Micro Región Iberá;Mercedes;HOSPEDAJE;HOSPEDAJE EL GAUCHITO;8;22;Galfrascoli, Pedro H.;03773 421914/15411919;Independencia 650;;;;;;;;S/R;;**
            Micro Región Iberá;Mercedes;HOSPEDAJE;HOSPEDAJE EL ALEMAN;7;28;Molina, Marisa;03773 15629064;Juna Pujol 1549;;;;;;;;S/D;;**
            Micro Región Iberá;Mercedes;HOSPEDAJE;MIRTA ESTIGARRIBLIA;1;3;Estigarribia Mirta;03773 15453881;Caá Guazú 858;;;;;;;;S/R;;**
            Micro Región Iberá;Colonia Carlos Pellegrini;HOSPEDAJE;HOSPEDAJE LOS AMIGOS;4;15;Mendieta, Mabel Ester;03773 15493753/15477488;Guazuvirá y Aguapé;;;;;;;;S/R;;**
            Micro Región Iberá;Colonia Carlos Pellegrini;HOSPEDAJE;HOSPEDAJE SAN CAYETANO;8;25;Pera, Roque Adán;03773 15628763/15400929;Aguapé entre Yacaré y Guazuvirá;iberasancayetano@hotmail.com ;;Hospedaje San Cayetano;;;;;S/R;;**
            Micro Región Iberá;Colonia Carlos Pellegrini;HOSPEDAJE;HOSPEDAJE GUARANÍ;3;11;Manzanelli, Ana María;03773 15629762;Caraguatá y Yacaré;guarani@ibera.net;www.hospedajeguarani.com.ar;Hospedaje Guaraní;;;;;S/D;;**
            Micro Región Iberá;Colonia Carlos Pellegrini;HOSPEDAJE;HOSPEDAJE IBERÁ;6;15;Escalante, Juan Carlos;03773 15627261;Guazuvirá e Isipó;info@hospedajeibera.com.ar;;;;;;;S/R;;**
            Micro Región Iberá;Colonia Carlos Pellegrini;HOSPEDAJE;HOSPEDAJE JABIRÚ;5;20;Panozzo Galmarello, Juan Carlos;03773 15474838;Yaguareté y Caraguatá;posadaranchojabiru@hotmail.com.ar ;;;;;;;S/R;;**
            Micro Región Iberá;Colonia Carlos Pellegrini;HOSPEDAJE;CORAZÓN DEL IBERÁ;9;25;Gamboa, Ramón E.;03773 431526/15628189;Ñangapirí y Yaguareté;corazondelibera@hotmail.com;;Posada Corazón del Iberá;;;;;S/R;;**
            Micro Región Iberá;Colonia Carlos Pellegrini;HOSPEDAJE;HOSPEDAJE CASA DE LA LUNA;5;10;González, Martina Isabel;03774 15520259;Yacaré y Guazuvirá;;;;;;;;S/R;;**
            Micro Región Iberá;Colonia Carlos Pellegrini;HOSPEDAJE;CASA SANTA ANA DEL IBERÁ;5;16;Pettit, Arturo y Cook, Leslie;;Caraguatá y Carpincho;arturopettit@gmail.com;;;;;;;S/R;;**
            Micro Región Iberá;Colonia Carlos Pellegrini;HOSPEDAJE;YBERÁ FULL;3;6;Maz, Julio David;03773-15529979;Aguará y Peguajó s/n;iberafull@hotmail.com;;;;;;;S/D;;**
            Micro Región Iberá;Chavarría;HOSPEDAJE;HOSPEDAJE EL MAESTRO;4;10;Espinosa, Josefina;;Pedro Quiroz y Pampín;;;;;;;;S/D;;**
            Micro Región Iberá;Chavarría;HOSPEDAJE;HOSPEDAJE MERCEDES YOLANDA CONDE;6;15;Conde, Mercedes Yolanda;03773 15460377;Berón de Astrada s/n;;;;;;;;S/R;;**
            Micro Región Iberá;Chavarría;HOSPEDAJE;HOSPEDAJE DE NORMA DE YACUZZI;5;10;Dieringer, Norma;063777 491139;Plácido Martínez y Caá Guazú s/n;laura-yacuzzi@hotmail.com ;;;;;;;S/R;;**
            Micro Región Iberá;San Roque;HOSPEDAJE;HOSPEDAJE DON PEDRO;4;12;Ayala Rosalia;03777-478140/15302498;Desidero Rosa Nº 669;ro.ayala@hotmail.com ;;;;;;;S/R;;**
            Micro Región Iberá;San Roque;HOSPEDAJE;HOSPEDAJE SAN MARTIN;7;14;Renelde Goitre;03777-478399;San Martín Nº 831;;;;;;;;S/R;;**
            Micro Región del Sur;Paso de Los Libres;HOSPEDAJE;HOSPEDAJE GABRIEL;16;37;Cardozo, Gabriel ;03772-422437;L. N. Alem 856;;;;;;;;S/R;;**
            Micro Región del Sur;Paso de Los Libres;HOSPEDAJE;HOSPEDAJE BRAVO;4;12;Aquino, Valeria;03772-421880;Cnel. Reguera 1056;;;;;;;;S/R;;**
            Micro Región del Sur;Paso de Los Libres;HOSPEDAJE;HOSPEDAJE ITATI;8;25;Montiel, Marcelo;03772-422487;Ruta 117, Km 8;;;;;;;;S/R;;**
            Micro Región del Sur;Sauce;HOSPEDAJE;PARADOR ER-LI;9;18;Cáceres, Liliana Inés;03774-15469018;Av. de los Constituyentes 530;er-licomedor@hotmail.com;;Comedor Parador Er Li;;;;;S/R;;**
            Solar de las Huellas;Caa Catí;HOSPEDAJE;CUATRO DE ORO;3;9;Quevedo, Estela;;Itatí y San Martín;;;;;;;;S/R;;**
            Solar de las Huellas;Caa Catí;HOSPEDAJE;YAQUÉ PORÁ;9;26;Cristaldo, Romina Natalia;03781 401705;Brunel Pruyas s/n;giuli_1113@hotmail.com;;;;;;;S/R;;**
            Solar de las Huellas;Concepción;HOSPEDAJE;HOSPEDAJE MIRITA;1;4;Fernández, Miriam;3794331759;Bo. Inmaculada Concepción. Mza. B. Casa 11;miritafernandez2@hotmail.com;;;;;;;S/R;;**
            Solar de las Huellas;Loreto;HOSPEDAJE;HOSPEDAJE CHE GENTE CUERA;2;7;Hidaldo de Bofil, Selva;03781-489419;25 de Mayo y Sabas Gallardo;;;;;;;;S/R;;**
            Solar de las Huellas;Loreto;HOSPEDAJE;HOSPEDAJE LA ESQUINA;4;8;Breard, Ramón F. y Quiroz, Carmen;03781-497015/15489060;Tomás Úbeda y Sabas Gallardo;;;;;;;;S/D;;**
            Solar de las Huellas;Loreto;HOSPEDAJE;HOSTERIA NDE´ROGA;5;20;Insaurralde, Eva;03781-409738/3794590006;Mendoza y Paraguay;;;;;;;;S/R;;**
            Solar de las Huellas;Loreto;HOSPEDAJE;HOSPEDAJE KO´EVY;3;13;Gómez, Andrés Avelino;;Junín Nº 428 esquina Armengol Alegre;zul_ga@hotmail.com;;Hospedaje Ko Evy;;;;;C/R;;193/18**
            Solar de las Huellas;Mburucuyá;HOSPEDAJE;HOPEDAJE EL DESCANSO;3;9;Villalba, Norma;011-67411537;Alsina 1243;normaperaltavilla@hotmail.com;;;;;;;S/R;;**
            Solar de las Huellas;Saladas;HOSPEDAJE;HOSPEDAJE SANTI;3;6;Rivero, Santigo;03782-437178;Florida 1066;santia_rivero@hotmail.com;;;;;;;S/R;;**
            Solar de las Huellas;San Miguel;HOSPEDAJE;HOSPEDAJE IBERÁ;7;19;Meineri, Gustavo Gastón;03782 483022;Av. San Martín 1809;gustavo_meineri@hotmail.com.ar;;;;;;;S/R;;**
            Solar de las Huellas;San Miguel;HOSPEDAJE;HOSPEDAJE DOÑA OFELIA;21;43;Blanco, Cintya Marcela;03782 483098;San Martín y Formosa;;;;;;;;S/R;;**
            Solar de las Huellas;San Miguel;HOSPEDAJE;HOSPEDAJE FAMILIAR KAVURÉ;4;8;González, Eladio y Ledesma, María Tomasa;011-67299987;Haidé Godoy entre Av. Gral. San Martín y Bension Pischick;;;;;;;;S/R;;**
            Solar de las Huellas;San Miguel;HOSPEDAJE;HOSPEDAJE FAMILIAR DON ENRIQUE;3;6;Omar Enrique;3794-274429;Av. Virgen de Itatí entre Alberdi y Rivadavia;;;;;;;;S/R;;**
            Solar de las Huellas;San Miguel;HOSPEDAJE;HOSPEDAJE FAMILIAR AMALA RUIZ DIAZ;1;3;Ruidíaz, Amalia;011-58228268;Bension Pischick 650;;;;;;;;S/R;;**
            Solar de las Huellas;Santa Rosa;HOSPEDAJE;EL REPOSO;50;100;Reirjers, Fabián;;RN 118 Km 160;reijersfabian_08@yahoo.com.ar;;;;;;;S/R;;**
            Solar de las Huellas;Santa Rosa;HOSPEDAJE;DON ANDRES;6;12;Otazo, María Elena;03782 15454592;RN 118 Km 63;lencinas@hotmail.com ;;;;;;;S/R;;**
            Paraná norte;Itá Ibaté;HOSPEDAJE;HOSPEDAJE DON VIDAL;10;20;Cristian Eduardo Vidal;3994-276025;Juan Domingo Perón S/N;reservadonvidal@hotmail.com;www.donvidal.com.ar;Don Vidal;;;;;S/R;;**
            Paraná norte;Itá Ibaté;HOSPEDAJE;HOSPEDAJE MI RANCHITO;15;30;Acota, Luis;495294;BELGRANO N° 1579;;;;;;;;S/D;;**
            Paraná norte;Itá Ibaté;HOSPEDAJE;HOSPEDAJE EL HOGAR;6;36;Armúa Mirta;3781-489010;;;;;;;;;S/D;;**
            Paraná norte;San Antonio Apipé;HOSPEDAJE;LA CASONA DE APIPE ECOLODGE;5;14;Batista Silvia Griselda A.;3786-614100/15494234;Calle 3 y 6 S/N;lacasonadeapipeecolodge@gmail.com ;;La Casona de Apipe Ecolodge;;;;;;;S/R**
            Paraná Sur;Esquina;HOSPEDAJE;HOSPEDAJE ENTRE RIOS;5;15;Boari, Alfredo Raúl;03773 460209/15520954;RN 12, acceso sur;juanboari35@yahoo.com;;;;;;;S/R;;**
            Paraná Sur;Esquina;HOSPEDAJE;HOSPEDAJE AGUILAR;2;6;Aguilar, Lázaro;03777-460748;Lavalle 151;;;;;;;;S/R;;**
            Paraná Sur;Esquina;HOSPEDAJE;HOSPEDAJE EL PACU;5;26;Villán, Claudia;03777 461069/15555920;Cnel. Carreras 605;;;;;;;;S/D;;**
            Paraná Sur;Esquina;HOSPEDAJE;ALOJAMIENTO LA GAUCHITA;2;8;Amiconi, Mirta Alicia;03777 460630;Los Sauces 1868;cachilegui@hotmail.com;;;;;;;S/D;;**
            Paraná Sur;Esquina;HOSPEDAJE;HOSPEDAJE ARIELA;6;25;Bravo, Liliana y Machuca, Carlos;03777 15537082;RN 12, acceso sur;;;;;;;;S/R;;**
            Paraná Sur;Goya;HOSPEDAJE;HOSPEDAJE BUFFA;6;18;Buffa Raúl Alberto;420272;Belgrano S/N;;;;;;;;S/D;;**
            Paraná Sur;Goya;HOSPEDAJE;TOTO AVENTURA;;6;Cuevas Fernando Germán;03777-15526135;Pasaje Carranza N° 374;;;;;;;;S/D;;**
            Paraná Sur;Goya;HOSPEDAJE;HIRU HETA;;;Baibiene Bernardo;03777-15479310;Camino a Puerto Boca;bbaibiene@gmail.com;;;;;;;;;**
            Paraná Sur;Lavalle;HOSPEDAJE;HOSPEDAJE LAVALLE;3;8;Contreras, Miguel;;Ruta 27 y Berón de Astrada;;;;;;;;S/D;;**
            Micro Región Iberá;Yofre;HOSPEDAJE FAMILIAR;HOSPEDAJE FMILIAR NISA;8;20;Montiel Catalina Beatriz;03773-15520662;Sargento Cabral S/N;saida-saipe@hotmail.com;;;;;;;S/R;;**
            Gran Corrientes;Capital;HOSTEL;HOSTEL BIENVENIDA GOLONDRINA;6;30;Rodríguez, Florencia;4435316/3794-855026;La Rioja 455;bvngolondrina@gmail.com;www.hostelbienvenidagolondrina.com;Bienvenida Golondrina Hostel;;;;;S/R;;**
            Gran Corrientes;Capital;HOSTEL;HOSTEL DALÍ;5;30;Díaz, Gonzalo;154740020;Av. Maipú 2498;mcr9@hotmail.com ;;;;;;;S/R;;**
            Gran Corrientes;Capital;HOSTEL;HOSTEL CORRIENTES;5;25;Cabral, Marta;4469474;Buenos Aires 508;hostelcorrientes@live.com.ar;;Hostel Corrientes;;;;;C/R;;**
            Gran Corrientes;Capital;HOSTEL;CATEDRAL HOSTEL CORRIENTES;3;22;Aguirre Humberto;0379-155010007;San Lorenzo 1097;reservas@catedralhostel.com ;www.catedralhostel.com ;;;;;;S/R;;**
            Micro Región Iberá;Mercedes;HOSTEL;HOSTEL EL PORTAL DEL IBERA;6;24;Franco Carmen D.;03773 421554/15629467;Fray Luis Beltrán 746;marcialmino@hotmail.com;www.elportaldelibera.com;;;;;;S/D;;**
            Micro Región Iberá;Mercedes;HOSTEL;HOSTEL GITANES;7;25;Torres, María B.;03773 15443164/421558;San Martín 224;hostelgitanes@gmail.com;;hostel gitanes;;;;;S/D;;**
            Gran Corrientes;Paso de la Patria;HOSTERÍA;HOSTERIA FATSA (SALUD);40;100;Sepulveda Juana Rosa (adminsitradora);4494077/78/76;San Luis 202;;;;;;S/R;;;;**
            Gran Corrientes;Paso de la Patria;HOSTERÍA;INMOBILIARIA Y ALOJAMIENTO DEL SOL;6;38;Buyatti, Nelson Lisandro;494936/154532372;25 de Mayo 646;info@inmobiliaria-delsol.com.ar;www.inmobiliaria-delsol.com.ar;Inmobiliaria del Sol;;;S/D;;;;**
            Gran Corrientes;Paso de la Patria;HOSTERÍA;NIEMANÚ;12;30;Chianese, Patricia;154591150;8 de Diciembre y Mitre;hosterianiemanu@hotmail.com;;Fc: Hosteria Niemanu;;;S/D;;;;**
            Gran Corrientes;Ramada Paso;HOSTERÍA;HOSTERIA ATAJO DEL YAGUARI;7;36;Hermosilla, Porfirio R.;3794437316;Ramada Paso 2da. Sección Dpto. Itatí;corrientesecologica@yahoo.com.ar;;;;;;;C/R;;057/11**
            Gran Corrientes;Santa Ana;HOSTERÍA;SAN JOSE;;;;;RP 43, Km 8;;;;;;;;S/D;;**
            Micro Región Iberá;Colonia Carlos Pellegrini;HOSTERÍA;HOSTERÍA NANDÉ RETÁ;11;32;Apba S.R.L;03773-473923 / Fax 499411;Guazú Birá S/N;nandereta@nandereta.com;www.nandereta.com;Ñande Reta ;;;;;C/R;;**
            Micro Región Iberá;Colonia Carlos Pellegrini;HOSTERÍA;HOSTERÍA CASONA IBERÁ;7;20;Obieta, Federico;03777 422188/15629666;Mbigua s/n;informes@casona-ibera.com.ar;www.casona-ibera.com.ar;;;;;;S/D;;**
            Micro Región Iberá;Colonia Carlos Pellegrini;HOSTERÍA;YAGUARETÉ PORÁ;5;15;Alonso, Mariana;11-56429142;Guazubirá y Aguapé;yaguareteserervas@gmail.com;www.yaguarete-pora.com;;;;;Resol. Nº 954/16;C/R;;954/16**
            Micro Región del Sur;Monte Caseros;HOSTERÍA;HOSTERIA OKAPI;14;30;Laslo, Selva Margarita;03775-424536/15493164;Av. Libertador 539;hosteriaokapi@gmail.com;www.hosteriaokapi.com.ar;;;;;;S/R;;**
            Micro Región del Sur;Monte Caseros;HOSTERÍA;HOSTERIA DON MANUEL;8;32;Ortiz, Cristian;03775-422571;Tucumán 360;contacto@hosteriadonmanuel.com.ar;www.hosteriadonmanuel.com.ar ;Hosteria Son Manuel;;;;;S/R;;**
            Paraná Sur;Goya;HOSTERÍA;HOSTERIA EL NONO;13;30;Bobino/Biancardi S.H;03777 421415;Caá Guazú 1128;omarbovino@yahoo.com.ar;;;;;;;S/R;;**
            Paraná Sur;Goya;HOSTERÍA;HOSTERIA EL SURUBÍ;5;15;Ledesma, José;03777 422632/15620516;Marín Soto 637;elsurubi@hotmail.com;;;;;;;S/R;;**
            Paraná Sur;Goya;HOSTERÍA;HOSTERIA SAN ANDRES;17;43;Ganancias, Ricardo Alberto;011-1535101350;Angel Soto 1221;estudioganancias_8@hotmail.com;;;;;;;C/R;;1067/16**
            Paraná norte;Villa Olivari;HOSTERÍA;HOSTERÍA CABUREÍ;7;16;Esquivel Pilar Inés;03786-15495938/15495900;Avda. Haide Galarza y Ruta 12 Km 1233;;;;;;;;C/R;;902/14**
            Jesuítico Guaraní;General Alvear;HOTEL;HOTEL CENTRAL;5;12;Navarro, Manuel;03772-470010/15634870;Centenario 449;;;;;;;;S/D;;**
            Jesuítico Guaraní;General Alvear;HOTEL;HOTEL ALTO URUGUAY;6;20;Serpa, Eulogio Fabián;03772 47-1433 (Fijo)/15-510-582 (Móvil);Panamá s/n. Bº. Mitre Sur;;;;;;;;S/R;;**
            Jesuítico Guaraní;Gobernador Virasora;HOTEL;MANANTIALES HOTEL CASINO;31;66;Q GAME SA;03773 481777-481121-481122;Av. San Martín 1216 (RN 14);manantiales.virasoro@grupoatlas.com.ar;www.manantiales.com;;;;;;C/R;;1078/16**
            Jesuítico Guaraní;Gobernador Virasora;HOTEL;HOTEL ARDAIS;17;30;Altamir, Basilio;03756 482297;Av. San Martín 1556;hotelardais@gmail.com;www.elbrasilero.com.ar ;;;;;;S/R;;**
            Jesuítico Guaraní;Gobernador Virasora;HOTEL;HOTEL KOE;18;49;Navajas, Felipe;03756-482548/15441937;Laguna Brava 88;;;;;;;;S/R;;**
            Jesuítico Guaraní;Gobernador Virasora;HOTEL;HOTEL EL PARAISO;30;106;Acuña, Adolfo;03752-482364;Sarmiento 2488 esq. Félix de Azara;;;;;;;;S/R;;**
            Jesuítico Guaraní;Gobernador Virasora;HOTEL;HOTEL VUELTA DEL OMBU;18;53;Navajas, Fernando;03753-482956;Av. San Martín 955;hotelvdo@gmail.com ;;hotel Vuelta del Ombú;;;;;S/R;;**
            Jesuítico Guaraní;La Cruz;HOTEL;HOTEL LUXOR;9;27;Delucca Pacheco, Marta;03772-491321;Unión 707;;;;;;;;S/R;;**
            Jesuítico Guaraní;La Cruz;HOTEL;HOTEL EL JESUITA;13;50;Ballester, Raquel;03772-491146;Unión 945;hoteleljesuita@hotmail.com;;;;;;;S/R;;**
            Jesuítico Guaraní;La Cruz;HOTEL;HOTEL AMELIA;8;20;Rosales, Juan Omar;03722-15449111;Avda. Juan Branchi S/N;;;;;;;;S/R;;**
            Jesuítico Guaraní;La Cruz;HOTEL;HOTEL PARADOR LA SOÑADA;;;;03772-431386;RN 14 Km 530;vanulis25@gmail.com;;;;;;;S/D;;**
            Jesuítico Guaraní;La Cruz;HOTEL;HOTEL TIERRA DE SUEÑOS;;;;03772-448166/447519;RN 14 Km 584;hoteltierradesueños@gmail.com ;;;;;;;S/D;;**
            Jesuítico Guaraní;La Cruz;HOTEL;HOTEL DE RIO;9;40;Hebe Andisco;03772-15631719;Colón Nº 43;hoteldelriolacruz@gmail.com;;;;;;;S/R;;**
            Jesuítico Guaraní;La Cruz;HOTEL;POSTA DEL IBERÁ;;;;03772-1556157;RN 14 acceso 3 cerros;;;;;;;;S/D;;**
            Jesuítico Guaraní;Santo Tomé;HOTEL;HOTEL Y SPA SANTO TOME (ACA);15;45;Santo Tomás SRL;03756-420161;Belgrano 950;acasantotome@gmail.com;www.youtube.com/acasantotome;;;;;;S/R;;**
            Jesuítico Guaraní;Santo Tomé;HOTEL;HOTEL CONDADO;58;116;Goitia, Jorge;03756-420770/421888;Bertran 1050;info@condadohotelcasino.com.ar;www.casinosdellitoral.com.ar;Condado Hotel Casino;;;;;S/R;;**
            Jesuítico Guaraní;Santo Tomé;HOTEL;HOTEL BRASIL;9;18;Centurión, Susana;03752-420153;Mitre 717;susanhappy@hotmail.com ;;;;;;;S/R;;**
            Jesuítico Guaraní;Santo Tomé;HOTEL;HOTEL FAMILIAR LAS CABAÑAS;24;94;Barell, María Noelia;03756-15611999;RN 14. Km 684;lascabanashotel@hotmail.com;www.lascabanashotel.blogspot.com;;;;;;S/R;;**
            Jesuítico Guaraní;Santo Tomé;HOTEL;HOTEL PUCARA;7;22;Delgado Oscar;03756-420340/15448986;San Martín 557;;;;;;;;S/R;;**
            Jesuítico Guaraní;Santo Tomé;HOTEL;HOTEL APART SAN MARTIN;5;22;Centena, Gregoria Patricia;03756-498003;San Martín 857;apartsm@hotmail.com / geocen@hotmail.com.ar;;;;;;;S/R;;**
            Jesuítico Guaraní;Santo Tomé;HOTEL;HOTEL DE SANTI;6;18;Navarro, Susana;;Roca 823;percon2009@live.com.ar ;;;;;;;S/R;;**
            Jesuítico Guaraní;Santo Tomé;HOTEL;FRONTERA HOTEL;8;40;Favermann, Gustavo;03756 422952;Centeno 10;fronterahotelst@hotmail.com;www.fronterahotelst.com.ar;;;;;;S/R;;**
            Jesuítico Guaraní;Yapeyú;HOTEL;HOTEL SAN MARTIN;22;50;Bravo, Berta Beatriz;03772-493120/15634741;Sgto. Cabral s/n;flavia_31109@hotmail.com;;;;;;;S/R;;**
            Jesuítico Guaraní;Yapeyú;HOTEL;PARAISO YAPEYÚ;30;126;Echt, Daniel;03772-493056;Paso de los Patos y Juan de San Martíninfo@paraisoyapeyu.com.ar;info@paraisoyapeyu.com.ar;;;;;;;S/R;;**
            Gran Corrientes;Capital;HOTEL;TURISMO HOTEL CASINO;115;230;Viavas, Gabriela;4462244;Entre Ríos 650;reservas@turismohotelcasino.com.ar;www.ghturismo.com.ar;Turismo Hotel Casino;;;;;A/C;5;425/12**
            Gran Corrientes;Capital;HOTEL;HOTEL GUARANI;152;260;Biloni, Miguel;4433800;Mendoza 970;reservas@hotelguarani.com;www.hotelguarani.com;Gran Hotel Guarani;;;;;A/C;4;44/2017**
            Gran Corrientes;Capital;HOTEL;HOTEL ORLY;97;145;Goitia, Griselda;4427248/4420280;San Juan 867;contacto@hotelorlycorrientes.com.ar/reservas@hotelorlycorrientes.com.ar;www.hotelorlycorrientes.com.ar;;;;;;S/R;;**
            Gran Corrientes;Capital;HOTEL;CORRIENTES PLAZA HOTEL;95;161;Hotelom S.R.L.;446-6500;Junín 1549;hotelplaza_reservas@hotmail.com/hotelplaza-solar@hotmail.com ;www.hotel-corrientes.com.ar;Corrientes Plaza Hotel;;;;;S/R;;**
            Gran Corrientes;Capital;HOTEL;HOTEL SAN MARTIN;70;139;Alicia Cambiano de Galvez ;4421061/4421068;Santa Fe 955;hotelsanmartinctes@gmail.com;www.sanmartin-hotel.com.ar;Hotel San Martín;;;;;S/R;;**
            Gran Corrientes;Capital;HOTEL;HOTEL CONFIANZA;40;84;Podestá, Francisco;4426556;Mendoza 1129;hotelconfianza@gmail.com / mutualconfianza@fibertel.com.ar;www.hotelconfianza.com.ar;Hotel Confianza;;;;;C/R;;**
            Gran Corrientes;Capital;HOTEL;HOTEL IDENTIDAD;71;160;Fernández, Osvaldo;4423939/4422956;H. Irigoyen 1470;reservas@hotelidentidad.com.ar / hotelidentidad@gmail.com;www.hotelidentidad.com.ar;Hotel Identidad;;;;;A/C;3;115/16**
            Gran Corrientes;Capital;HOTEL;HOTEL CARIBE;17;50;Constanzo, Omar Ernesto;4442197;Av. Maipú 2596;;;;;;;;S/R;;**
            Gran Corrientes;Capital;HOTEL;HOTEL PAVON;33;84;Pavón, Ramón M.;4442166/4411732;Av. Maipú 2600;hotelpavon@hotmail.com;www.hotelpavon.com.ar;Hotel Pavón;;;;;S/R;;**
            Gran Corrientes;Capital;HOTEL;HOTEL VICTORIA;17;80;Sosa, Jorge L.;4435547;España 1052;hotelvictoria1@hotmail.com ;www.hotelvictoriaweb.com.ar;;;;;;S/R;;**
            Gran Corrientes;Capital;HOTEL;HOTEL SUDAMERICANO SRL;20;60;Sosa, Luciano O.;4464242;H. Irigoyen 1676;hotel_corrientes@hotmail.com;;;;;;;S/R;;**
            Gran Corrientes;Capital;HOTEL;HOTEL DORA;15;39;Sosa Gladis Alicia;4421053/154636417;España 1050;hoteldora@hotmail.com.ar;;;;;;;S/R;;**
            Gran Corrientes;Capital;HOTEL;HOTEL DEL PARQUE;28;108;Verellen, Edgar;4230667/154737202;RUTA Nac. 12 km 1028;hotel.delparque@hotmail.com;;Hotel del Parque Corrientes;;;;;S/R;;**
            Gran Corrientes;Capital;HOTEL;HOTEL LA GALERIA;8;24;Zacarias Diego;3795-050714;H. Irigoyen 1057;;;;;;;;S/R;;**
            Gran Corrientes;Empedrado;HOTEL;HOTEL DE LOS NAVEGANTES;14;38;Sindicato Obrero Marítimo Unido (SOMU);03783-15213474;Ruta 12 Km 977;suarez_jmiguel@hotmail.com / descansodebucaneros@hotmail.com;;;;;C/R;;965/14;;**
            Gran Corrientes;Empedrado;HOTEL;BALCON DEL PARANA;40;120;Luciana Miriam y Trotti, Anibal S.H;0379-4491200/222-4491500;Lavalle y Río Paraná;info@balcondelparana.com.ar;www.balcondelparana.com.ar ;Balcón del Paraná;;;S/R;;;;**
            Gran Corrientes;Itatí;HOTEL;HOTEL ANTARTIDA;19;58;Roch, Carlos Alberto;4493060;Av. 25 de Mayo 250;barbararoch90@gmail.com ;;Hotel Antártida;;;S/R;;;;**
            Gran Corrientes;Itatí;HOTEL;HOTEL EL PROMESERO;22;56;Romero, María Cintia;3794-651875;Av. 25 de Mayo 230;;;;;;S/R;;;;**
            Gran Corrientes;Itatí;HOTEL;HOTEL OCTAVIO;5;14;Nahnias, Octavio;4493264/154590572;Fray Gamarra 565;hospedajeoctavio@hotmail.com;;;;;S/D;;;;**
            Gran Corrientes;Itatí;HOTEL;TERRAZA DEL PARANA;5;22;Rodríguez, Juan Carlos;4493148/15467452;Pje. Guazú s/n;;;;;;S/D;;;;**
            Gran Corrientes;Itatí;HOTEL;HOTEL DEL RIO;30;80;Ratti Siñoli Leonardo;3794-493155/285370;avda. 25 de mayo S/N;joharatti@hotmail.com ;;;;;S/R;;;;**
            Gran Corrientes;Itatí;HOTEL;HOTEL AVENIDA;14;42;Oliveira, Constancia y Gervasoni, Angélica de;3794-869341/4493012;Av. 25 de Mayo S/N;ramiroitati@hotmail.com;;;;;S/D;;;;**
            Gran Corrientes;Paso de la Patria;HOTEL;HOTEL CONDADO;53;112;HOCO SA;379-4494474/4484964/4494411/154005136;Cazadores Correntinos 252;reservaspaso@cndadohotelcasino.com.ar;www.condadohotelcasino.com.ar;Condado Hotel Casino;;;A/C;4;947/17;;**
            Gran Corrientes;Paso de la Patria;HOTEL;HOTEL ZAFARI DORADO;16;70;Correa, Norma Gladis;3794-610587;25 de Mayo y San Luis;;;Safari Dorado;;;S/R;;;;**
            Gran Corrientes;Paso de la Patria;HOTEL;HOTEL ATRIUM BEACH;18;50;Pajor Marcelo;4494337/338;Belgrano y Quebracho;marcelopajor@hotmail.com /  ;www.bariloche-atriun.com.ar / www.hoteleria-bariloche.com;Atrium + Beach;;;S/R;;;;**
            Gran Corrientes;Paso de la Patria;HOTEL;HOTEL EL REMANSO;19;67;Kosaczuk, Mariano Oscar;4494834/4494839;25 de Mayo 1022;hremanso@hotmail.com;www.hotel-remanso.com.ar;Hotel Remanso;;;S/D;;;;**
            Gran Corrientes;Paso de la Patria;HOTEL;HOTEL PARAISO DEL PARANA;20;60;Galera Fernández, Gines;4494555/4494449;Av. Santa Coloma s/n;hotelparaisodelparana@gmail.com;www.elparaisodelparana.com.ar;Hostel Paraíso Paso de la Patria;;;S/D;;;;**
            Gran Corrientes;Paso de la Patria;HOTEL;HOTEL RESORT JARDIN DEL PARANA;22;74;Aquere, María Leilen;4494653/671/827;Mitre y Mariano Moreno;pesca@jardindelparana.com.ar;www.jardindelparana.com.ar;Hotel Jardín del Paraná S.R.L;;;A/C;;1026/17;;**
            Micro Región Iberá;Mercedes;HOTEL;MERCEDES GRAN HOTEL;25;50;Diego Arnaldo Bosso;03773 421820-420140;Caá Guazú y Sarmiento;mercedesgranhotel@gmail.com ;;;;;;;S/R;;**
            Micro Región Iberá;Mercedes;HOTEL;HORIZONTES TORRE HOTEL;15;42;Perdomo, María M.;03773 420489;José María Gómez 734;hotelhorizonte@yahoo.com.ar / horizontetorreshotel@hotmail.com;;;;;;;S/R;;**
            Micro Región Iberá;Mercedes;HOTEL;HOTEL LIBERTADOR;10;27;Hermann Alejandro;03773 420433;Av. San Martín 1851;reginabenasaryaj@hotmail.com ;;;;;;;S/R;;**
            Micro Región Iberá;Mercedes;HOTEL;HOTEL SOL;8;32;Avalos Ricardo Alberto;03777 420283;San Martín 519;;;;;;;;S/R;;**
            Micro Región Iberá;Mercedes;HOTEL;HOTEL LA RECOVA;19;35;Perdomo, María M.;03777 422400-422622;Fray Luis Beltrán 1110;larecova@unicomm.com.ar ;www.hotelarecova.com.ar;Hotel la Recova;;;;;S/R;;**
            Micro Región Iberá;Mercedes;HOTEL;HOTEL IBERÁ;13;50;Alvares, Cinthia;03777 420373/15435378;J. Alfredo Ferreira 650;;;;;;;;S/R;;**
            Micro Región Iberá;Mercedes;HOTEL;HOTEL ECLIPSE;15;42;Sisi, Diomedes;03777 420992/15417213;Juan Pujol 751;hoteleclipse_mercedes1200@hotmail.com;www.hoteleclipsecorrientes.com;;;;;;S/R;;**
            Micro Región Iberá;Mercedes;HOTEL;HOTEL RINCON DE LOS AMIGOS;14;29;Barreiro, Mario;03777 420593;Juan Pujol 1556;;;;;;;;S/R;;**
            Micro Región Iberá;Mercedes;HOTEL;HOTEL IVYRÁ PYTÁ;12;32;Sagaspe, Estela;03777 422105/15402740;España 440;ivyra.pyta.hotel@gmail.com;www.ivyrapyta.com.ar;Hotel Ibyra Pyta;;;;;S/R;;**
            Micro Región Iberá;Mercedes;HOTEL;LOS SOBRINOS;7;18;Capdevilla, Claudio;03773-15449613;Belgrano 744;;;;;;;;S/R;;**
            Micro Región Iberá;Mercedes;HOTEL;HOTEL BOULEVART;8;22;Perdomo, Marina Raquel;03773-421974;Av. San Martín y Paraíso;hotelboulevard2016@outlook.com;;Hotel Boulevard;;;;;S/R;;**
            Micro Región Iberá;Mercedes;HOTEL;MANANTIALES HOTEL CASINO;29;63;BRAS TEC SA;03773 421700/422840/15416640;Sarmiento esq. Juan Pujol;manantiales.mercedes@grupoatlas.com.ar;www.manantialeshoteles.com;;;;;Resol. Nº 778/16;C/R;;778/16**
            Micro Región Iberá;Mercedes;HOTEL;HOTEL LA NEGRITA;8;25;Ramirez Jose Horacio ;15516850;Av. Lavalle y Bº Mitre;;;;;;;;S/R;;**
            Micro Región Iberá;Mercedes;HOTEL;HOTEL CRISTAL;16;42;Obieta Federico ;03773 422188/15627014;J. Alfredo Ferreyra Nº 686;hotel-cristal@hotmail.com;www.casona-ibera.com.ar;;;;;;S/R;;**
            Micro Región Iberá;Mercedes;HOTEL;HOTEL ELIAS;5;13;Poizón, Hugo;03773 15416464;San Martín Nº 2144;;;;;;;;S/R;;**
            Micro Región Iberá;San Roque;HOTEL;HOTEL NOGUI;9;18;Cardozo Guillermo;03777-15558815;Juan G. de Cossio Nº 859;;;;;;;;S/R;;**
            Micro Región del Sur;Curuzú Cuatiá;HOTEL;HOTEL DE TURISMO CURUZÚ CUATIA;42;80;Frean, Claudio;03774-425395/422037;Duarte Ardoy 655;hoteldeturismocuruzu@hotmail.com;;Hotel de Turismo Curuzú Cuatia;;;;;S/R;;**
            Micro Región del Sur;Curuzú Cuatiá;HOTEL;HOTEL PARADOR CURUZÚ PORÁ;25;55;Bermúdez, Roxana;03774-423090/15631522;RN 119, acceso oeste;paradorcuruzupora@curuzu.net ;;;;;;;S/R;;**
            Micro Región del Sur;Curuzú Cuatiá;HOTEL;HOTEL CONTINENTAL;25;50;Estigarribia Graciela;03774-422038;Caá Guazú 841;;;;;;;;S/R;;**
            Micro Región del Sur;Mocoretá;HOTEL;HOTEL CONFORT;10;25;Fochesato, Honorio;03775 498304;Pedro Pablo Marturet 840;;;;;;;;S/R;;**
            Micro Región del Sur;Mocoretá;HOTEL;BRISAS DEL MOCORETA;10;20;Lestani, María Luisa;03775 15431783;Colectora este, Km 345;;;;;;;;S/R;;**
            Micro Región del Sur;Paso de Los Libres;HOTEL;HOTEL ALEJANDRO I;60;157;Echet, Daniel;03772-424100/2;Cnel. López 502;hotelalejandro@arnet.com.ar;www.alejandroprimero.com.ar;;;;;;S/R;;**
            Micro Región del Sur;Paso de Los Libres;HOTEL;HOTAL IMPERIAL;56;120;Bustamante, Noemí;03772-422700;Pago Largo 954;;;;;;;;S/R;;**
            Micro Región del Sur;Paso de Los Libres;HOTEL;HOTEL LAS VEGAS;29;80;Mareco Esteban;03772-423490;Sarmiento 554;hotellasvegas2000@hotmail.com;;;;;;;S/R;;**
            Micro Región del Sur;Paso de Los Libres;HOTEL;HOTEL URUGUAY;25;50;Barrientos, Juan Carlos;03772-427831;Uruguay 1252;;;;;;;;S/R;;**
            Micro Región del Sur;Paso de Los Libres;HOTEL;HOTEL ESCORPIO;19;65;Britos, Zoraida;03772-421575;Ruta 117, Km 5;hotelescorpio@hotmail.com;;;;;;;S/R;;**
            Micro Región del Sur;Paso de Los Libres;HOTEL;HOTEL CAPRI;30;60;Zuliani, Casimiro;03772-421260;Santiago del Estero 320;;;;;;;;S/R;;**
            Micro Región del Sur;Paso de Los Libres;HOTEL;HOSPEDAJE 26 DE FEBRERO;10;40;Martínez, Juan Carlos;03772-425866;Uruguay y Reguera;;;;;;;;S/R;;**
            Micro Región del Sur;Paso de Los Libres;HOTEL;HOTEL ELEMENTOS;15;60;Torres, Romina;03772-426625/154416417;Brasil 1440;hotelelementos@gmail.com ;www.hotelelementos.com ;;;;;;S/R;;**
            Micro Región del Sur;Paso de Los Libres;HOTEL;HOSPEDAJE DEL ARTE;22;54;Alcazar Hector Dimas;03772-425018/15502124;Ruta 117 Km 8,7;hoteldelarte@hotmail.com ;www.hoeldelartelibres.com.ar;;;;;;S/R;;**
            Micro Región del Sur;Monte Caseros;HOTEL;HOTEL MONTE CASEROS;12;23;Burruchaga, Pedro;03775-423910;Colón 1536;pedroburruchaga@hotmail.com;;;;;;;S/R;;**
            Micro Región del Sur;Monte Caseros;HOTEL;HOTEL BRERO;16;33;Brero, Daniel Orlando;03775-422625;Tucumán 202;hotelbrero@gmail.com ;www.hotelbrero.com.ar ;Hotel Brero;;;;;S/R;;**
            Micro Región del Sur;Monte Caseros;HOTEL;HOTEL SOL DE MONTE CASEROS;12;28;Vizgarra, Gerardo Alberto;03775-422819;Juan Pujol 1221;gerardoyestela@hotmail.com ;;;;;;;S/R;;**
            Micro Región del Sur;Monte Caseros;HOTEL;MANANTIALES HOTEL CASINO;24;61;Quality Games SA;03775-424203;Colón y Uruguay;montecaseros@manantialesHE.com ;www.manantialesE.com ;;;;;;C/R;;**
            Micro Región del Sur;Monte Caseros;HOTEL;HOTEL MEGA HABITACIÓN;8;25;Ojeda, Sandra Itatí;03775-423642;Juan Pujol 1253;;;;;;;;S/D;;**
            Micro Región del Sur;Sauce;HOTEL;HOTEL LOS DOS HERMANOS;8;17;Monzón, Silvia Raquel;03774-480096/ 15633100;Belgrano 757;;;;;;;;S/R;;**
            Micro Región del Sur;Sauce;HOTEL;HOTEL LA FAMILIA;13;25;Díaz Romero, Oscar;03774 480027/437596/437594;General Paz 464;oscardiaz1984@hotmail.com;;;;;;;S/R;;**
            Solar de las Huellas;Caa Catí;HOTEL;JENSEN;20;65;Martínez, Eduardo Simón;3794 73105/755744;San Martín 252;eduardosimonmartinez@gmail.com;;;;;;;S/R;;**
            Solar de las Huellas;Concepción;HOTEL;TOBUNA SUITES;16;40;Pavón, Alejandro Alberto;;8 de Diciembre y Dr. Vernengo;tobunasuites@gmail.com;www.tobunasuites.com.ar ;;;;;;C/R;;**
            Solar de las Huellas;Mburucuyá;HOTEL;RESIDENCIAL HOTEL;8;25;Verón, Enzo;03782 15440383;Rivadavia 662;hotelresidencial@hotmail.com.ar;;Residencial Hotel;;;;;S/R;;**
            Solar de las Huellas;Mburucuyá;HOTEL;HOTEL LA VIEJA GUARDIA;10;45;Miqueri, Liza;3794593900/03782498631;Belgrano 834;;;;;;;;S/R;;**
            Solar de las Huellas;Saladas;HOTEL;HOTEL FLORIDA;20;50;Acevedo, Ramón J.;03782-15441250/421571;Florida 1076;;;;;;;;S/R;;**
            Solar de las Huellas;Saladas;HOTEL;HOTEL EL FARO;16;40;Fernández, Roque A.;03782-421273;Sarmiento 1089;marianofernandez_forestal@hotmail.com;;;;;;;S/R;;**
            Solar de las Huellas;Saladas;HOTEL;HOTEL CUATRO BOCAS;8;14;Cuatro Bocas SRL;03782-421236/03782-422237;RN 12 y RN 118;cuatrobocassds@hotmail.com;;;;;;;S/R;;**
            Solar de las Huellas;Saladas;HOTEL;HOTEL CALIFORNIA;4;12;Royt, Susana;03782-513485;Sargento Cabral 701;suroyt@hotmail.com;;;;;;;S/R;;**
            Solar de las Huellas;Saladas;HOTEL;HOTEL CONVAC SA (Al lado del Oil);14;40;CONVAC SA;03782-427010;RN 12 Km 941;convacsa@gmail.com;;;;;;;S/R;;**
            Solar de las Huellas;San Miguel;HOTEL;HOTEL GAUCHO GIL;5;13;Cabral, Mario;3794022441;Bestión Pischick y Bartolome Mitre;sanmiguelmotos@hotmail.com;;;;;;;S/R;;**
            Solar de las Huellas;Santa Rosa;HOTEL;HOTEL PLAZA;13;37;Sosa, Clara Ether ;03782 494041;25 de Mayo 47;claritae_sosa@hotmail.com;;Santa Rosa Plaza Hotel;;;;;S/R;;**
            Solar de las Huellas;Santa Rosa;HOTEL;HOTEL MALBERT;12;30;Rojas, María Isabel;03782 15-415867;RN 118 Km 62,5;hotelmalbert@gmail.com;www.hotelmalbert.com.ar;;;;;;S/R;;**
            Paraná norte;Ituzaingo;HOTEL;HOTEL DEL LAGO;35;90;La Unión SA (Sr. Luna);03786 420202/15614247;Entre Ríos e Iberá;hoteldellagoituctes@gmail.com;www.dellagohotel.com.ar;;;;;;S/R;;**
            Paraná norte;Ituzaingo;HOTEL;MANANTIALES HOTEL CASINO;21;46;Q Game SA;03786 420110/422122/422121;Francisco López y Belgrano;manantiales@grupoatlas.com.ar;www.manantialeshoteles.com;Manantiales Ituzaingó;;;;;A/CA;HOTEL 4 ESTRELLAS;839/16**
            Paraná norte;Ituzaingo;HOTEL;NUEVO HOTEL GEMINIS;20;51;Torres Silvana;03786 420697;Corrientes 1348;nuevohotelgeminis@hotmail.com;;Nuevo Hotel Geminis ;;;;;S/R;;**
            Paraná norte;Ituzaingo;HOTEL;CEZETA HOTEL LITORAL ARGENTINO;14;45;Czerevin, Roberto A.;03786 421773/421763;Sudamérica 1723;info@czhotel.com.ar;www.czhotel.com.ar;;;;;;A/CA;HOTEL 3 ESTRELLAS;858/16**
            Paraná norte;Ituzaingo;HOTEL;HOTEL CHAMPAGNE;10;42;Jungmerker, Norma;(03786) 420618/15618820;Buenos Aires 1489;champagnehosteria@yahoo.com.ar;www.hosteriachampagne.com;Hostería Champagne;;;;;A/CA;HOTEL 1 ESTRELLA;808/16**
            Paraná norte;Ituzaingo;HOTEL;HOTEL COSTA DEL PARANA;9;32;Duarte, Andrea;03786-421662;Paraná esq. Pasadas;costaparanaituzaingo@gmail.com;;;;;;;S/R;;**
            Paraná Sur;Bella Vista;HOTEL;HOTEL EL TRIANGULO;31;80;;03777-451492;Buenos Aires y Paraná;info@triangulohotel.com.ar;;Hotel El Triángulo;;;;;S/R;;**
            Paraná Sur;Bella Vista;HOTEL;HOTEL EL SOLAR;37;65;Denegri, Juan Carlos;03777-450395/15400791;Salta 667;info@hotelelsolar.com.ar;www.elsoalr.bevista.com  www.hotelelsolar.com.ar;;;;;;A/CA;HOTEL 2 ESTRELAS;267/16**
            Paraná Sur;Bella Vista;HOTEL;HOTEL COSTA AZUL;20;50;Almirón, Telesforo;03777-451645;Paraná 1239;telealmiron@hotmail.com;www.hotelcazul.com.ar;;;;;;S/R;;**
            Paraná Sur;Bella Vista;HOTEL;HOTEL JR;14;60;Samaniego Silvia;03777-450303/15473335;Estrada 775;jrbvista@hotmail.com;www.jrhotel.com.ar;;;;;;S/R;;**
            Paraná Sur;Bella Vista;HOTEL;HOTEL VICTORIA;13;24;Achitte, Eduardo;03777-452348;Catamarca 835;hotelvictoriaBv@hotmail.com ;www.hotelvictoriaBv.com  ;;;;;;S/R;;**
            Paraná Sur;Bella Vista;HOTEL;AYRÁ HOTEL;8;24;Ramírez, Olsvaldo;03777-15628202/451130;Ayacucho 865;ayrahotel@yahoo.com.ar;www.ayrahotel.com.ar/interior/index.htm;Ayrá Hotel;;;;;S/D;;**
            Paraná Sur;Bella Vista;HOTEL;HOTEL LA CASONA;8;21;Mórtola, Norberto;03777-411817/452357;Padre Klosler 919;elpajaro_cabana@yahoo.com.ar  elpajarocavana@hotmail.com;www.bellavistaturismo.com.ar/casona;;;;;;S/R;;**
            Paraná Sur;Bella Vista;HOTEL;HOTEL SANTA INES;8;17;Bombay SRL;03783-15200505;Tucumán 940;info@hotelsantaines.com ;www.hotelsantaines.com ;;;;;;S/R;;**
            Paraná Sur;Esquina;HOTEL;IRUPE PLAZA HOTEL;21;60;Previsora del Paraná S.R.L.;03777-460220;San Martín 588;contacto@irupeplazahotel.com.ar/ hotel.esquina@previsoradelparana.com ;www.irupeplazahotel.com;Hotel Irupé Plaza;;;;;S/R;;**
            Paraná Sur;Esquina;HOTEL;HOTEL ALEMAN;23;70;Fernando Landgraf;03777-460580;Serrano Soto 538;;;;;;;;S/R;;**
            Paraná Sur;Esquina;HOTEL;HOTEL EQUÉ PORÁ;10;23;Leguizamón, Carlos;03777-460374/15614391;Gral. Velazco 555;equeporahotel@gmail.com;www.equeporahotel.com.ar;Equé Porá;;;;;S/R;;**
            Paraná Sur;Esquina;HOTEL;HOTEL ITALIA;8;19;Martínez, Fernando César;03777-460066;Bartolomé Mitre 486;;;;;;;;S/R;;**
            Paraná Sur;Goya;HOTEL;CONDADO HOTEL CASINO;54;120;Hoco SA;03777 430335/430600;España 635;reservasgoya@condadohotelcasino.com.ar;www.condadohotelcasino.com.ar;Condado Hotel Casino-Goya-Corrientes;;;;;A/CA;HOTEL CASINO 4 ESTRELLAS;1019/15**
            Paraná Sur;Goya;HOTEL;GRAN HOTEL DE TURISMO;51;108;Pelícano SRL;03777 431675/422926;Bartolomé Mitre 880;hotelturismogoya@hotmail.com;www.hotelturismogoya.com ;Gran Hotel de Turismo;;;;;S/R;;**
            Paraná Sur;Goya;HOTEL;HOTEL ALCAZAR;46;96;González del Monte, Luis Miguel;03777-421366;José Gómez 848;;;;;;;;S/R;;**
            Paraná Sur;Goya;HOTEL;HOTEL CERVANTES;44;103;Ortiz, Aníbal;03777 432122/434175;José Eusebio Gómez 723;hotelcervantes@goyanet.com.ar;www.corrientes.com.ar/hotelcervantes;;;;;;S/R;;**
            Paraná Sur;Goya;HOTEL;HOTEL ITATI;28;45;Herrera, Pablo Daniel;03777 430514;J. J. Rolón 2050;;;;;;;;S/R;;**
            Paraná Sur;Goya;HOTEL;HOTEL SAN CAYETANO;7;20;Verges, Blanco Alejandra;03777 15413475;Angel Soto 321;sancayetanogoya@gmail.com ;;;;;;;S/R;;**
            Paraná Sur;Goya;HOTEL;HOTEL TARAGÜI;30;73;Castillo, Gisela María;03777-421814;Colón 1181;info@hoteltaragui.com.ar;www.hoteltaragui.com.ar;;;;;;S/R;;**
            Paraná Sur;Santa Lucía;HOTEL;HOTAL SANTA LUCIA;12;30;Carnevale, Carlos Horacio;03777-622762;Belgrano 659;santalucia.hotel@gmail.com;;;;;;;S/R;;**
            Gran Corrientes;Capital;HOTEL BOUTIQUE;LA ALONDRA CASA DE HUESPED;15;42;Rolón, Valeria;4430555/4430999;Av. 3 de Abril;info@laalondra.com.ar ;www.laalondra.com.ar;La Alondra Casa de Huéspedes;;;;;C/R;;**
            Micro Región Iberá;Mercedes;HOTEL BOUTIQUE;TORRE DEL GUAYAIBI;5;11;Marroquin de Lacour, Marisa;03773 15510210;RN 123, Km 128. GPS: s 29º 56 min;torredelguayaibi@gmail.com;www.torredelguayaibi.com.ar;Torre del Guayaibi;;;;;S/R;;**
            Paraná norte;Ituzaingo;HOTEL BOUTIQUE;HOTEL BOUTIQUE PUERTO VALLE HOTEL DE LOS ESTEROS;5;13;Sciort, Marisol;03786 425700;RN 12 Km 1282;reservas@hotelpuertovalle.com / recepcion@hotelpuertovalle.com;www.hotelpuertovalle.com;Puerto Valle Hotel de Esteros;;;;;A/CA;HOTEL BOUTIQUE RURAL 5 ESTRELLAS;969/14**
            Paraná norte;Ituzaingo;HOTEL BOUTIQUE RURAL;HOWARD JOHNSON;18;40;Cadena internacional;03786-420700;RN 12, Km 1246;info@hipuertosangara.com.ar;www.hojoar.com;Hotel Howard Jhonson Ituzaingó;;;;;A/CA;HOTEL BOUTIQUE RURAL 4 ESTRELLAS;525/16**
            Jesuítico Guaraní;Gobernador Virasora;HOTEL DE CAMPO;LAS ACACIAS;2;4;Mayol, José Carlos (Contacto);03756 154691666;RN 14 (Pegado a Virasoro);josecarlosmayol@hotmail.com;www.campolasacacias.com.ar / www.lasacacias.com.ar;;;;;;S/R;;**
            Gran Corrientes;Itatí;LODGE;LA REGINA SRL;30;98;Rzepek, Marcos (Encargado);16-3624-3627/3234-0692;RN 12. Km 1126;marcos_rzepeki@hotmail.com;www.laregina.net;;;;S/D;;;;**
            Gran Corrientes;Paso de la Patria;LODGE;GOLDEN FISHING LODGE;5;20;Botta, Vicente;03722 423292/15656746/0362- 154769014;Av. Díaz Colodrero y Av. Virgen de Itatí;;;;;;S/D;;;;**
            Micro Región Iberá;Mercedes;LODGE;IBERA LODGE;8;25;Mirador SA;0379 4230228/154018738 ;;reservas@iberalodge.com / info@iberalodge.com ;www.iberalodge.com;;;;;;A/CA;LODGE;211/16**
            Micro Región Iberá;Colonia Carlos Pellegrini;LODGE;IRUPÉ LODGE;11;37;Lacona, Mauricio;0376 154817479;Yacaré e Ysipo;info@ibera-argentina.com;www.ibera-argentina.com;Irupé Lodge;;;;LODGE;A/CA;LODGE;465/16**
            Solar de las Huellas;San Miguel;LODGE;MBOY CUA;6;15;Bee, Nora Adriana;3794-898105;Av. Itatí s/n entre calle Alberdi y Wilda Eced;info@posdamboycua.com;www.posadamboycua.com;Posada Mboy Cua;;;;;A/CA;LODGE;507/17**
            Paraná Sur;Esquina;LODGE;BAMBU RIVER LODGE;5;16;Solanas, Gustavo;03777 462024/15654000;Calle Dorado s/n;contacto@bamburiverlodge.com.ar;www.bamburiverlodge.com.ar;Bambu Riber Lodge;;;;;S/R;;**
            Paraná Sur;Esquina;LODGE;LOS GRINGOS;3;15;Lecour, Gastón;011-4751-2118/011-15529952;RN 12, Km 677;g.lecour@yahoo.com.ar;www.losgringoslodge.com.ar;Los Gringos Lodge;;;;;S/R;;**
            Paraná Sur;Esquina;LODGE;POSADA HAMBARÉ;24;55;Rohner, Arnoldo;03777 1547196/460270/460664;RN 12 s/n, acceso norte (Para notificaciones:  Santa Rita 370);posadahambare@ciudad.com.ar  contacto@posadahambare.com.ar ;www.posadahambare.com.ar;Posada Hambaré;;;;;S/R;;**
            Paraná Sur;Esquina;LODGE;MALAL CUE LODGE;6;11;Semenof, Ariel;03777-460378;RN 12, acceso norte. Quinta 1 bis;;;;;;;;S/R;;**
            Paraná Sur;Esquina;LODGE;IPACAA COUNTRY LODGE;3;12;Ward, Diego;03777-15519983;RN 12, 1ra sección, acceso norte O;;;;;;;;S/R;;**
            Paraná Sur;Esquina;LODGE;EL ROCIO OUTDOOR SPORT LODGE;7;19;Rohner, Arnoldo;;Adrema G1-2256-2. Chacra 1 bis, lote 2;;;;;;;;C/R;;586/12**
            Paraná Sur;Goya;LODGE;LODGE DE RIO;7;25;Maria Leonor Ambroseti;03777-430891/475915;Venezuela N° 1350;;;;;;;;C/R;;895/15**
            Paraná Sur;Goya;LODGE;DORADO CUA LODGE;4;8;Martín Batiston;03777-15621396;Esteros del Isiro;doradofly@goyanet.com.ar ;www.doradoadventure.com.ar;;;;;;S/D;;**
            Paraná Sur;Goya;LODGE;SAN ANDRES LODGE;1;6;Vernengo Andrés;;RN 12 Km 771;anacolodrero@hotmail.com.ar ;;;;;;;S/D;;**
            Paraná Sur;Goya;LODGE;CAPITÁ MINÍ;4;8;Bahiston Mario;03777-15621396;Paraje Capitá Miní;;;;;;;;S/D;;**
            Jesuítico Guaraní;Yapeyú;POSADA;POSADA SAN CARLOS DEL GUAVIRAVI;8;31;Sitja, Patricio y Balbastro;03772-15634320;RN 14, Km 549;posadasancarlos@yahoo.com.ar;www.posadasancarlos.com.ar;;;;;;S/D;;**
            Gran Corrientes;Empedrado;POSADA;POSADA DE LA COSTA;4;18;Calandria, Marcelo;379449151/379497387;Junín y Río Paraná;info@posadadelacosta.com.ar / costasolar@yahoo.com;www.posadadelacosta.com.ar;Posada de la Costa;;;S/R;;;;**
            Gran Corrientes;Itatí;POSADA;CAVA DEL RIO;8;24;Arcidiacono Maria Ines;3794-448455;Paraje Guazú;;;;;;S/D;;;;**
            Gran Corrientes;Itatí;POSADA;POSADA COSTA DEL PARANA;10;44;Mora, María Itatí;4493929/03722-15250246;Castor de León s/n casi Roque González de Santa Cruz;posadacostadelparana@hotmail.com;;Posada Costa del Paraná;;;S/D;;;;**
            Gran Corrientes;Itatí;POSADA;CARAYA RETA;2;34;Gonzalez Hugo (Encargado);;avda. Roque Gonzalez de Santa Cruz S/N entre castor de León y Avda. 25 de mayo;inggonzalezvedoya@yahoo.com.ar;www.posadadelostucanes.com;;;;C/R;;;;**
            Gran Corrientes;Paso de la Patria;POSADA;POSADA PASO DE LA PATRIA;24;44;Castaño, Gonzalo;44945586/154686789;Dorado y Costanera;gcastai@yahoo.com.ar;www.posadapasodelapatria.com.ar;Posada Paso de la Patria;;;S/D;;;;**
            Gran Corrientes;Paso de la Patria;POSADA;POSADA LAS PIEDRAS;4;12;;4431829;Av. Prefectura Naval Argentina y Catamarca;;;;;;S/D;;;;**
            Gran Corrientes;Paso de la Patria;POSADA;DEPARTAMENTO LA BARRA;12;40;Salcedo, Laura Isabel;494423/154582281;San Martín 920;lauraisabelsalcedo@hotmail.com;;;;;S/D;;;;**
            Gran Corrientes;Paso de la Patria;POSADA;POSADA PIRAYU;10;20;;379-154519450;Monte Caseros e Pedro Ferré y Lavalle;inf@posadapirayu.com.ar;www.posadapirayu.com.ar;Posada Pirayú;;;S/D;;;;**
            Micro Región Iberá;Mercedes;POSADA;POSADA EL QUINCHO;17;65;Latino Mohalem, Verónica;03773 15628988;Av. San Martín 2200;vero74@hotmail.com / posadaelquincho@gmail.com;www.minimercedes.com.ar/posadaelquincho;;;;;Resol. Nº 621/15;C/R;;621/15**
            Micro Región Iberá;Colonia Carlos Pellegrini;POSADA;POSADA TUPASY;8;24;Rosso, Carlos E.;03773 421965/ cel. 37- 412971/421965;Yacaré e Ysipó;;www.posadatupasy.com.ar;;;;;;S/R;;**
            Micro Región Iberá;Colonia Carlos Pellegrini;POSADA;POSADA DE LA LAGUNA;8;20;Guiraldes, Elsa;03773 499413/15408166;Guazuvirá s/n (entre Pindó y Caranday);secretaria@posadadelalaguna.com;www.posadadelalaguna.com;Posada de la laguna;;;;POSADA;A/CA;3;894/16**
            Micro Región Iberá;Colonia Carlos Pellegrini;POSADA;POSADA YPA SAPUCAI;5;14;Alonso, Fernando;03773 420155/15514212;Mburucuyá esq. Yacaré;info@ypasapucai.com.ar / iberaturismo@gmail.com ;www.ypasapucay.com.ar;Posada Ypa Sapucai Iberaturismo;;;;POSADA;A/CA;1;464/16**
            Micro Región Iberá;Colonia Carlos Pellegrini;POSADA;POSADA IBERÁ PORÁ;8;26;Gutiérrez, Marcelo;03773 421098-15622722/03777-15410315/3773411846;;posadaiberapora@argentina.com / iberapora@hotmail.com;www.posadaiberapora.blogspot.com;Posada Iberá Porá;;;;;S/R;;**
            Micro Región Iberá;Colonia Carlos Pellegrini;POSADA;ECO POSADA DEL ESTERO;7;22;Lozada, Estrella;011-1550204031;Yaguareté s/n y Pindó;contacto@ecoposadadelestero.com.ar;www.ecoposadadelestero.com.ar;;;;;POSADA;A/CA;2;358/13**
            Micro Región Iberá;Colonia Carlos Pellegrini;POSADA;POSADA AGUAPÉ;12;25;Capibara SRL;499412-011-1562279722;Yacaré y Ñangapirí;posadaaguape@gmail.com;www.aguapelodge.com ;Posada Aguape o Aguape Lodge;;;;POSADA;A/CA;3;1042/16**
            Micro Región Iberá;Colonia Carlos Pellegrini;POSADA;RANCHO IBERÁ;8;26;Drews, Walter Javier;0379-488373 / 03773-15412661;Aguará y Caraguatá;ranchoibera@hotmail.com / ranchoibera@yahoo.com.ar;www.posadaranchoibera.com.ar;Rancho Iberá;;;;POSADA;A/CA;3;892/16**
            Micro Región Iberá;Colonia Carlos Pellegrini;POSADA;RANCHO DE LOS ESTEROS;4;12;González Sampayo, María de las Mercedes;03773-15493041;Ñangapirí y Yacaré;ranchodelosesteros@gmail.com;www.ranchodelosesteros.com.ar;;;;;POSADA;A/CA;3;38/17**
            Micro Región Iberá;Colonia Carlos Pellegrini;POSADA;RANCHO INAMBU;4;12;Balparda, Julieta y Sisi, Jorge;03773-15435910/15464805;Yerutí entre Aguapé y Pahuajó;ranchoinambu@yahoo.com.ar;www.ranchoinambu.com.ar;Rancho Inambú Posada de Campo;;;;;S/R;;**
            Micro Región Iberá;Colonia Carlos Pellegrini;POSADA;POSADA DEL YACARÉ;6;19;Cabrera, Mirta B. e hijos;03773-490021/15628823 Fax 499415;Curupí entre Yaguareté y Aguará;posadadelyacare@hotmail.com / iberatour@hotmail.com;www.posadaelyacare.com;;;;;POSADA;A/CA;2;893/16**
            Micro Región Iberá;Colonia Carlos Pellegrini;POSADA;POSADA HUELLA IBERÁ;10;30;Rimoldi, Cora Beatriz;3773-443602;Salguero 1321;contacto@ecoposadadelestero.com.ar;www.ecoposadadelestero.com.ar;;;;;POSADA;A/CA;3;1154/16**
            Micro Región Iberá;Colonia Carlos Pellegrini;POSADA;POSADA CHE TEINDY;3;12;Couffignal, Mariano;;;;;;;;;;S/D;;**
            Micro Región Iberá;Chavarría;POSADA;RANCHO CATÉ;;;Casenave, Juan;03783-15205496;RN 123, acceso Chavarría;juancicasenave@hotmail.com;;;;;;;S/D;;**
            Solar de las Huellas;Concepción;POSADA;POSADA NIDO DE PAJAROS;4;9;Rougier, Claudio;;Bartolomé Mitre Nº 820;nidodepajarosposada@hotmail.com;;;;;;;C/R;;1011/15**
            Solar de las Huellas;Concepción;POSADA;LA ALONDRA´I;10;20;Aquino, Porfirio Antonio;03782 4428558/4465757;Calle Comercio esquina Independencia;;;;;;;;A/CA;POSADA 3 ESTRELLAS;859/16**
            Solar de las Huellas;Loreto;POSADA;POSADA DE LAS HUELLAS;3;10;Dobiak, Natalia;3794280342;Armengon Alegre 198 esq. San Miguel;ndobiak@gmail.com;;Posada de las Huellas;;;;;S/R;;**
            Paraná norte;Itá Ibaté;POSADA;EL REFUGIO;12;48;Sarjanovich, Ricardo A.;03781-495186;B. Mitre s/n;elrefugioturismo@hotmail.com;www.complejoelrefugio.com;Posada el Refugio;;;;;S/R;;**
            Paraná norte;Itá Ibaté;POSADA;COMPLEJO LA SERENA;9;43;Wagner, José E.;03781 495273/15609842;Berón de Astrada 645;info@complejolaserena.com;www.complejolaserena.com;;;;;;S/D;;**
            Paraná norte;Ituzaingo;POSADA;POSADA DEL SOL;10;52;Vimer, Víctor Carlos;03786-420352/154577480;Francisco López 1531;info@posada-sol.com.ar;www.posada-sol.com.ar;Posada del Sol Ituzaingó;;;;;S/R;;**
            Paraná norte;Isla Apipé Chico;POSADA;POSADA PUERTO ITATI;3;9;Esquivel pilar Inés;;Isla Apipe Chico;piliesquivel@hotmail.com ;www.posadpuertoitati;;;;;;;;S/R**
            Paraná Sur;Bella Vista;POSADA;LA POSADA;7;20;Mórtola, Alicia;03777-451409/15686134;Santa Fe 763;info@laposadabellavista.com.ar;www.laposadabellavista.com.ar;;;;;;S/R;;**
            Paraná Sur;Esquina;POSADA;POSADA ESQUINA AVENTURA;15;32;Cortés, Jorge;03777-461891/155710292;Colonia Bontón s/n;aventuraenesquina@gmail.com;www.aventuraenesquina.com.ar;;;;;;S/D;;**
            Paraná Sur;Esquina;POSADA;POSADA CASABLANCA;10;31;CUCC SA. Cucchiaro, Romain (Presidente);03777 460967/461371;El Dorado s/n;posadacasablanca@hotmail.com  info@posadacasablanca.com;www.posadacasablanca.com.ar;;;;;;A/CA;POSADA 2 ESTRELLAS;208/16**
            Paraná Sur;Esquina;POSADA;POSADA DEL CAUCE;9;41;Echenausi, Fernando;03777 15-552-574;Arroyo Veya. RN 12, Km 675;info@posadaslcauce.com.ar;www.posadadelcauce.com.ar;Posada del Cauce;;;;;S/D;;**
            Paraná Sur;Esquina;POSADA;LA CASA DEL PUERTO;3;8;Guerreo, Julián;03777-460844/011-1536319995/1550492662;Av. Costanera Pte. Perón 205;lacasadelpuerto@gmail.com;www.corrientes.com.ar;;;;;;S/R;;**
            Paraná Sur;Esquina;POSADA;POSADA AGUAPYCUÉ;8;22;Escobar, Laura Roxana;03777-467019/011-67628275;RN 12 acceso norte;info@aguapycué.com.ar/roxi_4873@hotmail.com;www.aguapicue.com.ar;;;;;;C/R;;953/16**
            Paraná Sur;Esquina;POSADA;POSADA DEL MUELLE;13;40;Delfabro, José;03777-461737/1565853;El Dorado 2229;posadadelmuelle@hotmail.com;www.posadadelmuelle.com.ar;;;;;;S/R;;**
            Paraná Sur;Esquina;POSADA;POSADA LOS CEIBOS;4;13;Pérez, Ramón Roque;03777-15470927/461257;El Ceibo y Río Corriente;posadalosceibos@gmail.com;www.corrientes.com.ar/posadadelosceibos;;;;;;S/D;;**
            Paraná Sur;Goya;POSADA;POSADA ALARCON;3;15;Alarcón, Raúl Alberto y Cáceres de Alarcón, Graciela;03777 423277/15544473;Corrientes 987;posadaalarcon@gmail.com ;;;;;;;S/R;;**
            Paraná Sur;Goya;POSADA;POSADA CAROLINA;7;;Simoni, Carlos A.;;RN 12, Altos de Carolina, calle s/n. Municipio Carolina;;;;;;;;S/D;;**
            Paraná Sur;Goya;POSADA;POSADA DEL PESCADOR;2;8;Verges, Ebar;03777 430765/421923/424242;Sobre el Río Santa Lucía - Parque;;;;;;;;S/D;;**
            Paraná Sur;Goya;POSADA;POSADA LAS ARECAS;11;30;Lecani Estebeni;03777-420647;San Martín 273;posadalasarecas@hotmail.com;;;;;;;C/R;;1104/15**
            Gran Corrientes;Capital;RESIDENCIAL;RESIDENCIAL DON JOSE;27;60;Senderos SRL;4426506;Héroes Civiles 1898;residencial_donjose@hotmail.com;;;;;;;S/D;;**
            Gran Corrientes;Itatí;RESIDENCIAL;MAMA COCA;5;50;Vellejos Julio Cesar;3794-4453279;Desidero SosaS/N;;;;;;S/D;;;;**
            Gran Corrientes;Paso de la Patria;RESIDENCIAL;TU SPACIO;7;14;Cañete, Mercedes Vilma;154242044;San Martín 900;lili-cañete@hotmail.com;www.tuespacioelpaso.com.ar;Tu Espacio en el Paso;;;S/D;;;;**
            Gran Corrientes;Paso de la Patria;RESIDENCIAL;SINDICATO EMPLEADOS DE COMERCIO DE RESISTENCIA;16;48;Vega, Agripino (Encargado);;Av. Prefectura Naval S/;;;;;;S/D;;;;**
            Gran Corrientes;Paso de la Patria;RESIDENCIAL;DEPARTAMENTO ENECE;8;20;Capara, Conina Mercedes y Capara, Ernesto Emiliano;4494153;Rioja 530;farmaciaenece@hotmail.com;;;;;S/R;;;;**
            Gran Corrientes;San Cosme;RESIDENCIAL;RESIDENCIAL MENDOZA;8;20;Mendoza, Mirta Inés;154545562;2 d Febrero y Pujol;;;Hospedaje Mendoza San Cosme;;;;;S/R;;**
            Micro Región del Sur;Curuzú Cuatiá;RESIDENCIAL;RESIDENCIAL AVENIDA;16;32;Sánchez, Víctor César;03774-422737;B. Astrada 1699;;;;;;;;S/R;;**
            Micro Región del Sur;Curuzú Cuatiá;RESIDENCIAL;RESIDENCIAL VILLANUEVA;9;31;Cornalo, Carlos Luis;03774-422238;Caá Guazú 1296;;;;;;;;S/R;;**
            Paraná norte;Itá Ibaté;RESIDENCIAL;RESIDENCIAL OASIS;6;18;Aponte, Oscar;0379-15401241;RN 12, Km 1185;oscarnestoraponte@gmail.com ;;;;;;;S/R;;**
            Paraná Sur;Bella Vista;RESIDENCIAL;EL PARAISO;13;40;Acebal, Ramón Enrique;0377 15734983;Gral. Roca 1576 (Domicilio legal);;;;;;;;S/R;;**
            Paraná Sur;Esquina;RESIDENCIAL;ALOJAMIENTO ESQUINA;4;13;Barrios, Manuel;03777 460728/15552215;Belgrano R. F. García;alojamientoesquinactes@hotmail.com;www.corrientes.com.ar;Alojamiento Esquina Ctes;;;;;S/R;;';



    $hoteles = explode('**',$hoteles);

    foreach ($hoteles as $key => $value)
    {
        $h = new Hotel();
        $h->construct($value);
    }



    }

}
