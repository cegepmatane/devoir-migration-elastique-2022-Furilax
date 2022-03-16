class VueModifierEcouteur {

    constructor() {
        this.html = document.getElementById("html-vue-modifier-ecouteur").innerHTML;
        this.actionModifierEcouteur = null;
        this.ecouteur = null;
    }

    initialiserEcouteur(ecouteur) {
        this.ecouteur = ecouteur;
    }

    initialiserActionModifierEcouteur(actionModifierEcouteur) {
        this.actionModifierEcouteur = actionModifierEcouteur;
    }

    afficher() {
        document.getElementsByTagName("body")[0].innerHTML = this.html;

        document.getElementById("ecouteur-nom").value = this.ecouteur.nom;
        document.getElementById("ecouteur-marque").value = this.ecouteur.marque;
        document.getElementById("ecouteur-couleur").value = this.ecouteur.couleur;
        document.getElementById("ecouteur-autonomie").value = this.ecouteur.autonomie;
        document.getElementById("ecouteur-reductionBruit").value = this.ecouteur.reductionBruit;
        document.getElementById("ecouteur-ecouteEnvironnement").value = this.ecouteur.ecouteEnvironnement;
        document.getElementById("ecouteur-resistanceEau").value = this.ecouteur.resistanceEau;

        document.getElementById("formulaire-modifier").addEventListener("submit", evenement => this.enregistrer(evenement));
    }

    enregistrer(evenement) {
        evenement.preventDefault();
        
        this.ecouteur.nom = document.getElementById("ecouteur-nom").value;
        this.ecouteur.marque = document.getElementById("ecouteur-marque").value;
        this.ecouteur.couleur = document.getElementById("ecouteur-couleur").value;
        this.ecouteur.autonomie = document.getElementById("ecouteur-autonomie").value;
        this.ecouteur.reductionBruit = document.getElementById("ecouteur-reductionBruit").value;
        this.ecouteur.ecouteEnvironnement = document.getElementById("ecouteur-ecouteEnvironnement").value;
        this.ecouteur.resistanceEau = document.getElementById("ecouteur-resistanceEau").value;

        this.actionModifierEcouteur(this.ecouteur);
    }

}