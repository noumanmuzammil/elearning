@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Audio</div>
            </div>
        </div>
        
        <form action="{{ url('admin/audio/edit/'.$audio['id']) }}" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
            
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                       
                <div class="form-group">    
                    <label class="control-label col-sm-2" for="title">Audio Title</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="title" value="{{$audio['title']}}" required>
                    </div>
                </div>
                
                <div class="form-group">    
                    <label class="control-label col-sm-2" for="vocalist">Audio Speaker</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="vocalist" value="{{$audio['vocalist']}}" required>
                    </div>
                </div>
                
                <div class="form-group">    
                    <label class="control-label col-sm-2" for="vocalist">Audio Category</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="category" required>
                            <option value="">Select Category</option>
                            <?php
                            foreach($category as $row){
                            ?>
                                <option value="{{$row['id']}}" <?php if($audio['category_id']==$row['id']){ echo 'selected'; } ?>>{{$row['category']}}</option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="vocalist">Audio File</label>
                    <div class="col-sm-4">
                        <audio controls>
                            <source src="{{$audio['audio_file']}}" type="audio/mpeg">
                            <source src="{{$audio['audio_file']}}" type="audio/ogg">
                            <source src="{{$audio['audio_file']}}" type="audio/wav">
                            Your browser does not support the audio element.
                        </audio> 
                    </div>
                </div>
                
<!--                <div class="form-group">    
                    <label class="control-label col-sm-2" for="cover">Audio File Upload</label>
                    <div class="col-sm-4">
                        <input type="file" class="form-control" name="audio_file" required>
                    </div>
                </div>-->
                
                <div class="form-group"> 
                    <div class="col-sm-4 col-sm-offset-2">
                        <input type="submit" class="form-control btn btn-primary" name="submit" value="Update">
                    </div>
                </div>

        </form>
    </div>
</div>

@endsection