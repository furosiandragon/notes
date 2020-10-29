@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Create Note</h4>
                </div>

                <div class="card-body">
                    {{ Form::open(['url' => 'notes'])}}
                        <div class="form-group">
                            @csrf
                            <div class="form-group row">
                                {{ Form::label('title', 'Title', ['class' => 'col-1']) }}
                                {{ Form::text('title', null, ['class' => 'form-control col-11', 'required']) }}
                            </div>
                            <div class="form-group row">
                                {{ Form::label('body', 'Body', ['class' => 'col-1']) }}<br />
                                {{ Form::textarea('body', null, ['class' => 'form-control col-11', 'required']) }}
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-1">&nbsp;</div>
                                {{ Form::submit('Add Note', ['class' => 'btn btn-primary mr-2'])}}
                                <a href="{{ route('notes.index') }}" class="btn btn-outline-danger" >Cancel</a>
                            </div>
                        </div>
                    {{ Form:: close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
