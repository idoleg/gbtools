@extends('layouts.app')

@section('content')
    <div class="container">

        <h4 class="pb-2">Создать новый акт приема-передачи курса</h4>


        <form method="post">
            <div class="form-group row">
                <label for="date" class="col-sm-2 col-form-label">Дата</label>
                <div class="col-sm-10">
                    <input type="date"
                            name="date"
                            class="form-control"
                            id="date"
                            value="{{(new \DateTime())->format('Y-m-d')}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="act-id" class="col-sm-2 col-form-label">Номер акта</label>
                <div class="col-sm-10">
                    <input type="text"
                            name="act-id"
                            class="form-control"
                            id="act-id"
                            value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="tether-name" class="col-sm-2 col-form-label">Имя преподователя</label>
                <div class="col-sm-10">
                    <input type="text"
                            name="tether-name"
                            class="form-control"
                            id="tether-name"
                            value="">
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
                            value="">
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
                            value="{{(new \DateTime())->format('Y-m-d')}}">
                    <div class="input-group-prepend">
                        <span class="input-group-text">По</span>
                    </div>
                    <input type="date"
                            id="to"
                            name="to"
                            class="form-control"
                            value="{{(new \DateTime())->modify('+10 days')->format('Y-m-d')}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">Описание</label>
                <div class="col-sm-10">
                    <textarea
                            class="form-control"
                            name="description"
                            id="description"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="sum" class="col-sm-2 col-form-label">Сумма</label>
                <div class="input-group  col-sm-10">
                    <input type="number"
                            class="form-control"
                            id="sum"
                            name="sum"
                            value="10000">
                    <div class="input-group-append">
                        <span class="input-group-text">Руб.</span>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="sumrus" class="col-sm-2 col-form-label">Сумма прописью</label>
                <div class="col-sm-10">
                    <input type="text"
                            class="form-control"
                            name="sumrus"
                            id="sumrus"
                            value="">
                </div>
            </div>
            @csrf
            <div class="form-group row">
                <div class="offset-sm-2">
                    <button type="submit" class=" ml-3 btn btn-primary">Сохранить</button>
                    <button type="reset" class="ml-2 btn btn-outline-danger">Отмена</button>
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
