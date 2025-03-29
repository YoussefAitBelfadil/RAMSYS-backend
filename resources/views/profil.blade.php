
@extends('layouts.app')

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


@section('content')
<div style="min-height: 100vh;;">
    <div class="row g-0">
        <!-- Sidebar -->
        <div class="col-lg-3 col-md-4">
            <div class="sidebar  text-white p-4 h-100">
                <ul class="nav flex-column nav-pills">
                    <li class="nav-item mb-2">
                        <a class="nav-link active d-flex align-items-center" data-bs-toggle="pill" href="#info">
                            <i class="fas fa-info-circle me-2"></i> Information
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link d-flex align-items-center" data-bs-toggle="pill" href="#add-product">
                            <i class="fas fa-plus-circle me-2"></i> Ajouter un produit
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-sm-9" style="background-color:#f4f4f4;">
            <div class="tab-content">
                <!-- Onglet Information -->
                <div class="tab-pane fade show active" id="info">
                    @auth
                    @if(session('show_welcome'))
                    <div class="welcome-card">
                        <div class="card border-0">
                            <div class="card-header bg-primary text-white">
                                <h3 class="mb-0">Bienvenue</h3>
                            </div>
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <div class="d-flex align-items-center mb-3">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-check-circle fa-2x text-success"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="mb-1">Vous êtes connecté avec succès!</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{ session()->forget('show_welcome') }}
                    @endif
                    @endauth

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

    // Initialize tooltips
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>


<style>
    body {
        background-color: #f8f9fa;
    }

    .sidebar {
        position: sticky;
        top: 0;
        height: 100vh;
    }

    .nav-pills .nav-link {
        border-radius: 0.5rem;
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
    }

    .nav-pills .nav-link.active {
        background-color: #0d6efd;
        color: white;
    }

    .nav-pills .nav-link:not(.active):hover {
        background-color: rgba(255, 255, 255, 0.1);
    }

    .welcome-card{
        display: flex;
        justify-content: center;
        margin-top: 20px;
        margin-bottom: 50px;
    }
    .welcome-card .card {
        height: 100%;
        width: 75%;
        overflow: hidden;
    }

    .stat-card {
        border-radius: 0.75rem;
        transition: transform 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
    }

    .category-icon {
        background-color: #f8f9fa;
        width: 120px;
        height: 120px;
        border-radius: 1rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        padding: 1rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .category-icon:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        background-color: #e9ecef;
    }

    .category-icon img {
        width: 60px;
        margin-bottom: 0.5rem;
    }

    .category-label {
        font-size: 0.9rem;
        font-weight: 500;
        text-align: center;
    }

    @media (max-width: 768px) {
        .category-icon {
            width: 80px;
            height: 80px;
        }

        .category-icon img {
            width: 40px;
        }

        .category-label {
            font-size: 0.7rem;
        }
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection
