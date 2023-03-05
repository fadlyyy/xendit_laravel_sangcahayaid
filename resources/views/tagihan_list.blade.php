<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Tagihan</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <fieldset>
            <legend>LIST DATA TAGIHAN</legend>
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('tagihan.create') }}" class="btn btn-primary">TAMBAH DATA</a>
                    <hr>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>DOC NO</th>
                                <th>AMOUNT</th>
                                <th>DESCRIPTION</th>
                                <th>PAYMENT STATUS</th>
                                <th>PAYMENT LINK</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $dt)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $dt->doc_no }}</td>
                                    <td>{{ number_format($dt->amount, 0, ',', '.') }}</td>
                                    <td>{{ $dt->description }}</td>
                                    <td>{{ $dt->payment_status }}</td>
                                    <td>{{ $dt->payment_link }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </fieldset>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
