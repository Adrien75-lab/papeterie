    <main class="container">
      <div id="wrap">
        <h2>Liste des produits de la catégorie papeterie</h2>
        <table class="table table-bordered">
        <tbody id="ligne">
            <tr>
                <th width="10%">REFERENCE</th>
                <th width="40%">DESCRIPTION</th>
                <th width="10%">PRIX UNITAIRE</th>
                <th width="10%">QUANTITE</th>
            </tr>
            <?php
/*                foreach ($caddie as $produit) {
                    echo '<tr>
                    <td>' . $produit['ref'] . '</td>
                    <td>' . $produit['lib'] . '</td>
                    <td class="affDroite">' . $produit['prix'] . '</td>
                    <td>' . $produit['qtt'] . '</td>
                    </tr>';        
                }
 */
            foreach ($caddie as $article) {
                echo '<tr>
                    <td>' . $article->getRef() . '</td>
                    <td>' . $article->getLibelle() . '</td>
                    <td class="affDroite">' . $article->getPrix() . '</td>
                    <td>' . $article->getQuantite() . '</td>
                    </tr>';
            }
            ?>
            <tr>
                <td></td>
                <td class="prix">Total</td>
                <td class="prix"><?php echo $total; ?></td>
                <td></td>
            </tr> 
        </tbody>
      </table>
      </div>
    </main>
