<ul class="{{ $listClass ?? 'social-icons' }}">
    @foreach(['facebook' => 'fa-facebook', 'instagram'=>'fa-instagram', 'twitter'=>'fa-twitter', 'google'=>'fa-google-plus', 'whatsapp'=>'fa-whatsapp', 'linkedin'=>'fa-linkedin', 'youtube'=>'fa-youtube-play'] as $sk => $sv)
        @if(setting('theme::'.$sk) && $sk == 'whatsapp')
            <li>
                <a rel="nofollow" class="{{ $sk }} {{ $iconClass ?? '' }}" href="whatsapp:{{ setting('theme::'.$sk) }}"><i class="fa {{ $sv }}"></i></a>
            </li>
        @elseif(setting('theme::'.$sk))
            <li>
                <a rel="nofollow" target="_blank" class="{{ $sk }} {{ $iconClass ?? '' }}" href="{{ setting('theme::'.$sk) }}"><i class="fa {{ $sv }}"></i></a>
            </li>
        @endif
    @endforeach
</ul>