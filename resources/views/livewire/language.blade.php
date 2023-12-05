<li class="nav-item dropdown language-dropdown">
    <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="language-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
    </a>
    <div class="dropdown-menu position-absolute" aria-labelledby="language-dropdown">
        <a class="dropdown-item d-flex" href="javascript:void(0);" wire:click="change('en')"><img src="{{asset('darkmode/assets/img/ca.png')}}" class="flag-width" alt="flag"> <span class="align-self-center">&nbsp;English</span></a>
        <a class="dropdown-item d-flex" href="javascript:void(0);" wire:click="change('fr')"><img src="{{asset('darkmode/assets/img/fr.png')}}" class="flag-width" alt="flag"> <span class="align-self-center">&nbsp;French</span></a>
        <a class="dropdown-item d-flex" href="" wire:click="" data-target ="#addlanguage" >  <span class="align-self-center">&nbsp;Add Language</span></a>
    </div>
</li>