@extends('layouts.app')
@section('title',' QuestionForm')

@section('content')

    <script>
        $(function()
        {
            $(".select2-multi").select2();
        });
    </script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create Question</div>
                    <div class="card-body">
                        @if($edit === FALSE)
                            {!! Form::model($question, ['action' => 'QuestionController@store']) !!}
                        @else()
                            {!! Form::model($question, ['route' => ['questions.update', $question->id], 'method' => 'patch']) !!}
                        @endif

                        <div class="form-group">

                                @if($edit === FALSE)
                                {{ Form::label('tags', 'Tags:') }}
                                <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                                    @foreach($tags as $tag)
                                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                                    @endforeach
                                </select>
                                @else()
                                {{ Form::label('tags', 'Choose Tags:', ['class' => 'form-spacing-top']) }}
                                {{ Form::select('tags[]',$tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}

{{--                                <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                                    @foreach($question->tags as $tag)
                                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                                    @endforeach
                                    </select>--}}

{{--                                    <script type="text/javascript">
                                        $(".select2-multi").select2();
                                        $(".select2-multi").select2().val({!! json_encode($question->tags()->getRelatedIds()) !!}).trigger('change');
                                    </script>--}}
                                @endif
                            <br/><br/>
                            {!! Form::label('body', 'Question:') !!}
                            {!! Form::textarea('body', $question->body, ['class' => 'form-control','required' => 'required']) !!}
                        </div>
                        <button class="btn btn-success float-right" value="submit" type="submit" id="submit">Save
                        </button>
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection









