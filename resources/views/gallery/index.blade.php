<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">

    <title>Awesome Albums</title>
    <!-- Latest compiled and minified CSS -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/social-buttons.css" rel="stylesheet">




     <script type="text/javascript" src="/assets/js/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="/assets/js/js/jssor.slider.mini.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!-- use jssor.slider.debug.js instead for debug -->
    @foreach($albums as $album)
    <script>
        jQuery(document).ready(function ($) {
            
            var jssor_{{ $album->id }}_SlideshowTransitions = [
              {$Duration:1200,x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:-0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:-0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,$Cols:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:0.3,$Rows:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:0.3,$Cols:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:-0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,$Rows:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:-0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,$Delay:20,$Clip:3,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,$Delay:20,$Clip:3,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,$Delay:20,$Clip:12,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,$Delay:20,$Clip:12,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
            ];
            
            var jssor_{{ $album->id }}_options = {
              $AutoPlay: true,
              $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_{{ $album->id }}_SlideshowTransitions,
                $TransitionsOrder: 1
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $Cols: 10,
                $SpacingX: 8,
                $SpacingY: 8,
                $Align: 360
              }
            };
            
            var jssor_{{ $album->id }}_slider = new $JssorSlider$("jssor_" + {{ $album->id }}, jssor_{{ $album->id }}_options);
            
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_{{ $album->id }}_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 800);
                    jssor_{{ $album->id }}_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });
    </script>

    @endforeach

    
    <!-- Latest compiled and minified JavaScript -->



    <style>
      body {
        padding-top: 50px;
      }
      .starter-template {
        padding: 40px 15px;
      text-align: center;
      }

       /* jssor slider arrow navigator skin 05 css */
        /*
        .jssora05l                  (normal)
        .jssora05r                  (normal)
        .jssora05l:hover            (normal mouseover)
        .jssora05r:hover            (normal mouseover)
        .jssora05l.jssora05ldn      (mousedown)
        .jssora05r.jssora05rdn      (mousedown)
        */
        .jssora05l, .jssora05r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 40px;
            height: 40px;
            cursor: pointer;
            background: url('img/a17.png') no-repeat;
            overflow: hidden;
        }
        .jssora05l { background-position: -10px -40px; }
        .jssora05r { background-position: -70px -40px; }
        .jssora05l:hover { background-position: -130px -40px; }
        .jssora05r:hover { background-position: -190px -40px; }
        .jssora05l.jssora05ldn { background-position: -250px -40px; }
        .jssora05r.jssora05rdn { background-position: -310px -40px; }

        /* jssor slider thumbnail navigator skin 01 css */
        /*
        .jssort01 .p            (normal)
        .jssort01 .p:hover      (normal mouseover)
        .jssort01 .p.pav        (active)
        .jssort01 .p.pdn        (mousedown)
        */
        .jssort01 .p {
            position: absolute;
            top: 0;
            left: 0;
            width: 72px;
            height: 72px;
        }
        
        .jssort01 .t {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }
        
        .jssort01 .w {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100%;
        }
        
        .jssort01 .c {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 68px;
            height: 68px;
            border: #000 2px solid;
            box-sizing: content-box;
            background: url('img/t01.png') -800px -800px no-repeat;
            _background: none;
        }
        
        .jssort01 .pav .c {
            top: 2px;
            _top: 0px;
            left: 2px;
            _left: 0px;
            width: 68px;
            height: 68px;
            border: #000 0px solid;
            _border: #fff 2px solid;
            background-position: 50% 50%;
        }
        
        .jssort01 .p:hover .c {
            top: 0px;
            left: 0px;
            width: 70px;
            height: 70px;
            border: #fff 1px solid;
            background-position: 50% 50%;
        }
        
        .jssort01 .p.pdn .c {
            background-position: 50% 50%;
            width: 68px;
            height: 68px;
            border: #000 2px solid;
        }
        
        * html .jssort01 .c, * html .jssort01 .pdn .c, * html .jssort01 .pav .c {
            /* ie quirks mode adjust */
            width /**/: 72px;
            height /**/: 72px;
        }



        #image {
          opacity: 1.0;
          filter: alpha(opacity=40); /* For IE8 and earlier */
        }

        
        #image:hover {
            opacity: 0.4;
            filter: alpha(opacity=100); /* For IE8 and earlier */
        }

        #wrapper .text {
            position:relative;
            bottom:150px;
            left:0px;
            visibility:hidden;
            }

        #wrapper {
          text-decoration: none;
          font-size: 20px;
          color: gray;
        }

        #wrapper:hover .text {
            visibility:visible;
            }


    </style>
  </head>

  
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
      <button type="button" class="navbar-toggle"data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/index">Awesome Albums</a>
      <div class="nav-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a href="" data-toggle="modal" data-target="#albumModal">Create New Album</a></li>
        </ul>
      </div><!--/.nav-collapse -->

      <div class="nav-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a href="/sharepage">Shared</a></li>
        </ul>
      </div><!--/.nav-collapse -->

        <a class="navbar-brand" style = "margin-left:680px;" href="/logout">Logout</a>
    </div>
    </div>
    
      <div class="container">

    
        <div class="starter-template">

        @if ($errors->any())
                <ul class="alert alert-danger" style="list-style:none;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
        @endif

        @if(Session::has('succ_share'))
            <div class="alert alert-success">
                <p><strong>{{ Session::get('succ_share') }}</strong></p>
            </div>
          @endif


        <div class="row">
          @foreach($albums as $album) 
            <div class="col-lg-3">
              <div class="thumbnail" style="min-height: px; width:280px;">
               <a href="#myNewModal{{ $album->id }}" data-toggle="modal" data-target="#myNewModal{{ $album->id }}" id="wrapper"> <img id="image" alt="{{$album->name}}" 
                src="/albums/{{$album->cover_image}}" height='280px' width= '270px'> <span class="text">Images Slide Show</span></a>
                <div class="caption" style="margin-top: -36px">
                  <h3>{{$album->name}}</h3>
