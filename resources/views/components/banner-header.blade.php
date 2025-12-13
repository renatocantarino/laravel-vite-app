<div class="banner">
    <div class="jumbotron jumbotron-bg text-center rounded-0"
        style="margin-top: -25px;background-image:url('{{asset('assets/img/bg-header.jpg')}}');">
        <div class="container">
            <h1 class="pt-5">{{ $title ?? 'Default Title' }}</h1>
            <p class="lead">{{ $slot ?? 'Default content.' }}</p>
        </div>
    </div>
</div>