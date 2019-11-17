USE FNEXUS;
/*CATEGORIA*/
INSERT INTO CATEGORIA (nombre)
VALUES ("coches");
INSERT INTO CATEGORIA (nombre)
VALUES ("motos");
INSERT INTO CATEGORIA (nombre)
VALUES ("motor y accesorios");
INSERT INTO CATEGORIA (nombre)
VALUES ("moda y accesorios");
INSERT INTO CATEGORIA (nombre)
VALUES ("inmobiliaria");
INSERT INTO CATEGORIA (nombre)
VALUES ("tv,audio,foto");
INSERT INTO CATEGORIA (nombre)
VALUES ("móviles y telefonía");
INSERT INTO CATEGORIA (nombre)
VALUES ("informática y electrónica");
INSERT INTO CATEGORIA (nombre)
VALUES ("deporte y ocio");
INSERT INTO CATEGORIA (nombre)
VALUES ("bicicletas");
INSERT INTO CATEGORIA (nombre)
VALUES ("consolas y videojuegos");
INSERT INTO CATEGORIA (nombre)
VALUES ("hogar y jardín");
INSERT INTO CATEGORIA (nombre)
VALUES ("electrodomésticos");
INSERT INTO CATEGORIA (nombre)
VALUES ("cine,libros,música");
INSERT INTO CATEGORIA (nombre)
VALUES ("niños y bebés");
INSERT INTO CATEGORIA (nombre)
VALUES ("coleccionismo");
INSERT INTO CATEGORIA (nombre)
VALUES ("construcción y reformas");
INSERT INTO CATEGORIA (nombre)
VALUES ("industria y agricultura");
INSERT INTO CATEGORIA (nombre)
VALUES ("empleo");
INSERT INTO CATEGORIA (nombre)
VALUES ("servicios");
INSERT INTO CATEGORIA (nombre)
VALUES ("otros");

