-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2022 at 05:56 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `river_cruise_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_page`
--

CREATE TABLE `about_page` (
  `id` int(11) NOT NULL,
  `history_caption` varchar(255) NOT NULL,
  `history_heading` varchar(255) NOT NULL,
  `history_description` text NOT NULL,
  `history_image` varchar(255) NOT NULL,
  `project_founder_heading` varchar(255) NOT NULL,
  `project_founder_description` text NOT NULL,
  `project_founder_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_page`
--

INSERT INTO `about_page` (`id`, `history_caption`, `history_heading`, `history_description`, `history_image`, `project_founder_heading`, `project_founder_description`, `project_founder_image`) VALUES
(1, 'Learn San Carlos River Cruise history', 'About us', 'The &#039;BigBird&#039; that could take you into an enjoyable river cruise is situated at the wharf of Sto. San Carlos, Bgy Bacungan, Puerto Princesa City. The tour may start at 10am with a cultural dance performed by the community members. A welcome drink is served upon boarding the raft, and the community guide, Mariam, is always ready to share the knowledge on the impact and benefits of the mangroves to the ecosystems. In one corner is tatay Miro, our guitarist who is always ready to strum his instrument if you are on the mood to sing your hearts out. Truly educational, inspiring, fun and relaxing.', 'balsa.jpg', 'Meet our project founder', 'San Carlos River Cruise in Sitio San Carlos, Bgy. Bacungan, Puerto Princesa City is a community-based project founded by the ABS-CBN Lingkod Kapamilya Foundation. From the association of fisherfolks, it became a cooperative helping the housewives, fishermen and youth in the community. This project creates an impact to the environment, particularly to the protection of the 365 hectares of mangrove forests and the marine biodiversity located in the area.', 'sponsor.png');

-- --------------------------------------------------------

--
-- Table structure for table `about_page_staff`
--

CREATE TABLE `about_page_staff` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `staff_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_page_staff`
--

INSERT INTO `about_page_staff` (`id`, `name`, `description`, `staff_image`) VALUES
(1, 'Abdurahjid A. Ibrahim', 'He gathers and maintains the requisite equipment for each tour. He informs customers about the itinerary for each tour. He also plans the itineraries in accordance with weather forecasts and the length of each tour.', 'tourguide2.jpg'),
(3, 'Soledad A. Ibrahim', 'She greets and welcomes the guests all the time. Excellent conversational skills with a knack for storytelling that will entertain customers. She adheres to prescribed safety codes for everyone.', 'tourguide1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin_profile`
--

CREATE TABLE `admin_profile` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact_number` bigint(11) NOT NULL,
  `email` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_profile`
--

INSERT INTO `admin_profile` (`id`, `username`, `password`, `contact_number`, `email`) VALUES
(1, 'admin', '$2y$12$wRLuQWWtkW0/xNwjheqDduAaCPv7/I8Uh4ZMlW1usAzPWYJckBZ3a', 639976536913, 'sancarlosrivercruise@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `admin_queries`
--

CREATE TABLE `admin_queries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `Mailed` varchar(64) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_queries`
--

INSERT INTO `admin_queries` (`id`, `name`, `email`, `message`, `Mailed`) VALUES
(2, 'Baguyo Emerson', 'emersonbaguyo64@gmail.com', 'asdasdasdsa', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `admin_reservation`
--

CREATE TABLE `admin_reservation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` bigint(20) NOT NULL,
  `guest_number` int(11) NOT NULL,
  `date_of_arrival` varchar(255) NOT NULL,
  `type_of_service` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `Mailed` varchar(64) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_reservation`
--

INSERT INTO `admin_reservation` (`id`, `name`, `email`, `contact_number`, `guest_number`, `date_of_arrival`, `type_of_service`, `status`, `Mailed`) VALUES
(6, 'Emerson Solis Baguyo', 'emersonbaguyo64@gmail.com', 11, 11, '04/30/2022', 'River Cruise 200 per pax minimum of 10 - without food', 'Pending', 'No'),
(7, 'Baguyo Emerson', 'emersonbaguyo64@gmail.com', 948375643, 11, '05/30/2022', 'Firefly watching 600 per pax minimum of 10 (floating) minimum of 6 (boat)- with food', 'Pending', 'No'),
(8, 'Baguyo Emerson', 'emersonbaguyo64@gmail.com', 948375643, 11, '04/04/2022', 'Firefly watching 600 per pax minimum of 10 (floating) minimum of 6 (boat)- with food', 'Pending', 'Yes'),
(13, 'Emerson Solis Baguyo', 'emersonbaguyo64@gmail.com', 9303646430, 11, '06/03/2022', 'River Cruise 200 per pax minimum of 10 - without food', 'Success', 'Yes'),
(14, 'Emerson Solis Baguyo', 'emersonbaguyo64@gmail.com', 90909092, 11, '06/04/2022', 'birthday', 'Pending', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_page`
--

CREATE TABLE `gallery_page` (
  `id` int(11) NOT NULL,
  `gallery_image_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery_page`
--

INSERT INTO `gallery_page` (`id`, `gallery_image_name`) VALUES
(36, '1374380_457391281043751_1657740840_n.1649728600.jpg'),
(37, '1384245_463122803803932_2119515710_n.1649728600.jpg'),
(38, '1916219_939906859458855_79694242614897514_n.1649728600.jpg'),
(39, '10462836_597351143714430_4142702114881894976_n.1649728600.jpg'),
(40, '10610662_659583354157875_3562531820950457022_n.1649728600.jpg'),
(41, '10903821_755087027940840_2442937906861458484_o.1649728600.jpg'),
(42, '11115756_755085961274280_1187137474576425774_o.1649728600.jpg'),
(43, '11148479_755086691274207_1674795754265958495_o.1649728600.jpg'),
(44, '11149406_755085274607682_8984916895245155088_n.1649728600.jpg'),
(45, '11393185_779983655451177_3535042998636319039_n.1649728600.jpg'),
(46, '11828657_814007445382131_6160549134861427556_n.1649728600.jpg'),
(47, '11846558_814007492048793_2054482237324609078_n.1649728600.jpg'),
(48, '11846606_814007515382124_5765055507802151849_n.1649728600.jpg'),
(49, '12294675_865704543545754_1029914673513323979_n.1649728600.jpg'),
(50, '12401640_884619788320896_9081894920271908_o.1649728600.jpg'),
(51, '12473666_884620394987502_8861407140300631503_o.1649728600.jpg'),
(52, '12572985_1310146542344323_6332451485272110843_n.1649728600.jpg'),
(53, '12669559_898505180265690_3909105545705682556_n.1649728600.jpg'),
(54, '12920378_939906856125522_1351549574631779166_n.1649728600.jpg'),
(55, '12932579_939906866125521_6972983918303447345_n.1649728600.jpg'),
(56, '12967362_938120326304175_8524503614641869805_o.jpg'),
(57, '12973277_939902529459288_1907385216815156318_o.jpg'),
(58, '12974444_939901472792727_7385357082939801831_n.jpg'),
(59, '13227207_965434146906126_2014969729536178299_n.jpg'),
(60, '13240545_965434043572803_5986643802576446944_n.jpg'),
(61, '13245365_965433853572822_1348913429671984992_n.jpg'),
(62, '13245410_965433856906155_1692188113436622639_n.jpg'),
(63, '13256013_965433913572816_4976711819113354580_n.jpg'),
(64, '13256472_965422883573919_7557057926707312857_n.jpg'),
(65, '13260038_965433903572817_5555109762930993096_n.jpg'),
(66, '13263893_965422886907252_5741507607726478546_n.jpg'),
(67, '13418502_982393211876886_198008941037880884_o.jpg'),
(68, '13422312_982399555209585_8833291954652102837_o.jpg'),
(69, '13458788_982396951876512_8176849133044872892_o.jpg'),
(70, '13475144_987237608059113_6101179613705252471_o.jpg'),
(71, '13497846_987236791392528_5720186366131578294_o.jpg'),
(72, '13522721_987237384725802_7726405318036584662_o.jpg'),
(73, '13528092_987237591392448_7505167475130411101_o.jpg'),
(74, '13528211_987237391392468_2475281825824965143_o.jpg'),
(75, '13528370_987236801392527_7786661083728152804_o.jpg'),
(76, '13662165_1013719042077636_8880567813159578542_o.jpg'),
(77, '13920282_1013719165410957_7177727776634190730_o.jpg'),
(78, '13920372_1013719175410956_8799192206829731302_o.jpg'),
(79, '13923747_1013719038744303_1823467377416096429_o.jpg'),
(80, '19030523_1556013481181520_2430012200880680046_n.jpg'),
(81, '19060193_1556013417848193_2399137233346506539_n.jpg'),
(82, '19060196_1556013671181501_958282676396924440_n.jpg'),
(83, '19105573_1556013564514845_3868089788318000636_n.jpg'),
(84, '19113869_1556013787848156_1066160464644467668_n.jpg'),
(85, '19248042_1561598240623044_6310451016063119763_n.jpg'),
(86, '46970580_2162875617161967_2011767586299052032_n.jpg'),
(87, '47038508_2162873247162204_8239035312945233920_n.jpg'),
(88, '47038928_2162873240495538_6373808287049056256_n.jpg'),
(89, '47206829_2162873237162205_5489709906485313536_n.jpg'),
(90, '47302897_2162873243828871_6212011946976215040_n.jpg'),
(91, '54408528_2319674611482066_8083751311524233216_n.jpg'),
(92, '54436098_2319674438148750_7395179259821555712_n.jpg'),
(93, '54514975_2319671454815715_4768865930081992704_n.jpg'),
(94, '54518528_2319671308149063_8950731653253169152_n.jpg'),
(95, '54520127_2324396324343228_7870711480419614720_n.jpg'),
(96, '54521360_2319671671482360_8123242358989914112_n.jpg'),
(97, '54524704_2324396247676569_8555529421467942912_n.jpg'),
(98, '55451761_2319671158149078_4866765637965316096_n.jpg'),
(99, '55540711_2319674761482051_1776996058195296256_n.jpg'),
(100, '55680212_2337043389745188_949893933758939136_n.jpg'),
(101, '55822114_2337043326411861_4275515625339617280_n.jpg'),
(102, '55932424_2337043443078516_6025957017435242496_n.jpg'),
(103, '56381580_2337043606411833_2683303366754304000_n.jpg'),
(104, '56641448_2337043539745173_6242640282181959680_n.jpg'),
(105, '57576944_2367078066741720_1202164490066460672_n.jpg'),
(106, '58704248_2367097010073159_5442562714742292480_n.jpg'),
(107, '59177979_2386016204847906_4255217304956043264_n.jpg'),
(108, '59473950_2386016068181253_8662151898691796992_n.jpg'),
(109, '59908053_2386015988181261_1702473054145216512_n.jpg'),
(110, '64920187_2472133956236130_6700218938187317248_n.jpg'),
(111, '65013335_2472130449569814_1875148941515816960_n.jpg'),
(112, '65075119_2472134126236113_6102688278920560640_n.jpg'),
(113, '65423355_2472130569569802_1396067381419180032_n.jpg'),
(114, '89552335_2997598807022973_2170974125516914688_n.jpg'),
(115, '89714834_2997598957022958_8753398341456363520_n.jpg'),
(116, '209924874_4293007880815386_4872558201964050769_n.jpg'),
(117, '210103078_4293007570815417_4062243745629135653_n.jpg'),
(118, '211121511_4293008004148707_1891325198243450623_n.jpg'),
(119, '214791560_4292296927553148_5851758290324211580_n.jpg'),
(120, '215641538_4292296844219823_2977587796645099986_n.jpg'),
(122, '11846606_814007515382124_5765055507802151849_n.1649852421.jpg'),
(123, '12473666_884620394987502_8861407140300631503_o.1649852421.jpg'),
(124, '10610662_659583354157875_3562531820950457022_n.1649852515.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `guide_page`
--

CREATE TABLE `guide_page` (
  `id` int(11) NOT NULL,
  `health_guide` text DEFAULT NULL,
  `transport_guide` text DEFAULT NULL,
  `important_info` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guide_page`
--

INSERT INTO `guide_page` (`id`, `health_guide`, `transport_guide`, `important_info`) VALUES
(1, 'We at San Carlos River Cruise prioritize the health and safety of everyone by strictly adhering to the utmost standards of safety.', NULL, NULL),
(2, 'San Carlos River has increased its already-rigorous cleaning protocols. Surfaces are thoroughly treated with disinfectants and cleanings are conducted with increased frequency. All service professionals have received training on COVID-19 safety and sanitation protocols with more comprehensive training for our teams with frequent guest contact, tourist guide, public area departments, the operations and security.', NULL, NULL),
(3, 'Hand sanitizer is provided in public areas for service professionals. Shared tools and equipment is sanitized before, during and after each shift or anytime the equipment is transferred to a new service professional.', NULL, NULL),
(6, NULL, NULL, 'Tour Duration 3hrs to 4hrs.\\r\\nWHAT TO WEAR: Comfortable Clothes (Light Clothes)'),
(7, NULL, NULL, 'WHAT TO BRING: Insect Repellent lotion or spray Bottled, Water Waterproof bag to secure your electronic devices.'),
(9, NULL, 'San Carlos River Cruise is located at Barangay Bacungan. It&#039;s 45mins away from the main town of Puerto Princesa City and airport. The Cruise starts at Sitio San Carlos wharf.', NULL),
(10, NULL, 'For the guest commuters they may take a bus ride at the terminal near San Jose public market', NULL),
(13, 'Physical Distancing Guests are advised to practice physical distancing by standing at least six feet away from other groups of people.', NULL, NULL),
(15, NULL, 'For the guests who want to take a joy ride, they may take a car rental at the Brgy. San Miguel National highway. and use google maps for the best route.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `home_page_features`
--

CREATE TABLE `home_page_features` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `icon` varchar(64) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_page_features`
--

INSERT INTO `home_page_features` (`id`, `heading`, `icon`, `description`) VALUES
(1, 'Why choose bacungan river cruise as destination.', '', ''),
(2, NULL, '&lt;i class=&quot;fa fas fa-tree&quot;&gt;&lt;/i&gt;', 'Enjoying the natural nature with the hectares verdant of mangrove forest.'),
(3, NULL, '&lt;i class=&quot;fa fas fa-ship&quot;&gt;&lt;/i&gt;', 'River cruise on board a floating restaurant.'),
(4, NULL, '&lt;i class=&quot; fas fas fa-utensils&quot;&gt;&lt;/i&gt;', 'The sumptuous food and drinks prepared by the locals of San Carlos.'),
(8, NULL, '&lt;i class=&quot;fa fad fa-child&quot;&gt;&lt;/i&gt;', 'Be entertained to the cultural dance perform by the locals.');

-- --------------------------------------------------------

--
-- Table structure for table `home_page_features_img`
--

CREATE TABLE `home_page_features_img` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `img_name` varchar(255) NOT NULL,
  `img_caption` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_page_features_img`
--

INSERT INTO `home_page_features_img` (`id`, `heading`, `img_name`, `img_caption`) VALUES
(1, 'Don&#039;t have time for leisure? then, you are missing the beauty of San Carlos River Cruise.', '', '\r\n'),
(3, NULL, 'toting.jpg', 'Welcome dance'),
(4, NULL, 'firefly.jpg', 'Firefly watching'),
(5, NULL, 'balsa.jpg', 'Raft crusing'),
(7, NULL, 'guides.jpg', 'Kayaking');

-- --------------------------------------------------------

--
-- Table structure for table `home_page_intro`
--

CREATE TABLE `home_page_intro` (
  `id` int(11) NOT NULL,
  `intro_heading` varchar(255) NOT NULL,
  `intro_sub_heading` varchar(255) NOT NULL,
  `intro_image` varchar(255) DEFAULT NULL,
  `intro_button_name` varchar(255) NOT NULL,
  `intro_button_color` varchar(255) NOT NULL,
  `intro_button_icon` varchar(255) NOT NULL,
  `intro_button_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_page_intro`
--

INSERT INTO `home_page_intro` (`id`, `intro_heading`, `intro_sub_heading`, `intro_image`, `intro_button_name`, `intro_button_color`, `intro_button_icon`, `intro_button_link`) VALUES
(7, 'San Carlos River Cruise Bacungan', 'Why go far if you could find beauty and serenity 30 minutes away from your place?', 'totingF.jpg', 'About us', '#218838', '&lt;i class=&quot;fas fa-dove&quot;&gt;&lt;/i&gt;', 'about.html'),
(8, 'Eat and Drink', 'Experience river cruise on board a floating restaurant called &#039;BigBird&#039; that could take you into an enjoyable cruising and mangrove situated at the wharf of Sto. San Carlos.', 'secondPic.jpg', 'Our services', '#E0A800', '&lt;i class=&quot;fas fa-check&quot;&gt;&lt;/i&gt;', 'services.html'),
(9, 'KAYAKING', 'Enjoy and explore the amazing river at the Kayak. As you sail along the river in a paddle boat, you will be witnessing one of nature&#039;s wonders, the mangrove ecosystem of Sto. San Carlos', 'kayak.jpg', 'Contact us', '#C82333', '&lt;i class=&quot;fas fa-phone&quot;&gt;&lt;/i&gt;', 'contactUs.html');

-- --------------------------------------------------------

--
-- Table structure for table `home_page_reviews`
--

CREATE TABLE `home_page_reviews` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `author` varchar(255) NOT NULL,
  `review` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_page_reviews`
--

INSERT INTO `home_page_reviews` (`id`, `heading`, `author`, `review`) VALUES
(1, 'Guest reviews.', '', ''),
(2, NULL, 'Butch Dajao Hontanosas', 'Awesome place. Very nice. It took my breath away.!'),
(3, NULL, 'Clarita Skjolingstad', 'very beautiful place for tourist..'),
(4, NULL, 'Aries H Gobont', 'definitely i will recommended this totaly adventures of River Cruising at Bacungan San Carlos PPp.');

-- --------------------------------------------------------

--
-- Table structure for table `service_page_firefly_watching`
--

CREATE TABLE `service_page_firefly_watching` (
  `id` int(11) NOT NULL,
  `firefly_watching_description` text NOT NULL,
  `firefly_watching_services` text NOT NULL,
  `firefly_watching_image_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_page_firefly_watching`
--

INSERT INTO `service_page_firefly_watching` (`id`, `firefly_watching_description`, `firefly_watching_services`, `firefly_watching_image_name`) VALUES
(1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur ab voluptas veniam iusto atque. Non recusandae ea animi rerum saepe ut magni autem consequuntur temporibus!', 'Firefly watching 600 per pax minimum of 10 (floating) minimum of 6 (boat)- with food\\r\\nFirefly watching 250 per pax minimum of 10 (floating) minimum of 6 (boat)- without food', ''),
(2, '', '', '209924874_4293007880815386_4872558201964050769_n.1649898534.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `service_page_kayaking`
--

CREATE TABLE `service_page_kayaking` (
  `id` int(11) NOT NULL,
  `kayaking_description` text DEFAULT NULL,
  `kayaking_services` text DEFAULT NULL,
  `kayaking_image_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_page_kayaking`
--

INSERT INTO `service_page_kayaking` (`id`, `kayaking_description`, `kayaking_services`, `kayaking_image_name`) VALUES
(1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur ab voluptas veniam iusto atque. Non recusandae ea animi rerum saepe ut magni autem consequuntur temporibus!', 'Kayaking 150 per hour', ''),
(2, NULL, NULL, '10610662_659583354157875_3562531820950457022_n.1649852604.jpg'),
(4, NULL, NULL, '12572985_1310146542344323_6332451485272110843_n.1649898012.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `service_page_raft_crusing`
--

CREATE TABLE `service_page_raft_crusing` (
  `id` int(11) NOT NULL,
  `raft_crusing_description` text NOT NULL,
  `raft_crusing_services` text NOT NULL,
  `raft_crusing_image_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_page_raft_crusing`
--

INSERT INTO `service_page_raft_crusing` (`id`, `raft_crusing_description`, `raft_crusing_services`, `raft_crusing_image_name`) VALUES
(1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur ab voluptas veniam iusto atque. Non recusandae ea animi rerum saepe ut magni autem consequuntur temporibus!', 'River Cruise 500 per pax minimum of 10 - with food\\r\\nRiver Cruise 200 per pax minimum of 10 - without food', ''),
(2, '', '', '1374380_457391281043751_1657740840_n.1649895998.jpg'),
(4, '', '', '65013335_2472130449569814_1875148941515816960_n.1649897649.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_page`
--
ALTER TABLE `about_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_page_staff`
--
ALTER TABLE `about_page_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_profile`
--
ALTER TABLE `admin_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_queries`
--
ALTER TABLE `admin_queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_reservation`
--
ALTER TABLE `admin_reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_page`
--
ALTER TABLE `gallery_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guide_page`
--
ALTER TABLE `guide_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_page_features`
--
ALTER TABLE `home_page_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_page_features_img`
--
ALTER TABLE `home_page_features_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_page_intro`
--
ALTER TABLE `home_page_intro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_page_reviews`
--
ALTER TABLE `home_page_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_page_firefly_watching`
--
ALTER TABLE `service_page_firefly_watching`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_page_kayaking`
--
ALTER TABLE `service_page_kayaking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_page_raft_crusing`
--
ALTER TABLE `service_page_raft_crusing`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_page`
--
ALTER TABLE `about_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_page_staff`
--
ALTER TABLE `about_page_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin_profile`
--
ALTER TABLE `admin_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_queries`
--
ALTER TABLE `admin_queries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_reservation`
--
ALTER TABLE `admin_reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `gallery_page`
--
ALTER TABLE `gallery_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `guide_page`
--
ALTER TABLE `guide_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `home_page_features`
--
ALTER TABLE `home_page_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `home_page_features_img`
--
ALTER TABLE `home_page_features_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `home_page_intro`
--
ALTER TABLE `home_page_intro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `home_page_reviews`
--
ALTER TABLE `home_page_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `service_page_firefly_watching`
--
ALTER TABLE `service_page_firefly_watching`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service_page_kayaking`
--
ALTER TABLE `service_page_kayaking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `service_page_raft_crusing`
--
ALTER TABLE `service_page_raft_crusing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
