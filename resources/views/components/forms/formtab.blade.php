<form action="{{ route('tablette.store') }}" method="POST"  enctype="multipart/form-data" class="d-flex flex-column justify-content-center align-content-center">
    @csrf
    <div class="row m-2 d-grid gap-1" style="grid-template-columns: repeat(3, 2fr); grid-gap: 10px;">
        <div class="p-2">
            <input required  readonly value="TABLETTE GRAPHIQUE" type="text" name="type" class="form-control text-center" placeholder="TABLETTE GRAPHIQUE">
        </div>

        <div class="p-2">
            <input required type="text" name="name" class="form-control text-center" placeholder="Titre">
        </div>

        <div class="p-2">
            <input required type="text" name="Marque" class="form-control text-center" placeholder="Marque">
        </div>

        <div class="p-2">
            <input required type="text" name="Taille_de_la_tablette" class="form-control text-center" placeholder="Taille de la tablette">
        </div>

        <div class="p-2">
            <input required type="text" name='Surface_active' class="form-control text-center" placeholder="Surface active">
        </div>

        <div class="p-2">
            <input required type="text" name='Touches/Bouton' class="form-control text-center" placeholder="Touches/Bouton">
        </div>

        <div class="p-2">
            <input required type="text" name='Niveaux_de_pression' class="form-control text-center" placeholder="Niveaux de pression">
        </div>

        <div class="p-2">
            <input required type="text" name='Connectivité' class="form-control text-center" placeholder="Connectivité">
        </div>

        <div class="p-2">
            <input required type="text" name="Poids" class="form-control text-center" placeholder="Poids">
        </div>

        <div class="p-2">
            <input required type="text" name="Résolution" class="form-control text-center" placeholder="Résolution">
        </div>

        <div class="p-2">
            <input required type="text" name="Stylet" class="form-control text-center" placeholder="Stylet">
        </div>

        <div class="p-2">
            <input required type="text" name='Vitesse_de_lecture' class="form-control text-center" placeholder="Vitesse de lecture (stylet)">
        </div>

        <div class="p-2">
            <input required type="text" name='Câble_fourni' class="form-control text-center" placeholder="Câble fourni">
        </div>

        <div class="p-2">
            <input required type="text" name="Batterie" class="form-control text-center" placeholder="Batterie">
        </div>

        <div class="p-2">
            <input required type="text" name='Durée_de_fonctionnement' class="form-control text-center" placeholder="Durée de fonctionnement/charge">
        </div>

        <div class="p-2">
            <input required type="text" name='Ergonomie' class="form-control text-center" placeholder="Ergonomie">
        </div>

        <div class="p-2">
            <input required type="text" name='Saisie_multi-touch' class="form-control text-center" placeholder="Saisie multi-touch">
        </div>

        <div class="p-2">
            <input required type="text" name="Prix" class="form-control text-center" placeholder="Prix">
        </div>

        <div class="p-2">
            <input required type="text" name='Quantité_en_stock' class="form-control text-center" placeholder="Quantité en stock">
        </div>

        <div class="p-2">
            <input required type="text" name="Description" class="form-control text-center" placeholder="Description">
        </div>

        <div class="p-2">
            <input required type="file" name="Image" class="form-control text-center">
        </div>

        <div class="p-2">
            <input type="file" id="Image2" name="Image2" class="form-control text-center" placeholder="Image" required>
            <span class="text-danger error-message" id="error-Image"></span>
        </div>

        <div class="p-2">
            <input type="file" id="Image3" name="Image3" class="form-control text-center" placeholder="Image" required>
            <span class="text-danger error-message" id="error-Image"></span>
        </div>

        <div class="p-2">
            <input type="file" id="Image4" name="Image4" class="form-control text-center" placeholder="Image" >
            <span class="text-danger error-message" id="error-Image"></span>
        </div>

        <div class="p-2">
            <input type="file" id="Image5" name="Image5" class="form-control text-center" placeholder="Image" >
            <span class="text-danger error-message" id="error-Image"></span>
        </div>

    </div>
    <button type="submit" class="btn btn-primary w-25 mx-auto">Ajouter</button>
</form>

