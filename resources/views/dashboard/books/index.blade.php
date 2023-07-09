@extends('dashboard.layouts.app')
@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Employees</h5>
                        <h5 class="card-title">
                            <a href="{{ route('books') }}" class="btn btn-sm btn-outline-success text-capitalize">
                                + Create
                            </a>
                        </h5>
                        <div class="table-responsive" id="data-list">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Company</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($employees as $employee)
                                    <tr>
                                        <th scope="row">{{ $employee->id }}</th>
                                        <td>{{ $employee->company->name }}</td>
                                        <td>{{ $employee->full_name }}</td>
                                        <td>{{ $employee->email }}</td>
                                        <td>{{ $employee->phone }}</td>
                                        <td>
                                            <a href="{{ route('books', $employee->id) }}"
                                               title="{{ __('Edit') }}"
                                               type="button"
                                               class="btn btn-sm btn-outline-primary"
                                            >
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <form method="post" action="{{ route('employees.destroy', $employee->id) }}" class="d-inline-block">
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
                            {{ $employees->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
