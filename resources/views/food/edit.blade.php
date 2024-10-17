@extends('layouts.template')

@section('content')
    <form action="{{ route('food.update', $food['id'])}}" method="POST" class="card p-5">
         @csrf
         @method('PATCH')
         @if ($errors->any())
             <ul class="alert alert-danger p-3">
             @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
                 
             @endforeach
             </ul>
         @endif

        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Nama :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{ $food['name'] }}">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="type" class="col-sm-2 col-form-label">Jenis :</label>
            <div class="col-sm-10">
                <select class="form-select" name="type" id="type">
                    <option selected disabled hidden>Pilih</option>
                    <option value="makanan" {{ $food['type'] == 'makanan' ? 'selected' : '' }}>Makanan</option>
                    <option value="minuman" {{ $food['type'] == 'minuman' ? 'selected' : '' }}>Minuman</option>
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="price" class="col-sm-2 col-form-label">Harga :</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="price" name="price" value="{{ $food['price'] }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
    </form>
@endsection