<!doctype html>
<html lang="en">

  <head>
    <meta charset="UTF-8">

    <title>{{$albums->name}}</title>
    <!-- Latest compiled and minified CSS -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled and minified JavaScript -->

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
        <a class="navbar-brand" style = "margin-left:760px;" href="/logout">Logout</a>
    </div>
    </div>

    <div class="container">
    
      <div class="starter-template">

          @if ($errors->any())
                <ul class="alert alert-danger" style="list-style:none;">
                    @foreach ($errors->all() as $error)
                        <li> Image is required and it must be a jpeg/jpg file.</li>
                    @endforeach
                </ul>
        @endif

         @if(Session::has('succ_msj'))
            <div class="alert alert-success">
                <p><strong>{{ Session::get('succ_msj') }}</strong></p>
            </div>
        @endif


        <div class="media">
          <img class="media-object pull-left"alt="{{$albums->name}}" src="/albums/{{$albums->cover_image}}" width="350px">
          <div class="media-body" style="margin-top:25px">
            <h2 class="media-heading" > {{$albums->name}}</h2>
        
          <div class="media">
          <h4 class="media-heading" > {{$albums->description}}</h4>
          <br>
          <button type="button"class="btn btn-primary btn-large" data-toggle="modal" data-target="#imageModal">Add New Image to Album</button>
          <a href="{{URL::route('delete_album',array('id'=>$albums->id))}}" onclick="return confirm('Are yousure?')"><button type="button"class="btn btn-danger btn-large">Delete Album</button></a>
        </div>
      </div>
    </div>
    </div>
      <div class="row">
                @foreach($photos as $photo)
          <div class="col-lg-3">
            <div class="thumbnail" style="max-height: 350px; min-height: 350px; margin-top:20px;">
              <img alt="{{$albums->name}}" src="/albums/{{$photo->name}}" style="min-height: 200px;">
              <div class="caption" style="margin-top:30px;">
                <!-- <p>{{$photo->description}}</p> -->
                <p>Created date:  {{ date("d F Y",strtotime($photo->created_at)) }}</p>
                <a href="{{URL::route('delete_image',array('id'=>$photo->id))}}" onclick="return confirm('Are you sure?')"><button type="button" class="btn btn-danger btn-small">Delete Image</button></a>

                <a href="{{URL::route('download_image',array('id'=>$photo->id))}}"><button type="button" class="btn btn-primary btn-small">Download Image</button> </a>
               

              </div>
            </div>
          </div>

        @endforeach

      </div>
        <div style="margin-top:30px; margin-bottom:0px;"> <center >  {{ $photos->render()  }} </div> </center>

    </div>


<!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> Add an Image to {{$albums->name}} Album</h4>
      </div>
      <div class="modal-body">
        <div class="container" style="text-align: center;">
      <div class="span4" style="display: inline-block;margin-top:30px;">
      
        <form name="addimagetoalbum" method="POST" action="{{URL::route('add_image_to_album')}}" enctype="multipart/form-data">
          <input type="hidden" name="album_id" value="{{$albums->id}}" />
          <fieldset>
             <div class="form-group" id="images">

              <table>
                <tr>
                  <td><input  type="file" name="photo[]"></td>
                  <td><span> <a href="javascript:void(0)" class="btn btn-default add" > + </a></span></td>
                </tr> 
              </table>
                
               
              
<!-- 
              <label for="image">Select an Image</label>
              {{Form::file('image')}} -->
            </div>
          </fieldset>
           <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
        </form>
      </div>
    </div> <!-- /container -->     
     </div>
     
    </div>
  </div>
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
        @if($errors->has())
          <div class="alert alert-block alert-error fade in"id="error-block">
            <?php
            $messages = $errors->all('<li>:message</li>');
            ?>
            <button type="button" class="close"data-dismiss="alert">×</button>
            
            <h4>Warning!</h4>
            <ul>
              @foreach($messages as $message)
                {{$message}}
              @endforeach
            
            </ul>
          </div>
        @endif

        <form name="createnewalbum" method="POST"action="{{URL::route('create_album')}}"enctype="multipart/form-data">
          <fieldset>
            <legend>Create an Album</legend>
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



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <script type="text/javascript">
      $('.add').click(function(){
    $("#images").append('<span style="direction: ltr;"><input type="file" name="photo[]" ><a class="remove-field_o btn btn-default" href="javascript:void(0)">&nbsp;x</a></span>');
});

      $('body').on('click', '.remove-field_o', function(e){
    $(this).parent('span').remove();
});
    </script>

    <script type="text/javascript">
      function fbs_click() {
        u=location.href;t=document.title;window.open(‘http://www.facebook.com/sharer.php?u=’+encodeURIComponent(u)+’&t=’+encodeURIComponent(t),’sharer’,’toolbar=0,status=0,width=626,height=436′);return false;}
    </script>







  </body>
</html>