<!--                   <p>{{$album->description}}</p>
 -->                  <p>{{count($album->Photos)}} image(s).</p>
                  <p>Created date:  {{ date("d F Y",strtotime($album->created_at)) }}</p>
                  <p> <a href="{{URL::route('delete_album',array('id'=>$album->id))}}" onclick="return confirm('Are you sure?')"><button type="button"class="btn btn-danger">Delete Album</button></a> </p>
                  <!-- <p><a href="{{URL::route('show_album',array('id'=>$album->id))}}"><button type="button"class="btn btn-primary">Show Album</button></a></p> -->
                  <p><a href="{{URL::route('show_album',array('id'=>$album->id))}}"> 
                  <button type="button"class="btn btn-primary">Show Album</button></a></p>

                  <p><a href="" data-toggle="modal" data-target="#shareModal" data-value="{{$album->id}}" onClick="javascript:fetchAlbumId('{{$album->id}}');"> 
                  <button type="button"class="btn btn-primary">Share Album</button></a></p>

                </div>
              </div>
            </div>

            <!-- Modal -->
            <div  class="modal fade" id="myNewModal{{ $album->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{ $album->id }}">
              <div class="modal-dialog" role="document">
                <div class="modal-content" style="height:540px; width:750px; margin-top:40px; margin-left:-100px;">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    
                  </div>
                  <div class="modal-body">
                   <div id="jssor_{{ $album->id }}" style="position: relative; margin: 0 auto; top: -35px; left: 0px; margin-left:-20px;  width: 780px; height: 598px; margin-top:-51px; overflow: hidden; visibility: hidden; background-color: #24262e;">
                      <!-- Loading Screen -->
                      <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
                          <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
                          <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
                      </div>
                      <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 800px; height: 649px; overflow: hidden;">
                         @foreach($album->photos as $photo)
                          <div data-p="144.50">
                              <img data-u="image" alt="" src="/albums/{{$photo->name}}" />
                              <img data-u="thumb" src="/albums/{{$photo->name}}" />
                          </div>
                          @endforeach
                      </div>
                      <!-- Thumbnail Navigator -->
                      <div data-u="thumbnavigator" class="jssort01" style="position:absolute;left:0px;bottom:0px;width:800px;height:100px;" data-autocenter="1">
                          <!-- Thumbnail Item Skin Begin -->
                          <div data-u="slides" style="cursor: default;">
                              <div data-u="prototype" class="p">
                                  <div class="w">
                                      <div data-u="thumbnailtemplate" class="t"></div>
                                  </div>
                                  <div class="c"></div>
                              </div>
                          </div>
                          <!-- Thumbnail Item Skin End -->
                      </div>
                      <!-- Arrow Navigator -->
                      <span data-u="arrowleft" class="jssora05l" style="top:158px;left:8px;width:40px;height:40px;"></span>
                      <span data-u="arrowright" class="jssora05r" style="top:158px;right:8px;width:40px;height:40px;"></span>
                      <a href="http://www.jssor.com" style="display:none">Slideshow Maker</a>
                  </div>

                  </div>
                 
                </div>
              </div>
            </div>
          @endforeach
        </div>

