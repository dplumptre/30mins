<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>@yield('title') | 30mins</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{ csrf_token()}}" />
        <link href='http://fonts.googleapis.com/css?family=Alegreya+Sans+SC:900italic,400' rel='stylesheet' type='text/css'> 
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>

        {{ HTML::style('assets/css/bootstrap.css') }}
        {{ HTML::style('assets/css/bootswatch.min.css') }}    
        {{ HTML::style('assets/css/style.css') }}
        {{ HTML::style('font-awesome-4.1.0/css/font-awesome.min.css') }}
        {{ HTML::style('assets/css/dataTables.bootstrap.css') }}   
        {{ HTML::style('timepicker/css/redmond/jquery-ui-1.10.4.custom.css') }} 
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="../bower_components/html5shiv/dist/html5shiv.js"></script>
          <script src="../bower_components/respond/dest/respond.min.js"></script>
        <![endif]-->
<style type="text/css">


.demo {
font-family: "TroglodyteNFRegular", serif;
font-size:75px;
 font-weight: 900;
line-height: 1.1;
color: white; 
  
}
.demo2 {
font-family: "AlbaSuperRegular", serif;
font-size:75px;
 font-weight: 900;
line-height: 1.1;
color:#006766;
}



.demo3 {
font-family: "FolkloreRegular", serif;
font-size:75px;
 font-weight: 900;
line-height: 1.1;
color:#006766;
}


/*@font-face {
 font-family: MyCustomFont;
 src: url("fonts/ALBAS___.eot")  EOT file for IE 
}*/
@font-face {
    font-family: 'TroglodyteNFRegular';
    src: url('{{ URL::to('/')}}/fonts/trogn___.eot');
    src: url('{{ URL::to('/')}}/fonts/trogn___.eot') format('embedded-opentype'),
         url('{{ URL::to('/')}}/fonts/trogn___.woff2') format('woff2'),
         url('{{ URL::to('/')}}/fonts/trogn___.woff') format('woff'),
         url('{{ URL::to('/')}}/fonts/trogn___.ttf') format('truetype'),
         url('{{ URL::to('/')}}/fonts/trogn___.svg#TroglodyteNFRegular') format('svg');
}

@font-face {
    font-family: 'AlbaSuperRegular';
    src: url('{{ URL::to('/')}}/fonts/albas___.eot');
    src: url('{{ URL::to('/')}}/fonts/albas___.eot') format('embedded-opentype'),
         url('{{ URL::to('/')}}/fonts/albas___.woff2') format('woff2'),
         url('{{ URL::to('/')}}/fonts/albas___.woff') format('woff'),
         url('{{ URL::to('/')}}/fonts/albas___.ttf') format('truetype'),
         url('{{ URL::to('/')}}/fonts/albas___.svg#AlbaSuperRegular') format('svg');
}


@font-face {
    font-family: 'FolkloreRegular';
     src: url('{{ URL::to('/')}}/fonts/folklore.eot');
     src: url('{{ URL::to('/')}}/fonts/folklore.eot') format('embedded-opentype'),
         url('{{ URL::to('/')}}/fonts/folklore.woff2') format('woff2'),
         url('{{ URL::to('/')}}/fonts/folklore.woff') format('woff'),
         url('{{ URL::to('/')}}/fonts/folklore.ttf') format('truetype'),
         url('{{ URL::to('/')}}/fonts/folklore.svg#FolkloreRegular') format('svg');   
    
}



</style>
    </head>
    <body>

        @yield('nav')



        <div class="container">

            <div class="hidden-xs   page-header " id="banner">
                <div class="row text-center">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p class=" demo3"> #Just30minutes</p>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                                        <div class="text-center alert alert-heading  alert-headoo ">
