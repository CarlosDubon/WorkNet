<div class="ec-stars-wrapper">
    <a href="#" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
    <a href="#" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
    <a href="#" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
    <a href="#" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
    <a href="#" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
</div>
<p>(0/5) 0 votos</p>
<style>
    .ec-stars-wrapper {
	/* Espacio entre los inline-block (los hijos, los `a`) 
	   http://ksesocss.blogspot.com/2012/03/display-inline-block-y-sus-empeno-en.html */
	font-size: 0;
	/* Podríamos quitarlo, 
		pero de esta manera (siempre que no le demos padding), 
		sólo aplicará la regla .ec-stars-wrapper:hover a cuando
		también se esté haciendo hover a alguna estrella */
	display: inline-block;
}
.ec-stars-wrapper a {
	text-decoration: none;
	display: inline-block;
	/* Volver a dar tamaño al texto */
	font-size: 32px;
	font-size: 2rem;
	
	color: #888;
}

.ec-stars-wrapper:hover a {
	color: rgb(241, 196, 15);
}
/*
 * El selector de hijo, es necesario para aumentar la especifidad
 */
.ec-stars-wrapper > a:hover ~ a {
	color: #888;
}
</style>

<?php

?>