@extends('dashboard.layouts.app')
@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="card m-auto">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('Update Book') }}</h5>

                        <form class="row g-3" method="post" action="{{route('books.update', $book->id)}}" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="logo-preview text-center m-4">
                                @foreach($book->covers as $cover)
                                    <span class="image_blog">
                                        <img src="{{asset('/images/book/100x100/'.$cover->path)}}" alt="cover" class="delete_cover" style="">
                                          <button style="" class="book_image_delete" data-url="{{route('BookDeleteImage',$cover->id)}}"><i class="bi bi-trash"></i></button>
                                             </span>
                                @endforeach
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-8 m-auto">
                                    <div class="form-floating mb-3">
                                        <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" aria-label="Category">
                                            <option  value="{{$mainCategory->id}}">{{ $mainCategory->title }}</option>
                                            @forelse ($categories as $category)
                                                <option value="{{$category->id}}">{{ $category->title }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                        @error('category_id')
                                        <div class="invalid-feedback d-block">{{$message }}</div>
                                        @enderror
                                        <label for="company">{{__('Category')}}</label>
                                    </div>

                                    <div class="form-floating has-validation mb-3">
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                               id="title" name="title" placeholder="{{__('Title')}}"
                                               value="{{$book->title}}">
                                        @error('title')
                                        <div class="invalid-feedback d-block">{{$message }}</div>
                                        @enderror
                                        <label for="name">{{ __('Title') }}</label>
                                    </div>
                                    <div class="form-floating has-validation mb-3">
                                        <input type="text" class="form-control @error('author') is-invalid @enderror"
                                               id="author" name="author" placeholder="{{__('author')}}"
                                               value="{{$book->author}}">
                                        @error('author')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                        <label for="name">{{ __('Author') }}</label>
                                    </div>
                                    <div class="form-floating has-validation mb-3">
                                        <textarea  rows="3"  class="form-control @error('description') is-invalid @enderror"
                                                   id="description" name="description" placeholder="{{__('Description')}}">
                                            {{$book->description}}
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
                                        <button type="submit" class="btn btn-success" id="save">{{__('Update')}}</button>
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
