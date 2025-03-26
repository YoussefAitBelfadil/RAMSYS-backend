<form action="{{ route('stockage.store') }}" method="POST">
    @csrf
    <div class="m-2 d-grid gap-1" style="grid-template-columns: repeat(3, 1fr); grid-gap: 10px;">

        <div class="p-2">
            <input required class="form-control text-center" type="text" name="model" placeholder="Stockage">
        </div>

        <div class="p-2">
            <select required class="form-select text-center" name="category">
                <option value="" disabled selected hidden>Sous-catégories</option>
                <option value="Disque dur portable">Disque dur portable</option>
                <option value="Disque dur interne">Disque dur interne</option>
                <option value="Clé USB">Clé USB</option>
                <option value="Carte mémoire">Carte mémoire</option>
            </select>
        </div>

        <div class="p-2">
            <input required class="form-control text-center" type="text" name="title" placeholder="Titre">
        </div>

        <div class="p-2">
            <input required class="form-control text-center" type="text" name="brand" placeholder="Marque">
        </div>

        <div class="p-2">
            <input required class="form-control text-center" type="text" name="price" placeholder="Prix">
        </div>

        <div class="p-2">
            <input required class="form-control text-center" type="text" name="stock" placeholder="Quantité en stock">
        </div>

        <div class="p-2">
            <input required class="form-control text-center" type="text" name="description" placeholder="Description">
        </div>

        <div class="p-2">
            <input required class="form-control text-center" type="text" name="image" placeholder="Image">
        </div>

    </div>
    <button type="submit" class="btn btn-primary">Submit form</button>
</form>
