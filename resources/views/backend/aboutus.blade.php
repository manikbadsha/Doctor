@extends('backend.master')

@section('content')
   <div class="container-fluid">
       <div class="row">
           <div class="col-lg-12">
               <div class="card mt 3">
                    <div class="card-header bg-info text-white">
                        <b>About Us</b>
                    </div>
                    <div class="card-body">
                        <form action="{{url('insert/about/page')}}" method="POST" enctype="multipart/form-data">
                                     @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                   
                                        <div class="form-group">
                                                <label>                                                                                          
                                                   <label>Upload Your Image :</label>
                                                    <input type="file" name="image" id="image" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                                    <img style="height: 200px; width:200px" id="blah" class="img-fluid">
                                                </label>
                                            </div>
                                    

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>About Text :</label>
                                                <textarea name="about" value="" class="form-control" placeholder="Professional Degree" required></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    


                                   

                                    <div class="row">
                                        <div class="col-lg-12 text-center pt-4">
                                            <input type="submit" value="Inseart" class="btn btn-success rounded">
                                        </div>
                                    </div>

                                  
                                    
                                    
                                </div>

                               
                                    
                                    
                            </div>
                           


                        </form>
                    </div>
               </div>
           </div>
       </div>
   </div>
@endsection
