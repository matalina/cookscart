@layout('common')


@section('content')
<div class="row">
    <div class="twelve columns">
        <section class="outer">
            <div class="inner">
                <h2>Meal Plan</h2>
                @yield('calendar')
            </div>
        </section>
    </div>
</div>
<div class="row">
    <div class="four columns">
        <section class="outer">
            <div class="inner">
                <h2>Recipes</h2>
                @yield('recipes')
            </div>
        </section>
    </div>
    <div class="four columns">
        <section class="outer">
            <div class="inner">
                <h2>Pantry</h2>
                @yield('pantry')
            </div>
        </section>
    </div>
    <div class="four columns">
        <section class="outer">
            <div class="inner">
                <h2>Tasks</h1>
                
            </div>
        </section>
    </div>
</div>
@endsection