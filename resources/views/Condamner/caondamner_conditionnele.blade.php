@extends('layouts.indexAjout')
@section('contenu')
    {{-- main --}}
    <main>
        <div class="head-title">
            <div class="left">
                <h1>certification de liberation conditionnelle</h1>
                <ul class="breadcrum">
                    <li>
                        <a hr ef="#">DASHBOARD</a>
                    </li>
                    <li> 
                        <i class="fa fa-chevron-right"></i>
                    </li>
                    <li>
                        <a href="#">tableCondamner</a>
                    </li>
                    <li>
                        <i class="fa fa-chevron-right"></i>
                    </li>
                    <li>
                        <a href="#" class="active">Impression d'une certification de liberation conditionnelle</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="table-data">
            <div class="todo">
                {{-- <div class="head">
                    <h3>Imprimer</h3>
                    <i class="fa fa-plus"></i>
                </div> --}}
                <form action="{{ URL::to('index/tableCondamner/Liberation_Cond/' . $condamner->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <h3>Veilliez remplir les champs</h3>
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-danger text-center">{{ session('message') }}</div>
                        @endif
                    </div>

                    <div class="form-input form-input-group">
                        <label for="">Maison centrale : </label>
                        <input type="text" name="maison" placeholder="maison de" required>
                    </div><br>

                    <div class="form-input form-input-group">
                        <label for="">le conseil</label>
                        <input type="text" name="conseil" placeholder="..." required>
                        <label for="">date</label>
                        <input type="date" name="date" required>
                    </div><br>

                    <div class="form-input form-input-group">
                        <label for="">Destination</label>
                        <input type="text" name="destination" placeholder="..." required>
                    </div><br>

                    <div class=" form-input-group">
                        <label for="">Delinquant primaire : </label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="deliquant" value="Oui"
                                id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Oui
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="deliquant" value="Non"
                                id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Non
                            </label>
                        </div>
                    </div><br>

                    <div class=" form-input-group">
                        <label for="">RECIDIVISTE : </label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="recidiviste" value="Oui" id="active"
                                onchange="togglePre()">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Oui
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="recidiviste" value="Non" id="active2"
                                onchange="togglePrecission2()"
                                checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                Non
                            </label>
                        </div>
                    </div><br>

                    <div id="affiche_suite" style="display: none;">
                        <div class="form-input form-input-group">
                            <label for="">si oui precisier le nombre de condamnation</label>
                            <input type="text" name="precisier" placeholder="..." >
                        </div><br>
                        <div class="form-input form-input-group">
                            <label for="">Indiquer la peine la plus grave encourue</label>
                            <input type="text" name="encourue" placeholder="..." >
                        </div><br>

                        <div class="form-input form-input-group">
                            <label for="">Indiquer le lieu où a été subie la dernière peine corporelle</label>
                            <input type="text" name="indiquer" placeholder="..." >
                        </div><br>

                    </div>

                    <h4>NOTICE INDIVIDUELLE</h4>
                    {{-- <p> .......................naturel...........................trouve.................</p>'; --}}

                    <div class="form-input form-input-group">
                        <label for="">Le condamné est-il un enfant légitimes :</label>
                       <select name="legitime" id="">
                        <option value="">...</option>
                        <option value="naturel">naturel</option>
                        <option value="trouve">trouve</option>
                       </select>
                    </div><br>

                    <h4>PROFESSION</h4>

                    <div class="form-input form-input-group">
                        <label for="">Travaillait-il pour son compte ou pour autrui</label>
                        <input type="text" name="travaillait" placeholder="..." required>
                    </div><br>

                    <div class="form-input form-input-group">
                        <label for="">Vivait-il dans l\'oisiveté</label>
                        <input type="text" name="vivait" placeholder="..." required>
                    </div><br>

                    <div class="form-input form-input-group">
                        <label for="">Appartenait-il à la population urbaine ou rurale</label>
                        <input type="text" name="appartenait" placeholder="..." required>
                    </div><br>

                    <h4>DEGRE D INSTRUCTION</h4>

                    <div class="form-input form-input-group">
                        <label for="">Quelle est son niveau d\'instruction</label>
                        <input type="text" name="niveau" placeholder="..." required>
                    </div><br>

                    <div class="form-input form-input-group">
                        <label for="">Quelle est sa religion</label>
                        <input type="text" name="religion" placeholder="..." required>
                    </div><br>

                    <div class="form-input form-input-group">
                        <label for="">Autre et observations</label>
                        <input type="text" name="observations" placeholder="..." required>
                    </div><br>

                    <div class="form-actions mt-3">
                        <a href="{{ URL::to('index/tableCondamner') }}" class="btn btn-danger">retour</a>
                        <button type="submit" class="btn btn-success"><i class="fa fa-print"></i>imprimer</button>
                    </div>

                </form>
            </div>
        </div>
        <script>
            function togglePre() {
                var checkbox = document.getElementById('active');
                var affiche = document.getElementById('affiche_suite');

                if (checkbox.checked) {
                    affiche.style.display = 'block';
                }
            }

            function togglePrecission2() {
                var checkbox2 = document.getElementById('active2');
                var affiche = document.getElementById('affiche_suite');

                if (checkbox2.checked) {
                    affiche.style.display = 'none';
                }
            }
        </script>
    </main>
@endsection
