@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Note Details</h4>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group row">
                            <div class="col-2 strong">Title: </div>
                            <div class="col-10 form-control">{{ $note->title }}</div>
                        </div>
                        <div class="form-group row">
                            <div class="col-2 strong">Body: </div>
                            <div class="col-10 form-control" style="min-height: 5em;">{{ $note->body }}</div>
                        </div>
                        <div class="form-group row">
                            <div class="col-2 strong">Created On: </div>
                            <div class="col-10 form-control">{{ $note->created_at->format('F d, Y h:ia') }}</div>
                        </div>
                        <div class="form-group row mb-0">
                            <a href="{{ route('notes.index') }}" class="btn btn-outline-danger" >Return to Listing</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
