@extends('dashboard.layouts.app')
@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="card m-auto">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('Create Book') }}</h5>

                        <form class="row g-3" method="post" action="{{route('books.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <div class="col-md-8 m-auto">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="category" name="category_id" aria-label="Category">
                                            @forelse ($categories as $category)
                                                <option value="{{$category->id}}">{{ $category->title }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                        <label for="book">{{__('Category')}}</label>
                                    </div>

                                    <div class="form-floating has-validation mb-3">
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                               id="title" name="title" placeholder="{{__('Title')}}"
                                               value="{{old('title')}}">
                                        @error('title')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                        <label for="name">{{ __('Title') }}</label>
                                    </div>
                                    <div class="form-floating has-validation mb-3">
                                        <input type="text" class="form-control @error('author') is-invalid @enderror"
                                               id="author" name="author" placeholder="{{__('author')}}"
                                               value="{{old('author')}}">
                                        @error('author')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                        <label for="name">{{ __('Author') }}</label>
                                    </div>
                                    <div class="form-floating has-validation mb-3">
                                        <textarea  rows="3"  class="form-control @error('description') is-invalid @enderror"
                                                  id="description" name="description" placeholder="{{__('Description')}}">
                                        </textarea>
                                        @error('description')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                        <label for="description">{{ __('Description') }}</label>
                                    </div>
                                    <div class="mb-3">
                                        <h6 >{{ __('Book cover') }}</h6>
                                        <div class="upload-content d-flex">
                                            <input type="file" multiple class="form-control @error('cover') is-invalid @enderror"
                                                   id="cover" name="cover[]"  placeholder="{{__('Book cover')}}"
                                                   value="{{old('cover')}}">
                                            @error('cover')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success" id="save">{{__('Create')}}</button>
                                        <button type="reset" class="btn btn-secondary">{{__('Reset')}}</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
