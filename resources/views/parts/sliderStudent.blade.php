<div class="card card-fluid">
    {{-- <div class="card-header bg-primary text-white rounded-top" >
        <span>Noticeboard</span>
    </div> --}}
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" data-interval="5000">
            <div class="carousel-inner" role="listbox">
                
                @foreach ($newsStudent as $newStudent)
                    <div class="carousel-item ">
                        <img class="d-block img-fluid" src="{{ URL::asset('storage/notice/'.$newStudent->image) }}" >
                    </div>
                @endforeach
                    <div class="carousel-item active">
                        <img class="d-block img-fluid" src="{{ URL::asset('storage/notice/tutoringDos.jpg')}}" alt="Tercera diapositiva">
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