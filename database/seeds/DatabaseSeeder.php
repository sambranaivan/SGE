<?php

use Illuminate\Database\Seeder;


use App\hotel;
use App\municipio;
use App\user;
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
        self::crearMunicipios();
        self::crearHoteles();
        self::crearMuestra();
        self::crearUsuarios();

    }

    private function crearUsuarios(){

        $u = new User();
        $u->name = "administrador";
        $u->email = "estadistica@corrientes.com";
        $u->password = bcrypt("estadistica2018");
        $u->save();

        $u = new User();
        $u->name = "observatorioturisticoctes";
        $u->email = "observatorioturisticoctes@gmail.com";
        $u->password = bcrypt("observatorio2018");
        $u->save();

        $u = new User();
        $u->name = "Turismo Corrientes";
        $u->email = "turismo@corrientes.com";
        $u->password = bcrypt("turismo2018");
        $u->save();


    }


    private function crearMuestra(){
        $muestra = array(4,5,9,15,17,18,19,21,23,55,62,63,65,67,71,73,76,77,78,84,86,89,104,117,120,125,127,130,132,137,138,180,181,182,183,187,211,212,213,216,217,218,219,220,231,235,238,239,244,246,247,250,251,252,256,266,271,276,278,280,281,284,286,291,297,301,311,312,313,314,315,318,323,326,328,338,339,340,342,354,356,357,358,359,360,361,366,368,376,379,381,393,395,399,402,403,405,408,412,423,426,437,443,446,447,448,449,453,460,469,473,474,479,480,481,491,492,493,495,496,497);

       foreach ($muestra as $key => $value)
       {
        $h = hotel::find($value);
        $h->muestra=true;
        $h->save();
       }

    }

    private function crearHoteles()
    {
    $hoteles = '
Gran Corrientes;15;Alquileres Temporarios;Refugio Guarani (Dpto.);2;3;González, María Concepción ;3794-594378;España 698;nariacgonzalez13@hotmail.com;;;;;;;C/R;;1034/15;**
Gran Corrientes;15;Alquileres Temporarios;Anibal Guillermo Tosetti (Casa);;;Tosetti, Aníbal Guillermo;3794-702030;Mendoza 670;;;;;;;;S/D;;;**
Gran Corrientes;15;Apart Hotel;La Rozada Apart Hotel;20;60;Lischinsky, Pablo;4433001/44824913;Plácido Martínez 1223;;www.larozada.com;La Rozada Suites;;;;;A/C;3;972/14;**
Gran Corrientes;15;Apart Hotel;Don Suites Apart Hotel;27;62;T. de Lorenzo, María Luisa;4423433/154670049;La Rioja 442;lucia@donsuites.com.ar / info@donsuite.com.ar;www.donsuites.com;Don Suites Apart Hotel;;;;;A/C;3;451/12;**
Gran Corrientes;15;Apart Hotel;Astro Apart Hotel;27;61;Verrastro, Javier;4466112/4466125;Bolívar 1288;contacto@astroapart.com;www.astroapart.com ;Astro Apart Hotel;;;;;S/R;;;**
Gran Corrientes;15;Apart Hotel;Apart Hotel Rivadavia;13;39;;4521536;Rivadavia N° 1379;;;;;;;;A/C;3;201/17;**
Gran Corrientes;15;Bed & Breakfast;Ñande Roga;6;22;Cipollini, María Amalia;4439401/154552138;Carlos Pellegrini 1756;reservas@ñanderogacorrientes.com.ar/nanderogahotel@hotmail.com.ar;www.nanderoga.es.tl;Hotel Ñanderoga Corrientes;;;;;A/C;BED & BREAKFAST CATEGORIA UNICA;491/12;**
Gran Corrientes;15;Hospedaje;Hospedaje San Lorenzo;20;40;Montenegro, Víctor E.;4421740/154523780;San Lorenzo 1136;info@hospedajesanlorenzo.com.ar/montenegroestoanoff_srl@hotmail.com;www.hospedajesanlorenzo.com.ar;Hospedaje San Lorenzo;;;;;S/R;;;**
Gran Corrientes;15;Hospedaje;Hospedaje Artigas;23;62;Rosa, Duarte;4461745/4432361;Av. Artigas 1269;;;;;;;;S/D;;;**
Gran Corrientes;15;Hospedaje;Hospedaje Brasil;18;57;Prose, Pablo César;4444138;Av. Maipú 2400;hotel-brasil@hotmail.com;;;;;;;S/D;;;**
Gran Corrientes;15;Hospedaje;Hospedaje Don Jose;8;16;Ranalle, Daniel Gustavo;4442592;Av. Maipú 2496;;;;;;;;S/D;;;**
Gran Corrientes;15;Hospedaje;Hospedaje Ranalli;8;24;Ranalli Edi Martha;4441341;Avda. Maipú 2492;;;;;;;;S/D;;;**
Gran Corrientes;15;Hostel;Hostel Bienvenida Golondrina;6;30;Rodríguez, Florencia;4435316/3794-855026;La Rioja 455;bvngolondrina@gmail.com;www.hostelbienvenidagolondrina.com;Bienvenida Golondrina Hostel;;;;;S/R;;;**
Gran Corrientes;15;Hostel;Hostel Dalí;5;30;Díaz, Gonzalo;154740020;Av. Maipú 2498;mcr9@hotmail.com ;;;;;;;S/R;;;**
Gran Corrientes;15;Hostel;Hostel Corrientes;5;25;Cabral, Marta;4469474;Buenos Aires 508;hostelcorrientes@live.com.ar;;Hostel Corrientes;;;;;C/R;;;**
Gran Corrientes;15;Hostel;Catedral Hostel Corrientes;3;22;Aguirre Humberto;0379-155010007;San Lorenzo 1097;reservas@catedralhostel.com ;www.catedralhostel.com ;;;;;;S/R;;;**
Gran Corrientes;15;Hotel;Turismo Hotel Casino;115;230;Viavas, Gabriela;4462244;Entre Ríos 650;reservas@turismohotelcasino.com.ar;www.ghturismo.com.ar;Turismo Hotel Casino;;;;;A/C;5;425/12;**
Gran Corrientes;15;Hotel;Hotel Guarani;152;260;Biloni, Miguel;4433800;Mendoza 970;reservas@hotelguarani.com;www.hotelguarani.com;Gran Hotel Guarani;;;;;A/C;4;44/2017;**
Gran Corrientes;15;Hotel;Hotel Orly;97;145;Goitia, Griselda;4427248/4420280;San Juan 867;contacto@hotelorlycorrientes.com.ar/reservas@hotelorlycorrientes.com.ar;www.hotelorlycorrientes.com.ar;;;;;;S/R;;;**
Gran Corrientes;15;Hotel;Corrientes Plaza Hotel;95;161;Hotelom S.R.L.;446-6500;Junín 1549;hotelplaza_reservas@hotmail.com/hotelplaza-solar@hotmail.com ;www.hotel-corrientes.com.ar;Corrientes Plaza Hotel;;;;;S/R;;;**
Gran Corrientes;15;Hotel;Hotel San Martin;70;139;Alicia Cambiano de Galvez ;4421061/4421068;Santa Fe 955;hotelsanmartinctes@gmail.com;www.sanmartin-hotel.com.ar;Hotel San Martín;;;;;S/R;;;**
Gran Corrientes;15;Hotel;Hotel Confianza;40;84;Podestá, Francisco;4426556;Mendoza 1129;hotelconfianza@gmail.com / mutualconfianza@fibertel.com.ar;www.hotelconfianza.com.ar;Hotel Confianza;;;;;C/R;;;**
Gran Corrientes;15;Hotel;Hotel Identidad;71;160;Fernández, Osvaldo;4423939/4422956;H. Irigoyen 1470;reservas@hotelidentidad.com.ar / hotelidentidad@gmail.com;www.hotelidentidad.com.ar;Hotel Identidad;;;;;A/C;3;115/16;**
Gran Corrientes;15;Hotel;Hotel Caribe;17;50;Constanzo, Omar Ernesto;4442197;Av. Maipú 2596;;;;;;;;S/R;;;**
Gran Corrientes;15;Hotel;Hotel Pavon;33;84;Pavón, Ramón M.;4442166/4411732;Av. Maipú 2600;hotelpavon@hotmail.com;www.hotelpavon.com.ar;Hotel Pavón;;;;;S/R;;;**
Gran Corrientes;15;Hotel;Hotel Victoria;17;80;Sosa, Jorge L.;4435547;España 1052;hotelvictoria1@hotmail.com ;www.hotelvictoriaweb.com.ar;;;;;;S/R;;;**
Gran Corrientes;15;Hotel;Hotel Sudamericano Srl;20;60;Sosa, Luciano O.;4464242;H. Irigoyen 1676;hotel_corrientes@hotmail.com;;;;;;;S/R;;;**
Gran Corrientes;15;Hotel;Hotel Dora;15;39;Sosa Gladis Alicia;4421053/154636417;España 1050;hoteldora@hotmail.com.ar;;;;;;;S/R;;;**
Gran Corrientes;15;Hotel;Hotel Del Parque;28;108;Verellen, Edgar;4230667/154737202;RUTA Nac. 12 km 1028;hotel.delparque@hotmail.com;;Hotel del Parque Corrientes;;;;;S/R;;;**
Gran Corrientes;15;Hotel;Hotel La Galeria;8;24;Zacarias Diego;3795-050714;H. Irigoyen 1057;;;;;;;;S/R;;;**
Gran Corrientes;15;Hotel Boutique;La Alondra Casa De Huesped;15;42;Rolón, Valeria;4430555/4430999;Av. 3 de Abril;info@laalondra.com.ar ;www.laalondra.com.ar;La Alondra Casa de Huéspedes;;;;;C/R;;;**
Gran Corrientes;15;Residencial;Residencial Don Jose;27;60;Senderos SRL;4426506;Héroes Civiles 1898;residencial_donjose@hotmail.com;;;;;;;S/D;;;**
Gran Corrientes;18;Cabaña;Hotel Costa Cocos;16;70;Marasconi, Susana (Prof.);03624-897309 / 0362-154889241;Colonia Gdor. Soto. Lote 42 RN Km 980;costacocoshotelderio@gmail.com;;;;Alojamiento categorizado (Bungalows/cabañas);A/CA;3;128/16;;;**
Gran Corrientes;18;Cabaña;Cabañas San Antonio;3;18;Moyano, Valeria;3794-044427;9 de Julio 746 esq. Cambaceres;moyano25@yahoo.com.ar;;Cabañas San Antonio;;;S/R;;;;;**
Gran Corrientes;18;Cabaña;Cabañas Del Descanso;3;20;Cáceres, Rito;3794491146/3794680606;Bartolomé Mitre N° 245;el.descanso@hotmail.com;;;;;S/R;;;;;**
Gran Corrientes;18;Cabaña;Cabañas Doña Kika;3;7;Acevedo, Héctor Dejesus;3794461422/3794250735;Roca 212;alquilerdecasaschingolo@hotmail.com;www.chingolocasaalquila.com.ar;;;;S/R;;;;;**
Gran Corrientes;18;Cabaña;Cabañas Las Barrancas;12;36;Rita Susana Ester Atencio de Porcel;4491604/15463603;Julio A. Roca y Río Paraná;complejoslasbarrancas@hotmail.com;;;;6 cabañas de 2 ambientes c/u (12);S/R;;;;;**
Gran Corrientes;18;Cabaña;Cabañas El Encanto;3;15;Paratore, Pedro;4491601;Gral. Paz 640;pedroparatore@hotmail.com;;Cabañas El Encanto Empedrado;;;C/R;;;;;**
Gran Corrientes;18;Cabaña;Cabañas La Posada;3;24;Berdini, Zulma;4491474/154477823;Mitre 609;;;;;;S/R;;;;;**
Gran Corrientes;18;Cabaña;Cabañas Puesta Del Sol;6;42;Pérez, Marina Angeles;4491894/154312193;9 de Julio y río Paraná;marinaluz2011@live.com.ar;www.corrientes.com.ar/puestadelsol;Cabañas Puesta del Sol;;;S/R;;;;;**
Gran Corrientes;18;Cabaña;Cañañas Itati;8;24;Savino Clodine;4491688/0362569789;Fanfarria Alto Parú Nº 50;cabaniasitati@yahoo.com.ar;www.cabaniasitatiempedrado.blogspot.com;;;4 cabañas con 2 habitaciones c/u (8);S/R;;;;;**
Gran Corrientes;18;Cabaña;El Barrancas;4;8;Iglesias, Jorge Omar;3774-411948;Moreno 701 (Sauce);;;;;;S/R;;;;;**
Gran Corrientes;18;Cabaña;El Viejo Pescador;;;;3794-750558;Tucumán 745;rubendarioruffino@gmail.com;;;;;S/R;;;;;**
Gran Corrientes;18;Cabaña;Cabañas El Negrito;3;7;Balcazas, Gloria y Coronel ;3794491149/379425073;Bartolomé Mitre 1079;;;Cabañas el negrito;;;S/R;;;;;**
Gran Corrientes;18;Cabaña;Cabañas El Descanso;6;30;ramirez Monica Graciela;3794491515/3794704108;Cambaceres y 25 de Mayo;;;;;;S/R;;;;;**
Gran Corrientes;18;Cabaña;Cabañas Shirre;2;8;Rodríguez, Carmen Mabel;3795041444;Gral. Paz 751;;;;;;S/R;;;;;**
Gran Corrientes;18;Cabaña;Cabañas Lely;2;6;Rolon Audelina;3794056906;La Rioja 343;;;;;;S/R;;;;;**
Gran Corrientes;18;Cabaña;Cabaña Las Dos Hermanas;6;15;Aguirre, Esmeralda;3782523359;Bartolomé Mitre y Alsina;;;;;;S/R;;;;;**
Gran Corrientes;18;Cabaña;Cabañas Feyling;3;7;Feyling, Nicolás;3795042391;Belgrano 571;;;;;;S/R;;;;;**
Gran Corrientes;18;Camping;Camping Rio Bonito;;;Parodi, Lucas Marías;3794773935/1140780444;Manuel Derqui;riobonitocamping@gmail.com ;;;;;S/D;;;;;**
Gran Corrientes;18;Hotel;Hotel De Los Navegantes;14;38;Sindicato Obrero Marítimo Unido (SOMU);03783-15213474;Ruta 12 Km 977;suarez_jmiguel@hotmail.com / descansodebucaneros@hotmail.com;;;;;C/R;;965/14;;;**
Gran Corrientes;18;Hotel;Balcon Del Parana;40;120;Luciana Miriam y Trotti, Anibal S.H;0379-4491200/222-4491500;Lavalle y Río Paraná;info@balcondelparana.com.ar;www.balcondelparana.com.ar ;Balcón del Paraná;;;S/R;;;;;**
Gran Corrientes;18;Posada;Posada De La Costa;4;18;Calandria, Marcelo;379449151/379497387;Junín y Río Paraná;info@posadadelacosta.com.ar / costasolar@yahoo.com;www.posadadelacosta.com.ar;Posada de la Costa;;;S/R;;;;;**
Gran Corrientes;30;Cabaña;Cabaña De Allá Ité;;;;154596667;;;;Cabañas Corrientes Itatí de Allá Ité;;;S/D;;;;;**
Gran Corrientes;30;Cabaña;Puerto Paraiso;14;56;Teitelman, Daniel;03781-608648/0379-4493469;Los Benedictinos. Bº Abarapé;federicoteitelman@hotmail.com;www.puertoparaiso.com.br;Cabañas Puerto Paraíso;;;S/D;;;;;**
Gran Corrientes;30;Cabaña;La Macarena;5;10;Arriortua, Juan Pablo de;0364-154626788/0379-154531182;;reservas@cabañaslamacarena.com.ar;www.cabañaslamacarena.com.ar;;;;S/D;;;;;**
Gran Corrientes;30;Cabaña;Cabaña Ñande Rancho;1;6;Alcaraz, Juan Gregorio;;San Martín y Río Paraná;;;;;;S/D;;;;;**
Gran Corrientes;30;Cabaña;El Chaqueño;2;11;García, Oscar Horacio;3794-784371/8041061;Bo. Ibiray. Río Paraná y Cortada s/n;;www.cabanasycampingelchauqno.com;;;;S/R;;;;;**
Gran Corrientes;30;Cabaña;De Luis Antonio Ramirez;4;12;Ramírez, Luis Antonio;;San Luis del Palmar entre Villegas y San Martín;luisguiadepesca@hotmail.com.ar;;turismo y aventura;;;S/D;;;;;**
Gran Corrientes;30;Hospedaje;Hospedaje El Colonial;14;20;Gervasoni, Marta;4493050/154407426;Desiderio Sosa 731;cel_08_merc@hotmail.com;;;;;S/D;;;;;**
Gran Corrientes;30;Hospedaje;Hospedaje Virgen De Itati;10;40;Estoup, Victorino;4493576;Desidierio Sosa 650;;;;;;S/D;;;;;**
Gran Corrientes;30;Hospedaje;Hospedaje Las Melli;14;44;Almada, Estela Maris;154516684/154381535;Belgrano esq. Garay;hospedajelasmelli@hotmail.com;www.hospedajelosmellis.com.ar;;;;S/D;;;;;**
Gran Corrientes;30;Hospedaje;Hospedaje Itati;15;60;Contreras, Ricardo César;4493349;Fray Juan de Gamarra s/n casi Roque González de Santa Cruz;hospedajeitati@hotmail.com;;;;;S/D;;;;;**
Gran Corrientes;30;Hospedaje;Hospedaje Loma Guazú;21;83;Anonis, José;4493061/15408094;Obispo Luis Niella 965;;;Hospedaje Loma Guazú;;;S/D;;;;;**
Gran Corrientes;30;Hospedaje;Hospedaje El Gauchito;18;72;Torres, Ramona Adelma;4493250-3794-540888;Obispo Niella 438;hospedaelgauchito@hotmail.com.ar;;Hospedaje El Gauchito;;;S/D;;;;;**
Gran Corrientes;30;Hospedaje;Hospedaje Taba Cue;19;60;Escalante, Ramón Leopoldo;3794-493254;Obispo Luis María Niella 422;;;;;;S/D;;;;;**
Gran Corrientes;30;Hospedaje;Hospedaje Casa Del Promesero;63;200;Medina, Saturnino Ramón;4493369;Obispo Niella s/n;;;;;;S/R;;;;;**
Gran Corrientes;30;Hospedaje;Las Tacuaras;7;21;Torres, Héctor;4493515;Desiderio Sosa 881;;;;;;S/D;;;;;**
Gran Corrientes;30;Hospedaje;Hospedaje Jajejohu;15;33;Acuña de Marín, Gladys Inés;4493399;Desiderio Sosa 620;;;;;;S/D;;;;;**
Gran Corrientes;30;Hospedaje;Hospedaje La Abuela;4;12;Tonanez, Carlos;0379-4493220/154387744;Desiderio Sosa 893;catonal56@hotmail.com;;;;;S/D;;;;;**
Gran Corrientes;30;Hospedaje;Hospedaje Las Palmeras;12;39;Marín de Goycoechea, Irenea;4493036/154752160;Desiderio Sosa 769;;;;;;S/D;;;;;**
Gran Corrientes;30;Hotel;Hotel Antartida;19;58;Roch, Carlos Alberto;4493060;Av. 25 de Mayo 250;barbararoch90@gmail.com ;;Hotel Antártida;;;S/R;;;;;**
Gran Corrientes;30;Hotel;Hotel El Promesero;22;56;Romero, María Cintia;3794-651875;Av. 25 de Mayo 230;;;;;;S/R;;;;;**
Gran Corrientes;30;Hotel;Hotel Octavio;5;14;Nahnias, Octavio;4493264/154590572;Fray Gamarra 565;hospedajeoctavio@hotmail.com;;;;;S/D;;;;;**
Gran Corrientes;30;Hotel;Terraza Del Parana;5;22;Rodríguez, Juan Carlos;4493148/15467452;Pje. Guazú s/n;;;;;;S/D;;;;;**
Gran Corrientes;30;Hotel;Hotel Del Rio;30;80;Ratti Siñoli Leonardo;3794-493155/285370;avda. 25 de mayo S/N;joharatti@hotmail.com ;;;;;S/R;;;;;**
Gran Corrientes;30;Hotel;Hotel Avenida;14;42;Oliveira, Constancia y Gervasoni, Angélica de;3794-869341/4493012;Av. 25 de Mayo S/N;ramiroitati@hotmail.com;;;;;S/D;;;;;**
Gran Corrientes;30;Lodge;La Regina Srl;30;98;Rzepek, Marcos (Encargado);16-3624-3627/3234-0692;RN 12. Km 1126;marcos_rzepeki@hotmail.com;www.laregina.net;;;;S/D;;;;;**
Gran Corrientes;30;Posada;Cava Del Rio;8;24;Arcidiacono Maria Ines;3794-448455;Paraje Guazú;;;;;;S/D;;;;;**
Gran Corrientes;30;Posada;Posada Costa Del Parana;10;44;Mora, María Itatí;4493929/03722-15250246;Castor de León s/n casi Roque González de Santa Cruz;posadacostadelparana@hotmail.com;;Posada Costa del Paraná;;;S/D;;;;;**
Gran Corrientes;30;Posada;Caraya Reta;2;34;Gonzalez Hugo (Encargado);;avda. Roque Gonzalez de Santa Cruz S/N entre castor de León y Avda. 25 de mayo;inggonzalezvedoya@yahoo.com.ar;www.posadadelostucanes.com;;;;C/R;;;;;**
Gran Corrientes;30;Residencial;Mama Coca;5;50;Vellejos Julio Cesar;3794-4453279;Desidero SosaS/N;;;;;;S/D;;;;;**
Gran Corrientes;46;Apart Hotel;Apart Alto Parana;11;62;Romero Bieber, Federico;4494777/154775105/4494700;Cazadores Correntinos 123 o San Luis y Belgrano;altoparanaapart@arnetbiz.com.ar / complejoaltoparana@hotmail.com;www.apartparana.com.ar;Alto Paraná Apart;;;S/D;;;;;**
Gran Corrientes;46;Apart Hotel;Punta Iglesias Apart;7;36;Pérez Eduardo;362-4537094;Av. Virgen de Itatí y Miella;info@puntaiglesiasapart.com.ar;www.puntaiglesiasapart.com.ar;;;;S/D;;;;;**
Gran Corrientes;46;Apart Hotel;Arrebol Complejo Apart;2;6;Albarenque, Sebastián (Gerente);;Bo. Los Pescadores. Calle Pejerrey;albarenque@hotmail.com;;;;;S/D;;;;;**
Gran Corrientes;46;Bungalow;Bungalows La Candelaria;6;24;Bompland, Carlos Bravo;4494692/154663878;Av. Santa Coloma y Río Paraná;lacandelariapp@yahoo.com.ar;www.lacandelariapesca.com.ar;;;;S/D;;;;;**
Gran Corrientes;46;Bungalow;Complejo Virgen De Itati;18;75;Pereyra Roberto;4494045;25 de Mayo y Jujuy;virgendeitati@hotmail.com;www.sindicatodelseguro.com;;;;S/D;;;;;**
Gran Corrientes;46;Cabaña;Rio Parana Lodge;4;16;Miraclo, Leonardo;3794-727200;Av. Cazadores Correntinos y Luis Botto;;www.rioparanalodge.com;;;;S/D;;;;;**
Gran Corrientes;46;Cabaña;Cabañas Don Julian;24;70;Lafuente, María y Andrés;4494021/024;Julián Lafuente 1881;donjulian.reservas@gmail.com;www.cabanadonjulian.com.ar;;;;C/R;;;;;**
Gran Corrientes;46;Cabaña;Cabañas Brisas Del Parana;3;24;Becher, Juan Carlos;154202318/4418713/154389820;Surubí esq. Lapacho;brizas.del.parana@hotmail.com;www.lasbrizasdelparanablogspot.com.ar;;;;S/D;;;;;**
Gran Corrientes;46;Cabaña;Complejo De La Penintenciaria Federal;8;48;López Americo;4494204- 011-57076974;Mendoza 960;americoraully@hotmail.com ;;;;;S/R;;;;;**
Gran Corrientes;46;Cabaña;Circulo De Sub-Oficiales De La Policia;10;50;Aquino, Gladis Isabel (Encargada);4490063/154865762/4494363;Pacú y Dorado s/n;copctes@arnet.com.ar;;Circulo de Suboficiales de la Policía de Corrientes;;;S/D;;;;;**
Gran Corrientes;46;Cabaña;Cabaña Don Marco;5;22;Forabtier, Ramón Miguel;154687964/4405609;Ruta 6. Km 3. Bo. Frutilla s/n;marcoforastier@hotmail.com;;Marco Forastier;;;S/D;;;;;**
Gran Corrientes;46;Cabaña;La Morena;8;24;Martínez, Héctor Rolando y Kuperrstein, Marcelo Saúl;3794-019924;Luis Botto Nº 50;malumorel@yahoo.com.ar / malumorel@hotmail.com;;La Morena Cabañas;;;S/R;;;;;**
Gran Corrientes;46;Cabaña;Cabañas Awakay ;8;40;Monguet Colombo, Ibis y Mega, Marcelo;03722-15718606/304200/710202;Chubut y Neuquén;;;Wa-Kay Cabañas;;;S/D;;;;;**
Gran Corrientes;46;Cabaña;Cabañas Amira;5;30;Nallib Skdiker, Dardo;03732-15621019/0364-154607849;Surubí 555;marthaelizabetgaleano@gmail.com ;www.cabaniasamira.com.ar;Cabañas Amira;;;S/R;;;;;**
Gran Corrientes;46;Cabaña;Solar Del Paso;10;34;Cozzarini, Raúl;0379-154331905 / 0362-154261440;Urunday 1139;wensw@solardelpaso.com ;www.solardelpazo.com.ar;Solar del Paso Cabañas;;;S/R;;;;;**
Gran Corrientes;46;Cabaña;Cabañas El Arenal;;;Marasso, Mauricio Fernando;154638939;Córdoba 242;;www.cabañaselarenal.com.ar;;;;S/D;;;;;**
Gran Corrientes;46;Cabaña;Cabañas El Descanso;2;13;Sosa, Jorge;4494333/154602395;25 de Mayo entre Sgo. del Estero y San Martín;;;Cabañas El Descanso;;;S/R;;;;;**
Gran Corrientes;46;Cabaña;Cabañas De La Patria Sh;4;24;Graciela Tejerina y Ricardo Osuna;03717-427519/154357818;Av. Virgen de Itatí 3150;info.delapatria@gmail.com / cabaniasdelapatria@hotmail.com.ar;www.cabañasdelapatria.com.ar;;;;S/D;;;;;**
Gran Corrientes;46;Cabaña;El Turf Cabañas;5;25;Lafuente, Juan Rubén;0362-154209981;Honduras s/n;info@complejoelturf.com.ar;www.complejoeklturf.com.ar;;;;S/R;;;;;**
Gran Corrientes;46;Cabaña;Cabañas Don Ñolo;;;Spagnolo, Fabricio M.;0379-4427360-154532311;Pirayagua 230. Bo. Los Pescadores;;;;;;S/D;;;;;**
Gran Corrientes;46;Cabaña;Cabaña Las Rocas;11;28;Margosa Pablo;03482-15581200;8 de Diciembre y Libertad;info@complejolasrocas.com.ar ;;;;;S/D;;;;;**
Gran Corrientes;46;Cabaña;Cabañas Sueño Dorado;16;40;Vallejos Griselda Elisa;4494760/154781088;Córdoba 160;luisgmacias@hotmail.com ;;Sueño Dorado Paso Patria;;;S/D;;;;;**
Gran Corrientes;46;Cabaña;Country Marina Hueso Cue;8;64;Migliorini, Yolanda;44944265;Av. Brig. Pedro Ferré s/n;;www.marinahuesocue.com.ar;Marina Hueso Cue;;;C/R;;;;;**
Gran Corrientes;46;Cabaña;Cabañas De Ensueño;4;24;Ongay Jorge;3794022754/44889836;Av. Cazadores Correntino s/n;jjo54@hotmail.com;;;;;S/R;;;;;**
Gran Corrientes;46;Cabaña;Cabaña Chamigo;4;24;;379-4494667;Av. Virgen de Itatí esq. Ferré;;;;;;S/D;;;;;**
Gran Corrientes;46;Cabaña;Cabaña Sapucay;3;12;;;6 de Diciembre 128 (Inmobiliaria Nordeste);;;Cabañas Sapucay;;;S/D;;;;;**
Gran Corrientes;46;Cabaña;Cabañas Bokeron;7;28;;379-154025733/362-154645452;Av. Cazadores Correntinos 511;cabanasbokeron@gmail.com;;Cabañas Bokeron;;;S/D;;;;;**
Gran Corrientes;46;Cabaña;San Juan De Los Pescadores;4;12;Kalbermatter, Diego A.;;Pje. Cordobesa Cué altura Km20;diegokalbermatter@gmail.com ;;;;;C/R;;464/14;;;**
Gran Corrientes;46;Cabaña;Cabañas Piracuacito;4;16;Leguizamón, Julio Daniel;3794-668417;Av. Virgen de Itatí esq. Santo Tomé;julioleg@hotmail.com;;;;;C/R;;945/15;;;**
Gran Corrientes;46;Cabaña;Quebracho Blanco;2;12;Zurita, Norma;3795-918572;Catamarca 788;norma_piris@hotmail.com.ar;;;;;S/D;;;;;**
Gran Corrientes;46;Camping Y Complejos;Complejo Sindical Del Docente;8;32;Romero, José (Encargado);3795-057662;12 de Octubre entre Jujuy y Libertad;;;;;;S/D;;;;;**
Gran Corrientes;46;Camping Y Complejos;Complejo Petrolero;8;48;Lorenzo Claudio (Encargado);;Av. Prefectura Naval s/n;sintripega@ciudad.com.ar;;;;;S/R;;;;;**
Gran Corrientes;46;Camping Y Complejos;Complejo Setia (Textil);15;70;Gimenez Bernardo Angel;0379 4494175;Rivadavia y Navajas Artaza s/n;;;;;;S/R;;;;;**
Gran Corrientes;46;Camping Y Complejos;Complejo Mupaye;30;101;Lastra Cristian;4494106/154636012;Catamarca entre Prefectura y Uruguay;complejomupaye@hotmail.com ;;Complejo Mupaye;;;S/R;;;;;**
Gran Corrientes;46;Camping Y Complejos;Complejo Paso Del Rey;14;70;Gualtieri Raúl;;Lapacho 200. Bo. Jardín;info@complejopasodelrey.com;www.complejopasodelrey.com;Complejo Paso del Rey;;;S/R;;;;;**
Gran Corrientes;46;Camping Y Complejos;Sindicato Del Seguro De La Republica;18;70;Vaspag, Miguel Angel;0379 4494045;Jujuy 97;;;;;;S/D;;;;;**
Gran Corrientes;46;Camping Y Complejos;Complejo Las Rocas;3;18;Piccoli, Claudia del Carmen;03782-15551200/15421334;8 de Diciembre 1169;info@complejolasrocas.com.ar;www.complejolasrocas.com.ar;Complejo Las Rocas;;;S/D;;;;;**
Gran Corrientes;46;Hospedaje;Hospedaje Gauchito Gil;8;32;Romero Rita Isabel;0379-4494532/4494932;12 de Octubre 310;cabela_65@hotmail.com;;;;;S/R;;;;;**
Gran Corrientes;46;Hospedaje;La Estancia;12;54;Miño, Analía;3794-255011;Av. Virgen de Itatí 310;;;;;;S/R;;;;;**
Gran Corrientes;46;Hospedaje;Hotel La Campana;6;18;Caseaux, Estela;0379 154387624;La Rioja 261;lacampanahotel@hotmail.com;;;;;S/R;;;;;**
Gran Corrientes;46;Hospedaje;Palamares Del Paso;4;24;;362-154261439;Nicaragua esq. Costa Rica;;www.corrientes.com.ar/palmaresdelpaso;;;;S/D;;;;;**
Gran Corrientes;46;Hostería;Hosteria Fatsa (Salud);40;100;Sepulveda Juana Rosa (adminsitradora);4494077/78/76;San Luis 202;;;;;;S/R;;;;;**
Gran Corrientes;46;Hostería;Inmobiliaria Y Alojamiento Del Sol;6;38;Buyatti, Nelson Lisandro;494936/154532372;25 de Mayo 646;info@inmobiliaria-delsol.com.ar;www.inmobiliaria-delsol.com.ar;Inmobiliaria del Sol;;;S/D;;;;;**
Gran Corrientes;46;Hostería;Niemanú;12;30;Chianese, Patricia;154591150;8 de Diciembre y Mitre;hosterianiemanu@hotmail.com;;Fc: Hosteria Niemanu;;;S/D;;;;;**
Gran Corrientes;46;Hotel;Hotel Condado;53;112;HOCO SA;379-4494474/4484964/4494411/154005136;Cazadores Correntinos 252;reservaspaso@cndadohotelcasino.com.ar;www.condadohotelcasino.com.ar;Condado Hotel Casino;;;A/C;4;947/17;;;**
Gran Corrientes;46;Hotel;Hotel Zafari Dorado;16;70;Correa, Norma Gladis;3794-610587;25 de Mayo y San Luis;;;Safari Dorado;;;S/R;;;;;**
Gran Corrientes;46;Hotel;Hotel Atrium Beach;18;50;Pajor Marcelo;4494337/338;Belgrano y Quebracho;marcelopajor@hotmail.com /  ;www.bariloche-atriun.com.ar / www.hoteleria-bariloche.com;Atrium + Beach;;;S/R;;;;;**
Gran Corrientes;46;Hotel;Hotel El Remanso;19;67;Kosaczuk, Mariano Oscar;4494834/4494839;25 de Mayo 1022;hremanso@hotmail.com;www.hotel-remanso.com.ar;Hotel Remanso;;;S/D;;;;;**
Gran Corrientes;46;Hotel;Hotel Paraiso Del Parana;20;60;Galera Fernández, Gines;4494555/4494449;Av. Santa Coloma s/n;hotelparaisodelparana@gmail.com;www.elparaisodelparana.com.ar;Hostel Paraíso Paso de la Patria;;;S/D;;;;;**
Gran Corrientes;46;Hotel;Hotel Resort Jardin Del Parana;22;74;Aquere, María Leilen;4494653/671/827;Mitre y Mariano Moreno;pesca@jardindelparana.com.ar;www.jardindelparana.com.ar;Hotel Jardín del Paraná S.R.L;;;A/C;;1026/17;;;**
Gran Corrientes;46;Lodge;Golden Fishing Lodge;5;20;Botta, Vicente;03722 423292/15656746/0362- 154769014;Av. Díaz Colodrero y Av. Virgen de Itatí;;;;;;S/D;;;;;**
Gran Corrientes;46;Posada;Posada Paso De La Patria;24;44;Castaño, Gonzalo;44945586/154686789;Dorado y Costanera;gcastai@yahoo.com.ar;www.posadapasodelapatria.com.ar;Posada Paso de la Patria;;;S/D;;;;;**
Gran Corrientes;46;Posada;Posada Las Piedras;4;12;;4431829;Av. Prefectura Naval Argentina y Catamarca;;;;;;S/D;;;;;**
Gran Corrientes;46;Posada;Departamento La Barra;12;40;Salcedo, Laura Isabel;494423/154582281;San Martín 920;lauraisabelsalcedo@hotmail.com;;;;;S/D;;;;;**
Gran Corrientes;46;Posada;Posada Pirayu;10;20;;379-154519450;Monte Caseros e Pedro Ferré y Lavalle;inf@posadapirayu.com.ar;www.posadapirayu.com.ar;Posada Pirayú;;;S/D;;;;;**
Gran Corrientes;46;Residencial;Tu Spacio;7;14;Cañete, Mercedes Vilma;154242044;San Martín 900;lili-cañete@hotmail.com;www.tuespacioelpaso.com.ar;Tu Espacio en el Paso;;;S/D;;;;;**
Gran Corrientes;46;Residencial;Sindicato Empleados De Comercio De Resistencia;16;48;Vega, Agripino (Encargado);;Av. Prefectura Naval S/;;;;;;S/D;;;;;**
Gran Corrientes;46;Residencial;Departamento Enece;8;20;Capara, Conina Mercedes y Capara, Ernesto Emiliano;4494153;Rioja 530;farmaciaenece@hotmail.com;;;;;S/R;;;;;**
Gran Corrientes;52;Hostería;Hosteria Atajo Del Yaguari;7;36;Hermosilla, Porfirio R.;3794437316;Ramada Paso 2da. Sección Dpto. Itatí;corrientesecologica@yahoo.com.ar;;;;;;;C/R;;057/11;**
Gran Corrientes;58;Apart Hotel;Apart Hotel Mainumby;5;25;Morales Veronica;3794-787542;J. R. Vidal esq. Cacique Guaicurarí;veronicamoralesmaciel@gmail.com ;;;;;;;S/R;;;**
Gran Corrientes;58;Cabaña;Cabaña Lo De Molina;5;25;Molina, Yanina;0379 154728531;Puerto González, Km 22;;;;;;;;S/D;;;**
Gran Corrientes;58;Cabaña;Cabaña Iarita;6;19;Gauna, Lucía;0379 4496089;H. Irigoyen s/n;;;Cabañas Iarita San Cosme;;;;;S/R;;;**
Gran Corrientes;58;Cabaña;Camping Molina (Cabañas);;;Molina, Yanina;;Puerto González, 12 Km del casco urbano;;;;;Capacidad para 100 carpas;;;S/D;;;**
Gran Corrientes;58;Cabaña;Los Pinos Cabañas Y Restaurant;;;Alvarez, Heberto Edgar ;;Acceso a la Laguna Totora (legal Entre Ríos 1259);;;;;;;;C/R;;;**
Gran Corrientes;58;Cabaña;Cabaña Puerto Alegre-Ecoturismo;;;Alvez da Silva, José;3794669722/4438461;San Martín 1033 Of. 6 Ctes. Capital;puertoalegreecotur@gmail.com / ze.alvezdasilva17@gmail.com ;;;;;;;C/R;;;**
Gran Corrientes;58;Estancia Turística;Estancia Camino Real;2;10;Sico, Pedro;0379 154617394/4436102;Ruta 1 Costa Toledo;estanciacaminoreal@hotmail.com;www.estanciacaminoreal.com.ar;Estancia Camino Real;;2 Cabañas, 10 plazas;;;S/D;;;**
Gran Corrientes;58;Residencial;Residencial Mendoza;8;20;Mendoza, Mirta Inés;154545562;2 d Febrero y Pujol;;;Hospedaje Mendoza San Cosme;;;;;S/R;;;**
Gran Corrientes;63;Cabaña;Cabaña San José;6;36;Teler, José Luis;15467815/154349792;RP 43, Km 8;;;;;;;;S/R;;;**
Gran Corrientes;63;Cabaña;Cabaña Puerto Grande;3;6;Alves da Silva, José;;Pje. Punta Santa Ana, Km 20 (Notif. San Martín 1033);puertoalegre-ecotur@gmail.com ;;;;;;;C/R;;1135/16;**
Gran Corrientes;63;Cabaña;Posada Las Hamacas;3;15;Capitanich Carla;3794-245372;Calle 12 de Octubre casi el estero;;;;;;;;S/R;;;**
Gran Corrientes;63;Hospedaje;Hospedaje Don Nelson;3;12;Alcaráz Nelson;3794-512041;Ituzaingó e Iberá;;;;;;;;S/R;;;**
Gran Corrientes;63;Hostería;San Jose;;;;;RP 43, Km 8;;;;;;;;S/D;;;**
Jesuítico Guaraní;3;Apart Hotel;Apart-Hotel Alto Uruguay;10;30;Serpa, Eulogio Fabián;03772 471433(Fijo)/ 15510582/15416071;General Paz 932;aparthotelalvearctes@hotmail.com;;;;;;;S/R;;;**
Jesuítico Guaraní;3;Hospedaje;Hospedaje Manito;10;30;Collinet, Maximiliano;03772 470431;Isaco Abitbol y Sussini;lauracollinet@hotmail.com;;;;;;;S/R;;;**
Jesuítico Guaraní;3;Hotel;Hotel Central;5;12;Navarro, Manuel;03772-470010/15634870;Centenario 449;;;;;;;;S/D;;;**
Jesuítico Guaraní;3;Hotel;Hotel Alto Uruguay;6;20;Serpa, Eulogio Fabián;03772 47-1433 (Fijo)/15-510-582 (Móvil);Panamá s/n. Bº. Mitre Sur;;;;;;;;S/R;;;**
Jesuítico Guaraní;25;Cabaña;Cabañas Las Azaleas;8;32;Muller, Alfredo Goo Kurt;03756 452062/15432191/15432548;RN 14 acceso sur Km. 745 ;cabaniaslasazaleas@yahoo.com.ar;www.cabaniaslasazaleas.com.ar;Cabañas las Azaleas;;;;;S/R;;;**
Jesuítico Guaraní;25;Hotel;Manantiales Hotel Casino;31;66;Q GAME SA;03773 481777-481121-481122;Av. San Martín 1216 (RN 14);manantiales.virasoro@grupoatlas.com.ar;www.manantiales.com;;;;;;C/R;;1078/16;**
Jesuítico Guaraní;25;Hotel;Hotel Ardais;17;30;Altamir, Basilio;03756 482297;Av. San Martín 1556;hotelardais@gmail.com;www.elbrasilero.com.ar ;;;;;;S/R;;;**
Jesuítico Guaraní;25;Hotel;Hotel Ko´E;18;49;Navajas, Felipe;03756-482548/15441937;Laguna Brava 88;;;;;;;;S/R;;;**
Jesuítico Guaraní;25;Hotel;Hotel El Paraiso;30;106;Acuña, Adolfo;03752-482364;Sarmiento 2488 esq. Félix de Azara;;;;;;;;S/R;;;**
Jesuítico Guaraní;25;Hotel;Hotel Vuelta Del Ombu;18;53;Navajas, Fernando;03753-482956;Av. San Martín 955;hotelvdo@gmail.com ;;hotel Vuelta del Ombú;;;;;S/R;;;**
Jesuítico Guaraní;25;Hotel De Campo;Las Acacias;2;4;Mayol, José Carlos (Contacto);03756 154691666;RN 14 (Pegado a Virasoro);josecarlosmayol@hotmail.com;www.campolasacacias.com.ar / www.lasacacias.com.ar;;;;;;S/R;;;**
Jesuítico Guaraní;34;Cabaña;Las Cabañas;8;24;Rojas, Roberto Gerrado;03772-491153/15401733;Av. Juan Brandi y RN 14;lascabaniashotel@hotmail.com;;;;;;;S/D;;;**
Jesuítico Guaraní;34;Departamentos;Departamentos Elena;;;Silveira, Elena;03772-438429;Remedios de Escalada de San Martín s/n;;;;;;;;S/D;;;**
Jesuítico Guaraní;34;Estancia Turística;Estancia Las Palmas;7;20;Toledo, José L.;03772-15465361;RP 114;hotel-estancialaspalmas@hotmail.com;;;;;;;S/D;;;**
Jesuítico Guaraní;34;Estancia Turística;Estancia San Joaquin;;;;03772-154635327;RP 114;;;;;;;;S/D;;;**
Jesuítico Guaraní;34;Hospedaje;Hospedaje Union;;;Unión y Av. Sarmiento;037725-433977;;;;;;;;;S/D;;;**
Jesuítico Guaraní;34;Hotel;Hotel Luxor;9;27;Delucca Pacheco, Marta;03772-491321;Unión 707;;;;;;;;S/R;;;**
Jesuítico Guaraní;34;Hotel;Hotel El Jesuita;13;50;Ballester, Raquel;03772-491146;Unión 945;hoteleljesuita@hotmail.com;;;;;;;S/R;;;**
Jesuítico Guaraní;34;Hotel;Hotel Amelia;8;20;Rosales, Juan Omar;03722-15449111;Avda. Juan Branchi S/N;;;;;;;;S/R;;;**
Jesuítico Guaraní;34;Hotel;Hotel Parador La Soñada;;;;03772-431386;RN 14 Km 530;vanulis25@gmail.com;;;;;;;S/D;;;**
Jesuítico Guaraní;34;Hotel;Hotel Tierra De Sueños;;;;03772-448166/447519;RN 14 Km 584;hoteltierradesueños@gmail.com ;;;;;;;S/D;;;**
Jesuítico Guaraní;34;Hotel;Hotel De Rio;9;40;Hebe Andisco;03772-15631719;Colón Nº 43;hoteldelriolacruz@gmail.com;;;;;;;S/R;;;**
Jesuítico Guaraní;34;Hotel;Posta Del Iberá;;;;03772-1556157;RN 14 acceso 3 cerros;;;;;;;;S/D;;;**
Jesuítico Guaraní;66;Cabaña;Las Casitas De Santino;11;56;Martins, Susana Mabel;03756-15496892;RN 14. Km 683;lascasitasdesantino@hotmail.com;www.lascasitasdesantino.com.ar;Las Casitas de Santino;;;;;S/R;;;**
Jesuítico Guaraní;66;Cabaña;Complejo Ipora;10;26;Belmonte, Griselda Yolanda;03782-15433720;RN 14. Km 681;;;;;;;;S/R;;;**
Jesuítico Guaraní;66;Estancia Turística;Estancia Santa Barbara;2;6;Bertram, María Teresa;03756-15613533/421343;RN 14. Km 698;martecue@hotmail.com;;;;;;;S/R;;;**
Jesuítico Guaraní;66;Hospedaje;Hospedaje Atalaya;8;40;Gómez, Ramón;03756-15611133;Ruta 94 s/n;;;;;;;;S/D;;;**
Jesuítico Guaraní;66;Hotel;Hotel Y Spa Santo Tome (Aca);15;45;Santo Tomás SRL;03756-420161;Belgrano 950;acasantotome@gmail.com;www.youtube.com/acasantotome;;;;;;S/R;;;**
Jesuítico Guaraní;66;Hotel;Hotel Condado;58;116;Goitia, Jorge;03756-420770/421888;Bertran 1050;info@condadohotelcasino.com.ar;www.casinosdellitoral.com.ar;Condado Hotel Casino;;;;;S/R;;;**
Jesuítico Guaraní;66;Hotel;Hotel Brasil;9;18;Centurión, Susana;03752-420153;Mitre 717;susanhappy@hotmail.com ;;;;;;;S/R;;;**
Jesuítico Guaraní;66;Hotel;Hotel Familiar Las Cabañas;24;94;Barell, María Noelia;03756-15611999;RN 14. Km 684;lascabanashotel@hotmail.com;www.lascabanashotel.blogspot.com;;;;;;S/R;;;**
Jesuítico Guaraní;66;Hotel;Hotel Pucara;7;22;Delgado Oscar;03756-420340/15448986;San Martín 557;;;;;;;;S/R;;;**
Jesuítico Guaraní;66;Hotel;Hotel Apart San Martin;5;22;Centena, Gregoria Patricia;03756-498003;San Martín 857;apartsm@hotmail.com / geocen@hotmail.com.ar;;;;;;;S/R;;;**
Jesuítico Guaraní;66;Hotel;Hotel De Santi;6;18;Navarro, Susana;;Roca 823;percon2009@live.com.ar ;;;;;;;S/R;;;**
Jesuítico Guaraní;66;Hotel;Frontera Hotel;8;40;Favermann, Gustavo;03756 422952;Centeno 10;fronterahotelst@hotmail.com;www.fronterahotelst.com.ar;;;;;;S/R;;;**
Jesuítico Guaraní;72;Estancia;Estancia Yapeyú;11;27;Vialelo, Guillermo y Cabiglia, Mercedes Julia;03772-15447308;RN 14, Km 560;;www.estanciayapeyu.com.ar;Estancia Yapeyú;;;;;S/R;;;**
Jesuítico Guaraní;72;Hospedaje;Hospedaje Da Silva;4;10;Da Silva, Alejandro César;3772 429044;Sgto. Cabral s/n esq. Adolfo Flores Meza;alejandrocesards007@outlook.comn.ar;;;;;;;S/R;;;**
Jesuítico Guaraní;72;Hospedaje;Residencial Mi Sueño (Proyecto);4;16;Jorge L. Soto;3772-417281;Obispo Romero Nº 802 esquina Yapeyú;jorgelsoto10@hotmail.com ;;;;;;;S/R;;;**
Jesuítico Guaraní;72;Hospedaje;Hospedaje Elsara;4;16;Rodríguez, Karina;0230 15-4479-332;RP 122, acceso Yapeyú;karinamr664@gmail.com;;;;;;;S/R;;;**
Jesuítico Guaraní;72;Hotel;Hotel San Martin;22;50;Bravo, Berta Beatriz;03772-493120/15634741;Sgto. Cabral s/n;flavia_31109@hotmail.com;;;;;;;S/R;;;**
Jesuítico Guaraní;72;Hotel;Paraiso Yapeyú;30;126;Echt, Daniel;03772-493056;Paso de los Patos y Juan de San Martíninfo@paraisoyapeyu.com.ar;info@paraisoyapeyu.com.ar;;;;;;;S/R;;;**
Jesuítico Guaraní;72;Posada;Posada San Carlos Del Guaviravi;8;31;Sitja, Patricio y Balbastro;03772-15634320;RN 14, Km 549;posadasancarlos@yahoo.com.ar;www.posadasancarlos.com.ar;;;;;;S/D;;;**
Micro Región del Sur;17;Hotel;Hotel De Turismo Curuzú Cuatia;42;80;Frean, Claudio;03774-425395/422037;Duarte Ardoy 655;hoteldeturismocuruzu@hotmail.com;;Hotel de Turismo Curuzú Cuatia;;;;;S/R;;;**
Micro Región del Sur;17;Hotel;Hotel Parador Curuzú Porá;25;55;Bermúdez, Roxana;03774-423090/15631522;RN 119, acceso oeste;paradorcuruzupora@curuzu.net ;;;;;;;S/R;;;**
Micro Región del Sur;17;Hotel;Hotel Continental;25;50;Estigarribia Graciela;03774-422038;Caá Guazú 841;;;;;;;;S/R;;;**
Micro Región del Sur;17;Residencial;Residencial Avenida;16;32;Sánchez, Víctor César;03774-422737;B. Astrada 1699;;;;;;;;S/R;;;**
Micro Región del Sur;17;Residencial;Residencial Villanueva;9;31;Cornalo, Carlos Luis;03774-422238;Caá Guazú 1296;;;;;;;;S/R;;;**
Micro Región del Sur;41;Hotel;Hotel Confort;10;25;Fochesato, Honorio;03775 498304;Pedro Pablo Marturet 840;;;;;;;;S/R;;;**
Micro Región del Sur;41;Hotel;Brisas Del Mocoreta;10;20;Lestani, María Luisa;03775 15431783;Colectora este, Km 345;;;;;;;;S/R;;;**
Micro Región del Sur;42;Hostería;Hosteria Okapi;14;30;Laslo, Selva Margarita;03775-424536/15493164;Av. Libertador 539;hosteriaokapi@gmail.com;www.hosteriaokapi.com.ar;;;;;;S/R;;;**
Micro Región del Sur;42;Hostería;Hosteria Don Manuel;8;32;Ortiz, Cristian;03775-422571;Tucumán 360;contacto@hosteriadonmanuel.com.ar;www.hosteriadonmanuel.com.ar ;Hosteria Son Manuel;;;;;S/R;;;**
Micro Región del Sur;42;Hotel;Hotel Monte Caseros;12;23;Burruchaga, Pedro;03775-423910;Colón 1536;pedroburruchaga@hotmail.com;;;;;;;S/R;;;**
Micro Región del Sur;42;Hotel;Hotel Brero;16;33;Brero, Daniel Orlando;03775-422625;Tucumán 202;hotelbrero@gmail.com ;www.hotelbrero.com.ar ;Hotel Brero;;;;;S/R;;;**
Micro Región del Sur;42;Hotel;Hotel Sol De Monte Caseros;12;28;Vizgarra, Gerardo Alberto;03775-422819;Juan Pujol 1221;gerardoyestela@hotmail.com ;;;;;;;S/R;;;**
Micro Región del Sur;42;Hotel;Manantiales Hotel Casino;24;61;Quality Games SA;03775-424203;Colón y Uruguay;montecaseros@manantialesHE.com ;www.manantialesE.com ;;;;;;C/R;;;**
Micro Región del Sur;42;Hotel;Hotel Mega Habitación;8;25;Ojeda, Sandra Itatí;03775-423642;Juan Pujol 1253;;;;;;;;S/D;;;**
Micro Región del Sur;47;Apart Hotel;Don Bosco Apartamentos;6;14;Carbonel, Rubén Marcelo;3772-522245/638538;Rivadavia Nº 1695;;;;;;;;C/R;;;**
Micro Región del Sur;47;Cabaña;Cabañas Del Palmar;5;30;Renobar SRL;03772 426066;Chacra 239;;;;;;;;S/R;;;**
Micro Región del Sur;47;Hospedaje;Hospedaje Gabriel;16;37;Cardozo, Gabriel ;03772-422437;L. N. Alem 856;;;;;;;;S/R;;;**
Micro Región del Sur;47;Hospedaje;Hospedaje Bravo;4;12;Aquino, Valeria;03772-421880;Cnel. Reguera 1056;;;;;;;;S/R;;;**
Micro Región del Sur;47;Hospedaje;Hospedaje Itati;8;25;Montiel, Marcelo;03772-422487;Ruta 117, Km 8;;;;;;;;S/R;;;**
Micro Región del Sur;47;Hotel;Hotel Alejandro I;60;157;Echet, Daniel;03772-424100/2;Cnel. López 502;hotelalejandro@arnet.com.ar;www.alejandroprimero.com.ar;;;;;;S/R;;;**
Micro Región del Sur;47;Hotel;Hotal Imperial;56;120;Bustamante, Noemí;03772-422700;Pago Largo 954;;;;;;;;S/R;;;**
Micro Región del Sur;47;Hotel;Hotel Las Vegas;29;80;Mareco Esteban;03772-423490;Sarmiento 554;hotellasvegas2000@hotmail.com;;;;;;;S/R;;;**
Micro Región del Sur;47;Hotel;Hotel Uruguay;25;50;Barrientos, Juan Carlos;03772-427831;Uruguay 1252;;;;;;;;S/R;;;**
Micro Región del Sur;47;Hotel;Hotel Escorpio;19;65;Britos, Zoraida;03772-421575;Ruta 117, Km 5;hotelescorpio@hotmail.com;;;;;;;S/R;;;**
Micro Región del Sur;47;Hotel;Hotel Capri;30;60;Zuliani, Casimiro;03772-421260;Santiago del Estero 320;;;;;;;;S/R;;;**
Micro Región del Sur;47;Hotel;Hospedaje 26 De Febrero;10;40;Martínez, Juan Carlos;03772-425866;Uruguay y Reguera;;;;;;;;S/R;;;**
Micro Región del Sur;47;Hotel;Hotel Elementos;15;60;Torres, Romina;03772-426625/154416417;Brasil 1440;hotelelementos@gmail.com ;www.hotelelementos.com ;;;;;;S/R;;;**
Micro Región del Sur;47;Hotel;Hospedaje Del Arte;22;54;Alcazar Hector Dimas;03772-425018/15502124;Ruta 117 Km 8,7;hoteldelarte@hotmail.com ;www.hoeldelartelibres.com.ar;;;;;;S/R;;;**
Micro Región del Sur;67;Estancia Turística;Estancia La Makita;2;7;Winkler, Leticia M.;;A 20 Km de Sauce-Paraje Cañadita;leticiawinkler@hotmail.com;;;;;;;S/R;;;**
Micro Región del Sur;67;Estancia Turística;Estancia Los Pinos;1;5;Wetzel, Otto;03774-15402440;4ta sección dep. Sauce;;;;;;;;S/R;;;**
Micro Región del Sur;67;Estancia Turística;Estancia La Gloria;3;9;Wetzel, Otto;03774-15635979;3ra sección;;;;;;;;S/R;;;**
Micro Región del Sur;67;Hospedaje;Parador Er-Li;9;18;Cáceres, Liliana Inés;03774-15469018;Av. de los Constituyentes 530;er-licomedor@hotmail.com;;Comedor Parador Er Li;;;;;S/R;;;**
Micro Región del Sur;67;Hotel;Hotel Los Dos Hermanos;8;17;Monzón, Silvia Raquel;03774-480096/ 15633100;Belgrano 757;;;;;;;;S/R;;;**
Micro Región del Sur;67;Hotel;Hotel La Familia;13;25;Díaz Romero, Oscar;03774 480027/437596/437594;General Paz 464;oscardiaz1984@hotmail.com;;;;;;;S/R;;;**
Micro Región Iberá;8;Cabaña;El Paso;4;27;Cabral, Armando;03773-155452017/15400274;Timbó y Yaguareté; info@elpasibera.com.ar;www.elpasoibera.com.ar;Cabañas & Posada El Paso;;;;;S/R;;;**
Micro Región Iberá;8;Cabaña;Cabañas Y Camping Camba Cuá;6;20;Brouchoud, María Isabel;03773-15408474;RP 40 y calle Aguará;cambacuaibera@gmail.com;www.cambacuaibera.com.ar ;;;;;;S/D;;;**
Micro Región Iberá;8;Estancia Turística;Estancia Rincón Del Socorro;6;22;Consecionaria Verdaguer, Valeria;03773-15475114;RP 40, Km 83;info@delsocorro.com;www.rincondelsocorro.com;Estancia Rincón del Socorro;;;;ESTANCIA TURISTICA;A/CA;ESTANCIA TURISTICA;325/17;**
Micro Región Iberá;8;Hospedaje;Hospedaje Los Amigos;4;15;Mendieta, Mabel Ester;03773 15493753/15477488;Guazuvirá y Aguapé;;;;;;;;S/R;;;**
Micro Región Iberá;8;Hospedaje;Hospedaje San Cayetano;8;25;Pera, Roque Adán;03773 15628763/15400929;Aguapé entre Yacaré y Guazuvirá;iberasancayetano@hotmail.com ;;Hospedaje San Cayetano;;;;;S/R;;;**
Micro Región Iberá;8;Hospedaje;Hospedaje Guaraní;3;11;Manzanelli, Ana María;03773 15629762;Caraguatá y Yacaré;guarani@ibera.net;www.hospedajeguarani.com.ar;Hospedaje Guaraní;;;;;S/D;;;**
Micro Región Iberá;8;Hospedaje;Hospedaje Iberá;6;15;Escalante, Juan Carlos;03773 15627261;Guazuvirá e Isipó;info@hospedajeibera.com.ar;;;;;;;S/R;;;**
Micro Región Iberá;8;Hospedaje;Hospedaje Jabirú;5;20;Panozzo Galmarello, Juan Carlos;03773 15474838;Yaguareté y Caraguatá;posadaranchojabiru@hotmail.com.ar ;;;;;;;S/R;;;**
Micro Región Iberá;8;Hospedaje;Corazón Del Iberá;9;25;Gamboa, Ramón E.;03773 431526/15628189;Ñangapirí y Yaguareté;corazondelibera@hotmail.com;;Posada Corazón del Iberá;;;;;S/R;;;**
Micro Región Iberá;8;Hospedaje;Hospedaje Casa De La Luna;5;10;González, Martina Isabel;03774 15520259;Yacaré y Guazuvirá;;;;;;;;S/R;;;**
Micro Región Iberá;8;Hospedaje;Casa Santa Ana Del Iberá;5;16;Pettit, Arturo y Cook, Leslie;;Caraguatá y Carpincho;arturopettit@gmail.com;;;;;;;S/R;;;**
Micro Región Iberá;8;Hospedaje;Yberá Full;3;6;Maz, Julio David;03773-15529979;Aguará y Peguajó s/n;iberafull@hotmail.com;;;;;;;S/D;;;**
Micro Región Iberá;8;Hostería;Hostería Nandé Retá;11;32;Apba S.R.L;03773-473923 / Fax 499411;Guazú Birá S/N;nandereta@nandereta.com;www.nandereta.com;Ñande Reta ;;;;;C/R;;;**
Micro Región Iberá;8;Hostería;Hostería Casona Iberá;7;20;Obieta, Federico;03777 422188/15629666;Mbigua s/n;informes@casona-ibera.com.ar;www.casona-ibera.com.ar;;;;;;S/D;;;**
Micro Región Iberá;8;Hostería;Yaguareté Porá;5;15;Alonso, Mariana;11-56429142;Guazubirá y Aguapé;yaguareteserervas@gmail.com;www.yaguarete-pora.com;;;;;Resol. Nº 954/16;C/R;;954/16;**
Micro Región Iberá;8;Lodge;Irupé Lodge;11;37;Lacona, Mauricio;0376 154817479;Yacaré e Ysipo;info@ibera-argentina.com;www.ibera-argentina.com;Irupé Lodge;;;;LODGE;A/CA;LODGE;465/16;**
Micro Región Iberá;8;Posada;Posada Tupasy;8;24;Rosso, Carlos E.;03773 421965/ cel. 37- 412971/421965;Yacaré e Ysipó;;www.posadatupasy.com.ar;;;;;;S/R;;;**
Micro Región Iberá;8;Posada;Posada De La Laguna;8;20;Guiraldes, Elsa;03773 499413/15408166;Guazuvirá s/n (entre Pindó y Caranday);secretaria@posadadelalaguna.com;www.posadadelalaguna.com;Posada de la laguna;;;;POSADA;A/CA;3;894/16;**
Micro Región Iberá;8;Posada;Posada Ypa Sapucai;5;14;Alonso, Fernando;03773 420155/15514212;Mburucuyá esq. Yacaré;info@ypasapucai.com.ar / iberaturismo@gmail.com ;www.ypasapucay.com.ar;Posada Ypa Sapucai Iberaturismo;;;;POSADA;A/CA;1;464/16;**
Micro Región Iberá;8;Posada;Posada Iberá Porá;8;26;Gutiérrez, Marcelo;03773 421098-15622722/03777-15410315/3773411846;;posadaiberapora@argentina.com / iberapora@hotmail.com;www.posadaiberapora.blogspot.com;Posada Iberá Porá;;;;;S/R;;;**
Micro Región Iberá;8;Posada;Eco Posada Del Estero;7;22;Lozada, Estrella;011-1550204031;Yaguareté s/n y Pindó;contacto@ecoposadadelestero.com.ar;www.ecoposadadelestero.com.ar;;;;;POSADA;A/CA;2;358/13;**
Micro Región Iberá;8;Posada;Posada Aguapé;12;25;Capibara SRL;499412-011-1562279722;Yacaré y Ñangapirí;posadaaguape@gmail.com;www.aguapelodge.com ;Posada Aguape o Aguape Lodge;;;;POSADA;A/CA;3;1042/16;**
Micro Región Iberá;8;Posada;Rancho Iberá;8;26;Drews, Walter Javier;0379-488373 / 03773-15412661;Aguará y Caraguatá;ranchoibera@hotmail.com / ranchoibera@yahoo.com.ar;www.posadaranchoibera.com.ar;Rancho Iberá;;;;POSADA;A/CA;3;892/16;**
Micro Región Iberá;8;Posada;Rancho De Los Esteros;4;12;González Sampayo, María de las Mercedes;03773-15493041;Ñangapirí y Yacaré;ranchodelosesteros@gmail.com;www.ranchodelosesteros.com.ar;;;;;POSADA;A/CA;3;38/17;**
Micro Región Iberá;8;Posada;Rancho Inambu;4;12;Balparda, Julieta y Sisi, Jorge;03773-15435910/15464805;Yerutí entre Aguapé y Pahuajó;ranchoinambu@yahoo.com.ar;www.ranchoinambu.com.ar;Rancho Inambú Posada de Campo;;;;;S/R;;;**
Micro Región Iberá;8;Posada;Posada Del Yacaré;6;19;Cabrera, Mirta B. e hijos;03773-490021/15628823 Fax 499415;Curupí entre Yaguareté y Aguará;posadadelyacare@hotmail.com / iberatour@hotmail.com;www.posadaelyacare.com;;;;;POSADA;A/CA;2;893/16;**
Micro Región Iberá;8;Posada;Posada Huella Iberá;10;30;Rimoldi, Cora Beatriz;3773-443602;Salguero 1321;contacto@ecoposadadelestero.com.ar;www.ecoposadadelestero.com.ar;;;;;POSADA;A/CA;3;1154/16;**
Micro Región Iberá;8;Posada;Posada Che Teindy;3;12;Couffignal, Mariano;;;;;;;;;;S/D;;;**
Micro Región Iberá;10;Cabaña;Cabaña De Juancho Casenave;4;10;Casenave, Juan;;;;;;;;;;S/D;;;**
Micro Región Iberá;10;Hospedaje;Hospedaje El Maestro;4;10;Espinosa, Josefina;;Pedro Quiroz y Pampín;;;;;;;;S/D;;;**
Micro Región Iberá;10;Hospedaje;Hospedaje Mercedes Yolanda Conde;6;15;Conde, Mercedes Yolanda;03773 15460377;Berón de Astrada s/n;;;;;;;;S/R;;;**
Micro Región Iberá;10;Hospedaje;Hospedaje De Norma De Yacuzzi;5;10;Dieringer, Norma;063777 491139;Plácido Martínez y Caá Guazú s/n;laura-yacuzzi@hotmail.com ;;;;;;;S/R;;;**
Micro Región Iberá;10;Posada;Rancho Caté;;;Casenave, Juan;03783-15205496;RN 123, acceso Chavarría;juancicasenave@hotmail.com;;;;;;;S/D;;;**
Micro Región Iberá;21;Hospedaje Familiar;Hospedaje Fmiliar Nisa;8;20;Montiel Catalina Beatriz;03773-15520662;Sargento Cabral S/N;saida-saipe@hotmail.com;;;;;;;S/R;;;**
Micro Región Iberá;40;Apart Hotel;Apart Hotel Don Faustino;8;21;Tanara, Faustino;03777 420293;Pedro Ferré 953;faustino.tanara@gmail.com;;;;;;;S/D;;;**
Micro Región Iberá;40;Bed & Breakfast;La Casa De China B&B;3;6;Elizalde, María T.;03773 15627269;Fray Luis Beltrán 599;lacasadechina@hotmail.com;;;;;;;S/D;;;**
Micro Región Iberá;40;Bed & Breakfast;Miamby De Itin Lacour;4;12;Itin Lacour;03773 421622- 011/61755643;Belgrano Nº 520;itinlacour@yahoo.com.ar ;;;;;;;S/R;;;**
Micro Región Iberá;40;Bed & Breakfast;Casa De Piedra B&B;2;6;Perera, Aníbal;03773 15466969;El Tordo 26;silviaparera@gmail.com;www.casadepiedra.blogsport.com;;;;;;S/D;;;**
Micro Región Iberá;40;Cabaña;La Ramona;4;8;Moulin, Celina;03773 15628632;Ruta Nº 40 Km 10;maricelmoulin@hotmail.com ;www.laramona.com.ar;Turismo La Ramona;;;;Resol. Nº 922/15;C/R;;933/15;**
Micro Región Iberá;40;Estancia Turística;Estancia El Dorado;3;7;Sánchez, Carlos;03773-420660;RP 29;estanciaeldorado@hotmail.com;www.eldoradofishing.com.ar;Estancia El Dorado;;;;;S/D;;;**
Micro Región Iberá;40;Estancia Turística;Estancia Rincón Del Diablo;14;28;Cemborain, Luis A.;03773 420103-16629698;Av. Atanasio Aguirre, Km 1;ibera@rincondeldiablo.com.ar;www.rincondeldiablo.com.ar;Estancia Rincón del Diablo;;;;;S/D;;;**
Micro Región Iberá;40;Estancia Turística;"Pira Lodge ""In Search Of Gold""";5;10;Nervouss Waters;03773 420399-43310444;4ta. Sección Rural;info@piralodge.com;www.piralodge.com;;;;;;S/D;;;**
Micro Región Iberá;40;Estancia Turística;Estancias Del Ibera;5;10;Estancias del Iberá SA;011-156713273;San Martín 50, Piso 3. CABA;rosario@nervouswaters.com;;;;;;Resol. Nº 1006/15;C/R;;1006/15;**
Micro Región Iberá;40;Hospedaje;Hospedaje Ili;9;18;Galarza, Liliana;03773 15430191;Av. San Martín 1767;;;;;;;;S/R;;;**
Micro Región Iberá;40;Hospedaje;Hospedaje El Gauchito;8;22;Galfrascoli, Pedro H.;03773 421914/15411919;Independencia 650;;;;;;;;S/R;;;**
Micro Región Iberá;40;Hospedaje;Hospedaje El Aleman;7;28;Molina, Marisa;03773 15629064;Juna Pujol 1549;;;;;;;;S/D;;;**
Micro Región Iberá;40;Hospedaje;Mirta Estigarriblia;1;3;Estigarribia Mirta;03773 15453881;Caá Guazú 858;;;;;;;;S/R;;;**
Micro Región Iberá;40;Hostel;Hostel El Portal Del Ibera;6;24;Franco Carmen D.;03773 421554/15629467;Fray Luis Beltrán 746;marcialmino@hotmail.com;www.elportaldelibera.com;;;;;;S/D;;;**
Micro Región Iberá;40;Hostel;Hostel Gitanes;7;25;Torres, María B.;03773 15443164/421558;San Martín 224;hostelgitanes@gmail.com;;hostel gitanes;;;;;S/D;;;**
Micro Región Iberá;40;Hotel;Mercedes Gran Hotel;25;50;Diego Arnaldo Bosso;03773 421820-420140;Caá Guazú y Sarmiento;mercedesgranhotel@gmail.com ;;;;;;;S/R;;;**
Micro Región Iberá;40;Hotel;Horizontes Torre Hotel;15;42;Perdomo, María M.;03773 420489;José María Gómez 734;hotelhorizonte@yahoo.com.ar / horizontetorreshotel@hotmail.com;;;;;;;S/R;;;**
Micro Región Iberá;40;Hotel;Hotel Libertador;10;27;Hermann Alejandro;03773 420433;Av. San Martín 1851;reginabenasaryaj@hotmail.com ;;;;;;;S/R;;;**
Micro Región Iberá;40;Hotel;Hotel Sol;8;32;Avalos Ricardo Alberto;03777 420283;San Martín 519;;;;;;;;S/R;;;**
Micro Región Iberá;40;Hotel;Hotel La Recova;19;35;Perdomo, María M.;03777 422400-422622;Fray Luis Beltrán 1110;larecova@unicomm.com.ar ;www.hotelarecova.com.ar;Hotel la Recova;;;;;S/R;;;**
Micro Región Iberá;40;Hotel;Hotel Iberá;13;50;Alvares, Cinthia;03777 420373/15435378;J. Alfredo Ferreira 650;;;;;;;;S/R;;;**
Micro Región Iberá;40;Hotel;Hotel Eclipse;15;42;Sisi, Diomedes;03777 420992/15417213;Juan Pujol 751;hoteleclipse_mercedes1200@hotmail.com;www.hoteleclipsecorrientes.com;;;;;;S/R;;;**
Micro Región Iberá;40;Hotel;Hotel Rincon De Los Amigos;14;29;Barreiro, Mario;03777 420593;Juan Pujol 1556;;;;;;;;S/R;;;**
Micro Región Iberá;40;Hotel;Hotel Ivyrá Pytá;12;32;Sagaspe, Estela;03777 422105/15402740;España 440;ivyra.pyta.hotel@gmail.com;www.ivyrapyta.com.ar;Hotel Ibyra Pyta;;;;;S/R;;;**
Micro Región Iberá;40;Hotel;Los Sobrinos;7;18;Capdevilla, Claudio;03773-15449613;Belgrano 744;;;;;;;;S/R;;;**
Micro Región Iberá;40;Hotel;Hotel Boulevart;8;22;Perdomo, Marina Raquel;03773-421974;Av. San Martín y Paraíso;hotelboulevard2016@outlook.com;;Hotel Boulevard;;;;;S/R;;;**
Micro Región Iberá;40;Hotel;Manantiales Hotel Casino;29;63;BRAS TEC SA;03773 421700/422840/15416640;Sarmiento esq. Juan Pujol;manantiales.mercedes@grupoatlas.com.ar;www.manantialeshoteles.com;;;;;Resol. Nº 778/16;C/R;;778/16;**
Micro Región Iberá;40;Hotel;Hotel La Negrita;8;25;Ramirez Jose Horacio ;15516850;Av. Lavalle y Bº Mitre;;;;;;;;S/R;;;**
Micro Región Iberá;40;Hotel;Hotel Cristal;16;42;Obieta Federico ;03773 422188/15627014;J. Alfredo Ferreyra Nº 686;hotel-cristal@hotmail.com;www.casona-ibera.com.ar;;;;;;S/R;;;**
Micro Región Iberá;40;Hotel;Hotel Elias;5;13;Poizón, Hugo;03773 15416464;San Martín Nº 2144;;;;;;;;S/R;;;**
Micro Región Iberá;40;Hotel Boutique;Torre Del Guayaibi;5;11;Marroquin de Lacour, Marisa;03773 15510210;RN 123, Km 128. GPS: s 29º 56 min;torredelguayaibi@gmail.com;www.torredelguayaibi.com.ar;Torre del Guayaibi;;;;;S/R;;;**
Micro Región Iberá;40;Lodge;Ibera Lodge;8;25;Mirador SA;0379 4230228/154018738 ;;reservas@iberalodge.com / info@iberalodge.com ;www.iberalodge.com;;;;;;A/CA;LODGE;211/16;**
Micro Región Iberá;40;Posada;Posada El Quincho;17;65;Latino Mohalem, Verónica;03773 15628988;Av. San Martín 2200;vero74@hotmail.com / posadaelquincho@gmail.com;www.minimercedes.com.ar/posadaelquincho;;;;;Resol. Nº 621/15;C/R;;621/15;**
Micro Región Iberá;62;Hospedaje;Hospedaje Don Pedro;4;12;Ayala Rosalia;03777-478140/15302498;Desidero Rosa Nº 669;ro.ayala@hotmail.com ;;;;;;;S/R;;;**
Micro Región Iberá;62;Hospedaje;Hospedaje San Martin;7;14;Renelde Goitre;03777-478399;San Martín Nº 831;;;;;;;;S/R;;;**
Micro Región Iberá;62;Hotel;Hotel Nogui;9;18;Cardozo Guillermo;03777-15558815;Juan G. de Cossio Nº 859;;;;;;;;S/R;;;**
Paraná norte;29;Cabaña;Cabaña Carayá De Rio;10;40;Mancuso, Andrea Mayte;0379-154621629/03781-485149;Juan Bautista Alberdi 151;;www.cabañacaraya.com.ar / cabañascaraya.com.ar;Caraya de Rio;;;;;S/R;;;**
Paraná norte;29;Cabaña;Cabaña Piedra Alta;18;62;Fernández, Alfredo H.;3541 495136/75484583;San Martín esq. Mitre;piedra-alta@yahoo.com.ar;www.piedraalta.com.ar;Hotel y Cabañas Piedras Altas;;;;;A/CA;CABAÑAS 3 ESTRELLAS;506/127;**
Paraná norte;29;Cabaña;Cabaña Puerto Paraiso;12;36;Teitelman, Daniel;03781 4956336;Bartolomé Mitre s/n;puertoparaiso@arnet.com.ar;www.puertoparaiso.com.ar;Cabañas Puerto Paraíso;;;;;S/R;;;**
Paraná norte;29;Cabaña;Cabaña Rocymar;2;12;Aguirre, Martín;03783-15528934;Sarmiento 1412;;;;;;;;S/D;;;**
Paraná norte;29;Cabaña;Cabaña Guillermo Morales;2;6;Morales, Guillermo;03783 495084;Belgrano 614;;;;;;;;S/R;;;**
Paraná norte;29;Cabaña;Cabaña Barrancas De Brenn;8;28;Brenn, Ernesto;03781 482667;Sarmiento y Calle 1;pescabrenn@gmail.com;www.barrancasdebrem.net;Complejo Barrancas de Brenn;;;;;S/R;;;**
Paraná norte;29;Cabaña;Cabañas Gemelos;15;40;Simón, Diego y Daniel;03781 495156;Víctor Duarte 954;;;;;;;;S/R;;;**
Paraná norte;29;Cabaña;Cabañas Don Quico;4;32;Soperez, Raúl;03781-495195/495227/0342-4281563;Bicentenario N° 615;cdonquico@yahoo.com.ar;www.cdonquico.com.ar;Camping y Cabañas Don Quico;;;;;S/R;;;**
Paraná norte;29;Cabaña;Cabaña Jardin Del Parana;10;30;Aquere Martín;3794-053695;Avenida Sarmiento S/N;info@jardinitaibate.com ;www.jardinitaibate.com ;Jardin del Paraná ita Ibate;;;;;S/R;;;**
Paraná norte;29;Estancia Turística;Estancia Don Cindo;8;25;Chequin, Nancy y Moncada, Vicente;0379 15-4600-683;RN 12, Km 1178;navisrl@hotmail.com / nancychequin@hotmail.com ;;;;;;;C/R;;1321/16;**
Paraná norte;29;Hospedaje;Hospedaje Don Vidal;10;20;Cristian Eduardo Vidal;3994-276025;Juan Domingo Perón S/N;reservadonvidal@hotmail.com;www.donvidal.com.ar;Don Vidal;;;;;S/R;;;**
Paraná norte;29;Hospedaje;Hospedaje Mi Ranchito;15;30;Acota, Luis;495294;BELGRANO N° 1579;;;;;;;;S/D;;;**
Paraná norte;29;Hospedaje;Hospedaje El Hogar;6;36;Armúa Mirta;3781-489010;;;;;;;;;S/D;;;**
Paraná norte;29;Posada;El Refugio;12;48;Sarjanovich, Ricardo A.;03781-495186;B. Mitre s/n;elrefugioturismo@hotmail.com;www.complejoelrefugio.com;Posada el Refugio;;;;;S/R;;;**
Paraná norte;29;Posada;Complejo La Serena;9;43;Wagner, José E.;03781 495273/15609842;Berón de Astrada 645;info@complejolaserena.com;www.complejolaserena.com;;;;;;S/D;;;**
Paraná norte;29;Residencial;Residencial Oasis;6;18;Aponte, Oscar;0379-15401241;RN 12, Km 1185;oscarnestoraponte@gmail.com ;;;;;;;S/R;;;**
Paraná norte;31;Apart Hotel;Don Vidal;;;;03786-420616;Belgrano 1645;;;;;;;;;S/D;;**
Paraná norte;31;Apart Hotel;La Valentina Apart Hotel;10;50;Rocco, Jorge Eduardo;03786-15610729/421721;Francisco López 1525;lavalentinaitu@gmail.com;;;;;;;A/CA;APART HOTEL 3 ESTRELLAS;210/16;**
Paraná norte;31;Apart Hotel;Cabañas Che Recove Poty;7;46;Beltrán Simo, Enrique L.;03786-497539/15619130/421222;Brasil 1630 y Francisco López;cherecovepoty@yahoo.com.ar;www.cherecovepoty.com.ar;Cabañas Che Recove Poty;;;;;A/CA;APART HOTEL 3 ESTRELLAS;107/16;**
Paraná norte;31;Cabaña;Cabañas Simons;4;34;Simons, Inés;03755-420852/15442490;Urquiza esq. Salta;schuines@hotmail.com;;;;;;;A/CA;CABAÑA 3 ESTRELLAS;1158/16;**
Paraná norte;31;Cabaña;Cabañas Lo De Fatima;4;25;Colombo, Fátima;03781 420852/15617196;Posadas 1930;fatimacolombo64@hotmail.com;;Cabañas Lo de Fátima;;;;;S/R;;;**
Paraná norte;31;Cabaña;Cabaña Parana Ranch;6;36;Benedetti, Gustavo;03781 420882;RN 12, Km 1251;paranaranch@yahoo.com.ar;www.parana-ranch.com.ar;;;;;;S/D;;;**
Paraná norte;31;Cabaña;Cabaña Los Troncos;10;52;Mazanti, Fabio;03781 420335;Güemes y Mandoza;info@lostroncosituzaingo.com.ar;www.lostroncosituzaingo.com.ar;;;;;;A/CA;CABAÑAS 3 ESTRELLAS;360/16;**
Paraná norte;31;Cabaña;Cabaña El Balcon;5;25;Vázquez Carcomo, Mirta;03781 420258;Catamarca y Pellegrini;elbalconituctes@gmail.com / elbalcon@itunet.com.ar / flialuna@itunet.com.ar;www.itunet.com.ar/elbalcon;;;;;;S/R;;;**
Paraná norte;31;Cabaña;Cabaña Tio Lucas;8;44;Rivero, Rubén;03786-420791/421810/15615313/15615761;Mitre 1832;rivero_rube@hotmail.com;www.corrientes.com.ar/tiolucas;Cabañas Tío Lucas;;;;;S/R;;;**
Paraná norte;31;Cabaña;Cabaña La Barca;16;80;;03786 422154/03752 15510441;Santa Fe y Pellegrini;labarca_itu@hotmail.com;www.cabaniaslabarca.com.ar;Cabañas Camping La Barca;;;;;A/CA;CABAÑA 2 ESTRELLAS;876/16;**
Paraná norte;31;Cabaña;Cabaña El Aljibe;5;28;Fisch, Gerardo;03786-425293 / 15617559;Posadas y Perú;edgardofisch@gmail.com;www.complejoelaljibe.com.ar;;;;;;S/D;;;**
Paraná norte;31;Cabaña;Cabaña Aguará Cua;17;90;Bonta, Carlos D.;03781 421876/421886;Salta 4270;info@aguara-cua.com.ar;www.aguara-cua.com;Cabañas aguará Cuá SRL;;;;;S/R;;;**
Paraná norte;31;Cabaña;Cabañas Shangri-La;7;30;Ferro, Ingrid;03781 15345953/15451072;Francisco López 2254;;;;;;;;A/CA;CABAÑA 2 ESTRELLAS;1041/16;**
Paraná norte;31;Cabaña;Costa Santino;7;37;Reidán Ulises;03786-425307/15618100;Saavedra N° 950;costasantino@hotmail.com;www.costasantino.com.ar ;Cabañas Costa Santino;;;;;S/R;;;**
Paraná norte;31;Cabaña;Cabañas Puesta Del Sol;6;30;Pauluk, Edgardo Francisco;03786-420677/03755-421259-401650/15518816;Juan José Paso y Salta;dorapaw@hotmail.com;;Cabañas Puesta del Sol;;;;;S/D;;;**
Paraná norte;31;Cabaña;Atardecer Ituzaingó;6;25;;3758- 15650494;Paraguay y Barrancas del Río Paraná;;;Atardecer Ituzaingó;;;;;S/D;;;**
Paraná norte;31;Cabaña;Don Matheo;;;Miño, Carlos Antonio;03786-421899/15410649;Saavedra N° 1949;;;;;;;;S/D;;;**
Paraná norte;31;Camping;Camping El Mirador;;;Solís, Ricardo Enrique;;Ruta Inter.  a Yacyretá. Rincón de Santa María;meigosos@hotmail.com;;;;;;;C/R;;131/16;**
Paraná norte;31;Estancia Turística;Estancia San Gara;15;40;Panzarini Lanusse, Martin;03783-15582779/15381231;RN 12, Km 1237;estanciasangara@gmail.com;www.estanciasangara.com.ar;Estancia San Gara;;;;;S/D;;;**
Paraná norte;31;Hotel;Hotel Del Lago;35;90;La Unión SA (Sr. Luna);03786 420202/15614247;Entre Ríos e Iberá;hoteldellagoituctes@gmail.com;www.dellagohotel.com.ar;;;;;;S/R;;;**
Paraná norte;31;Hotel;Manantiales Hotel Casino;21;46;Q Game SA;03786 420110/422122/422121;Francisco López y Belgrano;manantiales@grupoatlas.com.ar;www.manantialeshoteles.com;Manantiales Ituzaingó;;;;;A/CA;HOTEL 4 ESTRELLAS;839/16;**
Paraná norte;31;Hotel;Nuevo Hotel Geminis;20;51;Torres Silvana;03786 420697;Corrientes 1348;nuevohotelgeminis@hotmail.com;;Nuevo Hotel Geminis ;;;;;S/R;;;**
Paraná norte;31;Hotel;Cezeta Hotel Litoral Argentino;14;45;Czerevin, Roberto A.;03786 421773/421763;Sudamérica 1723;info@czhotel.com.ar;www.czhotel.com.ar;;;;;;A/CA;HOTEL 3 ESTRELLAS;858/16;**
Paraná norte;31;Hotel;Hotel Champagne;10;42;Jungmerker, Norma;(03786) 420618/15618820;Buenos Aires 1489;champagnehosteria@yahoo.com.ar;www.hosteriachampagne.com;Hostería Champagne;;;;;A/CA;HOTEL 1 ESTRELLA;808/16;**
Paraná norte;31;Hotel;Hotel Costa Del Parana;9;32;Duarte, Andrea;03786-421662;Paraná esq. Pasadas;costaparanaituzaingo@gmail.com;;;;;;;S/R;;;**
Paraná norte;31;Hotel Boutique;Hotel Boutique Puerto Valle Hotel De Los Esteros;5;13;Sciort, Marisol;03786 425700;RN 12 Km 1282;reservas@hotelpuertovalle.com / recepcion@hotelpuertovalle.com;www.hotelpuertovalle.com;Puerto Valle Hotel de Esteros;;;;;A/CA;HOTEL BOUTIQUE RURAL 5 ESTRELLAS;969/14;**
Paraná norte;31;Hotel Boutique Rural;Howard Johnson;18;40;Cadena internacional;03786-420700;RN 12, Km 1246;info@hipuertosangara.com.ar;www.hojoar.com;Hotel Howard Jhonson Ituzaingó;;;;;A/CA;HOTEL BOUTIQUE RURAL 4 ESTRELLAS;525/16;**
Paraná norte;31;Posada;Posada Del Sol;10;52;Vimer, Víctor Carlos;03786-420352/154577480;Francisco López 1531;info@posada-sol.com.ar;www.posada-sol.com.ar;Posada del Sol Ituzaingó;;;;;S/R;;;**
Paraná norte;55;Albergue;Albergue Gran Hermano;3;9;María pérez;;Calle 3 y 6 S/N;;;;;;;;;;S/R;**
Paraná norte;55;Hospedaje;La Casona De Apipe Ecolodge;5;14;Batista Silvia Griselda A.;3786-614100/15494234;Calle 3 y 6 S/N;lacasonadeapipeecolodge@gmail.com ;;La Casona de Apipe Ecolodge;;;;;;;S/R;**
Paraná norte;71;Hostería;Hostería Cabureí;7;16;Esquivel Pilar Inés;03786-15495938/15495900;Avda. Haide Galarza y Ruta 12 Km 1233;;;;;;;;C/R;;902/14;**
Paraná norte;55;Posada;Posada Puerto Itati;3;9;Esquivel pilar Inés;;Isla Apipe Chico;piliesquivel@hotmail.com ;www.posadpuertoitati;;;;;;;;S/R;**
Paraná norte;5;Cabaña;Puerto Paraiso;12;36;Teitelman Daniel;3781-495336;paraje Yahapé;;www.pescaparaiso.com ;;;;;;S/D;;;**
Paraná norte;5;Cabaña;Cabañas Gatomoro;8;26;Gustavo Renato Rocabert;03786-154659070/154659072;paraje Yahapé;jccricabert@hotmail.com ;www.gatomoro.com ;;;;;;S/R;;;**
Paraná norte;5;Cabaña;Cabañas Yahapé;3;9;;3794-322868;paraje Yahapé;;;;;;;;S/D;;;**
Paraná norte;5;Cabaña;Cabañas Del Monte;12;48;Gergoff Jorge;03786-15466805;paraje Yahapé;cabanadelmonte@hotmail.com ;www.cabanadelmonte.com;Cabañas del Monte;;;;;C/R;;527/16;**
Paraná Sur;4;Albergue;Albergue Deportivo Municipal;7;60;Dependencia municipal;03777 451474/451161;RP 27 y Sta. Fe;turismoycultura@bellavista.gov.ar;;;;;;;S/R;;;**
Paraná Sur;4;Apart Hotel;Rio Arriba Suites;17;45;Río Arriba S.R.L.;03777-15311296/4450376;Pedro Ferré 220;info@hotelrioarriba.com  anaachitte@hotmail.com;www.hotelrioarriba.com ;;;;;;S/R;;;**
Paraná Sur;4;Cabaña;Cabañas El Pajaro;2;8;Mórtola, Norberto;03777-15411817;Isla La Invernada;elpajaro_cabana@yahoo.com.ar;www.bellavistapesca.com.ar;;;;;;S/D;;;**
Paraná Sur;4;Cabaña;Cabañas Bella Vista;10;50;Britos de Jesús, Eleuterio;03777-451333/555/15541671;Fígaro 777;info@turismobellavista.com.ar;;;;;;;S/R;;;**
Paraná Sur;4;Hotel;Hotel El Triangulo;31;80;;03777-451492;Buenos Aires y Paraná;info@triangulohotel.com.ar;;Hotel El Triángulo;;;;;S/R;;;**
Paraná Sur;4;Hotel;Hotel El Solar;37;65;Denegri, Juan Carlos;03777-450395/15400791;Salta 667;info@hotelelsolar.com.ar;www.elsoalr.bevista.com  www.hotelelsolar.com.ar;;;;;;A/CA;HOTEL 2 ESTRELAS;267/16;**
Paraná Sur;4;Hotel;Hotel Costa Azul;20;50;Almirón, Telesforo;03777-451645;Paraná 1239;telealmiron@hotmail.com;www.hotelcazul.com.ar;;;;;;S/R;;;**
Paraná Sur;4;Hotel;Hotel Jr;14;60;Samaniego Silvia;03777-450303/15473335;Estrada 775;jrbvista@hotmail.com;www.jrhotel.com.ar;;;;;;S/R;;;**
Paraná Sur;4;Hotel;Hotel Victoria;13;24;Achitte, Eduardo;03777-452348;Catamarca 835;hotelvictoriaBv@hotmail.com ;www.hotelvictoriaBv.com  ;;;;;;S/R;;;**
Paraná Sur;4;Hotel;Ayrá Hotel;8;24;Ramírez, Olsvaldo;03777-15628202/451130;Ayacucho 865;ayrahotel@yahoo.com.ar;www.ayrahotel.com.ar/interior/index.htm;Ayrá Hotel;;;;;S/D;;;**
Paraná Sur;4;Hotel;Hotel La Casona;8;21;Mórtola, Norberto;03777-411817/452357;Padre Klosler 919;elpajaro_cabana@yahoo.com.ar  elpajarocavana@hotmail.com;www.bellavistaturismo.com.ar/casona;;;;;;S/R;;;**
Paraná Sur;4;Hotel;Hotel Santa Ines;8;17;Bombay SRL;03783-15200505;Tucumán 940;info@hotelsantaines.com ;www.hotelsantaines.com ;;;;;;S/R;;;**
Paraná Sur;4;Posada;La Posada;7;20;Mórtola, Alicia;03777-451409/15686134;Santa Fe 763;info@laposadabellavista.com.ar;www.laposadabellavista.com.ar;;;;;;S/R;;;**
Paraná Sur;4;Residencial;El Paraiso;13;40;Acebal, Ramón Enrique;0377 15734983;Gral. Roca 1576 (Domicilio legal);;;;;;;;S/R;;;**
Paraná Sur;19;Apart Hotel;Esquina Apart Hotel;8;38;Gonzales, Mónica Silvana y Lavoratto, Paola;;Berón de Astrada entre R. Marín y J. A. Ferreyra;;;;;;;;C/R;;681/14;**
Paraná Sur;19;Bed & Breakfast;La Casona Pesca;8;24;Liebig, Klaus;03777-460169/412888;Mitre 691;info@lacasonapesca.com.ar;www.lacasonapesca.com.ar;;;;;;S/R;;;**
Paraná Sur;19;Bed & Breakfast;Hospedaje Lauritto;11;30;Lauritto, Carlos;03777-460131;25 de Mayo 190;carloslaurito@hotmail.com;;;;;;;S/R;;;**
Paraná Sur;19;Bungalow;Bungalows Los Quinchos;10;36;Tognola, Arquímides;03777 460406/15336787;RN 12/J. A. Ferreira 2113;info@bungalowslosquinchos.com.ar;www.bungalowslosquinchos.com.ar;;;;;;S/R;;;**
Paraná Sur;19;Bungalow;Ñasaindy Apart-Bungalow;4;18;Vallejo, Roberto;03777 15576500/460831;Para notificación:  Mitre 698;info@nasaindy.com.ar;www.nasaindy.com.ar;Ñasaindy Bungalow Esquina Corrientes;;;;;S/D;;;**
Paraná Sur;19;Cabaña;Cabañas El Pato;10;30;Bengoechea, Patricia;03777 460836/15310154;Calle El Dorado S/N;cabanaelpato@uol.com.ar ;www.pescaelpato.com.ar ;;;;;;S/R;;;**
Paraná Sur;19;Cabaña;Cabaña La Suerte;7;35;Aranda, Juan Pablo;03777 15404303/461314;9 de Julio y J. A. Roca;lasuerte_@hotmail.com ;www.complejolasuerte.com.ar;;;;;;S/R;;;**
Paraná Sur;19;Cabaña;Cabañas El Soñador;9;30;Perotti, Karina;03777-460800;RN 12 s/n, acceso norte;cabaniadelsoniador@gmail.com;www.e-portalsur.com.ar;;;;;;S/R;;;**
Paraná Sur;19;Cabaña;Cabañas Villa Niño Rupá;4;20;López, Nidia;03777 460727/15606467;Serrano Soto y José Hernández;tapizcar@hotmail.com;www.villaninorupa.com.ar;;;;;;S/R;;;**
Paraná Sur;19;Cabaña;Cabañas El Biguá;10;40;Santos, Luis;03777 460110;Mancini 20;danielagrille@gmail.com ;;Cabañas El Bigua;;;;;S/R;;;**
Paraná Sur;19;Cabaña;Cabañas El Pirayu;4;16;Giorgi, Lito;03777 461953/15556527;9 de Julio y Río Corrientes. Quinta 1;litopirayu@hotmail.com;www.pescanet.com;;;;;;S/R;;;**
Paraná Sur;19;Cabaña;Cabañas Quique Pesca;8;24;Pellegrini Victor J.;03777 15310237;Mitre y Leconte;quiquepesca@yahoo.com.ar;;Quique Pesca Esquina;;;;;S/R;;;**
Paraná Sur;19;Cabaña;Cabañas Rio Manso;5;20;Quaranta, María Cristina;03777 460986;El Dorado s/n, quinta 2;riomanso23@hotmail.com;www.pescariomanso.com.ar;;;;;;S/R;;;**
Paraná Sur;19;Cabaña;Cabañas El Paraiso;6;24;Vacheran, Dardo;03777-15416497;José Hernández 820;;;;;;;;S/D;;;**
Paraná Sur;19;Cabaña;Cabañas Baldi Pesca;20;58;Baldi, Miguel;03777 461945;Antártida Argentina N° 2000 B° San Fernando;baldipesca@yahoo.com.ar;www.baldipesca.com.ar;;;;;;S/R;;;**
Paraná Sur;19;Cabaña;Cabañas Lo De Goly;2;8;Cocentino, Liliana;011-1554544983;Vidal 91;goly1953@yahoo.com.ar;;;;;;;S/R;;;**
Paraná Sur;19;Cabaña;Cabañas Arco Iris;5;15;Fernández Isabel María;011-1562456797/03777-467035;RN 12, acceso sur. 1ra. Sección;arcoirispesca@hotmail.com;;;;;;;S/R;;;**
Paraná Sur;19;Cabaña;Rancho Pelo Largo;10;30;Cáceres, Rubén;03777-469016;RN 12, acceso norte;pelocasave@hotmail.com;www.elpatowebride.com.ar;Rancho Pelo Largo;;;;;S/D;;;**
Paraná Sur;19;Cabaña;Cabaña Puesta Del Sol;6;14;Grela, Alicia;03777 460866/411567;Sgto. Cabral y Pujol;grelaalicia@hotmail.com ;www.corrientes.com.ar/puestadelsol;;;;;;S/R;;;**
Paraná Sur;19;Cabaña;Pesque Con Foncho;5;25;Arias, Leonardo;;Bo. 100 viv. Mza. B, casa 2;pesqueconponcho@hotmail.com;;;;;;;S/D;;;**
Paraná Sur;19;Cabaña;Cabaña La Fierita;8;32;Domínguez, Daniel;03777 15527839/460874;José Hernández y Serrano Soto;esquinapesca@hotmail.com;www.esquinapesca.com.ar;Cabaña la Fierita;;;;;S/D;;;**
Paraná Sur;19;Cabaña;Matute Pesca;6;18;Capuyolo, Guillermo;;J. A. Ferreyra y Sáenz Peña;;;;;;;;C/R;;129/16;**
Paraná Sur;19;Cabaña;Cabaña Marce Camerum;6;35;Aranda, Antonio;;1ra Sección, Bo. San Fernando;;;;;;;;C/R;;106/16;**
Paraná Sur;19;Estancia Turística;Estancia Buena Vista;8;24;Las Camelias S.A.;03777-460169/412888;3ra sección, Pasaje Los Laureles;info@estanciabuenavista.com.ar;www.estanciabuenavista.com.ar;Estancia Buena Vista;;;;;S/R;;;**
Paraná Sur;19;Estancia Turística;Estancia La Morena;6;16;Bonelli, Sebastián;03777 468032/418028;Av. Mitre 450 (para notificaciones);lamorena@cvenet.com.ar;www.lamorena.com.ar;La Morena Turismo Estancia;;;;;S/D;;;**
Paraná Sur;19;Estancia Turística;Estancia La Pelada;5;10;Rohner, Augusto;03777 15419616;RP 30;estancialapelada@yahoo.com.ar;www.lapeladalodge.com.ar;Estancia La Pelada;;;;;S/R;;;**
Paraná Sur;19;Estancia Turística;Estancia La Rosita;8;20;Cometta, Alicia-Fer Landgraf;011-1560525566;RP N° 51 Km 3,2;info@estancialarosita.com ;www.estancialarosita.com.ar;Estancia La Rosita;;;;;S/R;;;**
Paraná Sur;19;Estancia Turística;Estancia La Brava;5;10;Fernández Codazzi, Damián I.;03777-15535211;Arroyo Aguará;labrava@fibertel.com.ar;www.estancialabrava.com.ar ;Estancia La Brava Esquina;;;;;S/D;;;**
Paraná Sur;19;Estancia Turística;Estancia Don Joaquin;8;16;Solanet, Angeles de;011-15-54667223;RN 12, Km 6;info@estanciadonjoaquin.com.ar;www.estanciadonjoaquin.com.ar;;;;;;S/R;;;**
Paraná Sur;19;Estancia Turística;Mombirí;6;15;Kelly, Andrés;011-1557680107;Guaiquiraró;info@mombiri.com.ar;www.mombiri.com.ar;Finca Mombirí;;;;;S/D;;;**
Paraná Sur;19;Hospedaje;Hospedaje Entre Rios;5;15;Boari, Alfredo Raúl;03773 460209/15520954;RN 12, acceso sur;juanboari35@yahoo.com;;;;;;;S/R;;;**
Paraná Sur;19;Hospedaje;Hospedaje Aguilar;2;6;Aguilar, Lázaro;03777-460748;Lavalle 151;;;;;;;;S/R;;;**
Paraná Sur;19;Hospedaje;Hospedaje El Pacu;5;26;Villán, Claudia;03777 461069/15555920;Cnel. Carreras 605;;;;;;;;S/D;;;**
Paraná Sur;19;Hospedaje;Alojamiento La Gauchita;2;8;Amiconi, Mirta Alicia;03777 460630;Los Sauces 1868;cachilegui@hotmail.com;;;;;;;S/D;;;**
Paraná Sur;19;Hospedaje;Hospedaje Ariela;6;25;Bravo, Liliana y Machuca, Carlos;03777 15537082;RN 12, acceso sur;;;;;;;;S/R;;;**
Paraná Sur;19;Hotel;Irupe Plaza Hotel;21;60;Previsora del Paraná S.R.L.;03777-460220;San Martín 588;contacto@irupeplazahotel.com.ar/ hotel.esquina@previsoradelparana.com ;www.irupeplazahotel.com;Hotel Irupé Plaza;;;;;S/R;;;**
Paraná Sur;19;Hotel;Hotel Aleman;23;70;Fernando Landgraf;03777-460580;Serrano Soto 538;;;;;;;;S/R;;;**
Paraná Sur;19;Hotel;Hotel Equé Porá;10;23;Leguizamón, Carlos;03777-460374/15614391;Gral. Velazco 555;equeporahotel@gmail.com;www.equeporahotel.com.ar;Equé Porá;;;;;S/R;;;**
Paraná Sur;19;Hotel;Hotel Italia;8;19;Martínez, Fernando César;03777-460066;Bartolomé Mitre 486;;;;;;;;S/R;;;**
Paraná Sur;19;Lodge;Bambu River Lodge;5;16;Solanas, Gustavo;03777 462024/15654000;Calle Dorado s/n;contacto@bamburiverlodge.com.ar;www.bamburiverlodge.com.ar;Bambu Riber Lodge;;;;;S/R;;;**
Paraná Sur;19;Lodge;Los Gringos;3;15;Lecour, Gastón;011-4751-2118/011-15529952;RN 12, Km 677;g.lecour@yahoo.com.ar;www.losgringoslodge.com.ar;Los Gringos Lodge;;;;;S/R;;;**
Paraná Sur;19;Lodge;Posada Hambaré;24;55;Rohner, Arnoldo;03777 1547196/460270/460664;RN 12 s/n, acceso norte (Para notificaciones:  Santa Rita 370);posadahambare@ciudad.com.ar  contacto@posadahambare.com.ar ;www.posadahambare.com.ar;Posada Hambaré;;;;;S/R;;;**
Paraná Sur;19;Lodge;Malal Cue Lodge;6;11;Semenof, Ariel;03777-460378;RN 12, acceso norte. Quinta 1 bis;;;;;;;;S/R;;;**
Paraná Sur;19;Lodge;Ipacaa Country Lodge;3;12;Ward, Diego;03777-15519983;RN 12, 1ra sección, acceso norte O;;;;;;;;S/R;;;**
Paraná Sur;19;Lodge;El Rocio Outdoor Sport Lodge;7;19;Rohner, Arnoldo;;Adrema G1-2256-2. Chacra 1 bis, lote 2;;;;;;;;C/R;;586/12;**
Paraná Sur;19;Posada;Posada Esquina Aventura;15;32;Cortés, Jorge;03777-461891/155710292;Colonia Bontón s/n;aventuraenesquina@gmail.com;www.aventuraenesquina.com.ar;;;;;;S/D;;;**
Paraná Sur;19;Posada;Posada Casablanca;10;31;CUCC SA. Cucchiaro, Romain (Presidente);03777 460967/461371;El Dorado s/n;posadacasablanca@hotmail.com  info@posadacasablanca.com;www.posadacasablanca.com.ar;;;;;;A/CA;POSADA 2 ESTRELLAS;208/16;**
Paraná Sur;19;Posada;Posada Del Cauce;9;41;Echenausi, Fernando;03777 15-552-574;Arroyo Veya. RN 12, Km 675;info@posadaslcauce.com.ar;www.posadadelcauce.com.ar;Posada del Cauce;;;;;S/D;;;**
Paraná Sur;19;Posada;La Casa Del Puerto;3;8;Guerreo, Julián;03777-460844/011-1536319995/1550492662;Av. Costanera Pte. Perón 205;lacasadelpuerto@gmail.com;www.corrientes.com.ar;;;;;;S/R;;;**
Paraná Sur;19;Posada;Posada Aguapycué;8;22;Escobar, Laura Roxana;03777-467019/011-67628275;RN 12 acceso norte;info@aguapycué.com.ar/roxi_4873@hotmail.com;www.aguapicue.com.ar;;;;;;C/R;;953/16;**
Paraná Sur;19;Posada;Posada Del Muelle;13;40;Delfabro, José;03777-461737/1565853;El Dorado 2229;posadadelmuelle@hotmail.com;www.posadadelmuelle.com.ar;;;;;;S/R;;;**
Paraná Sur;19;Posada;Posada Los Ceibos;4;13;Pérez, Ramón Roque;03777-15470927/461257;El Ceibo y Río Corriente;posadalosceibos@gmail.com;www.corrientes.com.ar/posadadelosceibos;;;;;;S/D;;;**
Paraná Sur;19;Residencial;Alojamiento Esquina;4;13;Barrios, Manuel;03777 460728/15552215;Belgrano R. F. García;alojamientoesquinactes@hotmail.com;www.corrientes.com.ar;Alojamiento Esquina Ctes;;;;;S/R;;;**
Paraná Sur;26;Albergue;Albergue Bomberos;2;24;Jéfe de la Dotacion;03777-422000/100;12 de octubre y 25 de mayo;bomberosgoya@guazunet.com.ar;;;;;;;S/R;;;**
Paraná Sur;26;Albergue;Albergue Club Atlético Unión;;45;Escobar María;03777-439893;Agustín P. Justo y Tucumán;;;;;;;;S/D;;;**
Paraná Sur;26;Albergue;Club De Caza Y Pesca Doña Goya;;;;;Puerto Goya;;;;;;;;S/D;;;**
Paraná Sur;26;Apart Hotel;Apart Costanera;7;30;Stortti, Vanina Paola;03777-431884;12 de octubre 831;goyaapartcostanera@hotmail.com.ar;www.goyaapartcostanera.blogspot.com;;;;;;C/R;;730/14;**
Paraná Sur;26;Cabaña;Cabaña Lo De Medoly;6;28;Melody Gross Klaus;03777-427041;Paraje Remanso;;;;;;;;S/R;;;**
Paraná Sur;26;Cabaña;Cabaña Doña Ernestina;1;6;Fouin, Jorge;03777-15597880;Camino Puerto Boca;;;;;;;;S/D;;;**
Paraná Sur;26;Cabaña;Cabañas Pira Pora;9;46;Minestrone, Oscar;03777-427022/15566834;Patricias Argentinas S/N;pirapora@guazunet.com.ar;www.cabanapirapora.com.ar;;;;;;S/R;;;**
Paraná Sur;26;Cabaña;Cabaña El Brujo;1;9;Guastavino, Oscar;03777-15400303;Camino al puerto, Km 6;negroguasta@hotmail.com;www.elbrujogoya.blogspot.com;;;;;;S/D;;;**
Paraná Sur;26;Cabaña;Cabaña Don Hugo;1;6;Melana, Hugo;03777-422706;Camino al Puerto Boca;bernardobaibiene@hotmail.com;;;;;;;S/D;;;**
Paraná Sur;26;Cabaña;Cabañas El Albor;2;15;Manso, Darío César;03777-4206637;Av. Mazzantti 799;;;;;;;;S/D;;;**
Paraná Sur;26;Cabaña;Cabaña Iru Heta;3;12;Baibiene, Bernardo;03777-15479310;Av. Millar Medina S/N;bbaibiene@gmail.com;www.pescagoya.com;Cabañas Itu Heta;;;;;S/R;;;**
Paraná Sur;26;Cabaña;Cabaña Punta De Millan;6;11;Millán, Natalia y Marcela;03777 431549/15312279;Puerto Boca;;;;;;;;S/D;;;**
Paraná Sur;26;Cabaña;Cabaña De La Costa Fishing Lodge;3;17;Ferrero, María Elena;3777-257125;Camino de la cosa - Rincón de Gómez s/n;cabadelacosta@gmail.com ;;;;;;;S/D;;;**
Paraná Sur;26;Casa De Campo;Casa De Campo Goetze;1;6;Goetze, Juan Martín;03777-15599183;Carolina frente al hoyo 18 del Golf Club;;www.quintagoetze.com.ar;;;;;;S/D;;;**
Paraná Sur;26;Casa De Campo;Casa De Campo Peky Baibiene;1;6;Baibiene, Pedro;03777-15513799;Pje. El Remanso;;;;;;;;S/D;;;**
Paraná Sur;26;Casa De Campo;Casa De Campo Zolezi Maria Delicia;4;12;Zolezi, María Delicia;03777-15446333;Pje. El Remanso;;;;;;;;S/D;;;**
Paraná Sur;26;Complejo ;Complejo Red Beans Fishing;4;12;Compá, Pablo;03777 15305430/15305448;Camino a Puerto Goya cerca de Prefectura;reservas@redbeansfishing.com.ar;www.redbeansfishing.com.ar;;;;;;S/D;;;**
Paraná Sur;26;Estancia Turística;Estancia La Perla;3;15;Osella Bernarda;03777-15471999;a 26 km de Goya;berni_osella@hotmail.com ;;;;;;;S/D;;;**
Paraná Sur;26;Estancia Turística;Estancia San Erasmo;3;12;Arce Lucio;03777-15569591;a 40 Km de Goya;goyatradicionalista@hotmail.com ;;;;;;;S/D;;;**
Paraná Sur;26;Estancia Turística;Estancia San Andrés;3;12;;;;coty07@hotmail.com ;;;;;;;S/D;;;**
Paraná Sur;26;Hospedaje;Hospedaje Buffa;6;18;Buffa Raúl Alberto;420272;Belgrano S/N;;;;;;;;S/D;;;**
Paraná Sur;26;Hospedaje;Toto Aventura;;6;Cuevas Fernando Germán;03777-15526135;Pasaje Carranza N° 374;;;;;;;;S/D;;;**
Paraná Sur;26;Hospedaje;Hiru Heta;;;Baibiene Bernardo;03777-15479310;Camino a Puerto Boca;bbaibiene@gmail.com;;;;;;;;;;**
Paraná Sur;26;Hostería;Hosteria El Nono;13;30;Bobino/Biancardi S.H;03777 421415;Caá Guazú 1128;omarbovino@yahoo.com.ar;;;;;;;S/R;;;**
Paraná Sur;26;Hostería;Hosteria El Surubí;5;15;Ledesma, José;03777 422632/15620516;Marín Soto 637;elsurubi@hotmail.com;;;;;;;S/R;;;**
Paraná Sur;26;Hostería;Hosteria San Andres;17;43;Ganancias, Ricardo Alberto;011-1535101350;Angel Soto 1221;estudioganancias_8@hotmail.com;;;;;;;C/R;;1067/16;**
Paraná Sur;26;Hotel;Condado Hotel Casino;54;120;Hoco SA;03777 430335/430600;España 635;reservasgoya@condadohotelcasino.com.ar;www.condadohotelcasino.com.ar;Condado Hotel Casino-Goya-Corrientes;;;;;A/CA;HOTEL CASINO 4 ESTRELLAS;1019/15;**
Paraná Sur;26;Hotel;Gran Hotel De Turismo;51;108;Pelícano SRL;03777 431675/422926;Bartolomé Mitre 880;hotelturismogoya@hotmail.com;www.hotelturismogoya.com ;Gran Hotel de Turismo;;;;;S/R;;;**
Paraná Sur;26;Hotel;Hotel Alcazar;46;96;González del Monte, Luis Miguel;03777-421366;José Gómez 848;;;;;;;;S/R;;;**
Paraná Sur;26;Hotel;Hotel Cervantes;44;103;Ortiz, Aníbal;03777 432122/434175;José Eusebio Gómez 723;hotelcervantes@goyanet.com.ar;www.corrientes.com.ar/hotelcervantes;;;;;;S/R;;;**
Paraná Sur;26;Hotel;Hotel Itati;28;45;Herrera, Pablo Daniel;03777 430514;J. J. Rolón 2050;;;;;;;;S/R;;;**
Paraná Sur;26;Hotel;Hotel San Cayetano;7;20;Verges, Blanco Alejandra;03777 15413475;Angel Soto 321;sancayetanogoya@gmail.com ;;;;;;;S/R;;;**
Paraná Sur;26;Hotel;Hotel Taragüi;30;73;Castillo, Gisela María;03777-421814;Colón 1181;info@hoteltaragui.com.ar;www.hoteltaragui.com.ar;;;;;;S/R;;;**
Paraná Sur;26;Lodge;Lodge De Rio;7;25;Maria Leonor Ambroseti;03777-430891/475915;Venezuela N° 1350;;;;;;;;C/R;;895/15;**
Paraná Sur;26;Lodge;Dorado Cua Lodge;4;8;Martín Batiston;03777-15621396;Esteros del Isiro;doradofly@goyanet.com.ar ;www.doradoadventure.com.ar;;;;;;S/D;;;**
Paraná Sur;26;Lodge;San Andres Lodge;1;6;Vernengo Andrés;;RN 12 Km 771;anacolodrero@hotmail.com.ar ;;;;;;;S/D;;;**
Paraná Sur;26;Lodge;Capitá Miní;4;8;Bahiston Mario;03777-15621396;Paraje Capitá Miní;;;;;;;;S/D;;;**
Paraná Sur;26;Posada;Posada Alarcon;3;15;Alarcón, Raúl Alberto y Cáceres de Alarcón, Graciela;03777 423277/15544473;Corrientes 987;posadaalarcon@gmail.com ;;;;;;;S/R;;;**
Paraná Sur;26;Posada;Posada Carolina;7;;Simoni, Carlos A.;;RN 12, Altos de Carolina, calle s/n. Municipio Carolina;;;;;;;;S/D;;;**
Paraná Sur;26;Posada;Posada Del Pescador;2;8;Verges, Ebar;03777 430765/421923/424242;Sobre el Río Santa Lucía - Parque;;;;;;;;S/D;;;**
Paraná Sur;26;Posada;Posada Las Arecas;11;30;Lecani Estebeni;03777-420647;San Martín 273;posadalasarecas@hotmail.com;;;;;;;C/R;;1104/15;**
Paraná Sur;51;Cabaña;Atardecer Del Paraná;2;12;Martín, Gonzalo;03777-15415538/415538/421923;Islas Malvinas y Río Paraná;atardecerdelparana@hotmail.com;www.wix.com.ar;Atardecer del Paraná;;;;;S/D;;;**
Paraná Sur;51;Hospedaje;Hospedaje Lavalle;3;8;Contreras, Miguel;;Ruta 27 y Berón de Astrada;;;;;;;;S/D;;;**
Paraná Sur;64;Estancia;Estancia La Correntina;8;16;López, Víctor Manuel;;;;;;;;;;S/D;;;**
Paraná Sur;64;Hotel;Hotal Santa Lucia;12;30;Carnevale, Carlos Horacio;03777-622762;Belgrano 659;santalucia.hotel@gmail.com;;;;;;;S/R;;;**
Solar de las Huellas;7;Camping;Balneario El Rincon;9;58;Ente Municipal;03781 406478;Av. David Martínez y Gervasio Blanco;;;;;;;Camping municipal c/cabañas;S/R;;;**
Solar de las Huellas;7;Hospedaje;Cuatro De Oro;3;9;Quevedo, Estela;;Itatí y San Martín;;;;;;;;S/R;;;**
Solar de las Huellas;7;Hospedaje;Yaqué Porá;9;26;Cristaldo, Romina Natalia;03781 401705;Brunel Pruyas s/n;giuli_1113@hotmail.com;;;;;;;S/R;;;**
Solar de las Huellas;7;Hotel;Jensen;20;65;Martínez, Eduardo Simón;3794 73105/755744;San Martín 252;eduardosimonmartinez@gmail.com;;;;;;;S/R;;;**
Solar de las Huellas;14;Cabaña;Cabaña Ibera;4;10;Ibarra, Rosa Amalia;3794400707;Calle 8 de Diciembre (entre Sarmiento y Dr. Vernengo);;;;;;;;S/R;;;**
Solar de las Huellas;14;Cabaña;Cabaña Areruroga;2;5;Valenzuela, María Lidia;3782402377;Bartolomé Mitre 694;nydiavalenzuela@hotmail.com;;;;;;;S/R;;;**
Solar de las Huellas;14;Cabaña;Cabañas Don Cima;2;5;Cima, Luis Alberto;3782523959;Caá Guazú 1588;;;;;;;;S/R;;;**
Solar de las Huellas;14;Camping;Mitaí;;;Ríos, Lourdes;;;;;;;;;Privado;;;;**
Solar de las Huellas;14;Casa De Familia;Ibera Rape;4;8;Leguizamón, Cirilo y Arregín, Elsa;3782-486823;Bo. 40 vdas. Casa 1B;joseciriloleguizamon2015@hotmail.com;;Comedor Hospedaje Bar;;;;;S/R;;;**
Solar de las Huellas;14;Casa De Familia;Ñangapirí Tujá;2;6;Escobar, Mirta;3782-497116;Caá Guazú Nº 21;vivi_card@hotmail.com;;Nangapirí Tujá;;;;;S/R;;;**
Solar de las Huellas;14;Casa De Familia;Hospedaje Casa Niz;3;8;Niz, Alberto;0379-400734/03782497257;Bo. 40 vdas. Grupo 1. Casa 13;albertoniz67@hotmail.com;;;;;;;S/R;;;**
Solar de las Huellas;14;Casas De Alquiler;Casa Jacaranda;2;5;Abalos, Antonia;3794381286;Bo. Corazón de Jesús. Casa 19. Sector 2;nuevodeanto@hotmail.com;;;;;;;S/R;;;**
Solar de las Huellas;14;Casas De Alquiler;Barberan Norma;2;5;Barberán, Norma;3782547105;Bo. 30 viv. Casa 3;;;Norma Barberán;;;;;S/R;;;**
Solar de las Huellas;14;Hospedaje;Hospedaje Mirita;1;4;Fernández, Miriam;3794331759;Bo. Inmaculada Concepción. Mza. B. Casa 11;miritafernandez2@hotmail.com;;;;;;;S/R;;;**
Solar de las Huellas;14;Hotel;Tobuna Suites;16;40;Pavón, Alejandro Alberto;;8 de Diciembre y Dr. Vernengo;tobunasuites@gmail.com;www.tobunasuites.com.ar ;;;;;;C/R;;;**
Solar de las Huellas;14;Posada;Posada Nido De Pajaros;4;9;Rougier, Claudio;;Bartolomé Mitre Nº 820;nidodepajarosposada@hotmail.com;;;;;;;C/R;;1011/15;**
Solar de las Huellas;14;Posada;La Alondra´I;10;20;Aquino, Porfirio Antonio;03782 4428558/4465757;Calle Comercio esquina Independencia;;;;;;;;A/CA;POSADA 3 ESTRELLAS;859/16;**
Solar de las Huellas;37;Alquileres Temporarios;Casa De Familia;3;10;Pis Pando, Rosa;03781 15482048/497114;Salta 107;;;;;;;;S/R;;;**
Solar de las Huellas;37;Bed & Breakfast;La Abuela;1;3;Mosqueda, Nélida;03781 497702/15484586 ;Mario Bofil y 25 de Mayo;;;;;;;;S/R;;;**
Solar de las Huellas;37;Bed & Breakfast;Hospedaje Cuarahy;5;19;Paez Zapini, Rita;03781-497055/0379-154380416;San Martín 610;ritapaezsapini@yahoo.com.ar;www.hospedajecuarahy.com.ar;;;;;;S/R;;;**
Solar de las Huellas;37;Estancia Turística;"Estancia ""San Juan Poriajhu""";9;27;García Rans, Marcos;03781-15608674/15609658;Ruta Nac. 118 km 178;sanjuanporiajhu@hotmail.com;;;;;;;S/R;;;**
Solar de las Huellas;37;Hospedaje;Hospedaje Che Gente Cuera;2;7;Hidaldo de Bofil, Selva;03781-489419;25 de Mayo y Sabas Gallardo;;;;;;;;S/R;;;**
Solar de las Huellas;37;Hospedaje;Hospedaje La Esquina;4;8;Breard, Ramón F. y Quiroz, Carmen;03781-497015/15489060;Tomás Úbeda y Sabas Gallardo;;;;;;;;S/D;;;**
Solar de las Huellas;37;Hospedaje;Hosteria Nde´Roga;5;20;Insaurralde, Eva;03781-409738/3794590006;Mendoza y Paraguay;;;;;;;;S/R;;;**
Solar de las Huellas;37;Hospedaje;Hospedaje Ko´Evy;3;13;Gómez, Andrés Avelino;;Junín Nº 428 esquina Armengol Alegre;zul_ga@hotmail.com;;Hospedaje Ko Evy;;;;;C/R;;193/18;**
Solar de las Huellas;37;Posada;Posada De Las Huellas;3;10;Dobiak, Natalia;3794280342;Armengon Alegre 198 esq. San Miguel;ndobiak@gmail.com;;Posada de las Huellas;;;;;S/R;;;**
Solar de las Huellas;39;Cabaña;Cabañas Mburucuyá Poty;7;40;Dolce, Miriam Evelin;03794 384626/03782 15501309;General Rodríguez 651;cabanas@mburucuyapoti.com;;;;;;;A/CA;CABAÑA 3 ESTRELLAS;503/17;**
Solar de las Huellas;39;Cabaña;Cabaña Don Felipe;4;16;González;3782441651;Rivadavia 500;nidiaobregon2017@gmail.com;;;;;;;S/R;;;**
Solar de las Huellas;39;Cabaña;Cabañas Eterno Vergel;6;21;Coen, Yanina;3794687464;Sarmiento 480;eternovergel@gmail.com;;Mburucuyá Cabañas Eterno Vergel;;;;;S/R;;;**
Solar de las Huellas;39;Camping;Balneario Municipal;;;Ente Municipal;;Eustaquio Miño entre Alsina y Pedro Ferré;;;;;Capacidad 200 personas;;;S/R;;;**
Solar de las Huellas;39;Hospedaje;Hopedaje El Descanso;3;9;Villalba, Norma;011-67411537;Alsina 1243;normaperaltavilla@hotmail.com;;;;;;;S/R;;;**
Solar de las Huellas;39;Hotel;Residencial Hotel;8;25;Verón, Enzo;03782 15440383;Rivadavia 662;hotelresidencial@hotmail.com.ar;;Residencial Hotel;;;;;S/R;;;**
Solar de las Huellas;39;Hotel;Hotel La Vieja Guardia;10;45;Miqueri, Liza;3794593900/03782498631;Belgrano 834;;;;;;;;S/R;;;**
Solar de las Huellas;54;Cabaña;Cabañas Complejo Turistico Municipal Presidente Kirchner;;;;3782-524769;Díaz Colodredo y Alfredo Miranda;;;;;;;;;;;**
Solar de las Huellas;54;Camping;Camping Y Complejo Turístico Kitner;11;120;;;;;;;;;;Capacidad del camping 120 personas. Tres cabañas;S/D;;;**
Solar de las Huellas;54;Hospedaje;Hospedaje Santi;3;6;Rivero, Santigo;03782-437178;Florida 1066;santia_rivero@hotmail.com;;;;;;;S/R;;;**
Solar de las Huellas;54;Hotel;Hotel Florida;20;50;Acevedo, Ramón J.;03782-15441250/421571;Florida 1076;;;;;;;;S/R;;;**
Solar de las Huellas;54;Hotel;Hotel El Faro;16;40;Fernández, Roque A.;03782-421273;Sarmiento 1089;marianofernandez_forestal@hotmail.com;;;;;;;S/R;;;**
Solar de las Huellas;54;Hotel;Hotel Cuatro Bocas;8;14;Cuatro Bocas SRL;03782-421236/03782-422237;RN 12 y RN 118;cuatrobocassds@hotmail.com;;;;;;;S/R;;;**
Solar de las Huellas;54;Hotel;Hotel California;4;12;Royt, Susana;03782-513485;Sargento Cabral 701;suroyt@hotmail.com;;;;;;;S/R;;;**
Solar de las Huellas;54;Hotel;Hotel Convac Sa (Al Lado Del Oil);14;40;CONVAC SA;03782-427010;RN 12 Km 941;convacsa@gmail.com;;;;;;;S/R;;;**
Solar de las Huellas;61;Hospedaje;Hospedaje Iberá;7;19;Meineri, Gustavo Gastón;03782 483022;Av. San Martín 1809;gustavo_meineri@hotmail.com.ar;;;;;;;S/R;;;**
Solar de las Huellas;61;Hospedaje;Hospedaje Doña Ofelia;21;43;Blanco, Cintya Marcela;03782 483098;San Martín y Formosa;;;;;;;;S/R;;;**
Solar de las Huellas;61;Hospedaje;Hospedaje Familiar Kavuré;4;8;González, Eladio y Ledesma, María Tomasa;011-67299987;Haidé Godoy entre Av. Gral. San Martín y Bension Pischick;;;;;;;;S/R;;;**
Solar de las Huellas;61;Hospedaje;Hospedaje Familiar Don Enrique;3;6;Omar Enrique;3794-274429;Av. Virgen de Itatí entre Alberdi y Rivadavia;;;;;;;;S/R;;;**
Solar de las Huellas;61;Hospedaje;Hospedaje Familiar Amala Ruiz Diaz;1;3;Ruidíaz, Amalia;011-58228268;Bension Pischick 650;;;;;;;;S/R;;;**
Solar de las Huellas;61;Hotel;Hotel Gaucho Gil;5;13;Cabral, Mario;3794022441;Bestión Pischick y Bartolome Mitre;sanmiguelmotos@hotmail.com;;;;;;;S/R;;;**
Solar de las Huellas;61;Lodge;Mboy Cua;6;15;Bee, Nora Adriana;3794-898105;Av. Itatí s/n entre calle Alberdi y Wilda Eced;info@posdamboycua.com;www.posadamboycua.com;Posada Mboy Cua;;;;;A/CA;LODGE;507/17;**
Solar de las Huellas;65;Cabaña;Cabaña Doña Rosa;4;10;Santa Cruz, Julia E.;03782-508413;México s/n entre Tucumán y Corrientes;chiche_lafuente@hotmail.com;;;;;;;C/R;;1064/17;**
Solar de las Huellas;65;Cabaña;Cabañas La Soñada;6;18;Ramírez, María Soledad;3782-450794/511102;Ingreso a Bo. Llamarada;;;;;;;;S/R;;;**
Solar de las Huellas;65;Hospedaje;El Reposo;50;100;Reirjers, Fabián;;RN 118 Km 160;reijersfabian_08@yahoo.com.ar;;;;;;;S/R;;;**
Solar de las Huellas;65;Hospedaje;Don Andres;6;12;Otazo, María Elena;03782 15454592;RN 118 Km 63;lencinas@hotmail.com ;;;;;;;S/R;;;**
Solar de las Huellas;65;Hotel;Hotel Plaza;13;37;Sosa, Clara Ether ;03782 494041;25 de Mayo 47;claritae_sosa@hotmail.com;;Santa Rosa Plaza Hotel;;;;;S/R;;;**
Solar de las Huellas;65;Hotel;Hotel Malbert;12;30;Rojas, María Isabel;03782 15-415867;RN 118 Km 62,5;hotelmalbert@gmail.com;www.hotelmalbert.com.ar;;;;;;S/R;;;**
Solar de las Huellas;70;Camping;Camping Municipal La Soñada;;;Yonchyk, Sergio;3416297976;;;;;;;;Capacidad para 1500 personas. Hay una laguna;S/R;;;
';


    $hoteles = explode('**',$hoteles);

    foreach ($hoteles as $key => $value)
    {
        $h = new Hotel();
        $h->construct($value);
    }





    }



    public function crearMunicipios()
    {
        /**
 * Export to PHP Array plugin for PHPMyAdmin
 * @version 4.7.0
 */

/**
 * Database `encuesta`
 */

/* `encuesta`.`municipios` */
$municipios = array(
  array('id' => '1','nombre' => 'Tres de Abril','url' => 'http://www.corrientesintensa.com/destino/tres-de-abril/','logo' => 'images/municipios/tres-de-abril.jpg','microrregion_id' => '4','indec_id' => '0','indec_nombre' => NULL,'departamento_id' => NULL),
  array('id' => '2','nombre' => '9 de Julio','url' => 'http://www.corrientes.gov.ar/home/9-de-julio/municipio','logo' => 'images/municipios/9_de_julio.png','microrregion_id' => '4','indec_id' => '0399','indec_nombre' => '9 de Julio (Est. Pueblo 9 de Julio)','departamento_id' => '161'),
  array('id' => '3','nombre' => 'Alvear','url' => '','logo' => 'images/municipios/alvear.jpg','microrregion_id' => '2','indec_id' => '0098','indec_nombre' => 'Alvear','departamento_id' => '056'),
  array('id' => '4','nombre' => 'Bella Vista','url' => 'http://www.bellavista.gob.ar/','logo' => 'images/municipios/bellavista.png','microrregion_id' => '4','indec_id' => '0007','indec_nombre' => 'Bella Vista','departamento_id' => '007'),
  array('id' => '5','nombre' => 'Berón de Astrada','url' => '','logo' => 'images/municipios/escudo-beron-de-estrada.png','microrregion_id' => '6','indec_id' => '0014','indec_nombre' => 'Berón de Astrada','departamento_id' => '014'),
  array('id' => '6','nombre' => 'Bonpland','url' => 'https://www.corrientes.gov.ar/home/bonpland/municipio','logo' => 'images/municipios/bonpland.png','microrregion_id' => '3','indec_id' => '0280','indec_nombre' => 'Bonpland','departamento_id' => '119'),
  array('id' => '7','nombre' => 'Caá Catí','url' => '','logo' => 'images/municipios/caa_cati.png','microrregion_id' => '6','indec_id' => '0112','indec_nombre' => 'Nuestra Señora del Rosario de Caá Catí ','departamento_id' => '063'),
  array('id' => '8','nombre' => 'Colonia Carlos Pellegrini','url' => 'http://www.corrientes.gov.ar/home/colonia-carlos-pellegrini/municipio','logo' => 'images/municipios/cnia-carlos pellegrini.png','microrregion_id' => '2','indec_id' => '0357','indec_nombre' => 'Colonia Carlos Pellegrini','departamento_id' => '147'),
  array('id' => '9','nombre' => 'Colonia Carolina','url' => '','logo' => 'images/municipios/carolina.png','microrregion_id' => '4','indec_id' => '0137','indec_nombre' => 'Colonia Carolina','departamento_id' => '070'),
  array('id' => '10','nombre' => 'Chavarría','url' => 'http://www.corrientes.gov.ar/home/chavarria/municipio','logo' => 'images/municipios/chavarria.jpg','microrregion_id' => '4','indec_id' => '0413','indec_nombre' => 'Chavarría','departamento_id' => '161'),
  array('id' => '11','nombre' => 'Colonia Libertad','url' => 'http://www.corrientes.gov.ar/home/colonia-libertad/municipio','logo' => 'images/municipios/colonia-libertad.jpg','microrregion_id' => '3','indec_id' => '0252','indec_nombre' => 'Colonia Libertad','departamento_id' => '112'),
  array('id' => '12','nombre' => 'Colonia Liebig','url' => 'https://www.corrientes.gov.ar/home/colonia-liebig/municipio','logo' => 'images/municipios/colonia_liebig.png','microrregion_id' => '2','indec_id' => '0161','indec_nombre' => 'Colonia Liebigs','departamento_id' => '084'),
  array('id' => '13','nombre' => 'Colonia Pando','url' => 'http://www.corrientes.gov.ar/home/colonia-pando/municipio','logo' => 'images/municipios/pando.jpg','microrregion_id' => '4','indec_id' => '0417','indec_nombre' => 'Colonia Pando','departamento_id' => '161'),
  array('id' => '14','nombre' => 'Concepción','url' => '','logo' => 'images/municipios/escudo-concepcion.png','microrregion_id' => '5','indec_id' => '0042','indec_nombre' => 'Concepción','departamento_id' => '028'),
  array('id' => '15','nombre' => 'Corrientes','url' => 'http://ciudaddecorrientes.gov.ar/','logo' => 'images/municipios/capital.png','microrregion_id' => '1','indec_id' => '0021','indec_nombre' => 'Corrientes','departamento_id' => '021'),
  array('id' => '16','nombre' => 'Cruz de los Milagros','url' => '','logo' => 'images/municipios/cruz_de_los_milagros.png','microrregion_id' => '4','indec_id' => '0189','indec_nombre' => 'Cruz de los Milagros','departamento_id' => '091'),
  array('id' => '17','nombre' => 'Curuzú Cuatiá','url' => '','logo' => 'images/municipios/curuzu_cuatia.png','microrregion_id' => '3','indec_id' => '0056','indec_nombre' => 'Curuzú Cuatiá','departamento_id' => '035'),
  array('id' => '18','nombre' => 'Empedrado','url' => '','logo' => 'images/municipios/empedrado.png','microrregion_id' => '5','indec_id' => '0077','indec_nombre' => 'Empedrado','departamento_id' => '042'),
  array('id' => '19','nombre' => 'Esquina','url' => 'http://www.esquinacorrientes.gob.ar/','logo' => 'images/municipios/esquina.jpg','microrregion_id' => '4','indec_id' => '0084','indec_nombre' => 'Esquina','departamento_id' => '049'),
  array('id' => '20','nombre' => 'Estación Torrent','url' => '','logo' => 'images/municipios/municipio.jpg','microrregion_id' => '2','indec_id' => '0105','indec_nombre' => 'Estación Torrent','departamento_id' => '056'),
  array('id' => '21','nombre' => 'Felipe Yofre','url' => 'https://www.corrientes.gov.ar/home/felipe-yofre/municipio','logo' => 'images/municipios/felipe-yofre.jpg','microrregion_id' => '3','indec_id' => '0231','indec_nombre' => 'Felipe Yofré','departamento_id' => '105'),
  array('id' => '22','nombre' => 'Garabí','url' => 'https://es.wikipedia.org/wiki/Garab%C3%AD_(Corrientes)','logo' => 'images/municipios/garabi.jpg','microrregion_id' => '2','indec_id' => '0441','indec_nombre' => 'José Rafael Gómez (Garabí)','departamento_id' => '168'),
  array('id' => '23','nombre' => 'Garruchos','url' => 'https://www.corrientes.gov.ar/home/garruchos/municipio','logo' => 'images/municipios/garrucho.bmp','microrregion_id' => '2','indec_id' => '0427','indec_nombre' => 'Garruchos','departamento_id' => '168'),
  array('id' => '24','nombre' => 'Gobernador Martinez','url' => '','logo' => 'images/municipios/gobernador_martinez.png','microrregion_id' => '4','indec_id' => '0196','indec_nombre' => 'Gobernador Juan E. Martínez','departamento_id' => '091'),
  array('id' => '25','nombre' => 'Gobernador V. Virasoro','url' => 'http://www.virasoro.gob.ar/','logo' => 'images/municipios/virasoro.jpg','microrregion_id' => '2','indec_id' => '0434','indec_nombre' => 'Gobernador Igr. Valentín Virasoro ','departamento_id' => '168'),
  array('id' => '26','nombre' => 'Goya','url' => '','logo' => 'images/municipios/goya.png','microrregion_id' => '4','indec_id' => '0140','indec_nombre' => 'Goya','departamento_id' => '070'),
  array('id' => '27','nombre' => 'Guaviraví','url' => '','logo' => 'images/municipios/municipio.jpg','microrregion_id' => '2','indec_id' => '0364','indec_nombre' => 'Guaviraví','departamento_id' => '147'),
  array('id' => '28','nombre' => 'Herliztka','url' => '','logo' => 'images/municipios/escudo-herliztka.png','microrregion_id' => '6','indec_id' => '0','indec_nombre' => 'nan','departamento_id' => NULL),
  array('id' => '29','nombre' => 'Ita Ibaté','url' => 'http://www.corrientes.gov.ar/home/ita-ibate/municipio','logo' => 'images/municipios/itaibate.jpg','microrregion_id' => '6','indec_id' => '0119','indec_nombre' => 'Itá Ibaté','departamento_id' => '063'),
  array('id' => '30','nombre' => 'Itatí','url' => '','logo' => 'images/municipios/escudo-itati.png','microrregion_id' => '6','indec_id' => '0147','indec_nombre' => 'Itatí','departamento_id' => '077'),
  array('id' => '31','nombre' => 'Ituzaingó','url' => '','logo' => 'images/municipios/ituzaingo.jpg','microrregion_id' => '2','indec_id' => '0168','indec_nombre' => 'Ituzaingó','departamento_id' => '084'),
  array('id' => '32','nombre' => 'José Rafael Gomez','url' => '','logo' => 'images/municipios/escudo-jose-r-gomez.png','microrregion_id' => '2','indec_id' => '0441','indec_nombre' => 'José Rafael Gómez (Garabí)','departamento_id' => '168'),
  array('id' => '33','nombre' => 'Juan Pujol','url' => '','logo' => 'images/municipios/escudo-juan-pujol.png','microrregion_id' => '3','indec_id' => '0259','indec_nombre' => 'Juan Pujol','departamento_id' => '112'),
  array('id' => '34','nombre' => 'La Cruz','url' => 'http://www.lacruz.gov.ar/','logo' => 'images/municipios/la-cruz.png','microrregion_id' => '2','indec_id' => '0371','indec_nombre' => 'La Cruz','departamento_id' => '147'),
  array('id' => '35','nombre' => 'San Isidro','url' => '','logo' => 'images/municipios/escudo-san-isidro.png','microrregion_id' => '4','indec_id' => '0','indec_nombre' => 'nan','departamento_id' => NULL),
  array('id' => '36','nombre' => 'Lomas de Vallejos','url' => 'http://www.corrientes.gov.ar/home/lomas-de-vallejos/municipio','logo' => 'images/municipios/loma-de-vallejos.jpg','microrregion_id' => '6','indec_id' => '0126','indec_nombre' => 'Lomas de Vallejos','departamento_id' => '063'),
  array('id' => '37','nombre' => 'Loreto','url' => 'https://www.corrientes.gov.ar/home/loreto/municipio','logo' => 'images/municipios/loreto.jpg','microrregion_id' => '5','indec_id' => '0385','indec_nombre' => 'Loreto','departamento_id' => '154'),
  array('id' => '38','nombre' => 'Mariano I. Loza','url' => 'http://www.corrientes.gov.ar/home/mariano-i-loza/municipio','logo' => 'images/municipios/mariano-loza.jpg','microrregion_id' => '3','indec_id' => '0238','indec_nombre' => 'Mariano I. Loza (Est. Justino Solari)','departamento_id' => '105'),
  array('id' => '39','nombre' => 'Mburucuyá','url' => 'http://www.corrientes.gov.ar/home/mburucuya/municipio','logo' => 'images/municipios/mburucuya.jpg','microrregion_id' => '5','indec_id' => '0224','indec_nombre' => 'Mburucuyá','departamento_id' => '098'),
  array('id' => '40','nombre' => 'Mercedes','url' => '','logo' => 'images/municipios/mercedes.png','microrregion_id' => '3','indec_id' => '0245','indec_nombre' => 'Mercedes','departamento_id' => '105'),
  array('id' => '41','nombre' => 'Mocoretá','url' => 'http://www.corrientes.gov.ar/home/mocoreta/municipio','logo' => 'images/municipios/mocoreta.JPG','microrregion_id' => '3','indec_id' => '0266','indec_nombre' => 'Mocoretá','departamento_id' => '112'),
  array('id' => '42','nombre' => 'Monte Caseros','url' => 'http://www.corrientes.gov.ar/home/monte-caseros/municipio','logo' => 'images/municipios/monte-caseros.gif','microrregion_id' => '3','indec_id' => '0273','indec_nombre' => 'Monte Caseros','departamento_id' => '112'),
  array('id' => '43','nombre' => 'Pago de los Deseos','url' => '','logo' => 'images/municipios/escudo-pago-de-los-deseos.png','microrregion_id' => '5','indec_id' => '0','indec_nombre' => 'nan','departamento_id' => NULL),
  array('id' => '44','nombre' => 'Palmar Grande','url' => '','logo' => 'images/municipios/escudo-palmar-grande.png','microrregion_id' => '6','indec_id' => '0133','indec_nombre' => 'Palmar Grande','departamento_id' => '063'),
  array('id' => '45','nombre' => 'Parada Pucheta','url' => '','logo' => 'images/municipios/municipio.jpg','microrregion_id' => '3','indec_id' => '0287','indec_nombre' => 'Parada Pucheta','departamento_id' => '119'),
  array('id' => '46','nombre' => 'Paso de la Patria','url' => '','logo' => 'images/municipios/escudo-paso-de-la-patria.png','microrregion_id' => '6','indec_id' => '0322','indec_nombre' => 'Paso de la Patria','departamento_id' => '133'),
  array('id' => '47','nombre' => 'Paso de los Libres','url' => 'http://pasodeloslibres.gob.ar/','logo' => 'images/municipios/paso-de-los-libres.jpg','microrregion_id' => '3','indec_id' => '0294','indec_nombre' => 'Paso de los Libres','departamento_id' => '119'),
  array('id' => '48','nombre' => 'Pedro R. Fernandez','url' => '','logo' => 'images/municipios/escudo-pedro-r-Fernandez.png','microrregion_id' => '4','indec_id' => '0406','indec_nombre' => 'Pedro R. Fernández (Est. Manuel F. Mantilla)','departamento_id' => '161'),
  array('id' => '49','nombre' => 'Perugorria','url' => 'http://www.corrientes.gov.ar/home/perugorria/municipio','logo' => 'images/municipios/perugorria.gif','microrregion_id' => '3','indec_id' => '0070','indec_nombre' => 'Perugorría','departamento_id' => '035'),
  array('id' => '50','nombre' => 'Pueblo Libertador','url' => '','logo' => 'images/municipios/escudo-libertador.png','microrregion_id' => '4','indec_id' => '0','indec_nombre' => 'nan','departamento_id' => NULL),
  array('id' => '51','nombre' => 'Lavalle','url' => 'http://www.corrientes.gov.ar/home/lavalle/municipio','logo' => 'images/municipios/lavalle.jpg','microrregion_id' => '4','indec_id' => '0203','indec_nombre' => 'Lavalle','departamento_id' => '091'),
  array('id' => '52','nombre' => 'Ramada Paso','url' => '','logo' => 'images/municipios/escudo-ramada-paso.png','microrregion_id' => '6','indec_id' => '0154','indec_nombre' => 'Ramada Paso','departamento_id' => '077'),
  array('id' => '53','nombre' => 'Riachuelo','url' => 'http://www.municipioriachuelo.gov.ar/','logo' => 'images/municipios/riachuelo.jpg','microrregion_id' => '1','indec_id' => '0028','indec_nombre' => 'Riachuelo','departamento_id' => '021'),
  array('id' => '54','nombre' => 'Saladas','url' => '','logo' => 'images/municipios/escudo-saladas.png','microrregion_id' => '5','indec_id' => '0308','indec_nombre' => 'Saladas','departamento_id' => '126'),
  array('id' => '55','nombre' => 'San Antonio de Apipe','url' => 'http://www.corrientes.gov.ar/home/san-antonio/municipio','logo' => 'images/municipios/san-antonio-de-apipe.png','microrregion_id' => '2','indec_id' => '0175','indec_nombre' => 'San Antonio','departamento_id' => '084'),
  array('id' => '56','nombre' => 'San Carlos','url' => '','logo' => 'images/municipios/escudo-san-carlos.png','microrregion_id' => '2','indec_id' => '0182','indec_nombre' => 'San Carlos','departamento_id' => '084'),
  array('id' => '58','nombre' => 'San Cosme','url' => 'https://www.corrientes.gov.ar/home/san-cosme/municipio','logo' => 'images/municipios/sancosme-escudo.gif','microrregion_id' => '6','indec_id' => '0329','indec_nombre' => 'San Cosme','departamento_id' => '133'),
  array('id' => '59','nombre' => 'San Lorenzo','url' => 'http://www.corrientes.gov.ar/home/san-lorenzo/municipio','logo' => 'images/municipios/sanlorenzo.png','microrregion_id' => '5','indec_id' => '0315','indec_nombre' => 'San Lorenzo','departamento_id' => '126'),
  array('id' => '60','nombre' => 'San Luis del Palmar','url' => '','logo' => 'images/municipios/sanluisdelpalmar.png','microrregion_id' => '6','indec_id' => '0350','indec_nombre' => 'San Luis del Palmar','departamento_id' => '140'),
  array('id' => '61','nombre' => 'San Miguel','url' => 'https://www.corrientes.gov.ar/home/san-miguel/municipio','logo' => 'images/municipios/San-Miguel.jpg','microrregion_id' => '5','indec_id' => '0392','indec_nombre' => 'San Miguel','departamento_id' => '154'),
  array('id' => '62','nombre' => 'San Roque','url' => 'http://www.sanroquemunicipio.gob.ar/','logo' => 'images/municipios/san-roque.jpg','microrregion_id' => '4','indec_id' => '0420','indec_nombre' => 'San Roque','departamento_id' => '161'),
  array('id' => '63','nombre' => 'Santa Ana de los Guacaras','url' => 'http://www.santaanadelosguacaras.com/','logo' => 'images/municipios/santa-ana-escudo.png','microrregion_id' => '6','indec_id' => '0336','indec_nombre' => 'Santa Ana','departamento_id' => '133'),
  array('id' => '64','nombre' => 'Santa Lucía','url' => '','logo' => 'images/municipios/santa_lucia.png','microrregion_id' => '4','indec_id' => '0210','indec_nombre' => 'Santa Lucía','departamento_id' => '091'),
  array('id' => '65','nombre' => 'Colonia Santa Rosa','url' => 'http://www.corrientes.gov.ar/home/colonia-santa-rosa/municipio','logo' => 'images/municipios/santa-rosa.jpg','microrregion_id' => '5','indec_id' => '0035','indec_nombre' => 'Santa Rosa','departamento_id' => '028'),
  array('id' => '66','nombre' => 'Santo Tome','url' => 'http://municipalidadstome.com.ar/','logo' => 'images/municipios/santo_tome.jpg','microrregion_id' => '2','indec_id' => '0448','indec_nombre' => 'Santo Tomé','departamento_id' => '168'),
  array('id' => '67','nombre' => 'Sauce','url' => 'http://www.corrientes.gov.ar/home/sauce/municipio','logo' => 'images/municipios/sauce.jpg','microrregion_id' => '3','indec_id' => '0455','indec_nombre' => 'Sauce','departamento_id' => '175'),
  array('id' => '68','nombre' => 'Tabay','url' => '','logo' => 'images/municipios/escudo-tabay.png','microrregion_id' => '5','indec_id' => '0049','indec_nombre' => 'Tabay','departamento_id' => '028'),
  array('id' => '69','nombre' => 'Tapebicuá','url' => '','logo' => 'images/municipios/municipio.jpg','microrregion_id' => '3','indec_id' => '0301','indec_nombre' => 'Tapebicuá','departamento_id' => '119'),
  array('id' => '70','nombre' => 'Tatacua','url' => 'https://www.corrientes.gov.ar/home/tatacua/municipio','logo' => 'images/municipios/tatacua.jpg','microrregion_id' => '5','indec_id' => '0','indec_nombre' => 'nan','departamento_id' => NULL),
  array('id' => '71','nombre' => 'Villa Olivari','url' => '','logo' => 'images/municipios/municipio.jpg','microrregion_id' => '2','indec_id' => '0186','indec_nombre' => 'Villa Olivari','departamento_id' => '084'),
  array('id' => '72','nombre' => 'Yapeyú','url' => 'https://www.corrientes.gov.ar/home/yapeyu/municipio','logo' => 'images/municipios/yapeyu.jpg','microrregion_id' => '2','indec_id' => '0378','indec_nombre' => 'Yapeyú','departamento_id' => '147'),
  array('id' => '73','nombre' => 'Yatayti Calle','url' => 'http://www.corrientes.gov.ar/home/yatayti-calle/municipio','logo' => 'images/municipios/yatayti_calle.jpg','microrregion_id' => '4','indec_id' => '0217','indec_nombre' => 'Yatayti Calle','departamento_id' => NULL),
  array('id' => '75','nombre' => 'El Sombrero','url' => 'http://elsombrero.corrientes.gob.ar/','logo' => 'images/municipios/sombrero.jpg','microrregion_id' => '5','indec_id' => '0','indec_nombre' => 'El Sombrero','departamento_id' => '042')
);


 foreach ($municipios as $key => $value)
    {
        $m = new Municipio();
        $m->construct($value);
    }




    }

}
