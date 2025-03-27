<form action="{{ route('ecran.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="row m-2 d-grid gap-1" style="grid-template-columns: repeat(3, 2fr); grid-gap: 10px;">
            <div class="p-2">
                <input type="text" class="form-control" name="type" value="ECRAN" placeholder="ECRAN" readonly required>
            </div>
            <div class="p-2">
                <input type="text" class="form-control" name="name" placeholder="Titre" required>
            </div>
            <div class="p-2">
                <input type="text" class="form-control" name='Taille_écran' placeholder="Taille de l'écran" required>
            </div>
            <div class="p-2">
                <input type="text" class="form-control" name='Surface_active' placeholder="Surface active" required>
            </div>
            <div class="p-2">
                <input type="text" class="form-control" name='Luminosité' placeholder="Luminosité" required>
            </div>
            <div class="p-2">
                <input type="text" class="form-control" name='Résolution' placeholder="Résolution optimale" required>
            </div>
            <div class="p-2">
                <input type="text" class="form-control" name='Temps_de_réponse' placeholder="Temps de réponse" required>
            </div>
            <div class="p-2">
                <input type="text" class="form-control" name='Connectivité' placeholder="Connectivité" required>
            </div>
            <div class="p-2">
                <input type="text" class="form-control" name="Dimensions" placeholder="Dimensions (l x p x h) en mm" required>
            </div>
            <div class="p-2">
                <input type="text" class="form-control" name="Poids" placeholder="Poids net en kg" required>
            </div>
            <div class="p-2">
                <input type="text" class="form-control" name='Consommation_normale' placeholder="Consommation normale" required>
            </div>
            <div class="p-2">
                <input type="text" class="form-control" name="Description" placeholder="Description" required>
            </div>
            <div class="p-2">
                <input type="text" class="form-control" name='Courbure_écran' placeholder="Courbure de l'écran" required>
            </div>
            <div class="p-2">
                <input type="text" class="form-control" name="Marque" placeholder="Marque" required>
            </div>
            <div class="p-2">
                <input type="number" class="form-control" name="Prix" placeholder="Prix" required>
            </div>
            <div class="p-2">
                <input type="number" class="form-control" name='Quantité_en_stock' placeholder="Quantité en stock" required>
            </div>
            <div class="p-2">
                <input type="file" class="form-control" name="Image" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit form</button>
    </form>
