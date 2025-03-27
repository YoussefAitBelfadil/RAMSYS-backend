<form action="{{ route('clavier.store') }}" enctype="multipart/form-data" method="POST">
    @csrf
    <div class="m-2 d-grid gap-1" style="grid-template-columns: repeat(3, 1fr); grid-gap: 10px;">

        <div class="p-2">
            <input required class="form-control text-center" readonly value="CLAVIER" type="text" name="type" placeholder="CLAVIER">
        </div>

        <div class="p-2">
            <input required class="form-control text-center" type="text" name="name" placeholder="Titre">
        </div>

        <div class="p-2">
            <input required class="form-control text-center" type="text" name='Marque' placeholder="Marque">
        </div>

        <div class="p-2">
            <input required class="form-control text-center" type="text" name='Norme_du_clavier' placeholder="Norme du clavier">
        </div>


        <div class="p-2">
            <select required class="form-select text-center" name='Liaison'>
                <option value="" disabled selected hidden>Liaison</option>
                <option value="Avec_fil">Avec fil</option>
                <option value="Sans_fil">Sans fil - USB</option>
            </select>
        </div>

        <div class="p-2">
            <input required class="form-control text-center" type="text" name="Poids" placeholder="Poids">
        </div>

        <div class="p-2">
            <select required class="form-select text-center" name='Clavier_rétroéclairé'>
                <option value="" disabled selected hidden>Clavier rétroéclairé</option>
                <option value="OUI">OUI</option>
                <option value="NON">NON</option>
            </select>
        </div>

        <div class="p-2">
            <select required class="form-select text-center" name='Clavier_numérique'>
                <option value="" disabled selected hidden>Clavier numérique</option>
                <option value="OUI">OUI</option>
                <option value="NON">NON</option>
            </select>
        </div>

        <div class="p-2">
            <input required class="form-control text-center" type="text" name='Prix' placeholder="Prix">
        </div>

        <div class="p-2">
            <input required class="form-control text-center" type="text" name='Quantité_en_stock' placeholder="Quantité en stock">
        </div>

        <div class="p-2">
            <input required class="form-control text-center" type="text" name="Description" placeholder="Description">
        </div>

        <div class="p-2">
            <input type="file" name="Image" class="form-control text-center" placeholder="Image" required>
        </div>

    </div>
    <button type="submit" class="btn btn-primary">Submit form</button>
</form>
