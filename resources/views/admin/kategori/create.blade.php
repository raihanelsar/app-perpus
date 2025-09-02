@extends('app')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">Create Kategori</div>
        </div>
        <div>
            @foreach ($errors->all() as $i)
                <ul style="background-color: red ">
                    <li>{{ $i }}</li>
                </ul>
            @endforeach
        </div>
        <div class="card-body">
            {{-- {{ route('kategori.store') }} --}}
            <form action="" method="post">
                @csrf
                <label for="" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" name="nama_kategori">

                <button type="submit" class="btn btn-primary mt-2">Kirim</button>
            </form>
        </div>
    </div>
@endsection
