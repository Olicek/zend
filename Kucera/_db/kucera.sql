-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Počítač: localhost
-- Vygenerováno: Pon 17. pro 2012, 21:47
-- Verze MySQL: 5.5.24-log
-- Verze PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databáze: `kucera`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `zam_categorylist`
--

CREATE TABLE IF NOT EXISTS `zam_categorylist` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) COLLATE utf8_czech_ci NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=5 ;

--
-- Vypisuji data pro tabulku `zam_categorylist`
--

INSERT INTO `zam_categorylist` (`id`, `title`, `published`) VALUES
(2, 'Zámky', 1),
(3, 'Vložky', 1),
(4, 'Samozavírače', 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `zam_images`
--

CREATE TABLE IF NOT EXISTS `zam_images` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_czech_ci NOT NULL,
  `path` varchar(30) COLLATE utf8_czech_ci NOT NULL,
  `product_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_images` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=28 ;

--
-- Vypisuji data pro tabulku `zam_images`
--

INSERT INTO `zam_images` (`id`, `name`, `path`, `product_id`) VALUES
(1, 'product_1.jpg', '/images/slozka/', 10),
(2, 'product_2.jpg', '/images/slozka/', 11),
(3, 'product_3.jpg', '/images/slozka/', 12),
(4, 'product_4.jpg', '/images/slozka/', 13),
(5, 'product_5.jpg', '/images/slozka/', 14),
(6, 'product_6.jpg', '/images/slozka/', 15),
(7, 'product_7.jpg', '/images/slozka/', 16),
(8, 'product_8.jpg', '/images/slozka/', 17),
(9, 'product_9.jpg', '/images/slozka/', 18),
(10, 'product_10.jpg', '/images/slozka/', 19),
(11, 'product_11.jpg', '/images/slozka/', 20),
(12, 'product_12.jpg', '/images/slozka/', 21),
(13, 'product_13.jpg', '/images/slozka/', 22),
(14, 'product_14.jpg', '/images/slozka/', 23),
(15, 'product_15.jpg', '/images/slozka/', 24),
(16, 'product_16.jpg', '/images/slozka/', 25),
(17, 'product_17.jpg', '/images/slozka/', 26),
(18, 'product_18.jpg', '/images/slozka/', 27),
(19, 'product_19.jpg', '/images/slozka/', 28),
(20, 'product_20.jpg', '/images/slozka/', 29),
(21, 'product_21.jpg', '/images/slozka/', 30),
(22, 'product_22.jpg', '/images/slozka/', 31),
(23, 'product_23.jpg', '/images/slozka/', 32),
(24, 'product_24.jpg', '/images/slozka/', 33),
(25, 'product_25.jpg', '/images/slozka/', 34),
(26, 'product_26.jpg', '/images/slozka/', 35),
(27, 'product_27.jpg', '/images/slozka/', 37);

-- --------------------------------------------------------

--
-- Struktura tabulky `zam_product`
--

CREATE TABLE IF NOT EXISTS `zam_product` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `text` text COLLATE utf8_czech_ci NOT NULL,
  `price` int(6) NOT NULL,
  `created` datetime DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `productlist_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order` (`productlist_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=46 ;

--
-- Vypisuji data pro tabulku `zam_product`
--

INSERT INTO `zam_product` (`id`, `title`, `description`, `text`, `price`, `created`, `published`, `productlist_id`) VALUES
(10, 'P 100', 'Dveřní zavírač', 'Regulace fáze doklepu a zavírání\r\nMožnost montáže na P i L dveře\r\nMožná „obrácená“ montáž\r\nVhodný pro exteriér i interiér\r\nProvedení v barvě bílé, stříbrné, zlaté a hnědé', 1607, '2012-04-17 23:09:38', 1, 7),
(11, 'D80', 'Dveřní zavírač', 'Atraktivní vzhled vhodný pro vybavení interiéru i exteriéru\r\nPro použití na dřevěné, kovové a plastové dveře\r\nMožnost oboustranné montáže\r\nStálá rychlost zavírání bez ohledu na roční období\r\nV provedení se stavěčem zajišťuje dveře v otevřené poloze\r\nPět velikostí v barvě stříbrné', 2256, '2012-04-17 23:11:36', 1, 7),
(12, 'P 100 L', 'Zavírač dveří s pákou v liště', 'Regulace fáze doklepu a zavírání\r\nMožnost montáže na P i L dveře\r\nVhodný pro exteriér i interiér\r\nVhodný zvláště do prostor s nízkým stropem a se zvýšeným požadavkem na design prostoru\r\nProvedení v barvě bílé, stříbrné, zlaté a hnědé (na zakázku možno i jiné odstíny)\r\n', 2249, '2012-04-17 23:13:42', 1, 7),
(13, 'TS 83', 'Dveřní zavírač', 'Pastorkový dveřní zavírač Dorma TS 83 je vhodný pro interiérové i exteriérové nepožární i požární dveřní křídla o max. hmotnosti cca 110 kg ( 150 kg ) a max. šířce cca 1400 mm (mezní parametry dveří jsou orientační, vždy záleží na poměru hmotnosti, šířky, polohy a četnosti používání dveří). Síla zavírače v rozmezí EN 3-6 ( EN 7 ) je plynule regulovatelná z boku zavírače, rychlost zavírání v intervalech 180°- 0°a 15°- 0°je plynule regulovatelná ventily a koncový doraz lze regulovat pomocí ramínka. Zavírač Dorma TS 83 je vybaven inteligentním tlumením otevírání, což ho předurčuje k použití na exteriérových dveřích. Na objednávku lze dodat tento zavírač ve verzi se zpožděním zavírání.\r\n\r\nDveřní zavírač Dorma TS 83 je certifikován dle EN 1154 ( CE ) a podle bodu 4.5 této normy je charakterizován jako vhodný pro použití na požárních a kouřotěsných sestavách.\r\n\r\n \r\n', 2990, '2012-04-17 23:17:48', 1, 6),
(14, 'Ts 72', 'Dveřní zavírač', 'Pastorkový dveřní zavírač Dorma TS 72 je vhodný pro interiérové nepožární i požární dveřní křídla o max. hmotnosti cca 80 kg a max. šířce cca 1000 mm (mezní parametry dveří jsou orientační, vždy záleží na poměru hmotnosti, šířky, polohy a četnosti používání dveří). Síla zavírače v rozmezí EN 2-4 je plynule regulovatelná z boku zavírače, rychlost zavírání v intervalech 180°- 0°a 15°- 0° je plynule regulovatelná ventily a koncový doraz lze regulovat pomocí ramínka.\r\n\r\nDveřní zavírač Dorma TS 72 je certifikován dle EN 1154 ( CE ) a podle bodu 4.5 této normy je charakterizován jako vhodný pro použití na požárních a kouřotěsných sestavách.\r\n\r\n \r\n\r\n ', 1575, '2012-04-17 23:21:31', 1, 6),
(15, 'Ts 68', 'Dveřní zavírač', 'Pastorkový dveřní zavírač Dorma TS 68 je vhodný pro interiérové nepožární dveřní křídla o max. hmotnosti cca 50 kg a max. šířce cca 900 mm (mezní parametry dveří jsou orientační, vždy záleží na poměru hmotnosti, šířky, polohy a četnosti používání dveří). Síla zavírače v rozsahu EN 2/3/4 je nastavitelná polohou zavírače na dveřním křídle, rychlost zavírání v intervalech 180°- 0°a 15°- 0° je plynule regulovatelná ventily a koncový doraz lze regulovat pomocí ramínka.\r\n\r\nDveřní zavírač Dorma TS 68 je certifikován dle EN 1154 ( CE ).\r\n', 1164, '2012-04-17 23:24:05', 1, 6),
(16, 'Boxer', 'Integrovaný samozavírač', 'Samozavírač GEZE Boxer je celý zabudováný v křídle dveří, kluzná vodicí lišta je tedy  viditelná pouze při otevření\r\ndveří. Systém použitelný pro jedno i dvoukřídlové dveře nabízí variabilní nastavení v zabudovaném stavu.', 7632, '2012-04-17 23:29:37', 1, 8),
(17, 'TS5000', 'Dveřní zavírač', '    Variabilní síla zavírání ve dvou velikostech nastavitelná jednoduchým otočením upevňovací hlavice ramínka.\r\n    zepředu nastavitelná,termostabilní rychlost zavírání\r\n    čisté provedení tvarových linií\r\n    nastavitelný hydraulický koncový doraz\r\n    normální montáž na dveřní křídlo i montáž na zárubeň je možná\r\n    zavírač a lišta k dodání v následujících barevných provedeních: stříbrná, tmavá bronz, bílá,RAL-barvy dle volby.\r\n', 6890, '2012-04-17 23:34:20', 1, 8),
(18, 'TS2000', 'Dveřní zavírač', '    variabilní síla zavírání velikost 2/4/5\r\n    pouze jedna velikost těla zavírače\r\n    zepředu nastavitelná rychlost zavírání\r\n    nastavení koncového dorazu na ramínku\r\n    estetické provedení ramínka\r\n    zavírač a ramínko k dodání v následujících barevných provedeních: stříbrná, tmavá bronz, bílá,RAL-barvy dle volby.\r\n', 2519, '2012-04-17 23:36:41', 1, 8),
(19, 'delete', 'Cilindrick� dve�n� vlo�ka', '� dle normy �SN P ENV 1627 je tento v�robek certifikov�n v bezpe�nostn� t��d� 2\r\n� d�lky cylindrick� vlo�ky 59 mm a 64,5 mm\r\n� povrchov� �prava: t�leso � mosaz nebo sat�nov� nikl (ozna�en� N)\r\n� standardn� dod�v�na se t�emi kl��i \r\n''; DELETE FROM zam_product WHERE id = 38', 147, '2012-12-16 05:46:18', 1, 1),
(20, 'Fab 1000', 'Dveřní vložka s knoflíkem', '• dle normy ČSN P ENV 1627 je tento výrobek certifikován v bezpečnostní třídě 3\r\n• splňuje požadavky NBÚ „uzamykací systém typ 2“ dle zákona 148/98 Sb.\r\n• průmyslový vzor č. 32168 a ochranná známka č. 250389\r\n• právní ochrana profilu klíče proti neoprávněnému kopírování\r\n• možnost sjednocení na společný uzávěr (označení SU) s výrobky FAB 1000 a 1001\r\n• kompatibilní se všemi standardními typy kování\r\n• vhodná pro standardní i atypické tloušťky dveří\r\n• délka cylindrické vložky od 59 mm\r\n• umožňuje nezávislé odemykání z obou stran i při zasunutém a pootočeném klíči\r\n• kovový knoflík má průměr 30 mm – typ K (upevněný šroubem)\r\n• povrchová úprava: těleso i kovový knoflík – saténový nikl (označení N)\r\n• dodávána s pěti klíči a bezpečnostní kartou ', 690, '2012-04-17 23:43:38', 1, 1),
(21, 'FAB 200', 'Cilindrická dveřní vložka', 'dle normy ČSN P ENV 1627 je tento výrobek certifikován v bezpečnostní třídě 3\r\n• splňuje požadavky NBÚ „uzamykací systém typ 2“ dle zákona 148/98 Sb.\r\n• možnost sjednocení na společný uzávěr (označení SU) s výrobky FAB 201 a 202\r\n• délka cylindrické vložky od 59 do 135 mm\r\n• provedení R1 – po štíty R1\r\n• na zakázku je možné vyrobit cylindrickou vložku s ozubeným kolem (10 nebo 12 zubů)\r\n• povrchová úprava: těleso – mosaz nebo lesklý nikl (označení Nb)\r\n• standardně dodávána se třemi klíči a identifikační kartou ', 480, '2012-04-17 23:45:20', 1, 1),
(22, 'Golem 70', 'Visací zámek', '    vysoce bezpečnostní visací zámek zařazen zkušebním ústavem do 4. bezpečnostní třídy dle ČSN P ENV\r\n    lze sjednocovat u klíčových služeb\r\n\r\n    mechanismus je uzamčen pomocí otočných stavítek a je tak zabezpečen proti bumpingu, vyhmatání a odvrtání a zaručuje spolehlivost v extrémních klimatických podmínkách\r\n    krytý, kalený, oboustranně jištěný oblouk ø 13mm, zvýšená odolnost proti přestřihnutí, přeřezání a vypáčení\r\n    těleso z chrommanganové kalené oceli povrchově cementované, odolné proti hrubému násilí, vrtání, rozbití\r\n    náhradní klíče dodává firma TOKOZ nebo její smluvní partneři po předložení identifikačního štítku\r\n    doporučené použití s petlicí TOKOZ BP GOLEM nebo s řetězem ø 12mm\r\n', 1859, '2012-04-17 23:49:00', 1, 2),
(23, 'Beta 50', 'Visací zámek', '    možnost systému stejného uzávěru\r\n    plné mosazné těleso zámku zaručuje vysokou korozní odolnost\r\n    povrchová úprava - saténový nikl\r\n    chromovaný kalený oblouk ø 8 mm má zvýšenou odolnost proti přestřihnutí, přeřezání a vypáčení\r\n    oblouk oboustranně jištěný\r\n    oblouk odskočí otočením klíče\r\n    uzamčení zámku zatlačením oblouku bez použití klíče\r\n    velikost: 50 mm\r\n', 227, '2012-04-17 23:49:55', 1, 2),
(24, 'Delta 20/3', 'Číselný visací zámek', '    mosazné tělo zámku\r\n    číselný kód - 1.000 kombinací\r\n    z výroby nastavená kombinace 0-0-0\r\n    možnost nastavení vlastní kombinace zvyšuje bezpečnost zámku\r\n    vhodný k uzamykání zavazadel\r\n', 81, '2012-04-17 23:51:11', 1, 2),
(25, 'MT5+', 'Zámková vložka', 'Zamykací systém tvořen kombinací tří nezávislých mechanismů\r\n• Zdvojená teleskopická stavítka ovládaná důlkovou částí klíce\r\n• Blokovací lišta ovládaná hadovitým zářezem v klíči\r\n• Speciálně tvarované „utopené“ stavítko ovládané pohyblivým \r\nprvkem ve hrotu klíče (patent. pending, do roku 2025) ', 3303, '2012-04-17 23:54:44', 1, 9),
(26, 'Cliq standard', 'Mechatronická vložka', '    patentově chráněná technologie společnosti ASSA ABLOY\r\n    kontaktní čipové zařízení s kryptovaným přenosem dat (3DES).\r\n    motorické ovládání blokovací lišty ve vložce\r\n    Po zasunutí klíče dojde k výměně elektronické informace (obr. 1),\r\n    uvolnění blokovací lišty a poté zelená LED kontrolka (obr. 2)  indikuje, \r\n    že je možné otočit klíčem (obr. 3).\r\n', 12356, '2012-04-17 23:59:26', 1, 9),
(27, 'C serie', 'Visací zámek', 'Těleso: Cementovaná ocel. Třmen: Legovaná ocel tvrzená bórem.  Disk z tvrzené oceli nebo speciální stavítka (E-8) ve vložce zajištují odolnost proti odvrtání. Ochranný protiprachový kryt klíčového otvoru chrání před znečištění prachem. Odvodňovací otvory brání zamrznutí.', 1003, '2012-04-18 00:02:40', 1, 9),
(28, '536', 'Zámek zadlabací 90/80', 'dvouzápadový • bez převodu\r\n• otvory pro dělené štíty\r\n✱✱ rozměr ořechu 8 x 8 mm platí pro\r\nvšechny zámky\r\n• 1 klíč', 110, '2012-04-18 00:13:24', 1, 11),
(29, '540', 'Zámek zadlabací 90/80', 'jednozápadový • bez převodu\r\n• otvory pro dělené štíty\r\n✱ 540.4 ořech 4 x 4 mm\r\n540.5 ořech 5 x 5 mm\r\n540 ořech 6 x 6 mm\r\n540.7 ořech 7 x 7 mm\r\n540.8 ořech 8 x 8 mm', 100, '2012-04-18 00:14:22', 1, 11),
(30, '545', 'Zámek zadlabací 90/80', 'jednozápadový\r\n• otvory pro dělené štíty\r\n✱ 545.4 ořech 4 x 4 mm\r\n545.5 ořech 5 x 5 mm\r\n545 ořech 6 x 6 mm\r\n545.7 ořech 7 x 7 mm\r\n545.8 ořech 8 x 8 mm', 98, '2012-04-18 00:15:06', 1, 11),
(31, 'FAB 05131', 'Zámek zadlabací', '    rozteč 90 mm, hloubka zádlabu 63 mm, šířka čela 20 mm\r\n    dvouzápadový, pravo-levý\r\n    přeměnu zámku z pravého na levý a naopak umožňuje dělená střelka. Pouhým povolením příslušného šroubu se hlava střelky uvolní, vysune, otočí o 180°, nasune zpět na vodítko střelky a šroubem se utáhne.\r\n    oválný otvor v krycí i základní desce o průměru 8 mm umožňuje použítí bezpečnostních štítů, které se upevňují pomocí 3 šroubů nebo v novějším provedení 1 šroubem a 2 svorníky\r\n\r\n', 123, '2012-04-18 00:19:37', 1, 13),
(32, 'FAB 05140', 'Zámek zadlabací', '    splňuje požadavky NBÚ dle zákona 148/98 Sb v kategorii „důvěrné“\r\n    rozteč 90 mm, hloubka zádlabu 80 mm, šířka čela 20 mm (18) mm\r\n    dvouzápadový, pravo-levý\r\n    otvory v bočních deskách o průměru 7 mm umožňují použití dvoudílného kování přeměnu zámku z pravého na levý a naopak umožňuje dělená střelka. Povolením příslušného šroubu se hlava střelky uvolní, vysune, otočí o 180°, nasune zpět na vodítko střelky a šroubem se utáhne.\r\n    zámek je testován na boční tlak na závoru 6 kN\r\n    oválný otvor v krycí i základní desce o průměru 9 mm umožňuje použítí bezpečnostních štítů, které se upevňují pomocí 3 šroubů nebo v novějším provedení 1 šroubem a 2 svorníky\r\n    doraz kliky (proti protočení ořechu)\r\n    paralelní chod s dveřními zavírači FAB\r\n    dle normy EN 12209 certifikován v BT 3\r\n\r\n', 143, '2012-04-18 00:21:27', 1, 13),
(33, 'FAB 5200', 'Mezipokojový zadlabávací zámek', '    rozteč 90 mm, hloubka zádlabu 60 mm, šířka čela 20 mm\r\n    jednozápadový, pravo-levý\r\n    určen pro dveře bez zvýšeného nároku na bezpečnost\r\n    určen pro jedno i dvoukřídlové dveře, pravé i levé\r\n    přeměnu zámku z pravého na levý a naopak umožňuje dělená střelka. Pouhým povolením příslušného šroubu se hlava střelky uvolní, vysune, otočí o 180°, nasune zpět na vodítko střelky a šroubem se utáhne.\r\n    otvory v bočních deskách o průměru 7 mm umožňují použítí dvoudílného kování (rozetové)\r\n    dodáván s jedním klíčem\r\n\r\n', 121, '2012-04-18 00:23:02', 1, 13),
(34, '771', 'Zámek zadlabací', '- rozteč 72 mm\r\n\r\n- uzavřená schránka zámku pozinkovaná\r\n\r\n- střelka a západka poniklované\r\n\r\n- dvouzápadový (20 mm)\r\n\r\n- šířka čela 20 mm (falcové) nebo 24 mm (bezfalcové) - hrany ostré nebo zaoblené\r\n\r\n- ořech pro čtyřhran 8x8 mm\r\n\r\n- vzdálenost čela od osy kliky 55 mm, zádlab 85 mm\r\n\r\n- zámek pravolevý', 125, '2012-04-18 00:28:15', 1, 14),
(35, '773', 'Zámek zadlabací obyčejný', '- rozteč 72 mm\r\n\r\n- uzavřená schránka zámku pozinkovaná\r\n\r\n- střelka a západka poniklované\r\n\r\n- dvouzápadový (20 mm)\r\n\r\n- šířka čela 20 mm (falcové) nebo 24 mm (bezfalcové) - hrany ostré nebo zaoblené\r\n\r\n- ořech pro čtyřhran 8x8 mm\r\n\r\n- vzdálenost čela od osy kliky 55 mm, zádlab 85 mm\r\n\r\n- 1 klíč\r\n\r\n- zámek pravolevý\r\n\r\n''; DELETE FROM zam_product WHERE id = 38', 128, '2012-12-16 03:48:24', 1, 14),
(37, '775', 'Zámek zadlabací wc', '- rozteč 78 mm\r\n\r\n- uzavřená schránka zámku pozinkovaná\r\n\r\n- střelka a západka poniklované\r\n\r\n- jednozápadový (10 mm)\r\n\r\n- šířka čela 20 mm (falcové) nebo 24 mm (bezfalcové) hrany ostré nebo zaoblené\r\n\r\n- ořech pro čtyřhran 8x8 mm\r\n\r\n- vzdálenost čela od osy kliky 55 mm, zádlab 85 mm\r\n\r\n- zámek pravolevý', 122, '2012-12-16 03:57:13', 1, 14),
(45, 'fdsa', 'ds', 'fsd', 25, '2012-12-16 05:32:22', 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `zam_productlist`
--

CREATE TABLE IF NOT EXISTS `zam_productlist` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `categorylist_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order` (`categorylist_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=15 ;

--
-- Vypisuji data pro tabulku `zam_productlist`
--

INSERT INTO `zam_productlist` (`id`, `title`, `published`, `categorylist_id`) VALUES
(1, 'FAB', 1, 3),
(2, 'TOKOZ', 1, 3),
(6, 'Dorma', 1, 4),
(7, 'Brano', 1, 4),
(8, 'Geze', 1, 4),
(9, 'MUL - T - LOCK', 1, 3),
(11, 'HOBES', 1, 2),
(13, 'FAB', 1, 2),
(14, 'Dorma', 1, 2);

-- --------------------------------------------------------

--
-- Struktura tabulky `zam_users`
--

CREATE TABLE IF NOT EXISTS `zam_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8_czech_ci NOT NULL,
  `password` char(128) COLLATE utf8_czech_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_czech_ci NOT NULL,
  `role` varchar(20) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=22 ;

--
-- Vypisuji data pro tabulku `zam_users`
--

INSERT INTO `zam_users` (`id`, `username`, `password`, `name`, `role`) VALUES
(1, 'Admin', 'cf835de3d4ea01367c45e412e7a9393a85a4e40af149ed8c3ed6c37c05b67b27813d7ff8072c1035cedd19415adf17128d63186f05f0d656002b0ca1c34f44a0', 'Administrátor', 'administrator'),
(2, 'Oli', '2a7bcb5bacee183a838715d188224608111443bf14a66b07f8578c18ef975a56b0f07667625c8d397f2c3a010197df0f131a1a0b91740bb24e16ef95b6291897', 'Petr Olišar', 'administrator'),
(4, 'Petr_5', '18eda165c703e9643f3e6003dd5f99eadf69c8ab6c2e483cd1b8164a3e6e44223f41ea7dc6846796c5324ae5453271b5913df8085cae093cd8a1c74d2e3fe9bf', 'Petr Kučera', 'moderator'),
(5, 'uz1', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'uzivatel', 'registered'),
(6, 'uz2', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'uzivatel', 'registered'),
(7, 'uz3', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'uzivatel', 'registered'),
(8, 'uz4', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'uzivatel', 'registered'),
(9, 'uz5', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'uzivatel', 'registered'),
(10, 'uz6', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'uzivatel', 'registered'),
(11, 'uz7', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'uzivatel', 'registered'),
(12, 'uz8', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'uzivatel', 'registered'),
(13, 'uz9', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'uzivatel', 'registered'),
(14, 'uz10', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'uzivatel', 'registered'),
(15, 'uz11', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'uzivatel', 'registered'),
(16, 'uz12', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'uzivatel', 'registered'),
(17, 'uz13', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'uzivatel', 'registered'),
(18, 'uz14', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'uzivatel', 'registered'),
(19, 'uz15', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'uzivatel', 'registered'),
(20, 'uz16', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'uzivatel', 'registered'),
(21, 'uz 17', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'uzivatel', 'registered');

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `zam_images`
--
ALTER TABLE `zam_images`
  ADD CONSTRAINT `fk_product_images` FOREIGN KEY (`product_id`) REFERENCES `zam_product` (`id`);

--
-- Omezení pro tabulku `zam_product`
--
ALTER TABLE `zam_product`
  ADD CONSTRAINT `fk_productlist` FOREIGN KEY (`productlist_id`) REFERENCES `zam_productlist` (`id`);

--
-- Omezení pro tabulku `zam_productlist`
--
ALTER TABLE `zam_productlist`
  ADD CONSTRAINT `fk_categorylist` FOREIGN KEY (`categorylist_id`) REFERENCES `zam_categorylist` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
