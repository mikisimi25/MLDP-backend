@extends('layouts.app')

@section('template_title')
    {{ $lista->name ?? 'Show Lista' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Lista</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('listas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $lista->title }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $lista->description }}
                        </div>
                        <div class="form-group">
                            <strong>Public:</strong>
                            {{ $lista->public }}
                        </div>
                        <div class="form-group">
                            <strong>Username:</strong>
                            {{ $lista->username }}
                        </div>
                        <div class="form-group">
                            <strong>User List Count:</strong>
                            {{ $lista->user_list_count }}
                        </div>
                        <div class="form-group">
                            <strong>Contentid:</strong>
                            {{ $lista->contentId }}
                        </div>
                        <div class="form-group">
                            <strong>Visible:</strong>
                            {{ $lista->visible }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
