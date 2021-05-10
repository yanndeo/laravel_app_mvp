@extends('layouts.main')
@section('content')
    <div class="row mt-5 ">
        <div class="box effect1 py-5 px-3">
            <div class="col-lg-6 col-sm-12">
                <div class="border border-black p-4 ">
                    @include('templates.partials.error_flash')

                    <form method="POST" action="{{ route('contact.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <div class="colx">
                                <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject"
                                    placeholder="Ex: " name="subject">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <div class="colx">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                    name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description"> Description</label>
                            <textarea class="form-control border-radius-none" name="description" id="description"
                                rows="6"></textarea>
                        </div>

                        <button class="btn btn-block btn-purple py-2 text-uppercase border-radius-none" type="submit">Submit
                            Message </button>
                    </form>
                </div>
            </div>


        </div>
    </div>
@endsection
