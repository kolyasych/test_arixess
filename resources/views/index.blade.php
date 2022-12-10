@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                Вітаємо вас на головній сторінці
            </div>
            <div class="col-12">
                <a href="{{route('applications')}}">Створити заявку</a>
            </div>
        </div>
    </div>

@endsection
