<div class="container">
    <form id="laptopForm" action="{{ route('laptops.store') }}" method="POST" enctype="multipart/form-data" >
        @csrf
        <div class="row g-3">
            <div class="col-md-4">
                <input type="text" name="type" class="form-control" value="ORDINATEUR" readonly>
            </div>

            <div class="col-md-4">
                <input type="text" name="name" class="form-control" placeholder="Titre" required>
            </div>

            <div class="col-md-4">
                <select name="Sous_catégories" class="form-control" required>
                    <option value="" disabled selected hidden>Sous-catégorie</option>
                    <option value="PC_portable">PC portable</option>
                    <option value="PC_portable_gamer">PC portable gamer</option>
                    <option value="PC_de_bureau">PC de bureau</option>
                </select>
            </div>

            <div class="col-md-4">
                <input type="text" name="Marque" class="form-control" placeholder="Marque" required>
            </div>

            <div class="col-md-4">
                <input type="text" name="processor" class="form-control" placeholder="Processeur" required>
            </div>

            <div class="col-md-4">
                <input type="text" name="ram" class="form-control" placeholder="Mémoire vive (RAM)" required>
            </div>

            <div class="col-md-4">
                <input type="text" name="rom" class="form-control" placeholder="Taille du disque dur" required>
            </div>

            <div class="col-md-4">
                <input type="text" name="Carte_graphique" class="form-control" placeholder="Carte graphique" required>
            </div>

            <div class="col-md-4">
                <input type="text" name="Poids" class="form-control" placeholder="Poids en kg" required>
            </div>

            <div class="col-md-4">
                <input type="text" name="Taille_écran" class="form-control" placeholder="Taille de l'écran" required>
            </div>

            <div class="col-md-4">
                <input type="text" name="Couleur" class="form-control" placeholder="Couleur" required>
            </div>

            <div class="col-md-4">
                <input type="text" name="Dimensions" class="form-control" placeholder="Dimensions (l x p x h)" required>
            </div>

            <div class="col-md-4">
                <input type="text" name="Type_de_batterie" class="form-control" placeholder="Type de batterie / autonomie" required>
            </div>

            <div class="col-md-4">
                <input type="text" name="Système_exploitation" class="form-control" placeholder="Système d'exploitation" required>
            </div>

            <div class="col-md-4">
                <input type="text" name="Prix" class="form-control" placeholder="Prix" required>
            </div>

            <div class="col-md-4">
                <input type="text" name="Quantité_en_stock" class="form-control" placeholder="Quantité en stock" required>
            </div>

            <div class="col-md-4">
                <input type="text" name="Description" class="form-control" placeholder="Description" required>
            </div>

            <div class="col-md-4">
                <input type="file" name="Image" class="form-control" required>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit Form</button>
            </div>
        </div>
    </form>
</div>

<script>
    document.getElementById('laptopForm').addEventListener('submit', function(event) {
        let isValid = true;

        // Loop through each required input and validate
        const requiredInputs = document.querySelectorAll('input[required], select[required], textarea[required]');
        requiredInputs.forEach(input => {
            if (!input.value.trim()) {
                input.classList.add('is-invalid'); // Add the invalid class for styling
                isValid = false;
            } else {
                input.classList.remove('is-invalid'); // Remove invalid class if valid
            }
        });

        // Check if the form is valid, if not prevent submission
        if (!isValid) {
            event.preventDefault();
            alert("Please fill in all required fields.");
        }
    });
</script>

<style>
    .is-invalid {
        border: 1px solid red; /* Make the border red for invalid inputs */
    }
</style>
