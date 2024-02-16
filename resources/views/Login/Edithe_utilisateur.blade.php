@extends('layouts.indexAjout')
@section('contenu')
    {{-- main --}}
    <main>
        <div class="head-title">
            <div class="left">
                <h1>modifier une compte</h1>
                <ul class="breadcrum">
                    <li>
                        <a href="#">DASHBOARD</a>
                    </li>

                    <li>
                        <i class="fa fa-chevron-right"></i>
                    </li>
                    <li>
                        <a href="#" class="active">modifi_utilisateur</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="table-data">
            <div class="todo">
                <div class="head">
                    <h3>modification</h3>
                    <i class="fa fa-pen"></i>
                </div>
                <form
                    action="{{ URL::to('index/Edite_utilisateur/edithe/' . $utilisateur->id) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <h3>modifier un utilisateur</h3>
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-danger text-center">{{ session('message') }}</div>
                        @endif
                    </div>

                    <div class="form-input form-input-group">
                        <label for="">Nom</label>
                        <input type="text" name="nom" placeholder="..." value="{{ $utilisateur->nom }}" required>
                    </div><br>

                    <div class="form-input form-input-group">
                        @if ($utilisateur)
                            <img src="{{ asset('/imageUtilisateur/' . $utilisateur->photo) }}"
                                style="width: 80px;height: 80px; border-radius:15%; display: block; margin: 0 auto;object-fit: cover;"
                                class="profile" alt="">
                            <label for="">modifier la photo</label>

                            <input type="text" id="photoFileName" name="ancien_photo"
                                value="{{ $utilisateur ? basename($utilisateur->photo) : '' }}" readonly
                                onclick="triggerFileInput()">
                            <input type="file" name="photo" id="photoInput" style="display: none"
                                onchange="updateFileName()" accept="image/*">
                        @endif
                    </div><br>


                    <div class="form-actions">
                        <a href="{{ URL::to('index') }}" class="btn btn-danger">Annuler</a>
                        <button type="submit" class="btn btn-success">modifier</button>
                    </div>
                </form>
            </div>
        </div>
        <script>
            function updateFileName() {
                const photoInput = document.getElementById('photoInput');
                const photoFileName = document.getElementById('photoFileName');

                if (photoInput.files.length > 0) {
                    photoFileName.value = photoInput.files[0].name;
                }
            }

            function triggerFileInput() {
                const photoInput = document.getElementById('photoInput');
                photoInput.click();
            }
        </script>
    </main>
@endsection
