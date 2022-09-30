<div class="card card-fluid">
    {{-- <div class="card-header bg-primary text-white rounded-top" >
        <span>Noticeboard</span>
    </div> --}}
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" data-interval="5000">
            <div class="carousel-inner" role="listbox">
                
                @if (Auth::user()->hasRole(['student', 'parent']))
                    @foreach ($news as $new)
                        @if ($new->studen_notice == 'Yes')
                            <div class="carousel-item ">
                                <img class="d-block img-fluid" src="{{Storage::url($new->image)}}"  width="100%">
                            </div>
                        @endif
                    @endforeach
                 @endif
                 @if (!Auth::user()->hasRole(['student', 'parent']))
                    @foreach ($news as $new)
                        @if ($new->studen_notice == 'No')
                            <div class="carousel-item">
                                <img class="d-block img-fluid active" src="{{Storage::url($new->image)}}" width="100%" >  
                            </div>
                        @endif
                    @endforeach
                 @endif
         
                <div class="carousel-item active">
                    <img class="d-block img-fluid" src="{{ asset('/images/noticeboard/welcome.jpg') }}" width="100%" >
                </div>
                <a class="carousel-control-prev" href="#carouselExampleSlidesOnly" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleSlidesOnly" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

            </div>
        </div> 
</div>