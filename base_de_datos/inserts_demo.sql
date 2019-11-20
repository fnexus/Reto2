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
VALUES ('N3Essential', 'N3Essential', 'Adrian', 'Danlos', 'adrian@gmail.com', '../img/imagenes_usuarios/1.jpg', 'adrianweb.com');
INSERT INTO PERSONA (nickname, password, nombre, apellidos, email, foto_perfil, pagina_contacto)
VALUES ('N3Machine', 'N3Machine', 'Martin', 'Danlos', 'martin@gmail.com', '../img/imagenes_usuarios/2.jpg', 'martinweb.com');
INSERT INTO PERSONA (nickname, password, nombre, apellidos, email, foto_perfil, pagina_contacto)
VALUES ('Iñaki', 'Iñaki', 'Iñaki', 'Caballero', 'inaki@gmail.com', '../img/imagenes_usuarios/3.jpg', 'inakiweb.com');
INSERT INTO PERSONA (nickname, password, nombre, apellidos, email, foto_perfil, pagina_contacto)
VALUES ('JulenOrtiz', 'JulenOrtiz', 'Julen', 'Ortiz de Zárate', 'julenO@gmail.com', '../img/imagenes_usuarios/4.jpg', 'julenOweb.com');
INSERT INTO PERSONA (nickname, password, nombre, apellidos, email, foto_perfil, pagina_contacto)
VALUES ('JulenCasti', 'JulenCasti', 'Julen', 'Castillo', 'julenC@gmail.com', '../img/imagenes_usuarios/5.jpg', 'julenCweb.com');
INSERT INTO PERSONA (nickname, password, nombre, apellidos, email, foto_perfil, pagina_contacto)
VALUES ('Elon', 'Elon', 'Elon', 'Musk', 'musk@gmail.com', '../img/imagenes_usuarios/6.jpg', 'musk.com');
INSERT INTO PERSONA (nickname, password, nombre, apellidos, email, foto_perfil, pagina_contacto)
VALUES ('Charles', 'Charles', 'Charles', 'LeClerc', 'charles@gmail.com', '../img/imagenes_usuarios/7.jpg', 'charlesweb.com');
INSERT INTO PERSONA (nickname, password, nombre, apellidos, email, foto_perfil, pagina_contacto)
VALUES ('Bill', 'Bill', 'Bill', 'Gates', 'bill@gmail.com', '../img/imagenes_usuarios/8.jpg', 'billweb.com');
INSERT INTO PERSONA (nickname, password, nombre, apellidos, email, foto_perfil, pagina_contacto)
VALUES ('Kimbal', 'Kimbal', 'Kimbal', 'Musk', 'Kimbal@gmail.com', '../img/imagenes_usuarios/9.jpg', 'Kimbalweb.com');
INSERT INTO PERSONA (nickname, password, nombre, apellidos, email, foto_perfil, pagina_contacto)
VALUES ('Sergio', 'Sergio', 'Sergio', 'Zulueta', 'sergio@gmail.com', '../img/imagenes_usuarios/10.jpg', 'sergioweb.com');
INSERT INTO PERSONA (nickname, password, nombre, apellidos, email, foto_perfil, pagina_contacto)
VALUES ('Joel', 'Joel', 'Joel', 'Mame', 'joel@gmail.com', '../img/imagenes_usuarios/11.jpg', 'joelweb.com');