<!--                    <div class="text-center alert alert-dismissable alert-heading">-->
                        <h4>2CHRONICLES 7:14 </h4>
                        <strong><i>If my people who are called by my name, shall humble themselves, and pray ...</i></strong>
        <!--                <span class="btn btn-info" id="clickme">click</span>-->
                        <!--                <b id="talk"></b>-->
                    </div>
                </div>
            </div>






            <div class="row">


                @yield('content')

            </div>











            <footer>


                <hr >

                <!--       <div class="row">
                          <div class="col-lg-12">
                
                              
                                   <ul class="list-unstyled">
                                 <li><a href="#"> About us </a></li>      
                                <li class=""><a   href="#">Why should i register </a></li>
                             <li><a href="#"> </a></li>
                            </ul>       
                          </div>
                        </div>        -->


                <div class="row">



                    <div class="col-lg-12">

                        <ul class="list-unstyled">
                            <li class="pull-right"><a  class="btn btn-default" href="#top">Back to top <i class="fa fa-arrow-up"></i></a></li>

                            <li><a  class="btn btn-primary" href="#"> <i data-toodles="hover" data-active="flash" class="animated fa fa-facebook"></i></a></li>
                            <li><a  class="btn btn-primary" href="#"> <i data-toodles="hover" data-active="flash" class="animated fa fa-twitter"></i></a></li>
                        </ul>
                        <p>©2014 The Fountain of Life Church: 12, Industrial Estate Road, Ilupeju, Lagos Nigeria. All Rights Reserved. <a href="#" rel="nofollow"></a></p>

                    </div>
                </div>

            </footer>






            {{ HTML::script("assets/js/jquery-1.11.0.min.js") }}
            {{ HTML::script("assets/js/bootstrap.min.js") }}
            {{ HTML::script("assets/js/bootswatch.js") }}


            <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
            <script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10-dev/js/jquery.dataTables.min.js"></script>


            {{ HTML::script("assets/js/dataTables.bootstrap.js"); }} 
            {{ HTML::script("timepicker/js/jquery-ui-1.10.4.custom.js"); }} 

            
<!--            
google-analytics            
            -->
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-58616183-1', 'auto');
ga('send', 'pageview');

