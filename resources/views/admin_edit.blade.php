@extends('layouts.admin')

@section('title', 'Admin')

@section('content')

    @if (Session::has('success'))
        <div class="alert alert-success mt-5 pt-3">{{ Session::get('success') }}</div>
    @endif


    <div class="d-flex justify-content-center col-12 min-vh-100">

        <div class="card col-9 px-5 py-5">

            <div class="card min-vh-100 px-5 py-5">


                <form action="{{ route('product.edit', $product->id) }}" method="post">

                    @csrf

                    <div class="mx-auto p-4">
                        <h4 class="text-center">Termék szerkesztése</h4>
                    </div>
                    @csrf
                    <div class=" col-12">
                        <label for="name" class="pb-1">Termék neve:</label>

                        <input type="text" name="name" id="name" class="form-control w-50 mb-4" value="{{$product->name}}">

                        <label for="thumbnail" class=" pb-1">Termék képe:</label>

                        <input type="text" name="thumbnail" id="thumbnail" class="form-control mb-4 w-50" value = "{{$product->thumbnail}}">

                        <div class="d-flex flex-column">
                            <label for="description" class="pb-1">Termék leírása:</label>

                            <textarea name="description" id="description" cols="60" rows="8" class="mb-4" >{{$product->description}}</textarea>
                        </div>

                        <label for="price" class=" pb-1">Termék ára:</label>

                        <input type="number" name="price" id="price" class="form-control mb-4 w-50" value = "{{$product->price}}">

                        <label for="pack" class=" pb-1">Termék mennyisége:</label>

                        <input type="text" name="pack" id="pack" class="form-control mb-4 w-50" value = "{{$product->pack}}">

                        <label for="from" class=" pb-1">Termék származási helye:</label>

                        <input type="text" name="from" id="from" class="form-control mb-4 w-50" value = "{{$product->from}}">

                        <label for="taste" class=" pb-1">Termék íze:</label>

                        <input type="text" name="taste" id="taste" class="form-control mb-4 w-50" value = "{{$product->taste}}">

                        <label for="use" class=" pb-1">Termék felhasználati javaslata:</label>

                        <input type="text" name="use" id="use" class="form-control mb-4 w-50" value = "{{$product->use}}">

                        <label for="ingredients" class=" pb-1">Termék összetevői:</label>

                        <input type="text" name="ingredients" id="ingredients" class="form-control mb-4 w-50" value = "{{$product->ingredients}}">

                        @if ($categories->count() > 0)
                        <div class="form-group mb-4">
                            <label for="categories">Kategóriák</label>
                            <select class="form-control" id="categories" name="category_id[]" multiple>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" 
                                        @if(in_array($category->id, $product->categories->pluck('id')->toArray())) selected @endif>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @endif



                        <button class="button btn btn-outline-success ">
                            Frissítés
                        </button>
                    </div>

                </form>



            </div>

        </div>

    </div>


@endsection
