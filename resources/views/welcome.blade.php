<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>THM Notenberechner</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
</head>

<body>
<div class="container">
    <section class="py-4 py-xl-5">
        <div class="container">
            <div class="text-white bg-dark border rounded border-0 p-4 p-md-5">
                <img class="mb-4"
                     src="{{ asset('assets/img/thm.svg') }}"
                     style="width: 250px;">
                <h2 class="fw-bold text-white mb-3">Notenrechner</h2>
                <p class="mb-4">Dieses simple Projekt gibt Informationen über die Note, die Sie bei Ihrer Klausur
                    erhalten haben</p>
                <div class="my-3"></div>
            </div>
        </div>
    </section>
    <section class="py-4 py-xl-5">
        <div class="container">
            <div>
                <form method="post" action="{{url('/calc')}}">
                    @csrf
                    <input class="form-control" type="number" name="num" style="border-radius: 5px;" placeholder="Die Note in %">
                    <button class="btn btn-secondary mt-3" type="submit">Berechnen</button>

                    @if(session('msg'))
                        <div class="alert alert-secondary mt-3">
                            Note in % {{ session('msg')[0] }}
                            <hr>
                            Note in Zahl {{ session('msg')[1] }}
                            <hr>
                            Ergebnis {{ session('msg')[2] }}
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </section>
</div>
</body>

</html>
