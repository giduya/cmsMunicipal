@extends('Panel.os')

@section('wall')
style="background-image: url('app/img/backgrounds/bg1.jpg') !important; background-attachment:fixed !important; padding-bottom:3px;"
@endsection


@section('content')
<div class="app_container">


  <div class="app_icon">
    <a href="{{ url('cms') }}">
      <img src="app/img/apps/web_icon.png" alt="Página Web"/>
      <span class="app_text">
        Página Web<br><br>
      </span>
    </a>
  </div>


</div>
@endsection
