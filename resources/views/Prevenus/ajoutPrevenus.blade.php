@extends('layouts.indexAjout')
@section('contenu')
    {{-- main --}}
    <main>
        <div class="head-title">
            <div class="left">
                <h1>ajouter une personne prevenus</h1>
                <ul class="breadcrum">
                    <li>
                        <a href="#">DASHBOARD</a>
                    </li> 
                    <li>
                        <i class="fa fa-chevron-right"></i>
                    </li>
                    <li>
                        <a href="#">table_prevenus</a>
                    </li>
                    <li>
                        <i class="fa fa-chevron-right"></i>
                    </li>
                    <li>
                        <a href="#" class="active">ajout_prevenus</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="table-data">
            <div class="todo">
                <div class="head">
                    <h3>Ajout</h3>
                    <i class="fa fa-plus"></i>
                </div>
                <form action="{{ URL::to('index/tableCondamner/ajoutCondamner/ajoutprevenus') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <h3>ajouter un prevenus</h3>
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-danger text-center">{{ session('message') }}</div>
                        @endif
                    </div>

                    <div class="form-input form-input-group">
                        <label for="">N°</label>
                        <input type="number" name="numero" placeholder="numero..." required min="0">
                        <label for="">type</label>
                        <input type="text" name="type" id="">
                    </div><br>

                    <div class="form-input form-input-group">
                        <label for="">Nom</label>
                        <input type="text" name="nom" placeholder="..." required>
                    </div><br>

                    <div class="form-input form-input-group">
                        <label for="">Prenom</label>
                        <input type="text" name="prenom" placeholder="...">
                    </div><br>
                    <div class="form-input form-input-group">
                        <label for="">Choisissez la photo</label>
                        <input type="file" name="photo">
                    </div><br>

                    <div class="form-input form-input-group" id="inputDate">
                        <label for="">Né(e)</label>
                        <input type="date" name="date_naissance1">
                    </div><br>

                    <div class="form-input-group">
                        <label for="activerDateNaissance">date de naissance vers</label>
                        <input style="margin-left: 20px;" type="checkbox" id="activerDateNaissance"
                            onchange="toggleDateNaissance()">
                    </div><br>

                    <div class="form-input form-input-group" id="inputDateNaissance" style="display: none;">
                        <label for="">Né(e) vers</label>
                        <input type="text" name="date_naissance2">
                    </div>

                    <div class="form-input form-input-group">
                        <label for="">à</label>
                        <input type="text" name="lieu" placeholder="lieu">
                        <label for="">Cartier</label>
                        <input type="text" name="cartier">
                    </div><br>

                    <div class="form-input form-input-group">
                        <label for="">region</label>
                        <input type="text" name="region">
                    </div><br>

                    <div class="form-input form-input-group" id="inputDate">
                        <label for="">commune</label>
                        <input type="text" name="commune">
                        <label for="">district</label>
                        <input type="text" name="district">
                    </div><br>

                    <div class="form-input form-input-group">
                        <label for="">sexe</label>
                        <select name="sexe" id="" required>
                            <option value="">...</option>
                            <option value="Homme">Homme</option>
                            <option value="Femme">Femme</option>
                        </select>
                    </div><br>

                    <div class="form-input form-input-group">
                        <label for="">nationalité</label>
                        <input type="text" name="nationalite" placeholder="..." required>
                    </div><br>

                    <div class="form-input form-input-group">
                        <label for="">CIN</label>
                        <input type="text" name="cin" placeholder="..." min="0">
                    </div><br>

                    <div class="form-input form-input-group">
                        <label for="">date de délivrance</label>
                        <input type="date" name="date_delivrance">
                    </div><br>

                    <div class="form-input form-input-group">
                        <label for="">profession</label>
                        <input type="text" name="profession" placeholder="...">
                    </div><br>

                    <div class="form-input form-input-group">
                        <label for="">Fils(Fille) de:</label>
                        <input type="text" name="pere" placeholder="pere ...">
                    </div><br><br>

                    <div class="form-input form-input-group">
                        <label for="">et de</label>
                        <input type="text" name="mere" placeholder="mere ..." required>
                    </div><br><br>

                    <div class="form-input form-input-group">
                        <label for="">nombre d'enfant</label>
                        <input type="number" name="enfant" placeholder="nombre d'enfant..." min="0">
                        <label for="">situation matrimoniale</label>
                        <select name="marie" id="" required>
                            <option value="">...</option>
                            <option value="marie(é)">Marié(e)</option>
                            <option value="célibataire">Célibataire</option>
                            <option value="Divorcé(e)">Divorcé(e)</option>
                            <option value="veuf(ve)">veuf(ve)</option>
                        </select>

                    </div><br>

                    <br><br>

                    <div class="form-input form-input-group">
                        <label for="">adresse</label>
                        <input type="text" name="adresse" placeholder="adresse...">
                        <label for="">Cartier</label>
                        <input type="text" name="cartier1">
                    </div><br>

                    <div class="form-input form-input-group">
                        <label for="">Region</label>
                        <input type="text" name="region1">
                    </div><br>

                    <div class="form-input form-input-group" id="inputDate">
                        <label for="">Commune</label>
                        <input type="text" name="commune1">
                        <label for="">district</label>
                        <input type="text" name="district1">
                    </div><br>

                    <div class="form-input form-input-group">
                        <label for="">contacte</label>
                        <input type="text" name="contact" placeholder="numero de telephone..." min="0">
                    </div><br>

                    <div class="form-input form-input-group">
                        <label for="">categorie: </label>
                        <select name="categorie" id="" required>
                            <option value="">...</option>
                            <option value="Inculpes">Inculpes</option>
                            <option value="Accuses">Accuses</option>
                            <option value="Prevenus">Prevenus</option>
                        </select>
                    </div><br>

                    <div class="form-input form-input-group">
                        <label for="">situation</label>
                        <select name="situation" id="" required>
                            <option value="">...</option>
                            <option value="transfere(e)">transfere(e)</option>
                            <option value="passagers(e)">passagers(e)</option>
                            <option value="en detention(e)">en detention(e)</option>
                            {{-- <option value="Evadé(e)">Evadé(e)</option>
                            <option value="Décès(e)">Décès(e)</option>
                            <option value="Hospitalisè(e)">Hospitalisè(e)</option> --}}
                        </select>
                    </div><br>

                    <div class="form-input form-input-group">
                        <label for="">date d'ecrou</label>
                        <input type="date" name="date_ecrou" required placeholder="date_ecrou...">
                    </div><br>

                    <div class="" id="inculpationGroup">
                        <label for="inculpation">inculpation</label>
                        <div class="inculpation mb-2">
                            <div class="input-group">
                                <input type="text" class="form-control" name="inculpation[]"
                                    placeholder="inculpation..." required>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-danger remove-inculpation">enlever</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary add-inculpation">ajout</button>
                    <p>la peine est estimer en mois</p>

                    <div class="form-input form-input-group">
                        <label for="">Autoritaire Mandataire:</label>
                        <input type="text" name="mandataire" placeholder="le mandataire..." required>
                    </div><br>

                    {{-- <div class="mb-3">
                        <label for="" class="form-label">observation</label>
                        <textarea class="form-control" name="observation" rows="3"></textarea>
                    </div><br> --}}

                    <div class="form-actions">
                        <a href="{{ URL::to('index/tablePrevenus') }}" class="btn btn-danger">annuler</a>
                        <button type="submit" class="btn btn-success">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
        <script>
            function toggleDateNaissance() {
                var checkbox = document.getElementById('activerDateNaissance');
                var inputDateNaissance = document.getElementById('inputDateNaissance');
                var inputDate = document.getElementById('inputDate');

                if (checkbox.checked) {

                    inputDate.disabled = true;
                    inputDate.required = false;
                    inputDate.style.display = 'none';

                    inputDateNaissance.style.display = 'block';
                    inputDateNaissance.disabled = false;
                    inputDateNaissance.required = true;
                }
                if (!checkbox.checked) {

                    inputDate.disabled = false;
                    inputDate.required = true;
                    inputDate.style.display = 'block';

                    inputDateNaissance.style.display = 'none';
                    inputDateNaissance.disabled = true;
                    inputDateNaissance.required = false;
                }
            }
        </script>
    </main>
@endsection