/*PERSONA*/
INSERT INTO PERSONA (nickname, password, nombre, apellidos, email, foto_perfil, pagina_contacto)
VALUES ('N3Essential', 'N3Essential', 'Adrian', 'Danlos', 'adrian@gmail.com', 'https://icdn5.digitaltrends.com/image/screen-shot-2019-02-15-at-19-16-58-720x720.jpg', 'adrianweb.com');
INSERT INTO PERSONA (nickname, password, nombre, apellidos, email, foto_perfil, pagina_contacto)
VALUES ('N3Machine', 'N3Machine', 'Martin', 'Danlos', 'martin@gmail.com', 'https://ichef.bbci.co.uk/news/660/cpsprodpb/A87E/production/_108643134_3130.jpg', 'martinweb.com');
INSERT INTO PERSONA (nickname, password, nombre, apellidos, email, foto_perfil, pagina_contacto)
VALUES ('Iñaki', 'Iñaki', 'Iñaki', 'Caballero', 'inaki@gmail.com', 'https://timedotcom.files.wordpress.com/2014/03/happily-surprised.jpg', 'inakiweb.com');
INSERT INTO PERSONA (nickname, password, nombre, apellidos, email, foto_perfil, pagina_contacto)
VALUES ('JulenOrtiz', 'JulenOrtiz', 'Julen', 'Ortiz de Zárate', 'julenO@gmail.com', 'https://news.northeastern.edu/wp-content/uploads/2019/06/Moganasundaram_001-750x0-c-default.jpg', 'julenOweb.com');
INSERT INTO PERSONA (nickname, password, nombre, apellidos, email, foto_perfil, pagina_contacto)
VALUES ('JulenCasti', 'JulenCasti', 'Julen', 'Castillo', 'julenC@gmail.com', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRdE_RjHnYussYYW9nm35o97HDxEMlSH6T1OCNgnwDwZnLMgNMK5Q&s', 'julenCweb.com');
INSERT INTO PERSONA (nickname, password, nombre, apellidos, email, foto_perfil, pagina_contacto)
VALUES ('Elon', 'Elon', 'Elon', 'Musk', 'musk@gmail.com', 'https://amp.businessinsider.com/images/555264b0ecad041477fbd87e-750-513.jpg', 'musk.com');
INSERT INTO PERSONA (nickname, password, nombre, apellidos, email, foto_perfil, pagina_contacto)
VALUES ('Charles', 'Charles', 'Charles', 'LeClerc', 'charles@gmail.com', 'https://www.byrdie.com/thmb/Nk0WKbhbgcNNcGQ8M2tIm1Yf8YQ=/1050x700/filters:no_upscale():max_bytes(150000):strip_icc()/cdn.cliqueinc.com__cache__posts__246538__short-haircuts-for-round-faces-246538-1515697135072-image.700x0c-27328eed34b44d91842d7ec4ad5579a8.jpg', 'charlesweb.com');
INSERT INTO PERSONA (nickname, password, nombre, apellidos, email, foto_perfil, pagina_contacto)
VALUES ('Bill', 'Bill', 'Bill', 'Gates', 'bill@gmail.com', 'http://i.imgur.com/zULezEe.jpg', 'billweb.com');
INSERT INTO PERSONA (nickname, password, nombre, apellidos, email, foto_perfil, pagina_contacto)
VALUES ('Kimbal', 'Kimbal', 'Kimbal', 'Musk', 'Kimbal@gmail.com', 'https://mediaslide-europe.storage.googleapis.com/premier/pictures/4933/21923/profile-1567586547-0e618246054b6c92ce7fc3a349398127.jpg?v=1567593987', 'Kimbalweb.com');
INSERT INTO PERSONA (nickname, password, nombre, apellidos, email, foto_perfil, pagina_contacto)
VALUES ('Sergio', 'Sergio', 'Sergio', 'Zulueta', 'sergio@gmail.com', 'https://guernseypress.com/resizer/_2sTsyMETCbgH1BMlZzen6sEfcU=/1000x0/filters:quality(100)/arc-anglerfish-arc2-prod-guernseypress-mna.s3.amazonaws.com/public/SCI6LKTOS5HSTPAF2KLA3SSVMA.jpg', 'sergioweb.com');
INSERT INTO PERSONA (nickname, password, nombre, apellidos, email, foto_perfil, pagina_contacto)
VALUES ('Joel', 'Joel', 'Joel', 'Mame', 'joel@gmail.com', 'https://images.squarespace-cdn.com/content/v1/5a2c77d812abd9bc7ab2b450/1558655922105-ZF9BL67PNZZYMKCPZQWH/ke17ZwdGBToddI8pDm48kJY5GPosneBtGf71nUr5Ted7gQa3H78H3Y0txjaiv_0fDoOvxcdMmMKkDsyUqMSsMWxHk725yiiHCCLfrh8O1z5QHyNOqBUUEtDDsRWrJLTmUK_IB3X7lRAWenxoBFomxQuBQXJClLcj5FcO3KHrL4OM8j93LjYZTBauz-vxf_i2/282A7403.jpg', 'joelweb.com');

/*ANUNCIO*/
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('1', 'Software for everyone', 'Build your app from scrath with our architecture. Easy and free!', 'SoftwareX.com', 'https://www.artibeus.com/wp-content/uploads/2018/05/computer-software-featured-image.jpg','SoftwareX', '8');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('1', 'Music for life', 'Get the best music with the best algorithms', 'Spotify.com', 'https://miro.medium.com/max/3200/1*c0FaLqy4tcO1uuYLP8AWBw.jpeg','Spotify', '6');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('2', 'Security for free', 'Our high quality cameras will provide you and your family the safety you are looking for.', 'Secure.com', 'https://negosentro.com/wp-content/uploads/2016/01/secure-webhosting1.jpg','Secure', '12');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('3', 'Your money in seconds', 'Do you want to build your next project but dont have enough money? Contact us!', 'LendingMoney.com', 'http://www.colonialwalletwisdom.com/wp-content/uploads/2014/02/What-Happens-When-You-Lend-Money-to-Your-Own-Business.jpg','LendingMoney', '20');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('4', 'Travel to Space', 'Accomplish your childhood dreams and explore space.', 'SpaceX.com', 'https://www.extremetech.com/wp-content/uploads/2019/04/falcon-heavy.jpg','SpaceX', '20');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('5', 'Electric cars are here', 'Help saving the earth while driving the most awesome car in the market', 'Tesla.com', 'https://icdn4.digitaltrends.com/image/digitaltrends/tesla-model-s-p100d-2-1500x1000.jpg','Tesla', '1');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('6', 'Clean energy!', 'You dont need to keep destroying the planet. Get clean energy now!', 'SolarCity.com', 'https://i.ytimg.com/vi/ctABLm--s2g/maxresdefault.jpg','SolarCity', '12');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('7', 'Bye Bye Traffic', 'Drive under the city at high speeds to reach your destination in minutes.', 'boringcompany.com', 'https://www.investopedia.com/thmb/rGNhOVvQtQWvn1AlKOmwg75iqfA=/1200x800/filters:fill(auto,1)/BoringCompany-5c1a8e9446e0fb00018c9384.jpg','boringcompany', '18');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('8', 'Connect yourself', 'Have you ever dreamed of connecting your brain to a computer? We are the answer.', 'neuralink.com', 'https://www.boldbusiness.com/wp-content/uploads/2019/01/Can-Elon-Musk-Make-Us-Smarter-with-Brain-Chips-Feature.jpg','neuralink', '21');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('9', 'Dress like the future', 'The most stylish clothes for the new generation. Wear the future in the present.', 'DressX.com', 'https://cdn.vox-cdn.com/thumbor/FUrHClJmhk5Stqp1zbSi0YiEYPs=/0x0:1750x1313/1200x0/filters:focal(0x0:1750x1313):no_upscale()/cdn.vox-cdn.com/uploads/chorus_asset/file/4980979/Intel_nyfw15_dress4.0.jpg','DressX', '4');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('10', 'Tech meds', 'Science has helped to create the most advanced meds humanity has ever known', 'MedsX.com', 'https://media.wired.com/photos/59419f6405aeaa0c20fbf320/191:100/w_2292,h_1200,c_limit/pillpack_dispenser_colors-FeatureArt.jpg','MedsX', '20');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('11', 'CRISPR deliver', 'Change your DNA in seconds. Custom yourself the way you always wanted to be.', 'CRISPR.com', 'https://www.genengnews.com/wp-content/uploads/2018/10/crispr-8-3-18.jpg','CRISPR', '21');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('1', 'Smart Homes are here!', 'The houses of the future are here. Be the first in your neighborhood.', 'smarthomeX.com', 'https://media.kasperskycontenthub.com/wp-content/uploads/sites/43/2019/06/01090021/smart_home_dz.jpg','smarthomeX', '5');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('2', 'Make your sport team successful', 'Our management team will provide everything you need to be succesful as a brand in sports.', 'g2esports.com', 'https://i.redd.it/6fmig9liztj31.png','g2esports', '11');
/*COMENTARIO*/
INSERT INTO COMENTARIO (persona_id, anuncio_id, descripcion)
VALUES ('1', '1', 'programar es superdivertido, quiero vuestro software');
INSERT INTO COMENTARIO (persona_id, anuncio_id, descripcion)
VALUES ('2', '1', 'omg so good!');
/*LIKE*/
INSERT INTO LIKES (persona_id, anuncio_id)
VALUES ('1', '1');
