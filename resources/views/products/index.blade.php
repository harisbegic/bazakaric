@extends('layouts.app')

@section('content')

        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Ime</th>
              <th scope="col">Kategorija</th>
              <th scope="col">Promjer</th>
              <th scope="col">Dužina / Ugao / Vrsta</th>
              <th scope="col">Vrsta Izolacije</th>
              <th scope="col">Materijal</th>
              <th scope="col">Debljina stjenke</th>
              <th scope="col">Lokacija</th>
            </tr>
          </thead>
          <tbody>
            @foreach($products as $product)
                <tr>
                  <th scope="row">{{ $product->id }}</th>
                  <td>{{ $product->ime }}</td>
                  <td>{{ $product->categoryParent->ime }}</td>
                  <td>{{ $product->promjer->ime }}</td>
                  <td>{{ $product->duv->ime }}</td>
                  <td>{{ $product->vrstaIzolacije->ime }}</td>
                  <td>{{ $product->materijal->name }}</td>
                  <td>{{ $product->debljinaStjenke->ime }}</td>
                  <td>{{ $product->lokacija->ime }}</td>
                </tr>
            @endforeach
          </tbody>
        </table>

@endsection