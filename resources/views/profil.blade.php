@extends('layouts.Master')

@if (session('success'))
    <!-- Modal Bootstrap -->
    <div class="modal fade show" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true" style="display: block;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Succès</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(function() {
                var successModal = new bootstrap.Modal(document.getElementById("successModal"));
                successModal.show();
            }, 500); // Délai pour éviter un affichage immédiat
        });
    </script>
@endif

@if ($errors->any())
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            alert("Erreur de validation : vérifiez vos champs !");
        });
    </script>
@endif
@endif


@section('main')
<div style="height:100%;">
    <div class="row">
        <div class="col-sm-3">
            <ul class="nav flex-column nav-pills text-center mt-4">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="pill" href="#info">Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="pill" href="#add-product">Ajouter un produit</a>
                </li>
            </ul>
        </div>

        <div class="col-sm-9" style="background-color:#f4f4f4;">
            <div class="tab-content">
                <!-- Onglet Information -->
                <div class="tab-pane fade show active" id="info" >
                    @include('components.forms.form')
                </div>

                <!-- Onglet Ajouter un produit -->
                <div class="tab-pane fade" id="add-product">
                    <div class="d-flex justify-content-center gap-4 mt-4 mb-3">
                        <div onclick="showForm('per')" class="category-icon">
                            <img src="{{ asset('images/icons/conduire.png') }}" alt="icon">
                        </div>
                        <div onclick="showForm('ecran')" class="category-icon">
                            <img src="{{ asset('images/icons/ecran.png') }}" alt="icon">
                        </div>
                        <div onclick="showForm('impr')" class="category-icon">
                            <img src="{{ asset('images/icons/imprimante.png') }}" alt="icon">
                        </div>
                        <div onclick="showForm('ord')" class="category-icon">
                            <img src="{{ asset('images/icons/ordinateur.png') }}" alt="icon">
                        </div>
                        <div onclick="showForm('tab')" class="category-icon">
                            <img src="{{ asset('images/icons/tablette-graphique.png') }}" alt="icon">
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-3">
                        <div id="product-forms" class="w-100">
                            @include('components.forms.formecran')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function showForm(type) {
        fetch(`/form/${type}`)
            .then(response => response.text())
            .then(data => {
                document.getElementById('product-forms').innerHTML = data;
            });
    }
</script>


<style>
    .category-icon {
        background-color: gray;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }
    .category-icon img {
        width: 60px;
    }
</style>
@endsection
