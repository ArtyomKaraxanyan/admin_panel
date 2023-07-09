@extends('dashboard.layouts.app')
@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="card m-auto">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('Create Company') }}</h5>

                        <form class="row g-3" method="post" action="{{route('categories.store')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="col-md-12">
                                <div class="col-md-8 m-auto">
                                    <div class="form-floating has-validation mb-3">
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                               id="title" name="title" placeholder="{{__('Category title')}}"
                                               value="{{old('name')}}">
                                        @error('name')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                        <label for="name">{{ __('Category title') }}</label>
                                    </div>

                                    <div class="mb-3">
                                        <h6 >{{ __('Category cover') }}</h6>
                                        <div class="upload-content d-flex">
                                            <input type="file" multiple class="form-control @error('cover') is-invalid @enderror"
                                                   id="cover" name="cover[]"  placeholder="{{__('Company cover')}}"
                                                   value="{{old('cover')}}">
                                            @error('logo')
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
