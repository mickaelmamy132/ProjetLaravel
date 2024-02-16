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
                        <a href="#">Prevenus</a>
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
                    <h3>listes des historiques du prevenus nomme:</h3>
                    {{-- @php
                        $id = $condamner->condamner_id;
                        $condamners = condamner::where('id',$id);
                    @endphp
                    <p> {{$condamners->nom}} </p> --}}
                </div>
                @if (count($prevenuses) > 0)
                    <table
                        style="width: 100%;border-collapse: collapse;min-width: 420;">

                        <head>
                            <tr>
                                <th
                                    style=" border-radius: 1px solid #eee; padding-bottom: 12px;font-size: 12px;text-align: center;">
                                    situation</th>
                                <th style=" border-radius: 1px solid #eee; padding-bottom: 12px;font-size: 12px;text-align: center;">date
                                </th>
                                <th style=" border-radius: 1px solid #eee; padding-bottom: 12px;font-size: 12px;text-align: center;">
                                    status
                                </th>
                                <th style=" border-radius: 1px solid #eee; padding-bottom: 12px;font-size: 12px;text-align: center;">date
                                </th>
                                <th style=" border-radius: 1px solid #eee; padding-bottom: 12px;font-size: 12px;text-align: center;">etat
                                </th>
                                <th style=" border-radius: 1px solid #eee; padding-bottom: 12px;font-size: 12px;text-align: center;">
                                    date_etat
                                </th>
                                <th style=" border-radius: 1px solid #eee; padding-bottom: 12px;font-size: 12px;text-align: center;">
                                    observation</th>
                                <th style=" border-radius: 1px solid #eee; padding-bottom: 12px;font-size: 12px;text-align: center;">date
                                    observation
                                </th>
                            </tr>
                            <tbody>
                                @foreach ($prevenuses as $prevenus)
                                    <tr>
                                        <td
                                            style="border: 1px solid black; border-radius: 10px; padding: 3px; text-align: center; font-size: 15px;">
                                            {{ $prevenus->situation }}</td>
                                        <td
                                            style="border: 1px solid black; border-radius: 10px; padding: 3px; text-align: center; font-size: 15px;">
                                            @if ($prevenus->date_situation)
                                                {{ 'le ' . \Carbon\Carbon::createFromFormat('Y-m-d', $prevenus->date_situation)->translatedFormat('j F Y') }}
                                            @else
                                            @endif
                                        </td>
                                        <td
                                            style="border: 1px solid black; border-radius: 10px;padding: 3px; text-align: center; font-size: 15px;">
                                            {{ $prevenus->status }}</td>
                                        <td
                                            style="border: 1px solid black; border-radius: 10px;padding: 3px; text-align: center; font-size: 15px;">
                                            @if ($prevenus->date_status)
                                                {{ 'le ' . \Carbon\Carbon::createFromFormat('Y-m-d', $prevenus->date_status)->translatedFormat('j F Y') }}
                                            @else
                                            @endif
                                        </td>
                                        <td
                                            style="border: 1px solid black;  border-radius: 10px;padding: 3px; text-align: center; font-size: 15px;">
                                            {{ $prevenus->etat }}</td>
                                        <td
                                            style="border: 1px solid black; border-radius: 15px;padding: 3px; text-align: center; font-size: 15px;">
                                            @if ($prevenus->date_etat)
                                                {{ 'le ' . \Carbon\Carbon::createFromFormat('Y-m-d', $prevenus->date_etat)->translatedFormat('j F Y') }}
                                            @else
                                            @endif
                                        </td>

                                        <td
                                            style="border: 1px solid black; border-radius: 10px;padding: 3px; text-align: center; font-size: 15px;">
                                            {{ $prevenus->observation }}</td>
                                        <td
                                            style="border: 1px solid black; border-radius: 10px;padding: 3px; text-align: center; font-size: 15px;">
                                            @if ($prevenus->date_observation)
                                                {{ 'le ' . \Carbon\Carbon::createFromFormat('Y-m-d', $prevenus->date_observation)->translatedFormat('j F Y') }}
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
                    <a href="{{ URL::to('index/tablePrevenus') }}" class="btn btn-danger mt-3"><i
                            class="fas fa-arrow-left"></i></a>
                </div>
            </div>

        </div>
    </main>
@endsection