/*ANUNCIO*/
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('1', 'Software for everyone', 'Build your app from scrath with our architecture. Easy and free!', 'SoftwareX.com', '../img/imagenes_usuarios/software.jpg','SoftwareX', '8');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('1', 'Music for life', 'Get the best music with the best algorithms', 'Spotify.com', '../img/imagenes_usuarios/spotify.jpeg','Spotify', '6');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('2', 'Security for free', 'Our high quality cameras will provide you and your family the safety you are looking for.', 'Secure.com', '../img/imagenes_usuarios/secure.jpg','Secure', '12');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('3', 'Your money in seconds', 'Do you want to build your next project but dont have enough money? Contact us!', 'LendingMoney.com', '../img/imagenes_usuarios/money.jpg','LendingMoney', '20');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('4', 'Travel to Space', 'Accomplish your childhood dreams and explore space.', 'SpaceX.com', '../img/imagenes_usuarios/falcon-heavy.jpg','SpaceX', '20');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('5', 'Electric cars are here', 'Help saving the earth while driving the most awesome car in the market', 'Tesla.com', '../img/imagenes_usuarios/tesla.jpg','Tesla', '1');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('6', 'Clean energy!', 'You dont need to keep destroying the planet. Get clean energy now!', 'SolarCity.com', '../img/imagenes_usuarios/home.jpg','SolarCity', '12');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('7', 'Bye Bye Traffic', 'Drive under the city at high speeds to reach your destination in minutes.', 'boringcompany.com', '../img/imagenes_usuarios/boringcompany.jpg','Boringcompany', '18');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('8', 'Connect yourself', 'Have you ever dreamed of connecting your brain to a computer? We are the answer.', 'neuralink.com', '../img/imagenes_usuarios/neuralink.jpg','Neuralink', '21');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('9', 'Dress like the future', 'The most stylish clothes for the new generation. Wear the future in the present.', 'DressX.com', '../img/imagenes_usuarios/moda.jpg','DressX', '4');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('10', 'Tech meds', 'Science has helped to create the most advanced meds humanity has ever known', 'MedsX.com', '../img/imagenes_usuarios/meds.jpg','MedsX', '20');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('11', 'CRISPR deliver', 'Change your DNA in seconds. Custom yourself the way you always wanted to be.', 'CRISPR.com', '../img/imagenes_usuarios/crispr.jpg','CRISPR', '21');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('1', 'Smart Homes are here!', 'The houses of the future are here. Be the first in your neighborhood.', 'smarthomeX.com', '../img/imagenes_usuarios/smarthome.jpg','SmarthomeX', '5');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('2', 'Make your sport team successful', 'Our management team will provide everything you need to be succesful as a brand in sports.', 'g2esports.com', '../img/imagenes_usuarios/g2.png','G2esports', '11');

INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('1', 'Software for everyone', 'Build your app from scrath with our architecture. Easy and free!', 'SoftwareX.com', '../img/imagenes_usuarios/softwarev2-min.jpg','SoftwareX', '8');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('1', 'Music for life', 'Get the best music with the best algorithms', 'Spotify.com', '../img/imagenes_usuarios/deezer-min.jpg','Spotify', '6');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('2', 'Security for free', 'Our high quality cameras will provide you and your family the safety you are looking for.', 'Secure.com', '../img/imagenes_usuarios/securev2-min.jpg','Secure', '12');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('3', 'Your money in seconds', 'Do you want to build your next project but dont have enough money? Contact us!', 'LendingMoney.com', '../img/imagenes_usuarios/moneyv2-min.jpg','LendingMoney', '20');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('4', 'Travel to Space', 'Accomplish your childhood dreams and explore space.', 'SpaceX.com', '../img/imagenes_usuarios/spacexv2-min.jpg','SpaceX', '20');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('5', 'Electric cars are here', 'Help saving the earth while driving the most awesome car in the market', 'Tesla.com', '../img/imagenes_usuarios/teslav2-min.jpg','Tesla', '1');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('6', 'Clean energy!', 'You dont need to keep destroying the planet. Get clean energy now!', 'SolarCity.com', '../img/imagenes_usuarios/solarcityv2-min.jpg','SolarCity', '12');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('7', 'Bye Bye Traffic', 'Drive under the city at high speeds to reach your destination in minutes.', 'boringcompany.com', '../img/imagenes_usuarios/boringcompanyv2-min.jpg','Boringcompany', '18');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('8', 'Connect yourself', 'Have you ever dreamed of connecting your brain to a computer? We are the answer.', 'neuralink.com', '../img/imagenes_usuarios/neuralinkv2-min.jpg','Neuralink', '21');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('9', 'Dress like the future', 'The most stylish clothes for the new generation. Wear the future in the present.', 'DressX.com', '../img/imagenes_usuarios/modav2-min.jpg','DressX', '4');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('10', 'Tech meds', 'Science has helped to create the most advanced meds humanity has ever known', 'MedsX.com', '../img/imagenes_usuarios/medsv2-min.jpeg','MedsX', '20');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('11', 'CRISPR deliver', 'Change your DNA in seconds. Custom yourself the way you always wanted to be.', 'CRISPR.com', '../img/imagenes_usuarios/crisprv2-min.jpg','CRISPR', '21');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('1', 'Smart Homes are here!', 'The houses of the future are here. Be the first in your neighborhood.', 'smarthomeX.com', '../img/imagenes_usuarios/smarthomev2-min.jpg','SmarthomeX', '5');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('2', 'Make your sport team successful', 'Our management team will provide everything you need to be succesful as a brand in sports.', 'g2esports.com', '../img/imagenes_usuarios/fnatic-min.png','G2esports', '11');

INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('1', 'Software for everyone', 'Build your app from scrath with our architecture. Easy and free!', 'SoftwareX.com', '../img/imagenes_usuarios/softwarev3-min.jpg','SoftwareX', '8');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('1', 'Music for life', 'Get the best music with the best algorithms', 'Spotify.com', '../img/imagenes_usuarios/musicv3.jpg','Spotify', '6');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('2', 'Security for free', 'Our high quality cameras will provide you and your family the safety you are looking for.', 'Secure.com', '../img/imagenes_usuarios/securev3-min.png','Secure', '12');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('3', 'Your money in seconds', 'Do you want to build your next project but dont have enough money? Contact us!', 'LendingMoney.com', '../img/imagenes_usuarios/moneyv3-min.jpg','LendingMoney', '20');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('4', 'Travel to Space', 'Accomplish your childhood dreams and explore space.', 'SpaceX.com', '../img/imagenes_usuarios/spacexv3-min.jpeg','SpaceX', '20');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('5', 'Electric cars are here', 'Help saving the earth while driving the most awesome car in the market', 'Tesla.com', '../img/imagenes_usuarios/teslav3-min.jpg','Tesla', '1');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('6', 'Clean energy!', 'You dont need to keep destroying the planet. Get clean energy now!', 'SolarCity.com', '../img/imagenes_usuarios/solarcityv3-min.jpg','SolarCity', '12');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('7', 'Bye Bye Traffic', 'Drive under the city at high speeds to reach your destination in minutes.', 'boringcompany.com', '../img/imagenes_usuarios/boringcompanyv3-min.png','Boringcompany', '18');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('8', 'Connect yourself', 'Have you ever dreamed of connecting your brain to a computer? We are the answer.', 'neuralink.com', '../img/imagenes_usuarios/neuralinkv3-min.jpg','Neuralink', '21');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('9', 'Dress like the future', 'The most stylish clothes for the new generation. Wear the future in the present.', 'DressX.com', '../img/imagenes_usuarios/modav3-min.jpg','DressX', '4');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('10', 'Tech meds', 'Science has helped to create the most advanced meds humanity has ever known', 'MedsX.com', '../img/imagenes_usuarios/medsv3-min.jpg','MedsX', '20');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('11', 'CRISPR deliver', 'Change your DNA in seconds. Custom yourself the way you always wanted to be.', 'CRISPR.com', '../img/imagenes_usuarios/crisprv3-min.jpg','CRISPR', '21');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('1', 'Smart Homes are here!', 'The houses of the future are here. Be the first in your neighborhood.', 'smarthomeX.com', '../img/imagenes_usuarios/smarthomev3-min.jpg','SmarthomeX', '5');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('2', 'Make your sport team successful', 'Our management team will provide everything you need to be succesful as a brand in sports.', 'g2esports.com', '../img/imagenes_usuarios/funplus-min.jpg','G2esports', '11');




/*COMENTARIO*/
INSERT INTO COMENTARIO (persona_id, anuncio_id, descripcion)
VALUES ('1', '1', 'programar es superdivertido, quiero vuestro software');
INSERT INTO COMENTARIO (persona_id, anuncio_id, descripcion)
VALUES ('2', '1', 'omg so good!');
/*LIKE*/
INSERT INTO LIKES (persona_id, anuncio_id)
VALUES ('1', '1');

