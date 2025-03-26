<div>
    <div class="p-2">
        <select id="typeSelect" class="form-select text-center" style="width: 300px; height: 50px; border-radius: 5px;" onchange="showForm(this.value)">
            <option value="" disabled selected hidden>Type</option>
            <option value="clavier">Clavier</option>
            <option value="souris">Souris</option>
            <option value="stockage">Stockage</option>
        </select>
    </div>

    <div id="formContainer" class="m-2 d-grid gap-1" style="grid-template-columns: repeat(2, 1fr); grid-gap: 10px;">

    </div>
</div>

<script>
    function showForm(type) {
    let formContainer = document.getElementById('formContainer');

    formContainer.innerHTML = '';

    if (type) {
        fetch(`/form/${type}`)
            .then(response => response.text())
            .then(data => {
                formContainer.innerHTML = data;
            })
            .catch(error => {
                console.error('Error loading form:', error);
            });
    }
}



</script>
