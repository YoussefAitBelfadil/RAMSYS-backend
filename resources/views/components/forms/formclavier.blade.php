@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{ route('clavier.store') }}" id="stockageForm" enctype="multipart/form-data" method="POST">
    @csrf
    <div class="m-2 d-grid gap-1" style="grid-template-columns: repeat(3, 1fr); grid-gap: 10px;">

        <div class="p-2">
            <input required class="form-control text-center" readonly value="CLAVIER" type="text" id="type" name="type" placeholder="CLAVIER">
        </div>

        <div class="p-2">
            <input required class="form-control text-center" type="text" id="name" name="name" placeholder="Titre">
            <span class="text-danger error-message" id="error-name"></span>
        </div>

        <div class="p-2">
            <input required class="form-control text-center" type="text" id="Marque" name='Marque' placeholder="Marque">
            <span class="text-danger error-message" id="error-Marque"></span>
        </div>

        <div class="p-2">
            <input required class="form-control text-center" type="text" id="Norme_du_clavier" name='Norme_du_clavier' placeholder="Norme du clavier">
            <span class="text-danger error-message" id="error-Norme_du_clavier"></span>
        </div>


        <div class="p-2">
            <select required class="form-select text-center" id="Liaison" name='Liaison'>
                <option value="" disabled selected hidden>Liaison</option>
                <option value="Avec_fil">Avec fil</option>
                <option value="Sans_fil">Sans fil - USB</option>
            </select>
            <span class="text-danger error-message" id="error-Liaison"></span>
        </div>

        <div class="p-2">
            <input required class="form-control text-center" type="text" id="Poids" name="Poids" placeholder="Poids">
            <span class="text-danger error-message" id="error-Poids"></span>
        </div>

        <div class="p-2">
            <select required class="form-select text-center" id="Clavier_rétroéclairé" name='Clavier_rétroéclairé'>
                <option value="" disabled selected hidden>Clavier rétroéclairé</option>
                <option value="OUI">OUI</option>
                <option value="NON">NON</option>
            </select>
            <span class="text-danger error-message" id="error-Clavier_rétroéclairé"></span>
        </div>

        <div class="p-2">
            <select required class="form-select text-center" id="Clavier_numérique" name='Clavier_numérique'>
                <option value="" disabled selected hidden>Clavier numérique</option>
                <option value="OUI">OUI</option>
                <option value="NON">NON</option>
            </select>
            <span class="text-danger error-message" id="error-Clavier_numérique"></span>
        </div>

        <div class="p-2">
            <input required class="form-control text-center" type="text" id="Prix" name='Prix' placeholder="Prix">
            <span class="text-danger error-message" id="error-Prix"></span>
        </div>

        <div class="p-2">
            <input required class="form-control text-center" type="text" id="Quantité_en_stock" name='Quantité_en_stock' placeholder="Quantité en stock">
            <span class="text-danger error-message" id="error-Quantité_en_stock"></span>
        </div>

        <div class="p-2">
            <input required class="form-control text-center" type="text" id="Description" name="Description" placeholder="Description">
            <span class="text-danger error-message" id="error-Description"></span>
        </div>

        <div class="p-2">
            <input type="file" id="Image" name="Image" class="form-control text-center" placeholder="Image" required>
            <span class="text-danger error-message" id="error-Image"></span>
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
    <button type="submit" class="btn btn-primary">Submit form</button>
</form>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("stockageForm").addEventListener("submit", function(event) {
            let errors = {};

            // Réinitialiser les messages d'erreur
            document.querySelectorAll(".error-message").forEach(el => el.innerText = "");

            // Récupération des champs
            let type = document.getElementById("type").value.trim();
            let name = document.getElementById("name").value.trim();
            let marque = document.getElementById("Marque").value.trim();
            let prix = document.getElementById("Prix").value.trim();
            let Norme = document.getElementById("Norme_du_clavier").value.trim();
            let quantite = document.getElementById("Quantité_en_stock").value.trim();
            let poids = document.getElementById("Poids").value.trim();
            let Liaison = document.getElementById("Liaison").value;
            let description = document.getElementById("Description").value.trim();
            let Clavier_rétroéclairé = document.getElementById("Clavier_rétroéclairé").value;
            let Clavier_numérique = document.getElementById("Clavier_numérique").value;
            let image = document.getElementById("Image").files[0];

            // Vérifications et stockage des erreurs
            if (type === "")
                errors["type"] = "Le champ 'Type' est obligatoire.";

            if (!["Avec_fil", "Sans_fil"].includes(Liaison))
                errors["Liaison"] = "Veuillez choisir un Liaison valide.";

             if (!["OUI", "NON"].includes(Clavier_rétroéclairé))
                errors["Clavier_rétroéclairé"] = "Veuillez choisir une Clavier rétroéclairé valide.";

            if (!["OUI", "NON"].includes(Clavier_numérique))
                errors["Clavier_numérique"] = "Veuillez choisir une Clavier numérique valide.";

            if (name === "")
                errors["name"] = "Le champ 'Titre' est obligatoire.";

            if (marque === "")
                errors["Marque"] = "Le champ 'Marque' est obligatoire.";

            if (isNaN(Number(prix)) || prix <= 0)
                errors["Prix"] = "Le champ 'Prix' doit être un nombre positif.";

            if (!Number.isInteger(Number(quantite)) || quantite <= 0)
                errors["Quantité_en_stock"] = "Le champ 'Quantité' doit être un entier positif.";

            if (!Number.isInteger(Number(poids)) || poids <= 0)
                errors["Poids"] = "Le champ 'Poids' doit être un entier positif.";

            if (description.length < 25)
                errors["Description"] = "La description doit contenir au moins 25 caractères.";

            if (image) {
                let allowedTypes = ["image/jpeg", "image/png", "image/gif"];
                if (!allowedTypes.includes(image.type)) errors["Image"] = "L'image doit être au format JPG, PNG ou GIF.";
                if (image.size > 10240 * 1024) errors["Image"] = "L'image ne doit pas dépasser 10 Mo.";
            }

            // Affichage des erreurs sous chaque champ
            if (Object.keys(errors).length > 0) {
                event.preventDefault(); // Empêche l'envoi du formulaire
                for (let key in errors) {
                    document.getElementById("error-" + key).innerText = errors[key];
                }
            }
        });
    });
    </script>
