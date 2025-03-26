<form action="{{ route('tablette.store') }}" method="POST" class="d-flex flex-column justify-content-center align-content-center">
    @csrf
    <div class="row m-2 d-grid gap-1" style="grid-template-columns: repeat(3, 2fr); grid-gap: 10px;">
        <div class="p-2">
            <input required type="text" name="tablette" class="form-control text-center" placeholder="TABLETTE GRAPHIQUE">
        </div>

        <div class="p-2">
            <input required type="text" name="titre" class="form-control text-center" placeholder="Titre">
        </div>

        <div class="p-2">
            <input required type="text" name="marque" class="form-control text-center" placeholder="Marque">
        </div>

        <div class="p-2">
            <input required type="text" name="taille" class="form-control text-center" placeholder="Taille de la tablette">
        </div>

        <div class="p-2">
            <input required type="text" name="surface" class="form-control text-center" placeholder="Surface active">
        </div>

        <div class="p-2">
            <input required type="text" name="touches" class="form-control text-center" placeholder="Touches/Bouton">
        </div>

        <div class="p-2">
            <input required type="text" name="pression" class="form-control text-center" placeholder="Niveaux de pression">
        </div>

        <div class="p-2">
            <input required type="text" name="connectivite" class="form-control text-center" placeholder="Connectivité">
        </div>

        <div class="p-2">
            <input required type="text" name="poids" class="form-control text-center" placeholder="Poids">
        </div>

        <div class="p-2">
            <input required type="text" name="resolution" class="form-control text-center" placeholder="Résolution">
        </div>

        <div class="p-2">
            <input required type="text" name="stylet" class="form-control text-center" placeholder="Stylet">
        </div>

        <div class="p-2">
            <input required type="text" name="vitesse" class="form-control text-center" placeholder="Vitesse de lecture (stylet)">
        </div>

        <div class="p-2">
            <input required type="text" name="cable" class="form-control text-center" placeholder="Câble fourni">
        </div>

        <div class="p-2">
            <input required type="text" name="batterie" class="form-control text-center" placeholder="Batterie">
        </div>

        <div class="p-2">
            <input required type="text" name="autonomie" class="form-control text-center" placeholder="Durée de fonctionnement/charge">
        </div>

        <div class="p-2">
            <input required type="text" name="ergonomie" class="form-control text-center" placeholder="Ergonomie">
        </div>

        <div class="p-2">
            <input required type="text" name="multi_touch" class="form-control text-center" placeholder="Saisie multi-touch">
        </div>

        <div class="p-2">
            <input required type="text" name="prix" class="form-control text-center" placeholder="Prix">
        </div>

        <div class="p-2">
            <input required type="text" name="quantite" class="form-control text-center" placeholder="Quantité en stock">
        </div>

        <div class="p-2">
            <input required type="text" name="description" class="form-control text-center" placeholder="Description">
        </div>

        <div class="p-2">
            <input required type="file" name="image" class="form-control text-center">
        </div>
    </div>
    <button type="submit" class="btn btn-primary w-25 mx-auto">Ajouter</button>
</form>

