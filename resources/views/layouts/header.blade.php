<header id="header">
    <a href="{{ url('/') }}" class="logo">Дослідження</a>
</header>

<!-- Nav -->
<nav id="nav">
    <ul class="links">
        <li class=@if(url()->current()== url('/'))"active"@endif><a href="{{ url('/')}}">Головна</a></li>
        <li class=@if(url()->current()==url('/user_search'))"active"@endif><a href="{{ url('/user_search') }}" >Пошук користувача</a></li>
        <li class=@if(url()->current()==url('/contact'))"active"@endif><a href="{{ url('/contact') }}">Зв'язок</a></li>
    </ul>
    <ul class="icons">
        <li><a href="https://twitter.com/MistEr_Yuri" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
        <li><a href="https://www.facebook.com/yuri.nagotnyuk?ref=tn_tnmn" class="icon alt fa-facebook"><span class="label">Facebook</span></a></li>
        <li><a href="https://www.instagram.com/_mr_yuri/" class="icon alt fa-instagram"><span class="label">Instagram</span></a></li>
        <li><a href="https://github.com/Yuri27" class="icon alt fa-github"><span class="label">GitHub</span></a></li>
        <li><a href="https://plus.google.com/109900682972739667583" class="icon alt fa-google-plus"><span class="label">Google Plus</span></a></li>
        <li><a href=" https://chat.whatsapp.com/Ju4RGhzMU4bEOja2mhP0vI" class="icon alt fa-whatsapp"><span class="label">WhatsApp</span></a></li>
        <li><a href="skype:yuri9731?chat" class="icon alt fa-skype"><span class="label">Skype</span></a></li>
    </ul>
</nav>