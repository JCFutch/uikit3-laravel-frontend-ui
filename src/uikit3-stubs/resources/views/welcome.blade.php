<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel with UIKit3</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <style>
    .wrap::before {
    				position: absolute;
    				height: 100vh;
    				width: 100vw;
    				content: '';
    				z-index: 1;
    				background-color: rgba(0,0,0,0.6);
    			}
    			.lead {
    				font-size: 1.175em;
    				font-weight: 300;
    			}
    			.uk-logo img {
    				height: 45px;
    			}

     .laravel-name {
       font-family: 'Nunito', sans-serif !important;
       font-size: 84px;
       font-weight: 200;
     }

     .links {
       padding: 0 25px;
       font-size: 13px;
       font-weight: 600;
       letter-spacing: .1rem;
       text-decoration: none;
       text-transform: uppercase;
     }
     </style>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="uk-light wrap uk-background-norepeat uk-background-cover uk-background-center-center uk-cover-container uk-background-secondary">
  <img data-srcset="https://picsum.photos/640/700/?image=251 640w,
		             https://picsum.photos/960/700/?image=251 960w,
		             https://picsum.photos/1200/900/?image=251 1200w,
		             https://picsum.photos/2000/1000/?image=251 2000w"
		     sizes="100vw"
		     data-src="https://picsum.photos/1200/900/?image=251" alt="" data-uk-cover data-uk-img>
  <div class="uk-flex uk-flex-center uk-flex-middle uk-height-viewport uk-position-z-index uk-position-relative" data-uk-height-viewport="min-height: 400">

    <!-- NAV -->
   			<div class="uk-position-top">
   				<div class="uk-container uk-container-small">
   					<nav class="uk-navbar-container uk-navbar-transparent uk-width-expand" data-uk-navbar>
   						<div class="uk-navbar-left">
   							<div class="uk-navbar-item">
   								<a class="uk-logo" href=""><img src="{{ asset('images/uikit-logo.png') }}" alt="Logo"></a>
   							</div>
   						</div>
   						<div class="uk-navbar-right">
                @if(Route::has('login'))
   							<ul class="uk-navbar-nav">
                  @auth
   								<li class="uk-active uk-visible@m"><a href="{{ url('home') }}" data-uk-icon="home">{{ __('Home') }}</a></li>
                  @else
   								<li class="uk-visible@s"><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                  @if (Route::has('register'))
   								<li class="uk-visible@s"><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                  @endif
                  @endauth
   							</ul>
   						</div>
              @endif
   					</nav>
   				</div>
   			</div>
   			<!-- /NAV -->

        <!-- TEXT -->
<div class="uk-container uk-flex-auto uk-text-center" data-uk-scrollspy="target: > .animate; cls: uk-animation-slide-bottom-small uk-invisible; delay: 300">
  <h1 class="uk-heading-primary animate uk-invisible laravel-name">Laravel with UIKit3</h1>

  <div class="uk-width-4-5@m uk-margin-auto animate uk-invisible">
					<p class="lead">Laravel Framework with UIKit.</p>
	</div>

  <div class="uk-margin-medium-top animate uk-invisible uk-flex-inline" data-uk-margin data-uk-scrollspy-class="uk-animation-fade uk-invisible">
    <ul class="uk-subnav links" uk-margin>
    <li><a href="https://laravel.com/docs" title="Documentation">Documentation</a></li>
    <li><a href="https://laracasts.com" title="Laracasts">Laracasts</a></li>
    <li><a href="https://laravel-news.com" title="News">News</a></li>
    <li><a href="https://nova.laravel.com" title="Nova">Nova</a></li>
    <li><a href="https://forge.laravel.com" title="Forge">Forge</a></li>
    <li><a href="https://github.com/laravel/laravel" title="Github">Github</a></li>
  </ul>
  </div>
</div>
<!-- /TEXT -->

<!-- FOOT -->
<div class="uk-position-bottom-center uk-position-small">
  <span class="uk-text-small uk-text-center">© 2020 | <a href="http://github.com/JCFutch" target=_blank title="Crafted by Cartographr">Crafted by Cartographr</a> | Built with <a href="http://getuikit.com" title="Visit UIkit 3 site" target="_blank" data-uk-tooltip><span data-uk-icon="uikit"></span></a></span>
</div>
<!-- /FOOT -->

</div>

<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>

</body>
</html>
