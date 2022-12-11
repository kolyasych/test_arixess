@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <form action="{{route('applications.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="subject" class="form-label">Тема повідомлення</label>
                        <input type="text" name="subject" class="form-control" id="subject"
                               placeholder="Тема повідомлення"
                               value="{{ old('subject') }}">
                        @error('subject')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Повідомлення</label>
                        <textarea class="form-control" name="message" id="message"
                                  rows="3">{{ old('message') }}</textarea>
                        @error('message')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <input class="mb-3" id="dropzone" type="file" name="file">
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                    <div class="form-group">
                        <button class="btn btn-primary">Відправити</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
