@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row d-flex justify-content-between d-print-none">
            <div class="p-2">





                <h4>Просмотр акта приема-передачи</h4>
            </div>

            <div class="p-2">
                <a class="btn btn-outline-success btn-sm"
                        href="{{ route('acts.print', $id) }}"
                        role="button">Распечатать</a>
                <button class="btn btn-outline-primary btn-sm"
                        onclick="prompt('','{{config('app.url')}}/share?hash={{$hash}}')"
                        role="button">Поделиться актом</button>
                <a class="btn btn-outline-primary btn-sm"
                        href="{{ route('acts.create') }}"
                        role="button">Редактировать акт</a>
            </div>

        </div>
        <div class="row d-flex justify-content-center">
            <div class=" paper-list">

                @include('act')


            </div>
        </div>

    </div>
@endsection
