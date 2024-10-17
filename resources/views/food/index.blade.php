@extends('layouts.template')

@section('content')

@if (Session::get('success'))
    <div class="alert alert-success">{{Session::get('success')}}</div>
@endif
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Tipe</th>
                <th>Harga</th>
                <th>Stock</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($foods as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{$item['name']}}</td>
                    <td>{{$item['type']}}</td>
                    <td>{{$item['price']}}</td>
                    <td>{{$item['stock']}}</td>
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('food.edit', $item['id'])}}" class="btn btn-primary mt-3" >Edit</a>
                        <form action="{{route('food.delete', $item['id'])}}"method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mt-3 ">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection