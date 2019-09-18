    <main class="container">
      <div id="wrap">
        <h2>Liste des produits</h2>
        <br>
        <form method="get" action="index.php">
            <input type="hidden" name="modele" value="produit">
            <input type="hidden" name="action" value="liste">
            <select name="categorie">
                <?php
                    if(isset($_GET['categorie'])){
                        $choixCategorie = $_GET['categorie'];
                    } else {
                        $choixCategorie = 1;
                    }
                    foreach($listeCategorie as $categorie){
                        if ($categorie->getId_categ() == $choixCategorie){
                            $attr = 'selected';
                        } else {
                            $attr = '';
                        }
                        echo '<option '.$attr.' value="'.$categorie->getId_categ().'">'.$categorie->getLibelle().'</option>';
                    }
                ?>
            </select>
            <button type="submit">Valider</button>
        </form>
        <br>
        <table class="table table-bordered">
        <tbody id="ligne">
          <tr>
            <th class="text-center w-10">REFERENCE</th>
            <th class="w-60">DESCRIPTION</th>
            <th class="text-center w-10">PRIX<br>UNITAIRE</th>
            <th class="text-center w-10">AJOUTER<br>AU PANIER</th>
          </tr>
          <?php
            foreach($listeProduit as $produit){
                
                echo '<tr>';
                echo '<td class="text-center">'.$produit->getRef().'</td>';
                echo '<td>'.$produit->getLibelle().'</td>';
                echo '<td class="prix text-center">'.$produit->getPrix().'</td>';
                echo '<td class="text-center">
                <form method="get" action="index.php">
                    <input type="hidden" name="modele" value="caddie"/>
                    <input type="hidden" name="action" value="ajout"/>
                    <input type="number" name="qtt" value="1" min="1" />
                    <input type="hidden" name="categorie" value="'.$produit->getId_categ().'">
                    <input type="hidden" name="ref" value="'.$produit->getRef().'">';
                echo '<input type="hidden" name="libelle" value="'.$produit->getLibelle().'">';
                echo '<input type="hidden" name="prix" value="'.$produit->getPrix().'">
                    <button type="submit" class="btn"><img src="images/cadPlus.jpg"/></button>
                </form></td></tr>';
            }
            ?>
        </tbody>
      </table>
      </div>
    </main>
