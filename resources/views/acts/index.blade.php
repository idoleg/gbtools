@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row d-flex justify-content-between">
            <div class="p-2"><h4>Список актов приемки передачи</h4></div>

            <div class="p-2">
                <a class="btn btn-outline-success btn-sm"
                        href="{{ route('acts.create') }}"
                        role="button">Добавить новый акт</a>
            </div>

        </div>

        <div class="row">
            @foreach($acts as $act)
            <div class="card" style="width: 100%; margin-bottom: 20px;">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('acts.view', $act->id) }}" class="card-link">{{$act->data['act-id']}}</a></h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{$act->data['tether-name']}}</h6>
                    <p class="card-text">{{$act->data['course-name']}}</p>

                </div>
            </div>
            @endforeach

        </div>

    </div>
@endsection
