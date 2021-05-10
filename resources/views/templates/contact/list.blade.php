@extends('layouts.main')

@section('content')

    <div class="container">
        <div class="mt-5">
            <h1>Email contact list </h1>
            <div class="row">
                <div class="col-lg-6">
                    @if ($contacts->count() > 0)
                        <table class="table table-striped">
                            <thead class="thead">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Subjet</th>
                                    <th scope="col">created At </th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $key => $item)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $item->email }}</td>
                                        <td>...</td>
                                        <td>----------</td>

                                        {{-- <td>{{ $item->subject }}</td> --}}
                                        {{-- <td>{{ $item->created_at }}</td> --}}

                                        <td>
                                            <h6 class="m-0 text-c-red">
                                                <a href="{{ route('contact.edit', $item->id) }}">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>&nbsp;

                                                <a title="delete email"
                                                    onclick="return confirm('Are you sure you want to Remove?');"
                                                    href="{{ route('contact.delete', ['id' => $item->id]) }}"><i
                                                        class="bi bi-trash-fill "></i>
                                                </a>

                                            </h6>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    @else
                        <span> Aucun email en base de donnée.</span>
                    @endif
                </div>

                <div class="col-lg-6">
                    @isset($contact)
                        @include('templates.partials.error_flash')

                        @include('templates.partials.edit_form')
                    @endisset
                </div>
            </div>

        </div>

    @endsection
