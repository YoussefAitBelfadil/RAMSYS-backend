<form action="{{ route('ecran.store') }}" method="POST">
        @csrf
        <div class="row m-2 d-grid gap-1" style="grid-template-columns: repeat(3, 2fr); grid-gap: 10px;">
            <div class="p-2">
                <input type="text" class="form-control" value="ECRAN" placeholder="ECRAN" readonly required>
            </div>
            <div class="p-2">
                <input type="text" class="form-control" name="titre" placeholder="Titre" required>
            </div>
            <div class="p-2">
                <input type="text" class="form-control" name="taille_ecran" placeholder="Taille de l'écran" required>
            </div>
            <div class="p-2">
                <input type="text" class="form-control" name="surface_active" placeholder="Surface active" required>
            </div>
            <div class="p-2">
                <input type="text" class="form-control" name="luminosite" placeholder="Luminosité" required>
            </div>
            <div class="p-2">
                <input type="text" class="form-control" name="resolution" placeholder="Résolution optimale" required>
            </div>
            <div class="p-2">
                <input type="text" class="form-control" name="temps_reponse" placeholder="Temps de réponse" required>
            </div>
            <div class="p-2">
                <input type="text" class="form-control" name="connectivite" placeholder="Connectivité" required>
            </div>
            <div class="p-2">
                <input type="text" class="form-control" name="dimensions" placeholder="Dimensions (l x p x h) en mm" required>
            </div>
            <div class="p-2">
                <input type="text" class="form-control" name="poids" placeholder="Poids net en kg" required>
            </div>
            <div class="p-2">
                <input type="text" class="form-control" name="consommation" placeholder="Consommation normale" required>
            </div>
            <div class="p-2">
                <input type="text" class="form-control" name="description" placeholder="Description" required>
            </div>
            <div class="p-2">
                <input type="text" class="form-control" name="courbure" placeholder="Courbure de l'écran" required>
            </div>
            <div class="p-2">
                <input type="text" class="form-control" name="marque" placeholder="Marque" required>
            </div>
            <div class="p-2">
                <input type="number" class="form-control" name="prix" placeholder="Prix" required>
            </div>
            <div class="p-2">
                <input type="number" class="form-control" name="quantite_stock" placeholder="Quantité en stock" required>
            </div>
            <div class="p-2">
                <input type="file" class="form-control" name="image" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit form</button>
    </form>
