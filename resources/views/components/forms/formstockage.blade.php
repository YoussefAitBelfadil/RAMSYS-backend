@if ($errors->any())
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            alert("Erreur de validation : vérifiez vos champs !");
        });
    </script>
@endif


<form action="{{ route('stockage.store') }}" enctype="multipart/form-data" method="POST">
    @csrf
    <div class="m-2 d-grid gap-1" style="grid-template-columns: repeat(3, 1fr); grid-gap: 10px;">

        <div class="p-2">
            <input required class="form-control text-center" readonly value="Stockage" type="text" name="type" placeholder="Stockage">
        </div>

        <div class="p-2">
            <select required class="form-select text-center" name='Sous-catégories'>
                <option value="" disabled selected hidden>Sous-catégories</option>
                <option value="Disque_dur_portable">Disque dur portable</option>
                <option value="Disque_dur_interne">Disque dur interne</option>
                <option value="Clé_USB">Clé USB</option>
                <option value="Carte_mémoire">Carte mémoire</option>
            </select>
        </div>

        <div class="p-2">
            <input required class="form-control text-center" type="text" name='name' placeholder="Titre">
        </div>

        <div class="p-2">
            <input required class="form-control text-center" type="text" name='Marque' placeholder="Marque">
        </div>

        <div class="p-2">
            <input required class="form-control text-center" type="text" name='Prix' placeholder="Prix">
        </div>

        <div class="p-2">
            <input required class="form-control text-center" type="number" name='Quantité_en_stock' placeholder="Quantité en stock">
        </div>

        <div class="p-2">
            <input required class="form-control text-center" type="text" name="Description" placeholder="Description">
        </div>

        <div class="p-2">
            <input type="file" name="Image" class="form-control text-center" placeholder="Image" required>
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

