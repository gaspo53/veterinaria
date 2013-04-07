--
-- Volcar la base de datos para la tabla `archivo_articulo`
--

INSERT INTO `archivo_articulo` (`id`, `file_path`, `id_articulo`, `nombre`) VALUES
(1, './files/2cd9ae_Entrega III.txt', 1, 'Entrega III');

--
-- Volcar la base de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `idUsuario`, `titulo`, `descripcion`, `usuario`, `fecha`) VALUES
(1, 1, 'Las vacas son caras', 'El Kg. de carne de vaca super&oacute;\r\nel valor de carne de ni&ntilde;o del\r\nbosque, realmente lamentable.', 'admin', '2007-12-14'),
(3, 1, 'La Veterinaria', 'La Veterinaria (del lat&iacute;n\r\nveterinae, bestia o animal de\r\ncarga) es la ciencia y arte de\r\nprevenir y curar las\r\nenfermedades de los animales.\r\nEn la actualidad se ocupa\r\ntambi&eacute;n de la inspecci&oacute;n y del\r\ncontrol sanitario de los\r\nalimen', 'admin', '2007-12-14'),
(4, 1, 'El agro pidi&oacute; di&aacute;logo urgente con el Gobierno', 'Productores agropecuarios de\r\nLa Pampa y provincia de Buenos\r\nAires, peregrinaron en auto y\r\ncamionetas a lo largo de la\r\nlas rutas 41, 44 y 5 hacia la\r\nBas&iacute;lica de Luj&aacute;n, para pedir\r\na la patrona de la Argentina,\r\nque las autoridades escuch', 'admin', '2007-12-14'),
(6, 1, 'Entrega de Sistemas y Organizaciones', 'Este art&iacute;culo es para hacerle\r\nsaber a la catedra de Sistemas\r\ny Organizaciones que el d&iacute;a\r\nMi&eacute;rcoles 19 vamos a hacer la\r\n3&ordm; entrega... Don''t Worry, Be\r\nHUGGIES.', 'admin', '2007-12-14');

--
-- Volcar la base de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `idUsuario`, `titulo`, `lugar`, `fecha_comienzo`, `fecha_fin`, `fecha`, `descripcion`, `usuario`) VALUES
(3, 1, 'Asado De Vaca', 'UNLP - Rectorado', '2007-12-31', '2007-12-31', '2007-12-14', 'Habr&aacute; asado de vaca desde las\r\n12:00 del mediod&iacute;a, con vino\r\nRutini para todos los que vengan.\r\nCosto de la entrada: u$s250.', 'admin'),
(4, 1, 'D&iacute;as Festivos', 'UNLP - Facultad De Inform&aacute;tica', '2007-12-20', '2007-12-23', '2007-12-14', 'La Facultad de Veterinaria nos\r\nagasajar&aacute; por tan lindo y\r\nfuncional sitio que hemos\r\ncreado. Los esperamos!!!', 'admin'),
(5, 1, 'Batalla de vacas', 'Limite entre Ranchos y Chascom&uacute;s', '2007-12-18', '2008-01-06', '2007-12-14', 'Como es costumbre,\r\nhistoricamente el pueblo de\r\nRanchos fue rival con el de\r\nChascom&uacute;s. Pero ahora las\r\nvacas se hicieron sentir y\r\ntambi&eacute;n lo har&aacute;n. Desde la\r\nprimer tambeada, se esperan\r\nvacas y toros para desenlazar\r\nel combate, terminando el 6 de\r\nEnero con la llegada de los\r\nreyes, porque las vacas\r\nquieren conocoer a los\r\ncamellos... Verdaderamente un\r\nshow terrible.-', 'admin'),
(6, 1, 'Y ahora lezama', 'Partido de chascom&uacute;s - Laguna Chis-Chis', '2007-12-19', '2007-12-25', '2007-12-14', 'Y si... como lezama quiere la\r\nautonom&iacute;a, las vacas no\r\nquieren porque sus\r\nnovios/maridos toros las van a\r\nfrecuentar mucho menos.\r\nPreparense... Pero esta pelea\r\ntermina en navidad porque las\r\nvacas de lezama y chascom&uacute;s no\r\nles gustan los camellos, sino\r\nque se sienten verdareramente\r\natra&iacute;das por los renos de\r\npapito noel.', 'admin'),
(7, 1, 'Visita de Dannete', 'La Plata', '2008-02-07', '2008-02-08', '2008-02-07', 'Me paaseee', 'admin');

