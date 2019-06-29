@if(Session('info'))
    <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center">
            <div class="tem alert alert-success navbar-fixed-bottom"><span class="glyphicon glyphicon-ok-circle"></span> {{Session('info')}}</div>
        </div>
    </div>
@endif
@if(Session('error'))
    <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center">
            <div class="tem alert alert-danger navbar-fixed-bottom"><span class="glyphicon glyphicon-ok-circle"></span> {{Session('error')}}</div>
        </div>
    </div>
@endif

<script>
    $(function () {
        setInterval(function(){
            $('alert').fadeOut();
        }, 3000);
    })
</script>