@extends('dashboard.layouts.app')
@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Companies</h5>
                        <h5 class="card-title">
                            <a href="{{ route('categories.create') }}" class="btn btn-sm btn-outline-success text-capitalize">
                                + Create
                            </a>
                        </h5>
                        <div class="table-responsive" id="data-list">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Cover</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($categories as $category)
                                    <tr>
                                        <th scope="row">{{ $category->id }}</th>
                                        <td>
                                            <section id="image-carousel" class="splide" aria-label="Beautiful Images">
                                                <div class="splide__track">
                                                    <ul class="splide__list" >
                                                            @foreach($category->covers as $cover)
                                                            <img src="{{asset('/image/100x100/'.$cover->path)}}" alt="cover">
                                                            @endforeach
                                                    </ul>
                                                </div>
                                            </section>
                                        </td>
                                        <td>{{ $category->title }}</td>

                                        <td>
                                            <a href="{{ route('categories.edit', $category->id) }}"
                                               title="{{ __('Edit') }}"
                                               type="button"
                                               class="btn btn-sm btn-outline-primary"
                                            >
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <form method="post" action="{{ route('categories.destroy', $category->id) }}" class="d-inline-block">
                                                @method('DELETE')
                                                @csrf
                                                <a type="button" class="btn btn-sm btn-outline-danger delete btn-delete"
                                                   title="{{ __('Delete') }}"
                                                >
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="6">
                                            Empty data
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                            {{--{!! $categories->links('dashboard.partials.pagination') !!}--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
