@extends('layouts.app')

@section('breadcrumb-pages')
    <span class="breadcrumb-current-page">
            Category
        </span>
@endsection

@section('breadcrumb-btn-group')
    <a href="{{ route('categories.create') }}"
       class="button">
        Create a Category
    </a>
@endsection

@section('content')
    <div class="container">

        @include('partials.search' , ['type' => 'categories'])

        <div class="lg:flex lg:flex-wrap">
            @foreach($categories as $category)
                <div class="lg:w-1/5">
                    <div class="relative bg-white rounded shadow mb-4 mr-4 h-24 border-l-4 border-indigo-light">

                        <div class="pl-2 py-5">
                            <div>
                                <a href="{{ route('categories.edit' , $category) }}"
                                   class="no-underline text-indigo-light ">
                                    {{ $category->name }}
                                </a>
                            </div>

                            <div class="absolute pin-x pin-b flex justify-between py-4 mx-3">

                                <div>
                                    <p class="text-xs italic text-grey-dark">
                                        {{ $category->posts->count() }}
                                        Posts
                                    </p>
                                </div>

                                <div>
                                    <form action="{{ route('categories.delete' , $category) }}"
                                          method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit"
                                                class="text-red-light mr-4">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center">
            {{ $categories->links() }}
        </div>


    </div>
@endsection