<a name="contact"></a>
<section class="ftco-section contact-section bg-light">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
            <div class="col-md-12 mb-1">
                <h2 class="h3">ارتباط با ما</h2>
            </div>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
        <div class="row block-9">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 d-flex">
                <form method="post" action="{{ route('contact') }}#contact" class="p-2 contact-form">
                    @csrf
                    <div class="form-group">
                        {{ Form::text('name',null, array('class' => 'form-control', 'placeholder' => 'نام شما')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::text('email',null, array('class' => 'form-control', 'placeholder' => 'پست الکترونیک')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::text('subject',null, array('class' => 'form-control', 'placeholder' => 'موضوع')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::textarea('message',null, array('class' => 'form-control', 'placeholder' => 'پیام' , 'cols' => '30', 'rows' => '7')) }}
                    </div>
                    <div class="form-group text-left">
                        {{ Form::submit('ارسال پیام',['class' => 'btn btn-primary py-3 px-5']) }}
                    </div>
                </form>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
</section>
