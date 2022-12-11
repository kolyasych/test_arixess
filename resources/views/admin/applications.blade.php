@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Тема</th>
                        <th scope="col">Повідомлення</th>
                        <th scope="col">Імя клієнта</th>
                        <th scope="col">Email клієнта</th>
                        <th scope="col">Посилання</th>
                        <th scope="col">Час створення</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">{{$application['id']}}</th>
                        <td>{{$application['subject']}}</td>
                        <td>{{$application['message']}}</td>
                        <td>{{$application->user['name']}}</td>
                        <td>{{$application->user['email']}}</td>
                        <td>@mdo</td>
                        <td>{{$application['created_at']}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