--
-- Volcar la base de datos para la tabla `imagen_articulo`
--

INSERT INTO `imagen_articulo` (`id`, `file_path`, `id_articulo`, `texto_altern`) VALUES
(1, './files/4f80f9_vi_6727_467289_961752.jpg', 1, 'Niño'),
(2, './files/5421ef_vaca.jpg', 1, 'Vaca'),
(3, './files/5af6ce_img0.gif', 3, 'Sociedad De medicina Veterinara'),
(4, './files/ca4d30_kirchner pa la 1 nota.jpg', 4, 'Kirchner En La Rural'),
(5, './files/cda9ff_Kirchner carnes vaca domador agro campo.jpg', 4, 'Kirchner Domador'),
(6, './files/06d708_sdagostino.jpg', 6, 'Sandra D''Agostino');

--
-- Volcar la base de datos para la tabla `links_interes`
--

INSERT INTO `links_interes` (`id`, `nombre`, `url`, `descripcion`, `idUsuario`, `usuario`, `fecha`) VALUES
(2, 'Extractor de leche', 'http://oferta.deremate.com.ar/id=18729050_antiguo-tarro-pequeo-de-leche-ao-1894-alfa-laval', 'Para disfrutar la leche de vaca canadiense', 1, 'admin', '2007-12-14'),
(3, 'Alfombras para cam', 'http://oferta.deremate.com.ar/id=16853290_alfombra-de-cuero-de-vaca-con-pelos', 'Si&eacute;ntase como en un d&iacute;a de campo con las alfombras VACA SYSTEM', 1, 'admin', '2007-12-14'),
(5, 'Noticias agron&oacute;micas', 'http://www.canalrural.com.ar', 'Todo sobre el campo, para entrar e irse enseguida', 1, 'admin', '2007-12-14'),
(6, 'Retratos de compositores', 'http://www.fotolog.com/gaspo53', 'Todo sobre el efecto "Producci&oacute;n le de leche - Musica Cl&aacute;sica"', 1, 'admin', '2007-12-14'),
(7, 'Una facultad linda', 'http://www.info.unlp.edu.ar', 'La facultad m&aacute;s aplicada de tecnolog&iacute;a se hace del campo', 1, 'admin', '2007-12-14'),
(8, 'Un buscador', 'http://www.google.com', 'Busca busca, doggie', 1, 'admin', '2007-12-14'),
(9, 'Videos de vacas', 'http://www.youtube.com/watch?v=7g1hGUNJGAg', 'No lo vi, no se ni de qu&eacute; se trata... Todo sea para mostrar que anda en PAGINATOR!!!', 1, 'admin', '2007-12-14');


--
-- Volcar la base de datos para la tabla `notas_recomendadas`
--

