-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 23 déc. 2022 à 13:30
-- Version du serveur : 5.7.33
-- Version de PHP : 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `author` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `chapo` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL,
  `maj_date` datetime DEFAULT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `author`, `title`, `chapo`, `content`, `creation_date`, `maj_date`, `picture`) VALUES
(1, 1, 'Solo vincens fretum erectus quam circumcluditur ab Alpes pertulit incunabulis.', 'Huius De ut ais sic facta iam ob rem autem ne Apollo ut laudantur ut Catoni sapientissimum quidem habetote ob.', 'Ego vero sic intellego, Patres conscripti, nos hoc tempore in provinciis decernendis perpetuae pacis habere oportere rationem. Nam quis hoc non sentit omnia alia esse nobis vacua ab omni periculo atque etiam suspicione belli?\n                            ', '2022-10-20 13:59:43', '2022-10-26 15:59:43', '1.jpg'),
(2, 3, 'Romani tamen pacataeque sint cum.\r\n', 'Circummurana tempus pueritiae et ab virum ingressus virum aerumnas aetatem.\r\n', 'Mensarum enim voragines et varias voluptatum inlecebras, ne longius progrediar, praetermitto illuc transiturus quod quidam per ampla spatia urbis subversasque silices sine periculi metu properantes equos velut publicos signatis quod dicitur calceis agitant, familiarium agmina tamquam praedatorios globos post terga trahentes ne Sannione quidem, ut ait comicus, domi relicto. quos imitatae matronae complures opertis capitibus et basternis per latera civitatis cuncta discurrunt.\r\n\r\n', '2022-10-20 23:14:35', '2022-10-21 01:27:46', '2.jpg'),
(3, 1, 'Et benevolentiam in magnae ut.', 'Cum quanta quo dignitatemque quidem in multis et multis te.', 'Veri fas et et consideratione internarum et lituis quam et a detortum necessario reieci saeviebat rapinarum velut cum noxiorum vel.', '2022-08-16 21:37:34', '2022-08-16 21:37:34', '3.jpg'),
(4, 1, 'Omnes esse abes quod quantum.', 'Quae quae oblatrantibus semper exitialis accitus foveis discriminis reclamans ductor.', 'Cognitis enim pilatorum caesorumque funeribus nemo deinde ad has stationes appulit navem, sed ut Scironis praerupta letalia declinantes litoribus Cypriis contigui navigabant, quae Isauriae scopulis sunt controversa.', '2022-05-12 22:32:45', '2022-09-30 12:38:36', '4.jpg'),
(5, 1, 'Indicat pelagi efficaciae auxit limes.', 'Intellegi ut hoc omnis autem infinita contracta humani caritas amicitiae.', 'Quid enim tam absurdum quam delectari multis inanimis rebus, ut honore, ut gloria, ut aedificio, ut vestitu cultuque corporis, animante virtute praedito, eo qui vel amare vel, ut ita dicam, redamare possit, non admodum delectari? Nihil est enim remuneratione benevolentiae, nihil vicissitudine studiorum officiorumque iucundius.', '2022-05-12 23:05:56', '2022-09-30 12:38:39', '5.jpg'),
(6, 1, 'Indicat pelagi efficaciae auxit limes.', 'Pudor illum sum istam nostro decebat potissimum tuli male robustioribus.', 'Ciliciam vero, quae Cydno amni exultat, Tarsus nobilitat, urbs perspicabilis hanc condidisse Perseus memoratur, Iovis filius et Danaes, vel certe ex Aethiopia profectus Sandan quidam nomine vir opulentus et nobilis et Anazarbus auctoris vocabulum referens, et Mopsuestia vatis illius domicilium Mopsi, quem a conmilitio Argonautarum cum aureo vellere direpto redirent, errore abstractum delatumque ad Africae litus mors repentina consumpsit, et ex eo cespite punico tecti manes eius heroici dolorum varietati medentur plerumque sospitales.', '2022-05-12 23:16:29', '2022-09-30 12:38:42', '6.jpg'),
(7, 1, 'Dixistis certe iudicium sentiant quid.', 'Admodum ergo eventu redeundum plebem innumeram cum est agi agi.', 'Haec igitur lex in amicitia sanciatur, ut neque rogemus res turpes nec faciamus rogati. Turpis enim excusatio est et minime accipienda cum in ceteris peccatis, tum si quis contra rem publicam se amici causa fecisse fateatur. Etenim eo loco, Fanni et Scaevola, locati sumus ut nos longe prospicere oporteat futuros casus rei publicae. Deflexit iam aliquantum de spatio curriculoque consuetudo maiorum.', '2022-05-12 23:16:29', '2022-09-30 12:38:44', '7.jpg'),
(8, 3, 'Quaeritatum portenderetur tempore reus postulatus.', 'Tamen captis tamen consumendo iam captis angebat navigiis tamen Isauri.', 'Illud tamen te esse admonitum volo, primum ut qualis es talem te esse omnes existiment ut, quantum a rerum turpitudine abes, tantum te a verborum libertate seiungas; deinde ut ea in alterum ne dicas, quae cum tibi falso responsa sint, erubescas. Quis est enim, cui via ista non pateat, qui isti aetati atque etiam isti dignitati non possit quam velit petulanter, etiamsi sine ulla suspicione, at non sine argumento male dicere? Sed istarum partium culpa est eorum, qui te agere voluerunt; laus pudoris tui, quod ea te invitum dicere videbamus, ingenii, quod ornate politeque dixisti.\n                            ', '2022-05-12 23:20:54', '2022-09-30 12:38:51', '8.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `author` int(11) DEFAULT NULL,
  `date_of_post` datetime NOT NULL,
  `content` text NOT NULL,
  `valid` tinyint(1) NOT NULL,
  `article` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `author`, `date_of_post`, `content`, `valid`, `article`) VALUES
(1, 1, '2022-10-20 23:12:07', 'Domi per velut varias ne longius opertis quod quod urbis metu sine et subversasque sine ampla silices tamquam capitibus metu.', 1, 3),
(2, 1, '2022-10-20 23:12:07', 'Cum serium similiaque pendentem ergo est ergo haec plebem quodam plebem cum memorabile videre curulium vel memorabile eventu ardore est.\r\n\r\n', 1, 6),
(3, 5, '2022-10-20 23:16:40', 'Amicitia si habuit debeat rem.', 1, 2),
(4, 6, '2022-10-20 23:16:40', 'Nec nunc Nec insignem iustum necessariam senatusque se nunc Nec virgines civitate dictionem omitto dictionem.\r\n\r\n', 1, 7),
(5, 1, '2022-10-20 23:17:54', 'Audeamus modo audeamus ad monendum causa adhibitae adsit prima semper suadentium et bene amicitiae sed.\r\n\r\n', 1, 8),
(6, 4, '2022-10-20 23:17:54', 'Quanta me offensionibus in actae te gravissimo cum ante cum multis doloribus est actae tanta.\r\n\r\n', 1, 5),
(7, 5, '2022-10-20 23:19:03', 'Erubesceret cum Reguli absentia inops.', 1, 1),
(8, 3, '2022-10-20 23:19:03', 'Vestri ductante commeatus ductante commeatus.', 1, 4),
(9, 6, '2022-10-20 23:20:38', 'Illius utroque De sic quem quem cave autem sapientissimum ais cave habetote cum istum enim.\r\n\r\n', 0, 7),
(10, 6, '2022-10-20 23:20:38', 'Observentur aurum tutius inpigre manibus.\r\n\r\n', 0, 7),
(11, 5, '2022-10-20 23:20:38', 'Fines humilia flagrans loqui eius missa permissus pseudothyrum Alexandrini reginae omnino autem inter nec supergressa.\r\n\r\n', 0, 1),
(12, 4, '2022-10-20 23:20:38', 'Multos sit sit honeste quod.\r\n\r\n', 0, 6),
(30, 4, '2022-10-20 23:50:35', 'Magna abundans magna est nitidis Ascalonem quasdam et terris Caesaream velut egregias aevo Caesaream Neapolim.\r\n\r\n', 1, 8),
(31, 5, '2022-10-20 23:50:35', 'Ut convictus noxiarum Lollianus et lanuginis flammam descripsisse in in et et consulari fumo hos.\r\n\r\n', 1, 8),
(32, 1, '2022-11-03 14:13:03', 'Virium autem caritatis quaerant magis quaerant minimumque mulierculae locum breviter.', 0, 1),
(33, 1, '2022-11-03 14:13:43', 'Festinatis relationibus cum Antiochiam palatii festinatis sed Caesare videri supervacua.', 0, 2),
(34, 1, '2022-11-03 14:18:26', 'Successorio ut protentus Persidis Nicator Nicator magnum fluminis cum et.', 0, 1),
(35, 1, '2022-11-03 14:20:55', 'Successorio ut protentus Persidis Nicator Nicator magnum fluminis cum et.', 0, 1),
(36, 1, '2022-11-03 14:23:33', 'Servilio iugum lingua lingua factae ob eoo mixtae provinciae piratico.', 0, 1),
(37, 1, '2022-11-03 14:26:07', 'Apud elegerit futura eos id semper mercenariae ardore futura statum.', 0, 1),
(38, 1, '2022-11-03 14:33:43', 'Carinae eadem mari Iovis insulam mari templo autem Paphus eadem.', 0, 8),
(39, 1, '2022-11-03 14:37:47', 'Iudex esset periere aurem agenda aurem reginae interrogationibus magister et.', 0, 7),
(40, 1, '2022-11-03 14:41:05', 'Praedoctis iam imperio aurem obiecta notarii diluere nec interrogationibus subinde.', 0, 8),
(41, 1, '2022-11-03 14:42:58', 'Impotentia formula non iam supergressa ad iam monili pretioso id.', 0, 1),
(42, 1, '2022-11-03 14:45:12', 'Petobionem interiectis cum domesticis ubi viam nec spoliari sunt imperio.', 0, 1),
(43, 1, '2022-11-03 14:46:38', 'aaaaaaaaaaaaaaaaa', 0, 8),
(44, 1, '2022-11-03 14:55:00', 'aaaaaaaaaaaa', 0, 1),
(45, 1, '2022-11-03 15:13:13', 'ssssssssss', 0, 1),
(46, 1, '2022-11-03 15:18:52', 'DDDDDDDDDDDDDD', 0, 1),
(47, 1, '2022-11-03 15:41:15', 'aaaaaaaaaaaaa', 0, 2),
(48, 1, '2022-11-03 17:24:43', 'zzzzzzzzzzzzzzz', 0, 2),
(49, 1, '2022-11-03 18:15:20', 'zzzzzzzzzzzzzzz', 0, 2),
(50, 1, '2022-11-03 18:15:29', 'aaaaaaaaaa', 0, 2),
(51, 1, '2022-11-03 18:16:37', 'aaaaaaaa', 0, 7),
(52, 1, '2022-11-03 18:19:50', 'aaaaaaaaaa', 0, 8),
(53, 1, '2022-11-03 18:21:09', 'fd', 0, 1),
(54, 1, '2022-11-03 18:28:47', 'aaaaaaaaaa', 0, 2),
(55, 1, '2022-11-03 18:30:14', 'ddddddddddd', 0, 1),
(56, 1, '2022-11-03 18:31:44', 'ssssssssssssss', 0, 2),
(57, 1, '2022-11-03 18:40:39', 'ssssssssss', 0, 2),
(58, 1, '2022-11-03 18:41:29', 'aaaaaaaaaaaaaaa', 0, 1),
(59, 1, '2022-11-03 18:42:59', 'aaaa', 0, 8),
(60, 1, '2022-11-03 18:44:03', 'dream', 0, 7),
(61, 1, '2022-11-03 18:45:53', 'sssssssssssssssssssssssss', 0, 7),
(62, 1, '2022-11-03 19:11:39', 'AAAAAAAAAAAAAAAAAAA', 0, 2),
(63, 1, '2022-11-04 08:09:19', 'AAAAAAAAAA', 0, 2),
(64, 1, '2022-11-04 08:12:08', 'zzzzzzzzzzzzzzz', 0, 2),
(65, 1, '2022-11-04 08:13:36', 'ddzaqzd', 0, 8),
(66, 1, '2022-11-04 08:14:45', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa', 0, 8),
(67, 1, '2022-11-04 08:14:57', 'aaaaaaaaaaa', 0, 2),
(68, 1, '2022-11-04 08:16:06', 'aaaaaaa', 0, 2),
(69, 1, '2022-11-04 08:19:15', 'aaaaaaa', 0, 2),
(70, 1, '2022-11-04 08:19:17', 'aaaaaaa', 0, 2),
(71, 1, '2022-11-04 08:19:39', 'aaaaaaa', 0, 2),
(72, 1, '2022-11-04 08:19:55', 'eeeeeeeeeeeeeeeeeee', 0, 2),
(73, 1, '2022-11-10 20:16:14', 'ddddddddddddddddddddd', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `valid` tinyint(1) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `valid`, `admin`) VALUES
(1, 'NTaoussi', 'Nassim-taoussi@hotmail.com', '$2y$10$H6rWe7slzXQX9Nsvqins8OFtc0u3KmhDk8wZ/yo1zEZFD7GUVjr7C', 1, 1),
(3, 'Fisher', 'sam@gmail.com', '$2y$10$Bwydv64sQqkjXAgq1KinO.y.UL2zhypV/xOFcczZk6EvP3EIWZbJy', 1, 1),
(4, 'AdamJensen', 'adam@gmail.com', '$2y$10$n4kEwNfxAu.E4PGVy1wgp.fVhEgQwuFzMlg.hrBE0LgkduUG7BEJe', 1, 0),
(5, 'Tintin', 'tintin@gmail.com', '$2y$10$.jgVALtjVjx2cK3EYK2EGeTmrbt6enZ5pTEn4LmTLQjXQ/xZjZTP6', 1, 0),
(6, 'Nano', 'nano__@outlook.fr', '$2y$10$kM4.vbEBovYO1hdd1PBsHOtanu/3TGJdC3y7ke3QjFWqPfhkgpCLq', 1, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_AUTHOR_ARTICLE` (`author`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_AUTHOR` (`author`),
  ADD KEY `FK_ARTICLE` (`article`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK_AUTHOR_ARTICLE` FOREIGN KEY (`author`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_ARTICLE` FOREIGN KEY (`article`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_AUTHOR` FOREIGN KEY (`author`) REFERENCES `user` (`id`);
COMMIT;
