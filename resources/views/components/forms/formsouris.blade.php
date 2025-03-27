<form action="{{ route('souris.store') }}" enctype="multipart/form-data" method="POST">
    @csrf
    <div class="m-2 d-grid gap-1" style="grid-template-columns: repeat(3, 2fr); grid-gap: 10px;">

        <div class="p-2">
            <input required class="form-control text-center" readonly value="SOURIS" type="text" name="type" placeholder="SOURIS">
        </div>

        <div class="p-2">
            <input required class="form-control text-center" type="text" name='name' placeholder="Titre">
        </div>

        <div class="p-2">
            <input required class="form-control text-center" type="text" name='Marque' placeholder="Marque">
        </div>

        <div class="p-2">
            <select required class="form-select text-center" name='Liaison'>
                <option value="" disabled selected hidden>Liaison</option>
                <option value="Avec fil">Avec fil</option>
                <option value="Sans_fil">Sans fil - USB</option>
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

        <div class="p-2">
            <input type="file" id="Image2" name="Image2" class="form-control text-center" placeholder="Image" required>
        </div>

        <div class="p-2">
            <input type="file" id="Image3" name="Image3" class="form-control text-center" placeholder="Image" required>
        </div>

        <div class="p-2">
            <input type="file" id="Image4" name="Image4" class="form-control text-center" placeholder="Image" >
        </div>

        <div class="p-2">
            <input type="file" id="Image5" name="Image5" class="form-control text-center" placeholder="Image" >
        </div>

    </div>
    <button type="submit" class="btn btn-primary">Submit form</button>
</form>
