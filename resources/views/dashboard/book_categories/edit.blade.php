@extends('dashboard.layouts.app')
@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="card m-auto">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('Edit Category') }}</h5>

                        <form class="row g-3" method="post" action="{{route('categories.update', $category->id)}}" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}

                            <div class="col-md-12">
                                <div class="col-md-8 m-auto">
                                    <div class="logo-preview text-center m-4">
                                         @foreach($category->covers as $cover)
                                        <img src="{{asset('/image/100x100/'.$cover->path)}}" alt="cover" class="delete_cover" style="">
                                                <button style="" class="image_delete" data-url="{{route('deleteImage',$cover->id)}}"><i class="bi bi-trash"></i></button>
                                          @endforeach
                                    </div>

                                    <div class="form-floating has-validation mb-3">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                               id="name" name="name" placeholder="{{__('Category name')}}"
                                               value="{{old('name', $category->title)}}">
                                        @error('name')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                        <label for="name">{{ __('Category name') }}</label>
                                    </div>
                                    <div class="mb-3">
                                        <h6 >{{ __('Category logo') }}</h6>
                                        <input type="file" class="form-control @error('logo') is-invalid @enderror"
                                               id="logo" name="logo" placeholder="{{__('Category logo')}}"
                                               value="{{old('logo')}}">
                                        @error('logo')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
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
