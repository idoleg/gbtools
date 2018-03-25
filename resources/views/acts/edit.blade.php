@extends('layouts.app')

@section('content')
    <div class="container">

        <h4 class="pb-2">
            @if ($id)
                Редактировать акт {{$id}}
            @else
                Создать новый акт приема-передачи курса
            @endif
        </h4>


        <form method="post">
            <div class="form-group row">
                <label for="date" class="col-sm-2 col-form-label">Дата</label>
                <div class="col-sm-10">
                    <input type="date"
                            name="date"
                            class="form-control"
                            id="date"
                            value="{{$date}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="act-id" class="col-sm-2 col-form-label">Номер акта</label>
                <div class="col-sm-10">
                    <input type="text"
                            name="act-id"
                            class="form-control"
                            id="act-id"
                            value="{{$actId}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="tether-name" class="col-sm-2 col-form-label">Имя преподователя</label>
                <div class="col-sm-10">
                    <input type="text"
                            name="tether-name"
                            class="form-control"
                            id="tether-name"
                            value="{{$tetherName}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="course-name" class="col-sm-2 col-form-label">Название курса</label>
                <div class="input-group col-sm-10">
                    <div class="input-group-prepend">
                        <span class="input-group-text">«</span>
                    </div>
                    <input type="text"
                            class="form-control"
                            name="course-name"
                            id="course-name"
                            value="{{$courseName}}">
                    <div class="input-group-append">
                        <span class="input-group-text">»</span>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="period" class="col-sm-2 col-form-label">Срок оказания</label>
                <div class="input-group col-sm-10">
                    <div class="input-group-prepend">
                        <span class="input-group-text">С</span>
                    </div>
                    <input type="date"
                            id="from"
                            name="from"
                            class="form-control"
                            value="{{$from}}">
                    <div class="input-group-prepend">
                        <span class="input-group-text">По</span>
                    </div>
                    <input type="date"
                            id="to"
                            name="to"
                            class="form-control"
                            value="{{$to}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">Описание</label>
                <div class="col-sm-10 pb-5">
                    <div id="description-editor"></div>
                    <input type="hidden"
                            name="description"
                            id="description"
                            value="{{$description}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="sum-without-nds" class="col-sm-2 col-form-label">Сумма</label>
                <div class="input-group  col-sm-10">
                    <input type="number"
                            class="form-control"
                            id="sum-without-nds"
                            value="{{$sum}}">
                    <div class="input-group-append">
                        <span class="input-group-text">Руб.</span>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-sm-2 input-group  col-sm-10">
                    <input type="number"
                            readonly
                            class="form-control"
                            id="sum"
                            name="sum">
                    <div class="input-group-append">
                        <span class="input-group-text">Руб. с НДС</span>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="sumrus" class="col-sm-2 col-form-label">Сумма прописью</label>
                <div class="col-sm-10">
                    <input type="text"
                            readonly
                            class="form-control"
                            name="sumrus"
                            id="sumrus">
                </div>
            </div>
            @csrf
            <div class="form-group row">
                <div class="offset-sm-2">
                    <button type="submit" class=" ml-3 btn btn-primary">Сохранить</button>

                    @if ($id)
                        <a class="btn btn-outline-danger "
                                href="{{ route('acts.view', $id) }}"
                                role="button">Отмена</a>
                    @else
                        <a class="btn btn-outline-danger"
                                href="{{ route('acts.index') }}"
                                role="button">Отмена</a>
                    @endif
                </div>

            </div>
        </form>


        {{--<div class="row paper-list">--}}

        {{--@include('act')--}}

        {{--</div>--}}

    </div>

    <script>
      initActEditForm();
    </script>
@endsection
