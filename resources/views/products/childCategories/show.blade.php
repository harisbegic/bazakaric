@extends('layouts.app')

@section('content')
    <h5>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Početna</a></li>
          <li class="breadcrumb-item"><a href="#">Proizvodi</a></li>
          <li class="breadcrumb-item" aria-current="page">
            <a href="#">{{ $childCategory->categoryParent->ime }}</a>
          </li>
          <li class="breadcrumb-item active">{{ $childCategory->ime }}</li>
        </ol>
      </nav>
    </h5>
    <div class="btn-block btn-group btn-group-lg text-white" style="margin-bottom: 18px" role="group" aria-label="First group">
      @foreach($childCategories as $childCategory)
        @if($childCategory->id == 1)
          <a href="{{ route('childCategories.show', $childCategory->id) }}" type="button" class="btn text-white" style="background-color: #006699">{{ $childCategory->ime }}</a>
        @elseif($childCategory->id == 2)
          <a href="{{ route('childCategories.show', $childCategory->id) }}" type="button" class="btn text-white" style="background-color: #6699CC">{{ $childCategory->ime }}</a>
        @elseif($childCategory->id == 3)
          <a href="{{ route('childCategories.show', $childCategory->id) }}" type="button" class="btn text-white" style="background-color: #006699">{{ $childCategory->ime }}</a>
        @elseif($childCategory->id == 4)
          <a href="{{ route('childCategories.show', $childCategory->id) }}" type="button" class="btn text-white" style="background-color: #6699CC">{{ $childCategory->ime }}</a>
        @else
          <a href="{{ route('childCategories.show', $childCategory->id) }}" type="button" class="btn text-white" style="background-color: #FFCC00">{{ $childCategory->ime }}</a>
        @endif
      @endforeach
    </div>
    <br>
    <div class="alert alert-primary" role="alert">
     <strong>Ukupno proizvoda - {{ $sum }}</strong>
    </div>
  <div class="card">
    <div class="card-body">
      <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Ime</th>
                  <th scope="col">Kategorija</th>
                  <th scope="col">Promjer</th>
                  <th scope="col">Dužina / Ugao / Vrsta</th>
                  @if($childCategory->categoryParent->id == 2)
                  @else
                    <th scope="col">Vrsta Izolacije</th>
                    <th scope="col">Materijal</th>
                  @endif
                  <th scope="col">Debljina stjenke</th>
                  <th scope="col">Lokacija</th>
                  <th scope="col" class="bg-warning">Stari sistem</th>
                  <th scope="col" class="bg-info">Novi sistem</th>
                  <th scope="col" class="bg-success">Saldo</th>
                  <th scope="col">Radnje</th>
                </tr>
              </thead>
              <tbody>
                @foreach($products as $product)
                    <tr>
                      <th scope="row">{{ $product->id }}</th>
                      <td>{{ $product->ime }}</td>
                      <td>
                        @if($product->categoryChild_id == 0)
                          <a href="{{ route('products.addCategory', $product->id) }}">Dodaj</a>
                        @else
                          {{ $product->categoryChild->ime }}
                        @endif
                      </td>
                      <td>{{ $product->promjer->ime }}</td>
                      <td>{{ $product->duv->ime }}</td>

                        @if($product->vrstaIzolacije_id == 0)
                        @else
                          <td>{{ $product->vrstaIzolacije->ime }}</td>
                        @endif
                        
                        @if($product->materijal_id == 0)
                        @else
                          <td>{{ $product->materijal->name }}</td>
                        @endif

                      <td>{{ $product->debljinaStjenke->ime }}</td>
                      <td>{{ $product->lokacija->ime }}</td>
                      <td>{{ $product->stariSistem }}<a class="badge badgeMargin1 badge-info" href="{{ route('products.alterKolicina', $product->id) }}">Izmijeni</a></td>
                      <td>{{ $product->noviSistem }}<a class="badge badgeMargin1 badge-info" href="{{ route('products.alterKolicina', $product->id) }}">Izmijeni</a></td>
                      <td>{{ $product->stariSistem + $product->noviSistem }}</td>
                      <td>
                        <a href="{{ route('products.edit', $product->id) }}"><button type="button" class="btn btn-sm btn-warning float-left">Uredi</button></a>
                        {{-- @endcan --}}
                        {{-- @can('delete-users') --}}
                          <form action="{{ route('products.destroy', $product) }}" method="POST" class="float-left">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class= "btn btn-sm btn-danger" style="margin-left: 3px">Briši</button>
                          </form>
                      </td>
                    </tr>
                @endforeach
              </tbody>
      </table>
    </div>
</div>

@endsection