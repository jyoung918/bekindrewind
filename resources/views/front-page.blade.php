@extends('layouts.app')

@section('content')

@while(have_posts()) @php(the_post())
@includeFirst(['partials.content-page', 'partials.content'])
<h1>Hello World!</h1>
@endwhile

@endsection
