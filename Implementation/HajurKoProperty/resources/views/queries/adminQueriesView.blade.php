@extends('adminjob.mainApannel')

@section('uadContent')

<div class="container">
    <h3 class="pt-4">Queries</h3>
    <small>About hajurko property</small>  
    <div class='row p-2 ques'>
        <div class='col-lg-12 bg-light pt-2 '>
            <h4 class='text-dark text-left'>Title: What is Lorem Ipsum?</h4>
            <h5 class='text-secondary'>Question: Lorem Ipsum is simply dummy text of the printing and typesetting industry?</h5>
            <p class='text-primary'><small>Posted by: Tina Dhakal, on 2019-03-28</small></p>
        </div>
        {{-- answer part --}}
        <div class=' row ansSel p-2'>
            <div class='col-lg-12'>
                <small>
                    <p class='text-right'>
                        <a class='text-success' href='#' data-toggle='modal'>Update</a>
                        <a class='text-danger'>Delete</a>
                    </p>
                </small>

                <div class='content pl-4 pr-4 pt-1'><div class='read-more'><p class='text-secondary text-justify'>
                    It is a long established fact that a reader will be distracted by the readable 
                    content of a page when looking at its layout. The point of using Lorem Ipsum is 
                    that it has a more-or-less normal distribution    
                </p></div></div>
                <small><p class='text-primary pl-4'>answered by: Rupesh Dhakal, on 2019-03-28</p></small>
            </div>
        </div>
        <div class='col-lg-12'>
            <form method='post'>
            <div class='input-group mb-3'>
                <textarea class='form-control' name='answer' id='answer' placeholder='Add a new answer....' aria-label='Add a new answer....' aria-describedby='basic-addon2' required></textarea>
                <div class='input-group-append'>
                <input type='submit' class='btn btn-primary' name='answerQuestion' value='Post Your Answer'>
                </div>
            </div>
            </form>
        </div>
        </div>
    </div>
</div>

@endsection