<div class="inlineHeader">
        <div class='mycalenderbutton' id='mycalenderbutton' data-toggle="tooltip" title="Toggle My Calendar">
            <button class="btn btnColor"><i class="fa fa-calendar"></i></button>
        </div>
        <div id="searchContainer">
            <form class="form-inline" id="searchForm">
                <div class="form-group" id="searchFormInputs">
                    <label for="search" class="sr-only">Search</label>
                    <input type="text" placeholder="Search" name="search" id="search" class="searchInput">
                    <button class="btn btn-sm btnDone btnSearch" id="searchBtn" type="button">&#x1F50E;&#xFE0E;</button>
                </div>
            </form>
        </div>
    </div>

<!--      My Calender-->
    <div class='calenderExpandable' id="mycalenderid">
        <div class="innercalenderexpandable">
            <div class="container">	
                <h2>My Events</h2>
                <div class="page-header">
                    <div class="pull-right form-inline">
                        <div class="btn-group">
                            <button class="btn btnColor" data-calendar-view="year">Year</button>
                            <button class="btn btnColor active" data-calendar-view="month">Month</button>
                            <button class="btn btnColor" data-calendar-view="week">Week</button>
                        </div>
                        <div class="btn-group">
                            <button class="btn btn-primary" data-calendar-nav="prev"><< Prev</button>
                            <button class="btn cancelBtn" data-calendar-nav="today">Today</button>
                            <button class="btn btn-primary" data-calendar-nav="next">Next >></button>
                        </div>
                    </div>
                    <h3></h3>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <div id="showMyEventCalendar"></div>
                    </div>
                    <div class="col-md-3">
                        <h4>All Events List</h4>
                        <ul id="myeventlist" class="nav nav-list"></ul>
                        <div class='myCalendarKey' style='border-top:solid 1px slategray;margin-top:30px;'>
                            <h5>Events Key</h5>
                            <span style='color:#800080;'>⬤</span> Limited Event<br /><span style='color:#e3bc08;'>⬤</span> Open Event<br /><span style='color:#1e90ff;'>⬤</span> Tournaments<br /><span style='color:#006400;'>⬤</span> My Events
                        </div>
                    </div>
                </div>	
            </div>
        </div>
    </div>