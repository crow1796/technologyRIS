<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                {{-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button> --}}
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ Auth::user()->permission->name }} Panel
                </a>
            </div>
            {{-- <p class="navbar-text text-center">{{ Auth::user()->permission->name }} Panel</p> --}}
            {{-- <div class="collapse navbar-collapse navbar-ex1-collapse">
                <div class="nav navbar-nav navbar-right">
                    <form class="navbar-form pull-right">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-search"></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Search something">
                            <div class="input-group-btn">
                                <button class="btn btn-default">GO!</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> --}}
            {{-- /navbar nav  --}}
        </div>
    </nav>