INSERT INTO PERSONA (nickname, password, nombre, apellidos, email, foto_perfil, pagina_contacto)
VALUES ('adrian', 'prueba', 'adrian', 'danlos', 'adrian.com', 'https://c.wallhere.com/photos/91/73/home_alone_macaulay_culkin_kevin_mccallister_boy_fear_shout_fright-795921.jpg!d', 'adrianweb.com');
INSERT INTO PERSONA (nickname, password, nombre, apellidos, email, foto_perfil, pagina_contacto)
VALUES ('julen', 'prueba', 'julen', 'x', 'adrian.com', 'https://c.wallhere.com/photos/91/73/home_alone_macaulay_culkin_kevin_mccallister_boy_fear_shout_fright-795921.jpg!d', 'adrianweb2.com');
INSERT INTO PERSONA (nickname, password, nombre, apellidos, email, foto_perfil, pagina_contacto)
VALUES ('iñaki', 'prueba', 'iñaki', 'a', 'iñaki.com', 'https://c.wallhere.com/photos/91/73/home_alone_macaulay_culkin_kevin_mccallister_boy_fear_shout_fright-795921.jpg!d', 'iñaki.com');
INSERT INTO PERSONA (nickname, password, nombre, apellidos, email, foto_perfil, pagina_contacto)
VALUES ('sergio', 'prueba', 'sergio', 'z', 'sergio.com', 'https://c.wallhere.com/photos/91/73/home_alone_macaulay_culkin_kevin_mccallister_boy_fear_shout_fright-795921.jpg!d', 'sergio.com');
INSERT INTO PERSONA (nickname, password, nombre, apellidos, email, foto_perfil, pagina_contacto)
VALUES ('juan', 'prueba', 'juan', 'f', 'juan.com', 'https://c.wallhere.com/photos/91/73/home_alone_macaulay_culkin_kevin_mccallister_boy_fear_shout_fright-795921.jpg!d', 'juan.com');


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


INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('1', 'espacio', 'viaja por el espacio', 'micontactoespacio', 'https://live.staticflickr.com/4654/25254688767_83c0563d06_b.jpg','spaceX', '1');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('2', 'mis peliculas', 'cine mazo chulo', 'micontactoespacio', 'https://www.teslarati.com/wp-content/uploads/2019/10/Starship-Mk1-2019-SpaceX-Boca-Chica-2-crop-c.jpg','cinesX', '2');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('3', 'cochesnuevos', 'comprate lo ultimo', 'micontactoespacio', 'https://live.staticflickr.com/4654/25254688767_83c0563d06_b.jpg','cochesX', '3');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('4', 'cunas', 'pal bebé', 'micontactoespacio', 'https://live.staticflickr.com/4654/25254688767_83c0563d06_b.jpg','cunasX', '4');
INSERT INTO ANUNCIO (persona_id, titulo, descripcion, datos_contacto, imagen, nombre_empresa, categoria_id)
VALUES ('5', 'metales', 'forja tu imperio', 'micontactoespacio', 'https://live.staticflickr.com/4654/25254688767_83c0563d06_b.jpg','metalesX', '5');


INSERT INTO COMENTARIO (persona_id, anuncio_id, descripcion)
VALUES ('1', '1', 'tio mola un monton tu empresa loco');



