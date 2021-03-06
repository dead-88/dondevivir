-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-12-2016 a las 18:54:46
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dondevivir`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `id_cita` int(11) NOT NULL,
  `inmueble` int(11) NOT NULL,
  `fecha_hora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `id_foto` int(11) NOT NULL,
  `inmueble` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `usuario` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `foto` longblob NOT NULL,
  `alt` varchar(200) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id_horario` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `dia_semana` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `hora_inicio` varchar(5) COLLATE utf8_spanish2_ci NOT NULL,
  `hora_fin` varchar(5) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmueble`
--

CREATE TABLE `inmueble` (
  `id_inmueble` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `categoria` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo_vivienda` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo_piso` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `ancho_terreno` decimal(10,0) NOT NULL,
  `largo_terreno` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo_pared` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `numero_plantas` int(11) NOT NULL,
  `cantidad_baños` int(11) NOT NULL,
  `ubicacion` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `precio` decimal(20,0) NOT NULL,
  `disponible` varchar(2) COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'si'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `cedula` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `celular` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `foto` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `cedula`, `telefono`, `celular`, `email`, `pass`, `foto`) VALUES
(1, 'diana lasso mejia', '1093745199', '5785416', '3001234568', 'diana@live.es', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0xffd8ffe000104a46494600010100000100010000ffdb0084000906071010100f1010120f150f101015151515150f0f101515151515161615151515181d2820181a251b151521312125292b2e2e2e171f3338332c37282d2e2b010a0a0a0e0d0e181010182d1d201d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2b2d2d2d2d2b2d2d2d2d2d2b2d2d2d2d2b2d2d2d2b2d2d2d2d2d2d2d2d2d2dffc000110800b0011e03012200021101031101ffc4001c0000010501010100000000000000000000010002030405060708ffc4003e10000201020304070603070305000000000001020311041221053141510613226171819132a1b1c1d1f00714e1234352627282921542f1243393a2b2ffc400190101000301010000000000000000000000000102040305ffc4002511010003000105000104030000000000000001021103122131415122046191a1131432ffda000c03010002110311003f00f42b8ae32e2b9e7369f715c65c57083ee2b8cb8ae303ee0b8db8ae303ae2b8cb8ae303ee2b8cb8ae3019cadaf05a943fd5949da9c6725cd45a5e4de85d90c5491318855788acf74631ef72bbf45f51aa8d49fb527f05e85e54d0eca4e98c8db0e34a8cb2aed356bf1d4cc5562a0b8ce4ed15dfb97d7c8bdd2a56a37fe68fc5183b32bba95535ba0acb9667c4e958fc746474fabda583a0b59a6db4bc2cbe2707b79b759ab6ee0b5fb675bb72a2abb474d5518a4df37bdb32764e0bf33b521092ecc679e4bba3aebe7637714f4d77e46b3f247576fb2f40e82ec5fcb61a0e4bf6b51294bbafb91d35c8e22933ceb5a6d3332db5ac563212e7239542194863b95c4e24731ae43181b24455a7c0cac7256767ef34aac8cbc5c13d743a555972bb5e9496ff00febea72d88938c9f23b5da5878c93dc9f99c7e3a8e56d68cdfc32c9cb08d34d770a572bd29657dc59ee3b4b8449aa777dff1fd4913f4657acb912539dd263028bb589a2f8104d5ae3e94f4d3efefe62487d1398598688f19b8fb8330d100eb8b30d100eb8b30d000fb8b30c1041d70e6182b80fb82e34403d483988ee4588aea0aef57c12dedf2406674b257a0e0bdb96eeeb6adbee4733b0eba8cb27f2df9789d7fe4dca151d4b759522d69ba2b8457deacf2ec7579d3ebacde6849c7d6e9fbcd1c51b1d2acce25d9f522e78bad2b5bb524fcf4571bf86917531789acf7a8a5fe4dfd0ad2a1fb3853bbc96cd2b7176bebee363f0ba876713539d44bd17ea77e4edc76569def577d16171b811246563cf6c31d31ae03a7581981a8e51209a2d674c8a68914e654c4413e45dab1209c4b4225858bc227c8e5f6b60ed7b7c0edf1345eb6b9ce6d28b774ede86ae2b7770e4ab8cab45fde80a726b497a9671af2be256a9bb32f336c4eb14c6257de3141af060a73be8f7924676762436af06369bb5ec4f521d9d352abd08825f480ac38478ade6d8561e201960587d85608c32c2b0fb0ac138658561f6058230db02c3ec0b030db0ac478ac42a6b74a527ba3157937ddcbc5e854eab1157da92a30fe18353a8fc67ba3e49f893884b89c6283c914e755ee82dfe2dee8aef62c2e1657cf55a751f2f660b947ebc49b0b848535682b73dedb7cdb7ab7e24f61bf0c36c7947e21e19d1c53b690ae94bc5dfb5f27e67ad1c0fe29e1e53586508ddc33cdd95da8c63af96a8edfa79cbab7f0e3b15894a1249feeecbbf325f43b8e81e1552c152bfb552f37fdcf4f758f31a9533658ae291e89b0f6ac32c295d7622a3bf92347ea2b3d1908e198ea74f2ad639bdafd2754744aefed1a93aba1c76d5c276db7aae466e2ad667bbbf24ce764353a4d8ba8fb1a77246becea38aaa94aa569478db430d578c376f2ed2c749eb7668b78fc631cab1dfbcba2ea6ac7754cdffabf716a389ab15ada5e767639d8ed1e659a5b597338cd65da221b34b68426edba5c9e9efe24ce48c475a153c79a7665fa13ba5777effbe2526ab46acca9dccbda7818cd3e66ac5915781113924c6bccf6e6cecadb8eefbe06560d5f345f23b4e9151b5daf4395a74d29b6b95bd4f478efb560e4a6599f3bc5b5c891cd3b5fd797e82c52e3cbe044f71ddc27b2cd2aad683e595f25e3bbc8a7467c1ee256f9fa9130b44f67d2561587e51653c3d7a18658361f945620c3004994194186087e516506182b0fb02c0c32c263ac2b13a62154f5bf124b0eb086a30db06c1b0ac0032b68e1e33c451525752a5561fe4a37f81af633b6b2cb2a153f86aa4fc249c7e689af944c767846ddc1bc357a9478d29b4bc13ecbf4b16f01d9c95633d6c9b5de5efc4eb7e7eadbf8637f1b1cce0b1728e9bcf5e36d48964d8adf1e99b3b6875b1b2f696f450dad196a56e8a51a92c4d15d9d5f69295ed1b6b73acdaf804ef6461b652edf59eaabcf2b697b8ed9b38c9beb2b75715a2b24dbf3e06a6d1d8ce77deadc51c957c2ca955c9af8b35532f1e59b936b3b8eb7abc2db4c44affd71f83441528b5ac2ad39af1cafe273f3a1171ed359b925764b82d9ca4d7b56eebfae84ff008e23da2396d33e1bf87c534edc79277373075a4cadb27654124934df8af79d0e1f02919392d1e9ae9139dc2836c966891d3b15f13888c1769a4fdefc11c7caf30c0e90d3d2eb81c4d6694b4dd76cecf69ca7554b471877fb4fcb8238cc7692b71377078c63e78f6a753e24112593d6dddf7f118b79ae18e51b567e04f25a777d48a68b187d63eefa7cc491f1f4a8883ae175c7838f4f538883ad0f5a30d4a218aa07300e10330ae01103303300e05819819807581606606608110dcc2b921e8abb528b9d1a915ed65baf15aa27cc2cc210f0be9bd68d5af52aad24f2dd7f6abfbd339652e5bcebbf11301d4632aa57cb52d38ff75eebd6fea4bf869d1cfcc5778aaabf6186926935a4eaef4bc23a37df63d7adeb5e2ea62b526d7c875fd08e8fac1d2eb6aaff00aaad0574ff00771d1a878f17fa1b388d46ed1acf3a970e3f5f0142a276679b699b4f54bd2ad62b190ab3c2a69ab6f39cdafb033bd12d3efefc4ed631432a50bea2bc935944d627b4bcea3d1a970b2fedfd4d0d9d81545a55965d7497fb1f9f07e27671c3ae42ad4a36b3b59f02f3cf33da4af1c47857a385834aea2f4e367e839d18afe25e139af8332ead1707fb394e2b96f5e8f4f990ff00a9d58bb49424b9a6e2fce3afcca74ccf87568d6a10e2ea7fe5a9f0b9567184758c629f3b6bea53abb663ab76b2e3d6415bc6f6b1898de9445b70a30739f734d7aa2f5e3b4ab6bd6be57b6b63e34e2db7bf44b8b7c91c554cd36e6f8bfbb7716e54ea559b95579a5e3d95dd7f921d88b42363671d629dbdb1f24cdfbcf863c23da7f7c4671268eae4c85ef7e2698649196a498292574f77dfea47c3c86a761e51ef5f43dd8b3327ca2c878bade85498e5364b9459406c6a122a83328ac42527581eb08ac2186a4eb01d61182c304bd603ac22031825eb05d610809c426eb41d69102c304dd607ac2008c46b97e9c747a78eea952b2a99ad99ee517bdbf036b0780a785a14f0f4b48538dbbe4f7ca4fbdbbb2dd4aea1c7528d4c545f145a6d6988afa876e3a447e5f55315daba32e556a517d959a3c62ddbd19b70cbbf42ae3922625d30cc0edea1379652c935be33595f95f7f91a5f9ea56bf590d7f991cfc7074eaab4a3192ef4418ad9552317d4e23110eecf9e3efd7de3a6b33f11ddd056da5496e9c7c9dccec56daa096b512f1ba391c47e6a2df5b52bb5fc51966f3b68fe256860b07277a95e52972a92707e8ceb1c35f73fc2b3c93ebfb6de3ba51864ad1a8a4f947337f2f89858adb55aaffdaa6d2e72b37eff00a9a74307838aec4a9794e0fe64929518fef29a5fd54cbd7a6be2159ea9f33fc39d580ad55dea36fc64f4f22e52d98e2ad99a5c968bf5f32e54da9456e9e67fc9172f7ad0ab3c456a8fb10714f8cb4f72d7de74db4feca6563f732bb8d35abd1782f719d56329f69ab47827bdf7bfa1ab4b6724f349b94b9be1e0b80cc653b2262d0a5a26583356b9556ff32ce29f02bc56be669af863b793a5b9787cc8e4492f67ef98c92d498565f4788484788f40842100802100842012100371b7008d61b81b01005705c90400b82e010a1b70a610c8e92606a54a6e545bcf15b97fb977779e7353686220ddb3c9a7ac5bb35e373d74e63a678782851a8e31baad14dd95da6f54df23b715a23b4c27aa7eb95c374a2a4749d39af0ed7c09eb749233564fd5345f86c250a93b2ecdeebb9722fd1d8b4aea4e0afe05a6dc7f1dab370e8dd37286777ed6ebf235ea40928c5455902ab33da7675d219f56845ef48a189d9d4e5be317e5734aac8aed9689931855b6150bfb11ff001445fe894d6e8c7fc51bac8a512f17b7d566b1f1974b67c56e44f1c3245c515e63b259133694633eb52d0c6da1c4e83136b1ce6d695949f8fc0e9c7e5cb93c399ad2bb93ef194bda0bdde62c3eadf81bfd3cf9f2355ee4327bd89caf37dda214df698855f47085701e2bd01102e2015c4010046b62b81809b009800371ad840c902e210820001012104171006e63ed474ea54a54aa35954d4dff006a6d2f5356acac99c6636329d494a29b69be3c97fc96a46919bddbb3c6d0cce39d5dbdfb9782268ca36d1a68f37c7e32a52f6e325196e7bd3f02b61b6fd4bf61caddc9b3affaf331d9a26f57a6ceba4432ad73859748ea7fb93d3b8dcd9bb4bad829abd994b70cd611d51ada93b90d46474ab263e7339e2fa8e4014809960520498a4c64ea165655b172d0e576e54eccbcbdfa1d0636a9cbed79decb9c97d4d1c51dd9f967b322aee5e2fe63a9689be636aeb7ee6fe2072d3c8d8c528e9bed798f97b4efc911c378fabed3255f4fa36e00899e23d004c371b71006e0b8840210040210817013009b1b724160b89b1b72502d8db84680e10021012302baeaaba76ec4af7e48de93b156b52534d49684d67061aa349d3946ac62e399bd52ddc2c67cb1787a778d28412e76468f4aa9538d18ddb8bcca29ae17e6b8a387a985aca6e32527676ee3bd2b16ef32ed5e68ac663a7a788a751ea94bcb42c54a51e497869e465ecba12e4d1aaa0ca5bcadd53281683bf31cc7343250203d55ef16720934472a889c356a554a988c4a4990d6c4246562f1c9712f5a6b9daf838cc49838ead76bc7e4c7e2714e453a89bb789ae95c64e4bea26c6cfe249388d92d0eae3308e23ea6ff0021b02451bf1b1287d16985b1813c47a20c421040804c412420305c2058d611ac9081708180042012806c6dc2c6840dc20100c978146bd69deda25e17341b2bd4bf0b7a130396e965272a2ddf735bfe86eeccc3427428d469394a945bf446574969b9d29abf07ebc90b61ed2be168ae30591ae56ddeeb1d2db34ecbf1ff00d36a78582dc97b8af5a08af2da2b9956aed15cce715977d83ea40ab5a64188da6b999388da8b99d6b49973b5e217abd6467d7c65b899d5f685f714e5372decd15e3facf6e4f8b389c7b7a2294b34b785ce31e23a2efbafe87588c72999944a0475b7781672df4e23bf2d75a6abbb52751d2a4d0c82de8b108e8dbb767463bf2b2b29b5683e2fbf5bdbc13f42daacc33ad663ae3eba5c35d790ce4594f0fa2c404c278ade40b86e3180eb82e344482d8d6c4c6301f70363530d89405c57034001d7036342026015c4105715c6b15806ceaaff00820aae4d36f48f2e2cb4a216868c5a945b4ddb5b69a688f378e32742b55d7b3272d39db7347a57486bb8d37185dce7a24bbce17696c592c93aad4617b3e6958d3c331efdab6facf9eda7ccad536d3e7f120dad529da0a92b2504a4f8b6b899908393515bdbb1aeb4ae6e385b92d1edb12c4549537515f226937e3b8a9d737bceafa41b33f2fb3e92b59cea473792d0e42689e3c98d852f3313dcd9d692e4472ab27bdb1fe23648e98a6c842a702d617193a7252849a92efbf958ab901b84c6a62f30e8d6dbcd179a8c734959b8b5af7fb8a14b1752119a8a769f0e4df1466f5cc7ba9997b525e6da2b14885e39a7317219128de9ca4d715b9f7340c6e26551ddab28ab4624b4369544ef394669bbb6ed9b5b5f7772f796ea57a3523bd465fd2ecdf7159ed3e178b56d2cc8d3595beef715371d16d1c3d2ea54a324e7d9564f9e8ee6357a493b6a4d6daadaafffd9);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id_horario`);

--
-- Indices de la tabla `inmueble`
--
ALTER TABLE `inmueble`
  ADD PRIMARY KEY (`id_inmueble`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `inmueble`
--
ALTER TABLE `inmueble`
  MODIFY `id_inmueble` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
