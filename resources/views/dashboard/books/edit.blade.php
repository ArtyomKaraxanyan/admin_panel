@extends('dashboard.layouts.app')
@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="card m-auto">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('Update Employee') }}</h5>

                        <form class="row g-3" method="post" action="{{route('books', $employee->id)}}" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}

                            <div class="col-md-12">
                                <div class="col-md-8 m-auto">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="company" name="company_id" aria-label="Company">
                                            <option value="" selected>---</option>
                                            @forelse ($companies as $company)
                                                <option value="{{$company->id}}" {{$company->id == $employee->company_id ? 'selected' : '' }}>{{ $company->name }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                        <label for="company">{{__('Company')}}</label>
                                    </div>

                                    <div class="form-floating has-validation mb-3">
                                        <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                               id="first_name" name="first_name" placeholder="{{__('First name')}}"
                                               value="{{old('first_name', $employee->first_name )}}">
                                        @error('first_name')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                        <label for="name">{{ __('First name') }}</label>
                                    </div>
                                    <div class="form-floating has-validation mb-3">
                                        <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                               id="last_name" name="last_name" placeholder="{{__('Last name')}}"
                                               value="{{old('last_name', $employee->last_name )}}">
                                        @error('last_name')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                        <label for="name">{{ __('Last name') }}</label>
                                    </div>
                                    <div class="form-floating has-validation mb-3">
                                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                                               id="email" name="email" placeholder="{{__('Employee email')}}"
                                               value="{{old('email', $employee->email)}}">
                                        @error('email')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                        <label for="name">{{ __('Employee email') }}</label>
                                    </div>
                                    <div class="form-floating has-validation mb-3">
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                               id="phone" name="phone" placeholder="{{__('Employee phone')}}"
                                               value="{{old('phone', $employee->phone)}}">
                                        @error('phone')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                        <label for="name">{{ __('Employee phone') }}</label>
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
