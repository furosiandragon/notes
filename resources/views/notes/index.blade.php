@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Dashboard</h4>
                </div>

                <div class="card-body">
                    <ul class="nav justify-content-start mb-2">
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary mr-2" href="{{ route('notes.create') }}">{{ __('+New Note') }}</a>
                        </li>
                        <li class="nav">
                            <a class="nav-link btn btn-outline-secondary" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>

                    <hr />

                    <table class="table table-borderless table-secondary mb-0">
                        <tbody>
                            @foreach ($notes as $note)
                                <tr>
                                    <td colspan="2" class="align-middle font-weight-bold">
                                        {{ $note->title }} (created by {{ $note->user->name }} on {{ $note->created_at->format('l, M d, Y, h:ia') }})
                                        <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-sm btn-info ml-2">Edit</a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['notes.destroy', $note->id], 'class' => 'd-inline']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger ml-2']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                <tr class="border-bottom border-dark">
                                    <td width="5%">&nbsp;</td>
                                    <td class="align-middle">{{ $note->body }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="bg-white p-0">&nbsp;</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-center pagination">
                        {!! $notes->links('notes.paginate') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection