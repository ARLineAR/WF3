<?php

	//insère 200 livres au hasard en base de données






$book = new Book;

for( $book=1; $book<=200; $book++){
            $book = new Book("$book");
        }
echo $book -> getId();