<div style="margin-top:30px; margin-bottom:0px;"> {{ $albums->render()  }} </div>

 </div><!-- /.container -->


    </div>




<!-- Modal -->
<div class="modal fade" id="albumModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> Create an Album</h4>
      </div>
      <div class="modal-body">
        <div class="container" style="text-align: center;">
      <div class="span4" style="display: inline-block;margin-top:30px;">
       
        <form name="createnewalbum" method="POST" action="{{URL::route('create_album')}}"enctype="multipart/form-data">
          <fieldset>
            <div class="form-group">
              <label for="name">Album Name</label>
              <input name="name" type="text" class="form-control"placeholder="Album Name"value="{{Input::old('name')}}">
            </div>
            <div class="form-group">
              <label for="description">Album Description</label>
              <textarea name="description" type="text"class="form-control" placeholder="Album description">{{Input::old('descrption')}}</textarea>
            </div>
            <div class="form-group">
              <label for="cover_image">Select a Cover Image</label>
              {{Form::file('cover_image')}}
            </div>
          </fieldset>
           <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"> Create </button>
      </div>
        </form>


      </div>
    </div> <!-- /container -->      </div>
     
    </div>
  </div>
</div>



<div id="shareModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <input type="hidden" name="role" id="role" value="">
              <h4 Classss="modal-title" id="myModalLabel"> Select the user you want to share this album with.</h4>
            </div>

            <form  method="POST" action="{{URL::route('share')}}" enctype="multipart/form-data">
              <fieldset>
                <div class="dataTable_wrapper table-responsive" style="margin-left:10px; margin-right:10px; margin-top:30px;">
                <table class="table table-striped table-hover tablesorter">
                  <thead>
                    <tr>
                      <th> Name</th> <th>Last Name</th> <th>Email</th> <th> Add </th> 
                    </tr>
                    <input type="hidden" id="sel_album" name="sel_album"/ value=""> 
                  </thead>
                   @foreach($users as $user)
                   <tbody>
                      <tr>
                        <td>{{$user->name}} </td> 
                        <td>{{$user->lastname}}</td>
                        <td>{{$user->email}}</td>
                        <td> <input type="checkbox" name="user[]" value="{{$user->id}}">&nbsp; </td>  
                      </tr>
                    </tbody>

                @endforeach
                 </table>
                 </div>
               </fieldset>
               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary"> Share </button>
                </div>
           </form>
        </div>
    </div>
</div>





<div class="container">
<div class="footer" style= "margin-bottom:50px;">
<hr>

    <div class="block-share spread-share p-t-md">

    <!--   <a href="http://twitter.com/minimalmonkey" class="icon-button twitter"><i class="fa fa-twitter"></i><span>twitter</span></a>
      <a href="http://facebook.com" class="icon-button facebook"><i class="icon-facebook"></i><span>facebook</span></a>
      <a href="http://plus.google.com" class="icon-button google-plus"><i class="icon-google-plus"></i><span></span></a>
 -->
     <!--  <a href="http://www.facebook.com/share.php?u=http://www.voteleavetakecontrol.org/our_affiliates" 
      target="_blank"><button class="btn btn-social btn-facebook"><span class="icon icon-facebook"></span> Share on Facebook</button></a>
    </div>

    <a href='http://twitter.com/home?status=Currently reading' target="_blank" title='Click to share this post on Twitter'>Share on Twitter</a>              
 -->

</div>
</div>

<script type="text/javascript">
  function fetchAlbumId(albumId){
     $('#sel_album').val(albumId);
  }
</script>

  
  </body>
</html>








