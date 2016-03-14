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



    <style>
      body {
        padding-top: 50px;
      }
      .starter-template {
        padding: 40px 15px;
      text-align: center;
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
                src="/albums/{{$album->cover_image}}" height='280px' width= '270px'> </a>
                <div class="caption" style="margin-top: 5px">
                  <h3>{{$album->name}}</h3>
                  <p>Created date:  {{ date("d F Y",strtotime($album->created_at)) }}</p>
                  <p> <a href="{{URL::route('delete_album',array('id'=>$album->id))}}" onclick="return confirm('Are you sure?')"><button type="button"class="btn btn-danger">Delete Album</button></a> </p>
                  <!-- <p><a href="{{URL::route('show_album',array('id'=>$album->id))}}"><button type="button"class="btn btn-primary">Show Album</button></a></p> -->
                  <p><a href="{{URL::route('show_album',array('id'=>$album->id))}}"> 
                  <button type="button"class="btn btn-primary">Show Album</button></a></p>

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
                          <div data-p="144.50">
                              <img data-u="image" alt="" src="/albums/{{$album->name}}" />
                              <img data-u="thumb" src="/albums/{{$album->name}}" />
                          </div>
                          
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

<!-- <div style="margin-top:30px; margin-bottom:0px;"> {{ $albums->render()  }} </div>
 -->
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


  
  </body>
</html>