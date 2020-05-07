@extends('imagine.index')
@section('head-meta')
<title>{{$berita[0]->judul}}</title>
<link rel="icon" type="image/png" sizes="16x16" href="{{url('public/images/fav.png')}}">
<meta property="og:url"                content="{{$urlLink}}" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="{{$berita[0]->judul}}" />
<meta property="og:description"        content="{{$description}}" />
<meta property="og:image"              content="{{$gambarLink}}" />
@endsection

@section('content')

<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5866255bf1b2733b"></script>
    <berita-Detail :id="{{ $id }}"></berita-Detail>
@endsection