INSERT INTO `notas_recomendadas` (`id`, `idUsuario`, `titulo`, `nota`, `fecha`, `usuario`, `link`) VALUES
(4, 1, 'Sales para vacas', 'Hay sales que aplic&aacute;ndoselas a\r\nlas 3:55 am a cada vaca, &eacute;stas\r\nproducen 77.8 cm3 m&aacute;s de leche\r\npor a&ntilde;o, muy interesante.', '2007-12-14', 'admin', 'http://www.veterinarios.com'),
(5, 1, '&iquest;Qu&eacute; te gusta m&aacute;s?', 'La pregunta es, qu&eacute; es m&aacute;s\r\nrico? El asado de vaca o el de\r\ncerdo??? Y la respuesta es:\r\nTODO DEPENDE DEL VINO CON QUE\r\nSE LO ACOMPA&Ntilde;E.', '2007-12-14', 'admin', 'http://www.nokia.com.ar'),
(6, 1, 'Premios PHP', 'Se dice que la asociaci&oacute;n\r\ncreadora de PHP va a premiar a\r\nlos creadores de este sitio\r\ncon u$s 100.000 (miliavos) por\r\nla creacion de este\r\nmaravilloso sitio.', '2007-12-14', 'admin', 'http://www.premiosphp.com'),
(7, 1, 'Vacas con colch&oacute;n y con Mozart', 'ES LA UNICA granja de Espa&ntilde;a\r\ndonde los bovinos viven en una\r\nespecie de &laquo;spa&raquo; de lujo, con\r\nm&uacute;sica cl&aacute;sica, paritorios\r\nindividuales... Las vacas,\r\ntratadas de manera tan\r\nexquisita, producen m&aacute;s.', '2007-12-14', 'admin', 'http://www.elmundo.es/suplementos/cronica/2007/602/1179007204.html'),
(8, 1, ' ENSAYO CLINICO', 'Y lo que empez&oacute; con 20 reses a\r\nfinales de los a&ntilde;os 70, justo\r\ndonde hoy se levanta esta\r\nparticular granja, hoy no s&oacute;lo\r\nes escaparate para otras\r\nexplotaciones (en 2006 fue\r\nconsiderada como la mejor\r\nexplotaci&oacute;n gen&eacute;tica de\r\nEspa&ntilde;a), sino que despierta el\r\ninter&eacute;s de cient&iacute;ficos y\r\ncentros m&eacute;dicos. De hecho, se\r\nest&aacute; llevando a cabo un\r\nestudio conjunto de cuatro\r\na&ntilde;os de duraci&oacute;n entre la\r\nganader&iacute;a, el hospital\r\nmadrile&ntilde;o de Alcorc&oacute;n y el\r\nConsejo Superior de\r\nInvestigaciones Cient&iacute;ficas\r\n(CSIC) para que los enfermos\r\noperados del aparato\r\ndigestivo, sobre todo del\r\ncolon, se recuperen m&aacute;s\r\nr&aacute;pidamente mediante la\r\ningesti&oacute;n de productos\r\nsimbi&oacute;ticos de esta leche.\r\nEstos contienen\r\nmicroorganismos resistentes a\r\nlos efectos de la digesti&oacute;n\r\nque adem&aacute;s estimulan el\r\ncrecimiento de las c&eacute;lulas del\r\nintestino.', '2007-12-14', 'admin', 'http://www.elmundo.es/suplementos/cronica/2007/602/1179007204.html'),
(9, 1, 'Seguimos con Mozart', 'En la antesala que da paso a\r\nla noria de orde&ntilde;o esperan\r\nturno las &uacute;ltimas frisonas\r\nbajo los ventiladores y las\r\nduchas de refresco. De fondo,\r\nesta vez, suena el Concierto\r\npara piano n&ordm; 21 de Mozart.\r\nLas vacas est&aacute;n quietas, como\r\nextasiadas. En cuanto la\r\nenorme rueda echa a andar en\r\nsentido contrario a las agujas\r\ndel reloj, ellas se van\r\nacercando, como a c&aacute;mara\r\nlenta, para ocupar plaza. La\r\nimagen, casi de videoclip, no\r\ndeja de sorprender al\r\nvisitante. Las que ya han\r\ncumplido, ahora descansan a\r\nritmo de cl&aacute;sica en sus camas\r\nde agua. Es la hora del chill\r\nout vacuno.', '2007-12-14', 'admin', 'http://www.elmundo.es/suplementos/cronica/2007/602/1179007204.html');

--
-- Volcar la base de datos para la tabla `novedades`
--

