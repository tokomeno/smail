@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('User Profile')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('send-mails.save') }}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('put')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Mail Campain</h4>
                        </div>
                        <div class="card-body ">
                            @if (session('status'))
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="material-icons">close</i>
                                        </button>
                                        <span>{{ session('status') }}</span>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Subject</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('subject') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('subject') ? ' is-invalid' : '' }}"
                                            name="subject" id="input-name" type="text" placeholder="subject"
                                            value="{{ old('subject') }}" required="true" aria-required="true" />
                                        @if ($errors->has('subject'))
                                        <span id="name-error" class="error text-danger"
                                            for="input-name">{{ $errors->first('subject') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('text') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('text') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}"
                                            name="text" id="input-text" type="text" placeholder="{{ __('text') }}"
                                            value="{{ old('text', auth()->user()->text) }}" required />
                                        @if ($errors->has('text'))
                                        <span id="text-error" class="error text-danger"
                                            for="input-text">{{ $errors->first('text') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection