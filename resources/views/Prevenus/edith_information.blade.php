@extends('layouts.indexAjout')
@section('contenu')
    {{-- main --}}
    <main>
        <div class="head-title">
            <div class="left">
                <h1>modifier une personne prevenus</h1>
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
                        <a href="#" class="active">modifi_prevenus</a>
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
                <form
                    action="{{ URL::to('index/tablePrevenus/ajoutprevenus/edith_information_prevenus/' . $prevenus->id) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <h3>modifier un prevenus</h3>
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-danger text-center">{{ session('message') }}</div>
                        @endif
                    </div>

                    <div class="form-input form-input-group">
                        <label for="">N°</label>
                        <input type="number" name="numero" placeholder="numero..." required min="0"
                            value="{{ $prevenus->numero }}">
                        <label for="">type</label>
                        <input type="text" name="type" id="" value="{{ $prevenus->type }}" required>
                    </div><br>

                    <div class="form-input form-input-group">
                        <label for="">Nom</label>
                        <input type="text" name="nom" placeholder="..." value="{{ $prevenus->nom }}" required>
                    </div><br>

                    <div class="form-input form-input-group">
                        <label for="">Prenom</label>
                        <input type="text" name="prenom" placeholder="..." value="{{ $prevenus->prenom }}">
                    </div><br>

                    <div class="form-input form-input-group">
                        @if ($prevenus)
                            <label for="">Choisissez la photo</label>
                            <input type="text" id="photoFileName" name="ancien_photo"
                                value="{{ $prevenus ? basename($prevenus->photo) : '' }}" readonly
                                onclick="triggerFileInput()">
                            <input type="file" name="photo" id="photoInput" style="display: none"
                                onchange="updateFileName()" accept="image/*">
                        @endif
                    </div><br>

                    @if (strpos($prevenus->naissance, '-') !== false)
                        @php
                            $dateNaissance = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $prevenus->naissance);
                            $dateNaissanceFormatted = $dateNaissance->format('Y-m-d');
                        @endphp

                        <div class="form-input form-input-group" id="inputDate">
                            <label for="">Né(e)</label>
                            <input type="date" name="date_naissance1" value="{{ $dateNaissanceFormatted }}">
                        </div><br>
                    @else
                        <div class="form-input form-input-group" id="inputDateNaissance">
                            <label for="">Né(e) vers</label>
                            <input type="text" name="date_naissance2" value="{{ $prevenus->naissance }}">
                        </div>
                    @endif


                    <div class="form-input form-input-group">
                        <label for="">à</label>
                        <input type="text" name="lieu" placeholder="lieu" value="{{ $prevenus->lieu }}">
                        <label for="">Cartier</label>
                        <input type="text" name="cartier" value="{{ $prevenus->cartier }}">
                    </div><br>

                    <div class="form-input form-input-group">
                        <label for="">region</label>
                        <input type="text" name="region" value="{{ $prevenus->region }}">
                    </div><br>

                    <div class="form-input form-input-group" id="inputDate">
                        <label for="">commune</label>
                        <input type="text" name="commune" value="{{ $prevenus->commune }}">
                        <label for="">district</label>
                        <input type="text" name="district" value="{{ $prevenus->district }}">
                    </div><br>

                    <div class="form-input form-input-group">
                        <label for="">sexe</label>
                        <select name="sexe" id="" required>
                            <option value="">...</option>
                            <option value="Homme" {{ $prevenus->sexe === 'Homme' ? 'selected' : '' }}>Homme</option>
                            <option value="Femme"{{ $prevenus->sexe === 'Femme' ? 'selected' : '' }}>Femme</option>
                        </select>
                    </div><br>

                    <div class="form-input form-input-group">
                        <label for="">nationalité</label>
                        <input type="text" name="nationalite" placeholder="..." value="{{ $prevenus->nationalité }}"
                            required>
                    </div><br>

                    <div class="form-input form-input-group">
                        <label for="">CIN</label>
                        <input type="text" name="cin" placeholder="..." value="{{ $prevenus->cin }}">
                    </div><br>

                    <div class="form-input form-input-group">
                        <label for="">date de délivrance</label>
                        <input type="date" name="date_delivrance" value="{{ $prevenus->date_delivrance }}">
                    </div><br>

                    <div class="form-input form-input-group">
                        <label for="">profession</label>
                        <input type="text" name="profession" placeholder="..." value="{{ $prevenus->profession }}">
                    </div><br>

                    <div class="form-input form-input-group">
                        <label for="">Fils(Fille) de:</label>
                        <input type="text" name="pere" placeholder="pere ..." value="{{ $prevenus->pere }}">
                    </div><br><br>

                    <div class="form-input form-input-group">
                        <label for="">et de</label>
                        <input type="text" name="mere" placeholder="mere ..." required
                            value="{{ $prevenus->mere }}">
                    </div><br><br>

                    <div class="form-input form-input-group">
                        <label for="">nombre d'enfant</label>
                        <input type="number" name="enfant" value="{{ $prevenus->enfant }}">
                        <label for="">situation matrimoniale</label>
                        <select name="marie" id="" required>
                            <option value="">...</option>
                            <option value="marie(é)"{{ $prevenus->marié === 'marie(é)' ? 'selected' : '' }}>Marié(e)
                            </option>
                            <option value="célibataire"{{ $prevenus->marié === 'célibataire' ? 'selected' : '' }}>
                                Célibataire</option>
                            <option value="Divorcé(e){{ $prevenus->marié === 'Divorcé(e)' ? 'selected' : '' }}">Divorcé(e)
                            </option>
                            <option value="veuf(ve)"{{ $prevenus->marié === 'veuf(ve)' ? 'selected' : '' }}>veuf(ve)
                            </option>
                        </select>
                    </div><br>

                    <div class="form-input form-input-group">
                        <label for="">adresse</label>
                        <input type="text" name="adresse" value="{{ $prevenus->adresse }}">
                        <label for="">Cartier</label>
                        <input type="text" name="cartier1" value="{{ $prevenus->cartier1 }}">
                    </div><br>

                    <div class="form-input form-input-group">
                        <label for="">Region</label>
                        <input type="text" name="region1" value="{{ $prevenus->region1 }}">
                    </div><br>

                    <div class="form-input form-input-group" id="inputDate">
                        <label for="">Commune</label>
                        <input type="text" name="commune1" value="{{ $prevenus->commune1 }}">
                        <label for="">district</label>
                        <input type="text" name="district1" value="{{ $prevenus->district1 }}">
                    </div><br>

                    <div class="form-input form-input-group">
                        <label for="">contacte</label>
                        <input type="text" name="contact" placeholder="numero de telephone"
                            value="{{ $prevenus->contacte }}">
                    </div><br>

                    <div class="form-input form-input-group">
                        <label for="">categorie: </label>
                        <select name="categorie" id="" required>
                            <option value="">...</option>
                            <option value="Inculpes"{{ $prevenus->categorie === 'Inculpes' ? 'selected' : '' }}>Inculpes
                            </option>
                            <option value="Accuses"{{ $prevenus->categorie === 'Accuses' ? 'selected' : '' }}>Accuses
                            </option>
                            <option value="Prevenus"{{ $prevenus->categorie === 'Prevenus' ? 'selected' : '' }}>Prevenus
                            </option>
                        </select>
                    </div><br>

                    <div class="form-input form-input-group">
                        <label for="">situation</label>
                        <select name="situation" id="" required>
                            <option value="">...</option>
                            <option value="transfere(e)" {{ $prevenus->situation === 'transfere(e)' ? 'selected' : '' }}>
                                transfere(e)</option>
                            <option value="passagers(e)" {{ $prevenus->situation === 'passagers(e)' ? 'selected' : '' }}>
                                passagers(e)</option>
                            <option
                                value="en detention(e)"{{ $prevenus->situation === 'en detention(e)' ? 'selected' : '' }}>
                                en detention(e)</option>
                            {{-- <option value="Evadé(e)"{{ $prevenus->situation === 'Evadé(e)' ? 'selected' : '' }}>Evadé(e)
                            </option>
                            <option value="Décès(e)"{{ $prevenus->situation === 'Décès(e)' ? 'selected' : '' }}>Décès(e)
                            </option>
                            <option
                                value="Hospitalisè(e)"{{ $prevenus->situation === 'Hospitalisè(e)' ? 'selected' : '' }}>
                                Hospitalisè(e)</option> --}}
                        </select>
                    </div><br>

                    <div class="form-input form-input-group">
                        <label for="">date d'ecrou</label>
                        <input type="date" name="date_ecrou" value="{{ $prevenus->date_ecrou }}" required>
                    </div><br>

                    @php
                        $inculpations = explode(',', $prevenus->inculpation);
                    @endphp

                    @foreach ($inculpations as $key => $inculpation)
                        <div class="inculpationGroup mb-2">
                            <label for="inculpation">Inculpation</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="inculpation[]"
                                    placeholder="Inculpation" value="{{ $inculpation }}" required>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-danger remove-inculpation">Enlever</button>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <button type="button" class="btn btn-primary add-inculpation">Ajouter</button>
                    <p>La peine est estimée en mois</p>

                    <div class="form-input form-input-group">
                        <label for="">Autoritaire Mandataire:</label>
                        <input type="text" name="mandataire" value="{{ $prevenus->mandataire }}"
                            placeholder="Le mandataire..." required>
                    </div><br>

                    <div class="form-actions">
                        <a href="{{ URL::to('index/tablePrevenus') }}" class="btn btn-danger">Annuler</a>
                        <button type="submit" class="btn btn-success">modifier</button>
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
                } else {
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
