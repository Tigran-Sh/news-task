<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link href="{{ asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <title>News task</title>
</head>
<body>
<header>
    <div class="d-flex flex-column flex-md-row p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
        <h5 class="my-0 mr-md-auto font-weight-normal"><a href="{{ route('news') }}">NEWS</a></h5>

        <div class="dropdown" style="padding-right: 100px">
        @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'news')
            <form action="{{ route('news') }}" method="GET">
                <select class="form-select" aria-label="Default select example" name="search" style="border: none">
                    <option selected value="">Filter by Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-success" style="height: 45px">Filter</button>
            </form>
            @endif
        </div>
        <a class="btn btn-outline-primary" href="{{ route('manager.index') }}">Manager</a>
    </div>
</header>
<div class="container" style="margin-top: 50px">
    @yield('content')
</div>
<script src="{{ asset('assets/js/jquery-3.1.1.min.js') }}"></script>
</body>
</html>