INSERT INTO `novedades` (`id`, `nombre_corto`, `desc_corta`, `desc_larga`, `fecha`, `nombre_largo`, `idUsuario`, `usuario`) VALUES
(3, 'La fuga en VACA Mayor, BWV 5214', 'El accidente ocurri&oacute; en Tolosa\r\ny los animales se escaparon\r\ncuando las puertas del cami&oacute;n\r\njaula se abrieron. Algunos\r\npudieron ser recapturados,\r\npero dos terminaron en manos\r\nde los vecinos de la zona, que\r\nlos carnearon y se dividieron\r\nla carne. ', 'Trece vacas y un toro\r\n(POLIGAMO) se escaparon hoy\r\ncuando un cami&oacute;n jaula volc&oacute;\r\nen la localidad de Tolosa,\r\nvecina a la ciudad de La\r\nPlata. Tres fueron\r\nrecapturadas y dos carneadas\r\npor vecinos de la zona.\r\nEl episodio comenz&oacute; en las\r\ncalles 120 y 12, cuando el\r\ntransporte de ganado de un\r\nfrigor&iacute;fico hizo una mala\r\nmaniobra y termin&oacute; de costado\r\nsobre el asfalto. En el\r\naccidente sufri&oacute; la apertura\r\nde la puerta de la jaula, lo\r\nque ocasion&oacute; que al menos 14\r\nanimales escaparan del\r\ntransporte y comenzaran a\r\ndeambular.\r\n\r\nUna de las vacas -de raza\r\nHeresford- apareci&oacute; esta\r\nma&ntilde;ana en diagonal 73 y calle\r\n48, en la capital bonaerense,\r\npaseando por el medio del\r\ntr&aacute;nsito, esquivando a los no\r\nmenos asombrados automovilistas.', '2007-12-14', 'Volc&oacute; un cami&oacute;n con ganado en La Plata y 14 vacas quedaron sueltas: los vecinos carnearon dos', 1, 'admin'),
(4, 'Problemas con el tambo', 'Decenas de tamberos se fueron\r\nuniendo en forma espont&aacute;nea \r\npara liquidar en Liniers\r\nanimales en producci&oacute;n.', 'Fue de las protestas m&aacute;s\r\noriginales que se hayan\r\norganizado en los &uacute;ltimos\r\na&ntilde;os. Y no tuvieron que ver\r\nlas entidades tradicionales\r\ndel campo, sino que se fue\r\ngestando boca a boca, o mail a\r\nmail, a decir verdad.\r\n\r\nSu impacto fue notorio: la\r\npresencia en el Mercado de\r\nLiniers de unas 1.600 vacas\r\nlecheras a&uacute;n en producci&oacute;n,\r\npara ser liquidadas, no pas&oacute;\r\ndesapercibida ni para el\r\npr&oacute;ximo ministro de Econom&iacute;a,\r\nMart&iacute;n Lousteau, que incluy&oacute;\r\nel tema en su agenda.\r\n\r\nLos tamberos protestaron de\r\nesa forma (mandando sus vacas\r\na faena en el mercado m&aacute;s\r\nvisible del pa&iacute;s) contra lo\r\nque consideran la gota que\r\nrebals&oacute; el vaso: la presi&oacute;n\r\nque ejerci&oacute; el secretario de\r\nComercio, Guillermo Moreno,\r\nsobre los industriales l&aacute;cteos\r\npara que no paguen m&aacute;s de 73\r\ncentavos por litro de leche a\r\nlos tamberos.', '2007-12-14', 'La triste mirada de la lecher&iacute;a', 1, 'admin'),
(5, 'Es inminente un acuerdo por el conflicto lechero', 'Se cambiar&iacute;a el valor de\r\nreferencia de 0,78 pesos el\r\nlitro por una banda de precios', 'Despu&eacute;s de dos d&iacute;as de\r\nbloqueos a usinas l&aacute;cteas\r\nsantafecinas y el comienzo,\r\nanteanoche, del mismo tipo de\r\nprotesta en C&oacute;rdoba contra\r\nplantas de las firmas\r\nMolfino-Saputo y SanCor, al\r\ncierre de esta edici&oacute;n era\r\ninminente un principio de\r\nacuerdo entre los tamberos y\r\nlos representantes\r\nindustriales para empezar a\r\ndestrabar el conflicto.\r\n\r\nLas empresas afectadas por los\r\npiquetes respetar&iacute;an los\r\nprecios en tambo vigentes a\r\nnoviembre, de unos 83 centavos\r\nel litro, es decir, por encima\r\nde los 78 que el Gobierno\r\nimpuso como precio para los\r\nproductores por la producci&oacute;n\r\nexportable. Y los bloqueos se\r\nlevantar&iacute;an en las plantas que\r\nacepten volver al escenario\r\nprecrisis, aunque se\r\nprofundizar&iacute;an contra las\r\nempresas que no adhieran,\r\nseg&uacute;n revel&oacute; una fuente de las\r\nnegociaciones. Otra dijo que\r\nse podr&iacute;a avanzar tambi&eacute;n en\r\nun mecanismo de formaci&oacute;n de\r\nbandas de precios sobre\r\nvalores reales del mercado.\r\n\r\nAnoche era un enigma si esta\r\nmovida ser&iacute;a convalidada por\r\nel secretario de Comercio\r\nInterior, Guillermo Moreno,\r\nmentor de la idea de ponerle\r\nun valor a los tamberos, que\r\nluego fue ratificada por el\r\nministro de Econom&iacute;a, Mart&iacute;n\r\nLousteau. "Se va a tener que\r\naceptar [la negociaci&oacute;n entre\r\nproductores e industriales]\r\nporque esto es [un convenio]\r\nentre partes", dijo a media\r\ntarde Guillermo Giannasi,\r\nreferente de lecher&iacute;a de\r\nFederaci&oacute;n Agraria Argentina\r\n(FAA).\r\n', '2007-12-14', 'La protesta de los tamberos: negocian productores e industriales en Santa Fe', 1, 'admin'),
(6, 'Conflicto lechero', 'Dijo que no quieren dialogar.\r\nY defendi&oacute; el precio de\r\nreferencia para asegurar el\r\nabastecimiento interno. Nuevas\r\ncompensaciones', 'CAPITAL FEDERAL, Diciembre 14\r\n(Nap, reproducci&oacute;n de\r\nCAMPONOVA) El ministro de\r\nEconom&iacute;a, Mart&iacute;n Lousteau,\r\nquien hace una semana anunci&oacute;\r\nla imposici&oacute;n de un precio\r\nm&aacute;ximo para la leche cruda,\r\ncuestion&oacute; este jueves los\r\nbloqueos de los tamberos a las\r\nindustrias l&aacute;cteas en protesta\r\npor esa decisi&oacute;n.\r\n\r\n \r\n\r\n"Algunas manifestaciones del\r\nsector l&aacute;cteo me parecen una\r\ndemostraci&oacute;n de la poca\r\npropensi&oacute;n al di&aacute;logo", dijo\r\nel flamante titular del\r\nministerio de hacienda de\r\nArgentina.\r\n           \r\n\r\nLousteau hizo breves\r\ndeclaraciones durante su\r\nparticipaci&oacute;n en el 6to.\r\nSeminario Propymes organizado\r\npor el grupo Techint.\r\n\r\n"No se puede vender la leche\r\nal exterior a cualquier precio\r\nponiendo en riesgo la\r\nposibilidad de consumirla\r\ninternamente", argument&oacute; el\r\nfuncionario a la hora de\r\njustificar la imposici&oacute;n de un\r\nprecio de 78 centavos el litro\r\nde leche que los tambos le\r\nvenden a las industrias l&aacute;cteas.\r\n\r\nNuevas compensaciones\r\n\r\n\r\nEn medio de la pol&eacute;mica, la\r\nOficina Nacional de Control\r\nComercial Agropecuario (Oncca)\r\nanunci&oacute; un nuevo pago de\r\ncompensaciones para el sector\r\nagroalimentario, incluyendo a\r\nuna empresa l&aacute;ctea y a tamberos.\r\n            \r\n\r\nEn sendas resoluciones que se\r\npublicar&aacute;n este viernes en el\r\nBolet&iacute;n Oficial, la Oncca\r\npagar&aacute; un total de 12.823.636\r\npesos.', '2007-12-14', 'Lousteau critic&oacute; las protestas de los tamberos', 1, 'admin');

