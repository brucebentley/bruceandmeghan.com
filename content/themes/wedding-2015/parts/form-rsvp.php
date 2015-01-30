<div class="row">
    <!-- FULL NAME -->
    <div class="col-md-3 form-group required" id="rsvpFullName">
        <label class="form-label" for="inputFullName">Your Full Name</label>
        [text* inputFullName id:inputFullName class:form-control class:input-lg]
        <span class="form-highlight"></span>
    </div>

    <!-- EMAIL ADDRESS -->
    <div class="col-md-3 form-group required" id="rsvpEmailAddress">
        <label class="form-label" for="inputEmailAddress">Email Address</label>
        [email* inputEmailAddress id:inputEmailAddress class:form-control class:input-lg]
        <span class="form-highlight"></span>
    </div>

    <!-- EVENT ATTENDANCE -->
    <div class="col-md-3 form-group required" id="rsvpEvents">
        <label class="form-label" for="inputEventAttendance">Will You Attend...</label>
        <div class="select">
            [select* inputEventAttendance id:inputEventAttendance class:form-control class:input-lg include_blank "All Events" "The Main Ceremony" "The Wedding Reception" "Not Attending"]
        </div>
        <span class="form-highlight"></span>
    </div>

    <!-- MENU SELECTION -->
    <div class="col-md-3 form-group required" id="rsvpMenuChoice">
        <label class="form-label" for="inputMenuChoice">What Are We Eating?</label>
        <div class="select">
            [select* inputMenuChoice id:inputMenuChoice class:form-control class:input-lg include_blank "Lemon Basil Salmon" "Honey Roast Chicken Breast" "Penne a la Florentina" "Chicken Tenders"]
        </div>
        <span class="form-highlight"></span>
    </div>
</div>

<div class="row submit centered">
    <div class="col-md-12 form-group">
        [submit id:rsvpSubmit class:btn class:btn-primary class:btn-lg class:btn-raised class:btn-submit "RSVP ME!"]
    </div>
</div>




[contact-form-7 id="463" title="RSVP Form" html_id="rsvpForm" html_class="form rsvp"]

<div class="row"><div class="col-md-3 form-group required" id="rsvpFullName"><label class="sr-only" for="inputFullName">Your Full Name</label>[text* inputFullName id:inputFullName class:form-control class:input-lg tabindex:1]<span class="form-highlight"></span><span class="form-bar"></span><label class="float-label" for="inputFullName">Your Full Name</label></div>

<div class="col-md-3 form-group required" id="rsvpEmailAddress"><label class="sr-only" for="inputEmailAddress">Email Address</label>[email* inputEmailAddress id:inputEmailAddress class:form-control class:input-lg tabindex:2]<span class="form-highlight"></span><span class="form-bar"></span><label class="float-label" for="inputEmailAddress">Email Address</label></div>

<div class="col-md-3 form-group required" id="rsvpEvents"><label class="sr-only" for="inputEventAttendance">Will You Attend...</label><div class="select">[select* inputEventAttendance id:inputEventAttendance class:form-control class:input-lg  tabindex:3 include_blank "All Events" "The Main Ceremony" "The Wedding Reception" "Not Attending"]</div><span class="form-highlight"></span><span class="form-bar"></span><label class="float-label" for="inputEventAttendance">Will You Attend...</label></div>

<div class="col-md-3 form-group required" id="rsvpMenuChoice"><label class="sr-only" for="inputMenuChoice">What Are We Eating?</label><div class="select">[select* inputMenuChoice id:inputMenuChoice class:form-control class:input-lg tabindex:4 include_blank "Lemon Basil Salmon" "Honey Roast Chicken Breast" "Penne a la Florentina" "Chicken Tenders"]</div><span class="form-highlight"></span><span class="form-bar"></span><label class="float-label" for="inputMenuChoice">What Are We Eating?</label></div></div>

<div class="row submit centered"><div class="col-md-12 form-group">[submit id:rsvpSubmit class:btn class:btn-primary class:btn-lg class:btn-raised class:btn-submit tabindex:5 "RSVP ME!"]</div></div>







<!-- Put The Following Code into the Mail Fields below: -->
    [inputFullName]
    [inputEmailAddress]
    [inputEventAttendance]
    [inputMenuChoice]