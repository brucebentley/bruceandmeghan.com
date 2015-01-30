<h3 class="form-title centered">Request a Song</h3>

<div class="row">
    <div class="col-md-6 form-group required" id="songName">
    <label class="form-label" for="inputSongName">Title <span class="req">*</span></label>
    [text* inputSongName id:inputSongName class:form-control class:input-md tabindex:1]
    <span class="form-highlight"></span>
    </div>

    <div class="col-md-6 form-group" id="artistName">
    <label class="form-label" for="inputArtistName">Artist</label>
    [text inputArtistName id:inputArtistName class:form-control class:input-md tabindex:2]
    <span class="form-highlight"></span>
    </div>
</div>

<div class="row">
    <div class="col-md-12 form-group required" id="songYourName">
    <label class="form-label" for="inputYourName">Your Name <span class="req">*</span></label>
    [text* inputYourName id:inputYourName class:form-control class:input-md placeholder "Your Name" tabindex:3]
    <span class="form-highlight"></span>
    </div>

    <div class="col-md-12 form-group" id="shoutOut">
    <label class="form-label" for="inputShoutOut">Give A Shout Out?</label>
    [textarea inputShoutOut x5 id:inputShoutOut class:form-control class:input-md placeholder "This one goes out to the beautiful blonde who I just met at the bar..." tabindex:4]
    <span class="form-highlight"></span>
    </div>
</div>

<div class="row submit">
    <div class="col-md-12 form-group">
    [submit id:songRequestSubmit class:btn class:btn-default class:btn-md class:btn-flat class:btn-submit tabindex:5 "SUBMIT"]
    </div>
</div>


Mail Snippets:
-------------------
[inputSongName]
[inputArtistName]
[inputYourName]
[inputShoutOut]



<h3 class="form-title centered">Request a Song</h3><div class="row"><div class="col-md-6 form-group required" id="songName"><label class="form-label" for="inputSongName">Title <span class="req">*</span></label>[text* inputSongName id:inputSongName class:form-control class:input-md tabindex:1]<span class="form-highlight"></span></div><div class="col-md-6 form-group" id="artistName"><label class="form-label" for="inputArtistName">Artist</label>[text inputArtistName id:inputArtistName class:form-control class:input-md tabindex:2]<span class="form-highlight"></span></div></div><div class="row"><div class="col-md-12 form-group required" id="songYourName"><label class="form-label" for="inputYourName">Your Name <span class="req">*</span></label>[text* inputYourName id:inputYourName class:form-control class:input-md tabindex:3]<span class="form-highlight"></span></div><div class="col-md-12 form-group" id="shoutOut"><label class="form-label" for="inputShoutOut">Give A Shout Out?</label>[textarea inputShoutOut x5 id:inputShoutOut class:form-control class:input-md tabindex:4 placeholder "This one goes out to the beautiful blonde who I just met at the bar..."]<span class="form-highlight"></span></div></div><div class="row submit"><div class="col-md-12 form-group">[submit id:songRequestSubmit class:btn class:btn-default class:btn-md class:btn-flat class:btn-submit tabindex:5 "SUBMIT"]</div></div>