</script>    
<!--            
google-analytics            
            -->            
            
            
            
            
            
            
            
            
            <script type="text/javascript" charset="utf-8">

        $('#example2').dataTable({
            "scrollX": true,
        //        "pagingType": "simple",
            "pagingType": "full"
        });












	$(function() {
    $( "#datepicker" ).datepicker({ dateFormat: "yy-mm-dd" });
// Hover states on the static widgets
		$( "#dialog-link, #icons li" ).hover(
			function() {
				$( this ).addClass( "ui-state-hover" );
			},
			function() {
				$( this ).removeClass( "ui-state-hover" );
			}
		);
      $('#date').each(function() {
        $(this).datepicker({ dateFormat: 'yy-mm-dd' });
    });       
	});












            </script>

            <script type="text/javascript">
                function countChars(countfrom, displayto) {
                    var len = document.getElementById(countfrom).value.length;
                    document.getElementById(displayto).innerHTML = len;
                }
            </script>    



            <script>

                $(document).ready(function () {

                    $('#example').dataTable({
                        "bLengthChange": false,
                        "bFilter": true,
//                        "aaSorting": [[0, "desc"]]
                    });
                });





                $('#press').click(function () {

                    //alert('helloodkwd');

                    var ademola = "plumptre";

                    $.ajax(
                            {
                                url: '/admin-area',
                                type: 'POST',
                                //dataType:'JSON',
                                data: {'access': ademola}, // takes care of getting input value
                                success: function (data) {
                                    $('#holla').html(data);
                                    //   console.log(data);
                                },
                                error: function (response) {
                                    return alert("error:" + response.responseText);
                                }


                            });




                });















            //   $('#clickme').click(function(){
            ////        $('#talk').html('hello mr demmy');
            //  var sel = 'demmy plumptre';
            //    $.post('/',
            //    {
            //        username : sel
            //    },
            //    function(data){
            //       $('#talk').html(data);
            //           //   console.log(data);
            //    });
            //    });


    function ReAssign(sel, lol) {
    //.alert("id:"+sel+"pre numb:"+lol);
    $.ajax(
        {
        url: '/admin-area',
        type: 'POST',
        //dataType:'JSON',
        data: {'id': sel, 'access': lol}, // takes care of getting input value
        success: function (data) {
        $('#holla').html(data);
        //   console.log(data);
        },
        error: function (response) {
        return alert("error:" + response.responseText);
        }


        });

    }



    function Golive(sel, lol) {
  //  alert("id:"+sel+"pre numb:"+lol);
    $.ajax(
        {
        url: '/admin-area/media',
        type: 'POST',
        //dataType:'JSON',
        data: {'id': sel, 'access': lol}, // takes care of getting input value
        success: function (data) {
        $('#holla').html(data);
        //   console.log(data);
        },
        error: function (response) {
        return alert("error:" + response.responseText);
        }


        });

    }











            //function ReAssign(sel,lol){
            //
            // alert("id:"+sel+"pre numb:"+lol);
            //
            //
            //    
            //} 







            //window.onload= function(){
            //$('#sub_log').bind("click",do_login);
            //};
            //
            //
            //
            //function do_login(){ 
            //$('.load_run').show();  
            // $('#talk').load('/',$("#form-home").serializeArray());
            //
            //}


            //            $("#form-home").submit(function(e){
            //                e.preventDefault();
            //                var username = $("input#username").val();
            //                var token = 'holla me';
            ////                var token =  $("input[name=_token]").val();
            //                var dataString = 'username='+username+'&a='+token; 
            //                $.ajax({
            //                    type: "POST",
            //                    url : "/",
            //                    data : dataString,
            //                    success : function(data){
            ////                        console.log(data);
            //$('#talk').html(data);
            //                    }
            //                },"json");
            //
            //        });


            //   $('#form-home :submit').click(function(e){
            //       var val = $("input#username").val();
            //    e.preventDefault();
            //    
            //    $.post('/', {
            //        username : val
            //        }, function(data) {
            //        $('#talk').prepend('<p>' + data + '</p>');
            //    });
            //});
            // 
            // 


            // $(document).on('click', '#form-home :submit', function(e){
            //
            //       var val = $("input#username").val();
            //    e.preventDefault();
            //    
            //    $.post('/', {
            //        username : val
            //        }, function(data) {
            //        $('#talk').html(data);
            //    });
            //}); 
            // 






                $("#form-home").submit(function (e) {



            //var token =  $("input[name=_token]").val();
            //var valA = $("select#cat").val();
            //var valB = $("input#message").val();
            //var valC = $("input#username").val();
            //var valD = $("input#password").val();
            //var valE = $("input#captcha").val();
                    e.preventDefault();

                    $("#saysth").show();
            //    $(".load_run").show();

            //    $.post('/', {
            //
            //        cat : valA,
            //        message : valB,
            ////        username : valC,
            ////        password : valD
            //      captcha_code : valE
            //        }, function(data) {
            //        $('#talk').html(data);   
            //    });

                    $.ajax({
                        url: '/',
                        type: 'POST',
                        data: $("#form-home").serialize(), // takes care of getting input values
                        success: function (data) {
                            $('#talk').html(data);
                        },
                        error: function (data) {
                            window.location = '/';
                        }
                    });








                });


            //this will show  the loading image

                $(document).ajaxStart(function () {
                    $(".load_run").show();
                }).ajaxStop(function () {
                    $(".load_run").hide();
                });

            </script>   



            <script>


                $(".boxes").each(function () {

                    var charLength = $(this).text().length;

                    if (charLength <= 40)
                        $(this).css({"font-size": "44px", "line-height": "52px"});
                    if (charLength > 40 && charLength < 100)
                        $(this).css({"font-size": "37px", "line-height": "42px"});
                    if (charLength > 100 && charLength < 150)
                        $(this).css({"font-size": "30px", "line-height": "39px"});
                    if (charLength > 150)
                        $(this).css({"font-size": "23px", "line-height": "32px"});
        //                    if (charLength >= 10) $(this).css("font-size", "8px");


        //            font-size: 26px;
        // line-height: 32px;

                });



        //        
        //     this will tell the 
        //     jquery to pass along 
        //     X-CSRF-Token on every ajax request
        //        
        //        

                $(function () {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                        }

                    });


                });


            </script>











    </body>
</html>