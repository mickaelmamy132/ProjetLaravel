@extends('layouts.indexAjout')
@section('contenu')
    {{-- main --}}
    <main>
        <div class="head-title">
            <div class="left">
                <h1>condamner</h1>
                <ul class="breadcrum">
                    <li>
                        <a href="#">DASHBOARD</a>
                    </li>
                    <li>
                        <i class="fa fa-chevron-right"></i>
                    </li>
                    <li>
                        <a href="#">condamner</a>
                    </li>
                    <li>
                        <i class="fa fa-chevron-right"></i>
                    </li>
                    <li>
                        <a href="#" class="active">historique</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>listes des historiques du condamner nomme:</h3>
                    {{-- @php
                        $id = $condamner->condamner_id;
                        $condamners = condamner::where('id',$id);
                    @endphp
                    <p> {{$condamners->nom}} </p> --}}
                </div>
                @if (count($condamners) > 0)
                <table
                    style="width: 100%;border-collapse: collapse;min-width: 420;">

                    <head>
                        <tr>
                            <th
                                style=" border-radius: 1px solid #eee; padding-bottom: 12px;font-size: 12px;text-align: left;">
                                situation</th>
                            <th style="border-radius: 1px solid #eee; padding-bottom: 12px;font-size: 12px;text-align: left;">date
                            </th>
                            <th style="border-radius: 1px solid #eee; padding-bottom: 12px;font-size: 12px;text-align: left;">status
                            </th>
                            <th style="border-radius: 1px solid #eee; padding-bottom: 12px;font-size: 12px;text-align: left;">date
                            </th>
                            <th style="border-radius: 1px solid #eee; padding-bottom: 12px;font-size: 12px;text-align: left;">

                            <th style="border-radius: 1px solid #eee; padding-bottom: 12px;font-size: 12px;text-align: left;">date
                            </th>
                        </tr>
                        <tbody>
                            @foreach ($condamners as $condamner)
                            <tr>
                                <td
                                    style="border: 1px solid black; border-radius: 10px; padding: 3px; text-align: center; font-size: 15px;">
                                    {{ $condamner->situation }}</td>
                                <td
                                    style="border: 1px solid black; border-radius: 10px; padding: 3px; text-align: center; font-size: 15px;">
                                    @if ($condamner->date_situation)
                                        {{ 'le ' . \Carbon\Carbon::createFromFormat('Y-m-d', $condamner->date_situation)->translatedFormat('j F Y') }}
                                    @else
                                    @endif
                                </td>
                                <td
                                    style="border: 1px solid black; border-radius: 10px;padding: 3px; text-align: center; font-size: 15px;">
                                    {{ $condamner->status }}</td>
                                <td
                                    style="border: 1px solid black; border-radius: 10px;padding: 3px; text-align: center; font-size: 15px;">
                                    @if ($condamner->date_status)
                                        {{ 'le ' . \Carbon\Carbon::createFromFormat('Y-m-d', $condamner->date_status)->translatedFormat('j F Y') }}
                                    @else
                                    @endif
                                </td>
                                <td
                                    style="border: 1px solid black; border-radius: 10px;padding: 3px; text-align: center; font-size: 15px;">
                                    {{ $condamner->observation }}</td>
                                <td
                                    style="border: 1px solid black; border-radius: 10px;padding: 3px; text-align: center; font-size: 15px;">
                                    @if ($condamner->date_observation)
                                        {{ 'le ' . \Carbon\Carbon::createFromFormat('Y-m-d', $condamner->date_observation)->translatedFormat('j F Y') }}
                                    @else
                                    @endif 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                </table>
                @else
                <p>Aucun historique trouvé.</p>
            @endif
                <div class="form-actions">
                    <a href="{{ URL::to('index/tableCondamner') }}" class="btn btn-danger mt-3"><i
                            class="fas fa-arrow-left"></i></a>
                </div>
            </div>

        </div>
    </main>
@endsection
