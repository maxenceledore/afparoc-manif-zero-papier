<!-- Ce document est placé sous la licence Creative Commons CC-BY-SA.
Auteurs : Maxence Le Doré, Rémi Cordelet -->
<?php
// Aussi bien accessible sur le site visiteur que sur la région gestion du site, au cas où.
include_once 'adm/utilisateurs.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Fiche CONTACT - Service RELATION STAGIAIRES</title>
    <link rel="stylesheet" type="text/css" href="afpa_form.css">
  </head>
  <body>
    <div id="page">
        <div id="bandeau-image">
    </div>
      <form action="adm/adm_enregistrement.php" method="post" id="fiche_stagiaire">
      <div class="cadre-section">
        Vos coordonnées 
      </div>
      <div>
      <ul>
        <li> <p>NOM</p>  <input type="text" maxlength="128" name="nom"> </li>
        <li> <p>Prénom</p> <input type="text" maxlength="128" name="prenom"> </li>
        <li> <p>Date de naissance (jj/mm/aaaa) </p> <input type="text" maxlength="10" name="date_naissance"> </li>
        <li> <p>Lieu de naissance</p> <input type="text" maxlength="128" name="lieu_naissance"> </li>
        <li> <p>Nationalité</p> <input type="text" maxlength="32" name="nationalite"> </li>
        <li> <p>Téléphone fixe</p> <input type="text" maxlength="16" name="tel_fix"> </li>
        <li> <p>Téléphone mobile</p> <input type="text" maxlength="16" name="tel_mobile"> </li>
        <li> <p>E-mail</p> <input type="text" maxlength="64" name="email"> </li>
        <li> <p>Adresse</p><input type="text" maxlength="128" name="adresse_voie"> </li>
        <li> <p>Ville</p> <input type="text" maxlength="64" name="adresse_ville"> </li>
        <li> <p>Code postal</p> <input type="text" maxlength="5" name="adresse_cp"> </li>
        <li> <p>Diplôme obtenu ou dernière classe suivie (indiquer aussi l'année)</p> <input type="text" maxlength="64" name="diplome_classe"> </li>
        </ul>
      <div class="cadre-section"> Votre situation </div>
      <ul>
        <div class="centrage">
        
          
          <li><input type="checkbox" name="status_actif[]" value="dmd_emploi"/> <p>Demandeur d'emploi</p></li>
          <li><input type="checkbox" name="status_actif[]" value="CSP"/><p>CSP</p></li>
          <li><input type="checkbox" name="status_actif[]" value="salarie_public"/><p>Salarié public</p></li>
          <li><input type="checkbox" name="status_actif[]" value="salarie_prive"/><p>Salarié privé</p></li>
          <p>Type de contrat si salarié</p>
          <p>
          <select name="contrat_salarie" id="contrat_salarie">
            <option value="---">---</option>
            <option value="CDD">CDD</option>
            <option value="CDI">CDI</option>
          </select>
          </p>
          
      </div>
      <br>
      <li><p> Identifiant Pôle Emploi </p><input type="text" maxlength="8" name="identifiant_pe"> </li>
      <p> ANCIENS SALARIES </p>
      <li>
      <input type="checkbox" name="anciens_salaries_situ_5ans" value="true"/>
      <p class="paragraphe-block">Au cours des 5 dernières années, vous avez travaillé 24 mois, à suivre ou non, quelle que soit la durée du contrat.</p> </li>
      <li>
      <input type="checkbox" name="anciens_salaries_situ_12mois" value="true"/>
      <p>Au cours des 12 derniers mois, vous avez travaillé 4 mois, à suivre ou non, sous CDD.
      </p></li>
      <p> ANCIENS INTERIMIAIRES </p>
      <li><input type="checkbox" name="anciens_interim_situ_18mois" value="true"/>
      <p class="paragraphe-block">Au cours des 18 derniers mois, vous avez totalisez 1600h en intérim (environ 10 mois).</p></li>
      <p> Quelle structure vous accompagne ? </p>
      <li><div class="centrage">
      <ul>
        <li><input type="checkbox" name="str_accomp[]" value="pe"/><p>Pôle Emploi</p></li>
        <li><input type="checkbox" name="str_accomp[]" value="ml"/><p>Mission locale</p></li>
        <li><input type="checkbox" name="str_accomp[]" value="ce"/><p>Cap Emploi</p></li>
        <li><input type="checkbox" name="str_accomp[]" value="ladom"/><p>LADOM</p></li>
        <li><input type="checkbox" name="str_accomp[]" value="adm_pen"/><p>Administration pénitentiaire</p></li></ul>
      </div></li>
      <li><p> REFERENT </p></li>
      <li><p> Nom </p> <input type="text" maxlength="128" name="accompagnement_referent_nom"> </li>
      <li><p> E-mail </p> <input type="text" maxlength="64" name="accompagnement_referent_mail"> </li>
      <li><p> Tél. </p> <input type="text" maxlength="16" name="accompagnement_referent_tel"></li>
      </ul>
      <div class="cadre-section">
        Votre projet
      </div>
      <ul>
      <li><p> Secteur professionnel ou métier visé </p><input type="text" maxlength="128" name="secteur_ou_metier_cible"> </li>
      <li><p> Formation souhaitée </p> <input type="text" maxlength="128" name="formation_cible_nom"></li>
      <li><p> Lieu</p> <input type="text" maxlength="128" name="formation_cible_lieu"> </li>
      </ul>
      <div class="cadre-section">
        Commentaires (Permis, mobilité, ...)
      </div>
      <p> <input type="text" name="commentaires" maxlength="2048" class="span-champ-saisie"> </p>
      <!--
      <div class="cadre-section">
        Suite donnée
      </div>
        <p> (Réservé à l'administration) </p>
        <div class="centrage">
          <input type="checkbox" id="saisie_brique"/> <label for="saisie_brique"> Saisie Brique </label>
        </div>
        <p> Suivi <input type="text" name="suivi"> </p>
      -->
      </form>
      <br><br><br>
      <div class="centrage">
        <p> <button class="bouton-enregistrer" type="submit" form="fiche_stagiaire" value="Submit">Enregistrer</button></p>
      </div>
    </div>

  </body>
</html>
