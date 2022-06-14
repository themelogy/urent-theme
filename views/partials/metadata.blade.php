<meta charset="utf-8">
<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1">

{!! seo_helper()->render() !!}

<!-- Favicon -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ Theme::url('img/logo/favicon.png') }}">
<link rel="shortcut icon" href="{{ Theme::url('img/logo/favicon.png') }}">
<link rel="icon" type="image/png" href="{{ Theme::url('img/logo/favicon.png') }}">

<script async>
    WebFontConfig = { google: {
            families: [
                'Roboto:400,700,300:latin-ext',
                'Raleway:700,800,900,400,300:latin-ext',
                'Open+Sans:400,300,600,700,800'
            ]
        }};
    (function(d) {
        var wf = d.createElement('script'), s = d.scripts[0];
        wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
        wf.async = true;
        s.parentNode.insertBefore(wf, s);
    })(document);
</script>

<link rel="stylesheet" href="{{ mix('/themes/urent/css/preloader.css') }}">