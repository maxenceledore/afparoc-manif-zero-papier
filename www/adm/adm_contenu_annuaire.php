<!-- Ce document est placé sous la licence Creative Commons CC-BY-SA.
Auteurs : Maxence Le Doré, Rémi Cordelet -->
<p>
      <table>
        <tr>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Ville</th>
          <th>e-mail</th>
          <th>Fiche détaillée</th>
          <?php
            include_once 'utilisateurs.php';

            $mysqli = new mysqli('localhost',$login,$mdp, $bdd);

            if(mysqli_connect_errno())
              header('Location: ../index.php?page=err');

            $req_resume_annu =
            "SELECT id,nom,prenom,adresse_ville,email ".
            "FROM Fiche_contacts ORDER BY nom";

            //TODO: abandon pour requête préparée
            $req_resume_annu = $mysqli->real_escape_string($req_resume_annu);

            $res_resume_annu = $mysqli->query($req_resume_annu);
            while ($fiche = mysqli_fetch_array($res_resume_annu)) {

              $nf = $fiche['id'];
              echo
              "<tr>".
                "<td>".$fiche['nom']."</td><td>".$fiche['prenom']."</td>".
                "<td>".$fiche['adresse_ville']."</td><td>".$fiche['email']."</td>".
                "<td>".
                  "<button onclick=\"location.href='adm_index.php?page=fiche&nf=$nf'\" type=\"button\"> Afficher/Ajourer </button>".
                "</td>".
//                "<td>".
//                  "<button onclick=\"location.href='adm/adm_fiche_del.php?nf=$nf'\" type=\"button\"> Supprimer </button>".
//                "</td>".
              "</tr>";
            }
            ?>
      </table>
</p>
