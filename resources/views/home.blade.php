

    @extends('layouts.app')


@section('content') 

<div class="main_container">
    <div class="home_container">
        <div class="heading">
<h1 class="home_title">Welcome to Our Recipe App!</h1>
<h1 class="home_title_h2">Find recipes for delicious meals</h1>
<a href="" class="btn_home">See recipes</a>

        </div>
        <img src="{{asset('images/bowl.png')}}" class="bowl" alt="bowl"  />

    </div>
<img src="{{asset('images/salad.png')}}" class="salad" alt="salad"  />
   </div>

@endsection