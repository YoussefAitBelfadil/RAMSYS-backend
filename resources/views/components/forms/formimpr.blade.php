<div class="container">
    <form method="POST" action="{{ route('imprimante.store') }}" enctype="multipart/form-data" >
        @csrf
        <div class="row g-3">
            <div class="col-md-4">
                <input type="text" class="form-control text-center" name="type" value="IMPRIMANTE" placeholder="IMPRIMANTE" readonly>
            </div>

            <div class="col-md-4">
                <input type="text" class="form-control text-center" name="name" placeholder="Titre" required>
            </div>

            <div class="col-md-4">
                <input type="text" class="form-control text-center" name="Marque" placeholder="Marque" required>
            </div>

            <div class="col-md-4">
                <input type="text" class="form-control text-center" name="Fonctions" placeholder="Fonctions" required>
            </div>

            <div class="col-md-4">
                <input type="text" class="form-control text-center" name='Cartouches_impression' placeholder="Cartouches d'impression" required>
            </div>

            <div class="col-md-4">
                <input type="text" class="form-control text-center" name='Vitesse_impression_noir' placeholder="Vitesse d'impression noir" required>
            </div>

            <div class="col-md-4">
                <input type="text" class="form-control text-center" name='Vitesse_impression_couleur' placeholder="Vitesse d'impression couleur" required>
            </div>

            <div class="col-md-4">
                <input type="text" class="form-control text-center" name='Qualité_impression_noire' placeholder="Qualité d'impression noire" required>
            </div>

            <div class="col-md-4">
                <input type="text" class="form-control text-center" name='Qualité_impression_couleur' placeholder="Qualité d'impression couleur" required>
            </div>

            <div class="col-md-4">
                <input type="text" class="form-control text-center" name='Écran' placeholder="Écran" required>
            </div>

            <div class="col-md-4">
                <input type="text" class="form-control text-center" name='Connectivité' placeholder="Connectivité" required>
            </div>

            <div class="col-md-4">
                <input type="text" class="form-control text-center" name='Impression_recto/verso' placeholder="Impression recto/verso" required>
            </div>

            <div class="col-md-4">
                <input type="text" class="form-control text-center" name='Capacité_bac_papier' placeholder="Capacité bac papier" required>
            </div>

            <div class="col-md-4">
                <input type="text" class="form-control text-center" name="Dimensions" placeholder="Dimensions (l x p x h)" required>
            </div>

            <div class="col-md-4">
                <input type="text" class="form-control text-center" name="Poids" placeholder="Poids net" required>
            </div>

            <div class="col-md-4">
                <select class="form-select" name='Photocopieur' required>
                    <option value="" disabled selected hidden>Photocopieur</option>
                    <option value="OUI">OUI</option>
                    <option value="NON">NON</option>
                </select>
            </div>

            <div class="col-md-4">
                <select class="form-select" name='Câble_fourni' required>
                    <option value="" disabled selected hidden>Câble fourni</option>
                    <option value="NON">NON</option>
                    <option value="OUI">OUI</option>
                </select>
            </div>

            <div class="col-md-4">
                <input type="number" class="form-control text-center" name="Prix" placeholder="Prix" required>
            </div>

            <div class="col-md-4">
                <input type="number" class="form-control text-center" name='Quantité_en_stock' placeholder="Quantité en stock" required>
            </div>

            <div class="col-md-4">
                <textarea class="form-control text-center" name="Description" placeholder="Description" required></textarea>
            </div>

            <div class="col-md-4">
                <input type="file" class="form-control text-center" name="Image" required>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Soumettre</button>
            </div>
        </div>
    </form>
</div>
