// Importer la class component
import { Component, OnInit } from '@angular/core';

// Importer la class router
import { Router } from '@angular/router';

// Définir le décorateur @Component({...}) => fonction qui prend un objet comme sélecteur
@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']   // => style dans un tableau
})

// Exporter la calss du component
export class AppComponent implements OnInit {

  // Initier une composante dans le constructor
  constructor(
    private router: Router
  ){}

  private burgerIsOpen = false;
  
  // Créer une fonction à appeler au click sur .fa-bars
  openBurger(){

    if( this.burgerIsOpen == false ){
   
  // Changer la valeur de burgerIsOpen
  this.burgerIsOpen = true;

    } else{
      // Changer la valeur de burgerIsOpen
      this.burgerIsOpen = false;
        };

  };

   // Créer une fonction pour fermer le burger menu
        closeBurger(link: any){

          //  Fermer le burger menu
          this.burgerIsOpen = false;

          // Naviguer vers la bonne vue
          this.router.navigate([link]);

        }

       
    // Attendre le chargement du composant
    ngOnInit(){
      console.log('Le composant est chargé')

      // Créer une variable pour sélectionner le loader en JavaScript
      let loader = document.getElementById('appLoader');

      // Ajouter la class closedLoader à la balise
      loader.classList.add('closedLoader');
    }
};
