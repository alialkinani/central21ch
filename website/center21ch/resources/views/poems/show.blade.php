@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="/css/vendor/jquery.atwho.css">
@endsection

@section('content')
    <poem-view :initial-replies-count="{{ $poem->replies_count }}" inline-template>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="level">
                                <img src="{{ $poem->creator->avatar_path }}"
                                     alt="{{ $poem->creator->name }}"
                                     width="25"
                                     height="25"
                                     class="mr-1">

                                <span class="flex">
                                    <a href="{{ route('profile', $poem->creator) }}">{{ $poem->creator->name }}</a> posted:
                                    {{ $poem->title }}
                                </span>

                                @can ('update', $poem)
                                    <form action="{{ $poem->path() }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-link">Delete Poem</button>
                                    </form>
                                @endcan
                            </div>
                        </div>

                        <div class="panel-body">
                            {{ $poem->body }}
                        </div>
                        <br>
                    </div>

                    <replies @added="repliesCount++" @removed="repliesCount--"></replies>
                </div>

                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <p>
                                This poem was published {{ $poem->created_at->diffForHumans() }} by
                                <a href="#">{{ $poem->creator->name }}</a>, and currently
                                has <span
                                        v-text="repliesCount"></span> {{ str_plural('comment', $poem->replies_count) }}
                                .
                            </p>

                            <p>
                                <subscribe-button :active="{{ json_encode($poem->isSubscribedTo) }}"></subscribe-button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </poem-view>
@endsection