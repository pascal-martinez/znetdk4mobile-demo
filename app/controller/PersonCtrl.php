<?php
namespace app\controller;

class PersonCtrl extends \AppController {
    
    static protected function action_all() {
        
        $request = new \Request();
        $first = $request->first;
        $rowCount = $request->count;
        $sortField = $request->sortfield;
        $sortOrder = $request->sortorder;
        
        $persons = array();
        $total = self::getRows($first, $rowCount, $persons, $sortField, $sortOrder, $request->keyword);
        
        $response = new \Response();
        $response->rows = $persons;
        $response->total = $total;
        return $response;
    }
    
    static private function getRows($first, $count, &$rows, $sortField, $sortOrder, $keywords) {
        $all = self::getAllSortedRows($sortField, $sortOrder, $keywords);
        $rows = array();
        foreach ($all as $key => $row) {
            
            if ($key >= $first) {
                $rows[] = $row;
            }
            if (count($rows) == $count) {
                break;
            }
        }
        return count($all);
    }
    
    static private function isMatchingKeyword($keywords, $name) {
        if (is_null($keywords)) {
            return TRUE; // No keyword specified as filter
        }
        $searchedKeywords = explode(',', $keywords);
        foreach ($searchedKeywords as $keyword) {
            if (strpos(strtolower($name), strtolower($keyword)) !== FALSE) {
                return TRUE;
            }
        }
        return FALSE;
    }
    
    static private function getAllSortedRows($sortField, $sortOrder, $keywords = NULL) {
        $all = self::getAll();
        if (!is_null($sortField) && !is_null($sortOrder)) {
            foreach ($all as $key => $row) {
                $column[$key]  = $row[$sortField];
            }
            array_multisort($column, $sortOrder === '1' ? SORT_ASC : SORT_DESC, $all);
        }
        $foundRows = array();
        foreach ($all as $row) {
             if (self::isMatchingKeyword($keywords, $row['name'])) {
                 $foundRows[] = $row;
             }
        }
        return $foundRows;
    }
    
    static private function getAll() {
        return array(
            array('id' => '1','name' => 'Yeo Bartlett','phone' => '53355765','email' => 'eget.odio@Lorem.net','birthdate' => '1992-04-05','address' => 'Ap #505-5642 A Street','city' => 'Itzehoe','zip' => '0407','country' => 'Singapore'),
            array('id' => '2','name' => 'Jonah Henry','phone' => '93852396','email' => 'felis.purus.ac@imperdieterat.org','birthdate' => '1942-06-01','address' => 'P.O. Box 153, 9171 Non, Street','city' => 'North Shore','zip' => '120032','country' => 'Côte D\'Ivoire (Ivory Coast)'),
            array('id' => '3','name' => 'Nelle Glenn','phone' => '09662346','email' => 'vulputate.nisi.sem@imperdiet.com','birthdate' => '1964-09-08','address' => 'P.O. Box 531, 5974 Magna. Av.','city' => 'Maiolati Spontini','zip' => '7627EP','country' => 'Malaysia'),
            array('id' => '4','name' => 'Lynn Joyce','phone' => '71700925','email' => 'facilisi@Curabiturvel.net','birthdate' => '1962-02-23 20:40:06','address' => 'P.O. Box 501, 9445 Orci Road','city' => 'Charlottetown','zip' => '29358','country' => 'Martinique'),
            array('id' => '5','name' => 'Arsenio Santana','phone' => '90928163','email' => 'at.pede@natoquepenatibuset.net','birthdate' => '1991-08-21 17:09:05','address' => '545-9976 Augue Ave','city' => 'San Vito Chietino','zip' => '1650','country' => 'Trinidad and Tobago'),
            array('id' => '6','name' => 'Stuart Wood','phone' => '84129004','email' => 'nascetur.ridiculus.mus@dictum.com','birthdate' => '2009-12-20 05:56:47','address' => 'P.O. Box 219, 628 Integer Rd.','city' => 'Sherborne','zip' => '644699','country' => 'Niue'),
            array('id' => '7','name' => 'Axel Ortega','phone' => '57386106','email' => 'accumsan@acmattissemper.ca','birthdate' => '1964-10-29 22:20:11','address' => '839-3275 Aptent Rd.','city' => 'Trois-Rivières','zip' => '57425','country' => 'American Samoa'),
            array('id' => '8','name' => 'India Levine','phone' => '69104781','email' => 'massa.Mauris.vestibulum@ante.co.uk','birthdate' => '1994-04-05 03:35:58','address' => 'P.O. Box 791, 7245 Ac Rd.','city' => 'Orosei','zip' => '7684','country' => 'Guinea-Bissau'),
            array('id' => '9','name' => 'Branden Hopper','phone' => '57293673','email' => 'eleifend.Cras@atauctor.ca','birthdate' => '1943-08-28 06:13:06','address' => '5600 Feugiat St.','city' => 'Ludlow','zip' => '51431','country' => 'United States Minor Outlying Islands'),
            array('id' => '10','name' => 'Nicole Brock','phone' => '62714060','email' => 'sed@etmagnis.ca','birthdate' => '1956-10-30 11:13:52','address' => 'P.O. Box 406, 2962 Non Avenue','city' => 'Siegendorf','zip' => '60205','country' => 'Gambia'),
            array('id' => '11','name' => 'Carly Dudley','phone' => '11656958','email' => 'conubia@pellentesque.com','birthdate' => '1931-06-23 02:28:20','address' => '7812 Ac Rd.','city' => 'Villa Cortese','zip' => 'CM9R 0SV','country' => 'United States Minor Outlying Islands'),
            array('id' => '12','name' => 'Austin Boone','phone' => '96095067','email' => 'vulputate@natoque.co.uk','birthdate' => '1998-01-26 10:48:01','address' => '174-7215 Eget Ave','city' => 'Balvano','zip' => '15853-192','country' => 'Isle of Man'),
            array('id' => '13','name' => 'Daria Nichols','phone' => '07559243','email' => 'ipsum.leo.elementum@tellusPhaselluselit.co.uk','birthdate' => '1967-02-01 02:52:20','address' => '666-3897 Ac St.','city' => 'Brucargo','zip' => '6006','country' => 'Chad'),
            array('id' => '14','name' => 'Kellie Daniel','phone' => '01888741','email' => 'fames.ac.turpis@congue.com','birthdate' => '2001-06-17 03:22:14','address' => '601-1607 Iaculis Rd.','city' => 'Altidona','zip' => '60147','country' => 'San Marino'),
            array('id' => '15','name' => 'Steel Odom','phone' => '61071675','email' => 'eu@pellentesqueeget.net','birthdate' => '1981-08-18 18:16:39','address' => '2212 Egestas Avenue','city' => 'San Giorgio Albanese','zip' => '65535-045','country' => 'Dominican Republic'),
            array('id' => '16','name' => 'Darius Conley','phone' => '26881841','email' => 'purus@nislMaecenas.com','birthdate' => '1999-10-23 22:03:05','address' => 'Ap #822-4188 Odio Ave','city' => 'Mont-Sainte-Geneviève','zip' => '24367-843','country' => 'Equatorial Guinea'),
            array('id' => '17','name' => 'Kermit Madden','phone' => '21777844','email' => 'felis.purus.ac@quis.com','birthdate' => '1996-07-07 06:17:33','address' => '638-7275 Sed Ave','city' => 'Palestrina','zip' => '39030','country' => 'Belgium'),
            array('id' => '18','name' => 'Ariel Potts','phone' => '37072381','email' => 'purus@urna.com','birthdate' => '1951-07-29 11:23:59','address' => '7185 Donec Rd.','city' => 'Vorst','zip' => '8465GH','country' => 'Papua New Guinea'),
            array('id' => '19','name' => 'Ezekiel Navarro','phone' => '88015959','email' => 'neque.sed.sem@elitpede.com','birthdate' => '2014-03-01 12:35:28','address' => 'Ap #644-2142 Dui St.','city' => 'São José dos Pinhais','zip' => '4562','country' => 'Turkey'),
            array('id' => '20','name' => 'Leilani Farley','phone' => '39118577','email' => 'nostra.per@risusquisdiam.ca','birthdate' => '1978-04-06 04:11:32','address' => 'P.O. Box 473, 9791 In Av.','city' => 'Lehrte','zip' => '62654','country' => 'Haiti'),
            array('id' => '21','name' => 'Linda Butler','phone' => '70631426','email' => 'Cras@risus.org','birthdate' => '1940-06-14 07:58:59','address' => 'P.O. Box 548, 9892 Cras Road','city' => 'Terragnolo','zip' => '9879','country' => 'Latvia'),
            array('id' => '22','name' => 'Ezra Hayden','phone' => '75109148','email' => 'blandit.at@sedorci.ca','birthdate' => '1972-08-30 13:07:38','address' => '220-9164 Velit. Rd.','city' => 'Diyarbakır','zip' => '53751','country' => 'Bulgaria'),
            array('id' => '23','name' => 'Ava Ruiz','phone' => '33699265','email' => 'tincidunt@loremluctus.org','birthdate' => '2014-01-28 21:40:45','address' => '8120 Est St.','city' => 'Laakirchen','zip' => '5879','country' => 'Guatemala'),
            array('id' => '24','name' => 'Tanya Houston','phone' => '43624168','email' => 'egestas.Aliquam@vehiculaaliquetlibero.ca','birthdate' => '1990-05-16 11:40:38','address' => 'Ap #329-7291 Nibh Road','city' => 'Belfast','zip' => '5044','country' => 'Thailand'),
            array('id' => '25','name' => 'Tara Harper','phone' => '92865794','email' => 'Sed@urnaconvalliserat.ca','birthdate' => '1961-07-03 21:14:10','address' => '270-6937 Magna Avenue','city' => 'Diadema','zip' => 'R1Z 8G3','country' => 'Romania'),
            array('id' => '26','name' => 'Tasha Navarro','phone' => '56995452','email' => 'lacinia.orci.consectetuer@faucibus.org','birthdate' => '1948-04-26 18:31:33','address' => 'P.O. Box 936, 4729 Varius Road','city' => 'Villafranca Tirrena','zip' => '3673','country' => 'Slovakia'),
            array('id' => '27','name' => 'Kyle Vazquez','phone' => '51436732','email' => 'netus.et.malesuada@cursusetmagna.net','birthdate' => '2014-04-22 09:28:04','address' => '530-416 Orci. Ave','city' => 'Bankura','zip' => '61615','country' => 'Spain'),
            array('id' => '28','name' => 'Yoshi Alston','phone' => '24279477','email' => 'egestas.lacinia@auctorvitaealiquet.edu','birthdate' => '1943-12-25 16:20:06','address' => 'P.O. Box 819, 8801 Nunc Av.','city' => 'Vitrolles','zip' => '0518','country' => 'Cyprus'),
            array('id' => '29','name' => 'Anjolie Walton','phone' => '09477442','email' => 'Integer.vulputate.risus@auctorodio.com','birthdate' => '1952-05-21 19:43:40','address' => '560 Ante Street','city' => 'Fort Worth','zip' => '21303','country' => 'Namibia'),
            array('id' => '30','name' => 'Aidan Landry','phone' => '28944050','email' => 'nisl.sem@Ut.org','birthdate' => '1929-12-25 11:37:39','address' => '6609 Fusce Street','city' => 'Velden am Wörther See','zip' => '72131','country' => 'Faroe Islands'),
            array('id' => '31','name' => 'Carolyn Nolan','phone' => '19245316','email' => 'ipsum.Curabitur.consequat@gravidamolestiearcu.com','birthdate' => '1978-12-24 15:18:01','address' => 'P.O. Box 353, 7319 Tellus. Road','city' => 'Chesapeake','zip' => '5556','country' => 'Antarctica'),
            array('id' => '32','name' => 'Joshua Hayes','phone' => '36378155','email' => 'lacinia@et.edu','birthdate' => '1962-09-29 09:01:38','address' => 'P.O. Box 246, 2991 Sit Ave','city' => 'Lozzo Atestino','zip' => '01579-604','country' => 'Ecuador'),
            array('id' => '33','name' => 'Alika Leon','phone' => '26782647','email' => 'nec.euismod@venenatis.com','birthdate' => '2005-08-03 09:05:57','address' => '995-1562 Integer Rd.','city' => 'Ferrandina','zip' => '8144','country' => 'India'),
            array('id' => '34','name' => 'Chadwick Shaw','phone' => '32172031','email' => 'magna.sed.dui@rutrummagna.com','birthdate' => '1986-05-12 01:45:49','address' => 'Ap #794-5038 Aliquam Ave','city' => 'Eyemouth','zip' => '3758','country' => 'Faroe Islands'),
            array('id' => '35','name' => 'Delilah Barton','phone' => '55467767','email' => 'nunc@semNulla.com','birthdate' => '1978-05-15 12:05:50','address' => '700-5429 Mauris St.','city' => 'Gojra','zip' => '99231','country' => 'Lithuania'),
            array('id' => '36','name' => 'Margaret Simon','phone' => '04138132','email' => 'erat.Sed.nunc@etnetus.co.uk','birthdate' => '1990-05-19 07:18:37','address' => 'P.O. Box 185, 7857 Diam. Avenue','city' => 'Borchtlombeek','zip' => '974708','country' => 'Cuba'),
            array('id' => '37','name' => 'Hu Wright','phone' => '00176526','email' => 'auctor@etmagnis.edu','birthdate' => '1972-09-18 18:28:44','address' => 'P.O. Box 616, 6910 Neque Ave','city' => 'St. Albans','zip' => 'KU0W 6ID','country' => 'Germany'),
            array('id' => '38','name' => 'Yael Craft','phone' => '40455779','email' => 'non@risusquisdiam.net','birthdate' => '1992-09-08 22:43:44','address' => 'Ap #702-968 Sociosqu Avenue','city' => 'Val Rezzo','zip' => '50220','country' => 'Congo, the Democratic Republic of the'),
            array('id' => '39','name' => 'Victor Cole','phone' => '09287594','email' => 'mi.fringilla.mi@Curabiturconsequat.edu','birthdate' => '1986-11-07 15:27:34','address' => '1951 Donec Ave','city' => 'Witney','zip' => '71903','country' => 'Hungary'),
            array('id' => '40','name' => 'Marny Mcfarland','phone' => '83111690','email' => 'tempus.lorem.fringilla@sem.net','birthdate' => '1995-03-04 08:53:59','address' => 'Ap #668-1885 Molestie St.','city' => 'Tay','zip' => '54-725','country' => 'Nigeria'),
            array('id' => '41','name' => 'Acton Cline','phone' => '55345302','email' => 'velit.eget@mollisPhaselluslibero.co.uk','birthdate' => '1952-06-29 09:51:25','address' => '9575 Cursus Rd.','city' => 'Fabro','zip' => '10566','country' => 'Lesotho'),
            array('id' => '42','name' => 'Lana Parker','phone' => '86536290','email' => 'gravida.mauris@mifelis.com','birthdate' => '2013-12-11 13:42:35','address' => 'Ap #445-9427 Faucibus Rd.','city' => 'Speyer','zip' => '8981','country' => 'Paraguay'),
            array('id' => '43','name' => 'Fulton Ruiz','phone' => '71894675','email' => 'dui@sapienmolestie.co.uk','birthdate' => '1964-09-02 04:54:37','address' => 'P.O. Box 443, 9059 Ornare. Road','city' => 'Weelde','zip' => '8168','country' => 'Eritrea'),
            array('id' => '44','name' => 'Rinah Newton','phone' => '93868859','email' => 'pede.blandit@ante.net','birthdate' => '1997-12-18 21:58:46','address' => 'P.O. Box 353, 5122 Placerat, Avenue','city' => 'Novo Hamburgo','zip' => '24-580','country' => 'Moldova'),
            array('id' => '45','name' => 'Ebony Schultz','phone' => '08289323','email' => 'arcu.eu@magna.co.uk','birthdate' => '2002-06-08 05:31:48','address' => '223-3904 Nunc Avenue','city' => 'Monte Giberto','zip' => '5841','country' => 'Martinique'),
            array('id' => '46','name' => 'Patrick Davidson','phone' => '62205179','email' => 'Aliquam.adipiscing.lobortis@natoquepenatibuset.net','birthdate' => '1938-04-11 17:56:34','address' => '723-5060 Mollis Avenue','city' => 'Rio Saliceto','zip' => 'R6B 0C1','country' => 'Ecuador'),
            array('id' => '47','name' => 'Octavius Hunter','phone' => '58749208','email' => 'at.iaculis.quis@laciniamattis.ca','birthdate' => '1995-01-31 13:42:20','address' => '643-1608 Molestie Road','city' => 'Tongeren','zip' => '37601','country' => 'Tokelau'),
            array('id' => '48','name' => 'Francesca Ayers','phone' => '97417516','email' => 'pellentesque.a.facilisis@dictumPhasellusin.com','birthdate' => '1948-04-17 16:30:20','address' => '5390 Metus Avenue','city' => 'Naarden','zip' => '4582DZ','country' => 'Venezuela'),
            array('id' => '49','name' => 'Genevieve Becker','phone' => '23290386','email' => 'sem.consequat.nec@neque.ca','birthdate' => '1981-12-21 22:38:56','address' => 'P.O. Box 763, 2454 Quis, Avenue','city' => 'Stamford','zip' => '46621','country' => 'Slovenia'),
            array('id' => '50','name' => 'Karleigh Faulkner','phone' => '90802624','email' => 'Curabitur@tincidunt.edu','birthdate' => '1979-09-28 21:17:02','address' => 'P.O. Box 456, 9828 Felis St.','city' => 'Inveraray','zip' => '3279','country' => 'Azerbaijan'),
            array('id' => '51','name' => 'Alexandra Stephens','phone' => '15771105','email' => 'non.lobortis.quis@semper.org','birthdate' => '1967-04-04 02:35:54','address' => '333-3714 Lobortis St.','city' => 'Balsas','zip' => '38628','country' => 'Georgia'),
            array('id' => '52','name' => 'Addison Shaw','phone' => '84806499','email' => 'nisl@ametfaucibus.co.uk','birthdate' => '1934-10-26 22:55:40','address' => '3538 Sit Av.','city' => 'Radom','zip' => '40-962','country' => 'United Kingdom (Great Britain)'),
            array('id' => '53','name' => 'Uriel Albert','phone' => '50342278','email' => 'lacinia.vitae.sodales@posuerevulputatelacus.ca','birthdate' => '2009-05-06 14:29:00','address' => 'P.O. Box 858, 258 Ligula St.','city' => 'Bad Vilbel','zip' => '29019','country' => 'Indonesia'),
            array('id' => '54','name' => 'Alfreda Marshall','phone' => '98585048','email' => 'blandit@leoelementum.net','birthdate' => '1997-12-08 22:40:53','address' => 'P.O. Box 659, 2399 Orci Rd.','city' => 'Mezzana','zip' => '423891','country' => 'Ethiopia'),
            array('id' => '55','name' => 'Kerry Ware','phone' => '59287997','email' => 'eget.tincidunt.dui@ipsum.com','birthdate' => '1986-03-30 09:07:16','address' => '7852 Est, Rd.','city' => 'Gignod','zip' => '9566','country' => 'Cuba'),
            array('id' => '56','name' => 'Yvonne Shepard','phone' => '05764149','email' => 'turpis.non.enim@mattisornarelectus.edu','birthdate' => '2014-06-05 15:39:10','address' => '5073 Odio. Road','city' => 'Ludwigsburg','zip' => '23911','country' => 'Trinidad and Tobago'),
            array('id' => '57','name' => 'Emery Marquez','phone' => '22319149','email' => 'nunc.sed@velarcu.edu','birthdate' => '1950-02-11 01:54:06','address' => '8894 Enim. Road','city' => 'Olsztyn','zip' => '261554','country' => 'Estonia'),
            array('id' => '58','name' => 'Connor Mason','phone' => '87214926','email' => 'sem.consequat@auguescelerisque.edu','birthdate' => '2006-03-26 15:34:21','address' => 'P.O. Box 710, 6622 Lacinia. Rd.','city' => 'Schonebeck','zip' => '34193','country' => 'Dominican Republic'),
            array('id' => '59','name' => 'Nomlanga Hines','phone' => '17255032','email' => 'sodales.elit@urnajusto.edu','birthdate' => '2003-05-08 06:23:23','address' => 'Ap #977-7236 Curabitur Avenue','city' => 'Germersheim','zip' => '11611','country' => 'Saint Martin'),
            array('id' => '60','name' => 'Leslie Barry','phone' => '46655513','email' => 'conubia.nostra@neceuismodin.net','birthdate' => '2000-10-14 21:37:01','address' => '3601 Et Rd.','city' => 'Cairo Montenotte','zip' => '7753','country' => 'Costa Rica'),
            array('id' => '61','name' => 'Breanna Tanner','phone' => '01712982','email' => 'nisi.dictum.augue@fermentum.org','birthdate' => '1959-09-11 16:20:34','address' => 'Ap #876-7065 Volutpat. St.','city' => 'Esneux','zip' => '8842','country' => 'Greece'),
            array('id' => '62','name' => 'Lilah Berg','phone' => '98550757','email' => 'pede.Suspendisse.dui@nisisem.edu','birthdate' => '1931-06-21 21:12:49','address' => 'Ap #520-2825 Per St.','city' => 'Oetingen','zip' => '7910','country' => 'Saint Barthélemy'),
            array('id' => '63','name' => 'Shaeleigh Frazier','phone' => '16176306','email' => 'ut@ullamcorperDuiscursus.co.uk','birthdate' => '1977-08-12 09:52:21','address' => 'Ap #186-3018 Vestibulum Avenue','city' => 'Cape Breton Island','zip' => '23217','country' => 'Guinea'),
            array('id' => '64','name' => 'Vincent Knox','phone' => '86024902','email' => 'rutrum.eu@etmagnisdis.co.uk','birthdate' => '1937-03-31 12:07:08','address' => '555-712 Mauris Rd.','city' => 'Sobral','zip' => '71800','country' => 'Saint Barthélemy'),
            array('id' => '65','name' => 'Bradley Ballard','phone' => '52759964','email' => 'cursus.in.hendrerit@eratEtiam.net','birthdate' => '1961-05-26 00:43:24','address' => 'Ap #790-3924 Libero. Street','city' => 'Lower Hutt','zip' => 'G0W 6GH','country' => 'Gibraltar'),
            array('id' => '66','name' => 'Meghan Mcconnell','phone' => '79704209','email' => 'Donec.egestas@velsapien.org','birthdate' => '1941-03-30 08:01:27','address' => 'P.O. Box 729, 9040 Velit. Rd.','city' => 'Kakinada','zip' => '5700','country' => 'Bouvet Island'),
            array('id' => '67','name' => 'Hermione Sosa','phone' => '65680722','email' => 'Fusce.feugiat.Lorem@orciconsectetuer.org','birthdate' => '1986-05-23 01:01:55','address' => 'P.O. Box 849, 8239 Euismod Rd.','city' => 'San Fele','zip' => '9767','country' => 'Nigeria'),
            array('id' => '68','name' => 'Xena Dunlap','phone' => '09249098','email' => 'semper.dui.lectus@sociisnatoque.net','birthdate' => '1997-06-27 04:19:04','address' => 'P.O. Box 686, 9921 Neque. St.','city' => 'Peine','zip' => '3340','country' => 'Malawi'),
            array('id' => '69','name' => 'Nathaniel David','phone' => '92219223','email' => 'velit.justo@Duissitamet.org','birthdate' => '1960-06-03 22:52:14','address' => '3838 Fringilla St.','city' => 'San Luca','zip' => 'IT4P 3BO','country' => 'Lesotho'),
            array('id' => '70','name' => 'Emily Gilliam','phone' => '68154419','email' => 'porttitor.eros@adipiscingelitAliquam.com','birthdate' => '2011-11-06 22:14:10','address' => '264-7487 Scelerisque Rd.','city' => 'Couthuin','zip' => '6743','country' => 'Falkland Islands'),
            array('id' => '71','name' => 'Cyrus Bernard','phone' => '34350888','email' => 'eget.laoreet@auctornuncnulla.ca','birthdate' => '1938-07-19 23:19:38','address' => 'Ap #302-3629 Per Avenue','city' => 'Kimberly','zip' => 'I9 7CA','country' => 'Cocos (Keeling) Islands'),
            array('id' => '72','name' => 'Jacqueline Harrington','phone' => '57864616','email' => 'imperdiet@mauris.ca','birthdate' => '1992-12-07 04:46:18','address' => '243-1551 Vel, St.','city' => 'Springdale','zip' => '432098','country' => 'Austria'),
            array('id' => '73','name' => 'Dieter Gordon','phone' => '79046576','email' => 'fermentum.vel@turpisnon.edu','birthdate' => '1993-01-25 19:39:42','address' => 'Ap #911-9792 Donec Avenue','city' => 'Bocchigliero','zip' => '48801-792','country' => 'British Indian Ocean Territory'),
            array('id' => '74','name' => 'Roary Miller','phone' => '61203967','email' => 'dictum@Intinciduntcongue.org','birthdate' => '1964-07-31 05:51:45','address' => '818-9835 Egestas. Ave','city' => 'Oromocto','zip' => '84211','country' => 'Panama'),
            array('id' => '75','name' => 'Audra Cohen','phone' => '36446053','email' => 'interdum@nisi.ca','birthdate' => '1940-04-08 20:35:09','address' => '5476 In Av.','city' => 'Giustino','zip' => '20012','country' => 'Niue'),
            array('id' => '76','name' => 'Selma Wilkins','phone' => '36573299','email' => 'ac.eleifend.vitae@egetmollislectus.com','birthdate' => '1949-04-16 15:08:10','address' => '446-1423 Tellus. St.','city' => 'Ilhéus','zip' => '23226-426','country' => 'Bosnia and Herzegovina'),
            array('id' => '77','name' => 'Natalie Clayton','phone' => '41710122','email' => 'Suspendisse@elitCurabitur.co.uk','birthdate' => '1937-12-19 18:12:32','address' => 'P.O. Box 649, 2410 Posuere, Ave','city' => 'Woodlands County','zip' => '67-597','country' => 'United States'),
            array('id' => '78','name' => 'Whilemina Blake','phone' => '53640171','email' => 'mauris.Integer@erategettincidunt.org','birthdate' => '1986-02-26 02:40:17','address' => 'P.O. Box 829, 3480 Sed Street','city' => 'Wimborne Minster','zip' => '7143FJ','country' => 'Serbia'),
            array('id' => '79','name' => 'Quon Leach','phone' => '04302413','email' => 'ut@Sed.com','birthdate' => '1937-06-08 03:31:41','address' => 'Ap #542-5037 Erat Avenue','city' => 'Montreuil','zip' => '1717','country' => 'Saint Barthélemy'),
            array('id' => '80','name' => 'Justina Green','phone' => '60727820','email' => 'sem.consequat.nec@Suspendissenon.edu','birthdate' => '1995-07-14 14:53:15','address' => '406-5942 Libero Rd.','city' => 'Archennes','zip' => '4739','country' => 'French Southern Territories'),
            array('id' => '81','name' => 'Dillon White','phone' => '28680611','email' => 'nisi@inmagnaPhasellus.ca','birthdate' => '1969-03-10 22:43:38','address' => 'P.O. Box 635, 5402 Sagittis Rd.','city' => 'Luino','zip' => 'K3S 2L6','country' => 'Rwanda'),
            array('id' => '82','name' => 'Kelsie Stout','phone' => '80610909','email' => 'ultrices@aceleifendvitae.edu','birthdate' => '1930-11-03 20:18:50','address' => 'P.O. Box 413, 9648 Facilisis Avenue','city' => 'Montelupo Fiorentino','zip' => '44784','country' => 'South Georgia and The South Sandwich Islands'),
            array('id' => '83','name' => 'Melyssa Conley','phone' => '30627892','email' => 'justo@commodo.net','birthdate' => '2005-02-21 18:48:07','address' => 'P.O. Box 797, 6623 Pharetra St.','city' => 'Piegaro','zip' => '96906','country' => 'Rwanda'),
            array('id' => '84','name' => 'Tara Adams','phone' => '30659637','email' => 'ut.nisi@inmolestie.co.uk','birthdate' => '1998-11-24 04:57:08','address' => 'P.O. Box 198, 9829 A, Rd.','city' => 'Grivegnée','zip' => '61204','country' => 'Moldova'),
            array('id' => '85','name' => 'Charlotte Potter','phone' => '96497665','email' => 'tellus@mauris.edu','birthdate' => '2012-06-29 09:26:23','address' => '131-7202 Quisque Ave','city' => 'Cavallino','zip' => '5535','country' => 'Guatemala'),
            array('id' => '86','name' => 'Darrel Phelps','phone' => '44613477','email' => 'Morbi.non.sapien@vehicula.net','birthdate' => '1991-06-13 02:08:32','address' => '2483 Eu Ave','city' => 'Motta Sant\'Anastasia','zip' => '4426','country' => 'Falkland Islands'),
            array('id' => '87','name' => 'Cathleen Figueroa','phone' => '21066490','email' => 'cursus@quispedeSuspendisse.net','birthdate' => '1987-10-08 20:48:28','address' => 'Ap #164-1308 Egestas Avenue','city' => 'Melton','zip' => '06059-951','country' => 'Cuba'),
            array('id' => '88','name' => 'Jaime Chen','phone' => '11268397','email' => 'vehicula@egetmagna.org','birthdate' => '1962-07-02 16:09:11','address' => '771-7186 Odio Ave','city' => 'St. Albans','zip' => '12084','country' => 'Hungary'),
            array('id' => '89','name' => 'Thomas Herman','phone' => '32488754','email' => 'mauris.Suspendisse@nonvestibulum.edu','birthdate' => '1934-03-26 01:59:33','address' => '944-6333 Aliquam St.','city' => 'Moignelee','zip' => '29462','country' => 'Uganda'),
            array('id' => '90','name' => 'Dorian Oneil','phone' => '64202469','email' => 'eleifend.non@Crasdictum.org','birthdate' => '1961-12-18 13:59:08','address' => 'P.O. Box 296, 8166 Consequat St.','city' => 'Belsele','zip' => '6914','country' => 'Costa Rica'),
            array('id' => '91','name' => 'Len Gardner','phone' => '00929373','email' => 'Nulla.tempor.augue@arcu.co.uk','birthdate' => '1940-10-14 09:41:02','address' => '361-7170 Eget Rd.','city' => 'Aurora','zip' => '8852','country' => 'Niue'),
            array('id' => '92','name' => 'Mariam Moore','phone' => '55797759','email' => 'justo.Praesent.luctus@vehicula.net','birthdate' => '1933-09-14 19:29:09','address' => '8571 Neque. St.','city' => 'Pizzoferrato','zip' => '56247','country' => 'Dominica'),
            array('id' => '93','name' => 'Dennis Whitaker','phone' => '19943321','email' => 'Suspendisse.non@necanteMaecenas.org','birthdate' => '2000-06-09 09:26:23','address' => '4232 Dapibus Rd.','city' => 'Roccamena','zip' => '54871','country' => 'Portugal'),
            array('id' => '94','name' => 'Jorden Hayes','phone' => '12971125','email' => 'in@consectetueradipiscing.co.uk','birthdate' => '1955-04-21 18:38:10','address' => 'Ap #927-3425 Nunc. Avenue','city' => 'Mondolfo','zip' => 'M1 5SE','country' => 'Nauru'),
            array('id' => '95','name' => 'Eden Montoya','phone' => '94125294','email' => 'massa.Integer.vitae@egetlaoreetposuere.edu','birthdate' => '1938-08-26 02:51:09','address' => '5024 Magna. St.','city' => 'North Vancouver','zip' => '50017','country' => 'New Caledonia'),
            array('id' => '96','name' => 'Meghan Dunn','phone' => '77554921','email' => 'eu.lacus.Quisque@nequeSedeget.edu','birthdate' => '2002-11-29 07:04:34','address' => '7021 Nunc Ave','city' => 'Overrepen','zip' => '9278','country' => 'Denmark'),
            array('id' => '97','name' => 'Emmanuel Blackburn','phone' => '21666111','email' => 'nec@natoque.co.uk','birthdate' => '1929-11-08 13:20:19','address' => '2483 Ante Av.','city' => 'Saint-Dié-des-Vosges','zip' => '67875','country' => 'Kuwait'),
            array('id' => '98','name' => 'Montana Marshall','phone' => '38759355','email' => 'Donec.est@NullamnislMaecenas.net','birthdate' => '1993-05-07 21:30:16','address' => 'Ap #342-1551 Velit Rd.','city' => 'Douai','zip' => '32267','country' => 'Barbados'),
            array('id' => '99','name' => 'Serena Evans','phone' => '66725220','email' => 'lorem.lorem.luctus@sociisnatoque.ca','birthdate' => '1970-04-20 08:35:09','address' => 'Ap #884-5121 Erat, St.','city' => 'Barasat','zip' => '47689','country' => 'Dominican Republic'),
            array('id' => '100','name' => 'Paula Mays','phone' => '37744075','email' => 'Nullam.velit.dui@disparturient.ca','birthdate' => '1929-12-21 09:27:08','address' => '559-3561 Tincidunt Rd.','city' => 'Raipur','zip' => '1604','country' => 'Bouvet Island')        
        );
    }
    
    static protected function action_detail() {
        $request = new \Request();
        $all = self::getAll();
        $detail = FALSE;
        foreach ($all as $row) {
            if ($row['id'] == $request->id) {
                $detail = $row;
                break;
            }
        }
        $response = new \Response();
        $response->setResponse($detail === FALSE ? array() : $detail);
        return $response;
    }
    
    static protected function action_store() {
        $response = new \Response();
        $response->setWarningMessage(NULL, "Sorry, this is a demo version. The person can't be stored!");
        return $response;
    }    
    
    static protected function action_suggestions() {
        $request = new \Request();
        $suggestions = array();
        $keyword = strtolower($request->query);
        $all = self::getAllSortedRows('name', '1');
        foreach ($all as $row) {
            $name = strtolower($row['name']);
            if (strpos($name, $keyword) !== FALSE) {
                $row['value'] = $row['id'];
                $row['label'] = $row['name'];
                $row['extra'] = $row['city'];
                $suggestions[] = $row;
            }
            if (count($suggestions) === 10) {
                break; // Max 10 suggestions
            }
        }        
        $response = new \Response();
        $response->setResponse($suggestions);
        return $response;
    }
}
