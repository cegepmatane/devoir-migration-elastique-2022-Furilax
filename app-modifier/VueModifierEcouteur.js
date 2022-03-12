class VueModifierEcouteur {

    constructor() {
        this.html = document.getElementById("html-vue-modifier-ecouteur").innerHTML;
        this.actionModifierEcouteur = null;
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

        let id = this.ecouteur.id;
        let nom = document.getElementById("ecouteur-nom").value;
        let marque = document.getElementById("ecouteur-marque").value;
        let couleur = document.getElementById("ecouteur-couleur").value;
        let autonomie = document.getElementById("ecouteur-autonomie").value;
        let reductionBruit = document.getElementById("ecouteur-reductionBruit").value;
        let ecouteEnvironnement = document.getElementById("ecouteur-ecouteEnvironnement").value;
        let resistanceEau = document.getElementById("ecouteur-resistanceEau").value;

        this.actionModifierEcouteur(new Ecouteur(nom, marque, couleur, autonomie, reductionBruit, ecouteEnvironnement, resistanceEau, id));
    }

}