@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Тема повідомлення</th>
                        <th scope="col">Дія</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($applications as $application)
                            <tr>
                                <th scope="row">{{$application['id']}}</th>
                                <td>{{$application['subject']}}</td>
                                <td><a href="{{route('application.show', $application['id'])}}">Переглянути</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
