<div class="container">
    <form method="POST" action="{{ route('imprimante.store') }}" novalidate>
        @csrf
        <div class="row g-3">
            <div class="col-md-4">
                <input type="text" class="form-control text-center" value="IMPRIMANTE" readonly>
            </div>

            <div class="col-md-4">
                <input type="text" class="form-control text-center" name="titre" placeholder="Titre" required>
            </div>

            <div class="col-md-4">
                <input type="text" class="form-control text-center" name="marque" placeholder="Marque" required>
            </div>

            <div class="col-md-4">
                <input type="text" class="form-control text-center" name="fonctions" placeholder="Fonctions" required>
            </div>

            <div class="col-md-4">
                <input type="text" class="form-control text-center" name="cartouches" placeholder="Cartouches d'impression" required>
            </div>

            <div class="col-md-4">
                <input type="text" class="form-control text-center" name="vitesse_noir" placeholder="Vitesse d'impression noir" required>
            </div>

            <div class="col-md-4">
                <input type="text" class="form-control text-center" name="vitesse_couleur" placeholder="Vitesse d'impression couleur" required>
            </div>

            <div class="col-md-4">
                <input type="text" class="form-control text-center" name="qualite_noir" placeholder="Qualité d'impression noire" required>
            </div>

            <div class="col-md-4">
                <input type="text" class="form-control text-center" name="qualite_couleur" placeholder="Qualité d'impression couleur" required>
            </div>

            <div class="col-md-4">
                <input type="text" class="form-control text-center" name="ecran" placeholder="Écran" required>
            </div>

            <div class="col-md-4">
                <input type="text" class="form-control text-center" name="connectivite" placeholder="Connectivité" required>
            </div>

            <div class="col-md-4">
                <input type="text" class="form-control text-center" name="recto_verso" placeholder="Impression recto/verso" required>
            </div>

            <div class="col-md-4">
                <input type="text" class="form-control text-center" name="capacite_bac" placeholder="Capacité bac papier" required>
            </div>

            <div class="col-md-4">
                <input type="text" class="form-control text-center" name="dimensions" placeholder="Dimensions (l x p x h)" required>
            </div>

            <div class="col-md-4">
                <input type="text" class="form-control text-center" name="poids" placeholder="Poids net" required>
            </div>

            <div class="col-md-4">
                <select class="form-select" name="photocopieur" required>
                    <option value="" disabled selected hidden>Photocopieur</option>
                    <option value="OUI">OUI</option>
                    <option value="NON">NON</option>
                </select>
            </div>

            <div class="col-md-4">
                <select class="form-select" name="cable_fourni" required>
                    <option value="" disabled selected hidden>Câble fourni</option>
                    <option value="NON">NON</option>
                    <option value="OUI">OUI</option>
                </select>
            </div>

            <div class="col-md-4">
                <input type="number" class="form-control text-center" name="prix" placeholder="Prix" required>
            </div>

            <div class="col-md-4">
                <input type="number" class="form-control text-center" name="quantite" placeholder="Quantité en stock" required>
            </div>

            <div class="col-md-4">
                <textarea class="form-control text-center" name="description" placeholder="Description" required></textarea>
            </div>

            <div class="col-md-4">
                <input type="file" class="form-control text-center" name="image" required>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Soumettre</button>
            </div>
        </div>
    </form>
</div>
